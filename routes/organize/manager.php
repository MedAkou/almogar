<?php 



Route::get('/manager/login', 'Manager\ManagerAuthController@login')->name('manager.login');
Route::post('/manager/login', 'Manager\ManagerAuthController@attempt')->name('manager.login');
Route::any('/manager/logout', 'Manager\ManagerAuthController@logout')->name('manager.logout');


Route::group(['prefix' => '/manager', 'as' => 'manager.', 'middleware' => 'manager' , 'namespace'=>'Manager' ], function () {


    Route::get('/', 'ManagerController@home')->name('home');

    Route::get('/account', 'ManagerController@account')->name('account');
    Route::post('/account/password/update', 'ManagerUsersController@updateAdminPassword')->name('account.password.update');
    Route::post('/account/info/update', 'ManagerUsersController@updateAdminInfo')->name('account.info.update');

    Route::get('/settings', 'ManagerSettingsController@show')->name('settings');
    Route::post('/settings', 'ManagerSettingsController@update')->name('settings');
    Route::post('/settings/social', 'ManagerSettingsController@social')->name('settings.social');
    Route::post('/settings/stripe', 'ManagerSettingsController@stripe')->name('settings.stripe');
    Route::post('/settings/paypal', 'ManagerSettingsController@paypal')->name('settings.paypal');


    Route::group(['prefix' => '/menus', 'as' => 'menus.'], function () {
       Route::get('/', 'ManagerMenusController@index')->name('home');
       Route::get('/create', 'ManagerMenusController@create')->name('create');
       Route::get('/edit/{id}', 'ManagerMenusController@edit')->name('edit');
       Route::post('/store', 'ManagerMenusController@store')->name('store');
       Route::post('/update', 'ManagerMenusController@update')->name('update');
       Route::get('/delete/{id}', 'ManagerMenusController@delete')->name('delete');
    });



    Route::group(['prefix' => 'ads', 'as' => 'ads.'], function () {
        Route::get('', 'ManagerAdsController@index')->name('home');
        Route::get('/create', 'ManagerAdsController@create')->name('create');
        Route::post('/store', 'ManagerAdsController@store')->name('store');
        Route::get('/bulkdelete', 'ManagerAdsController@bulkdelete')->name('bulkdelete');
        Route::get('/truncate', 'ManagerAdsController@truncate')->name('truncate');
        Route::get('/multiaction', 'ManagerAdsController@multiaction')->name('multiaction');
        Route::get('/edit/{id}', 'ManagerAdsController@edit')->name('edit');
        Route::post('/update/{id}', 'ManagerAdsController@update')->name('update');
        Route::get('/delete/{id}', 'ManagerAdsController@delete')->name('delete');
        Route::get('/clone/{id}', 'ManagerAdsController@clone')->name('clone');
        Route::get('/duplicate/{id}', 'ManagerAdsController@duplicate')->name('duplicate');
    });

    Route::group(['prefix' => 'slider', 'as' => 'slider.'], function () {
       Route::get('', 'ManagerSliderController@index')->name('home');
       Route::get('/create', 'ManagerSliderController@create')->name('create');
       Route::post('/store', 'ManagerSliderController@store')->name('store');
       Route::get('/bulkdelete', 'ManagerSliderController@truncate')->name('bulkdelete');       
       Route::get('/truncate', 'ManagerSliderController@truncate')->name('truncate');       
       Route::get('/edit/{id}', 'ManagerSliderController@edit')->name('edit');
       Route::post('/update/{id}', 'ManagerSliderController@update')->name('update');
       Route::get('/delete/{id}', 'ManagerSliderController@delete')->name('delete');
       Route::get('/clone/{id}', 'ManagerSliderController@clone')->name('clone');
       Route::get('/duplicate/{id}', 'ManagerSliderController@duplicate')->name('duplicate');
    });


    Route::group(['prefix' => '/users', 'as' => 'users.'], function () {
       Route::get('/', 'ManagerUsersController@index')->name('home');
       Route::get('/create', 'ManagerUsersController@create')->name('create');
       Route::post('/store', 'ManagerUsersController@store')->name('store');
       Route::get('/export/csv', 'ManagerUsersController@export_csv')->name('ToCsv');
       Route::get('/export/pdf', 'ManagerUsersController@export_pdf')->name('ToPdf');        
       Route::get('/delete/{id}', 'ManagerUsersController@delete')->name('delete');
       Route::any('/edit/{id}', 'ManagerUsersController@edit')->name('edit');
       Route::get('/activate/{id}', 'ManagerUsersController@activate')->name('activate');
       Route::get('/block/{id}', 'ManagerUsersController@block')->name('block');
       Route::get('/bulkdelete', 'ManagerUsersController@bulkdelete')->name('bulkdelete');
       Route::get('/truncate', 'ManagerUsersController@truncate')->name('truncate');
       Route::post('/multiaction', 'ManagerUsersController@multiaction')->name('multiaction');
       Route::post('/update/{id}', 'ManagerUsersController@update')->name('update');
       Route::get('/fake', 'ManagerUsersController@fake')->name('fake');
       
    });


    Route::group(['prefix' => 'stores', 'as' => 'stores.'], function () {
        Route::get('', 'ManagerStoresController@index')->name('home');
        Route::get('/create', 'ManagerStoresController@create')->name('create');
        Route::post('/store', 'ManagerStoresController@store')->name('store');
        Route::get('/bulkdelete', 'ManagerStoresController@bulkdelete')->name('bulkdelete');
        Route::get('/truncate', 'ManagerStoresController@truncate')->name('truncate');
        Route::post('/multiaction', 'ManagerStoresController@multiaction')->name('multiaction');
        Route::get('/edit/{id}', 'ManagerStoresController@edit')->name('edit');
        Route::post('/update/{id}', 'ManagerStoresController@update')->name('update');
        Route::get('/delete/{id}', 'ManagerStoresController@delete')->name('delete');
        Route::get('/clone/{id}', 'ManagerStoresController@clone')->name('clone');
        Route::get('/view/{id}', 'ManagerStoresController@view')->name('view');
        Route::get('/duplicate/{id}', 'ManagerStoresController@duplicate')->name('duplicate');
        Route::any('{id}', 'ManagerStoresController@create')->name('view');
    });


    Route::group(['prefix' => 'orders', 'as' => 'orders.'], function () {
        Route::get('', 'ManagerOrdersController@index')->name('home');
        Route::any('/edit/{id}', 'ManagerOrdersController@edit')->name('edit');
        Route::any('/delete/{id}', 'ManagerOrdersController@delete')->name('delete');
        Route::get('/clone', 'ManagerOrdersController@clone')->name('clone');
        Route::get('/bulkdelete', 'ManagerOrdersController@bulkdelete')->name('bulkdelete');
        Route::get('/truncate', 'ManagerOrdersController@truncate')->name('truncate');
    }); 

    Route::group(['prefix' => 'pages', 'as' => 'pages.'], function () {
        Route::get('', 'ManagerPagesController@index')->name('home');
        Route::get('/create', 'ManagerPagesController@create')->name('create');
        Route::post('/store', 'ManagerPagesController@store')->name('store');
        Route::get('/bulkdelete', 'ManagerPagesController@bulkdelete')->name('bulkdelete');
        Route::get('/truncate', 'ManagerPagesController@truncate')->name('truncate');
        Route::post('/multiaction', 'ManagerPagesController@multiaction')->name('multiaction');
        Route::get('/edit/{id}', 'ManagerPagesController@edit')->name('edit');
        Route::post('/update/{id}', 'ManagerPagesController@update')->name('update');
        Route::get('/delete/{id}', 'ManagerPagesController@delete')->name('delete');
        Route::get('/clone/{id}', 'ManagerPagesController@clone')->name('clone');
        Route::get('/duplicate/{id}', 'ManagerPagesController@duplicate')->name('duplicate');
        Route::any('{id}', 'ManagerPagesController@create')->name('view');
    });



});