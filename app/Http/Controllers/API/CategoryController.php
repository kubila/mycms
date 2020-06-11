<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\News;

class CategoryController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $cats = Category::all();
    return response()->json($cats, 200);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function show(Category $category)
  {
    $posts = Post::with('category')->with('author')->where('category_id', $category->id)->get();

    return response()->json($posts, 200);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function news(Category $category)
  {
    $news = Category::with('news')->get(); //->with('author')->where('category_id', $category->id)->get();
    dd($news);
    return response()->json($news, 200);
  }
}
