{{-- @extends('frontend.layouts.master')


<style>
    .card-row{
        height:100vh;
    }
    
        .send-link{

        width: 100%;
        background-color:#F35901;
        border-color:#F35901;
    }
    .send-link:hover{
        background-color:#FFFFFF;
        border-color:#F35901;
        color:#F35901;
    }
</style>


@section('content')
<div class="container py-5">
    <div class="row justify-content-center card-row">
        <div class="col-md-8">
            <div class="card mt-2">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
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

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary send-link">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


{{-- @extends('layouts.app') --}}


@extends('frontend.layouts.master')


<style>
    .card-row{
        height:100vh;
    }
    .send-link{
        background-color: #F35901 !important;
        border:none;
    }
        .login-btn{

        width: 25%;
        background-color:#F35901;
        border-color:#F35901;
    }
    .login-btn:hover{
        background-color:#FFFFFF;
        border-color:#F35901;
        color:#F35901;
    }
    .forget-btn{
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
    }
        
    label{
        color:#F35901;
    }
    @media screen and (max-width: 480px) {
        .login-btn{
            width: 28%;
        }
    }
</style>


@section('content')


<div class="breadcrumbs">
    <div class="container">
      <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
        <li>
          <a href="{{route('main')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a>
        </li>
        <li class="active">Forget Password</li>
      </ol>
    </div>
  </div>
  <!-- //breadcrumbs -->
  <!---728x90--->


  <!-- register -->
  <div class="register">
    <div class="container">
      <h2>Forget Password </h2>
      <div class="login-form-grids"> 
          
        <div class="card-body">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <form method="POST" action="{{ route('password.email') }}">
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

                <div class="form-group row mb-0 forget-btn ">
                    <div class="">
                        <button type="submit" class="btn btn-primary send-link">
                            {{ __('Send Password Reset Link') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
        
      </div>
    </div>
  </div>
@endsection 

