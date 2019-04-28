@extends('layouts.app')

@section('content')
<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">All Users</div>
	</div>
	<div class="row">

		@include('layouts.profile_sidebar')

		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4>All Users</h4>
					<form class="sort" action="{{route('repository')}}" method="POST">
						{{csrf_field()}}
						<select>
							@foreach ($allInfo as $info)						
								<option name="repository"><a href="{{route('repo', $info->repository)}}">Repository</option>
							@endforeach
						</select>
						<input type="submit" name="submit" value="ОК">
					</form>
				</div>
			</div>
			<div class="panel-body" style="background-color: #ddd;">
					@foreach($allUsers as $user)
						<div class="col-md-4">
							<div class="box-card">
								<img src="{{asset('images/user.png')}}" style="width: 100%;">
								<div class="panel-footer">
									<div class="profile-result">
										<img src="{{asset('images/user.png')}}" height="40px;">
									</div>
									<span>
										<h4 class="card-title" style="margin-bottom: 0"><b>{{$user->name}}</b></h4>
										<p>{{$user->username}}</p>
									</span>

									<?php
										$if_null = App\Follower::where('follow_id', '=', $user->id)->first();

										if(is_null($if_null)) {
									?>
										<a href="{{route('following', $user->id)}}" class="btn btn-success btn-block">Follow</a>
									<?php } else { ?>
										<a href="#" class="btn btn-success btn-block" disabled>Following</a>
									<?php } ?>
								</div>
							</div>
						</div>
					@endforeach
			</div>
		</div>
	</div>
</div>
@endsection
<style type="text/css">
	.profile-result img {
		width: 25%;
		border-radius: 50%;
		height: 50px;
		border: 2px solid #fff;
	}
	.profile-result {
		margin-top: -40px;
	}
	.box-card {
		box-shadow: 0 1px 4px #888888;
	}
	.button_bg a {
		background-color: #39393d;
		color: #fff;
	}
	.sort {
    	float: right;
    	margin: -45px 0;
	}
	.sort select {
    	width: 125px;
    	height: 50px;
    	border: none;
	}
</style>
