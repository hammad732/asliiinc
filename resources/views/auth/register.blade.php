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
    .login-btn{
        background-color: #F35901;
        color: #FFFFFF;
        border: none;
        
    }
    .Login-btn:hover {
        color: #FFFFFF;
        background-color: #F35901;
        
       
    }
    .register-btn{
        color: #FFFFFF;
        background-color: #F35901;
    }
    .register-btn:hover {
        color: #FFFFFF;
        background-color: #F35901;
    }
    
    label{
        color:#F35901;
    }
</style>


@section('content')

<div class="breadcrumbs">
    <div class="container">
      <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
        <li>
          <a href="{{route('main')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a>
        </li>
        <li class="active">Register Page</li>
      </ol>
    </div>
  </div>
  <!-- //breadcrumbs -->
  <!---728x90--->
  <!-- register -->
  <div class="register">
    <div class="container">
      <h2>Register Here</h2>
      <div class="login-form-grids">
      
        <div class="card-body">
           <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group row">
                <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>
                <div class="col-md-6">
                    <select name="country" id="country" class="form-control" autofocus>
                        <option value="233" id="united_state">United States</option>
                        @foreach($countries as $country)

                                <option value="{{ $country->id }}"  {{ $country->id == old('country') ? 'selected' : '' }}>

                                {{ $country->name }}
                            </option>
                        @endforeach
                        <option value="">Select Country</option>
                    </select>

                    @error('country')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="company" class="col-md-4 col-form-label text-md-right">{{ __('Business Name (Optional)') }}</label>

                <div class="col-md-6">
                    <input id="company" type="text" class="form-control @error('company') is-invalid @enderror" name="company" value="{{ old('company') }}"  autocomplete="company" >

                    @error('company')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="fname" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                <div class="col-md-6">
                    <input id="fname" type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname') }}" required autocomplete="fname" autofocus>

                    @error('fname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="lname" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                <div class="col-md-6">
                    <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}" required autocomplete="lname" autofocus>

                    @error('lname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Street Address') }}</label>

                <div class="col-md-6">
                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                <div class="col-md-6">
                    <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus>

                    @error('city')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="State" class="col-md-4 col-form-label text-md-right">{{ __('State') }}</label>

                <div class="col-md-6">
                    <select name="state" id="state" class="form-control" required>
                        <option value="">-- SELECT --</option>
                    @foreach($states as $state)

                            <option value="{{ $state->id }}" {{ $state->id == old('state') ? 'selected' : '' }}>
                                {{ $state->name }}
                            </option>
                    @endforeach
                </select>

                    @error('state')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="zip_code" class="col-md-4 col-form-label text-md-right">{{ __('Zip Code') }}</label>

                <div class="col-md-6">
                    <input id="zip_code" type="text" class="form-control @error('zip_code') is-invalid @enderror" name="zip_code" value="{{ old('zip_code') }}" required autocomplete="zip_code" autofocus>

                    @error('zip_code')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="phone_no" class="col-md-4 col-form-label text-md-right">{{ __('Phone No') }}</label>

                <div class="col-md-6">
                    <input class="form-control phone" type="text" name="phone_no"  value="{{ old('phone_no') }}" required autocomplete="phone_no" autofocus/>
                    @error('phone_no')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

          

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>
           <!--<div class="form-group row mb-0">-->
           <!--     <div class="col-md-6 offset-md-4">-->
           <!--       {{-- <p><a href="{{Route('login')}}" style="color:#F35901;">Already have an account?</a></p> --}}-->
           <!--         <button class="btn login-btn">                       -->
           <!--                 <a href="{{Route('login')}}" class="btn login-btn" style="color: #FFFFFF;">Already have an account?-->
           <!--                 </a>                        -->
           <!--         </button>-->
           <!--     </div>-->
           <!-- </div>-->
           <!-- <div class="form-group row mb-0">-->
           <!--     <div class="col-md-6 offset-md-4">-->
           <!--         <button type="submit" class="btn register-btn" style="color: #FFFFFF;">-->
           <!--             {{ __('Register') }}-->
           <!--         </button>-->
           <!--     </div>-->
           <!-- </div>-->
           
           <div class="form-group row mb-0">
               <div class="col-md-4 offset-md-4">
                    <button type="submit" class="btn register-btn" style="color: #FFFFFF; width: 50%">{{ __('Register') }}</button>
                </div>
                <div class="col-md-5 offset-md-4">
                    <a href="{{Route('login')}}" class="btn login-btn" style="color: #FFFFFF; text-decoration: none;">Already have an account?</a>
                </div>
                
            </div>

        </form>
        </div>
      </div>
      <!-- <div class="register-home">
          <a
            href="https://p.w3layouts.com/demos_new/13-02-2017/super_market-demo_Free/405423547/web/index.html"
            >Home</a
          >
        </div> -->
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
