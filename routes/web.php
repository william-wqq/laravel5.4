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
/*ExampleController*/
Route::get('/', 'ExampleController@index')->name('index');
Route::get('/show', 'ExampleController@show')->name('show');
Route::get('/save', 'ExampleController@save')->name('save');
Route::get('provider', 'ExampleController@index')->name('index');


/*TestController*/
Route::get('/test/index', 'TestController@index')->name('test.index');
Route::get('/test/string', 'TestController@testString')->name('test.string');
Route::get('/test', ['middleware' => 'test', 'uses' => 'TestController@test'])->name('test.www');
Route::get('/collection', ['middleware' => 'test', 'uses' => 'TestController@collection'])->name('collection');
Route::get('/login', ['uses' => 'TestController@login'])->name('login');
Route::get('/logout', ['uses' => 'TestController@logout'])->name('logout');
Route::get('/info/{id}', ['uses' => 'TestController@info'])->name('info/{id}');



Route::get('/mail', ['uses' => 'TestController@sendMail'])->name('mail');