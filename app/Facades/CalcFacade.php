<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class CalcFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        $instance = app('mycalc');
        $instance->add(3);
        return $instance;
    }
}
