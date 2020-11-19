<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use \App\Models\Options;
class OptionsServiceProvider extends ServiceProvider
{
    protected $options;

    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->bind('option', Options::class);
    }
}