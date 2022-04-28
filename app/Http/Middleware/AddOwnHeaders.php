<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AddOwnHeaders
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        info('Before AddOwnHeaders '.time());
        /** @var $response \Illuminate\Http\Response */
        $response = $next($request); // Request => Response

        $response->headers->set('X-Server-Timestamp', time());

        info('After AddOwnHeaders '.time());
        return $response;
    }
}
