<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Message;
use Carbon\Carbon;

class TruncateExpiredMessages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'message:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete expired messages';

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
     * @return mixed
     */
    public function handle()
    {
        Message::where('expired_at', '<', Carbon::now())->each(function ($message) {
            $message->delete();
        });
    }
}
