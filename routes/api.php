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
        Route::get('/', 'PostsApiController@index');
        Route::get('/{id}', 'PostsApiController@details');
        Route::post('/store', 'PostsApiController@store');
        Route::post('/update/{id}', 'PostsApiController@update');
        Route::post('/delete/{id}', 'PostsApiController@delete');
        Route::post('/duplicate/{id}', 'PostsApiController@duplicate');
        
        // posts categories routes
        Route::prefix('categories')->middleware('auth:api')->group(function () {
            Route::get('/', 'PostsCategoriesApiController@index');
            Route::get('/{id}', 'PostsCategoriesApiController@details');
            Route::post('/store', 'PostsCategoriesApiController@store');
            Route::post('/update/{id}', 'PostsCategoriesApiController@update');
            Route::post('/delete/{id}', 'PostsCategoriesApiController@delete');
            Route::post('/duplicate/{id}', 'PostsCategoriesApiController@duplicate');
        });
    });

    // Media routes
    Route::prefix('media')->middleware('auth:api')->group(function () {
        Route::get('/', 'MediaApiController@index');
        Route::get('/{id}', 'MediaApiController@details');
        Route::post('/upload', 'MediaApiController@upload');
        Route::post('/update/{id}', 'MediaApiController@update');
        Route::post('/delete/{id}', 'MediaApiController@delete');
    });

    // Pages routes
    Route::prefix('pages')->middleware('auth:api')->group(function () {
        Route::get('/', 'PagesApiController@index');
        Route::get('/{id}', 'PagesApiController@details');
        Route::post('/store', 'PagesApiController@store');
        Route::post('/update/{id}', 'PagesApiController@update');
        Route::post('/delete/{id}', 'PagesApiController@delete');
        Route::post('/duplicate/{id}', 'PagesApiController@duplicate');
    });

    // Ads routes
    Route::prefix('ads')->middleware('auth:api')->group(function () {
        Route::get('/', 'AdsApiController@index');
        Route::get('/{id}', 'AdsApiController@details');
        Route::post('/store', 'AdsApiController@store');
        Route::post('/update/{id}', 'AdsApiController@update');
        Route::post('/delete/{id}', 'AdsApiController@delete');
        Route::post('/duplicate/{id}', 'AdsApiController@duplicate');
    });

    // Products routes
    Route::prefix('products')->middleware('auth:api')->group(function () {
        Route::get('/', 'ProductsApiController@index');
        Route::get('/{id}', 'ProductsApiController@details');
        Route::post('/store', 'ProductsApiController@store');
        Route::post('/{id}/update', 'ProductsApiController@update');
        Route::post('/{id}/delete', 'ProductsApiController@delete');
        Route::get('/activate/{id}', 'ProductsApiController@activate');
        Route::get('/deactivate/{id}', 'ProductsApiController@deactivate');
        Route::get('/search', 'ProductsApiController@search');
    });

    // Products categories routes
    Route::prefix('categories')->middleware('auth:api')->group(function (){
        Route::get('/', 'ProductsCategoriesApiController@index');
        Route::get('/{id}', 'ProductsCategoriesApiController@details');
        Route::post('/store', 'ProductsCategoriesApiController@store');
        Route::post('/update/{id}', 'ProductsCategoriesApiController@update');
        Route::post('/delete/{id}', 'ProductsCategoriesApiController@delete');
    });

    // Orders routes
    Route::prefix('orders')->middleware('auth:api')->group(function (){
        Route::get('/', 'OrdersApiController@index');
        Route::get('/{id}', 'OrdersApiController@details');
        Route::get('/user/{user_id}', 'OrdersApiController@userOrder');
        Route::post('/changeStatue/{id}', 'OrdersApiController@changeStatue');
        Route::any('/delete/{id}', 'OrdersApiController@delete');
    });

    // Stores routes
    Route::prefix('stores')->middleware('auth:api')->group(function (){
        Route::get('/', 'StoresApiController@index');
        Route::get('/{id}', 'StoresApiController@details');
        Route::post('/store', 'StoresApiController@store');
        Route::post('/update/{id}', 'StoresApiController@update');
        Route::post('/delete/{id}', 'StoresApiController@delete');
    });

    // Sliders routes
    Route::prefix('slider')->middleware('auth:api')->group(function (){
        Route::get('/', 'SliderApiController@index');
        Route::get('/{id}', 'SliderApiController@details');
        Route::post('/store', 'SliderApiController@store');
        Route::post('/update/{id}', 'SliderApiController@update');
        Route::post('/delete/{id}', 'SliderApiController@delete');
        Route::post('/duplicate/{id}', 'SliderApiController@duplicate');
     });

     // Menus routes
    Route::prefix('menus')->middleware('auth:api')->group(function (){
        Route::get('/', 'ManagerMenusApiController@index');
        Route::get('/{id}', 'ManagerMenusApiController@details');
        Route::post('/store', 'ManagerMenusApiController@store');
        Route::post('/update/{id}', 'ManagerMenusApiController@update');
        Route::post('/delete/{id}', 'ManagerMenusApiController@delete');
     });

    //  Settings routes
    Route::prefix('settings')->middleware('auth:api')->group(function (){
        Route::post('/update', 'ManagerSettingsApiController@update');
        Route::post('/social', 'ManagerSettingsApiController@social');
        Route::post('/stripe', 'ManagerSettingsApiController@stripe');
        Route::post('/paypal', 'ManagerSettingsApiController@paypal');
    });
});