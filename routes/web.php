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

Route::group(['middleware' => 'auth'], function(){
    Route::get('/', 'PostController@index');
    Route::post('/posts', 'PostController@store');
    Route::get('/posts/create', 'PostController@create');
    Route::get('/posts/{post}', 'PostController@show');
    Route::put('/posts/{post}', 'PostController@update');
    Route::delete('/posts/{post}', 'PostController@delete');
    Route::get('/posts/{post}/edit', 'PostController@edit');
    Route::get('/user/posts', 'UserController@postindex');
    Route::get('/user/mymap', 'UserController@mymap');
    Route::get('/user/mymap/search', 'UserController@mymapsearch');
    Route::get('/user/locations', 'UserController@locationindex');
    Route::post('/locations', 'LocationController@store');
    Route::get('env', function () {
    return view('env');});
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');