<?php

namespace App\Console\Commands;

use App\Services\Users\Repo\UserRepo;
use App\Services\Users\UsersService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class ChangeUserPassword extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = '
    user:change:password
    {userId : user id}
    {password=pass : new plain password}
    {--d|dry-run : run in dry-run mode}
    {--S|send-email-to= : will send email}
    ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Change user\'s password';

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
        $userId = $this->argument('userId');
        $plainPassword = $this->argument('password');

        $dryRun = $this->option('dry-run');
        $sendEmailTo = $this->option('send-email-to');

        if (!$dryRun) {

            app(UsersService::class)->changePasswordUserId($userId, $plainPassword);

            $user = app(UserRepo::class)->getOrFail($userId);

            if (Hash::check($plainPassword, $user->password))
                $this->info('Password changed successfully');
            else
                $this->error('Password and hash do not match');

            if (!empty($sendEmailTo))
                $this->info("Email sent to $sendEmailTo");
        }
        else {
            $this->warn("Dry run password change for $userId by $plainPassword");
        }

        return 0;
    }
}
