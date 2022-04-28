<?php

namespace App\Http\Middleware;

use App\Services\XmlToJsonConverter;
use Closure;
use Illuminate\Http\Request;

class ConvertXmlRequestToJson
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
        $content = $request->getContent();

        $array = app()->make(XmlToJsonConverter::class)->convert($content);

        $request->headers->set('X-ORIGIN-CONTENT_TYPE', $request->header('CONTENT_TYPE'));
        $request->headers->set('CONTENT_TYPE', 'application/json');
        $request->setJson(collect($array));

        dump($request->input('user'));

        return $next($request);
    }
}
