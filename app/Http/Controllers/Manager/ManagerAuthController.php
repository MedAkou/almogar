<?php

namespace App\Http\Controllers\Manager;
use \App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class ManagerAuthController extends Controller
{


    public function login() {
      if ( Auth::user() && Auth::user()->role == 'manager' &&  Auth::user()->statue !== 'blocked' ){
           return redirect('/manager');
      }
      return view('manager.auth.login');   
    } 


       
    public function attempt(Request $request) {
      
      $email    = $request->email;
      $password = $request->password;
      $user     = User::where('email',$email)->where('role','manager')->where('statue','!=','blocked')->first();

      if($user) {

        if (Auth::guard()->attempt(['email' => $email, 'password' => $password], $request->get('remember'))) {
            return redirect('/manager');
        }
      }
        return back()->withInput($request->only('email', 'remember'))->with('error',trans('login.wrong'));


    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/');
    }


}
