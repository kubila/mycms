<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Post;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return response()->json(Author::all(), 200);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Author  $author
   * @return \Illuminate\Http\Response
   */
  public function show(Author $author)
  {
    $author = Author::where('name', $author->name)->first();
    return response()->json($author, 200);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Author  $author
   * @return \Illuminate\Http\Response
   */
  public function posts(Author $author)
  {
    $posts = Post::with('category')->with('author')->where('author_id', $author->id)->get();
    return response()->json($posts, 200);
  }
}
