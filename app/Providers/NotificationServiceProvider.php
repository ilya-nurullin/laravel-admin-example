<?php

namespace App\Providers;

use App\Http\Controllers\Admin\UserController;
use App\Services\EmailNotificationService;
use App\Services\LoggerNotificationService;
use App\Services\NotificationService;
use Illuminate\Support\ServiceProvider;

class NotificationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->when(UserController::class)
                  ->needs(NotificationService::class)
                  ->give(EmailNotificationService::class);

        $this->app->bind(
            NotificationService::class,
            LoggerNotificationService::class);


        $this->app->when(UserController::class)
                  ->needs('$num')
                  ->give(fn () => 5);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
