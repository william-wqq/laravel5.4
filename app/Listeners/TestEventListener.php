<?php

namespace App\Listeners;

use App\Entities\CacheContantPrefixDefine;
use App\Events\TestEvent;
use App\Models\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class TestEventListener implements ShouldQueue
{
    use InteractsWithQueue;

    //TODO 如果在命令行也定义delay、tries、timeout，php artisan queue:work --delay=60 --tries=3 timeout=120
    //TODO 但优先使用自定义参数值$delay、$tries、$timeout

    /**
     * 队列化任务使用的连接名称
     * @var string|null
     */
    public $connection;//redis

    /**
     * 队列化任务使用的队列名称
     * @var string|null
     */
    public $queue = 'listener';

    /**
     * 队列任务处理延迟
     * @var int|null
     */
    public $delay = 120;

    /**
     * 任务处理失败后最大尝试次数
     * @var int|null
     */
    public $tries = 5;

    /**
     * 任务处理超时时间
     * @var int|null
     */
    public $timeout = 120;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  TestEvent  $event
     * @return void
     */
    public function handle(TestEvent $event)
    {
        $user = $event->user;

        try {
            \Cache::remember(CacheContantPrefixDefine::User_ACCOUNT_INFO_PREFIX.$user->id, 1440, function() use ($user) {
                return User::findOrFail($user->id);
            });

            \SLog::info('用户: ' .$user->username. ' 信息成功存入 ' .\Cache::getDefaultDriver(). ' 缓存', ['队列名称' => \Queue::getDefaultDriver()]);
        }catch(\Exception $e) {
            \SLog::error('用户: ' .$user->username. ' 信息失败存入 ' .\Cache::getDefaultDriver(). ' 缓存', ['error' => $e->getMessage()]);
            throw $e;
        }

    }

    /**
     * 处理失败的队列
     */
    public function failed()
    {
        //TODO 处理失败的队列
        \SLog::error('监听事件队列处理失败');
    }


}
