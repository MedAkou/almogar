<?php 






Route::get('/merchant/login',  'Merchant\MerchantAuthController@form');
Route::post('/merchant/login', 'Merchant\MerchantAuthController@login')->name('merchant.login');
Route::get('/merchant/logout', 'Merchant\MerchantAuthController@logout');




/*
// admin login and logout
Route::get('/merchant/login',  'Auth\LoginController@showAdminLoginForm');
Route::post('/merchant/login', 'Auth\LoginController@AdminLogin')->name('merchant.login');
Route::get('/merchant/logout', 'Auth\LoginController@AdminLogout');

**/



 Route::group(['prefix' => '/merchant', 'as' => 'admin.' , 'middleware' => 'admin'], function () {


Route::post('/assigntocategorie', 'PagesController@assigntocategorie')->name('assigntocategorie');
Route::post('/deleteproducts', 'PagesController@deleteproducts')->name('deleteproducts');

Route::post('/bulkactivated', 'ProductsController@bulkactivated')->name('bulkactivated');
Route::post('/bulkdeactivated', 'ProductsController@bulkdeactivated')->name('bulkdeactivated');

    // admin Index
    Route::get('/', 'DashboardController@home')->name('home');
    Route::get('/account', 'UsersController@account')->name('account');

    Route::post('/account/password/update', 'UsersController@updateAdminPassword')->name('account.password.update');
    Route::post('/account/info/update', 'UsersController@updateAdminInfo')->name('account.info.update');


    // Users
    Route::group(['prefix' => '/users', 'as' => 'users.'], function () {
       Route::get('/', 'UsersController@index')->name('home');
       Route::get('/create', 'UsersController@create')->name('create');
       Route::post('/store', 'UsersController@store')->name('store');
       Route::get('/export/csv', 'UsersController@export_csv')->name('ToCsv');
       Route::get('/export/pdf', 'UsersController@export_pdf')->name('ToPdf');        
       Route::get('/delete/{id}', 'UsersController@delete')->name('delete');
       Route::get('/activate/{id}', 'UsersController@activate')->name('activate');
       Route::get('/block/{id}', 'UsersController@block')->name('block');
       Route::get('/bulkdelete', 'UsersController@bulkdelete')->name('bulkdelete');
       Route::get('/truncate', 'UsersController@truncate')->name('truncate');
       Route::post('/multiaction', 'UsersController@multiaction')->name('multiaction');
       Route::any('/edit/{id}', 'UsersController@edit')->name('edit');
       Route::post('/update/{id}', 'UsersController@update')->name('update');
       Route::get('/fake', 'UsersController@fake')->name('fake');
    });



    


    //  posts System
    Route::group(['prefix' => 'posts', 'as' => 'posts.'], function () {
        Route::get('/', 'PostsController@index')->name('home');
        Route::get('/create', 'PostsController@create')->name('create');
        Route::post('/store', 'PostsController@store')->name('store');
        Route::get('/edit/{id}', 'PostsController@edit')->name('edit');
        Route::post('/update/{id}', 'PostsController@update')->name('update');
        Route::get('/delete/{id}', 'PostsController@delete')->name('delete');
        Route::get('/clone/{id}', 'PostsController@clone')->name('clone');
        Route::get('/view/{id}', 'PostsController@view')->name('view');
        Route::get('/duplicate/{id}', 'PostsController@duplicate')->name('duplicate');
        Route::get('/bulkdelete', 'PostsController@bulkdelete')->name('bulkdelete');
        Route::get('/truncate', 'PostsController@truncate')->name('truncate');
        Route::post('/multiaction', 'PostsController@multiaction')->name('multiaction');
        
        // posts categories
       Route::group(['prefix' => 'categories', 'as' => 'categories.'], function (){
            Route::any('', 'PostsCategoriesController@index')->name('home');
            Route::post('/store', 'PostsCategoriesController@store')->name('store');
            Route::get('/delete/{id}', 'PostsCategoriesController@delete')->name('delete');
            Route::post('/duplicate', 'PostsCategoriesController@duplicate')->name('duplicate');
            Route::post('/view', 'PostsCategoriesController@view')->name('view');
            Route::get('/edit/{id}', 'PostsCategoriesController@edit')->name('edit');
            Route::post('/update/{id}', 'PostsCategoriesController@update')->name('update');
        });
    });


    // Media System
    Route::group(['prefix' => 'media', 'as' => 'media.'], function () {
        Route::any('/delete', 'MediaController@remove')->name('delete');
        Route::get('/', 'MediaController@index')->name('home');
        Route::any('/view/{id}', 'MediaController@view')->name('view');
        Route::any('/upload', 'MediaController@upload')->name('upload');
        Route::get('/bulkdelete', 'MediaController@bulkdelete')->name('bulkdelete');
        Route::any('/uploader', 'MediaController@modal_uploader')->name('modal_uploader');
        Route::get('/download/{id}', 'MediaController@download')->name('download');
        Route::get('/load', 'MediaController@load')->name('load');
    });
    

    // Pages System
    Route::group(['prefix' => 'pages', 'as' => 'pages.'], function () {
        Route::get('', 'PagesController@index')->name('home');
        Route::get('/create', 'PagesController@create')->name('create');
        Route::post('/store', 'PagesController@store')->name('store');
        Route::get('/bulkdelete', 'PagesController@bulkdelete')->name('bulkdelete');
        Route::get('/truncate', 'PagesController@truncate')->name('truncate');
        Route::post('/multiaction', 'PagesController@multiaction')->name('multiaction');
        Route::get('/edit/{id}', 'PagesController@edit')->name('edit');
        Route::post('/update/{id}', 'PagesController@update')->name('update');
        Route::get('/delete/{id}', 'PagesController@delete')->name('delete');
        Route::get('/clone/{id}', 'PagesController@clone')->name('clone');
        Route::get('/duplicate/{id}', 'PagesController@duplicate')->name('duplicate');
        Route::any('{id}', 'PagesController@create')->name('view');
    });






    // Ads System
    Route::group(['prefix' => 'ads', 'as' => 'ads.'], function () {
        Route::get('', 'AdsController@index')->name('home');
        Route::get('/create', 'AdsController@create')->name('create');
        Route::post('/store', 'AdsController@store')->name('store');
        Route::get('/bulkdelete', 'AdsController@bulkdelete')->name('bulkdelete');
        Route::get('/truncate', 'AdsController@truncate')->name('truncate');
        Route::get('/multiaction', 'AdsController@multiaction')->name('multiaction');
        Route::get('/edit/{id}', 'AdsController@edit')->name('edit');
        Route::post('/update/{id}', 'AdsController@update')->name('update');
        Route::get('/delete/{id}', 'AdsController@delete')->name('delete');
        Route::get('/clone/{id}', 'AdsController@clone')->name('clone');
        Route::get('/duplicate/{id}', 'AdsController@duplicate')->name('duplicate');
    });
    

    // Products system
    Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
        Route::get('', 'ProductsController@index')->name('home');
        Route::get('/create', 'ProductsController@create')->name('create');
        Route::post('/store', 'ProductsController@store')->name('store');
        Route::get('/bulkdelete', 'ProductsController@blukdelete')->name('bulkdelete');
        Route::get('/truncate', 'ProductsController@truncate')->name('truncate');
        Route::post('/multiaction', 'ProductsController@multiaction')->name('multiaction');
        Route::get('/edit/{id}', 'ProductsController@edit')->name('edit');
        Route::post('/update/{id}', 'ProductsController@update')->name('update');
        Route::get('/delete/{id}', 'ProductsController@delete')->name('delete');
        Route::post('/view/{id}', 'ProductsController@view')->name('view');
        Route::get('/duplicate/{id}', 'ProductsController@duplicate')->name('duplicate');
        Route::get('/clone/{id}', 'ProductsController@clone')->name('clone');
        Route::get('/search', 'ProductsController@search')->name('search');

        Route::get('/activate/{id}', 'ProductsController@activate')->name('activate');
        Route::get('/deactivate/{id}', 'ProductsController@deactivate')->name('deactivate');

        // Products categories
        Route::group(['prefix' => 'categories', 'as' => 'categories.'], function (){
            Route::any('', 'ProductsCategoriesController@index')->name('home');
            Route::post('/store', 'ProductsCategoriesController@store')->name('store');
            Route::get('/edit/{id}', 'ProductsCategoriesController@edit')->name('edit');
            Route::post('/update/{id}', 'ProductsCategoriesController@update')->name('update');
            Route::get('/delete/{id}', 'ProductsCategoriesController@delete')->name('delete');

        });

    });
 

 

    // Orders System
    Route::group(['prefix' => 'orders', 'as' => 'orders.'], function () {
        Route::get('', 'OrdersController@index')->name('home');
        Route::any('/edit/{id}', 'OrdersController@edit')->name('edit');
        Route::any('/delete/{id}', 'OrdersController@delete')->name('delete');
        Route::get('/clone', 'OrdersController@clone')->name('clone');
        Route::get('/bulkdelete', 'OrdersController@bulkdelete')->name('bulkdelete');
        Route::get('/truncate', 'OrdersController@truncate')->name('truncate');
        Route::get('/statue/{id}/{statue}', 'OrdersController@change')->name('change');
    }); 


    // Coupons System
    Route::group(['prefix' => 'coupons', 'as' => 'coupons.'], function () {
        Route::get('', 'CouponsController@index')->name('home');
        Route::get('/create', 'CouponsController@create')->name('create');
        Route::post('/store', 'CouponsController@store')->name('store');        
        Route::get('/bulkdelete', 'CouponsController@bulkdelete')->name('bulkdelete');
        Route::get('/truncate', 'CouponsController@truncate')->name('truncate');
        Route::get('/multiaction', 'CouponsController@multiaction')->name('multiaction');
        Route::get('/edit/{id}', 'CouponsController@edit')->name('edit');
        Route::post('/update/{id}', 'CouponsController@update')->name('update');
        Route::get('/delete/{id}', 'CouponsController@delete')->name('delete');
        Route::get('/clone/{id}', 'CouponsController@clone')->name('clone');
        Route::get('/duplicate/{id}', 'CouponsController@duplicate')->name('duplicate');
    });


    
    // shipping Methods System
    Route::group(['prefix' => 'shipping', 'as' => 'shipping.'], function () {
        Route::get('', 'ShippingController@index')->name('home');
        Route::get('/create', 'ShippingController@create')->name('create');
        Route::post('/store', 'ShippingController@store')->name('store');        
        Route::get('/bulkdelete', 'ShippingController@bulkdelete')->name('bulkdelete');
        Route::get('/truncate', 'ShippingController@truncate')->name('truncate');
        Route::get('/multiaction', 'ShippingController@multiaction')->name('multiaction');
        Route::get('/edit/{id}', 'ShippingController@edit')->name('edit');
        Route::get('/view/{id}', 'ShippingController@view')->name('view');
        Route::get('/duplicate/{id}', 'ShippingController@duplicate')->name('duplicate');
        Route::post('/update/{id}', 'ShippingController@update')->name('update');
        Route::get('/delete/{id}', 'ShippingController@delete')->name('delete');
        Route::get('/clone/{id}', 'ShippingController@clone')->name('clone');
    });



    // Faqs System
    Route::group(['prefix' => 'faqs', 'as' => 'faqs.'], function () {
        Route::get('', 'FaqsController@index')->name('home');
        Route::get('/create', 'FaqsController@create')->name('create');
        Route::post('/store', 'FaqsController@store')->name('store');
        Route::get('/edit/{id}', 'FaqsController@edit')->name('edit');
        Route::post('/update/{id}', 'FaqsController@update')->name('update');
        Route::get('/delete/{id}', 'FaqsController@delete')->name('delete');
        Route::get('/duplicate/{id}', 'FaqsController@duplicate')->name('duplicate');
        Route::get('/bulkdelete', 'FaqsController@bulkdelete')->name('bulkdelete');
        Route::get('/truncate', 'FaqsController@truncate')->name('truncate');
        Route::get('/multiaction', 'FaqsController@multiaction')->name('multiaction');


        Route::group(['prefix' => 'categories', 'as' => 'categories.'], function (){
                        Route::any('', 'FaqsCategoriesController@index')->name('home');
                        Route::post('/store', 'FaqsCategoriesController@store')->name('store');
                        Route::get('/edit/{id}', 'FaqsCategoriesController@edit')->name('edit');
                        Route::post('/update/{id}', 'FaqsCategoriesController@update')->name('update');
                        Route::get('/delete/{id}', 'FaqsCategoriesController@delete')->name('delete');
    });
              });




    
    // Slider System
    Route::group(['prefix' => 'slider', 'as' => 'slider.'], function () {
       Route::get('', 'SliderController@index')->name('home');
       Route::get('/create', 'SliderController@create')->name('create');
       Route::post('/store', 'SliderController@store')->name('store');
       Route::get('/bulkdelete', 'SliderController@truncate')->name('bulkdelete');       
       Route::get('/truncate', 'SliderController@truncate')->name('truncate');       
       Route::get('/edit/{id}', 'SliderController@edit')->name('edit');
       Route::post('/update/{id}', 'SliderController@update')->name('update');
       Route::get('/delete/{id}', 'SliderController@delete')->name('delete');
       Route::get('/clone/{id}', 'SliderController@clone')->name('clone');
       Route::get('/duplicate/{id}', 'SliderController@duplicate')->name('duplicate');

    });




   // Comments
    Route::group(['prefix' => 'comments', 'as' => 'comments.'], function () {
       Route::get('', 'CommentsController@index')->name('home');
       Route::get('/bulkdelete', 'CommentsController@bulkdelete')->name('bulkdelete');
       Route::get('/truncate', 'CommentsController@truncate')->name('truncate');
       Route::any('/edit/{id}', 'CommentsController@edit')->name('edit');
       Route::get('/delete/{id}', 'CommentsController@delete')->name('delete');
       Route::get('/duplicate/{id}', 'CommentsController@duplicate')->name('duplicate');
       Route::get('/multiaction', 'CommentsController@multiaction')->name('multiaction');
    });






 // Settings System
    Route::group(['prefix' => 'settings', 'as' => 'settings.'], function () {                                    
        Route::get('', 'SettingsController@index')->name('home');
        Route::post('', 'SettingsController@general')->name('general');
        Route::any('/home', 'SettingsController@home')->name('home');
        Route::post('/social', 'SettingsController@social')->name('social');
        Route::post('/newsletter', 'SettingsController@newsletter')->name('newsletter');
        Route::post('/stripe', 'SettingsController@stripe')->name('stripe');
        Route::post('/paypal', 'SettingsController@paypal')->name('paypal');




        Route::any('/account', 'SettingsController@account')->name('account');
        Route::any('/footer', 'SettingsController@footer')->name('footer');
        Route::any('/others', 'SettingsController@others')->name('others');
        Route::any('/others/save', 'SettingsController@save')->name('save');
        Route::any('/store', 'SettingsController@store')->name('store');
        Route::any('/payments', 'SettingsController@payments')->name('payments');
        Route::any('/payments/edit/paypal', 'SettingsController@paypal')->name('paypal');
        Route::any('/payments/edit/stripe', 'SettingsController@stripe')->name('stripe');
        Route::any('/payments/edit/bank', 'SettingsController@bank')->name('bank');
        Route::any('/system-info', 'Settings@system')->name('system');
        Route::any('/danger', 'SettingsController@danger')->name('danger');
    });

  Route::group(['prefix' => '/menus', 'as' => 'menus.'], function () {
       Route::get('/', 'MenusController@index')->name('home');
       Route::get('/create', 'MenusController@create')->name('create');
       Route::get('/edit/{id}', 'MenusController@edit')->name('edit');
       Route::post('/store', 'MenusController@store')->name('store');
       Route::post('/update', 'MenusController@update')->name('update');
       Route::get('/delete/{id}', 'MenusController@delete')->name('delete');
    });




    

    // Payment Method settings
    Route::group(['prefix' => 'payement-mehtod', 'as' => 'methods.'], function () {       
        Route::get('', 'PayementController@index')->name('home');
        Route::post('/paypal', 'PayementController@paypalStore')->name('store');
        Route::get('/stripe', 'PayementController@stripe')->name('view');
        Route::post('/stripe', 'PayementController@stripeStore')->name('store');
    });  
 

 });




