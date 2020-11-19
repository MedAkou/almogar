<?php

namespace App\Http\Controllers\Manager;
use \App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;
use App\Helpers\UsersHelper;
use Lang;

class ManagerUsersController extends Controller {

    public function store(Request $request) {

        $rules = [
          'email'    => 'required|email|unique:users', 
          'password' => 'required|min:3',
          'name'     => 'required|string|min:4',
          'phone'    => 'required',
        ];

        $messages = [
            'email.required'    => trans("email.required"),
            'email.email'       => trans("email.unique"),
            'email.unique'      => trans("name.required"),
            'password.required' => trans("password.required"),
            'password.min'      => trans("password.min"),
            'name.required'     => trans("name.required"),
            'phone.required'    => trans("phone.required"),
        ];

        $request->validate($rules,$messages);
        $user = UsersHelper::store($request);
        return redirect()->route('manager.users.home')->with('success', trans('user.created'));
    }

    public function edit($id){     
        $content = User::find($id);
        return view ('manager.users.edit',compact('content'));
    }

   public function activate($id) {
        $content= User::find($id);
        $content->statue='active';
        $content->save();
        return redirect()->route('manager.users.home')->with('success', trans('user.activated'));
    }

    public function block($id) {
        $content= User::find($id);
        $content->statue='blocked';
        $content->save(); 
        return redirect()->route('manager.users.home')->with('success',trans('user.blocked'));    
    }


    public function index() {
        $users = User::orderby('id','desc')->paginate(10);
        return view('manager.users.index',compact('users'));
    }

    public function create() {
        return view('manager.users.create');
    }

    public function account(){
        return view('manager.users.account');
    }

    public function update(Request $request, $id) {

        $user = User::find($id);
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->phone    = $request->phone;

        if($request->filled('password')){
            if($request->password == $request->repassword){
                $user->password = \Hash::make($request->password);
            }else {
                return redirect()->back()->with('error', 'password dosent match');
            }
        }

        $user->save();

        return redirect()->route('manager.users.home')->with('success', trans('user.updated'));
    }

    public function delete($id) {
        $content= User::find($id);
        $content->delete();
        return redirect()->route('manager.users.home')->with('success',trans('user.deleted'));
    }

    public function bulkdelete() {
        User::truncate();
        return redirect()->route('manager.users.home')->with('success',trans('user.bluckdelete'));
    }

    public function updateAdminInfo(Request $request) { 

        $user = \Auth::user();

        $message = 'all fields are required';
        $alert   = 'error';

        if(!empty($request->username) and !empty($request->email)) {
            $user->name = $request->username;
            $user->email    = $request->email;
            $user->save();

            $message = trans('user.adminUpdated');
            $alert   = 'success';
        }

        return redirect()->route('manager.account')->with($alert,$message);    
    }

    public function updateAdminPassword(Request $request) { 

        $user = \Auth::user();

        $message = trans('user.oldMessageWrong');
        $alert   = 'error';

        if (\Hash::check($request->old_pass, $user->password)) {
                if($request->new_pass == $request->new_pass_re ){
                    $user->password = \Hash::make($request->new_pass);
                    $user->save();
                }
                $message = trans('user.adminPwdUpdated');
                $alert   = 'success';
        }

        return redirect()->route('manager.account')->with($alert,$message);    
    }

    
}
