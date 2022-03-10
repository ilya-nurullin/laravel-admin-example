<?php

namespace App\Services;

use App\Mail\UsedDataChangedMail;
use App\Models\User;
use Illuminate\Log\LogManager;
use Illuminate\Support\Facades\Mail;

class EmailNotificationService implements NotificationService
{
    public function notify(int $userId, string $message): int
    {
        $user = User::find($userId);
        Mail::to($user->email)->send(new UsedDataChangedMail($user, $message));
        return 1;
    }
}
