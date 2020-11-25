<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\{Product,Slider,Orders,WishList,Addresses,Page,User,ProductCategories,Shipping,BasePages,Stores};
use Session;
use Auth;
use Validator;
use Hash;
use hisorange\BrowserDetect\Parser as Browser;
use Request as req;
use ShoppingCart;
use DB;
use \Carbon\Carbon;
use Mail;

class WebsiteController extends Controller {


 public function loadcartHTML( $store , Request $request) {
     ob_start();
     $store = $request->store;
     $symbol = '€';
    ?>
<div class="ps-cart__items">
    <input type="hidden" id="cartcount" value="<?php  echo  ShoppingCart::count(false);?>">

    <?php  if(!empty(ShoppingCart::all())): foreach(ShoppingCart::all() as $product):  ?>

    <div class="ps-product--cart-mobile">
        <div class="ps-product__thumbnail">
            <a href="<?php  route('shop.product',['id' => $product['id'] , 'store' => $store ])  ?>">
                <img src="<?php  echo $product['thumbnail']  ?>" alt="product" />
            </a>
        </div>
        <div class="ps-product__content lhsabbdyaltele">
            <a class="ps-product__remove"
                href="<?php echo route('cart.remove', ['id' => $product->rawId() , 'store' => $store ])   ?>">
                <i class="icon-cross"></i>
            </a>

            <a href="<?php echo route('shop.product',['id' => $product['id'] , 'store' => $store ])  ?>">
                <?php echo $product['name'];  ?>
            </a>

            <small class="product-col-tele-<?php echo $product['id']  ?>"> <span
                    class="prdqty"><?php echo $product['qty']  ?></span> x €<?php echo  $product['price']  ?> <input
                    type="hidden" class="preis" value="<?php  echo  $product['total']  ?>"> </small>
        </div>
        <div class="form-group--number zaydnaks updowntintele">
            <button class="up">+</button>
            <button class="down">-</button>
            <input class="quantity-ajax form-control instantQuantity" data-product-id='<?php echo $product['id'];?>'
                data-price='<?php echo $product['price'];  ?>' data-product="<?php echo $product->rawId();  ?>"
                type="text" value="<?php echo $product['qty']  ?>">
        </div>
    </div>


    <?php  endforeach;  ?>
    <?php  endif;  ?>
</div>
<div class="ps-cart__footer ps-cart__footer2 ">
    <h3 class="jahnama">
        <?php  trans('Total')  ?><strong><?php echo $symbol  ?><?php  echo  ShoppingCart::total()  ?></strong></h3>
    <figure>
        <a class="ps-btn" href="<?php echo route('cart', ['store' => $store ])  ?>"
            style="background-color: rgb(195, 20, 50);"> <?php echo trans('View Cart')  ?></a>
        <a class="ps-btn" href="<?php echo route('checkout', ['store' => $store ])  ?>"
            style="background-color: rgb(195, 20, 50);"><?php echo trans('Checkout')  ?></a>
    </figure>
</div>





<?php
                  $content = ob_get_clean(); 
                  return $content;
        }





