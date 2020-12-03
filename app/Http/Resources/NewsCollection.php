<?php

namespace App\Http\Resources;

use App\Http\Resources\CategoryCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class NewsCollection extends JsonResource
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
            //'url' => $this->url,
            //'content' => $this->content,
            'created' => $this->created,
            'categories' => CategoryCollection::collection($this->categories),

        ];
    }
}
