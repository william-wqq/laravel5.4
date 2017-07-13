<?php
/**
 * Created by PhpStorm.
 * User: seuic
 * Date: 2017/6/16
 * Time: 14:11
 */
namespace App\Services;

class SWTemplateService {

    /**
     * The page of not found
     * @return \View
     */
    public function NotFound()
    {
        return view('errors.404');
    }

    /**
     * The page of fatal error
     * @return \View
     */
    public function FatalError()
    {
        return view('errors.500');
    }

}