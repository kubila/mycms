<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $fillable = [];

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
    return  $this->belongsTo(Author::class);
  }

  public function tags()
  {
    return $this->belongsToMany(Tags::class);
  }
}
