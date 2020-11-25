<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\AuthorCollection;
use App\Http\Resources\PostCollection;
use App\Models\Author;
use App\Models\Post;

class AuthorController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Author $author)
    {
        //$author = Author::where('name', $author->name)->first();
        return response(AuthorCollection::make(
            Author::all()
                ->where('id', $author->id)
                ->first()
        ));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\JsonResponse
     */
    public function posts(Author $author)
    {
        return response(PostCollection::collection(
            Post::query()
                ->select(['id', 'title', 'published', 'author_id', 'category_id', 'image'])
                ->with(['author', 'category'])
                ->where('author_id', $author->id)
                ->byPublished()
                ->get()
        ));
    }
}
