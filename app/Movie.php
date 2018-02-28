<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Actor;

class Movie extends Model
{

    //protected $table = 'movies';
    protected $fillable = ['name', 'description', 'user_id', 'category_id', 'years', 'rating'];

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

    public function actors()
    {
        return $this->belongsToMany('App\Actor');
    }
}
