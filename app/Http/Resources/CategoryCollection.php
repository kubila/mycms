<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryCollection extends JsonResource
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
            'created' => $this->created,
            'name' => $this->name,
            'count' => $this->posts->count(),
            // 'news' => $this->news,
            // 'posts' => $this->posts,
        ];
    }
}
