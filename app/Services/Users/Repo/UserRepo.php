<?php

namespace App\Services\Users\Repo;

use App\Models\User;

interface UserRepo
{
    public function getOrFail($id): User;
}
