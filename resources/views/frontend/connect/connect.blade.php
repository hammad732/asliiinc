@extends('frontend.layouts.master')


<style>


form {
    display: block;
    margin-top: 0em;
    margin-block-end: 1em;
}
.connect-video{
    position: relative;
}
h5 {
    color: #F35901!important;
}
.card-header:first-child {
    border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0;
}
.text-center {
    text-align: center!important;
}
.pb-4, .py-4 {
    padding-bottom: 1.5rem!important;
}
.pt-4, .py-4 {
    padding-top: 1.5rem!important;
}
.card-header {
    padding: 0.75rem 1.25rem;
    margin-bottom: 0;
    background-color: rgba(0,0,0,.03);
    border-bottom: 1px solid rgba(0,0,0,.125);
}
h1, h2, h3, h4, h5, h6, a {
    font-family: "Raleway", sans-serif;
    margin: 0;
    font-weight: 700;
}
strong {
    font-weight: 700;
    font-size: 26px;
}
.h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
    margin-bottom: 0.5rem;
    font-weight: 500;
    line-height: 1.2;
}
h1, h2, h3, h4, h5, h6 {
    margin-top: 0;
    margin-bottom: 0.5rem;
}


.card-body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1.25rem;
    margin-top: -96px  ;
}


.row {
    padding-top: 26px;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -15px;
    margin-left: -15px;
    margin-bottom: 50px;
}
/* .send-btn .btn {
    display: block;
   
    margin-right: auto;
    width: 50%;
    background-color: #F35901;
    border-color: #F35901;
} */
.btn-info {
    color: #fff;
    background-color: #17a2b8;
    border-color: #17a2b8;
}
.btn {
    display: inline-block;
    font-weight: 400;
    color: #212529;
    text-align: center;
    vertical-align: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-color: transparent;
    border: 1px solid transparent;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: 0.25rem;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
[type=button], [type=reset], [type=submit], button {
    -webkit-appearance: button;
}
.btn {
    -webkit-appearance: none;
}
button, select {
    text-transform: none;
}
button, input {
    overflow: visible;
}
button, input, optgroup, select, textarea {
    margin: 0;
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
}
button {
    border-radius: 0;
}
* {
    box-sizing: border-box;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
}



video {
    width: 100%;

}

/* .contact-imag {
   
    width: 100%;
    margin-bottom: 2%;
} */

.icon1 img{
    width: 95%;
    height: 100%;
   /* position: absolute; */
    /* margin-bottom: 2%; */
}

    .send-btn .btn{
        /* display: block; */
        /* margin-left: 270px; */
        margin-right: auto;
        width: 50%;
        background-color:#F35901;
        border-color:#F35901;
    }
    .send-btn .btn:hover{
        background-color:#FFFFFF;
        border-color:#F35901;
        color:#F35901;
    }

    .form-control {
    margin-top: 0px !important;
}
.card {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0,0,0,.125);
    border-radius: 0.25rem;
}
.form-control {
    display: block;
    width: 100%;
    height: calc(1.5em + 0.75rem + 2px);
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
@media(max-width: 1200px) {
    .icon1 img{
        width:100%;
       /* position: absolute; */
        /* margin-bottom: 2%; */
    }
}
@media (max-width: 768px) {
    .width-form{
        width: 100%;
    }
}






.video-container {
  position: relative;
  width: 100%;
  max-width: 100%;
}

/* Style for the video element */
.video-container video {
  width: 100%;
  height: 590px;
  object-fit: cover !important;
  display: block;
}
@media(max-width: 992px) {
    .video-container video {
        height: 300px;
    }
}

/* Style for the overlay */
.video-container .overlay {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  background: rgba(0, 0, 0, 0.5); /* Adjust the overlay color and opacity */
}

/* Style for the text in the overlay */
.video-container .overlay .text {
  text-align: center;
  color: #fff; /* Text color */
}

/* Media query for responsiveness */
@media screen and (max-width: 768px) {
  .video-container .overlay .text {
    /* Example responsive text size */
    font-size: 18px;
  }
  .lets_connect{
    font-size: xx-large;
}
}
@media screen and (max-width: 425px) {
  .lets_connect{
    font-size: xx-large !important;
}
}
.lets_connect{
    font-size: xxx-large;
}
.text p {
    font-size: large;
    margin-bottom: 5px;
}



</style>



@section('content')

    <!-- ========== contact-banner =========  -->
    {{-- <header>
        <div class="overlay"></div>
        <div class="connect-video">
            <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
                <source src="{{ asset('images/resize.webm') }}" type="video/mp4">
            </video>
        </div>
        <div class="container ">
            <div class="d-flex  text-center align-items-center">
                <div class="w-100 text-white">
                    <div class="connect-text">
                        <h4><b>Lets Connect!</b></h4>
                        <br>
                        <!--<p><i class="fa fa-map-marker"></i> 2304 Silverdale Drive, Suite 200 Johnson City, TN 37601</p>-->
                        <!--<p><i class="fas fa-envelope"></i> example@gmail.com</p>-->
                        <!--<p><i class="fa fa-phone"></i> (222)-222-2222</p>-->
                        <p><i class="fa fa-map-marker"></i> {{ $connect[0]->address }}</p>
                        <p><i class="fas fa-envelope"></i> {{ $connect[0]->email }}</p>
                        <p><i class="fa fa-phone"></i> {{ $connect[0]->phone_no }}</p>
                    </div>
                </div>
            </div>
        </div>
    </header> --}}
    <div class="video-container">
        <video autoplay muted loop>
          <source src="{{ asset('images/resize.webm') }}" type="video/mp4">
          <!-- Add more source elements for different video formats -->
          Your browser does not support the video tag.
        </video>
        <div class="overlay">
          <div class="text">
            <h4 class="lets_connect"><b>Lets Connect!</b></h4>
                        <br>
                        <!--<p><i class="fa fa-map-marker"></i> 2304 Silverdale Drive, Suite 200 Johnson City, TN 37601</p>-->
                        <!--<p><i class="fas fa-envelope"></i> example@gmail.com</p>-->
                        <!--<p><i class="fa fa-phone"></i> (222)-222-2222</p>-->
                        <!--<p><i class="fa fa-map-marker"></i> {{ $connect[0]->address }}</p>-->
                        <!--<p><i class="fas fa-envelope"></i> {{ $connect[0]->email }}</p>-->
                        <!--<p><i class="fa fa-phone"></i> {{ $connect[0]->phone_no }}</p>-->
          </div>
        </div>
      </div>

    <!-- end of connect video -->

    <!-- ========== connect video =========  -->
    

    {{-- <div class="form-div">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="icon1">
                        <img class="contact-imag img-fluid" src="{{ asset('images/mail22.jpeg') }}">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-12 width-form" >
                    <div class="form">
                        <!-- Material form login -->
                        <div class="card">
                            <h5 class="card-header info-color white-text text-center py-4">
                                <strong>Connect Us</strong>
                            </h5>
                            <!--Card content-->
                            <div class="card-body px-lg-5 pt-2">

                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                    @if(session()->has('status'))
                                        <p class="alert alert-success">{{session('status')}}</p>
                                    @endif
                                    @if(session()->has('msg'))
                                        <p class="alert alert-danger">{{session('msg')}}</p>
                                    @endif
                                    </div>
                                </div>

                                <!-- Form -->
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
                                <!-- Form -->
                            </div>
                        </div>
                        <!-- Material form login -->
                    </div>
                </div>
            </div>
        </div>
    </div> --}}





    
    <!-- end of contact-banner -->

        <!-- The Modal -->
        <div class="modal" id="myModal2">
            <div class="modal-dialog">
                <div class="modal-content-transparent">
                    <!-- Modal body -->
                    <div class="modal-body text-center">
                        <img src="{{ asset('images/gif-load.gif') }}" alt="" class="gif-size" style="width:100px">
                        <h4 class="product-add-text text-white"><strong>Sending email...</strong></h4>
                    </div>
                </div>
            </div>
        </div>

@endsection

@section('script')
<script>

    $(document).ready(function ()
    {
        $('.send-btn').show();
        $('#myModal2').modal('hide');
    });

    $('.send-btn').click(function ()
    {
        var name = $('#connect-uname').val();
        var subj = $('#connect-subject').val();
        var email = $('#connect-email').val();
        var msg = $('#connect-msg').val();

        if (name != '' && subj != '' && email != '' && msg != '')
        {
            // $('.send-btn').hide();
            $('#myModal2').modal({backdrop: 'static', keyboard: false}, 'show');
        }
        else
        {
            alert('Complete the form!');
        }
    });
</script>
@endsection
