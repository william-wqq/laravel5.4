<?php

namespace App\Console\Commands;

use App\Mail\SendMail;
use Illuminate\Console\Command;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:mail {type : send to mail to simple or all}  {--user= : The user ID} ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send a mail to someone';

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
     * @return mixed
     */
    public function handle()
    {
        //
        $type = $this->argument('type');
        $userId = $this->option('user');

        if (!in_array($type, ['simple', 'all']))
            return $this->error('type argument should be one of simple, all');

        if ($type == 'simple') {
            if (!$userId) {
                return $this->error('user argument should be a integer, null given');
            } else {
                $user = \DB::select("select username, email from user where id = ?", [$userId]);
                if (!$user) {
                    return $this->error('user not exist');
                }

                //if ($this->confirm('are you sure send a mail to user ' . $userId . ' ?')) {
                    //\Mail::to($user[0]->email)->send(new SendMail($user[0]->username));
                    \SLog::info('调度命令发邮件');
                    return $this->info('send a mail success');
                //}
            }

        } elseif ($type == 'all') {
            if ($this->confirm('are you sure send a mail to all user ?')) {
                $all = \DB::select('select username, email from user');

                $bar = $this->output->createProgressBar(count($all));

                array_walk($all, function ($user) use($bar) {
                    \Mail::to($user->email)->send(new SendMail($user->username));
                    $bar->advance();
                    sleep(2);
                });

                $bar->finish();
                return $this->info('send a mail success');
            }
        }
    }
}
