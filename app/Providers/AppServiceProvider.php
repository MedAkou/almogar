<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use View;
use App;
use Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
     



    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        App::setLocale('de');

        
//            $_SESSION['browser_histoy'][] = rand(1000,1111);

        View::share('symbol', '€');
        View::share('Activeshop', '€');         
        App::bind('SiteSetting',\App\Helpers\AppHelper::class);
        
        new \App\Helpers\HistoryHelper();

//   dd( $_SESSION['browser_histoy']);

    }
}