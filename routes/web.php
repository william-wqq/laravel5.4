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
Route::get('/collection', ['middleware' => 'test', 'uses' => 'TestController@collection'])->name('collection');
Route::get('/login', ['uses' => 'TestController@login'])->name('login');
Route::get('/logout', ['uses' => 'TestController@logout'])->name('logout');
Route::get('/info/{id}', ['uses' => 'TestController@info'])->name('info/{id}');

//数据库查询
Route::get('/query', ['uses' => 'TestController@query'])->name('query');
//事物
Route::get('/event', ['uses' => 'TestController@event'])->name('event');
//发邮件
Route::get('/mail', ['uses' => 'TestController@sendMail'])->name('mail');
//队列
Route::get('/queue', ['uses' => 'TestController@queue'])->name('queue');
//Laravel Pusher Bridge
Route::get('/bridge', function() {
    $pusher = App::make('pusher');
    $pusher->trigger( 'test-channel',
        'test-event',
        ['text' => 'I Love China!!!']
    );
    return 'This is a Laravel Pusher Bridge Test!';
});

//Laravel Event Broadcaster
Route::get('/broadcast', function () {
    event(new \App\Events\PusherEvent('Great Wall is great ', '1'));
    return 'This is a Laravel Broadcaster Test!';
});