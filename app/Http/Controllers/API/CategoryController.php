<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryCollection;
use App\Http\Resources\NewsCollection;
use App\Http\Resources\PostCollection;
use App\Models\Category;
use App\Models\News;
use App\Models\Post;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {

        return response(CategoryCollection::collection(Category::all()));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function posts(Category $category)
    {
        return response(PostCollection::collection(
            Post::query()
                ->select(['id', 'title', 'published', 'author_id', 'category_id', 'image'])
                ->with(['author', 'category'])
                ->where('category_id', $category->id)
                ->byPublished()
                ->get()
        ));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function news(Category $category)
    {
        return response(NewsCollection::collection(News::all(['id', 'created', 'content', 'title'])));
    }
}
