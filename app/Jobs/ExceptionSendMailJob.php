<?php

namespace App\Jobs;

use App\Mail\ExceptionSendMail;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ExceptionSendMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * 错误信息
     * @var string
     */
    public $errMessage;

    /**
     * 错误详情轨迹
     * @var string
     */
    public $errTrace;


    //TODO 如果在命令行也定义delay、tries、timeout，php artisan queue:work --delay=60 --tries=3 timeout=120
    //TODO 但优先使用自定义参数值$delay、$tries、$timeout
    /**
     * 队列连接名称
     * @var string|null
     */
    public $connection;

    /**
     * 队列分类名称
     * @var string|null
     */
    public $queue;

    /**
     * 队列任务处理延迟
     * @var string|null
     */
    public $delay;

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
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(\Exception $e)
    {
        //
        $this->errMessage = $e->getMessage();
        $this->errTrace = $e->getTraceAsString();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        //$view = $this->getView();
        $data = $this->getData();
        $destination = $this->getDestination();
        try {
            \SLog::info('======>队列处理开始');

            array_walk($destination, function($item, $user) use($data) {

                //第一种 mailable类(我们这里使用这个)
                //\Mail::to($user)->send(new ExceptionSendMail($data));

                //第二种 简单发送
                /*\Mail::send($view, $data, function($message){
                        $message->to($user)->subject($subject);
                });*/
                $connection = \Queue::getName();
                \SLog::info('======>队列处理中: ', [$user => $item, 'connection' => $connection]);
            });


        }catch(\Exception  $e) {
            \SLog::error('======>邮件发送失败', ['error' => $e->getMessage()]);
        }

    }

//    public function queue(){
//        //dd(1234);
//    }

    /**
     * 要处理的失败任务。
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function failed(\Exception $e)
    {
        \SLog::error('======>邮件发送失败', ['error' => $e->getMessage()]);
    }

    /**
     * 返回500界面
     *
     * @return \View
     */
    public function getView()
    {
        return 'errors.500';
    }

    public function getData()
    {
        return ['errorMsg' => $this->errMessage, 'trace' => $this->errTrace];
    }

    public function getDestination()
    {
        return \Config::get('mail.to');
    }

}
