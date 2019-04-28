@extends('layouts.app')

@section('content')
<div class="login_page">
    <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="registration_card">
                <div class="d-flex justify-content-center">
                    <div class="brand_logo_container">
                        <img src="{{asset('images/github.png')}}" class="brand_logo" alt="Logo">
                    </div>
                </div>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                    {{ csrf_field() }}
                    <div class="justify-content-center form_container">
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-at"></i></span>
                            </div>
                            <input id="email" type="text" name="email" class="form-control input_user" value="{{ old('email') }}" required="required" placeholder="E-mail">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="input-group">
                            <button type="submit" class="btn login_btn">Send Password Reset Link</button>
                        </div>
                    </div>                    
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
