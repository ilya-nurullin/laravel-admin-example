<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class InputTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'input:test';

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
        $this->withProgressBar([1,2,3,4], function ($el) {
           $this->line("process $el");
           sleep(1);
        });

        $name = $this->choice('What is your name?', ['John', 'May', 'Mike']);
        $password = $this->secret('What is your password?');

        if ($this->confirm('Display?', true)) {
            $this->line("Your name: $name");
            $this->line("Your pass: $password");
        }

        $this->line('line');
        $this->info('info');
        $this->line(PHP_EOL);
        $this->newLine();
        $this->warn('warn');
        $this->error('error');

        return 0;
    }
}
