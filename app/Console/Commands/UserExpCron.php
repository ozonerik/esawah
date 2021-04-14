<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserExpCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user_expired:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'user_expired cronjob';

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
          DB::table('users')->where('user_expired', Carbon::now()->format('Y-m-d'))
          ->update([
          'role' => "free",
          'request_code' => null,
          'user_expired' => null,
          ]);
          $this->info('user_expired:cron Cummand Run successfully!');          
    }
}
