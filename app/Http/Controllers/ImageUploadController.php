<?php

namespace App\Http\Controllers;

use App\Photo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ImageUploadController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function imageUpload ()

    {
        return view('imageUpload');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\RedirectResponse
     */

    public function imageUploadPost ()

    {
        request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $imageName = time() . '.' . request()->image->getClientOriginalExtension();
        $id = auth()->user()->id;

        $picPath = "images/{$imageName}";

        User::where(['id' => $id])->update(['picture_path' => $picPath]);
        Photo::where(['user_id' => $id])->update(['picture_path' => $picPath]);

        request()->image->move(public_path('images'), $imageName);
        return Redirect::route('photos.create')->with('success', 'تصویر با موفقیت بارگذاری شد')->with('image', $imageName);
    }

}
