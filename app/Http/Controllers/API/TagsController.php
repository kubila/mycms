<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Tags;


class TagsController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return response()->json(Tags::all(), 200);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Tags  $tags
   * @return \Illuminate\Http\Response
   */
  public function show(Tags $tags)
  {
    //
  }
}
