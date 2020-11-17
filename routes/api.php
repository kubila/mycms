<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::middleware('auth:sanctum')
// Route::middleware('auth:sanctum')->group(function () {
//     Route::group([

//         'prefix' => 'admin',

//     ], function ($router) {

//         Route::apiResource('posts', 'Admin\PostsController');
//         Route::apiResource('categories', 'Admin\CategoriesController');
//         Route::apiResource('authors', 'Admin\AuthorsController');
//         Route::apiResource('news', 'Admin\NewsController');
//         Route::apiResource('tags', 'Admin\TagsController');
//     });
// });

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('admin/posts', 'Admin\PostsController');
    Route::apiResource('admin/categories', 'Admin\CategoriesController');
    Route::apiResource('admin/authors', 'Admin\AuthorsController');
    Route::apiResource('admin/news', 'Admin\NewsController');
    Route::apiResource('admin/tags', 'Admin\TagsController');
});

// Route::group(['namespace' => 'Auth', 'middleware' => ['auth:sanctum']]);

Route::namespace ('Auth')->group(function () {
    Route::post('/login', 'AuthController@login');
    Route::post('/logout', 'AuthController@logout');
    Route::post('/register', 'AuthController@signup');
});

Route::namespace ('API')->group(function () {

    Route::get('/posts', 'PostController@index');
    Route::get('/posts/{post}', 'PostController@show');
    Route::get('/pinned', 'PostController@PinnedOnes');
    Route::get('/homeposts', 'PostController@HomePosts');
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
