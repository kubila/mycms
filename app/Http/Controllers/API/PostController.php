<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostsCollection;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource for the ?.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $posts = cache()->remember('home-posts', 60 * 60 * 24, function () {
        //     return Post::byPublished()
        //         ->with('category')
        //         ->with('author')
        //         ->with('tags')
        //         ->get();
        // });

        // return response()
        //     ->json($posts, 200);
    }

    /**
     * Display the specified resource for the ReadPost component.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return response(PostsCollection::make(
            Post::byPublished()
                ->with('category')
                ->with('author')
                ->with('tags')
                ->where('title', $post->title)
                ->first()));
    }

    /**
     * Display a listing of the resource for the HomeCard component.
     *
     * @return \Illuminate\Http\Response
     */
    public function PinnedOnes()
    {

        return response(PostsCollection::collection(
            Post::query()
                ->select(['id', 'title', 'published', 'author_id', 'category_id', 'image', 'content'])
                ->with('category')
                ->with('author')
                ->byPublished()
                ->byPinned()
                ->get()

        ));
    }

    /**
     * Display a listing of the resource for the HomePost component.
     *
     * @return \Illuminate\Http\Response
     */
    public function HomePosts()
    {

        return response(PostsCollection::collection(
            Post::query()
                ->select(['id', 'title', 'published', 'author_id', 'category_id', 'image'])
                ->with('author')
                ->with('category')
                ->byPublished()
                ->get()
        ));
    }
}
