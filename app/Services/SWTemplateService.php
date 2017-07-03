<?php
/**
 * Created by PhpStorm.
 * User: seuic
 * Date: 2017/6/16
 * Time: 14:11
 */
namespace App\Services;

class SWTemplateService {

    public function NotFound(){
        return view('errors.404');
    }

}