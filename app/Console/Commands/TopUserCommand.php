<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\TopupUserController;

class TopUserCommand extends Command
{
    
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'top:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Find the top topup users';

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
        (new TopupUserController())->topTopup();
    }
}
