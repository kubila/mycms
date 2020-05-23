<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
  protected $fillable = [];

  public function getRouteKeyName()
  {
    return 'title';
  }
}
