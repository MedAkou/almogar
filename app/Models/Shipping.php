<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jenssegers\Date\Date;



class Shipping extends Base
{
     use SoftDeletes;

   protected $table = 'shipping';
    
   protected $guarded = ['id', 'created_at', 'updated_at'];
   protected $dates = ['created_at', 'updated_at', 'deleted_at'];

   public function PresentCost() {
            return '$'.$this->cost;
  }


  
}
