<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\{Product,Slider,WishList,Addresses,Orders,User};
use App;
use Session;
use Auth;
use Validator;
use Hash;
use Request as req;
use hisorange\BrowserDetect\Parser as Browser;
use \Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class AccountController extends Controller {

	public function __construct(){
		if (!Auth::check()) {
    		//return response()->view(\System::$ACTIVE_THEME_PATH.'/account.user')->send();
		}

	}

	public function edit() {
        return view (\System::$ACTIVE_THEME_PATH.'/account.edit');
    }

    public function orders() {
        return view (\System::$ACTIVE_THEME_PATH.'/account.orders');
    }

    public function order_detail($id) {

    $content = Orders::find($id);
    return view(\System::$ACTIVE_THEME_PATH.'/account.order_detail',compact('content'));
    }

    public function wishlist() {
        $wishlist = WishList::currentuser()->paginate(5);        
        return view (\System::$ACTIVE_THEME_PATH.'/account.wish-list',compact('wishlist')) ;   
    }

	public function forgot()
    {
        return view (\System::$ACTIVE_THEME_PATH.'/account.forgot');
    }

    public function validatePasswordRequest(Request $request)
    {
        //You can add validation login here
        $user = User::where('email', '=', $request->resetemail)
            ->first();
        //Check if the user exists
        //dd($request->resetemail);
        if (!$user)
        {
            return redirect()->back()
                ->withErrors(['email' => trans('User does not exist') ]);
        }

        //Create Password Reset Token
        DB::table('password_resets')
            ->insert(['email' => $request->resetemail, 'token' => str_random(60) , 'created_at' => Carbon::now() ]);
        //Get the token just created above
        $tokenData = DB::table('password_resets')->where('email', $request->resetemail)
            ->first();

        if ($this->sendResetEmail($request->resetemail, $tokenData->token))
        {
            return redirect()
                ->back()
                ->with('status', trans('A reset link has been sent to your email address.'));
        }
        else
        {
            return redirect()
                ->back()
                ->withErrors(['error' => trans('A Network Error occurred. Please try again.') ]);
        }
    }

    public function info() {
     return view (\System::$ACTIVE_THEME_PATH.'/info');
    }

    public function adresses(){
        return view (\System::$ACTIVE_THEME_PATH.'/account.adresses');    
    }

    public function edit_shipping( $id) {
            $address = Addresses::find($id);
            return view (\System::$ACTIVE_THEME_PATH.'/account.update-adress',compact('address'));   
    }

    public function update_shipping($id,Request $request) {

            $address = Addresses::find($id);
            $address->given_name   = $request->given_name;
            $address->country_code = $request->country_code;
            $address->street       = $request->street;
            $address->state        = $request->state;
            $address->city         = $request->city;
            $address->housenumber  = $request->housenumber;
            $address->postal_code  = $request->postal_code;
            $address->phone        = $request->phone;
            $address->save();
            
            return redirect()->route('account.adresses')->with('success',trans('user.shipping.updated'));
    }

    public function shipping_delete($id) {
            Addresses::find($id)->delete();
            return redirect()->route('account.adresses')->with('success',trans('user.shipping.removed'));
    }

    public function shipping_default($id){
        $user_id   = Auth::user()->id;
        $shippping = Addresses::where('user_id',$user_id)->where('is_primary',true)->first();
        if($shippping) {
            $shippping->is_primary= false;
            $shippping->save();
        }
        $hop = Addresses::find($id);
        $hop->is_primary= true;
        $hop->save();                               
        return redirect()->route('account.adresses')->with('success',trans('user.shipping.default'));
    }

    public function shipping_add() {
            return view (\System::$ACTIVE_THEME_PATH.'/account.shipping_add')  ;
        }

    public function shipping_store(Request $request ) {

            $adresse = [
                'given_name'   => $request->given_name,
                'country_code' => $request->country_code,
                'street'       => $request->street,
                'state'        => $request->state,
                'housenumber'  => $request->housenumber,
                'city'         => $request->city,
                'postal_code'  => $request->postal_code,
                'phone'        => $request->phone,
                'user_id'      => Auth::user()->id,
            ];

            Addresses::create($adresse);

            return redirect()->route('account.adresses')->with('success',trans('user.shipping.created'));
        }

    public function user(Request $request){
        return view (\System::$ACTIVE_THEME_PATH.'/account.user') ;   
    }

    public function  userAuth(Request $request) {



        if(!$request->filled('username') and !$request->filled('password') ){
            return redirect()->route('user')->withInput()->with('error',trans('user.wrong.auth'));
        }

        $username = $request->username;
        $password = $request->password;

        $user = User::where('email',$username)->where('role','!=','manager')->where('role','!=','merchant')->where('statue','!=','blocked')->first();


        if(!$user){

        }

        if (Auth::attempt(['email' => $username, 'password' => $password])){
            $id_user = Auth::user()->id;
            $lastlogin = User::find($id_user);
            $lastlogin->last_login = Carbon::now();
            $lastlogin->save(); 

            return redirect('/');   
        }

        else {        
             return redirect()->route('account.user')->with('error',trans('user.wrong.auth'));
        } 
        
    }

    public function  registration(Request $request) {
        $geo = geoip(req::ip());

        $rules = [
          'email' => 'required|email|unique:users', 
        ];

        $messages = [
            'email.required' => trans("email.required"),
        ];

        $request->validate($rules,$messages);


        $user           =  new User();
        $user->password =  Hash::make($request->password);
        $user->email    =  $request->email;
        $user->name     =  $request->name;
        $user->ip       =  \Request::ip();
        $user->device   =  Browser::platformName();
        $user->browser  =  Browser::browserFamily();
        $user->country  =  $geo['country'];
        $user->statue   =  'active';
        $user->last_login = Carbon::now();

        if ($request->filled('phone')) {
            $user->phone = $request->phone;
        }
        $user->save();

        // email data
        $email_data = array(
            'name' => $request->name,
            'email' => $request->email,
        );
        

        /*
        // send email with the template
        Mail::send('emails.welcome_email', $email_data, function ($message) use ($email_data) {
            $message->to($email_data['email'])
                    ->subject('Welcome to o-bazaar')
                    ->from('contact@o-bazaar.com', 'Welcome');
        });
        */

        Auth::loginUsingId($user->id);

        return response()->json(["success" => "User registred successfully"]);
    }

    public function  update(Request $request) {
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
            return redirect()->route('account.edit')->with('success',trans('user.account.updated'));
        }
        return redirect()->route('account.user');  

    }

    public function password() {
        return view (\System::$ACTIVE_THEME_PATH.'/account.password');
    }

    public function passwordUpdate(Request $request) {


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

            return redirect()->route('account.password')->withErrors(['error',trans('user.pwd.wrong')]);
        }


        if($request->newpassword == $request->password_confirmation ) {
          
                $user->password = Hash::make($request->newpassword);
                $user->save();

            return redirect()->route('account.password')->withErrors(['success',"trans('user.pwd.updated')"]);
        }

        return redirect()->route('account.password')->withErrors(['error','user.pwd.wrong.match']);
    }

    public function clearwishlist(Request $request) {
       $user = Auth::user();
       $user->wishlist->each->delete();
       return redirect()->route('account.wishlist')->with(['success',trans('wishlist.cleared')]);   
    }
  
    

}
