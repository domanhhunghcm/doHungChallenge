<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\post;
use App\Models\follow;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userLogin = auth()->user();
        $postByUser = $userLogin->post;

        $followingUser = DB::table('users')->where('users.id', "=", $userLogin->id)
            ->join('userfollows', 'users.id', '=', 'userfollows.userDoFollow')
            ->select("userfollows.*")
            ->pluck('userReciveFollow');
        $stack = array();
        for ($i = 0;$i < sizeof($followingUser);$i++)
        {
            array_push($stack, $followingUser[$i]);
        }
        array_push($stack, $userLogin->id);

        //get user not follow
        $userNotFollow = user::whereNotIn('id', $stack)->get();
        $userList = User::where('id', '!=', $userLogin->id)
            ->get();

        //get post
        $getPostByUser = post::whereIn('user_id', $stack)->orderBy('id', 'desc')
            ->get();

        return view('home', compact("getPostByUser", "userNotFollow", "userLogin", "userList", "postByUser"));
    }
}

