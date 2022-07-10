<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\follow;
class followProccess extends Controller
{
    public function addFollow(Request $request)
    {
        follow::create([
            "userDoFollow"=>$request->userDoFollow,
            "userReciveFollow"=>$request->reciveFollowID
        ]);
        return response()->json(['success'=>"update sucees"]);
    }
}
