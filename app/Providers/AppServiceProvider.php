<?php

namespace App\Providers;

use App\Http\Middleware\AddOwnHeaders;
use App\Services\CalculatorService;
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
        $this->app->bind('mycalc', CalculatorService::class);
//        $this->app->singleton(AddOwnHeaders::class, AddOwnHeaders::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
