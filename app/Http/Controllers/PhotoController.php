<?php

namespace App\Http\Controllers;

use App\Like;
use App\Photo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;


class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index (Request $request)
    {
        $photo = Photo::all();

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


//        $imageName = time() . '.' . request()->image->getClientOriginalExtension();
//        $id = auth()->user()->id;
//
//        $path = public_path('images') . '.';
//        $path .= $imageName;
//
////        $photo = new Photo(($request->all()));
////        $photo->save();
////        $imageName = time() . '.' . request()->image->getClientOriginalExtension();
////        $id = auth()->user()->id;
////        $path = public_path('images') . '.';
////        $path .= $imageName;
////        dd($path);
//////        $photo->path = $path;
//        Photo::where(['user_id' => $id])->update(['picture_path' => $path]);
//        User::where(['id' => $id])->update(['picture_path' => $path]);
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
        $user = User::findorfail($id);
        $photos = $user->photos;
        $photo = $photos->where('id', $user->photo_id);
        $like_id = $photo[0]['like_id'];
        $likes = Like::where('id', $like_id)->get();
        $is_like = $likes[0]['likestatus'];
        $comment = $likes[0]['comment'];
        return view('photo.show', compact('photos', 'user', 'is_like', 'comment'));
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update (Request $request, $id)
    {

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
        $photo = Like::where('photo_id', $id)->get();
        $like = $photo[0]['likestatus'];
        $photo[0]->update(['likestatus' => !$like]);

        return Redirect::back();
    }

    public function comment (Request $request, $id)

    {
        $like = Like::where('photo_id', $id)->update(['comment' => $request->comment]);
//        dd($request->all());
//        dd($like);
        return Redirect::back();
    }
}

