<?php

namespace App\Helpers;
use App;
use App\Models\{BaseMenus , Menus , ProductCategories};

class AppHelper {



    public function PresentLang() {
        $lang = App::getLocale();
        if(in_array($lang, ['ar','en','fr','tr','de','ir'])){
            
            if($lang == 'ar'){
                return 'العربية';
            }

            if($lang == 'fr'){
                return 'Français';
            }
            

            if($lang == 'de'){
                return 'Deutsch';
            }
            
            if($lang == 'tr'){
                return 'Turkish';
            }

            if($lang == 'en'){
                return 'English';
            }

            if($lang == 'ir'){
                return 'فارسى';
            }
        }
    }



    public function WebsiteMenu($area) {
        if(in_array($area, ['phone','top','main','footer'])){
            
             $menu = BaseMenus::Lang()->where('area',$area)->first();
             if($menu){                
                return $menu->main_menu();
             }
             return '';
        }
    }

    public function MerchantMenu($area) {
        if(in_array($area, ['phone','top','main','footer','homeCategories'])){
            
             $menu = Menus::Lang()->Merchant()->where('area',$area)->first();
             if($menu){                
                return $menu->main_menu();
             }
             return '';
        }
    }

    public function dirAttribute() {
         
         $lang = App::getLocale();

         $rtl_langs =['ar','ir'];

         if(in_Array($lang , $rtl_langs)) {
            
            return 'dir=rtl';
         }else {
            return 'dir=ltr';
         }
    }


    public function langAttribute() {
         $lang = App::getLocale();
         return 'lang='.$lang;
    }


    public function DashboardCss() {

         $lang = App::getLocale();

        $rtl_langs =['ar','ir'];


         if(in_Array($lang , $rtl_langs)) {
            $file = 'rtl.css';
         }else {
            $file = 'ltr.css';
         }

         $version = env('ASSETS_VERSION');

         return '<link rel="stylesheet" type="text/css" href="/assets/admin/css/'.$file.'?v='.$version.'" />';
         
    }

    public function storecategories() {
        $categories = ProductCategories::Merchant()->orderby('id','desc')->get();
        $html = '';
        $slug  = \Session::get('store').'/category/';

        foreach ($categories as $category) {

            $image = "";

            if(!is_null($category->image)) {
                 $image = '<img src="/uploads/'. $category->image .'"/>';
            }

            $html .= '<li class="current-menu-item row"> <div class="catimg"> '. $image .' </div> <a href="'.$slug.$category->slug.'">'.$category->name.'</a></li>';
        }

        return $html;
    }


    public function currentstorecategories() {
        $categories = ProductCategories::where('store_id',\Session::get('store_id'))->orderby('id','desc')->get();
        $html = '';
        $slug  = \Session::get('store').'/category/';

        foreach ($categories as $category) {



            $html .='<li class="drop-menu">
                    <a class="" href="'. route('category',['store' => \Session::get('store') , 'slug'  =>  $category->slug   ]) .'">
                        <span>'.$category->name.'</span>                        
                    </a>
              </li>';
        }

        return $html;
    }


}