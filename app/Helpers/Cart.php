<?php

namespace App\Helpers;
use \App\Models\Product;
use Session;
use ShoppingCart;


class Cart {




    public function total(){
        return ShoppingCart::total();
    }
	public function get(){
		return ShoppingCart::all();
	}


    public function products(){
        return Session::get('cart.products');
    }



    public function add($id,$quantity) {

          //  dd(ShoppingCart::all());

            $product = Product::find($id);
            if($product){
                ShoppingCart::associate('App\Models\Product');
                ShoppingCart::add( $id,$product->name, $quantity,$product->presentPrice(),['thumbnail' => $product->thumbnail ]);
            }

    }






    public function exist($id){
        ShoppingCart::totalPrice();
    }





    public function remove($rowID) {
        return ShoppingCart::remove($rowID);
    }

    public function update($request) {
        return ShoppingCart::update($request->rawId, $request->quantity);
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