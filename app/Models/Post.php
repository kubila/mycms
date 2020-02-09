<?php

namespace App\Models;

use App\Models\Category;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function getRouteKeyName()
    {
        return 'title';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
