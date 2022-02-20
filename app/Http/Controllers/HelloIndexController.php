<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HelloIndexController extends Controller
{
    public function __invoke(Request $request)
    {
        return "Hello from HelloIndexController@__invoke";
    }
}
