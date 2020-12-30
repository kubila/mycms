<?php

namespace App\Http\Resources;

use App\Models\Author;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Resources\Json\JsonResource;

//use Illuminate\Http\Resources\Json\ResourceCollection;

class PostsCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'content' => $this->content,
            'image' => $this->image,
            'published' => $this->published,
            'updated' => $this->updated,
            'author' => $this->author->only('name'),
            'category' => $this->category->only('name'),
            'authors' => Author::query()->select('id', 'name')->get(),
            'categories' => Category::query()->select('id', 'name')->get(),
            'tags' => Tag::query()->select('id', 'name')->get(),
        ];
    }
}
