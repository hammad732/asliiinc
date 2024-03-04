@extends('frontend.layouts.master')

<style>
    @media (max-width: 640px) {
   .vendors-mid .one p {
   text-align: center !important;
 }
 
}
</style>

@section('content')


<div class="construction-services-banner">
    {{-- <div class="container-fluid">
        <div class="row"> --}}
            <img src="{{asset('/docs/pics/'.$service->image)}}" alt="">
            <div class="construction-services-banner-text mx-2">
                <h1>{{$service->heading}}</h1>
            </div>
        {{-- </div>
    </div> --}}
</div>
<!-- end of single-service-banner -->

<!-- ========== single-service-mid =========  -->
    <div class="vendors-mid">
    <div class="container">
        <div class="row one">
            <div class="col-12">
                <p style="white-space: pre-wrap;">{!!$service->text!!}</p>
            </div>
        </div>
    </div>
</div>

<!-- end of single-service-mid -->

<!-- ========== single-service-last =========  -->

{{-- <div class="vendors-last">
    <div class="container">
        <div class="row one">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <h3>{{$service->heading}}</h3>
            </div>
        </div>
        <div class="row two">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <p>{!!$service->text!!}</p>
            </div>
        </div>
        
    </div>
</div> --}}
<!-- end of single-service-last -->

     

@endsection