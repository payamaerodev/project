<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{

    protected $table = 'Likes';

    protected $fillable = ['likestatus', 'comment','photo_id','user_id'];

    public function photo ()
    {
        return $this->belongsToMany('App\Photo');
    }
}
