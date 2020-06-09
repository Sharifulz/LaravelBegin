<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/hello/{name}', function ($name) {
    return "Oh, hellow there...".$name."";
});

Route::get('/posts/{name}', 'PostController@index');

Route::resource('posts', 'PostController');

Route::get('/contact','PostController@contact');