<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Log;

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
            if ($query->time >= 1000) {//慢查询,超过1s的sql被记录
                Log::info('sql语句', ['sql'=>$query->sql, 'bindings'=>$query->bindings, 'time'=>$query->time]);
            }

        });


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
