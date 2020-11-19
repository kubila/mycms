<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

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
            'author' => $this->whenLoaded('author')->only('name'),
            'category' => $this->whenLoaded('category')->only('name'),
            'tags' => $this->whenLoaded('tags')->only('id', 'name'),
        ];
    }
}
