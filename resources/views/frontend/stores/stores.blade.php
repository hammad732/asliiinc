@extends('frontend.layouts.master')


<style>
.breadcrumbs .breadcrumb li.active {
    color: #F35901; 
    font-weight: bold; 
}
    .search-btn {
        margin-top: 30px;
        /* display: block; */
        margin-left: auto;
        /*margin-right: auto;*/
        width: 200px;
        background-color: #F35901;
        border-color: #F35901;
    }

    .search-btn:hover {
        background-color: #FFFFFF;
        border-color: #F35901;
        color: #F35901;
    }

    .btn-primary {
        background-color: #F35901 !important;
        border-color: #FFFFFF !important;
    }

    .btn-primary:hover {
        background-color: #FFFFFF !important;
        border-color: #F35901 !important;
        color: #F35901 !important;
    }

    .btn-div {
        text-align: end;
    }

    .h5_heading {
        font-size: 1.25rem;
        color: #F35901;
        margin-bottom: 0.5rem;
    }

    .no_delivery_p {
        margin-bottom: 1rem;
        margin-top: 0px;
    }

    .phone1 {
        margin-left: 5px;
        margin-right: 0px !important;
    }

    .envelope {
        margin-right: 5px;
        font-size: 18px;
    }

    @media screen and (max-width: 576px) {
        h2.text-center.stores-heading {
            font-size: 20px;
        }

        h2.text-center.current-jobs {
            font-size: 21px;
        }

        h2.text-center.mb-2.home-heading {
            font-size: 30px;
        }

        h2.text-center.mb-2.home-heading {
            font-size: 20px !important;
        }

    }

    @media(max-width: 768px) {
        .btn-div {
            text-align: center;
        }
    }
</style>




