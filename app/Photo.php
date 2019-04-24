<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'explanation', 'picture_path','post_id','location'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function user ()
    {
        return $this->belongsToMany('App\User');
    }

    public function likes ()
    {
       return $this->hasMany('App\Like');
    }

    public function comments ()
    {
       return $this->hasMany('App\Comment');
    }


}
