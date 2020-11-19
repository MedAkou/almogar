<?php

namespace App\Http\Controllers\Merchant;
use \App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class MerchantAuthController extends Controller
{


    public function form() {

      if( Auth::user() && Auth::user()->role == 'merchant' &&  Auth::user()->statue !== 'blocked' ){
           return redirect('/merchant');
      }
      return view('admin.auth.login');   
    } 


       
    public function login(Request $request) {
            

      $email    = $request->email;
      $password = $request->password;


     $rules = [
        'email'           => 'required|max:255|email',
        'password'           => 'required',
     ];
  
     $request->validate($rules);


      $user = User::where('email',$email)->where('role','merchant')->where('statue','!=','blocked')->first();

      if($user) {

        if (Auth::guard()->attempt(['email' => $email, 'password' => $password], $request->get('remember'))) {
           \Session::put('device_user_token',$user->id);
        //   dd(\Session::get('device_user_token'));

          //Session::put($name, $file_name)
             \Session::put('device_user_token',$user->id);
            return redirect('/merchant');
        }
      }
        return back()->withInput($request->only('email', 'remember'))->with('error',trans('login.wrong'));


    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/');
    }


}