@section('content')

    <!--<div class="breadcrumbs">-->
    <!--    <div class="container">-->
    <!--        <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">-->
    <!--            <li>-->
    <!--                <a href="{{ route('main') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a>-->
    <!--            </li>-->
    <!--                  <li class="active {{ Request::is('stores') ? 'active' : '' }}">Delivery Locator</li>-->
    <!--        </ol>-->
    <!--    </div>-->
    <!--</div>-->
  <div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
            <li>
                <a href="{{ route('main') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a>
            </li>
            <li class="{{ Request::is('stores') ? 'active' : '' }}">Delivery Locator</li>
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
                                <!--<h2 class="text-center stores-heading"><strong>DELIVERY LOCATIONS</strong></h2>-->
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                @if (session()->has('status'))
                                    <p class="alert alert-success">{{ session('status') }}</p>
                                @endif
                                @if (session()->has('msg'))
                                    <p class="alert alert-danger">{{ session('msg') }}</p>
                                @endif
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!--<div class="row">-->
                        <!--    <div class="col-lg-12 col-md-12 col-sm-12 col-12">-->
                        <!--        <h5 class=""><strong>Search a delivery location</strong></h5>-->
                        <!--    </div>-->
                        <!--</div>-->

                        <form action="{{ route('search.store') }}" method="GET">

                            <div class="row ">
                                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                    <label for="">Select Country</label>
                                    <select name="country" id="country" class="form-control" required>
                                        <option value="233" id="united_state">United States</option>

                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}"
                                                {{ $country->id == old('country') ? 'selected' : '' }}>

                                                {{ $country->name }}
                                            </option>
                                        @endforeach
                                        <option value="">Select Country</option>
                                    </select>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                    <div id="store-state-inp">
                                        <label for="">Select State</label>
                                        <select name="state" id="state" class="form-control" autofocus required>
                                            <option value="">-- SELECT --</option>
                                            @foreach ($states as $state)
                                                <option value="{{ $state->id }}"
                                                    {{ $state->id == old('state') ? 'selected' : '' }}>
                                                    {{ $state->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                    <div id="store-city-inp">
                                        <label for="">Enter City</label>
                                        <input id="city" type="text"
                                            class="form-control @error('city') is-invalid @enderror" name="city"
                                            value="{{ old('city') }}" autocomplete="city" autofocus>
                                    </div>


                                    @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    </select>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                    <div id="store-zip-code-inp">
                                        <label for="">Enter Zip Code</label>
                                        <input id="zip_code" type="text"
                                            class="form-control @error('zip_code') is-invalid @enderror" name="zip_code"
                                            value="{{ old('zip_code') }}" autocomplete="zip_code" autofocus>
                                    </div>
                                    @error('zip_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    </select>
                                </div>
                            </div>

                            <div class="row ">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12 btn-div">
                                    <button class="btn btn-primary search-btn" type="submit">Search</button>
                                </div>
                            </div>

                        </form>

                        <!--<hr>-->
                        {{-- <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <h5 class="h5_heading"><strong>Available Delivery Locations</strong></h5>
                        </div>
                    </div> --}}

                        <!--@if ($stores != null)-->
                        <!--    @if (count($stores) == 0)-->
                        <!--        <p class="no_delivery_p">* Sorry Delivery Locations not available</p>-->
                        <!--        <p> For more information contact us at <i class="fa fa-phone phone1"></i> +1 (717)-->
                        <!--            802-7590</span></p>-->
                        <!--    @else-->
                        <!--        <div class="row">-->
                        <!--            <div class="col-lg-12 col-md-12 col-sm-12 col-12">-->
                        <!--                <hr>-->

                        <!--                <div class="row">-->
                        <!--                    @foreach ($stores as $store)-->
                        <!--                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">-->
                        <!--                            <div class="stores-div">-->
                        <!--                                <a>-->
                        <!--                                    <div class="card m-2">-->
                        <!--                                        <div class="card-body">-->

                        <!--                                            @if ($store->city != null || $store->state != null || $store->country != null || $store->zip_code != null)-->
                        <!--                                                <i class="fas fa-map-marked-alt"></i>-->
                        <!--                                                @if ($store->country != null)-->
                        <!--                                                    @foreach ($countries as $country)-->
                        <!--                                                        @if ($store->country == $country->id)-->
                        <!--                                                            {{ $country->name }},-->
                        <!--                                                        @endif-->
                        <!--                                                    @endforeach-->
                        <!--                                                @endif-->
                        <!--                                                @if ($store->state != null)-->
                        <!--                                                    @foreach ($states as $state)-->
                        <!--                                                        @if ($store->state == $state->id)-->
                        <!--                                                            {{ $state->name }},-->
                        <!--                                                        @endif-->
                        <!--                                                    @endforeach-->
                        <!--                                                @endif-->
                        <!--                                                @if ($store->city != null)-->
                        <!--                                                    {{ $store->city }},-->
                        <!--                                                @endif-->


                        <!--                                                @if ($store->zip_code != null)-->
                        <!--                                                    {{ $store->zip_code }}.-->
                        <!--                                                @endif-->
                        <!--                                            @endif-->
                        <!--                                            </p>-->

                        <!--                                            <div id="hide-store-text-{{ $store->id }}"-->
                        <!--                                                class="hide-store-text">-->
                        <!--                                                <p class="card-text">-->

                        <!--                                                <p class="card-text" style="list-style-type:none;">-->
                        <!--                                                    <i class="fas fa-sun"></i> Delivery Days</p>-->
                        <!--                                                @if ($store->devlivery_days != null)-->
                        <!--                                                    <ul>-->

                        <!--                                                        @foreach ($store->devlivery_days as $dayss)-->
                        <!--                                                            @if ($dayss->days != null)-->
                        <!--                                                                <li-->
                        <!--                                                                    style="color:white;list-style-type:none;">-->
                        <!--                                                                    - {{ $dayss->days->days }}</li>-->
                        <!--                                                            @endif-->
                        <!--                                                        @endforeach-->
                        <!--                                                    </ul>-->
                        <!--                                                @else-->
                        <!--                                                    <p style="color:white;">Closed</p>-->
                        <!--                                                @endif-->


                        <!--                                                @if ($store->phone_no != null)-->
                        <!--                                                    <p class="card-text"><i-->
                        <!--                                                            class="fas fa-phone"></i>-->
                        <!--                                                        {{ $store->phone_no }}</p>-->
                        <!--                                                @endif-->

                        <!--                                            </div>-->
                        <!--                                            <button class="btn btn-primary show-more-store-text"-->
                        <!--                                                class"float-right" value="{{ $store->id }}">read-->
                        <!--                                                more</button>-->
                        <!--                                        </div>-->
                        <!--                                    </div>-->
                        <!--                                </a>-->
                        <!--                            </div>-->
                        <!--                        </div>-->
                        <!--                    @endforeach-->
                        <!--                </div>-->

                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    @endif-->
                        <!--@else-->
                        <!--    <p class="no_delivery_p">* Sorry Delivery Locations not available</p>-->
                        <!--    <p> For more information please call us at <i class="fa fa-phone"></i><a-->
                        <!--            href="tel:{{ $connects->phone_no }}" style = "color: F35901;">{{ $connects->phone_no }} </a></span> <br>-->
                        <!--        or email us at <i class="fa fa-envelope envelope"></i><a-->
                        <!--            href="mailto:{{ $connects->email }}"  style = "color: F35901;">{{ $connects->email }}</a>-->
                        <!--    </p>-->
                        <!--@endif-->

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
        $(document).ready(function() {

            $('#country').trigger('change');


            $('#country').on('change', function() {

                $('#store-state-inp').show();
                $('#store-city-inp').show();
                $('#store-zip-code-inp').show();

                var country = $('#country option:selected').val();
                $.ajax({
                    type: "GET",
                    url: "{{ route('select.state') }}",
                    data: {
                        country: country
                    },
                    success: function(data) {
                        $('#state').html(data);
                    },
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {

            $('#country').trigger('change');

            $('#country').on('change', function() {
                $('#store-state-inp').show();
                $('#store-city-inp').show();
                $('#store-zip-code-inp').show();

                var country = $('#country option:selected').val();

                $.ajax({
                    type: "GET",
                    url: "{{ route('select.state') }}",
                    data: {
                        country: country
                    },
                    success: function(data) {
                        $('#state').html(data);
                    },
                    error: function() {
                        console.log('Error fetching states');
                    }
                });
            });
        });
    </script>

@endsection
