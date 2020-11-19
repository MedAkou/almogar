<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Models\Stores;
use Session;
use View;


class Store {
    


    public function handle($request, Closure $next) {

            

        $count = 0;
        if(Auth::check()){
                $count= \App\Models\WishList::where('user_id', \Auth::user()->id )->count();
        } 
        View::share('wishlist_count', $count);         



            $routeName = $request->route()->getName();
            if(strpos($routeName, 'admin.') === 0){
                Session::put('admin_views','true');
            }else {
                 Session::forget('admin_views');
            }

            Session::put('currentRoute',$routeName);

            $store = Stores::where('slug',$request->store)->first();
            //dd($store->categories);
            
            if($store){

               		Session::put('store_id',$store->id);
               		Session::put('store',$store->slug);
                  View::share('store', $request->store);
                  View::share('activeStore', $store);
            }
            
            return $next($request);
            
            Session::forget('store_id');
            Session::forget('store');

            abort(404);
        
    }
}
