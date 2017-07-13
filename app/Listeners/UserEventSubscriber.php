<?php
/**
 * Created by PhpStorm.
 * User: WQQ
 * Date: 2017/7/13
 * Time: 13:46
 */

namespace App\Listeners;
use App\Entities\CacheContantPrefixDefine;
use Carbon\Carbon;

class UserEventSubscriber
{
    /**
     * create a eventSubscriber instance
     *
     * UserEventSubscriber constructor.
     */
    public function __construct()
    {
        //dd(22);
    }

    /**
     * 处理用户登录事件
     */
    public function onUserLogin($event)
    {
        $user = $event->user;
        try {
            //添加缓存
            \Cache::put(CacheContantPrefixDefine::User_ACCOUNT_INFO_PREFIX.$user->id, $user, 1440);

            //用于登陆日志记录,比如user_login表
//            \DB::transaction(function(){
//                \DB::insert();
//            });

            \SLog::info('登陆成功', ['用户名' =>$user->username, '登陆时间' => Carbon::now(), 'ip' => \Request::ip()]);
        }catch(\Exception $e) {
            \SLog::error('登陆失败', ['用户名' =>$user->username, '登陆时间' => Carbon::now(), 'ip' => \Request::ip(), 'error' => $e->getMessage()]);
        }

    }

    /**
     * 处理用户注销事件
     */
    public function onUserLogout($event)
    {
        $user = $event->user;

        try {
            //清楚缓存
            \Cache::forget(CacheContantPrefixDefine::User_ACCOUNT_INFO_PREFIX.$user->id);
            //用于退出日志记录
            \Log::info('退出成功',  ['用户名' =>$user->username, '退出时间' => Carbon::now(), 'ip' => \Request::ip()]);
            //\SLog::info('退出成功',  ['用户名' =>$user->username, '退出时间' => Carbon::now(), 'ip' => \Request::ip()]);
        }catch(\Exception $e) {
            \SLog::error('退出失败',  ['用户名' =>$user->username, '退出时间' => Carbon::now(), 'ip' => \Request::ip(), 'error' => $e->getMessage()]);
        }

    }


    /**
     * 为订阅者注册监听器
     * @param $event 事件分发器实例
     */
    public function subscribe($event)
    {
        $event->listen(
            'Illuminate\Auth\Events\Login',
            'App\Listeners\UserEventSubscriber@onUserLogin'
        );

        $event->listen(
            'Illuminate\Auth\Events\Logout',
            'App\Listeners\UserEventSubscriber@onUserLogout'
        );

    }

}