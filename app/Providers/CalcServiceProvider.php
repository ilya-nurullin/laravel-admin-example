<?php

namespace App\Providers;

use App\Contracts\CalculatorInterface;
use App\Services\CalculatorService;
use Illuminate\Support\ServiceProvider;

class CalcServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CalculatorInterface::class, CalculatorService::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
