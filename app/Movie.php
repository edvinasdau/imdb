<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{

    //protected $table = 'movies';
    protected $fillable = ['name', 'description', 'user_id', 'category_id', 'years', 'rating'];
}
