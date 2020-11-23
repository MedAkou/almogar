<?php

namespace App\Helpers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OnlineCartHelper {

    public static $auth = false;

    public function __construct()
    {
        if(Auth::check()){
            self::$auth = true;
        }
    }

    public static function add($store_id, $product , $id , $quantity)
    {
        $och = new OnlineCartHelper();
        if(self::$auth != true){
            return false;
        }

        $user_id = Auth::user()->id;
        //$product_price = Product::find($product_id)->get('price');
        $cart = new Cart;
        $cart->user_id = $user_id;
        $cart->store_id = $store_id;
        $cart->product_id = $id;
        $cart->quantity = $quantity;
        $cart->price = $product->presentPrice();
        $cart->subtotal = $quantity * $product->presentPrice();
        $cart->save();
dd("er");
        return $cart;
    }

    public static function get($cart_id)
    {
        return Cart::find($cart_id);
    }

    public static function load(Request $request, $store_id, $product_id)
    {
        if($this->auth != true){
            return false;
        }

        $user_id = Auth::user()->id;
        $cart = Cart::where('user_id', $user_id);
        if(empty($cart)){
            $product_price = Product::find($product_id)->get('price');
            $quantity = $request->quantity;
            $subtotal = $quantity * $product_price;

            Session([   'userid' => $user_id,
                        'storeid' => $store_id,
                        'productid' => $product_id,
                        'quantity' => $quantity,
                        'price' => $product_price,
                        'subtotal' => $subtotal
            ]);
        }
    }

    public static function update(Request $request, $cart_id, $store_id, $product_id)
    {
        if($this->auth != true){
            return false;
        }

        $user_id = Auth::user()->id;
        $product_price = Product::find($product_id)->get('price');
        $cart = Cart::find($cart_id);
        $cart->user_id = $user_id;
        $cart->store_id = $store_id;
        $cart->product_id = $product_id;
        $cart->quantity = $request->quantity;
        $cart->price = $product_price;
        $cart->subtotal = $request->quantity * $request->price;
        $cart->save();

        return $cart;
    }

    public static function remove($cart_id)
    {
        return Cart::find($cart_id)->delete();
    }
}