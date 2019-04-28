@extends('layouts.app')

@section('content')
<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">Search result</div>
	</div>

	@include('layouts.profile_sidebar')
	
	<div class="row">
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading"><h4>Search result for: {{Request::get('search')}}</h4></div>
			</div>
			<div class="panel-body" style="background-color: #ddd;">
				@if(count($searchUsers)> 0)
					@foreach($searchUsers as $user)
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
									<div class="button_bg">
										<a class="btn btn-default btn-block" href="{{route('showOtherPage', $user->name)}}">Show Profile</a>
									</div>
								</div>
							</div>
						</div>
					@endforeach
				@else
					<p class="text-danger">no results</p>
				@endif
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
</style>