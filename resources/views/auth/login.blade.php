{{-- @extends('layouts.app') --}}
@extends('frontend.layouts.master')


<style>
    .card-row{
        height:100vh;
    }
    
        .login-btn{

        width: 20%;
        color: #F35901;
        border:none !important;
        /* background-color:#F35901;
        border-color:#F35901; */
    }
    .login-btn:hover{
        background-color:#FFFFFF;
        border-color:#F35901;
        color:#F35901;
    }
        
    label{
        color:#F35901;
    }
    .login-signup-btn{
        background-color:#F35901 !important;
        color:white !important;
        border-radius:5px !important;
        text-decoration:none !important;
        border:none !important;
    }
    a.btn-link{
        color:#F35901;
        
        
    }
    @media screen and (max-width: 480px) {
        .login-btn{
            width: 28%;
        }
    }
    .btn-primary{
        background-color:#F35901 !important;
    }


</style>


@section('content')
<div class="breadcrumbs">
    <div class="container">
      <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
        <li>
          <a href="{{route('home')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a>
        </li>
        <li class="active">Login</li>
      </ol>
    </div>
  </div>
  <!-- //breadcrumbs -->
  <!---728x90--->
  <!-- register -->
  <div class="register">
    <div class="container">
      <h2>Login </h2>
      <div class="login-form-grids"> 
          
        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary login-btn">
                            {{ __('Login') }}
                        </button>

                        <a class="btn btn-link login-signup-btn" href="{{ route('register') }}">
                            {{ __('Sign up') }}
                        </a>
                    </div>
                    
                </div>
                <div class="form-group row mb-0">
                          @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
            </form>
        </div>
        
      </div>
    </div>
  </div>
@endsection
