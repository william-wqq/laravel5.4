<?php

namespace App\Http\Controllers\Route;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RouteController extends Controller
{
    //

    public function get()
    {
        return 'GET Route';
        //return url()->route('getRouter', ['id'=>1]);
        //return \URL::current();
        //return action('Route\RouteController@get', ['id'=>1]);
        //return route('getRouter', ['id'=>1]);

    }

    public function post()
    {
        return 'POST Route';
    }

    public function put()
    {
        return 'PUT Route';
    }
}
