<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class RemindServerTiming extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remindserver:remindserver-timing';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '提醒服务定时任务';

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
        $this->info('正在执行');

        Log::info(1);
        Log::info(2);
        Log::info(3);
        Log::info(4);
        Log::info(5);

        $this->info('执行成功！');

    }
}
