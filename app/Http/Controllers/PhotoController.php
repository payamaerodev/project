<?php

namespace App\Http\Controllers;

use App\Exceptions\NoPhotoException;
use App\Like;
use App\Photo;
use App\User;
use Exception;
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

        $imageName = time() . '.' . request()->image->getClientOriginalExtension();

        $id = auth()->user()->id;

        $picPath = "images/{$imageName}";

        $user = auth()->user();

        $photo = new Photo(($request->all()));

        $photo->picture_path = $picPath;

        $photo->user_id = $id;

        $photo->save();

        auth()->user()->update(['photo_id' => $photo->id]);


        request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $photos = $user->photos;

        $imageName = time() . '.' . request()->image->getClientOriginalExtension();
        $id = auth()->user()->id;
        $picPath = "/images/{$imageName}";

        User::where(['id' => $id])->update(['picture_path' => $picPath]);
        Photo::where(['user_id' => $id])->update(['picture_path' => $picPath]);

        request()->image->move(public_path('images'), $imageName);

        return Redirect::route('photos.show', ['id' => $user->id]);
//        return view('photo.show', ['id' => $photo->id,'user'=>$user,'photos'=>$photos]);
    }


    public function show ($id)
    {
        $user = User::findOrFail($id);

        $photos = $user->photos;

        $comment = '';

        $photo = $user->photos()->first();

        if ($user->photos()->count() == 0) {

            throw new NoPhotoException("there isnt any picture for this profile");

        };

        $photo_id = $photo->id;

        $is_like = Like::where('photo_id', $id)->exists();
//        dd($is_like);

        $likes = Like::where('photo_id', $photo->id)->first();

        if (!is_null($likes) && $likes->comment) {

            $comment = $likes->comment;
        }
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
        $liked = Like::where('photo_id', $id)->first();
        if ($liked) {
            $liked->delete();
        } else {
            Like::firstOrCreate(['photo_id' => $id, 'likestatus' => true]);

        }

        return Redirect::back();

    }

    public function comment (Request $request, $id)

    {
        Like::where('photo_id', $id)->firstOrCreate(['photo_id' => $id])->update(['comment' => $request->comment]);

        return Redirect::back();
    }
}

