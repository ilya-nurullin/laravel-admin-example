<?php

namespace App\Services;

interface NotificationService
{
    public function notify(int $userId, string $message): int;
}
