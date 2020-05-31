<?php

Route::apiResource('posts', 'PostController');
Route::apiResource('categories', 'CategoryController');
Route::apiResource('authors', 'AuthorController');
Route::apiResource('news', 'NewsController');
Route::apiResource('tags', 'TagsController');

Route::view('/path?', 'newhome');
Route::fallback(function () {
  return view('newhome');
});

Route::group([
  'middleware' => 'api',

  'prefix' => 'auth',

], function ($router) {

  Route::post('login', 'AuthController@login');
  Route::post('logout', 'AuthController@logout');
  Route::post('signup', 'AuthController@signup');
  Route::post('refresh', 'AuthController@refresh');
  Route::post('me', 'AuthController@me');
});
