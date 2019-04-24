<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CommentController extends Controller
{
    public function comment (Request $request, $id)

    {
        Comment::Create(['photo_id' => $id,'comment' => $request->comment]);

        return Redirect::back();
    }
}
