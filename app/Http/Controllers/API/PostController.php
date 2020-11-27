<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostCollection;
//use App\Http\Resources\PostsCollection;
use App\Models\Post;

class PostController extends Controller
{

    /**
     * Display the specified resource for the ReadPost component.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Post $post)
    {
        return response(PostCollection::make(
            Post::with(['category', 'author', 'tags'])
                ->where('id', $post->id)
                ->byPublished()
                ->first()
        ));
    }

    /**
     * Display a listing of the resource for the HomeCard component.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function PinnedOnes()
    {

        return response(PostCollection::collection(
            Post::query()
                ->select(['id', 'title', 'published', 'author_id', 'category_id', 'image', 'description'])
                ->with(['category', 'author'])
                ->byPublished()
                ->byPinned()
                ->get()
        ));
    }

    /**
     * Display a listing of the resource for the HomePost component.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function HomePosts()
    {

        return response(PostCollection::collection(
            Post::query()
                ->select(['id', 'title', 'published', 'author_id', 'category_id', 'image'])
                ->with(['author', 'category'])
                ->byPublished()
                ->get()
        ));
    }
}
