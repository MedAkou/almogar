<?php

namespace App\Helpers;
use App;


class AdsHelper {

    public function dirAttribute() {
         
         $lang = App::getLocale();

         if($lang == "ar") {
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

         if($lang == "ar") {
            $file = 'rtl.css';
         }else {
            $file = 'ltr.css';
         }

         $version = env('ASSETS_VERSION');

         return '<link rel="stylesheet" type="text/css" href="/assets/admin/css/'.$file.'?v='.$version.'" />';
         
    }








}