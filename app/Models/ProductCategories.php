<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jenssegers\Date\Date;
use Spatie\Translatable\HasTranslations;




class ProductCategories extends Base
{
   
    use HasTranslations;


    use SoftDeletes;

    protected $table = 'productscategories';
       protected $translatable  = ['name'];

    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];



    public function products() {
    	return $this->hasMany('App\Models\Product','categoryID');
    }

	public function PresentTotal() {
		$count = $this->products->count();
		if($count > 0 ){
    		return '('. $count .')';
		}
		return '';

    }



    public function store() {
        return $this->belongsTo('App\Models\Stores','store_id');
    }


    public function presentThumbnail($setting = false){
      if(!empty($this->image)){
        return '<img src="/uploads/'. $this->image .'"/>';
      }
      return '';
    }

}
