<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Cache;
use Tests\TestCase;

/**
 * @group cache
 */
class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $expectedCacheValue = 'qwerewr';

        Cache::shouldReceive('get')->with('key', '1234')->andReturn($expectedCacheValue);

        $response = $this->get('/get-cache');

        $response->assertStatus(200)->assertSeeText($expectedCacheValue);
    }
}
