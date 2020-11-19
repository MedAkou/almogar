<?php

namespace App\Helpers;
use App;
use App\Helpers\Slug;




class ProductHelper {

    public static $langs = ['ar' => 'العربية' ,'en'  => 'English' ,'de'  => 'Deutsch' ,'tr'  => 'Turkish'];



    // create and update Product
    public static function save($content,$request){

        // upload the thumbnail
        $thumbnail =  $request->ProductThumbnail ?? ''; 

        $gallery = $request->gallery ? implode('|||', $request->gallery) : '';

        // upload the gallery and get images list imploded
        //$gallery   = self::uploadGallery($request);
        
        // create slug from product name to use it for seo
        $slug      = self::slugify($request);
        
        // create videos list imploded
        $videos    = self::videos($request);
        
        foreach (self::$langs  as $key => $value) {

            $name = 'title_'.$key;
            $desc = 'description_'.$key;

            if($request->filled($name)){
                $content->setTranslation('name', $key, $request->$name);
            }

            if($request->filled($desc)){
                $content->setTranslation('description', $key, $request->$desc);
            }
                    
        }        

                

        $content->thumbnail   =  $thumbnail;
        $content->gallery     =  $gallery;
        $content->videos      =  $videos;
        $content->price       =  $request->price;
        $content->slug        =  $slug;
        $content->statue      =  $request->statue;
        $content->categoryID  =  $request->category;
        
        $content->weight      =  $request->weight;
        $content->width       =  $request->width;
        $content->length      =  $request->length;
        $content->height      =  $request->height;
        $content->quantity    =  $request->quantity;
        $content->discount    =  $request->discount;
        $content->sku         =  $request->sku;

        $content->store_id       =  $request->user()->store_id;
        $content->lang           =  App::getLocale();
        $content->save();
    }

    public static function  uploadThumbnail($request,$content) {

        $thumbnail = '';

        if(!empty($content->thumbnail)){
            $thumbnail = $content->thumbnail;
        }

        if($request->hasFile('ProductThumbnail')){
            $thumbnail = $request->ProductThumbnail->store('products',['disk' => 'public']);     
        }

        // delete the old image
        if($request->hasFile('ProductThumbnail') and !empty($content->thumbnail) ){
            $file = public_path().'/uploads/'.$content->thumbnail;
            if(file_exists($file)) {
                unlink($file);
            }
        }

        return $thumbnail;
    }



    public static function uploadGallery($request) {
        
        $new = [];
        $old = [];

        if($request->hasFile('gallery')){
            foreach ($request->gallery as $photo) {
                $new[] = $photo->store('products',['disk' => 'public']);
            }
        }

        if($request->has('oldGallery')){
            $old = $request->oldGallery;
        }

        $merge = array_merge($old,$new);
        $gallery = implode('|', $merge);

        return $gallery ?? '';
    }



    public static function slugify($request) {
        if($request->has('title')){
            return Slug::create($request->title,'\App\Models\Product');     
        }
        return ''; 
    }

    public static function videos($request) {
        if($request->has('videos')){
            $videos = implode('|||', $request->videos);
            return $videos;
        }
        return '';
    }



    // delete all product gallery images and thumbnail
    public static function clean($content) {

        /*
        foreach ($content->gallery as $image) {
            if(!empty($image)){
                $file = public_path().'/uploads/'.$image;
                if(file_exists($file)){
                    @unlink($file);    
                }
            }
            
        }
        */

        // delete the old image
        if(!empty($content->thumbnail) ){
            @unlink(public_path().'/uploads/'.$content->thumbnail);
        }

    }

    // delete all the files in products directory
    public static function empty() {

            $dir = public_path().'/uploads/products';
            $files = glob($dir . '/{,.}*', GLOB_BRACE);
            foreach($files as $file){ // iterate files
              if(is_file($file))
               unlink($file); // delete file
            }

    }


}