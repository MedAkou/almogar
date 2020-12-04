<?php

namespace App\Helpers;
use App;
use App\Models\{BaseMenus , Menus , ProductCategories};

class AppHelper {



    public function PresentLang() {
        if(in_array(System::$CURRENT_LANG, System::$LANGS)){
            return System::$LANGS_NAME[System::$CURRENT_LANG];
        }
    }



    public function WebsiteMenu($area) {
        if(in_array($area, ['phone','top','main','footer'])){
             $menu = BaseMenus::Lang()->where('area',$area)->first();
             if($menu) return $menu->main_menu();
             return '';
        }
    }

    public function MerchantMenu($area) {
        if(in_array($area, ['phone','top','main','footer','homeCategories'])){
             $menu = Menus::Lang()->Merchant()->where('area',$area)->first();
             if($menu) return $menu->main_menu();
             return '';
        }
    }

    public function dirAttribute() {
        return in_Array(App::getLocale() , System::$RTL_LANG) ? 'dir=rtl' : 'dir=ltr';
    }

    public function langAttribute() {
         return 'lang='.App::getLocale();
    }

    public function DashboardCss() {
        $file = in_Array(App::getLocale() , System::$RTL_LANG) ? 'rtl.css' : 'ltr.css';
        return '<link rel="stylesheet" type="text/css" href="/assets/admin/css/'.$file.'?v='.env('ASSETS_VERSION').'" />'; 
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