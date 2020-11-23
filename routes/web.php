<?php

use Illuminate\Support\Facades\Route;

  Route::get('/account/login', 'AccountController@user')->name('account.user');

  Route::post('/account/login', 'AccountController@userAuth')->name('account.auth-user');

  Route::get('/account/register', 'AccountController@register')->name('account.register');

  Route::post('/account/registration', 'AccountController@registration')->name('account.registration');


Route::group(['prefix' => 'account' , 'as' => 'account.'  , 'middleware' => 'Account'], function(){

  Route::get('/', 'AccountController@edit')->name('edit');

  Route::post('/update', 'AccountController@update')->name('update');

  Route::get('/forgot', 'AccountController@forgot')->name('forgot');

  Route::get('/info', 'AccountController@info')->name('info');

  Route::get('/adresses', 'AccountController@adresses')->name('adresses');

  Route::get('/orders', 'AccountController@orders')->name('orders');

  Route::get('orders/details/{id}', 'AccountController@order_detail')->name('orders_detail');

  Route::get('/wishlist', 'AccountController@wishlist')->name('wishlist');

  Route::get('/wishlist/clear', 'AccountController@clearwishlist')->name('wishlist_clear');

  Route::get('/shipping/add', 'AccountController@shipping_add')->name('shipping.add');

  Route::post('/shipping/add', 'AccountController@shipping_store')->name('shipping.add');

  Route::get('/shipping/edit/{id}', 'AccountController@edit_shipping')->name('shipping.edit');

  Route::post('/shipping/update/{id}', 'AccountController@update_shipping')->name('shipping.update');

  Route::get('/shipping/delete/{id}', 'AccountController@shipping_delete')->name('shipping.delete');

  Route::get('/shipping/default/{id}', 'AccountController@shipping_default')->name('shipping.default');

  Route::get('/password', 'AccountController@password')->name('password');

  Route::post('/password/update', 'AccountController@passwordUpdate')->name('password-update');

});


Route::post('/resetpassword', 'WebsiteController@validatePasswordRequest')->name('password.validate');
Route::post('/password/reset', 'WebsiteController@resetPassword')->name('password.request');
Route::any('reset_password/{token}', 'WebsiteController@getPassword')->name('password.getPassword');

Route::post('couponcheck', 'PayementController@applyCoupon')->name('applyCoupon');

Route::get('/datenschutzerklarung', function(){
    return view('theme2/datenschutzerklarung');
});


/*
$stores = \App\Models\Stores::all();

foreach ($stores as $store) {
  $store->name = 'Unter Bearbeitung';
  $store->save();
}*/

Route::get('/faq', function(){
        return view('theme2/faq');
});



Route::get('/qdsfqsdfqsdqfsdffdfs', function(){
    //    dd(\ShoppingCart::get());
    //    
   
   $cart = (new \App\Helpers\Cart())->get();
   dd($cart);

});



Route::get('/agb', function(){
        return view('theme2/agb/index');
});


Route::get('/datenschutzerklarung', function(){
        return view('theme2/datenschutzerklarung/index');
});


Route::get('/agb/kunden', function(){
        return view('theme2/agb/kunden');
});


Route::get('/agb/lieferanten', function(){
        return view('theme2/agb/lieferanten');
});

Route::get('/agb/lieferanten/Kunden', function(){
        return view('theme2/agb/kunden-lieferanten');
});

Route::get('/datenschutzerklarung/kunden', function(){
        return view('theme2/datenschutzerklarung/kunden');
});

Route::get('/datenschutzerklarung/lieferanten/drittanbieter', function(){
        return view('theme2/datenschutzerklarung/lieferanten-drittanbieter');
});






Route::post('/form/send', 'WebsiteController@contactsend')->name('contact.send');
Route::get('/contact-us', 'WebsiteController@contact')->name('contact');
Route::get('/about-us', 'WebsiteController@about')->name('about');
Route::get('/thank-you', 'WebsiteController@thankyou')->name('thank-you');    
Route::get('/contact/send', 'WebsiteController@contact-send')->name('contact.send');




Route::get('/sendmail/{id}', 'WebsiteController@sendmail')->name('sendmail');



Route::get('/current/user', function(){

 return response()->json(['id'=> \Session::get('device_user_token')]);



 return response()->json();
dd(session()->all());

 return response()->json(['id'=> \Auth::check()]);

  $id = \Auth::user()->id;
   return response()->json(['id'=> [$id]]);
});






