<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{



    protected $fillable = ['comment','photo_id'];

    public function photo ()
    {
        return $this->belongsToMany('App\Photo');
    }
}
