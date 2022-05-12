<?php

namespace App\Services\Users\Handlers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ChangeUserPasswordHandler
{
    public function handle(User $user, string $plainPassword): void
    {
        $hashedPassword = Hash::make($plainPassword);

        $user->password = $hashedPassword;

        $user->save();
    }
}
