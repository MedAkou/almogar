<?php

namespace App\Http\Controllers;
use App\Models\{HomeSlider , Stores , AdsManager};

use Illuminate\Http\Request;

class BaseController extends Controller
{



    
    public function index() {


        
        $sliders = HomeSlider::get();
        
        $stores  = Stores::with('owner')->paginate(12);

        $view = $this->theme.'home';
        
        return view($view,compact('sliders','stores'));   

    }
   





}
