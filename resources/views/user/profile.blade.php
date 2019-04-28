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
    <div class="row">
    	@foreach ($allInfo as $info)
  		<div class="col-sm-3">    
		    <ul class="list-group">
		        <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
		        <li class="list-group-item text-right"><span class="pull-left"><strong>Following</strong></span> {{ $followingUser->count() }}</li>
		        <li class="list-group-item text-right"><span class="pull-left"><strong>Repository</strong></span> {{ $info->repository }}</li>
		        <li class="list-group-item text-right"><span class="pull-left"><strong>Followers</strong></span> {{ $followersUser->count() }}</li>
		    </ul>          
	    </div>
	    @endforeach
    	<div class="col-sm-9">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
            </ul>             
          	<div class="tab-content">
          		@foreach ($allInfo as $info)
            	<div class="tab-pane active" id="home">
            		<div>
            			<h1 class="text-center">Information about me</h1>
            			<hr>
            		</div>
                	<hr>
                      	<div class="form-group">  
                          	<div class="col-xs-6">
                              	<label><h4>First name</h4></label>
                          	</div>
                      		<div class="col-xs-6">
                      			<label><h4>{{$info->first_name}}</h4></label>
                      		</div>
                      	</div>
                      	<div class="form-group">                          
                          	<div class="col-xs-6">
                            	<label><h4>Last name</h4></label>
                          	</div>                        
                          	<div class="col-xs-6">
                            	<label><h4>{{$info->last_name}}</h4></label>
                          	</div>
                      	</div>          
                      	<div class="form-group">                          
                        	<div class="col-xs-6">
                              	<label><h4>Birthday</h4></label>
                          	</div>                          
                        	<div class="col-xs-6">
                              	<label><h4>{{$info->birthday}}</h4></label>
                          	</div>
                      	</div>          
                      	<div class="form-group">
                          	<div class="col-xs-6">
                             	<label><h4>Repository</h4></label>
                          	</div>
                        	<div class="col-xs-6">
                              	<label for="birthday"><h4>{{$info->repository}}</h4></label>
                          	</div>
                      	</div>
              		<hr>
             	</div>
             	@endforeach
             	@if(!empty($allInfo))
              	<div class="tab-pane" id="settings">
             		@forelse ($allInfo as $a)
              		@empty
                      	<hr>
	             		<form class="form" action="{{route('insert')}}" method="post" id="registrationForm1">
	             			{{csrf_field()}}
	             			<div class="form-group">
	             				<div class="col-xs-6">
	             					<label for="first_name"><h4>First name</h4></label>
	             					<input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter your first name" autocomplete="off">
	             				</div>
	                      	</div>
	                      	<div class="form-group">
	                      		<div class="col-xs-6">
	                      			<label for="last_name"><h4>Last name</h4></label>
	                      			<input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter your last name" autocomplete="off">
	                      		</div>
	                      	</div>    
	                      	<div class="form-group">
	                      		<div class="col-xs-6">
	                              	<label for="birthday"><h4>Birthday</h4></label>
	                              	<input type="date" class="form-control" name="birthday" id="birthday" placeholder="Enter your birthday" autocomplete="off">
	                          	</div>
	                      	</div>
	                      	<div class="form-group">
	                          	<div class="col-xs-6">
	                             	<label for="repository"><h4>Repository</h4></label>
	                              	<input type="text" class="form-control" name="repository" id="repository" placeholder="Enter your count of repository" autocomplete="off">
	                          	</div>
	                      	</div>
	                      	<div class="form-group">
	                           <div class="col-xs-12">
	                                <br>
	                              	<button class="btn btn-lg btn-success pull-right" type="submit"><i class="fas fa-check"></i> Save</button>
	                            </div>
	                      	</div>
	              		</form>
              		@endforelse
              	</div>   
              	@endif           
            </div>
        </div>
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
