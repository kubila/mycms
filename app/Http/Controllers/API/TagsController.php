<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostCollection;
use App\Models\Post;
use App\Models\Tags;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json(Tags::all(), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tags  $tags
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Tags $tags)
    {
        //return response()->json(Post::all()->with('tags'), 200);

        return response(PostCollection::make(
            Post::query()
                ->select(['id', 'title', 'published', 'author_id', 'category_id', 'image'])
                ->with(['author', 'category', 'tags'])
                ->byPublished()
                ->where('tags_id', $tags->id)
                ->get()
            //$tags->posts->where('id', $tags->id)->all()
        ));
    }
}
