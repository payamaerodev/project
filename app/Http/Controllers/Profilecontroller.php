<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class Profilecontroller extends Controller
{
    /**
     * Follow the user.
     *
     * @param $profileId
     *
     * @return
     */


    /**
     * Follow the user.
     *
     * @param $profileId
     * @return
     */
    public function followUser (int $profileId)
    {
        $user = User::find($profileId);
        if (!$user) {

            return redirect()->back()->with('error', 'کاربری وجود ندارد');
        }

        $user->followers()->attach(auth()->user()->id);
        return redirect()->back()->with('success', 'کاربر با موفقیت دنبال شد');
    }


    public function unFollowUser (int $profileId)
    {
        $user = User::find($profileId);
        if (!$user) {

            return redirect()->back()->with('error', 'User does not exist.');
        }
        $user->followers()->detach(auth()->user()->id);
        return redirect()->back()->with('success', 'Successfully unfollowed the user.');
    }
}
