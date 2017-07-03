<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    const CONSTANT  = 'value';

    public $var = 'normal var';

    private static $v = 'static var';

    public static function getTest(){

    }

    public static function className(){
        return  __CLASS__;
    }

    public static function classTest(){
        return static::className();
    }

    public function display(){
        //return self::test();
    }



    /**
     * @param string $v
     */
    public static function setV($v)
    {
        self::$v = $v;
    }



    /**
     * @return string
     */
    public static function getV()
    {
        return self::$v;
    }


}
