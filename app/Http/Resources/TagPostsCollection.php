<?php

namespace App\Http\Resources;

use App\Http\Resources\PostCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class TagPostsCollection extends JsonResource
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
            'name' => $this->name,
            'posts' => PostCollection::collection($this->posts),
        ];
    }
}
