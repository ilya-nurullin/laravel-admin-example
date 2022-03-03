<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', [\App\Http\Controllers\TestController::class, 'index']);
Route::get('/test2', [\App\Http\Controllers\TestController::class, 'index2']);

Route::get('/php/{user}', function ($userId) {
    $user = \App\Models\User::find($userId);
    $comment = 'my comment';
   return view('my_template', ['userName' => 'Admin', 'comment' => $comment,
                               'hidden'=> false, 'user' => $user]);
});

Route::get('/comments/{user}',
    [\App\Http\Controllers\Admin\CommentController::class, 'show']);

Route::get('/set', function () {
    return response()->make()->withCookie(cookie()->forever('lang', 'ru'));
});
