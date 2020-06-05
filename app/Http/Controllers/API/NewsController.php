<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
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
    return response()->json(News::all(), 200);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\News  $news
   * @return \Illuminate\Http\Response
   */
  public function show(News $news)
  {
    //
  }
}
