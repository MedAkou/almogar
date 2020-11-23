<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jenssegers\Date\Date;
use Auth;
use Session;


class Base extends Model
{


   public function scopeLang($query) {
   	    $lang = \App::getLocale();
        return $query->where('lang', $lang);
   }


   public function scopeMerchant($query) {

    if(Session::get('currentRoute') == "category"){
        return $query->where('store_id',Session::get('store_id'));
    }

	   if (Auth::user() && Auth::user()->role == 'merchant'&& !empty(Auth::user()->store_id)) {
        if(!Session::has('admin_views')){
	         return $query->where('store_id', Auth::user()->store_id);
        }
		}

    if(Session::has('store_id')){
           return $query->where('store_id',Session::get('store_id'));
    }


   }


   
}
