<?php

namespace App\Http\Controllers;

use App\Photo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Post;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
//        $user=User::find(5);
//dd($user->photos);

        return view('photo.index', compact('photo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create ()
    {
        return view('photo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store (Request $request)
    {
        $photo = new Photo(($request->all()));
        $photo->save();
        $imageName = time() . '.' . request()->image->getClientOriginalExtension();
        $id = auth()->user()->id;
        $path = public_path('images') . '.';
        $path .= $imageName;
        dd($path);
//        $photo->path = $path;
        Photo::where(['user_id' => $id])->update(['picture_path' => $path]);
        User::where(['id' => $id])->update(['picture_path' => $path]);
        return Redirect::route('photos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show ($id)
    {
        $user = User::find($id);
        $photos = $user->photos;
        return view('photo.show', compact('photos', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit ($id)
    {
        $photo = Photo::find($id);

        return view('photo.edit', compact('photo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update (Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy ($id)
    {
        //
    }


    public function like_post ($id)
    {
        DB::table('like')->where('id', $id)->update(['likestatus' => true]);
        return Redirect::back();
    }
}

