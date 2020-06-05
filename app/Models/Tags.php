<?php

namespace App\Models;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{

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
    'name', 'created'
  ];

  public function getRouteKeyName()
  {
    return 'name';
  }

  public function posts()
  {
    return $this->belongsToMany(Post::class);
  }
}
