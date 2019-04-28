@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2>Welcome, {{Auth::user()->name}}</h2>
                    <p>That service is be free and tested our company in the aim check authentication and safety our users. Service "Github Service" is unique in my understanding, because that testing work mine service will be step for step achievments part of ones projects. I hope that service will be liked workers in my future job. </p>
                    <p>The project achievments created that service what are you see:</p>
                    <ol>
                        <li>1) Simple registration and authorization for future users;</li>
                        <li>2) The profile is contain most important information about users;</li>
                        <li>3) If you wished to continue and help for that project in other direction, to create analog for Kazakhstan developers.</li>
                    </ol>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
