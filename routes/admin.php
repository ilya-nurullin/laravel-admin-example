<?php

use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'admin/users');

Route::resource('users', UserController::class)->whereNumber('user');
Route::resource('posts', PostController::class)->whereNumber('post');

Route::get('/users/test', function () {
    return 'asf';
});

