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

use Illuminate\Support\Facades\Route;

//Auth::routes();

Route::view('/path?', 'newhome');
Route::fallback(function () {
    return view('newhome');
});

//Route::get('/home', 'HomeController@index')->name('home');
