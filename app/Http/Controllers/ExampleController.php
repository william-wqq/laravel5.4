<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{

    public function index(){

        return app()->version();
        //return \SWTemplate::NotFound();
    }

    protected function show(){
        return 'show';
    }

    private function save(){
        return 'save';
    }

}
