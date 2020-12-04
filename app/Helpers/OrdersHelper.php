<?php

namespace App\Helpers;
use Auth;
use App\Models\{OrderDetails,Addresses,Shipping,Orders};
use ShoppingCart;
use Session;
use \App\Helpers\EmailHelper;


class OrdersHelper {



        public static function Paypalitems() {
            $items = [];
            foreach(ShoppingCart::all() as $item) {
                $data = [
                    'price' => $item['price'],
                    'qty'   => $item['qty'],
                    'name'  => $item['name'],
                ];
                $items[] = $data;
            }
            return $items;
        }



    // create the order
    public static function save(){
        $order = new self;

        // create the order
        $id = $order->createOrder();

        // save order products
        $order->saveOrderProduct($id);

        // send email to user
        $order->notifyUser($id);
        
        // send email to admin
        $order->notifyAdmin($id);

        // clear cart
        (new Cart())->clear();

        Session::forget('shippingMethod');
        Session::forget('currency');
        Session::forget('store_id');
        return $id;
    }


    public function TotalPrice(){
        $price = ShoppingCart::totalPrice();
        if(Session::has('shippingMethod')){

            $shipping = Shipping::find(Session::has('shippingMethod'));
            if($shipping)
                $price = $price + (float)str_replace('€', '', $shipping->cost);
        }

        return $price ;
    }


    
    public function createOrder() {
            $shipping_id = NULL;
            $shippingMethod = Session::get('shippingMethod');
            $pickup      = $shippingMethod;

            if(is_numeric($shippingMethod)){
                $shipping_id = $shippingMethod;
                $pickup = NULL;
            }

            $content                 =  new Orders;
            $content->statue         =  'pending';
            $content->user_id        =  Auth::user()->id;
            $content->address_id     =  $this->adress();
            $content->total          =  $this->TotalPrice();
            $content->shipping_id    =  $shipping_id; 
            $content->store_id       =  Session::get('store_id'); 
            $content->currency       =  Session::get('currency'); 
            $content->subtotal       =  ShoppingCart::totalPrice();
            $content->pickup         =  $pickup;

            $content->save();
            return $content->id;
    }


    public function adress() {
            $user_id = Auth::user()->id;
            $address = Addresses::where('user_id',$user_id)->where('is_shipping',true)->first();
            return $address->id;
    }


    public function saveOrderProduct($id) {
        $items = [];
        foreach (ShoppingCart::all() as $product) {
                $item = [
                    'order_id'   => $id ,
                    'product_id' => $product['id'] ,
                    'quantity'   => $product['qty'] ,
                    'price'      => $product['total'] ,
                ];
                $items[] = $item ;
        }
        return OrderDetails::insert($items);
    }
    
    public function notifyUser($order_id) {
        EmailHelper::to(Auth::user()->email)
                    ->with(['order' => Orders::find($order_id)])
                    ->email('emails.orderCreated')
                    ->subject(trans('order.received.subject'))
                    ->send();
    }

    public function notifyAdmin($order_id) {
        $order = Orders::find($order_id);
        EmailHelper::to($order->store->owner->email)
                    ->with(['order' => Orders::find($order_id)])
                    ->email('emails.orderCreated')
                    ->subject(trans('order.received.subject'))
                    ->send();
    }

    public static function generate_booking_id() {
        return "O-Bazaar".mt_rand(100000, 9999999);
    }
}