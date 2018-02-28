<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Movie;

class Actor extends Model
{
    protected $fillable = ['name', 'birthday',  'deathday', 'user_id'];

    public function image()
    {
        return $this->morphMany(Image::class, 'imagable');
    }
    public function getFeatureImageAttribute(){
       if($this->image->first() == null)
       {
           return "sdfs";
       }
       return asset("storage/image/" . $this->image()->first()->filename);

    }

    public function movie()
    {
        return $this->belongsToMany('App\Movie');
    }
}
