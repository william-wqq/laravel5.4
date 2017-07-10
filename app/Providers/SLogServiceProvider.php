<?php

namespace App\Providers;

use App\Services\SLogService;
use Illuminate\Support\ServiceProvider;

class SLogServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->singleton('Slog', function(){
           return new SLogService('seuic', storage_path('logs/seuic.log'));
        });

    }
}
