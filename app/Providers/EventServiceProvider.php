<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     * 应用中事件监听器的映射
     * @var array
     */
    protected $listen = [
        'App\Events\Event' => [
            'App\Listeners\EventListener',
        ],
        'App\Events\ExampleEvent' => [
            'App\Listeners\ExampleEventListener',
        ],
        'App\Events\TestEvent' => [//登陆事件
            'App\Listeners\TestEventListener'
        ]
    ];

    /**
     * The subscriber classes to register.
     * 需要注册的订阅者类
     * @author WQQ 2017-07-13 13:59:13
     * @var array
     */
    protected $subscribe = [//用户事件订阅
        \App\Listeners\UserEventSubscriber::class
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
        //
    }

    public function register()
    {

    }
}
