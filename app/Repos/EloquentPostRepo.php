<?php

namespace App\Repos;

use App\Models\Post;

class EloquentPostRepo implements PostRepo
{
    public function getAll()
    {
        return Post::all();
    }
}
