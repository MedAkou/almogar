<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Product;
use \App\Helpers\Cart;
use Response;
class CartController extends Controller
{


    public function index() {
        $cart = (new Cart())->get();
        $total = (new Cart())->total();
        return view ($this->theme.'cart',compact('cart','total'));
    }

    public function add($store,$id,Request $request) {
		if($request->has('quantity')){
				$quantity = $request->quantity ;
		}else {
				$quantity = 1 ;
		}
		
		
        (new Cart())->add($id,$quantity);

        if($request->ajax()){
             return   Response::json(['success'=>true]);
        }

        return redirect()->route('cart',compact('store'))->with('message',trans('cart.added'));
    }
   
    public function remove($store,$id){
        (new Cart())->remove($id);
        return redirect()->back()->with('message',trans('cart.removed'));
        return redirect()->route('cart',compact('store'))->with('message',trans('cart.removed'));
    }

    public function update(Request $request){
         
        (new Cart())->update($request);
           if($request->ajax()){
             return   Response::json(['success'=>true]);
        }
        return redirect()->route('cart',compact('store'))->with('message',trans('cart.updated'));
    }

    public function clear(){
        (new Cart())->clear();
        return redirect()->back()->with('message',trans('cart.cleared'));
    }


}
