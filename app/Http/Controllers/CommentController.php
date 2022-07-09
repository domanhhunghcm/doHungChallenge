<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\comment;
class CommentController extends Controller
{
    public function create(Request $request)
    {
        $comment=comment::create([
            "commentContent"=>$request->commentPost,
            "post_id"=>$request->comment_post_id,
            "user_id"=>$request->userComment,
        ]);
        return response()->json(['success'=>$comment->id]);
    }
}
