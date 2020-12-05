<?php




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




Route::get('/nearBy', function(){

     //\App\Stores::where
     
        $latitude       =       "26.372185";
        $longitude      =       "-12.553360";

        $shops          =       \DB::table("Stores");

        $shops          =       $shops->select("*", DB::raw("6371 * acos(cos(radians(" . $latitude . "))
                                * cos(radians(latitude)) * cos(radians(longitude) - radians(" . $longitude . "))
                                + sin(radians(" .$latitude. ")) * sin(radians(latitude))) AS distance"));
        $shops          =       $shops->having('distance', '<', 4000000);
        $shops          =       $shops->orderBy('distance', 'asc');

        $shops          =       $shops->get();

     
        dd($shops);

     return 'ldkjdkjkdjdd';

});





//Route::optionRoutes();






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
//Route::view('stripe', 'stripe')->name('stripform');
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








Route::get('/logout', 'Auth\LoginController@logout')->name('logout');




Route::group(['prefix' => '{store}', 'middleware' => 'store' ], function ($store) {


  
          Route::get('/', 'WebsiteController@home')->name('home');
          
          Route::post('/subscribe', 'NewsLetterController@subscribe')->name('subscribe');

          Route::get('/thank-you', 'WebsiteController@thankyou')->name('thank-you');    

          Route::get('/about', 'WebsiteController@about')->name('about');

          Route::get('/shop', 'ShopController@index')->name('shop');

          Route::get('/category/{slug}', 'ShopController@category')->name('shop.category');

          Route::get('/shop/product/{id}', 'ShopController@product')->name('shop.product');

          Route::get('/shipping/add', 'WebsiteController@shipping_add')->name('shipping.add');

          Route::get('/shipping/set/{id}', 'WebsiteController@shipping_set')->name('shipping.set');

          Route::post('/shipping/add', 'WebsiteController@shipping_store')->name('shipping.add');

          Route::post('/form/send', 'WebsiteController@contactsend')->name('contact.send');

          Route::get('/shipping/edit/{id}', 'ProfileController@edit_shipping')->name('shipping.edit')->middleware(['user']);

          Route::post('/shipping/update/{id}', 'ProfileController@update_shipping')->name('shipping.update')->middleware(['user']);

          Route::get('/shipping/delete/{id}', 'ProfileController@shipping_delete')->name('shipping.delete')->middleware(['user']);

          Route::get('/shipping/default/{id}', 'ProfileController@shipping_default')->name('shipping.default')->middleware(['user']);

          Route::get('/payement/methode', 'PagesController@pmethode')->name('pmethode');

          Route::get('/contact', 'WebsiteController@contact')->name('contact');

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

          Route::get('/account/forgot', 'WebsiteController@forgot')->name('forgot')->middleware(['user']);

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

          Route::get('/contact/send', 'WebsiteController@contact-send')->name('contact.send');

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

});



Route::get('/{page}', 'WebsiteController@websitepage')->name('website.page');
