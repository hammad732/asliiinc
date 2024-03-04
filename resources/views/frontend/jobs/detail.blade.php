@extends('frontend.layouts.master')

<style>
    .job-row {
        /*height:60vh;*/
    }

    .card {
        background-color: #F35901 !important;
        color: #FFFFFF !important;
        padding: 1.5rem;
        margin-bottom: 25px;
        border-radius: 5px;
    }

    .card p {
        color: #FFFFFF !important;
    }

    .job-created-div {
        margin-top: 20px;
    }

    .job-created-div h5 {
        font-size: 1.25rem;
        color: #F35901;
        margin-bottom: 0.5rem;
        font-weight: 500;
    }

    .spacing-div {
        margin-bottom: 1rem;
    }

    .resume-btn {
        color: white;
        background-color: #F35901;
        padding: 10px 20px !important;
        border: none;
        margin-bottom: 10px !important;
    }

    .resume-btn:hover {
        color: white !important;
        background-color: #F35901;
    }

    .btn:focus,
    .btn:active {
        outline: none !important;
        box-shadow: none !important;
        color: white !important
    }
</style>


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper py-5">
        <!-- Main content -->
        <section class="content">

            {{-- dproducts section --}}
            <div class="">
                <div class="container">

                    <div class="row mt-3">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12 text-center job-created-div">
                            <h5 class="text-center"><strong><b>{{ $job->name }}</b></strong></h5>
                            <p style="color:#F35901">Job ID: <b>{{ str_pad($job->id, 4, '0', STR_PAD_LEFT) }}</b><br>
                                Created on: <b>{{ $job->created_at->format('d-M-Y') }}</b>
                            </p>
                        </div>
                    </div>
                    <hr>
                    

                    <div class="job-row">
                        <div class="card bg-light m-3">
                            <div class="card-body">
                                <div class="row spacing-div testing-div">
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12 ">
                                        <p>Type: {{ $job->type }}</p>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12 ">
                                        @if (ctype_digit($job->salary) == 'true')
                                            <p>Salary per hour: ${{ number_format($job->salary, 2) }}</p>
                                        @else
                                            <p>Salary per hour: {{ $job->salary }}</p>
                                        @endif

                                    </div>
                                </div>
                                <div class="row spacing-div testing-div">
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                        <p>City: {{ $job->city }}</p>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                        <p>State: 
                                                @php
                                                    $countries = App\Country::all();
                                                    $states = App\State::all();
                                                @endphp
                                                @foreach ($states as $state)
                                                    @if ($state->id == $job->state)
                                                        {{ $state->name }}
                                                    @endif
                                                @endforeach
                                            </p>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                        <p>Country: 
                                                @php
                                                    $countries = App\Country::all();
                                                    $states = App\State::all();
                                                @endphp
                                                @foreach ($countries as $country)
                                                    @if ($country->id == $job->country)
                                                        {{ $country->name }}
                                                    @endif
                                                @endforeach
                                            </p>
                                    </div>
                                </div>

                                <div class="row spacing-div testing-div">
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                        <p>Zip Code: {{ $job->zip_code }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row ">
                                    <div class="col-lg-3 col-md-3 col-sm-12 col-12 ">
                                        <p class="spacing-div" for="">Qualification:</p>
                                        <p class="spacing-div">{{ $job->qualification }}</p>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                        <p class="spacing-div" for="">Physical Requirments:</p>
                                        <p class="spacing-div">{{ $job->physical }}</p>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                        <p class="spacing-div" for="">Description:</p>
                                        <p class="spacing-div">{{ $job->desc }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12 btn-div text-center ">
                            <p>Send your resume to mail {{ $connects->email }} </p> 
                            {{-- <button class="btn resume-btn" type="submit">Apply </button> --}}
                            <a href="{{ route('applyjob') }}">
                                <button class="btn resume-btn">Send Us Resume</button>
                            </a>
                            {{-- <a href="{{route('applyjob', $job->id)}}"><input class="btn resume-btn" type="submit" value="Apply"></a> --}}
                        
                        </div>
                    </div>

                </div>
            </div>

        </section>
        <!-- /.content -->

      

    </div>

    <!-- /.content-wrapper -->
@endsection


@section('script')
    <script>
        $(document).ready(function() {

        });
    </script>
@endsection
