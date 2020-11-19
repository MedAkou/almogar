<?php

namespace App\Http\Controllers;
use App\Models\{HomeSlider , Stores , AdsManager};

use Illuminate\Http\Request;

class BaseController extends Controller
{



    
    public function index() {
        
        $sliders = HomeSlider::get();
        
        $stores  = Stores::paginate(12);

        $ads     = AdsManager::all();

        $view = $this->theme.'home';
        
        return view($view,compact('sliders','stores','ads'));   

    }
   





}
