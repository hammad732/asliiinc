@extends('admin.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <h1 class="text-center text-dark"><b>List of Jobs</b></h1>
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
                                <b>Total ({{count($jobs)}}) Jobs found</b>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                        <!-- add new jobs Button trigger modal -->
                        <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#add-new-job-modal"><b>Add New Job </b></button>
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
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="table table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>ACTION</th>
                                            <th>NAME</th>
                                            <th>TYPE</th>
                                            <th>CITY</th>
                                            <th>STATE</th>
                                            <th>COUNTRY</th>
                                            <th>ZIP_CODE</th>
                                            <th>SALARY per HOUR</th>
                                            <th>DESCRIPTION</th>
                                            <th>QUALIFICATION</th>
                                            <th>PHYSICAL REQUIREMENT</th>
                                        </tr>
                                    </thead>
                                    {{-- {{dd($jobs)}} --}}
                                    <tbody>
                                        @foreach ($jobs as $job)
                                        <tr>
                                            <td>{{$job->id}}</td>
                                            <td>
                                                <a href="{{$job->id}}" id="edit-btn" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit-btn-modal">Edit</a>
                                                <a href="{{$job->id}}" type="button" class="btn btn-danger btn-sm del-btn mt-1" data-toggle="modal" data-target="#del-btn-modal">Delete</a>
                                            </td>
                                            <td>{{$job->name}}</td>
                                            <td>{{$job->type}}</td>
                                            <td>{{$job->city}}</td>
                                            <td>
                                                @php
                                                    $countries = App\Country::all();
                                                    $states = App\State::all();
                                                @endphp
                                                @foreach ($states as $state)
                                                    @if ($state->id == $job->state)
                                                        {{$state->name}}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach ($countries as $country)
                                                    @if ($country->id == $job->country)
                                                        {{$country->name}}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>{{$job->zip_code}}</td>
                                            <td>${{$job->salary}}</td>
                                            <td>{{$job->desc}}</td>
                                            <td>{{$job->qualification}}</td>
                                            <td>{{$job->physical}}</td>
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

    <!-- Add new job Modal -->
    <div class="modal fade" id="add-new-job-modal" tabindex="-1" role="dialog" aria-labelledby="add-new-job-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add New Job</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form action="{{route('sa.job.save')}}" method="post" enctype="multipart/form-data">
                        @csrf


                        <div class="row mb-2">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <label class="mt-1" for="Country">Country</label>
                                <select name="country" id="countryjob" class="form-control">
                                   <option value="233" id="united_state">United States</option>
                                    @foreach($countries as $country)
                                            <option value="{{ $country->id }}"  {{ $country->id == old('country') ? 'selected' : '' }}>
                                            {{ $country->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <label class="mt-1" for="Type">State</label>
                                <select name="state" id="statejob" class="form-control state" required>
                                    <option value="">-- SELECT --</option>
                                    @foreach($states as $state)
                                        <option value="{{ $state->id }}" {{ $state->id == old('state') ? 'selected' : '' }}>
                                            {{ $state->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <label class="mt-1" for="City">City</label>
                                <input type="text" class="form-control" name="city" id="" value="{{old('city')}}" required>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <label class="mt-1" for="Type">Zip Code</label>
                                <input type="text" class="form-control" name="zip_code" id="" value="{{old('zip_code')}}">
                            </div>
                        </div>
                        
                        <div class="row mb-2">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <label class="mt-1" for="name">Job Name</label>
                                <input type="text" class="form-control" name="name" id="" value="{{old('name')}}" required>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <label class="mt-1" for="Type">Job Type</label>
                                <select name="type" class="form-control" required>
                                    <option value="">-- SELECT --</option>
                                    <option value="Part Time">Part Time</option>
                                    <option value="Full Time">Full Time</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row mb-2">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                <label class="mt-1" for="Description">Description</label>
                                <textarea type="text" class="form-control" name="desc" id="" value="{{old('desc')}}" ></textarea>
                            </div>
                        </div>
                        
                        <div class="row mb-2">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <label class="mt-1" for="Salary">Salary Per Hour</label>
                                <input type="text" class="form-control" name="salary" id="" value="{{old('salary')}}" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <label class="mt-1" for="Qualification">Qualification</label>
                                <input type="text" class="form-control" name="qualification" id="" value="{{old('qualification')}}" >
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <label class="mt-1" for="Physical Requirement">Physical Requirement</label>
                                <input type="text" class="form-control" name="physical" id="" value="{{old('physical')}}" >
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

    <!--edit job Modal -->
    <div class="modal fade" id="edit-btn-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Job  </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('sa.job.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="modal-body">

                        <div class="row mb-2">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <label class="mt-1" for="name">Job Name</label>
                                <input type="text" class="form-control" name="name" id="name-edit" value="{{old('name')}}" required>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <label class="mt-1" for="Type">Job Type</label>
                                <div class="type-edit"></div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <label class="mt-1" for="Country">Country</label>
                                <div class="country-div"></div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <label class="mt-1" for="Type">State</label>
                                <div class="state-div"></div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <label class="mt-1" for="City">City</label>
                                <input type="text" class="form-control" name="city" id="city-edit2" value="{{old('city')}}" required>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <label class="mt-1" for="Type">Zip Code</label>
                                <input type="text" class="form-control" name="zip_code" id="zip_code-edit" value="{{old('zip_code')}}" >
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <label class="mt-1" for="Salary">Salary Per Hour</label>
                                <input type="text" class="form-control" name="salary" id="salary-edit" value="{{old('salary')}}" required>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <label class="mt-1" for="Qualification">Qualification</label>
                                <input type="text" class="form-control" name="qualification" id="qualification-edit" value="{{old('qualification')}}" >
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <label class="mt-1" for="Physical Requirement">Physical Requirement</label>
                                <input type="text" class="form-control" name="physical" id="physical-edit" value="{{old('physical')}}" >
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                <label class="mt-1" for="Description">Description</label>
                                <textarea type="text" class="form-control" name="desc" id="desc-edit" value="{{old('desc')}}" ></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" id="id-edit" value="">
                        <button type="submit" class="btn btn-success btn-sm">Update</button>
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--delete job Modal -->
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
                    <p style="color:red"><b>Deleting Job ID = <span id="job-id-show-del"></span> ?</b></p>
                </div>
                <div class="modal-footer">
                    <form action="{{route('sa.job.delete')}}" method="get">
                        @csrf
                        <input type="hidden" name="id" id="job-id" value="">
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
        
         //by defualt for state selection for us 
       var country = $('#united_state').val();
                $.ajax({
                    type: "GET",
                    url: "{{route('select.state')}}",
                    data: {country: country},
                    success: function (data) {
                        console.log(data);
                        $('.state').html(data);
                    },
                });
         //end default for state selection for united state
        $('BODY').on('change', '#countryjob',function () {
        var country = $('#countryjob option:selected').val();
        $.ajax({
            type: "GET",
            url: "{{route('select.state')}}",
            data: {country: country},
            success: function (data) {
                // console.log(data);
                $('#statejob').html(data);
            },
        });
        });

        $('BODY').on('change', '#countryjob-edit',function () {
        var country = $('#countryjob-edit option:selected').val();
        $.ajax({
            type: "GET",
            url: "{{route('select.state')}}",
            data: {country: country},
            success: function (data) {
                // console.log(data);
                $('#statejob-edit').html(data);
            },
        });
        });

        $('#example1').on('click','#edit-btn',function ()
        {
            // id = $('#job-id').val();
            var id = $(this).attr('href');
            $.ajax({
                url: "{{route('sa.get.edit.job.data')}}",
                type:"get",
                data:
                {
                    id:id,
                },
                success:function(data)
                {
                    console.log(data);
                    $('#id-edit').val(data.job.id);
                    $('#name-edit').val(data.job.name);
                    $('#email-edit2').val(data.job.email);
                    $('#city-edit2').val(data.job.city);
                    $('#country-edit').val(data.job.country);
                    $('#state-edit').val(data.job.state);
                    $('#salary-edit').val(data.job.salary);
                    $('#desc-edit').val(data.job.desc);
                    $('#zip_code-edit').val(data.job.zip_code);
                    $('#duty-edit').val(data.job.duty);
                    $('#qualification-edit').val(data.job.qualification);
                    $('#physical-edit').val(data.job.physical);

                    $('.type-edit').html(data.type_drop);
                    $('.country-div').html(data.country_drop);
                    $('.state-div').html(data.state_drop);
                    // location.reload();
                },
            });
        });

        $('#example1').on('click','.del-btn',function ()
        {
            var id = $(this).attr('href');
            $('#job-id').val(id);
            $('#job-id-show-del').html(id);
        });
        $('#example1').on('click','#edit-btn',function ()
        {
            var id = $(this).attr('href');
            $('#job-id-show').html(id);
        });

    }); // end of doc ready
</script>
