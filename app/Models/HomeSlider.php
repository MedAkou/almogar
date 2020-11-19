<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jenssegers\Date\Date;



class HomeSlider extends Base
{
     use SoftDeletes;

   protected $table = 'homeslider';
    
   protected $guarded = ['id', 'created_at', 'updated_at'];
   protected $dates = ['created_at', 'updated_at', 'deleted_at'];



   public function presentThumbnail($setting = false){
      if(!empty($this->image)){
        return '<img src="/uploads/'. $this->image .'"/>';
      }
      return '';
   }


   public function presentSlider($setting = false){
      if(!empty($this->image)){
        return '<img class="d-block w-100" src="/uploads/'. $this->image .'" alt="slider">';
      }
      return '';
   }


}
