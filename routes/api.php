<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'v1'], function () {
    Route::prefix('user')->group(function () {
        Route::post('login', 'UserApiController@login');
    });

    // Users routes
    Route::prefix('user')->middleware('auth:api')->group(function () {
        Route::get('/profile', 'UserApiController@profile');
        Route::get('/logout', 'UserApiController@logout');
        Route::post('/update', 'UserApiController@update');
        Route::post('/delete', 'UserApiController@delete');
        Route::post('/updatePassword', 'UserApiController@updatePassword');
    });

    //  posts routes
    Route::prefix('posts')->middleware('auth:api')->group(function () {
        Route::get('/', 'PostsController@index');
        Route::post('/store', 'PostsController@store');
        Route::post('/update/{id}', 'PostsController@update');
        Route::get('/delete/{id}', 'PostsController@delete');
        Route::get('/clone/{id}', 'PostsController@clone');
        Route::get('/view/{id}', 'PostsController@view');
        Route::post('/multiaction', 'PostsController@multiaction');
        
        // posts categories routes
        Route::prefix('categories')->middleware('auth:api')->group(function () {
            Route::any('/', 'PostsCategoriesController@index');
            Route::post('/store', 'PostsCategoriesController@store');
            Route::post('/update/{id}', 'PostsCategoriesController@update');
            Route::get('/delete/{id}', 'PostsCategoriesController@delete');
            Route::post('/duplicate', 'PostsCategoriesController@duplicate');
            Route::post('/view', 'PostsCategoriesController@view');
        });
    });

    // Media routes
    Route::prefix('media')->middleware('auth:api')->group(function () {
        Route::get('/', 'MediaController@index');
        Route::any('/view/{id}', 'MediaController@view');
        Route::any('/upload', 'MediaController@upload');
        Route::any('/uploader', 'MediaController@modal_uploader');
        Route::get('/download/{id}', 'MediaController@download');
        Route::get('/load', 'MediaController@load');
        Route::any('/delete', 'MediaController@remove');
    });

    // Pages routes
    Route::prefix('pages')/*->middleware('auth:api')*/->group(function () {
        Route::get('/', 'PagesApiController@index');
        Route::post('/store', 'PagesApiController@store');
        Route::post('/update/{id}', 'PagesApiController@update');
        Route::post('/delete/{id}', 'PagesApiController@delete');
        Route::post('/duplicate/{id}', 'PagesApiController@duplicate');
    });

    // Ads routes
    Route::prefix('ads')/*->middleware('auth:api')*/->group(function () {
        Route::get('/', 'AdsApiController@index');
        Route::post('/store', 'AdsApiController@store');
        Route::post('/update/{id}', 'AdsApiController@update');
        Route::post('/delete/{id}', 'AdsApiController@delete');
        Route::post('/duplicate/{id}', 'AdsApiController@duplicate');
    });

    // Products routes
    Route::prefix('products')/*->middleware('auth:api')*/->group(function () {
        Route::get('/', 'ProductsApiController@index');
        Route::post('/{id}/details', 'ProductsApiController@details');
        Route::post('/store', 'ProductsApiController@store');
        Route::post('/{id}/update', 'ProductsApiController@update');
        Route::post('/{id}/delete', 'ProductsApiController@delete');
        Route::get('/activate/{id}', 'ProductsApiController@activate');
        Route::get('/deactivate/{id}', 'ProductsApiController@deactivate');
        Route::get('/search', 'ProductsApiController@search');
    });

    // Products categories routes
    Route::prefix('categories')/*->middleware('auth:api')*/->group(function (){
        Route::get('/', 'ProductsCategoriesApiController@index');
        Route::post('/store', 'ProductsCategoriesApiController@store');
        Route::post('/update/{id}', 'ProductsCategoriesApiController@update');
        Route::post('/delete/{id}', 'ProductsCategoriesApiController@delete');
    });

    // Orders routes
    Route::prefix('orders')/*->middleware('auth:api')*/->group(function (){
        Route::get('/', 'OrdersApiController@index');
        Route::get('/{id}', 'OrdersApiController@get');
        Route::get('/user/{user_id}', 'OrdersApiController@userOrder');
        Route::post('/changeStatue/{id}', 'OrdersApiController@changeStatue');
        Route::any('/delete/{id}', 'OrdersApiController@delete');
    });

    // Stores routes
    Route::prefix('stores')->middleware('auth:api')->group(function (){
        Route::get('/', 'ManagerStoresApiController@index');
        Route::post('/store', 'ManagerStoresApiController@store');
        Route::post('/update/{id}', 'ManagerStoresApiController@update');
        Route::get('/delete/{id}', 'ManagerStoresApiController@delete');
        Route::get('/clone/{id}', 'ManagerStoresApiController@clone');
        Route::get('/view/{id}', 'ManagerStoresApiController@view');
        Route::post('/multiaction', 'ManagerStoresApiController@multiaction');
        Route::get('/duplicate/{id}', 'ManagerStoresApiController@duplicate');
    });

    // Sliders routes
    Route::prefix('slider')/*->middleware('auth:api')*/->group(function (){
        Route::get('/', 'SliderApiController@index');
        Route::post('/store', 'SliderApiController@store');
        Route::post('/update/{id}', 'SliderApiController@update');
        Route::post('/delete/{id}', 'SliderApiController@delete');
        Route::post('/duplicate/{id}', 'SliderApiController@duplicate');
     });

     // Menus routes
    Route::prefix('menus')/*->middleware('auth:api')*/->group(function (){
        Route::get('/', 'ManagerMenusApiController@index');
        Route::post('/store', 'ManagerMenusApiController@store');
        Route::post('/update/{id}', 'ManagerMenusApiController@update');
        Route::post('/delete/{id}', 'ManagerMenusApiController@delete');
     });

    //  Settings routes
    Route::prefix('settings')->middleware('auth:api')->group(function (){
        Route::get('/', 'ManagerSettingsApiController@index');
        Route::post('/update/{id}', 'ManagerSettingsApiController@update');
        Route::post('/social', 'ManagerSettingsApiController@social');
        Route::post('/stripe', 'ManagerSettingsApiController@stripe');
        Route::post('/paypal', 'ManagerSettingsApiController@paypal');
    });
});