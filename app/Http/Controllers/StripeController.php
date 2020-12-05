<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Stripe\Error\Card;
use App\Helpers\OrdersHelper;
use App\Models\{Shipping,Payement,Orders,Coupons};

use hisorange\BrowserDetect\Parser as Browser;

use ShoppingCart;
use Session;


class StripeController extends Controller
{

    public $serial ='';

    public function postPaymentWithStripe(Request $request)
    {
      


        $validation = [
            'card_no' => 'required',
            'exp_month' => 'required',
            'exp_year' => 'required',
            'cvv' => 'required',
            'amount' => 'required',
        ];


        $coupon = $request->coupon;
        $discount = Coupons::where('code', $coupon)->first();
        $discountPrice=0;
        if($discount){
            $discountPrice = $discount->discount;
        }


        $shippingPrice = 0;
        $shipping = Shipping::find(\Session::get('shippingMethod'));


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

        $currency = 'EUR';

        $stripe = Stripe::make(baseSetting('STRIPE_API_KEY'));
        try {
            $token = $stripe->tokens()->create([
                'card' => [
                    'number'    => $request->get('card_no'),
                    'exp_month' => $request->get('exp_month'),
                    'exp_year'  => $request->get('exp_year'),
                    'cvc'       => $request->get('cvv'),
                ],
            ]);
            if (!isset($token['id'])) {
                return redirect()->route('checkout',['store'=> $request->store])->with('error','The Stripe Token was not generated correctly');   
            }

            $this->serial=OrdersHelper::generate_booking_id();

            $charge = $stripe->charges()->create([
                'card' => $token['id'],
                'currency' => $currency,
                'amount'   => $total ,
                'description' => 'payment charge for products from o-bazaar.com order #'.$this->serial.'',
            ]);
            
            if($charge['status'] == 'succeeded') {
                

            $order_id = OrdersHelper::save();
             
            $data = [
                'order_id' => $order_id ,
                'method' => 'stripe',
            ];
            $payement_id        = Payement::create($data);
            
            $order              = Orders::find($order_id);
            $order->payement_id = $payement_id;
            $order->statue      = 'success';
            $order->shipping_id = $shippingid ?? NULL;
            $order->serial      = $this->serial;

            session()->forget('order_serial');
            Session::put('order_serial', $this->serial);


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
        

        $extraNotificationData = ["message" => $notification,"moredata" =>'dd'];

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




            return redirect()->route('thank-you')->with('message',trans('order.created'));


            } else {
                return redirect()->route('checkout',['store'=> $request->store])->with('error','Money not add in wallet!!');
            }
        } catch (Exception $e) {
            \Session::put('error',trans($e->getMessage()));
            return redirect()->route('checkout',['store'=> $request->store]);
        } catch(\Cartalyst\Stripe\Exception\CardErrorException $e) {
            \Session::put('error',trans($e->getMessage()));
            return redirect()->route('checkout',['store'=> $request->store]);
        } catch(\Cartalyst\Stripe\Exception\MissingParameterException $e) {
            \Session::put('error',trans($e->getMessage()));
            return redirect()->route('checkout',['store'=> $request->store]);
        }
    }
}