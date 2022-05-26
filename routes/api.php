<?php

use App\Http\Controllers\Api\ApiPostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:token')->get('/posts', function (Request $request) {
//    return \App\Models\Post::all();
//});

Route::apiResource('posts', ApiPostController::class)->except(['update']);
Route::put('/posts/{post}', [ApiPostController::class, 'update'])
    ->name('posts.update')->middleware('auth:user_api_token');
