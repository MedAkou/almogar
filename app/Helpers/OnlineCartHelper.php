<?php

namespace App\Helpers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use ShoppingCart;
use Illuminate\Support\Facades\Auth;

class OnlineCartHelper {

    public static $auth = false;

    private static function checkAuth(){
        if(Auth::check()){
            return true;
        }
    }

    public static function add($store_id, $product , $id , $quantity)
    {
        //$och = new OnlineCartHelper();
        if(!self::checkAuth()){
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

        return $cart;
    }

    public static function get($cart_id)
    {
        return Cart::find($cart_id);
    }

    public static function load()
    {
        if(!self::checkAuth()){
            return false;
        }

        $user_id = Auth::user()->id;
        $cart = Cart::where('user_id', $user_id)->first();
        
        
        if(!empty($cart)){
            $products = Product::where('id' , $cart->product_id)->get(); 
            $quantity = $cart->quantity;
            //$product_price = $product->presentPrice();
            //$subtotal = $quantity * $product_price;dd("rfrf");

            foreach($products as $product){
<<<<<<< HEAD
                ShoppingCart::associate('App\Models\Product');
                ShoppingCart::add( $product->id,$product->name, $quantity,$product->presentPrice(),['thumbnail' => $product->thumbnail ]);
=======
                
                //ShoppingCart::associate('App\Models\Product');
                //ShoppingCart::add( $product->id,$product->name, $quantity,$product->presentPrice(),['thumbnail' => $product->thumbnail ]);
>>>>>>> 8a4c333be6932b464644c690530dab1691c0023f
            }
            
        }
    }

<<<<<<< HEAD
    public static function update($store_id, $product_id , $quantity)
=======
    public static function update($cart_id,$store_id , $quantity,$product_id)
>>>>>>> 8a4c333be6932b464644c690530dab1691c0023f
    {
        if(!self::checkAuth()){
            return false;
        }

<<<<<<< HEAD
        // $user_id = Auth::user()->id;
        // $product = Product::find($product_id)->get();
        // $cart = Cart::find($cart_id);
        // $cart->user_id = $user_id;
        // $cart->store_id = $store_id;
        // $cart->product_id = $product_id;
        // $cart->quantity = $quantity;
        // $cart->price = $product->presentPrice();
        // $cart->subtotal = $quantity * $product->presentPrice();
        // $cart->save();
=======
        $user_id = Auth::user()->id;
        $product = Product::where("id",$product_id)->where("store_id",$store_id)->first(); 
        $cart = Cart::where("product_id",$product_id)->where("user_id",$user_id)->first();

        $cart->quantity = $quantity;
        $cart->subtotal = $quantity * $product->presentPrice();
        $cart->save();
>>>>>>> 8a4c333be6932b464644c690530dab1691c0023f

        return $cart;
    }

    public static function remove($cart_id)
    {
        //return Cart::where("product_id",$product_id)->where("user_id",$user_id)->delete();
    }
}