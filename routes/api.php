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
        Route::post('login', 'ApiController@login');
    });

    // Users routes
    Route::prefix('user')->middleware('auth:api')->group(function () {
        Route::get('/profile', 'UserApiController@profile');
        Route::get('/logout', 'UserApiController@logout');
        Route::post('/edit', 'UserApiController@edit');
        Route::post('/update', 'UserApiController@update');
        Route::post('/delete', 'UserApiController@delete');
        Route::post('/updatePassword', 'UserApiController@updatePassword');
    });

    //  posts routes
    Route::prefix('posts')->middleware('auth:api')->group(function () {
        Route::get('/', 'PostsController@index');
        Route::get('/create', 'PostsController@create');
        Route::post('/store', 'PostsController@store');
        Route::get('/edit/{id}', 'PostsController@edit');
        Route::post('/update/{id}', 'PostsController@update');
        Route::get('/delete/{id}', 'PostsController@delete');
        Route::get('/clone/{id}', 'PostsController@clone');
        Route::get('/view/{id}', 'PostsController@view');
        Route::post('/multiaction', 'PostsController@multiaction');
        
        // posts categories routes
        Route::prefix('categories')->middleware('auth:api')->group(function () {
            Route::any('/', 'PostsCategoriesController@index');
            Route::post('/store', 'PostsCategoriesController@store');
            Route::get('/edit/{id}', 'PostsCategoriesController@edit');
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
    Route::prefix('pages')->middleware('auth:api')->group(function () {
        Route::get('/', 'PagesController@index');
        Route::get('/create', 'PagesController@create');
        Route::post('/store', 'PagesController@store');
        Route::get('/edit/{id}', 'PagesController@edit');
        Route::post('/update/{id}', 'PagesController@update');
        Route::get('/delete/{id}', 'PagesController@delete');
        Route::get('/clone/{id}', 'PagesController@clone');
        Route::get('/duplicate/{id}', 'PagesController@duplicate');
    });

    // Ads routes
    Route::prefix('ads')->middleware('auth:api')->group(function () {
        Route::get('/', 'AdsApiController@index');
        Route::get('/create', 'AdsApiController@create');
        Route::post('/store', 'AdsApiController@store');
        Route::get('/edit/{id}', 'AdsApiController@edit');
        Route::post('/update/{id}', 'AdsApiController@update');
        Route::get('/delete/{id}', 'AdsApiController@delete');
        Route::get('/clone/{id}', 'AdsApiController@clone');
        Route::get('/duplicate/{id}', 'AdsApiController@duplicate');
    });

    // Products routes
    Route::prefix('products')->middleware('auth:api')->group(function () {
        Route::get('/', 'ProductsApiController@index');
        Route::post('/{id}/details', 'ProductsApiController@details');
        Route::get('/create', 'ProductsApiController@create');
        Route::post('/store', 'ProductsApiController@store');
        Route::get('/{id}/edit', 'ProductsApiController@edit');
        Route::post('/{id}/update', 'ProductsApiController@update');
        Route::post('/{id}/delete', 'ProductsApiController@delete');
        Route::get('/search', 'ProductsController@search');
        Route::get('/activate/{id}', 'ProductsController@activate');
        Route::get('/deactivate/{id}', 'ProductsController@deactivate');
    });

    // Products categories routes
    Route::prefix('categories')->middleware('auth:api')->group(function (){
        Route::get('/', 'ProductsCategoriesApiController@index');
        Route::post('/store', 'ProductsCategoriesApiController@store');
        Route::get('/edit/{id}', 'ProductsCategoriesApiController@edit');
        Route::post('/update/{id}', 'ProductsCategoriesApiController@update');
        Route::get('/delete/{id}', 'ProductsCategoriesApiController@delete');
    });

    // Orders routes
    Route::prefix('orders')->middleware('auth:api')->group(function (){
        Route::get('/', 'ManagerOrdersApiController@index');
        Route::any('/edit/{id}', 'ManagerOrdersApiController@edit');
        Route::any('/update/{id}', 'ManagerOrdersApiController@update');
        Route::any('/delete/{id}', 'ManagerOrdersApiController@delete');
        Route::get('/clone', 'ManagerOrdersApiController@clone');
    });

    // Stores routes
    Route::prefix('stores')->middleware('auth:api')->group(function (){
        Route::get('/', 'ManagerStoresApiController@index');
        Route::get('/create', 'ManagerStoresApiController@create');
        Route::post('/store', 'ManagerStoresApiController@store');
        Route::get('/edit/{id}', 'ManagerStoresApiController@edit');
        Route::post('/update/{id}', 'ManagerStoresApiController@update');
        Route::get('/delete/{id}', 'ManagerStoresApiController@delete');
        Route::get('/clone/{id}', 'ManagerStoresApiController@clone');
        Route::get('/view/{id}', 'ManagerStoresApiController@view');
        Route::post('/multiaction', 'ManagerStoresApiController@multiaction');
        Route::get('/duplicate/{id}', 'ManagerStoresApiController@duplicate');
    });

    // Sliders routes
    Route::prefix('slider')->middleware('auth:api')->group(function (){
        Route::get('/', 'ManagerSliderApiController@index');
        Route::get('/create', 'ManagerSliderApiController@create');
        Route::post('/store', 'ManagerSliderApiController@store');     
        Route::get('/edit/{id}', 'ManagerSliderApiController@edit');
        Route::post('/update/{id}', 'ManagerSliderApiController@update');
        Route::get('/delete/{id}', 'ManagerSliderApiController@delete');
        Route::get('/clone/{id}', 'ManagerSliderApiController@clone');
        Route::get('/duplicate/{id}', 'ManagerSliderApiController@duplicate');
     });

     // Menus routes
    Route::prefix('menus')->middleware('auth:api')->group(function (){
        Route::get('/', 'ManagerMenusApiController@index');
        Route::get('/create', 'ManagerMenusApiController@create');
        Route::get('/edit/{id}', 'ManagerMenusApiController@edit');
        Route::post('/store', 'ManagerMenusApiController@store');
        Route::post('/update/{id}', 'ManagerMenusApiController@update');
        Route::get('/delete/{id}', 'ManagerMenusApiController@delete');
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