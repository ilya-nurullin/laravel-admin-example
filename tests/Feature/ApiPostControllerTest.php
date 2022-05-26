<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/**
 * @group api
 */
class ApiPostControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_show_all_posts()
    {
        $post = Post::factory()->create();

        $response = $this->json('get', route('posts.index'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'text',
                ],
            ],
        ]);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_show_first_post()
    {
        $post = Post::factory()->create();

        $response = $this->json('get', route('posts.show', ['post' => $post->id]));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data' => [

                'user' => [
                    'id',
                    'name',
                ],
                'text',
                'version',
                '__type',
            ],
        ]);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_add_post()
    {
        $user = User::factory()->create();

        $data = [
            'user_id' => $user->id,
            'text' => 'sfg',
        ];

        $response = $this->json('post', route('posts.store'), $data);

        $response->assertStatus(200);

        $this->assertEquals(1, Post::count());

        $post = Post::first();

        $this->assertEquals($post->user_id, $user->id);
        $this->assertEquals($post->text, $data['text']);

        $response->assertJson(['ok' => true]);
    }
}
