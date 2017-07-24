<?php

namespace App\Console;

use App\Jobs\TestJob;
use App\Models\User;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
       Commands\SendEmails::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
        //$allUser = User::findOrFail(1);
//        $schedule->call(function() use ($allUser) {
//            //array_walk($allUser, function(User $user){
//                dispatch(new TestJob($allUser));
//            //});
//        })->everyMinute()->name('TestJob');

        $schedule->command('send:mail simple --user 1')->name('send:mail');
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
