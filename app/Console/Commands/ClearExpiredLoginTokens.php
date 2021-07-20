<?php

namespace App\Console\Commands;

use App\Models\LoginToken;
use Illuminate\Console\Command;

class ClearExpiredLoginTokens extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auth:clear-token';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear Expired Login Tokens';

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
        LoginToken::expired()->delete();
    }
}
