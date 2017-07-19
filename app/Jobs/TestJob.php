<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class TestJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var
     */
    public $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    public function __construct($user)
    {
        $this->user = $user;
        $this->handle();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        \SLog::info('调度队列处理中...');
//        $user = $this->user;
//        \SLog::info('调度队列处理中...', ['用户名' => $user->username, '邮箱' => $user->email]);
    }
}
