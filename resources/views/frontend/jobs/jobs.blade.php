@extends('frontend.layouts.master')


<style>
  
    #equal-height-columns a {
        background-color:#F35901;
        border-radius: 10px;
    }
    .card{
        color:#FFFFFF;
        padding: 40px 55px;
    }
    .card p {
        color:#FFFFFF!important;
    }
    @media(max-width: 768px) {
        .card{
            margin-top: 10px;
        margin-bottom: 10px;
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
        <li class="active">Jobs</li>
      </ol>
     </div>
  </div>

    <!-- Content Wrapper. Contains page content -->
    <div class="register">
    <div class="content-wrapper py-5">
        <!-- Main content -->
        <section class="content">

            {{-- dproducts section --}}
            <div class="">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <h2 class="text-center current-jobs"><strong>Current Jobs</strong></h2>
                        </div>
                    </div>

                    <div class="job">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12 ml-0 pl-0">
                            <hr>

                            <div class="row" id="equal-height-columns">
                                @foreach ($jobs as $job)
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                                        <a style="text-decoration: none; display:block;" href="{{route('job.detail', $job->id)}}">
                                            <div class="card" style="display:block;">
                                                <div class="card-body">
                                                   <p class="card-text" style="color:white">Job ID:  <strong>{{ str_pad($job->id, 4, '0', STR_PAD_LEFT) }}</strong></p>
                                                    <p class="card-text">Position: <strong>{{$job->name}}</strong></p>
                                                    {{-- <p class="card-text"><i> Created on: <b>{{$job->created_at->format('d-M-Y')}}</b> </i></p> --}}
                                                    <p class="card-text">Location: <strong>{{$job->city}},
                                                    {{-- <p class="card-text">State: <strong> --}}
                                                        @php
                                                        $countries = App\Country::all();
                                                        $states = App\State::all();
                                                    @endphp
                                                    @foreach ($states as $state)
                                                        @if ($state->id == $job->state)
                                                            {{ $state->name }},
                                                        @endif
                                                    @endforeach
                                                {{-- </strong></p> --}}
                                                    {{-- <p class="card-text">Country: <strong> --}}
                                                        @php
                                                        $countries = App\Country::all();
                                                        $states = App\State::all();
                                                    @endphp
                                                    @foreach ($countries as $country)
                                                        @if ($country->id == $job->country)
                                                            {{ $country->name }}
                                                        @endif
                                                    @endforeach    
                                                    </strong></p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
</div>

    <!-- /.content-wrapper -->
@endsection


@section('script')
    <script>
    $(document).ready(function()
    {
        var maxHeight = 0;

    $("#equal-height-columns > div").each(function() {
        if ($(this).height() > maxHeight) {
            maxHeight = $(this).height();
        }
    });

    $("#equal-height-columns > div").height(maxHeight);
    $("#equal-height-columns a").height(maxHeight);
    });
</script>
@endsection
