<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryCollection;
use App\Models\Category;
use App\Models\News;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return response(CategoryCollection::collection(Category::all()));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function posts(Category $category)
    {
        $posts = Post::with('category')->with('author')->where('category_id', $category->id)->get();

        return response()->json($posts, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function news(Category $category)
    {
        $news_id = DB::table('category_news')->where('category_id', $category->id)->pluck('news_id')->first();
        if (!$news_id) {
            return response()->json(['error' => 'No news for the category'], 404);
        }

        $news = News::with('categories')->where('id', $news_id)->get();
        return response()->json($news, 200);
    }
}
