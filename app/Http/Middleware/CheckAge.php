<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, int $age = 18, $disabled = 'false')
    {
        if ($disabled === 'true') {
            return $next($request);
        }

        info('Before CheckAge '.time());
        $user = $request->user();

        if (!$user) {
            abort(401);
        }

        if ($user->birth_date->age < $age) {
            abort(403, 'Too young');
        }

        info('After CheckAge '.time());

        return $next($request);
    }
}
