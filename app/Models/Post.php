<?php

namespace App\Models;

use App\View\Components\Contracts\AsTable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string text
 * @property-read User $user
 */
class Post extends Model
{
    use HasFactory, AsTable;

    protected $fillable = [
        'user_id',
        'text',
    ];

    protected $hidden = ['updated_at', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    function getEditLink(): string
    {
        return route('admin.posts.edit', ['post'=>$this]);
    }

    public function getRemoveLink(): string
    {
        return route('admin.posts.destroy', ['post' => $this]);
    }

    public function likes()
    {
        return $this->hasManyThrough(CommentLike::class, Comment::class);
    }
}
