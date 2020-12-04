<?php

namespace App\Http\Controllers;

use Response;
use \App\Helpers\Cart;
use \App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Cart as ModelsCart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{


    public function index() {
        $cart = (new Cart())->get();
        $total = (new Cart())->total();
        
        return view ($this->theme.'cart',compact('cart','total'));
    }

    public function add($store,$id,Request $request) {
        $quantity = $request->has('quantity') ? $request->quantity : 1;
        (new Cart())->add($id,$quantity);
        if($request->ajax()){
            return response()->json(["success" => "Product added to cart successfully"]);
        }

        return redirect()->route('cart',compact('store'))->with('message',trans('cart.added'));
    }
   
    public function remove(Request $request ,$store,$id){
        (new Cart())->remove($request->product_id,$id);
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