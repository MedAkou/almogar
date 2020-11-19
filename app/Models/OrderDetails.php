<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jenssegers\Date\Date;


class OrderDetails extends Authenticatable{

 use SoftDeletes;

   protected $table = 'orderdetails';
    
   protected $guarded = ['id', 'created_at', 'updated_at'];
   protected $dates = ['created_at', 'updated_at', 'deleted_at'];



   public function product()    {
        return $this->belongsTo('App\Models\Product')->withDefault(['name' => 'N-A']);
   }

  


}
