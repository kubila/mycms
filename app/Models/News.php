<?php

namespace App\Models;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($news) {
            $date = Carbon::now()->format('d-m-Y');
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
