<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CommentController extends Controller
{
    public function comment (Request $request, $id)

    {
        Comment::Create(['photo_id' => $id,'comment' => $request->comment,'commenter_id' => auth()->id()]);

        return Redirect::back();
    }

    public function reply (Request $request, $id)

    {
        Reply::Create(['comment_id' => $id, 'reply' => $request->reply]);

        return Redirect::back();
    }
}
