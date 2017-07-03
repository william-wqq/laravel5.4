<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'ExampleController@index')->name('index');
Route::get('/show', 'ExampleController@show')->name('show');
Route::get('/save', 'ExampleController@save')->name('save');
Route::get('/test.index', 'TestController@index')->name('test.index');

Route::get('provider', 'ExampleController@index')->name('index');

echo 'router ';
Route::get('/test.string', 'TestController@testString')->name('test.string');
Route::get('/wqq', 'TestController@wqq')->name('hello');
Route::get('/test', ['middleware' => 'test', 'uses' => 'TestController@test'])->name('test');