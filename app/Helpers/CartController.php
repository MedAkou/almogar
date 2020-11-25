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
<<<<<<< HEAD
        if(Auth::check()){
            $dbcart = ModelsCart::where('user_id',Auth::user()->id)->get();dd($dbcart->id);
            return view ($this->theme.'cart',compact('cart','total','dbcart'));
        }
        
        return view ($this->theme.'cart',compact('cart','total'));
=======
        if(\Session::has('store_id')){
            $id = \Session::get('store_id');
        }
        if(Auth::check()){
            $dbcart = ModelsCart::where('user_id',Auth::user()->id)->get('id');//dd($dbcart);
            return view ($this->theme.'cart',compact('cart','total','dbcart', 'id'));
        }
        return view ($this->theme.'cart',compact('cart','total', 'id'));
>>>>>>> 8a4c333be6932b464644c690530dab1691c0023f
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