<?php

namespace App\Models;

use App\Models\Post;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
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
        static::creating(function ($tag) {
            $date = Carbon::now()->format('Y-m-d');
            $tag->created = $date;
            return true;
        });
    }

    protected $fillable = [
        'name', 'created',
    ];

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_tags', 'tags_id', 'post_id')->withPivot('post_id', 'tags_id');
    }
}
