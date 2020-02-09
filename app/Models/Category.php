<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'adi',
    ];
    public function getRouteKeyName()
    {
        return 'adi';
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
