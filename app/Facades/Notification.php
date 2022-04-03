<?php

namespace App\Facades;

use App\Services\EmailNotificationService;
use App\Services\LoggerNotificationService;
use Illuminate\Support\Facades\Facade;
use phpDocumentor\Reflection\Types\Void_;

/**
 * @method static int notify(int $userId, string $message)
 */
class Notification extends Facade
{
    protected static function getFacadeAccessor()
    {
        return LoggerNotificationService::class;
    }
}
