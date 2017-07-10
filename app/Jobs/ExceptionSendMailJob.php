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

    public $errMessage;

    public $errTrace;

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
        //$errMessage = $this->errMessage;
        try {
            \SLog::info('======>队列处理开始');

            array_walk($destination, function($item, $user) use($data) {
                //\Mail::to($user)->queue(new ExceptionSendMail($data));
                \SLog::info('======>队列处理中:'.$user);
            });


//            \Mail::queue($view, $data, function($message) use($destination, $errMessage) {
//                foreach($destination as $user => $value) {
//                    $message->to($user)->subject($errMessage);
//                }
//            });
        }catch(\Exception  $e) {
            \SLog::error('======>邮件发送失败', ['error' => $e->getMessage()]);
        }

    }

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