 public function loadcartHTML2( $store , Request $request) {
     ob_start();
     $store = $request->store;
     $symbol = '€';
    ?>



<a href="javascript:;" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true"
    aria-expanded="false" data-display="static">
    <span class="cart-count"> <?php echo  ShoppingCart::count(false) ?></span>
</a>
<div class="dropdown-menu">
    <div class="dropdownmenu-wrapper">
        <div class="dropdown-cart-header">
            <span> <?php  echo  ShoppingCart::count(false);  echo trans(' Items')    ?></span>
            <a href="<?php   route('cart', ['store' => $store ]) ?>"> <?php echo trans('View Cart');  ?></a>
        </div>
        <div class="dropdown-cart-products">
            <?php  if(!empty(ShoppingCart::all())): foreach(ShoppingCart::all() as $product):  ?>
            <div class="product">
                <div class="product-details">
                    <h4 class="product-title">
                        <a href="<?php  route('shop.product',['id' => $product['id'] , 'store' => $store ])  ?>">
                            <?php echo $product['name'];  ?>
                        </a>
                    </h4>

                    <span class="cart-product-info">
                        <span class="cart-product-qty"><?php echo $product['qty']  ?></span> x
                        $<?php echo  $product['price']  ?>
                    </span>
                </div>
                <figure class="product-image-container">
                    <a href="<?php  route('shop.product',['id' => $product['id'], 'store' => $store ])  ?>"
                        class="product-image">
                        <img src="<?php  echo $product['thumbnail']  ?>" alt="product">
                    </a>
                    <a href="<?php  route('cart.remove', ['id' => $product->rawId() , 'store' => $store ])   ?>"
                        class="btn-remove">
                        <i class="icon-cancel"></i>
                    </a>
                </figure>
            </div>
            <?php  endforeach;  ?>
            <?php  endif;  ?>
        </div>

        <div class="dropdown-cart-total">
            <span><?php  trans('Total')  ?></span>
            <span class="cart-total-price"><?php echo $symbol  ?><?php  echo  ShoppingCart::total()  ?></span>
        </div>

        <div class="dropdown-cart-action">
            <a href="<?php route('checkout', ['store' => $store ])  ?>"
                class="btn btn-block"><?php echo trans('Checkout')  ?></a>
        </div>
    </div>
</div>







<?php

$content = ob_get_clean(); 

return $content;

        }




    public function join(){
        return view ($this->theme.'join') ;   
    }



        public function basepage( $slug , Request $request) {
             $page = BasePages::where('slug',$request->slug)->first();

             if(!$page){
                    abort(404);
            }else {
                return view ($this->theme.'page', compact('page'));
            }
        }



        public function websitepage(Request $request ) {

            $slug = $request->page;
            if(is_numeric($request->page)){
                $page = Page::find($slug)->first();    
            }else{
                $page = Page::where('slug',$slug)->first();

                if(!$page){
                    abort(404);
                }
            }
            return view ($this->theme.'page', compact('page'));
        }      
        
    
        public function category($store , $slug , Request $request) {


            $id = Session::get('store_id');
            $category = ProductCategories::where('slug',$slug)->where('store_id',$id)->first();
                    $products = Product::where('store_id',$id)->where('categoryID',$category->id)->where('active',1)->paginate(12);
    


         //   $products = $category->products()->paginate(12);    
            return view ($this->theme.'shop', compact('products'));
        }

        public function page(Request $request ) {

            $slug = $request->page;
            if(is_numeric($request->page)){
                $page = Page::find($slug)->first();    
            }else{
                $page = Page::where('slug',$slug)->first();

                if(!$page){
                    abort(404);
                }
            }
            return view ($this->theme.'page', compact('page'));
        }

        public function searchProccess(Request $request) {
            $q          = $request->q;
            $lang       = \App::getLocale();
            $products   = Product::Merchant()->Active()->where('name->'.$lang,'LIKE','%' . $q . '%')->where('store_id' , Session::get('store_id'))->paginate(10);
            $products->appends(['q' => $q]);
            $storeSlug = Stores::where('id', Session::get('store_id'))->get('slug');
            $count      = $products ->count();
    //        return view ($this->theme.'admin.products.index',compact('products','categories','count'))->withQuery ( $q );


            
            return response()->json(array('products' => $products, 'storeSlug' => $storeSlug), 200);
            // return view ($this->theme.'search', compact('products','q'));

        }

        public function searchProccessTo(Request $request){
            $q          = $request->q;
            $lang       = \App::getLocale();
            $products   = Product::Merchant()->Active()->where('name->'.$lang,'LIKE','%' . $q . '%')->where('store_id' , Session::get('store_id'))->paginate(10);
            $products->appends(['q' => $q]);
            $storeSlug = Stores::where('id', Session::get('store_id'))->get('slug');
            $count      = $products ->count();
    //        return view ($this->theme.'admin.products.index',compact('products','categories','count'))->withQuery ( $q );

            return view ($this->theme.'search', compact('products','q'));
        }


      
        public function adresses(){
            return view ($this->theme.'adresses');    
        }


        public function shipping_add() {
            return view ($this->theme.'shipping_add')  ;
        }


