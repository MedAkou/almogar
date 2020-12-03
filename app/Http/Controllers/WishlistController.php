<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WishList;
use Auth;

class WishlistController extends Controller {
 

    public function clear(Request $request) {
       $user = Auth::user();
       $user->wishlist->each->delete();
       return redirect()->route('wishlist',['store' => $request->store ])->with('success',trans('wishlist.cleared'));   
    }

   
    public function add($store,$id,Request $request) {
      if (Auth::check()) {
          $user_id = Auth::user()->id;
         $data = [ 'user_id' => $user_id, 'productID' => $id ];

        
         WishList::firstOrCreate($data);
         if($request->ajax()){
             return   WishList::where('user_id',$user_id)->count();
        }
         return redirect()->back()->with('success',trans('wishlist.added')); 
      }
       return view ($this->theme.'user');  
    }

    
    public function remove($store,$id,Request $request){
        $wish = WishList::find($id);
        if($wish){
            $wish->delete();
            return redirect()->route('wishlist',['store' => $request->store ])->with('success',trans('wishlist.removed'));   
        }
        return redirect()->route('wishlist',['store' => $request->store ]);   
    }

}
