@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">

		@include('layouts.profile_sidebar')

		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading"><h4>Following ( {{$followingUser->count()}} )</h4></div>
			</div>
			<div class="panel-body" style="background-color: #ddd;">
					@foreach($followingUser as $following)
						<div class="col-md-4">
							<div class="box-card">
								<img src="{{asset('images/user.png')}}" style="width: 100%;">
								<div class="panel-footer">
									<div class="profile-result">
										<img src="{{asset('images/user.png')}}" height="54px;">
									</div>
									<span>
										<h4 class="card-title" style="margin-bottom: 0"><b>{{$following->name}}</b></h4>
										<p>{{$following->username}}</p>
									</span>

									<a href="{{route('unfollow', $following->id)}}" class="btn btn-success"><i class="fas fa-times"></i> Unfollow</a>									
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
		height: 55px;
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
</style>