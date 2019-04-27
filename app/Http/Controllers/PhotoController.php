<?php

namespace App\Http\Controllers;

use App\Exceptions\NoPhotoException;
use App\Like;
use App\Photo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class PhotoController extends Controller
{

    public function __construct ()
    {
        $this->middleware('auth');
    }

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
        request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);
        $imageName = time() . '.' . request()->image->getClientOriginalExtension();

        $id = auth()->user()->id;

        $picPath = "images/{$imageName}";

        $user = auth()->user();

        $photo = new Photo(($request->all()));

        $photo->picture_path = $picPath;

        $photo->user_id = $id;

        $photo->save();


        $id = auth()->user()->id;

        $picPath = "/images/{$imageName}";

        User::where(['id' => $id])->update(['picture_path' => $picPath]);


        request()->image->move(public_path('images'), $imageName);

        return Redirect::route('photos.show', ['id' => $user->id]);
    }


    public function show ($id)
    {
        $user = User::findOrFail($id);

        $photos = $user->photos;

        $comment = '';

        $photo = $user->photos->first();

        if ($user->photos()->count() == 0) {
            throw new NoPhotoException("there isnt any picture for this profile");
        };


        $likes = Like::where('photo_id', $photo->id)->get();


        if (isset($likes->comment)) {
            if (!is_null($likes) && $likes->comment) {
                $comment = $likes->comment;
            }
        }
        return view('photo.show', compact('photos', 'user', 'comment'));
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


    public function like_post ($id)
    {
        $liked = Like::where([
            ['user_id', '=', auth()->user()->id],
            ['photo_id', '=', $id],
        ])->exists();

        $any_liked = Like::where([['photo_id', '=', $id],

            ['user_id', '=', auth()->user()->id]])->first();

        $photo = Photo::find($id);

        if ($liked) {
            if (isset($any_liked)) {

                $any_liked->delete();
            }
        } else {

            Like::Create(['user_id' => auth()->user()->id, 'photo_id' => $id, 'likestatus' => true]);

        }


        return Redirect::back();

    }


}

