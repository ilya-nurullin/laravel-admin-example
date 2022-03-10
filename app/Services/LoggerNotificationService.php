<?php

namespace App\Services;

use Illuminate\Log\LogManager;

class LoggerNotificationService implements NotificationService
{
    private LogManager $logger;
    private int $count;

    public function __construct(LogManager $logger)
    {
        $this->logger = $logger;
        $this->count = 0;
    }

    public function notify(int $userId, string $message): int
    {
       $this->logger->info("NOTIFICATION to $userId with $message");
       return ++$this->count;
    }
}
