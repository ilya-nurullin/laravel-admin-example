<?php

namespace App\Http\Resources;

use App\Models\Post;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PostsResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'data' => $this->map(fn(Post $post) => [
                'id'   => $post->id,
                'text' => $post->text,
            ]),
            'parameters' => $request->all(),
        ];
    }
}
