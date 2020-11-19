<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jenssegers\Date\Date;
use Spatie\Translatable\HasTranslations;

use App\Models\Base;

class Product extends Base {

    use HasTranslations;

   use SoftDeletes;

   protected $translatable  = ['name','description'];
   protected $table = 'products';
    
   protected $guarded = ['id', 'created_at', 'updated_at'];
   protected $fillable = ['name', 'description'];
   protected $dates = ['created_at', 'updated_at', 'deleted_at'];



    public function scopeByCategory($query,$id) {
         return $query->where('categoryID',$id);
    }

    public function scopeActive() {
         return Product::where('active',1);
    }

    public function presentcalculateDiscount(){
      if(!empty($this->discount) && is_numeric($this->discount) && !empty($this->price) && is_numeric($this->price)){
        $discount = 100 - (($this->discount * 100) / $this->price);
        if($discount != 0){
        	return '';
          return '<div class="ps-product__badge">- '.number_format($discount , 2).' %</div>';
        }
      }
    }

    public function presentRealPrice(){
      if(!empty($this->discount) && is_numeric($this->discount) && !empty($this->price) && is_numeric($this->price)){
        $discount = 100 - (($this->discount * 100) / $this->price);
        if($discount != 0){
          return '<p class="dress-card-para"><span class="dress-card-price">€ '. $this->price_format($this->discount) .'</span><span class="dress-card-old-price">€ '. $this->price_format($this->price).'</span></p>';
        }
        else{
          return '<p class="dress-card-para"><span class="dress-card-price">€ '.   $this->price_format($this->price).'</span></p>';
        }
      }
    }

   
    public function snippet() {
           return $this->set_snippet($this->description);
    }

    public function set_snippet( $text ) {
        return substr(strip_tags($text), 0, 150)."[''']";
    }



   public function presentThumbnailDashboard($setting = false){
      if(!empty($this->thumbnail)){
        return '<img id="profile-photo-preview" src="'. $this->thumbnail .'"/>';
      }
      return '';
    }

    public function presentThumbnailback($setting = false){
      if(!empty($this->thumbnail)){
        return 'sss';
      }
      return '';
    }
  

    public function presentThumbnailList($setting = false){
      if(!empty($this->thumbnail)){
        return '<img src="'. $this->thumbnail .'"/>';
      }
      return '';
    }
  
    

    public static function check($id) {
            $content = Self::find($id);
            if($content){
              return $content;
            }
    }

    public function videos(){
            return explode('|||', $this->videos);
    }

    public function gallery(){
      $list =  explode('|||', $this->gallery);
      return $list;
    }
    
    
    public function presentThumbnail($setting = false){
      if(!empty($this->thumbnail)){
        return '<img class="product" src="'. $this->thumbnail .'"/>';
      }
      return '';
    }

    public function scopeMightAlsoLike($query) {
        return $query->inRandomOrder()->take(4);
    }


  

    public function presentPrice() {
       if(!empty($this->discount) && is_numeric($this->discount) && !empty($this->price) && is_numeric($this->price)){
        $discount = 100 - (($this->discount * 100) / $this->price);
        if($discount != 0){
          return $this->price_format($this->discount);
        }
        else{
          return $this->price_format($this->price);
        }
      }
    }

    public function presentDiscountPrice() {
       return $this->price_format($this->discount) ?? '' ;
    }
    

    public function presentDiscount() {
       if(!empty($this->discount) && !empty($this->price)){
          return ceil((($this->price - $this->discount)*100) /$this->price).'%' ;
       }
       return '';
    }



     public function categorie(){
        return $this->belongsTo('App\Models\ProductCategories','categoryID')
      
        ->withDefault([
          'name' => 'N-A',
        ]);
    }



    protected function price_format($price){
        $price = floatval($price);
        $price = number_format($price, 2, '.', ',');
        return $price;
    }





}
