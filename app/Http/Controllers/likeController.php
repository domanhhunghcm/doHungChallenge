<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\like;

class likeController extends Controller
{
    public function addLike(Request $request)
    {
        like::create([
            "post_id"=>$request->commentPostID,
            "user_id"=>$request->userComment,
        ]);
        return response()->json(['success'=>"success save"]);
    }
    public function deleteLike(Request $request)
    {
        like::where("post_id",$request->commentPostID)->where("user_id",$request->userComment)->delete();
        return response()->json(['success'=>"success save"]);
    }
}
