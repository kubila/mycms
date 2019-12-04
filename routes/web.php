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
  return view('home');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/posts/getposts', 'PostController@index');
Route::get('/cms', 'PostController@index');
//Route::view('/', 'homey');
//Route::view('/{any}', 'homey');
Route::fallback(function () {
  return view('homey');
});
