<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\SWTemplateService;
class SWTemplateServiceProvider extends ServiceProvider
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
        $this->app->singleton('SWTemplate', function($app) {
            return new SWTemplateService();
        });
    }
}
