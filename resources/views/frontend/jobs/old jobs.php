@extends('frontend.layouts.master')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper py-5">
        <!-- Main content -->
        <section class="content">

            {{-- dproducts section --}}
            <div class="rproducts">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <h2 class="text-center"><strong>Available Jobs</strong></h2>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <hr>

                            <div class="row">
                                @foreach ($jobs as $job)
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                        <div class="card m-2">
                                            <div class="card-body">
                                                <p class="card-text">Name: <strong>{{$job->name}}</strong></p>
                                                <p class="card-text">Email: <strong>{{$job->email}}</strong></p>
                                                <p class="card-text">Type: <strong>{{$job->type}}</strong></p>
                                                <p class="card-text">Salary per hour: <strong>$ {{$job->salary}}</strong></p>
                                                <p class="card-text">Location: <strong>
                                                    {{$job->city}},
                                                    @php
                                                    $countries = App\Country::all();
                                                    $states = App\State::all();
                                                    @endphp
                                                    @foreach ($states as $state)
                                                        @if ($state->id == $job->state)
                                                            {{$state->name}},
                                                        @endif
                                                    @endforeach
                                                    @foreach ($countries as $country)
                                                    @if ($country->id == $job->country)
                                                        {{$country->name}},
                                                    @endif
                                                @endforeach
                                                {{$job->zip_code}}
                                                </strong></p>
                                            </div>
                                        </div>
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

    <!-- /.content-wrapper -->
@endsection


@section('script')
    <script>
    $(document).ready(function()
    {

    });
</script>
@endsection
