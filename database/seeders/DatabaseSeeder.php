<?php

namespace Database\Seeders;

use App\Models\CommentLike;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin@admin.com'),
            'is_admin' => true,
            'birth_date' => '1995-01-01'
        ]);

        CommentLike::factory(10)->create();
        User::factory(10)->create();
        Post::factory(10)->create();

    }
}