Route::POST('send/device_token', function(){

          $id = $_POST['id'];

          preg_match("|\d+|", $id, $m);

          $user               = \App\Models\User::find($m[0]);

          $user->device_token = $_POST['token'];

          if($user->save()){
              return response()->json(['error'=>'true' ]);
          }

})->name('ldldldldldledldldldlmdl');









Route::get('/sendAlert', function(){



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





});

























if (! function_exists('option')) {
    /**
     * Get / set the specified option value.
     *
     * If an array is passed as the key, we will assume you want to set an array of values.
     *
     * @param  array|string  $key
     * @param  mixed  $default
     * @return mixed|\Appstract\Options\Option
     */
    function option($key = null, $default = null)
    {
        if (is_null($key)) {
            return app('option');
        }

        if (is_array($key)) {
            return app('option')->set($key);
        }

        return app('option')->get($key, $default);
    }
}

if (! function_exists('option_exists')) {
    /**
     * Check the specified option exits.
     *
     * @param  string  $key-
     * @return mixed
     */
    function option_exists($key)
    {
        return app('option')->exists($key);
    }
}



if (! function_exists('baseSetting')) {
    /**
     * Get / set the specified option value.
     *
     * If an array is passed as the key, we will assume you want to set an array of values.
     *
     * @param  array|string  $key
     * @param  mixed  $default
     * @return mixed|\Appstract\Options\Option
     */
    function baseSetting($key = null, $default = null)
    {
        if (is_null($key)) {
            return app('BaseSettings');
        }

        if (is_array($key)) {
            return app('BaseSettings')->set($key);
        }

        return app('BaseSettings')->get($key, $default);
    }
}

if (! function_exists('baseSettings_exists')) {
    /**
     * Check the specified option exits.
     *
     * @param  string  $key-
     * @return mixed
     */
    function baseSettings_exists($key)
    {
        return app('BaseSettings_exists')->exists($key);
    }
}






\App::bind('option', \App\Models\Options::class);
\App::bind('BaseSettings', \App\Models\Setting::class);


Route::get('/printinvoice/{id}', 'WebsiteController@printinvoice')->name('invoice.print');
Route::get('/printinvoiceThermal/{id}', 'WebsiteController@printinvoiceThermal')->name('invoice.printThermal');



Route::get('/loadcartAgain/{store}', 'WebsiteController@loadcartHTML');



Route::get('/join', 'WebsiteController@join')->name('join');

/*
|--------------------------------------------------------------------------
| website Routes
|--------------------------------------------------------------------------
|  
*/
Route::get('/', 'BaseController@index')->name('base');
//Auth::routes();



// Route for stripe payment form.
//Route::get('stripe', 'StripeController@payWithStripe')->name('stripform');
// Route for stripe post request.
//Route::post('stripe', 'StripeController@postPaymentWithStripe')->name('paywithstripe');

/*
|--------------------------------------------------------------------------
| merchanrt Routes
|--------------------------------------------------------------------------
|  
*/-
require base_path().'/routes/organize/merchant.php';



/*
|--------------------------------------------------------------------------
| manager Routes
|--------------------------------------------------------------------------
|  
*/
require base_path().'/routes/organize/manager.php';




Route::any('/duplicate/{id}', 'DuplicateController@jahnama')->name('store.duplicate');





Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/page/{slug}', 'WebsiteController@basepage')->name('basepage');


