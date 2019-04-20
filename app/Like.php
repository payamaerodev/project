<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table='Like';
    protected $fillable=['likestatus','comment'];
    public function photo ()
    {
        return $this->belongsToMany('App\Photo');
    }
}
