<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // AppServiceProvider.php
        $this->app->singleton(FakerGenerator::class, function () {
            return FakerFactory::create('id_ID');
        });
    }
}
