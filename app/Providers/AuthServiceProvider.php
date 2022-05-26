<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\Token;
use App\Models\User;
use App\Policies\PostPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        User::class => UserPolicy::class,
        Post::class => PostPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Auth::viaRequest('api-token', function (Request $request) {
            return Token::where('token', $request->token)->first();
        });

        Auth::viaRequest('user-api-token', function (Request $request) {
            return User::where('api_token', $request->token)->first();
        });

        Gate::define('only-admins', function (User $user) {
            return $user->is_admin;
        });
    }
}
