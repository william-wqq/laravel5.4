<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Log;


class LaravelLoggerProxy {
    public function log( $msg ) {
        \SLog::info($msg);
    }
}

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //数据库执行语句监听
        DB::listen(function($query){
            //if ($query->time >= 1000) {//慢查询,超过1s的sql被记录
                \SLog::info('sql语句', ['sql'=>$query->sql, 'bindings'=>$query->bindings, 'time'=>$query->time]);
            //}

        });

        //队列处理失败
        \Queue::failing(function($job){
            if($job) {
                \SLog::error('队列处理失败', ['job' => $job]);
            }
        });

        //pusher日志
        $pusher = $this->app->make('pusher');
        $pusher->set_logger( new LaravelLoggerProxy());


    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
