<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Session;
use Auth;

class Controller extends BaseController
{

    public $theme = 'theme2/';

    public $langs = ['ar' => 'العربية' ,'en'  => 'English' ,'de'  => 'Deutsch' ,'tr'  => 'Turkish'];

    
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function success($message){
    	return session::flash('success',$message);
    }
    public function error($message){
    	return session::flash('error',$message);
    }


    	

	public function checkUserAuth() {
		$store = Session::get('store');
	    if(!Auth::check()){
    		return redirect()->route('user', ['store' =>$store ]);
     	}
    }


}