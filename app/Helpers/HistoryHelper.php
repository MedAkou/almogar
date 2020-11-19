<?php

namespace App\Helpers;
use Session;

class HistoryHelper {

        
        public $history ;

        public function __construct() {

            session_start();
                 
            if (isset($_SESSION['browser_histoy'])){

                $url = \Request::fullUrl();

                if( (!strpos($url, 'filemanager')) and (!strpos($url, 'uploads'))  ){
                        $check = explode('.',$url );
                        if(end($check) != 'woff2' ){
                          if(end($_SESSION['browser_histoy']) != \Request::fullUrl()){
                              $_SESSION['browser_histoy'][] = \Request::fullUrl();
                        }
                      }
                }

                return true;
            }

            $_SESSION['browser_histoy'] = [];
            $_SESSION['browser_histoy'][] = \Request::fullUrl();

            return true;
        }


        public static function get($x) {
            if(isset($x) and is_numeric($x)) {
                $history = array_reverse($_SESSION['browser_histoy']);
                return $history[$x];
            }
        }


}