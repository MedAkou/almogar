<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jenssegers\Date\Date;
use Auth;



class WishList extends Model
{

 		
 	use SoftDeletes;


   protected $table = 'productswishlist';
    
   protected $guarded = ['id', 'created_at', 'updated_at'];
   protected $dates = ['created_at', 'updated_at', 'deleted_at'];


   public function scopeCurrentuser($query){
            return $query->with('product')->where('user_id',Auth::user()->id);
        
    }
    


    public function product(){
    	return $this->belongsTo('App\Models\Product','productID')->withDefault(['name' => 'Not Found']);
    }


}

