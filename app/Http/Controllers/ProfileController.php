<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Product,Slider,wishlist,Addresses};
use Session;
use Auth;
use Validator;
use Hash;


class ProfileController extends Controller {


    public function password() {
        return view ($this->theme.'password');
    }



    public function passwordUpdate($store,Request $request) {


        $user = $request->user();


        $rules = [
          'password' => 'required|min:3',
          'newpassword' => 'required|min:3',
          'password_confirmation' => 'required|min:3',
        ];

        $customMessages = [
            'required' => 'wrong password'
        ];

        $request->validate($rules, $customMessages);

        if (!Hash::check($request->password, $user->password)) {

            return redirect()->route('password',['store' => $store ])->with('error',trans('wrong password'));
        }


        if($request->newpassword == $request->password_confirmation ) {
          
                $user->password = Hash::make($request->newpassword);
                $user->save();

            return redirect()->route('password',['store' => $store ])->with('success',trans('user.pwd.updated'));
        }

        return redirect()->route('password',['store' => $store ])->with('error','wrong password');
    }
    

    
    public function edit_shipping($store , $id) {
            $address = Addresses::find($id);
            return view ($this->theme.'update-adress',compact('address'));   
    }


    public function update_shipping($store,$id,Request $request) {

            $address = Addresses::find($id);
            $address->given_name   = $request->given_name;
            $address->country_code = $request->country_code;
            $address->street       = $request->street;
            $address->state        = $request->state;
            $address->city         = $request->city;
            $address->postal_code  = $request->postal_code;
            $address->phone        = $request->phone;
            $address->save();
            
            return redirect()->route('adresses',['store' => $store ])->with('success',trans('user.shipping.updated'));
    }


    public function shipping_delete($store,$id) {
            Addresses::find($id)->delete();
            return redirect()->route('adresses',['store' => $store ])->with('success',trans('user.shipping.removed'));
    }       



    public function shipping_default($store,$id){
        $user_id   = Auth::user()->id;
        $shippping = Addresses::where('user_id',$user_id)->where('is_primary',true)->first();
        if($shippping) {
            $shippping->is_primary= false;
            $shippping->save();
        }
        $hop = Addresses::find($id);
        $hop->is_primary= true;
        $hop->save();                               
        return redirect()->route('adresses',['store' => $store ])->with('success',trans('user.shipping.default'));
    }



    public function edit() {
        if(!$this->checkUserAuth()){
            return view ($this->theme.'edit');    
        }
    }



    public function  update($store , Request $request) {
        $user = Auth::user();
        $validator = Validator::make($request->all(), [
          'email' => 'required|email|unique:users,email,'.$user->id, 
          'name' => 'required|string|min:4',
        ]);

        if (!$validator->fails()) {
            $user->email = $request->email;
            $user->name = $request->name;
            if ($request->filled('phone')) {
                $user->phone = $request->phone;
            }
            $user->save();
            return redirect()->route('edit',['store' => $store ])->with('success',trans('user.account.updated'));
        }
        return redirect()->route('user',['store' => $store ]);  

    }




}
