<?php

namespace App\Console\Commands;

use App\Services\Users\Repo\UserRepo;
use App\Services\Users\UsersService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;

class ChangeUsersPasswords extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:change:passwords {password} {--userIds=*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Change users\' passwords';

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
        $userIds = $this->option('userIds');

        $plainPassword = $this->argument('password');

        foreach ($userIds as $userId) {
            $this->call(ChangeUserPassword::class,
                ['userId' => $userId, 'password' => $plainPassword]);
        }

        $this->info('Password changed successfully');

        return 0;
    }
}
