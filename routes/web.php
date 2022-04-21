<?php

use App\Contracts\CalculatorInterface;
use App\Contracts\NotificationService;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\TestController;
use App\Models\User;
use App\Services\CalculatorNotificationService;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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
    TestController::class,
    'index',
]);
Route::get('/test2', [
    TestController::class,
    'index2',
]);

Route::get('/php/{user}', function ($userId) {
    $user = User::find($userId);
    $comment = 'my comment';

    return view('my_template', [
        'userName' => 'Admin',
        'comment'  => $comment,
        'hidden'   => false,
        'user'     => $user,
    ]);
});

Route::get('/comments/{user}', [
        CommentController::class,
        'show',
    ]);

Route::get('/set', function () {
    return response()->make()->withCookie(cookie()->forever('lang', 'ru'));
});

Route::get('/di', function (NotificationService $notificationService) {
    $l1 = app(NotificationService::class);
    $l2 = app(NotificationService::class);
    $l3 = app(NotificationService::class);

    dump([
        app(NotificationService::class)->notify(1, 'welcome'),
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

Route::get('/log', function (){
    $context = ['method' => request()->method(), 'request' => request()];

   Log::info('log handler', $context);
   Log::channel('daily')->debug('Boom!');

   return 'ok';
});

Route::get('/collect', function (){
    $convert = fn ($v) => mb_strtoupper($v);

    $col = User::take(10)->get()
//        ->reduce(function ($agr, $u) {
//            if ($u->is_admin)
//                $agr[] = $u;
//            return $agr;
//        }, []);
//        ->map(fn($u) => $u->name)
            ->map->makeAdmin();
//        ->map(fn($u) => $u->id.'asdf')
//        ->all();
//        ->reject(fn ($v) => empty($v))
//        ->all();
    dd($col);
});

Route::get('/lazy', function() {
    ini_set('memory_limit', '10M');
//   dump(ini_get('memory_limit'));
   $user = User::all()->map(function ($u){
       dump('map');
       return $u->is_admin;
   })->filter(function ($b) {
       dump('filter');
       return $b;
   });
   dump(collect($user->take(10)->all())->values());
   return 'ok';
});


Route::get('/st', function (){
   return dump(Storage::exists('text1.txt'));

   return 'ok';
});

Route::post('/upl', function (\Illuminate\Http\Request $request){
    $file = $request->file('avatar');
    dump($file->storeAs('text',
        $file->getClientOriginalName())
    );
});

Route::get('/dow', function (\Illuminate\Http\Request $request){
    return Storage::url('asdf/adsfgsdf.asdf');
//    if (false)
//        return Storage::disk('local')->download('robots.txt', '123.txt');
//    abort(403);
});
