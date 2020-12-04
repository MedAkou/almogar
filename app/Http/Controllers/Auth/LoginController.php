<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    
    // where to redirect after admin login
    protected $redirectToDashboard = '/merchant';

    public function logout(Request $request)
    {
        // $this->guard()->logout();
        // $request->session()->flush(); // this method should be called after we ensure that there is no logged in guards left
        // $request->session()->regenerate(); //same 
        Auth::logout();
        return redirect('/');
    }


    public function showLoginForm()
    {
        return view('website.auth.login');
    }

    public function showAdminLoginForm()
    {

        return view('admin.auth.login', ['url' => 'admin']);
    }
    

    public function AdminLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:1'
        ]);

        //dd('ldkdlkdlkd');
        if (Auth::guard()->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            return redirect()->intended($this->redirectToDashboard);
        }
        return back()->withInput($request->only('email', 'remember'))->with('error',trans('user.wrong.auth'));
    }

}
