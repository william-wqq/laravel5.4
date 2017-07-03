<?php
/**
 * Created by PhpStorm.
 * User: seuic
 * Date: 2017/6/16
 * Time: 14:21
 */
namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class SWTemplateFacade extends Facade{

    protected static function getFacadeAccessor(){
        return 'SWTemplate';
    }
}