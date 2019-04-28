@extends('layouts.app')

@section('content')
<div class="container">
	<div class="jumbotron">
		<img src="{{asset('images/user.png')}}">
    @foreach($user as $u)
		<h2>{{$u->name}}</h2>
		<p>{{$u->username}}</p>
    @endforeach
	</div>	
</div>

@endsection

<style type="text/css">
	.jumbotron {
		background: url(../images/nature.jpg);
	}
	.jumbotron img {
		width: 205px;
		border-radius: 50%;
		height: 185px;
		border: 5px solid #ddd;
	}
	.jumbotron h2, .jumbotron h2 + p {
		color: #fff;
		margin-bottom: 0;
	}

</style>
