<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PhotoPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct ()
    {
        //
    }

    public function store (User $user, Photo $Photo)
    {
        $user = auth()->user;
        return $user->id === $Photo->user_id;
    }
}
