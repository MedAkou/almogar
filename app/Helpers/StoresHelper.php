<?php


namespace App\Helpers;
use App\Models\{User , Stores};
use Hash;

class StoresHelper {


    
    public function rules()
    {
        return [
            'email' => 'required|email|unique:users',
            'name' => 'required|string|max:50',
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email is required!',
            'name.required' => 'Name is required!',
            'password.required' => 'Password is required!'
        ];
    }



    public function manipulate($store,$request) {
        $store->name        = $request->storename;
        $store->street      = $request->street;
        $store->description = $request->description;
        $store->postal_code = $request->postalcode;
        $store->latitude    = $request->latitude;
        $store->longitude   = $request->longitude;
        $store->slug        = str_slug($request->url);

        if(isset($request->user_id) and !empty($request->user_id)) {
            $store->user_id     = $request->user_id;
        }

        if($request->hasFile('thumbnail')){
            $store->thumbnail  = $request->thumbnail->store('stores',['disk' => 'public']);     
        }

        $store->save();
        return $store;
    }



    public static function update($request,$id) {
        $helper  = new self;
        $store = Stores::find($id);
        return $helper->manipulate($store,$request);
    }


    public function createStore($request,$user_id) {
        $store = new Stores ;
        $request->user_id = $user_id;
        return $this->manipulate($store,$request);
    }


    public function createUser($request) {

        $user           = new User();
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->phone    = $request->phone;
        $user->role     = 'merchant';
        $user->statue   = 'active';
        $user->password = Hash::make($request->password);
        $user->save();
        return $user;
        
    }

 
    

    // create and update Store
    public static function save($request){

        $store  = new self;
        
                // create the user 
        $user = $store->createUser($request);

        // create the store 
        $store = $store->createStore($request,$user->id);        
        
        // set the store to user
        $user->store_id = $store->id;
        $user->save();




        

    }


}