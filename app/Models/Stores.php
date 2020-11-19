<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jenssegers\Date\Date;

class Stores extends Model
{
        use SoftDeletes;

   protected $table = 'stores';
   protected $guarded = ['id', 'created_at', 'updated_at'];
   protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function presentThumbnail($setting = false){
      if(!empty($this->thumbnail)){
        return '<img src="/uploads/'. $this->thumbnail .'"/>';
      }
      return '';
    }


    public function presentThumbnailback($setting = false){
      if(!empty($this->thumbnail)){
        return  '/uploads/'.$this->thumbnail ;
      }
      return '';
    }


    public function owner(){
           return $this->belongsTo('App\Models\User','user_id')->withDefault([
          		'name' => 'N-A',
           ]);
    }



    public function products(){
           return $this->hasMany('App\Models\Product','store_id')->withDefault([
              'name' => 'N-A',
           ]);
    }




    public function categories() {
              $lang = \App::getLocale();

        return $this->hasMany('App\Models\ProductCategories','store_id')
        ->where('store_id',\Session::get('store_id'));
    }



}
