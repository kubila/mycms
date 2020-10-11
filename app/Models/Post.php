<?php

namespace App\Models;

use App\Models\Tags;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($post) {
            $date = Carbon::now()->format('Y-m-d');
            $post->published = $date;
            $post->updated = $date;
            return true;
        });

        static::updating(function ($post) {
            $date = Carbon::now()->format('Y-m-d');
            $post->updated = $date;
            return true;
        });
    }

    protected $fillable = [
        'title', 'image', 'content', 'description', 'published', 'updated', 'category_id', 'author_id', 'is_published',
    ];

    protected $attributes = [
        'is_published' => false,
    ];

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

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tags::class)->withTimestamps();
    }
}
