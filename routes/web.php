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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('mail/send','MailController@send');
Route::get('mail/store','MailController@store');
Route::get('/store','PodcastController@store');
Route::get('/good', 'TestController@goodadd');
Route::get('/search', 'TestController@goodsearch');
Route::get('/newphp', 'TestController@newphp');
Route::get('/test', 'TestController@test');
Route::get('/shiwu', 'TestController@shiwu');
Route::get('/index', 'TestController@index');
Route::get('/expression', 'TestController@expression');
Route::get('/task/create', 'TaskController@create');