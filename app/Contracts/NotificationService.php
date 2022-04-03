<?php

namespace App\Contracts;

interface NotificationService
{
    public function notify(int $userId, string $message): int;
}
