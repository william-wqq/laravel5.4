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

Route::group(['middleware'=>'auth,web'], function(){
    Route::get('/login', ['as' => 'login', 'uses' => 'LoginController@login']);
});

Route::get('/', function () {
    return view('welcome');
});

/**
 * description: 路由
 * author: william
 * data: 2017-08-31 13:50:42
 */
Route::group(['namespace' => 'Route'], function(){
    //GET路由

//    方法一
//    Route::get('get', function(){
//        return 'GET Router';
//    });
//    方法二
//    Route::get('get')->middleware('web')->prefix('admin')->uses('RouteController@get')->name('getRouter')->where(['name'=>'[A-Za-z]+']);
//    方法三
    Route::get('get/{name}', ['middleware'=>'web', 'prefix'=>'admin', 'as'=> 'getRouter', 'uses'=>'RouteController@get', 'where'=>['name'=>'[A-Za-z]+']]);


    Route::post('post', 'RouteController@post')->name('postRouter');
    Route::put('put', 'RouteController@put')->name('putRouter');
    Route::get('api/users/{user}', function (App\User $user) {
        return $user->email;
    });
});

