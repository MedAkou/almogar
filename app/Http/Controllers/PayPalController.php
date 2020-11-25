<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;
use App\Helpers\OrdersHelper;
use App\Models\{Shipping,Payement , Orders , Coupons};

use hisorange\BrowserDetect\Parser as Browser;

use ShoppingCart;
use Session;

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
/** All Paypal Details class **/
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Auth;
use Setting;
use Exception;
use Redirect;
use URL;
use Log;

class PayPalController extends Controller
{



    private $_api_context;
    protected $provider;
    public $serial = '';


    public function __construct() {

        $paypal_conf      = \Config::get('paypal');  
        $PAYPAL_CLIENT_ID = baseSetting('PAYPAL_CLIENT_ID');
        $PAYPAL_SECRET    = baseSetting('PAYPAL_SECRET');
        $PAYPAL_MODE      = baseSetting('PAYPAL_MODE');
        $paypal_conf['settings']['mode'] =$PAYPAL_MODE;

        $this->_api_context = new ApiContext(new OAuthTokenCredential(
            $PAYPAL_CLIENT_ID,
            $PAYPAL_SECRET)
        );

        $this->_api_context->setConfig($paypal_conf['settings']);
        $this->provider = new ExpressCheckout();

    }


    public function pay($request) {
        
        $shipping = $request->shippingMethod;
        $ShippingPrice = Shipping::find($shipping);

        $coupon = $request->coupon;
        $discount = Coupons::where('code', $coupon)->first();
        $discountPrice=0;        
        

        $shippingPrice = 0;
        $shipping = Shipping::find(Session::get('shippingMethod'));
        if($shipping) {
            $shippingPrice =  (float)str_replace('€', '', $shipping->cost);
        }

        $SubtotalPrice = ShoppingCart::totalPrice();

        if($discount){
            $discountPrice = $discount->discount;
            if($discount->discount_type == 'percent'){
                $total = $shippingPrice + $SubtotalPrice - (($shippingPrice + $SubtotalPrice)*$discountPrice)/100;
            }
        }
        else{
                $total = $shippingPrice + $SubtotalPrice - $discountPrice;
        }

        

        // set the data array we want to sent to paypal
        $data = [];
        $data['items'] = OrdersHelper::Paypalitems();

        $this->serial=OrdersHelper::generate_booking_id();
        session()->forget('order_serial');
        Session::put('order_serial', $this->serial);
        
        $data['invoice_id']          = rand(9000,12000);
        $data['invoice_description'] = "payment charge for products from o-bazaar.com order #'.$this->serial.'";
        $data['return_url']          = route('paypal.success',['store' => $request->store ]);
        $data['cancel_url']          = route('paypal.faild',['store' => $request->store ]);
        $data['subtotal']            = $SubtotalPrice;
        $data['shipping']            = $shippingPrice;
        $data['total']               = $total;
        

        $total_amount = $data['total'];

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
 
        $item_1 = new Item();
        $item_1->setName('Item 1') /** item name **/
            ->setCurrency('EUR')
            ->setQuantity(1)
            ->setPrice($total_amount); /** unit price **/


  


        $item_list = new ItemList();
        $item_list->setItems(array($item_1));
 
        $amount = new Amount();
        $amount->setCurrency('EUR')
            ->setTotal($data['total']);
 
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Your transaction description');
 
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl($data['return_url']) /** Specify return URL **/
            ->setCancelUrl($data['cancel_url']);

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
                
      
           // dd($this->_api_context);

        try {
             
            $payment->create($this->_api_context);
 
        } catch (\PayPal\Exception\PPConnectionException $ex) {
 
            if (\Config::get('app.debug')) {
 
                \Session::put('error', 'Connection timeout');
                return Redirect::route('user.dashboard');
 
            } else {
 
                \Session::put('error', 'Some error occur, sorry for inconvenient');
                return Redirect::route('user.dashboard');
 
            }
 
        }


        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }

         \Session::put('paypal_payment_id', $payment->getId());
         return Redirect::away($redirect_url);

    }

    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function faildPayement()
    {
        dd('Your payment is canceled. You can create cancel page here.');
    }

    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function successPayement(Request $request) {




            $payment_id = Session::get('paypal_payment_id');

            Session::forget('paypal_payment_id');

            if (empty($_GET['PayerID']) || empty($_GET['token'])) {
                \Session::put('error', 'Payment failed');
                return Redirect::route('/');
            }

            
            $execution = new PaymentExecution();
            $execution->setPayerId($_GET['PayerID']);
            $payment = Payment::get($payment_id, $this->_api_context);
            $result = $payment->execute($execution, $this->_api_context);


            if ($result->getState() == 'approved') {

            $order_id = OrdersHelper::save();
             
            $data = [
                'order_id' => $order_id ,
                'method' => 'paypal',
            ];
            
            $payement_id        = Payement::create($data);

            $order              = Orders::find($order_id);
            $order->payement_id = $payement_id;
            $order->statue      = 'success';
            $order->shipping_id = $shippingid ?? NULL;
            $order->serial      = Session::get('order_serial');


            $geo = geoip(\Request::ip());

            $order->device = Browser::browserFamily();
            $order->ip = $geo['ip'];
            $order->country = $geo['country'];
            $order->platform = Browser::platformName();


            $order->save();


            define('API_ACCESS_KEY','AAAAOjRPgWU:APA91bE1YoEMWzykvvsECM1Wv1iwhvk_KOcw5Bi1h_GJDDo3qlV7izJ54qwcmL31xFjqFR0SHRJTgi50Cjpxs4gLOwK-C06Zu2nm6eUacnMkPtnthdxw8-6hJ6iFHXaBytR-vyJpYoF-');
            $fcmUrl = 'https://fcm.googleapis.com/fcm/send';

            $notification = [
                'title' =>'O-BAZAAR ORDER',
                'body' => 'SALAM MOHAMED ALKHATEEB',
                'sound' => 1,
                "sound" => "default",
                "click_action"=> "Open_URI"
            ];
            

            $extraNotificationData = ["message" => $notification];

            $fcmNotification = [
                'to'        => 'dxLWDVEVmYI:APA91bFTWne2Fjuii6kkYKNCZSM5uBRO2QQPPMWrDbJuQcJucMEYLLfmoSnhf_tORX0P--YBOoWg5rULzVjKfYlR7y7oWmxRwko9X3N0v2SLDgfjK7Q8uwQvNaLSrrMxGMBq9sdjpQ5J',
                'notification' => $notification,
                'data' => [
                      "uri"=>  "https://o-bazaar.com/merchant/orders/edit/".$order->id,
                      "msg_type" =>"Hello ",
                      "request_id" =>7,
                      "image_url" => 'https://www.gstatic.com/mobilesdk/160503_mobilesdk/logo/2x/firebase_28dp.png',
                      "user_name"=>"abdulwahab",
                      "msg"=>"msg"
                    ]
            ];

            $headers = [
                'Authorization: key=' . API_ACCESS_KEY,
                'Content-Type: application/json'
            ];

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,$fcmUrl);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
            $result = curl_exec($ch);
            curl_close($ch);

            return redirect()->route('thank-you',['store'=> $request->store ])->with('message',trans('order.created'));
                
            
            }else {

                \Session::put('error', 'Payment failed');
                return Redirect::route('/');
            }




        dd('حصل خطأ ما ، المرجو المحاولة من جديد');



    }



}