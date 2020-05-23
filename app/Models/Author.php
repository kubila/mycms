<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
  protected $fillable = [];

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
    return $this->hasOne(Post::class);
  }
}
