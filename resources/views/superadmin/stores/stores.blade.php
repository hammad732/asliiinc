@extends('admin.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <h1 class="text-center text-dark"><b>List of delivery locations</b></h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                        <div class="card bg-info">
                            <div class="card-body">
                                <b>Total ({{count($stores)}}) delivery locations found</b>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                        <!-- add new stores Button trigger modal -->
                        <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#add-new-store-modal"><b>Add New delivery location</b></button>
                    </div>
                </div>
            </div><!-- /.container-fluid -->

            <!-- Default box -->
            <div class="card">
                <div class="card-body">
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
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="table table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>EDIT</th>
                                            <th>DELETE</th>
                                            <th>Delivery Days</th>
                                            <th>COUNTRY</th>
                                            <th>STATE</th>
                                            <th>CITY</th>
                                            <th>ZIP CODE</th>
                                            <th>PHONE NO</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($stores as $key=>$store)
                                        <tr>
                                            <td>{{$store->id}}</td>
                                            <td>
                                                <a href="{{$store->id}}" id="edit-btn" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit-btn-modal">Edit</a>
                                            </td>
                                            <td>
                                                <!-- delete Button trigger modal -->
                                                <a href="{{$store->id}}" type="button" class="btn btn-danger btn-sm del-btn" data-toggle="modal" data-target="#del-btn-modal">Delete</a>
                                            </td>
                                            <td>
                                            @if(count($store->devlivery_days) != 0)
                                            <button data-toggle="modal" class="btn btn-danger btn-sm del-btn" data-target="#delivery_btn_modal{{$store->id}}">Show</button>
                                             <!--Delevery days model-->
                                                <div class="modal fade" id="delivery_btn_modal{{$store->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Delivery Days</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                    @foreach($store->devlivery_days as $dayss)
                                                                
                                                                     @if($dayss->days != null)
                                                                     
                                                                        <p style="color:orangered;"><b>{{$dayss->days->days}}</b></p></br>
                                                                        @endif
                                                                    @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                            <p>Closed</p>
                                            @endif
                                            </td>
                                            <td>
                                                @foreach ($countries as $country)
                                                    @if ($store->country == $country->id)
                                                        {{$country->name}}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach ($states as $state)
                                                    @if ($store->state == $state->id)
                                                        {{$state->name}}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>{{$store->city}}</td>
                                            
                                            <td>{{$store->zip_code}}</td>
                                            <td>{{$store->phone_no}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@php
function get_otimes ($default = '00:00', $interval = '+60 minutes') {

    $output = '';

    $current = strtotime('00:00');
    $end = strtotime('23:59');
    
    $output .= '<option value="">-- Select --</option>';
    while ($current <= $end) 
    {
        $time = date('h:i A', $current);
        $sel = ($time == $default) ? ' selected' : '';

        $output .= "<option value=\"{$time}\"{$sel}>" . date('h:i A', $current) .'</option>';
        $current = strtotime($interval, $current);
    }

    return $output;
}
@endphp

@php
function get_ctimes ($default = '00:00', $interval = '+60 minutes') {

    $output = '';

    $current = strtotime('00:00');
    $end = strtotime('23:59');
    
    $output .= '<option value="">-- Select --</option>';
    while ($current <= $end) 
    {
        $time = date('h:i A', $current);
        $sel = ($time == $default) ? ' selected' : '';

        $output .= "<option value=\"{$time}\"{$sel}>" . date('h:i A', $current) .'</option>';
        $current = strtotime($interval, $current);
    }

    return $output;
}
@endphp

    <!-- Add new store Modal -->
    <div class="modal fade" id="add-new-store-modal" tabindex="-1" role="dialog" aria-labelledby="add-new-store-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add New Delivery Location</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form action="{{route('sa.store.save')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="oday" class="">{{ __('Delivery Days') }}</label>
                                <ul>
                                    @foreach($days as $day)
                                        <li style="list-style-type:none;"><input type="checkbox" value="{{$day->id}}" name="oday[]"> {{$day->days}}</li>
                                    @endforeach
                                   
                               </ul>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="country" class="">{{ __('Country') }}</label>
                                <select name="country" id="country-add-store" class="form-control" required>
                                   <option value="233" id="united_state">United States</option>
                                    @foreach($countries as $country)
                                
                                            <option value="{{ $country->id }}"  {{ $country->id == old('country') ? 'selected' : '' }}>
                                
                                            {{ $country->name }}
                                        </option>
                                    @endforeach
                                    <option value="">Select Country</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="state" class="">{{ __('State') }}</label>
                                <div class="state-div">
                                    <select name="state" id="state" class="form-control" required>
                                        <option value="">-- SELECT --</option>
                                    @foreach($states as $state)

                                            <option value="{{ $state->id }}" {{ $state->id == old('state') ? 'selected' : '' }}>
                                                {{ $state->name }}
                                            </option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="city" class="">{{ __('City') }}</label>
                                <input id="city" type="text" class="form-control" name="city" value="{{ old('city') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="zip_code" class="">{{ __('Zip Code') }}</label>
                                <input id="zip_code" type="text" class="form-control" name="zip_code" value="{{ old('zip_code') }}">
                            </div>
                            <div class="col-md-4">
                                <label for="phone_no" class="">{{ __('Phone #') }}</label>
                                <input id="phone_no" type="text" class="form-control" name="phone_no" value="{{ old('phone_no') }}">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success btn-sm">Add</button>
                            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Dismiss</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
    <!--edit store Modal -->
    <div class="modal fade" id="edit-btn-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Delivery Location ID No. <span id="store-id-show"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('sa.store.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="modal-body">
                        <div class="form-group row">
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="oday" class="">{{ __('Delivery Days') }}</label>
                                <div class="oday-div">                                
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <!--<div class="col-md-12">-->
                            <!--    <label for="address" class="">{{ __('Address') }}</label>-->
                            <!--    <input id="address-edit-id" type="text" class="form-control" name="address" value="{{ old('address') }}">-->
                            <!--</div>-->
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="country" class="">{{ __('Country') }}</label>
                                <div class="country-div">

                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="state" class="">{{ __('State') }}</label>
                                <div class="state-div">

                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="city" class="">{{ __('City') }}</label>
                                <input id="city-edit-id" type="text" class="form-control" name="city" value="{{ old('city') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="zip_code" class="">{{ __('Zip Code') }}</label>
                                <input id="zipcode-edit-id" type="text" class="form-control" name="zip_code" value="{{ old('zip_code') }}">
                            </div>
                            <div class="col-md-4">
                                <label for="phone_no" class="">{{ __('Phone #') }}</label>
                                <input id="phoneno-edit-id" type="text" class="form-control" name="phone_no" value="{{ old('phone_no') }}">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" id="profile-id-id" value="">
                        <button type="submit" class="btn btn-success btn-sm">Update</button>
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--block store Modal -->
    <div class="modal fade" id="del-btn-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p style="color:red"><b>Delete ID No. <span id="store-id-show-del"></span> ?</b></p>
                </div>
                <div class="modal-footer">
                    <form action="{{route('sa.store.delete')}}" method="get">
                        @csrf
                        <input type="hidden" name="id" id="store-id-block" value="">
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endsection

{{-- Jquery CDN --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function ()
    { 
        
          var country = $('#united_state').val();
        $.ajax({
            type: "GET",
            url: "{{route('select.state')}}",
            data: {country: country},
            success: function (data) {
                // console.log(data);
                $('#state').html(data);
            },
        });
        
        $('#country-add-store').on('change', function () {
            var country = $('#country-add-store option:selected').val();
            $.ajax({
                type: "GET",
                url: "{{route('select.state.user.edit')}}",
                data: {country: country},
                success: function (data) {
                    console.log(data);
                    $('.state-div').html(data.state_drop);
                },
            });
        });

        // $('#country-id').on('change', function ()
        $('BODY').on('change','#country-id',function ()
        {
            var country = $(this).val();
            $.ajax({
                type: "GET",
                url: "{{route('select.state.user.edit')}}",
                data: {country: country},
                success: function (data) {
                    console.log(data);
                    $('.state-div').html(data.state_drop);
                },
            });
        });

        $('#example1').on('click','#edit-btn',function ()
        {
            // id = $('#store-id').val();
            var id = $(this).attr('href');
            $.ajax({
                url: "{{route('sa.get.edit.store.data')}}",
                type:"get",
                data:
                {
                    id:id,
                },
                success:function(data)
                {
                   // console.log(data)
                    $('#profile-id-id').val(data.store.id);
                    // $('#name-edit-id').val(data.store.name);
                    // $('#url-edit-id').val(data.store.url);
                    $('#city-edit-id').val(data.store.city);
                    // $('#address-edit-id').val(data.store.address);
                    $('#zipcode-edit-id').val(data.store.zip_code);
                    $('#phoneno-edit-id').val(data.store.phone_no);
                    $('.country-div').html(data.country_drop);
                    $('.state-div').html(data.state_drop);
                    
                    $('.oday-div').html(data.oday_drop);
                    // $('.cday-div').html(data.cday_drop);
                    // $('.otime-div').html(data.otime_drop);
                    // $('.ctime-div').html(data.ctime_drop);
                    // location.reload();
                },
            });
        });

        $('#example1').on('click','.del-btn',function ()
        {
            var id = $(this).attr('href');
            $('#store-id-block').val(id);
            $('#store-id-show-del').html(id);
        });
        $('#example1').on('click','.undel-btn',function ()
        {
            var id = $(this).attr('href');

            $('#store-id-unblock').val(id);
            $('#store-id-show-undel').html(id);
        });
        $('#example1').on('click','#edit-btn',function ()
        {
            var id = $(this).attr('href');
            $('#store-id-show').html(id);
        });

    }); // end of doc ready
</script>
