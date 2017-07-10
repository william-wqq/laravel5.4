<?php
/**
 * Created by PhpStorm.
 * User: WQQ
 * Date: 2017/7/10
 * Time: 10:28
 */

namespace App\Services;

use Monolog\Formatter\LineFormatter;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class SLogService
{
    /**
     * @var
     */
    private $log;

    /**
     * SLogService constructor.
     */
    public function __construct($logChannelName, $logPath)
    {
        $this->log = new Logger($logChannelName);

        $streamHander = new StreamHandler(
            $logPath,
            Logger::INFO
        );
        $formatter = new LineFormatter();
        $streamHander->setFormatter($formatter);

        $this->log->pushHandler($streamHander);

    }

    /**
     * 记录信息
     *
     * @param $message
     * @param array $context
     */
    public function info($message, array $context = array())
    {
        $this->log->addInfo($message,$context);
    }

    /**
     * 记录错误信息
     *
     * @param $message
     * @param array $context
     */
    public function error($message, array $context = array())
    {
        $this->log->addError($message,$context);
    }
}