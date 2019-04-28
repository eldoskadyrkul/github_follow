<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Follower;
use Auth;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notification = Follower::where('followers.follow_id', '=', Auth::user()->id)
                                ->join('users', 'users.id', '=', 'followers.user_id')
                                ->where('status', 0)
                                ->get();

        return view('home', compact('notification'));
    }
}
