<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\NewsCollection;
use App\Http\Resources\SpecificNewsCollection;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response(NewsCollection::collection(
            News::query()
                ->select(['id', 'created', 'title'])
                ->byPublished()
                ->get()

        ));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(News $news)
    {

        return response(SpecificNewsCollection::make(
            News::with('categories')
                ->where('id', $news->id)
                ->byPublished()
                ->first()
        ));
    }
}
