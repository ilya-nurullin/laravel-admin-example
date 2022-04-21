<?php

use App\Contracts\CalculatorInterface;
use App\Services\CalculatorNotificationService;
use Illuminate\Support\Facades\Broadcast;
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

Route::get('/test', [
    \App\Http\Controllers\TestController::class,
    'index',
]);
Route::get('/test2', [
    \App\Http\Controllers\TestController::class,
    'index2',
]);

Route::get('/php/{user}', function ($userId) {
    $user = \App\Models\User::find($userId);
    $comment = 'my comment';

    return view('my_template', [
        'userName' => 'Admin',
        'comment'  => $comment,
        'hidden'   => false,
        'user'     => $user,
    ]);
});

Route::get('/comments/{user}', [
        \App\Http\Controllers\Admin\CommentController::class,
        'show',
    ]);

Route::get('/set', function () {
    return response()->make()->withCookie(cookie()->forever('lang', 'ru'));
});

Route::get('/di', function (\App\Contracts\NotificationService $notificationService) {
    $l1 = app(\App\Contracts\NotificationService::class);
    $l2 = app(\App\Contracts\NotificationService::class);
    $l3 = app(\App\Contracts\NotificationService::class);

    dump([
        app(\App\Contracts\NotificationService::class)->notify(1, 'welcome'),
        $l1->notify(2, 'welcome'),
        $l2->notify(3, 'welcome'),
        $l3->notify(4, 'welcome'),
        $notificationService->notify(5, 'welcome'),
        ]);
});

Route::get('/cache', function (CalculatorInterface $service) {
    dump(app('request')->all());
    $service1 = resolve(CalculatorNotificationService::class);
    $service2 = resolve(CalculatorInterface::class);
//    $service = // CalcFacade === app(CalculatorService::class);
//    return Cache::get('key', 'none');
//    $v3 = $service->add(3)->sub(1)->mul(2)->res(); // 4
//    $v4 = $service->add(3)->sub(1)->mul(2)->res(); // 4
    $v1 = CalcFacade::add(3)->sub(1)->mul(2)->res(); // 4
    $v2 = CalcFacade::add(3)->sub(1)->mul(2)->res(); // 4

    $v3 = $service->add(3)->sub(1)->mul(2)->res();
    $v4 = $service1->add(3)->sub(1)->mul(2)->res();
    $v5 = $service2->add(3)->sub(1)->mul(2)->res();
//    LoggerNotificationService::notify(1, $v2);
    return [$v1, $v2, $v3, $v4, $v5];
});

Route::get('/get-cache', function () {
    Broadcast::class;
    return cache('key', '1234');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');

Route::get('/login/{userId}', fn ($id) => Auth::loginUsingId($id));

Route::get('/json', fn() => ['ok' => true, 'errors' => [['name' => [ 'message' => 'Too short', 'code' => 123 ]]]]);
