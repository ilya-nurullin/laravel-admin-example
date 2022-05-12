<?php

namespace App\Console\Commands;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Console\Command;

class SystemInfo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'system:info';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $userCount = User::count();
        $postCount = Post::count();
        $commentCount = Comment::count();

        $this->table(['Metric', 'Value'],
            [
                ['# User', $userCount],
                ['# Post', $postCount],
                ['# Comment', $commentCount],
            ]);

        $this->table(['Metric', 'Value'],
            [
                ['# User', $userCount],
                ['# Post', $postCount],
                ['# Comment', $commentCount],
            ]);

        return 0;
    }
}