        public function shipping_store(Request $request , $store) {

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

            return redirect()->route('adresses',['store' => $store ])->with('success',trans('user.shipping.created'));
        }


        public function order_detail($store,$id) {

        $content = Orders::find($id);
        return view($this->theme.'order_detail',compact('content'));
        }




    public function shipping_set($store,$id){
        $user_id   = Auth::user()->id;
        $shippping = Addresses::where('user_id',$user_id)->where('is_shipping',true)->first();
        if($shippping) {
            $shippping->is_shipping= false;
            $shippping->save();
        }
        $hop = Addresses::find($id);
        $hop->is_shipping= true;
        $hop->save();                         

        return redirect()->route('checkout',['store' => $store ])->with('success',trans('user.shipping.shipping'));
    }




    public function user(Request $request){
        return view ($this->theme.'user') ;   
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

            return redirect()->route('home',['store' => $request->store ]);   
        }

        else {        
             return redirect()->route('user',['store' => $request->store ])->with('error',trans('user.wrong.auth'));
        } 
        
    }

    


    public function  registration(Request $request) {




        $geo = geoip(req::ip());

        $rules = [
          'email' => 'required|email|unique:users', 
          'password' => 'required|min:3',
          'name' => 'required|string|min:4',
        ];

        $request->validate($rules);

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

        // send email with the template
        Mail::send('emails.welcome_email', $email_data, function ($message) use ($email_data) {
            $message->to($email_data['email'], $email_data['name'], $email_data['email'])
                ->subject('Welcome to o-bazaar')
                ->from('contact@o-bazaar.com', 'Welcome');
        });

        Auth::loginUsingId($user->id);

        return redirect()->route('home',['store' => $request->store ]);       
    }


    public function thankyou() {
        $content = Orders::where('serial',Session::get('order_serial'))->first();
        if($content){

            return view ($this->theme.'thank-you',compact('content'));
        }
        return redirect('/');
    }

    public function down() {
         return view ($this->theme.'down');
    }

    public function home(Request $request){
        

        if(!\Session::has('store_id')){

            $page = BasePages::where('slug',$request->store)->first();

             if(!$page){
                    abort(404);
            }else {
                
                return view ($this->theme.'page', compact('page'));
            }
            
        }else {
            $id = Stores::where('slug',$request->store)->first()->id;
            $products = Product::where('store_id',$id)->where('active',1)->paginate(12);
            $sliders  = Slider::Merchant()->get();
            return view ($this->theme.'index',compact('products','sliders', 'id'));
        }
   
    }

    public function about() {
        return view ($this->theme.'about');
    }

    public function contact() {
        return view ($this->theme.'contact');   
    }

    public function categories() {
        $categories = \App\ProductCategories::all();
        return view ($this->theme.'categories',compact('categories'));
    }

    public function reset() {
     return view ($this->theme.'reset');
    }

    public function info() {
     return view ($this->theme.'info');
    }


    public function product() {
     return view ($this->theme.'product');
    }

    public function terms() {
        return view ($this->theme.'terms');
    }


    public function single() {
        return view ($this->theme.'single');    
    }


 
    public function faqs() {
        return view ($this->theme.'faq')  ;
    }



    public function favorites() {
        return view ($this->theme.'favorites') ;  
    }


    public function cart() {
        return view ($this->theme.'cart')  ; 
    }


    public function wishlist() {
        $wishlist = WishList::currentuser()->paginate(5);        
        return view ($this->theme.'wish-list',compact('wishlist')) ;   
    }

    public function checkout() {
        $shipping = Shipping::all();
        return view ($this->theme.'checkout',compact('shipping')) ;   
    }



    public function account() {
        return view ($this->theme.'account') ; 
    }




    public function forgot()
    {
        return view ($this->theme.'forgot');
    }


    public function blog()
    {
     return view ($this->theme.'blog');
    }


    public function erreur404()
    {
     return view ($this->theme.'404');
    }


    public function orders() {
        return view ($this->theme.'orders');
    }


    public function about_us()
    {
        return view ($this->theme.'about-us')  ;
    }

    public function datenschutzerklarung(){
        return view ($this->theme.'datenschutzerklarung')  ;
    }

    public function faq(){
        return view ($this->theme.'faq')  ;
    }

    public function agb(){
        return view ($this->theme.'agb.index')  ;
    }

    public function kunden(){
        return view ($this->theme.'agb.kunden')  ;
    }

    public function lieferanten(){
        return view ($this->theme.'agb.lieferanten')  ;
    }

    public function lieferanten_Kunden(){
        return view ($this->theme.'agb.kunden-lieferanten')  ;
    }

    public function datenschutzerklarung_kunden(){
        return view ($this->theme.'datenschutzerklarung.kunden')  ;
    }

    public function lieferanten_drittanbieter(){
        return view ($this->theme.'datenschutzerklarung.lieferanten-drittanbieter')  ;
    }


    public function search_blog()
    {
        return view ($this->theme.'search_blog')  ;
    }



    public function  subscribe_email()
    {
        return view ($this->theme.'subscribe_email')  ;
    }



    public function  cart_clear()
    {
        return view ($this->theme.'cart_clear')  ;
    }


    public function validatePasswordRequest(Request $request){
        //You can add validation login here
        $user = User::where('email', '=', $request->resetemail)
            ->first();
        //Check if the user exists
            //dd($request->resetemail);
        if (!$user) {
            return redirect()->back()->withErrors(['email' => trans('User does not exist')]);
        }

        //Create Password Reset Token
        DB::table('password_resets')->insert([
            'email' => $request->resetemail,
            'token' => str_random(60),
            'created_at' => Carbon::now()
        ]);
        //Get the token just created above
        $tokenData = DB::table('password_resets')
            ->where('email', $request->resetemail)->first();

        if ($this->sendResetEmail($request->resetemail, $tokenData->token)) {
            return redirect()->back()->with('status', trans('A reset link has been sent to your email address.'));
        } else {
            return redirect()->back()->withErrors(['error' => trans('A Network Error occurred. Please try again.')]);
        }
    }

    private function sendResetEmail($email, $token)
    {
        //Retrieve the user from the database
        $user = DB::table('users')->where('email', $email)->select('name', 'email')->first();
        //Generate, the password reset link. The token generated is embedded in the link
        $link = env('APP_URL') . 'reset_password/' . $token ;

        // email data
        $email_data = array(
            'name' => $user->name,
            'link' => $link,
            'email' => $email
        );

        // send email with the template
        Mail::send('emails.recover', $email_data, function ($message) use ($email_data) {
            $message->to($email_data['email'], $email_data['name'], $email_data['link'])
                ->subject('Welcome to o-bazaar')
                ->from('contact@o-bazaar.com', 'Welcome');
        });
        if(!Mail::failures()){
            session()->flash('success', trans('Email sent successfully'));
        };
        
        return true;
    }

    public function getPassword($token) {

       return view('auth.passwords.reset', ['token' => $token]);
    }

    public function resetPassword(Request $request)
    {
        //Validate input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
            'token' => 'required' ]);

        $updatePassword = DB::table('password_resets')
                            ->where(['email' => $request->email, 'token' => $request->token])
                            ->first();

        if(!$updatePassword)
            return back()->withInput()->with('error', 'Invalid token!');

          $user = User::where('email', $request->email)
                      ->update(['password' => Hash::make($request->password)]);

          DB::table('password_resets')->where(['email'=> $request->email])->delete();

          return redirect('/')->with('message', 'Your password has been changed!');

    }

    public function sendmail($id){

        $content = Orders::find($id);
        if($content){            

        $url = 'https://api.elasticemail.com/v2/email/send';
        try{
                $post = array('from' => 'contact@3now.de',
                'fromName' => 'O-Bazaar',
                'apikey' => '9ECAE3B0E7E28B94621D30D634B0238ACC12BE45DA5CC17DEC385C99EE08C9212403CDE46FE482701696293D221895D8',
                'subject' => 'Neue Ordnung',
                'to' => 'takiddine.job@gmail.com',
                'bodyHtml' => view("email", compact('content')),
                'isTransactional' => false);

                $ch = curl_init();
                curl_setopt_array($ch, array(
                    CURLOPT_URL => $url,
                    CURLOPT_POST => true,
                    CURLOPT_POSTFIELDS => $post,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_HEADER => false,
                    CURLOPT_SSL_VERIFYPEER => false
                ));

                $result=curl_exec ($ch);
                curl_close ($ch);

                print_r($result);

        }
        catch(Exception $ex){
            echo $ex->getMessage();
        }  
                }   
    }

    public function printinvoice($id){
        $content = Orders::find($id);
        if($content){

            return view ('invoice',compact('content'));
        }
        return redirect('/');
    }

    public function device_user_token(){
        return response()->json(['id'=> \Session::get('device_user_token')]);



        return response()->json();
        dd(session()->all());

        return response()->json(['id'=> \Auth::check()]);

        $id = \Auth::user()->id;
        return response()->json(['id'=> [$id]]);
    }

    public function send_user_token(){
        $id = $_POST['id'];

          preg_match("|\d+|", $id, $m);

          $user               = \App\Models\User::find($m[0]);

          $user->device_token = $_POST['token'];

          if($user->save()){
              return response()->json(['error'=>'true' ]);
          }
    }

    public function send_alert(){
        define('API_ACCESS_KEY','AAAA9g3hmXo:APA91bHIRa6ZBf1HKU8KTsQ1UDjWWNq-OwsCKD9L1apL1yxohBsu_x5LLzgi7lPss-CbCD1lnaKOCIxO6pzzvgcpxmYKOfCZnSSwWcrQoW7_mbUBGjZ1iBCPyySUnZLkcinAYI557cvS');
        $fcmUrl = 'https://fcm.googleapis.com/fcm/send';

        $notification = [
            'title' =>'O-BAZAAR ORDER',
            'body' => 'O-BAZAAR ORDER',
            'sound' => 1,
        "sound" => "default",
            "click_action"=> "Open_URI"
        ];

        $extraNotificationData = ["message" => $notification,"moredata" =>'dd'];

        $token = "f6aeUXFWSNS_J-WIIR4hus:APA91bGDWPcAVOsMVhSSUtyxb9CDwJBBVbqv5ok8wmz06U-2a7kTpqyZkBiby4fbP7JnUcTbJM9diJ4ie1oJFiK2UirBmCNyYE1twUjt769z339EMfpdTNgt9uDKVLGKBmy9l3X2xRBR";

        $fcmNotification = [
        'to'        => 'dCUTpyBFSn2rSJigtR1E7W:APA91bECE0kF8IEeUvqx6BPbCfZ3yhowcFCg0lEkVX7_IfcwH9z1gPiSLeT_Y7SdWFjojKvXl1NNpVqa1Jc4ujUzcO7-zBw0-FmcHmOamFF8VgDtHW1N9tXk0yc2Q4LG2cmF0JLPmmHE',
            'notification' => $notification,
            'data' => [
                    "uri"=>  "https://o-bazaar.com/merchant/orders/edit/4",
                    "msg_type" =>"Hello ",
                    "request_id" =>7,
                    "image_url" => 'https://www.gstatic.com/mobilesdk/160503_mobilesdk/logo/2x/firebase_28dp.png',
                    "user_name"=>"abdulwahab",
                    "msg"=>"msg"
            ]
        ];

        $headers = [
            'Authorization: key=' . API_ACCESS_KEY,
            'Content-Type: application/json'
        ];


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$fcmUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
        $result = curl_exec($ch);
        curl_close($ch);

        print_r($result);
    }
    

    public function printinvoiceThermal($id){ 
        $content =  \App\Models\Orders::with('store','products','addresse','payement','shipping')->where('id',$id)->first();

    




  ?>

<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200&display=swap" rel="stylesheet">



<style>
body {
    width: 2500px;
    font-family: 'Raleway', sans-serif;
}

.title_1 {
    font-size: 70px;
}

.dint {
    font-size: 40px;
}

.leftspaced {
    margin-left: 875 px;
}

.hidden {
    display: none;
}

@media print {
    @page {
        margin: 0px 0px !important;
        padding: 0px !imortant;
    }

}
</style>
<p align="center">


<div style='clear:both; '></div>


<img style='width: 250px;margin-left: 400px;'
    src="https://o-bazaar.com/uploads/media/xVqE71pZkbaYeHAnJ5vIMaduPJeyL0WGhkIunrbl.png" alt="">


<div style='clear:both;'></div>

<h2 class="title_1 leftspaced"> ---------------------------------------</h2>



<div style='clear:both;'></div>


<div id="printingDiv">
    <h2 class="title_1 leftspaced" style='margin-left: 270px;'>Bestellnummer #<?php echo $content->id; ?> </h2>
    <h2 class="title_1 leftspaced" style='margin-left: 270px;'> www.o-bazaar.com </h2>
    <h2 class="title_1 leftspaced" style='margin-left: 270px;'> <?php echo $content->store->name; ?> </h2>
    <h2 class="title_1 leftspaced" style='margin-left: 270px;'> <?php echo $content->store->street; ?></h2>
    <h2 class="title_1 leftspaced" style='margin-left: 270px;'> <?php echo $content->store->description; ?></h2>
    <h2 class="title_1 leftspaced" style='margin-left: 270px;'> <?php echo $content->store->postal_code; ?></h2>

    <h2 class="title_1 leftspaced"> ---------------------------------------</h2>


    <h2 class="title_1"> Name : <?php echo $content->addresse->given_name; ?> </h2>
    <h2 class="title_1"> Str.Nr : <?php echo $content->addresse->street; ?></h2>
    <h2 class="title_1"> Hausnummer : <?php echo $content->addresse->housenumber; ?></h2>
    <h2 class="title_1"> Stadt : <?php echo $content->addresse->city; ?></h2>
    <h2 class="title_1"> Plz : <?php echo $content->addresse->postal_code; ?></h2>
    <h2 class="title_1"> E-Mail : <?php echo $content->user->email; ?> </h2>
    <h2 class="title_1"> Telefonnummer : <?php echo $content->user->phone; ?> </h2>
    <h2 class="title_1"> Versand : <?php echo  $content->shipping->name; ?> </h2>
    <h2 class="title_1"> Datum : <?php echo $content->user->created_at; ?> </h2>
    <h2 class="title_1"> Seriennummer : <?php echo $content->serial; ?> </h2>

    <h2 class="title_1 leftspaced"> ---------------------------------------</h2>

    <?php foreach ($content->products as $product) : ?>
    <h2 class="title_1">
        Menge : <?php  echo $product->quantity ; ?>
        <br>
        <?php echo  $product->product->getTranslation('name','de') ; ?>
        <br>
        Preis : <?php  echo $product->price ?> €
    </h2>
    <br>
    <?php endforeach; ?>

    <h2 class="title_1 leftspaced"> ---------------------------------------</h2>
    <h2 class="title_1 "> Versandkosten : <?php echo $content->shipping->cost; ?> € </h2>
    <h2 class="title_1 "> Gesamtsumme : <?php echo $content->getTotal(); ?> € </h2>
    <h2 class="title_1 "> Bezahlen : <?php echo $content->methodinvoice(); ?> </h2>

    <h2 class="title_1 leftspaced"> ---------------------------------------</h2>

    <h2 class="title_1 leftspaced" style='margin-left: 400px;'> Danke für Ihren Einkauf </h2>


</div>
<script type="text/javascript">
function printpage() {
    var printButton = document.getElementById("printingDiv");

    var element = document.getElementById("pr");
    element.classList.add("hidden");


    printButton.style.visibility = 'hidden';
    document.title = "";
    document.URL = "";
    window.print();
    printButton.style.visibility = 'visible';
}
</script>



<?php
    }

    public function nearBy(){
        $latitude       =       "26.372185";
        $longitude      =       "-12.553360";

        $shops          =       \DB::table("Stores");

        $shops          =       $shops->select("*", DB::raw("6371 * acos(cos(radians(" . $latitude . "))
                                * cos(radians(latitude)) * cos(radians(longitude) - radians(" . $longitude . "))
                                + sin(radians(" .$latitude. ")) * sin(radians(latitude))) AS distance"));
        $shops          =       $shops->having('distance', '<', 4000000);
        $shops          =       $shops->orderBy('distance', 'asc');

        $shops          =       $shops->get();
    }


   

}