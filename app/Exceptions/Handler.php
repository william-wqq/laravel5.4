<?php

namespace App\Exceptions;

use App\Jobs\ExceptionSendMailJob;
use Carbon\Carbon;
use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\Debug\Exception\FatalErrorException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Session\TokenMismatchException::class,
        \Illuminate\Validation\ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if($exception instanceof NotFoundHttpException) {//404
            //自定义not found界面
            //onConnection 指定连接 onQueue 指定队列分类
            $delay = Carbon::now()->addMinute(1);
            //方法一
//            $job = (new ExceptionSendMailJob($exception))->delay($delay);
//            dispatch($job);

            //方法二
//            $job = (new ExceptionSendMailJob($exception))->delay($delay);
//            \Bus::dispatch($job)->delay($delay);
            return response(\SWTemplate::NotFound());

        }elseif($exception instanceof FatalErrorException) {//500

            return response(\SWTemplate::FatalError());

        }

        $response = parent::render($request, $exception);

//        if($response->isServerError()) {//>=500&&<600
//
//            $delay = Carbon::now()->addMinute(1);
//            \Bus::dispatch((new ExceptionSendMailJob($exception)));
//        }


        return $response;

    }

    /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\AuthenticationException  $exception
     * @return \Illuminate\Http\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        return redirect()->guest(route('login'));
    }
}
