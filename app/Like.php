<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function photo ()
    {
        return $this->belongsToMany('App\Photo');
    }
}
