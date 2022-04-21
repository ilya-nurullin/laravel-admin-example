<?php

namespace Tests\Feature\Admin;

use App\Models\Post;
use App\Models\User;
use Database\Seeders\PostSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\WithUsers;
use Tests\TestCase;

/**
 * @group admin
 */
class UserControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker, WithUsers;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIsOk()
    {
        $user = $this->getAdminUser();

        $response = $this->actingAs($user)->get(route('admin.users.index'));

        $response->assertStatus(200);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIsHtmlResponse()
    {
        User::factory()->create();
        $user = $this->getAdminUser();

        $response = $this->actingAs($user)->get(route('admin.users.index'));

        $response->assertStatus(200)->assertSee('doctype html');
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIsJsonResponse()
    {
        $this->markTestSkipped();

        User::factory()->create();
        $user = $this->getAdminUser();
        $fragment = [
            "id"                => 1,
            "name"              => "test",
            "email"             => "mia.weimann@example.com",
            "email_verified_at" => "2022-02-24T00:00:00.000000Z",
            "is_admin"          => true,
            "role"              => "editor",
        ];

        $response = $this->actingAs($user)->json('GET', route('admin.users.index'));

        $response->assertStatus(200)->assertJsonFragment([
            $fragment
        ]);
    }

    public function testJson()
    {
        $response = $this->json('GET', '/json');

        $response->assertOk()->assertJsonStructure([
            'ok',
            'errors' => [
                '*' => [
                    'name' => [
                        'message',
                        'code',
                    ],
                ],
            ],
        ]);
    }

    public function testAllPosts()
    {
        $this->seed(PostSeeder::class);
        User::factory()->create([]);

        $postLength = PostSeeder::POST_COUNT;

        $response = $this->actingAsAdmin()->json('get', route('admin.posts.index'));

        $response->assertOk()->assertJsonCount($postLength);
    }
}
