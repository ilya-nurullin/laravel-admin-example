<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\NotificationService;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\EditUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private NotificationService $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return $request->expectsJson() ? User::all() : view('admin.pages.list', [
            'title'      => 'Users',
            'collection' => User::all(),
            'addUrl' => route('admin.users.create')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $this->authorize('create', User::class);

        return view('admin.pages.user.edit', [
            'user' => [],
            'title' => 'Add new user',
            'route' => route('admin.users.store'),
            'method' => 'POST'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(CreateUserRequest $request)
    {
        $this->authorize('create', User::class);

        $password = \Hash::make($request->password);

        $user = User::create(
            $request->except('password') + compact('password')
        );

        $this->notificationService->notify($user->id, '1234');

        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return response()->json($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     */
    public function edit(User $user)
    {
        return view('admin.pages.user.edit', [
            'user' => $user,
            'title' => 'Edit user',
            'route' => route('admin.users.update', ['user' => $user]),
            'method' => 'PUT'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     */
    public function update(EditUserRequest $request, User $user)
    {
        $user->update($request->except(['password']));

//        Mail::to($request->email)->send(new UsedDataChangedMail($user));

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back();
    }
}
