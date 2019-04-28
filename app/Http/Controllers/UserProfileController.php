<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Follower;
use App\InfoPerson;
use Auth;

class UserProfileController extends Controller
{
    public function profile(User $user)
    {
    	$notification = Follower::where('followers.follow_id', '=', Auth::user()->id)
								->join('users', 'users.id', '=', 'followers.user_id')
								->where('status', 0)
								->get();

		$followingUser = Follower::where('user_id', '=', Auth::user()->id)
								->join('users', 'users.id', '=', 'follow_id')
								->where('status', 1)
								->get();

		$followersUser = Follower::where('follow_id', '=', Auth::user()->id)
								->join('users', 'users.id', '=', 'user_id')
								->where('status', 1)
								->get();

		$allInfo = InfoPerson::where('follow_id', '=', Auth::user()->id)
								->join('users', 'users.id', '=', 'user_id')
								->join('about_followers', 'about_followers.id', '=', 'info_id')
								->get();

    	$user = User::find($user);

    	return view('user.profile', compact('user', 'notification', 'allInfo', 'followersUser', 'followingUser'));
    }
}
