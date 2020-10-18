<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::with('category')->with('author')->with('tags')->get()->chunk(20)->collapse();
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pinnedOnes()
    {
        $posts = Post::with('category')->with('author')->with('tags')->where('is_pinned', '=', 1)->get();
        return response()->json($posts, 200);
    }
}
