<?php

namespace App\Models;

use App\Models\News;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
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
        static::creating(function ($category) {
            $date = Carbon::now()->format('Y-m-d');
            $category->created = $date;
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
        return $this->hasMany(Post::class);
    }

    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }

    public function news()
    {
        return $this->belongsToMany(News::class);
    }
}
