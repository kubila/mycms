<?php

namespace App\Models;

use App\Models\Tags;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * Prepare a date for array / JSON serialization.
     *
     * @param  \DateTimeInterface  $date
     * @return string
     */
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($post) {
            $date = Carbon::now()->format('Y-m-d');
            $post->published = $date;
            //$post->updated = $date;
            return true;
        });

        static::updating(function ($post) {
            $date = Carbon::now()->format('Y-m-d');
            $post->updated = $date;
            return true;
        });
    }

    public function scopeByPublished($query)
    {
        return $query->where('is_published', '=', 1);
    }

    public function scopeByPinned($query)
    {
        return $query->where('is_pinned', '=', 1);
    }

    protected $fillable = [
        'title', 'image', 'content', 'description', 'published', 'updated', 'category_id', 'author_id', 'is_published', 'is_pinned',
    ];

    protected $attributes = [
        'is_published' => true,

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
