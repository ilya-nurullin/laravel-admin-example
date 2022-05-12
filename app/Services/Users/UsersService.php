<?php

namespace App\Services\Users;

use App\Models\User;
use App\Services\Users\Handlers\ChangeUserPasswordHandler;
use App\Services\Users\Repo\UserRepo;

class UsersService
{
    private UserRepo $userRepo;

    public function __construct(UserRepo $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function changePassword(User $user, string $plainPassword): void
    {
        app(ChangeUserPasswordHandler::class)->handle($user, $plainPassword);
    }

    public function changePasswordUserId($userId, string $plainPassword): void
    {
        $user = $this->userRepo->getOrFail($userId);
        $this->changePassword($user, $plainPassword);
    }
}
