<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;
    protected $table = 'category';
    protected $fillable = ['name', 'description', 'user_id'];
}