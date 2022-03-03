<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class CommentController extends Controller
{
    public function show(User $user)
    {
        $comments = $user->comments;
        $btnType = 'error';

        return view('comments', compact('comments',
            'user', 'btnType'));
    }
}
