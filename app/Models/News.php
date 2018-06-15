<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $guarded=['id'];
    public function category()
    {
        $this->belongsTo('App\Models\Category');
    }
}
