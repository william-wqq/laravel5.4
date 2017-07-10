<?php
/**
 * Created by PhpStorm.
 * User: WQQ
 * Date: 2017/7/10
 * Time: 10:50
 */

namespace App\Facades;


use Illuminate\Support\Facades\Facade;

class SLogFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Slog';
    }

}