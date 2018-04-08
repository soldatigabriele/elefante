<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
            $view->with('tags', \App\Tag::all()->pluck('name'));
            $view->with('colours', \App\Colour::all()->pluck('name'));
            $view->with('flavours', \App\Flavour::all()->pluck('name'));
            $view->with('countries', \App\Country::all()->pluck('name'));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
