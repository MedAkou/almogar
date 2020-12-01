<?php

namespace App\Helpers;
use App\Models\{User,Addresses};
use ShoppingCart;
use Auth;
use Illuminate\Support\Facades\App;
use \Mobile_Detect;

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

    public static function ismobile(){
        $detect = new Mobile_Detect;
        if($detect->isMobile()){
            return true;
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

    public static function isRtl(){
        return App::getLocale() == 'ar';
    }
    
    public static function currency(){
        switch(App::getLocale()){
            case 'ar': return '€';
            case 'de': return '€';
            case 'tr': return '€';
        }
    }

    public static function currentStoreId(){
        if (\Session::has('store_id')) 
            return \Session::get('store_id');
    }

    public static function shoppingCartIsNotEmpty(){
        if (\Session::has('shopping_cart'))
            return \Session::get('shopping_cart')['default'] && count(\Session::get('shopping_cart')['default']);
    }


}