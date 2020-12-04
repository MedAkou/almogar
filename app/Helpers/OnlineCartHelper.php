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
        if(!self::checkAuth()) return false;

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
        if(!self::checkAuth()) return false;

        $user_id = Auth::user()->id;
        $cart = Cart::where('user_id', $user_id)->first();
        if(!empty($cart)){
            $products = Product::where('id' , $cart->product_id)->get();
            $quantity = $cart->quantity;
            //$product_price = $product->presentPrice();
            //$subtotal = $quantity * $product_price;dd("rfrf");

            $productid = array();

            foreach(ShoppingCart::all() as $cart){
                array_push($productid, $cart['id']);
            }

            foreach($products as $product){
                if(!in_array($product->id, $productid)){
                    ShoppingCart::associate('App\Models\Product');
                    ShoppingCart::add( $product->id,$product->name, $quantity,$product->presentPrice(),['thumbnail' => $product->thumbnail ]);
                }
            }
            
        }
    }

    public static function update($store_id, $product , $quantity)
    {
        if(!self::checkAuth()) return false;

        $user_id = Auth::user()->id;
        //$product = Product::find($product_id)->get();
        $cart = Cart::where("product_id",$product->id)->where("user_id",$user_id)->first();
        $cart->user_id = $user_id;
        $cart->store_id = $store_id;
        $cart->product_id = $product->id;
        $cart->quantity = $quantity;
        $cart->price = $product->presentPrice();
        $cart->subtotal = $quantity * $product->presentPrice();
        $cart->save();

        return $cart;
    }

    public static function remove($product_id)
    {
        if(!self::checkAuth()) return false;
        return Cart::where("product_id",$product_id)->where("user_id",Auth::user()->id)->delete();
    }

    public static function clear()
    {
        if(!self::checkAuth()) return false;
        return Cart::where("user_id", Auth::user()->id)->delete();
    }
}