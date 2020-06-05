<?php

namespace App\Http\Controllers\API;

use App\Models\Post;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $posts = Post::with('category')->with('author')->with('tags')->get();
    return response()->json($posts, 200);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Post  $post
   * @return \Illuminate\Http\Response
   */
  public function show(Post $post)
  {
    $poster = Post::with('category')->with('author')->with('tags')->where('title', $post->title)->first();
    return response()->json($poster, 200);
  }
}
