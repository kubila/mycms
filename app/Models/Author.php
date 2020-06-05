<?php

namespace App\Models;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{

  protected static function boot()
  {
    parent::boot();
    static::creating(function ($author) {
      $date = Carbon::now()->format('Y-m-d');
      $author->created = $date;
      return true;
    });
  }

  protected $fillable = [
    'name', 'description', 'created'
  ];

  public function getRouteKeyName()
  {
    return 'name';
  }

  public function user()
  {
    return $this->hasOne(User::class);
  }

  public function posts()
  {
    return $this->hasMany(Post::class);
  }

  public function categories()
  {
    return $this->belongsToMany(Category::class);
  }
}
