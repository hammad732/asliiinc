@extends('frontend.layouts.master')


<style>
.img1 {
    width: 80%;
    display: block;
    margin-left: auto;
    margin-right: auto;
    border-radius: 20px;
    padding: 1%;
    height: 200px;
    box-shadow: 2px 2px 8px -2px;
}
.title-text-aligment {
    height: 70px;
    display: flex;
    align-items: flex-end;
    justify-content: center;
    padding-bottom:10px;

}

</style>

@section('content')


    <!-- ========== services-mid =========  -->
    <div class="services-mid">
        <div class="container">
            <div class="row d-flex justify-content-center">
                @foreach ($servicepage as $servicemid)
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12 col-one mb-5">
                        <h3 class="text-center title-text-aligment">{{$servicemid->type}}</h3>
                        @if ($servicemid->custom_link!=null)
                            <a href="{{ $servicemid->custom_link }}">
                                <img class="img1" src="{{ asset('/docs/pics/services/'.$servicemid->image) }}">
                            </a>
                        @else
                        <a href="{{ route('singleservices', $servicemid->type) }}">
                            <img class="img1" src="{{ asset('/docs/pics/services/'.$servicemid->image) }}">
                            </a>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="services-last">
        <div class="container">
            <div class="row one">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    {{-- <h3>{{$servicepage[9]->text}}</h3> --}}
                </div>
            </div>

            <div class="row two">
                <hr>

            </div>
        </div>
    </div>

@endsection

@section('script')

@endsection
