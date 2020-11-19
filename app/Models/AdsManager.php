<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jenssegers\Date\Date;



class AdsManager extends Base
{

     use SoftDeletes;

   protected $table = 'adsmanager';
    
   protected $guarded = ['id', 'created_at', 'updated_at'];
   protected $dates = ['created_at', 'updated_at', 'deleted_at'];



    public function underSlider(){
    	if($this->area !== 'under_slider') {
    		return '';
    	}
    	return $this->PresentAd();
    }



    public function underStors(){
    	if($this->area !== 'under_stores') {
    		return '';
    	}
    	return $this->PresentAd();
    }



        public function PresentImage() {
           return '<img src="/uploads/'. $this->image .'"/>';
        }
    

    public function PresentAd(){

    	if($this->statue !== 'active') {
    		return '';
    	}

        if(!empty($this->image) and empty($this->htmlcode)){
           $image = $this->PresentImage();
           if(!empty($this->url)): 
                return '<a href="'. $this->url .'">'.$image.'</a>';
           endif;
           return $image;
        }
   
        if(!empty($this->htmlcode)){
        	return $this->htmlcode;
        }

        return '';

    }
}
