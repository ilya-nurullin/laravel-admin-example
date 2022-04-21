<?php

namespace Tests\Feature;

use App\Models\User;

trait WithUsers
{
    public function getAdminUser()
    {
        return User::factory()->admin()->create();
    }

    public function actingAsAdmin()
    {
        return $this->actingAs($this->getAdminUser());
    }
}
