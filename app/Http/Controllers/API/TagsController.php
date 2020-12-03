<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\TagPostsCollection;
use App\Models\Tag;

class TagsController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Tag $tag)
    {

        return response(TagPostsCollection::make(
            Tag::with(['posts', 'posts.author', 'posts.category'])
                ->where('id', $tag->id)
                ->first()
        ));
        // if ($tag->posts_count > 1) {
        //     return response(TagPostsCollection::collection(
        //         Tag::with(['posts', 'posts.author', 'posts.category'])
        //             ->where('id', $tag->id)
        //             ->first()
        //     ));
        // } else {
        //     return response(TagPostsCollection::make(
        //         Tag::with(['posts', 'posts.author', 'posts.category'])
        //             ->where('id', $tag->id)
        //             ->first()
        //     ));
        // }

    }
}
