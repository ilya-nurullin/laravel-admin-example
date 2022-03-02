<?php

namespace App\QueryBuilders;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class UserQueryBuilder extends Builder
{
    public function admins()
    {
        return $this->where('is_admin', true);
    }
}
