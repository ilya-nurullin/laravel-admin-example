<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Http\Resources\PostResource;
use App\Http\Resources\PostsResource;
use App\Models\Post;
use App\Repos\PostRepo;
use App\Services\PostService;
use Illuminate\Http\Request;

class ApiPostController extends Controller
{
    private PostRepo $postRepo;

    public function __construct(PostRepo $postRepo)
    {
        $this->postRepo = $postRepo;
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return PostsResource::make($this->postRepo->getAll());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function store(PostCreateRequest $request)
    {
        $postService = $this->getPostService();

        $postService->createPost($request->validated());

        return ['ok' => true];
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Post $post
     */
    public function show(Post $post)
    {
        return PostResource::make($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Post         $post
     */
    public function update(PostUpdateRequest $request, Post $post)
    {
        $post->text = $request->input('text');
        $post->save();

        return ['ok' => true];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Post $post
     */
    public function destroy(Post $post)
    {
        //
    }

    public function getPostService(): PostService
    {
        return app(PostService::class);
    }
}
