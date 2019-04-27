<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $table = 'replies';
    protected $fillable = ['reply', 'comment_id'];

    public function comment ()
    {
        return $this->belongsToMany('App\Comment');
    }
}
