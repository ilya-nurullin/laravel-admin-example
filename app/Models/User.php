<?php

namespace App\Models;

use App\QueryBuilders\UserQueryBuilder;
use App\View\Components\Contracts\AsTable;
use Collective\Html\Eloquent\FormAccessible;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property Comment[] comments
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, FormAccessible, AsTable;

    const EDITOR_ROLE = 'editor';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'date',
        'is_admin' => 'boolean',
    ];


    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function getEditLink(): string
    {
        return route('admin.users.edit', ['user' => $this]);
    }

    public function getRemoveLink(): string
    {
        return route('admin.users.destroy', ['user' => $this]);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'author_id');
    }

    public function newEloquentBuilder($query)
    {
        return new UserQueryBuilder($query);
    }
}
