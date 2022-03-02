<?php

namespace App\Repos;

use App\Models\User;

class UserManager
{
    public function getAllAdmins()
    {
        return User::admins()->get();
    }

    public function updateUser($id, array $data) {
        $user = User::findOrFail($id);
        $user->update($data);
    }
}
