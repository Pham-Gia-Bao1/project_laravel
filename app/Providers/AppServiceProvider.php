<?php

namespace App\Providers;

use App\View\Components\card_product_top;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use App\View\Components;
use App\View\Components\button;
use App\View\Components\card_product;

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
        //
        Blade::component('card_product',card_product::class);
        Blade::component('card_product_top',card_product_top::class);
        Blade::component('button',button::class);

    }
}
