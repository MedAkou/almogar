<?php

namespace App\Http\Controllers\Manager;
use \App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Post, Stores , Orders , User , Ads};

class ManagerController extends Controller {


    public function home() {
        
        $stores = Stores::count();
        
        $orders = Orders::count();
        
        $users = User::count();
        
        $ads   = Ads::count();
        
        return view('manager.statique.home',compact('users','stores','orders','ads'));
    }


    public function HomeSlider() {
        return view('website.blog',compact('posts'));
    }

    public function account() {
        return view('manager.users.account');
    }


}
