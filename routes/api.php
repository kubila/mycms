<?php

Route::middleware('auth:sanctum')->group(function () {
    Route::group([

        'prefix' => 'admin',

    ], function ($router) {

        Route::apiResource('posts', 'Admin\PostsController');
        Route::apiResource('categories', 'Admin\CategoriesController');
        Route::apiResource('authors', 'Admin\AuthorsController');
        Route::apiResource('news', 'Admin\NewsController');
        Route::apiResource('tags', 'Admin\TagsController');
    });

    Route::namespace ('Auth')->group(function () {
        Route::post('/login', 'LoginController@login');
        Route::post('/logout', 'LoginController@logout');
        Route::post('/signup', 'LoginController@signup');
    });
});

Route::namespace ('API')->group(function () {

    Route::get('/posts', 'PostController@index');
    Route::get('/posts/{post}', 'PostController@show');
    Route::get('/categories', 'CategoryController@index');
    Route::get('/categories/{category}/posts', 'CategoryController@posts');
    Route::get('/categories/{category}/news', 'CategoryController@news');
    Route::get('/authors', 'AuthorController@index');
    Route::get('/authors/{author}', 'AuthorController@show');
    Route::get('/authors/{author}/posts', 'AuthorController@posts');
    Route::get('/news', 'NewsController@index');
    Route::get('/news/{news}', 'NewsController@show');
});

Route::view('/path?', 'newhome');

Route::fallback(function () {
    return view('newhome');
});
