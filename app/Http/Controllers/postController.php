<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;

class postController extends Controller
{
    public function create(Request $request) {
        post::create([
            "content_post"=>$request->postContain,
            "user_id"=>$request->postUser,
        ]);
        return response()->json(['success'=>'Data is successfully added']);
    }
}
