<?php

namespace App\Services\Users\Repo;

use App\Models\User;

class EloquentUserRepo implements UserRepo
{
    public function getOrFail($id): User
    {
        return User::findOrFail($id);
    }
}
