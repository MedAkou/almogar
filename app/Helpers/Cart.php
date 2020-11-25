<?php

namespace App\Helpers;
use Session;
use ShoppingCart;
use \App\Models\Product;
use App\Helpers\OnlineCartHelper;


class Cart {




    public function total(){
        return ShoppingCart::total();
    }
	public function get(){
        OnlineCartHelper::load();
		return ShoppingCart::all();
	}


    public function products(){
        return Session::get('cart.products');
    }



    public function add($id,$quantity) {

          //  dd(ShoppingCart::all());

            $product = Product::find($id);
            $store_id = \Session::get('store_id');
            if($product){
                ShoppingCart::associate('App\Models\Product');
                ShoppingCart::add( $id,$product->name, $quantity,$product->presentPrice(),['thumbnail' => $product->thumbnail ]);
            }
            OnlineCartHelper::add($store_id,$product,$id,$quantity);

    }






    public function exist($id){
        ShoppingCart::totalPrice();
    }





    public function remove($rowID) {
        return ShoppingCart::remove($rowID);
    }

    public function update($request) {
        
        $store_id = \Session::get('store_id');
        OnlineCartHelper::update($request->cart_id,$store_id , $request->quantity , $request->product_id);

        return ShoppingCart::update($request->rawId, $request->quantity);
        
        $store_id = \Session::get('store_id');
        OnlineCartHelper::update($store_id , $request->quantity , $request->product_id);
    }
 	
 	public function clear(){
 		return ShoppingCart::clean();
    }
    
 	public function getProducts(){
       
    } 
    
    public function getTotalPrice(){
         $total = [];
         foreach(self::getproducts() as $item ) {
            $total[] = $item['price']  * $item['quantity'];
         }
         return array_sum($total);
    }
    
   
    




}