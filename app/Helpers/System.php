<?php

namespace App\Helpers;
use App\Models\{User,Addresses};
use ShoppingCart;
use Auth;


class System {

    public static function checkauth($type){
        if($type == 'merchant'){
            if(Auth::user() && Auth::user()->role == 'merchant' && !empty(Auth::user()->store_id) && is_numeric(Auth::user()->store_id)){
                if(strpos(\Route::currentRouteName(),'admin') !== false){
                    return true;
                }
            }
            return false;
        }
        if($type == 'manager'){
            if(Auth::user() && Auth::user()->role == 'manager' && !empty(Auth::user()->store_id) && is_numeric(Auth::user()->store_id)){
                if(strpos(\Route::currentRouteName(),'manager') !== false){
                    return true;
                }
            }
            return false;
        }
    }
    
    public static function userId(){
        return Auth::user()->id;
    }

    public static function merchantId(){
        if(self::checkauth('merchant')){
            return Auth::user()->id;
        }
    }

    public static function managerId(){
        if(self::checkauth('merchant')){
            return Auth::user()->id;
        }
    }
    


}