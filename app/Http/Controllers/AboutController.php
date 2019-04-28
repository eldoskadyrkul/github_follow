<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Follower;
use App\AboutFollowers;
use App\InfoPerson;
use Auth;

class AboutController extends Controller
{
    public function allInfo()
    {
    	$followingUser = Follower::where('user_id', '=', Auth::user()->id)
								->join('users', 'users.id', '=', 'follow_id')
								->where('status', 1)
								->get();

		$followersUser = Follower::where('follow_id', '=', Auth::user()->id)
								->join('users', 'users.id', '=', 'user_id')
								->where('status', 1)
								->get();

		$notification = Follower::where('followers.follow_id', '=', Auth::user()->id)
								->join('users', 'users.id', '=', 'followers.user_id')
								->where('status', 0)
								->get();

		$allInfo = User::where('id', '=', Auth::user()->id)->get();

		return view('user.profile', compact('allInfo', 'followingUser', 'followersUser', 'notification'));	
    }

    public function insertInformation(Request $request)
    {

        $linkedInfo = new InfoPerson;

        $linkedInfo->user_id = Auth::user()->id;
        $linkedInfo->follow_id = Auth::user()->id;
        $linkedInfo->info_id = Auth::user()->id;


    	$info = new AboutFollowers;

    	$info->id = Auth::user()->id;
    	$info->first_name = $request->input('first_name');
    	$info->last_name = $request->input('last_name');
    	$info->birthday = $request->input('birthday');
    	$info->repository = $request->input('repository');
    	$info->user_id = Auth::user()->id;

    	$info->save();

    	return back();
    }

    public function updateInfo(Request $request, $id)
    {
        $info = AboutFollowers::find($id);

        $info->first_name = $request->input('first_name');
        $info->last_name = $request->input('last_name');
        $info->birthday = $request->input('birthday');
        $info->repository = $request->input('repository');

        $info->save();

        return back();
    }

	public function groupBy(Request $request)
	    {
	    	$select = $request->input('repository');

	    	return back();
	    }    

    public function groupbyRepo($repo)
    {

    	$select = $request->option('repository');

    	$groupbyRepo = AboutFollowers::groupBy('about_followers.' . $select)
    								->get();

    	return back();
    }

    public function showOtherPage(User $user)
    {
        $followingUser = Follower::where('user_id', '=', Auth::user()->id)
                                ->join('users', 'users.id', '=', 'follow_id')
                                ->where('status', 1)
                                ->get();

        $followersUser = Follower::where('follow_id', '=', Auth::user()->id)
                                ->join('users', 'users.id', '=', 'user_id')
                                ->where('status', 1)
                                ->get();

        $notification = Follower::where('followers.follow_id', '=', Auth::user()->id)
                                ->join('users', 'users.id', '=', 'followers.user_id')
                                ->where('status', 0)
                                ->get();

        $user = User::find($user);


        return view('user.guestprofile', compact('user', 'followingUser', 'followersUser', 'notification'));
    }

}
