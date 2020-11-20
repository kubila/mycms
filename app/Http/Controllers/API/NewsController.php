<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\NewsCollection;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return response()->json(News::all(), 200);
        return response(NewsCollection::collection(News::all(['id', 'created', 'content', 'title'])));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {

        return response(NewsCollection::make(News::with('categories')->where('id', $news->id)->first()));
    }
}
