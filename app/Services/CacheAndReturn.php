<?php

namespace App\Services;

use Illuminate\Cache\CacheManager;
use Illuminate\Support\Facades\Cache;

class CacheAndReturn
{
    public function __invoke(CacheManager $cache)
    {
        return $cache->remember('page', 60, function () {
            return \Illuminate\Support\Facades\View::make('welcome')->render();
        });
    }
}