Route::group(['prefix' => '{store}', 'middleware' => 'store' ], function ($store) {


          Route::get('/quickview/{id}', 'ShopController@quickview')->name('quickview');
  
     //     Route::get('/nearBy', 'WebsiteController@nearBy')->name('nearBy');

          Route::get('/', 'WebsiteController@home')->name('home');
          
          Route::post('/subscribe', 'NewsLetterController@subscribe')->name('subscribe');


          Route::get('/shop', 'ShopController@index')->name('shop');

          Route::get('/category/{slug}', 'ShopController@category')->name('shop.category');

          Route::get('/shop/product/{id}', 'ShopController@product')->name('shop.product');

          Route::get('/shipping/add', 'WebsiteController@shipping_add')->name('shipping.add');

          Route::get('/shipping/set/{id}', 'WebsiteController@shipping_set')->name('shipping.set');

          Route::post('/shipping/add', 'WebsiteController@shipping_store')->name('shipping.add');


          Route::get('/shipping/edit/{id}', 'ProfileController@edit_shipping')->name('shipping.edit')->middleware(['user']);

          Route::post('/shipping/update/{id}', 'ProfileController@update_shipping')->name('shipping.update')->middleware(['user']);

          Route::get('/shipping/delete/{id}', 'ProfileController@shipping_delete')->name('shipping.delete')->middleware(['user']);

          Route::get('/shipping/default/{id}', 'ProfileController@shipping_default')->name('shipping.default')->middleware(['user']);

          Route::get('/payement/methode', 'PagesController@pmethode')->name('pmethode');


          Route::get('/terms', 'WebsiteController@terms')->name('terms');

          Route::get('/faqs', 'WebsiteController@faqs')->name('faqs');

          Route::get('/favorites', 'WebsiteController@favorites')->name('favorites');

          Route::get('/wishlist', 'WebsiteController@wishlist')->name('wishlist')->middleware(['user']);

          Route::get('/checkout', 'WebsiteController@checkout')->name('checkout');

          Route::get('/account/login', 'WebsiteController@user')->name('user');

          Route::get('/register', 'WebsiteController@register')->name('register');

          Route::post('/registration', 'WebsiteController@registration')->name('registration');

          Route::post('/account/login', 'WebsiteController@userAuth')->name('auth-user');

          Route::get('/account', 'ProfileController@edit')->name('edit')->middleware(['user']);

          Route::post('/account/update', 'ProfileController@update')->name('update')->middleware(['user']);

          Route::get('/account/forgot', 'WebsiteController@forgot')->name('forgot');

          Route::get('/account/info', 'WebsiteController@info')->name('info')->middleware(['user']);

          Route::get('/adresses', 'WebsiteController@adresses')->name('adresses')->middleware(['user']);

          Route::get('/account/password', 'ProfileController@password')->name('password')->middleware(['user']);

          Route::post('/account/password/update', 'ProfileController@passwordUpdate')->name('password-update')->middleware(['user']);

          Route::get('/search', 'WebsiteController@searchProccess')->name('search');

          Route::get('/blog', 'WebsiteController@blog')->name('blog');

          Route::get('/blog/search', 'WebsiteController@search_blog')->name('search_blog');

          Route::get('/categories', 'WebsiteController@categories')->name('categories');

          Route::get('/category/{slug}', 'WebsiteController@category')->name('category');

          Route::get('/reset', 'WebsiteController@reset')->name('reset');

          Route::get('/product', 'WebsiteController@product')->name('product');

          Route::get('/orders', 'WebsiteController@orders')->name('orders')->middleware(['user']);

          Route::get('/single', 'WebsiteController@single')->name('single');


          Route::get('/404', 'WebsiteController@erreur404')->name('404');

          Route::get('/category/{slug}', 'WebsiteController@category')->name('category');



          Route::post('/shop/pay', 'PayementController@checkout_pay')->name('checkout.pay');
          Route::any('/paypal/failed', 'PayPalController@failedPayement')->name('paypal.faild');
          Route::any('/paypal/success', 'PayPalController@successPayement')->name('paypal.success');


          // add,remove,update,clear the cart  - wishlist to cart
          Route::get('/cart', 'CartController@index')->name('cart');
          Route::get('/cart/clear', 'CartController@clear')->name('cart_clear');
          Route::any('/cart/add/{id}', 'CartController@add')->name('cart.add');
          Route::get('/cart/remove/{id}', 'CartController@remove')->name('cart.remove');
          Route::post('/cart/update/', 'CartController@update')->name('cart.update');

          // add and remove product to wishlist
          Route::get('/wishlist/add/{id}', 'WishlistController@add')->name('wishlist.add');
          Route::get('/wishlist/remove/{id}', 'WishlistController@remove')->name('wishlist.remove');
          Route::post('/wishlist/to/checkout', 'WishlistController@checkout')->name('wishlist.checkout');
          Route::get('/wishlist/clear', 'WishlistController@clear')->name('wishlist.clear');

          // add and remove product to wishlist and add coupon
          Route::post('/product/{id}/rate', 'ProductsControlleru@add')->name('product.rate');
          Route::post('/product/{id}/report', 'WishlistController@remove')->name('product.report');
          Route::post('/wishlist/to/checkout', 'WishlistController@remove')->name('favorite.remove');
          Route::post('/coupon/activate/{id}', 'CouponsController@remove')->name('favorite.remove');

          Route::get('/{page}', 'WebsiteController@page')->name('page.view');





          Route::get('orders/details/{id}', 'WebsiteController@order_detail')->name('orders_detail');





});



Route::get('/{page}', 'WebsiteController@websitepage')->name('website.page');
