<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Models\News;

class Category extends Model
{

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
    'name', 'created'
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
