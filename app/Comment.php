<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{


    protected $fillable = ['comment', 'photo_id','commenter_id'];

    public function photo ()
    {
        return $this->belongsToMany('App\Photo');
    }

    public function replies ()
    {
        return $this->hasMany('App\Reply');
    }
}
