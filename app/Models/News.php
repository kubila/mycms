<?php

namespace App\Models;

use App\Models\Category;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;

class News extends Model
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
        static::creating(function ($news) {
            $date = Carbon::now()->format('Y-m-d');
            $news->created = $date;
            return true;
        });
    }

    protected $fillable = [
        'title', 'url', 'content', 'created', 'is_published',
    ];

    protected $attributes = [
        'is_published' => false,
    ];

    public function getRouteKeyName()
    {
        return 'title';
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
