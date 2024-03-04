@extends('frontend.layouts.master')

@section('style')

@endsection


<style>
    .last-buttons{
        background-color: #ffc107 !important;
}
.service-banner-image{
    object-fit: cover;
}

</style>

@section('content')


    <!-- ========== single-service-banner =========  -->
    @if($singleservice)

    <div class="construction-services-banner">
        <div class="container-fluid">
            <div class="row">
                <img src="{{asset('/docs/pics/'.$singleservice->image)}}" alt="" class="service-banner-image">
                <div class="construction-services-banner-text mx-2">
                    <h1>{{$singleservice->heading}}</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- end of single-service-banner -->

    <!-- ========== single-service-mid =========  -->
        <div class="vendors-mid">
        <div class="container">
            <div class="row one">
                <div class="col-12">
                    <p style="white-space: pre-wrap;">{{$singleservice->text}}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- end of single-service-mid -->

    <!-- ========== single-service-last =========  -->

    <!-- end of single-service-last -->
    @endif

@endsection

@section('script')

@endsection
