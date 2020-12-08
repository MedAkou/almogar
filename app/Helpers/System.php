<?php

namespace App\Helpers;
use App\Models\{User,Addresses};
use ShoppingCart;
use Auth;
use Illuminate\Support\Facades\App;
use \Mobile_Detect;



class System {
    

    public static $LANGS = ['ar','de','tr','ir'];
    public static $LANGS_NAME = ['ar' => 'العربية','de'=> 'Deutsch','tr' => 'Turkish','ir' => 'فارسى'];
    public static $LTR_LANG = ['tr','de'];
    public static $RTL_LANG = ['ar','ir'];
    public static $CURRENT_LANG ;
    public static $ACTIVE_THEME_PATH = 'theme' ;



    public function __construct(){

        self::$CURRENT_LANG =  App::getLocale();
    }


    public static function checkauth($type){
        if($type == 'merchant'){
            if( Auth::user() &&
                Auth::user()->role == 'merchant' &&
                !empty(Auth::user()->store_id) &&
                is_numeric(Auth::user()->store_id)
            ){
                if(strpos(\Route::currentRouteName(),'admin') !== false)
                    return true;
            }
            return false;
        }
        if($type == 'manager'){
            if( Auth::user() &&
                Auth::user()->role == 'manager' &&
                !empty(Auth::user()->store_id) &&
                is_numeric(Auth::user()->store_id)
            ){
                if(strpos(\Route::currentRouteName(),'manager') !== false)
                    return true;
            }
            return false;
        }
    }

    public static function ismobile(){
        $detect = new Mobile_Detect;
        if($detect->isMobile())
            return true;

    }
    
    
    public static function userId(){
        if (Auth::check())
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
       new self();
       return  in_array( self::$CURRENT_LANG ,  self::$RTL_LANG);
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