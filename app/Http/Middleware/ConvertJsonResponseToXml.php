<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use SimpleXMLElement;

class ConvertJsonResponseToXml
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
        /** @var $response \Illuminate\Http\Response */
        $response = $next($request);

        $array = json_decode($response->getContent(), true);

        $xml = new SimpleXMLElement('<users/>');
        $this->arrayToXml($array, $xml);

        $xmlString = $xml->asXML();

        $response->setContent($xmlString);

        return $response;
    }

    function arrayToXml($array, &$xml){
        foreach ($array as $key => $value) {
            if(is_int($key)){
                $key = "e";
            }
            if(is_array($value)){
                $label = $xml->addChild($key);
                $this->arrayToXml($value, $label);
            }
            else {
                $xml->addChild($key, $value);
            }
        }
    }
}
