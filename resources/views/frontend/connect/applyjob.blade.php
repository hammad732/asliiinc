{{-- 
@extends('frontend.layouts.master')



@section('content')
<form method="POST" action="{{route('connect.email')}}">
    @csrf

    <div class="form-group row">
        <label for="uname" class="col-md-3 col-form-label text-md-right">{{ __('Name') }}</label>

        <div class="col-md-9">
            <input id="connect-uname" type="uname" class="form-control @error('uname') is-invalid @enderror" name="uname" value="{{ old('uname') }}" required autocomplete="uname" autofocus>

            @error('uname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('E-Mail') }}</label>

        <div class="col-md-9">
            <input id="connect-email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="subject" class="col-md-3 col-form-label text-md-right">{{ __('Subject') }}</label>

        <div class="col-md-9">
            <input id="connect-subject" type="subject" class="form-control @error('subject') is-invalid @enderror" name="subject" value="{{ old('subject') }}" required autocomplete="subject" autofocus>

            @error('subject')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="msg" class="col-md-3 col-form-label text-md-right">{{ __('Message') }}</label>

        <div class="col-md-9">
            <textarea id="connect-msg" type="msg" class="form-control @error('msg') is-invalid @enderror" name="msg" value="{{ old('msg') }}" required autocomplete="msg" autofocus></textarea>

            @error('msg')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-12 text-center send-btn ">
            <button type="submit" class="btn btn-info">
                {{ __('Send Email') }}
            </button>
        </div>
    </div>
</form>



@endsection --}}

{{-- @extends('layouts.app') --}}
@extends('frontend.layouts.master')



<style>
    .card-row{
        height:80vh;
    }
    
        .register-btn{

        background-color:#F35901;
        border-color:#F35901;
    }
    .register-btn:hover{
        background-color:#FFFFFF;
        border-color:#F35901;
        color:#F35901;
    }
    
    label{
        color:#F35901;
    }
    #connect-textarea{
        outline: none;
    border: 1px solid lightgray;
    border-radius: 5px
    }
    #connect-textarea:focus{
        box-shadow: 0 0 5px 0.1rem rgba(0, 123, 255, 0.25);
    }
</style>


@section('content')

<div class="breadcrumbs">
    <div class="container">
      <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
        <li>
          <a href="{{route('main')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a>
        </li>
        <li class="active">Apply Job</li>
      </ol>
    </div>
  </div>
  <!-- //breadcrumbs -->
  <!---728x90--->
  <!-- register -->
  <div class="register">
    <div class="container">
      <h2>Apply Here</h2>
      <div class="login-form-grids">
      
        <div class="card-body">
           <form method="POST" action="{{route('connect.email')}}"  enctype="multipart/form-data">
            @csrf


            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"  >

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"  required  autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="Subject" class="col-md-4 col-form-label text-md-right">Subject</label>

                <div class="col-md-6">
                    <input id="Subject" type="text" class="form-control @error('Subject') is-invalid @enderror" name="Subject"  required  autofocus>

                    @error('Subject')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="Resume" class="col-md-4 col-form-label text-md-right">Resume</label>

                <div class="col-md-6">
                    <input id="Resume" type="file"  name="Resume"  required >

                    @error('Resume')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="connect-textarea" class="col-md-4 col-form-label text-md-right">Message</label>

                <div class="col-md-6">
                 <textarea name="Message" id="connect-textarea" cols="35" rows="5"></textarea>

                    @error('Message')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary register-btn">
                        Apply
                    </button>
                </div>
            </div>
        </form>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('script')

<script>
    $(document).ready(function()
    {
     //by defualt for state selection for us 
       var country = $('#united_state').val();
                $.ajax({
                    type: "GET",
                    url: "{{route('select.state')}}",
                    data: {country: country},
                    success: function (data) {
                        console.log(data);
                        $('#state').html(data);
                    },
                });
    }); //=== End of Doc Ready
</script>

@endsection
