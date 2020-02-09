<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
