<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;

class CacheService
{
    static public function getUserCacheManager() {
        return Cache::tags(['users', 'entities', 'general-user']);
    }
    static public function getAdminCacheManager() {
        return Cache::tags(['users', 'entities', 'admin']);
    }

}
