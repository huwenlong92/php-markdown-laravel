<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/hi', function () {
    return view('welcome');
});

Route::get('/', 'Front\IndexController@index');
Route::get('/dir', 'Front\IndexController@dirList');
Route::get('/md', 'Front\IndexController@repo');
Route::get('/info', 'Front\IndexController@info');
