<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function news()
    {
        $this->hasMany('App\Models\News');
    }
}
