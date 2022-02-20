<?php

namespace App\Models;

use App\View\Components\Contracts\AsTable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory, AsTable;

    protected $fillable = [
        'user_id',
        'text',
    ];

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
}
