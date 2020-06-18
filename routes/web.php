<?php

use Illuminate\Support\Facades\Route;
use App\Persons;
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

Route::get('/hello/{name}', function ($name) {
    return "Oh, hellow there...".$name."";
});

Route::get('/posts/{name}', 'PostController@index');

Route::resource('posts', 'PostController');

Route::get('/contact','PostController@contact');

//---------- INSERT value with raw query
//----------Example: http://localhost:8000/insert/Shariful/shaarifulz@gmail.com
Route::get('/insert/{name}/{email}', function ($name,$email){
    DB::insert('INSERT INTO persons(name,email) VALUES(?,?)',[$name,$email]);
    $result = Persons::all();
    return $result;
});

//---------- GET value with raw query
//---------- Example: http://localhost:8000/find/Shariful
Route::get('/find/{name}', function ($name){
   $result = DB::select ('SELECT * FROM persons WHERE name=?',[$name]);
    return $result;
});

//---------- UPDATE value with raw query
//---------- Example: http://localhost:8000/update/Shariful/shaarifulz.ctrends@gmail.com
Route::get('/update/{name}/{email}', function ($name, $email){
    $result = DB::update ('UPDATE persons SET email=? WHERE name=?',[$email,$name]);
    return "Updated result ".$result;
});

//---------- UPDATE value with raw query
//---------- Example: http://localhost:8000/delete/Shariful
Route::get('/delete/{name}', function ($name){
    $result = DB::delete ('DELETE FROM persons WHERE name=?',[$name]);
    return "Deleted result ".$result;
});
//---------- GET data using Eloquent ORM
//---------- Example: http://localhost:8000/all/persons
Route::get('/all/persons', function (){
    return Persons::all();
});
//---------- GET data using Eloquent ORM
//---------- Example: http://localhost:8000/find/person
Route::get('/find/person', function (){
    $result = Persons::find(1);
    return $result->name;
});

//---------- GET data using Eloquent ORM
//---------- Example: http://localhost:8000/find/person
Route::get('/find/where', function (){
    $result = Persons::where('id',2)->orderBy('id','desc')->take(1)->get();
    return $result;
});

