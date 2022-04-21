<?php

namespace Tests\Feature;

use App\Contracts\NotificationService;
use App\Services\CalculatorNotificationService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Mail;
use Mockery\MockInterface;
use Tests\TestCase;

/**
 * @group service
 */
class CalculatorNotificationServiceTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $expected = 2;

        Mail::fake();

        $serviceSpy = $this->spy(NotificationService::class);

        $service = $this->app->make(CalculatorNotificationService::class);

        $res = $service->add(3)->sub(1)->res();

        $this->assertEquals($expected, $res);

        $serviceSpy->shouldHaveReceived('notify');
    }
}
