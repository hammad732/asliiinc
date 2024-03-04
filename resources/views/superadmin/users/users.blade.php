@extends('admin.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <h1 class="text-center text-dark"><b>List of Users</b></h1>
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
                                <b>Total ({{count($users)}}) users found</b>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                        <!-- add new users Button trigger modal -->
                        <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#add-new-user-modal"><b>Add New user</b></button>
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
                              <div class="table-responsive">
                                <table id="example11" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>EDIT</th>
                                            <th>BLOCK</th>
                                            <th>ROLE</th>
                                            <th>NAME</th>
                                            <th>EMAIL</th>
                                            <th>PASSWORD</th>
                                            <th>PHONE</th>
                                            <th>COMPANY</th>
                                            <th>COUNTRY</th>
                                            <th>STATE</th>
                                            <th>CITY</th>
                                            <th>ADDRESS</th>
                                            <th>ZIP CODE</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($users as $user)
                                            @php
                                                $roleName = $user->getRoleNames();
                                                $countries = App\Country::all();
                                                $states = App\State::all();
                                            @endphp
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>
                                                <a href="{{$user->id}}" id="edit-btn" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit-btn-modal">Edit</a>
                                            </td>
                                            <td>
                                                <!--@hasrole('Super Admin')-->
                                                    @if ($roleName[0] != 'Super Admin')
                                                        <!-- block Button trigger modal -->
                                                        @if ($user->status == 1)
                                                            <a href="{{$user->id}}" type="button" class="btn btn-danger btn-sm del-btn" data-toggle="modal" data-target="#del-btn-modal">Block</a>
                                                        @else
                                                            <a href="{{$user->id}}" type="button" class="btn btn-success btn-sm undel-btn" data-toggle="modal" data-target="#undel-btn-modal">Unblock</a>
                                                        @endif
                                                    @else
                                                        Unable to Block Super Admin
                                                    @endif
                                                <!--@endrole-->
                                            </td>
                                            <td>
                                                
                                          @if($roleName[0] == 'Retailer' )
                                            User
                                            @else
                                            {{$roleName[0]}}
                                            @endif 
                                            </td>
                                            <td>{{$user->fname}} {{$user->lname}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->decrypt}}</td>
                                            <td>{{$user->phone_no}}</td>
                                            <td>{{$user->company}}</td>
                                            <td>
                                                @foreach ($countries as $country)
                                                    @if ($user->country == $country->id)
                                                        {{$country->name}}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach ($states as $state)
                                                    @if ($user->state == $state->id)
                                                        {{$state->name}}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>{{$user->city}}</td>
                                            <td>{{$user->address}}</td>
                                            <td>{{$user->zip_code}}</td>
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

    <!-- Add new user Modal -->
    <div class="modal fade" id="add-new-user-modal" tabindex="-1" role="dialog" aria-labelledby="add-new-user-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add New user Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form action="{{route('sa.user.save')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>
                            <div class="col-md-6">
                                <select name="country" id="country-add-user" class="form-control" autofocus>
                                   <option value="233" id="united_state_state">United States</option>
                                    @foreach($countries as $country)

                                            <option value="{{ $country->id }}"  {{ $country->id == old('country') ? 'selected' : '' }}>

                                            {{ $country->name }}
                                        </option>
                                    @endforeach
                                    <option value="">Select Country</option>
                                </select>

                                @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="company" class="col-md-4 col-form-label text-md-right">{{ __('Company Name(Optional)') }}</label>

                            <div class="col-md-6">
                                <input id="company" type="text" class="form-control @error('company') is-invalid @enderror" name="company" value="{{ old('company') }}" autocomplete="company" autofocus>

                                @error('company')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fname" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="fname" type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname') }}" required autocomplete="fname" autofocus>

                                @error('fname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lname" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}" required autocomplete="lname" autofocus>

                                @error('lname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Street Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus>

                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="State" class="col-md-4 col-form-label text-md-right">{{ __('State') }}</label>

                            <div class="col-md-6">
                                <select name="state" id="state" class="form-control" required>
                                    <option value="">-- SELECT --</option>
                                @foreach($states as $state)

                                        <option value="{{ $state->id }}" {{ $state->id == old('state') ? 'selected' : '' }}>
                                            {{ $state->name }}
                                        </option>
                                @endforeach
                            </select>

                                @error('state')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="zip_code" class="col-md-4 col-form-label text-md-right">{{ __('Zip Code') }}</label>

                            <div class="col-md-6">
                                <input id="zip_code" type="text" class="form-control @error('zip_code') is-invalid @enderror" name="zip_code" value="{{ old('zip_code') }}" required autocomplete="zip_code" autofocus>

                                @error('zip_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone_no" class="col-md-4 col-form-label text-md-right">{{ __('Phone No') }}</label>

                            <div class="col-md-6">
                                <input class="form-control phone" type="text" name="phone_no"  value="{{ old('phone_no') }}" required autocomplete="phone_no" autofocus/>
                                @error('phone_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="userrole" class="col-md-4 col-form-label text-md-right">{{ __('User Type') }}</label>
                            <div class="col-md-6">
                                <select name="userrole" id="userrole" class="form-control" required>
                                    <option value="">Select Role</option>
                                    <option value="Super Admin">Super Admin</option>
                                    <option value="Admin">Admin</option>
                                   
                                    <option value="Retailer">User</option>
                                </select>

                                @error('userrole')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
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


    <!--edit user Modal -->
    <div class="modal fade" id="edit-btn-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit user ID No. <span id="user-id-show"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('sa.user.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <label class="mt-1" for="name">First Name:</label>
                                <input type="text" class="form-control" name="fname" id="f-name-id" value="" required>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <label class="mt-1" for="name">Last Name:</label>
                                <input type="text" class="form-control" name="lname" id="l-name-id" value="" required>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <label class="mt-1" for="name">Company Name(Optional):</label>
                                <input type="text" class="form-control" name="company" id="company-id" value="" >
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <label class="mt-1" for="name">Country:</label>
                                <div class="country-div">

                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <label class="mt-1" for="name">State:</label>
                                <div class="state-div">

                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <label class="mt-1" for="name">City:</label>
                                <input type="text" class="form-control" name="city" id="city-id" value="" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                <label class="mt-1" for="name">Address:</label>
                                <input type="text" class="form-control" name="address" id="address-id" value="" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <label class="mt-1" for="name">Email:</label>
                                <input type="text" class="form-control" name="email" id="email-edit-id" value="" required>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <label class="mt-1" for="name">Password:</label>
                                <input type="text" class="form-control" name="decrypt" id="password-id" value="" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <label class="mt-1" for="name">Current Role:</label>
                                <input type="text" class="form-control" name="current_role" id="current-role" value="{{$roleName[0]}}" readonly>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <label class="mt-1" for="name">Assign New Role:</label>
                                <select name="userrole" class="form-control" id="">
                                    <option value="">-- NONE --</option>
                                    <option value="Super Admin">Super Admin</option>
                                    <option value="Admin">Admin</option>
                                <!--    <option value="Distributor">Distributor</option> -->
                                    <option value="Retailer">User</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <label class="mt-1" for="name">Zip Code:</label>
                                <input type="text" class="form-control" name="zip_code" id="zip-id" value="" required>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <label class="mt-1" for="name">Phone #:</label>
                                <input type="text" class="form-control" name="phone_no" id="phone-id" value="" required>
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

    <!--block user Modal -->
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
                    <p style="color:red"><b>Blocking ID No. <span id="user-id-show-del"></span> ?</b></p>
                </div>
                <div class="modal-footer">
                    <form action="{{route('sa.user.block')}}" method="get">
                        @csrf
                        <input type="hidden" name="id" id="user-id-block" value="">
                        <button type="submit" class="btn btn-danger btn-sm">Block</button>
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--UNblock user Modal -->
    <div class="modal fade" id="undel-btn-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p style="color:green"><b>Unblocking ID No. <span id="user-id-show-undel"></span> ?</b></p>
                </div>
                <div class="modal-footer">
                    <form action="{{route('sa.user.block')}}" method="get">
                        @csrf
                        <input type="hidden" name="id" id="user-id-unblock" value="">
                        <button type="submit" class="btn btn-success btn-sm">Unblock</button>
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endsection

{{-- Jquery CDN --}}
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->

@section('script')
<script type="text/javascript">
    $(document).ready(function ()
    {
      //by defualt for state selection for us 
       var country = $('#united_state_state').val();
                $.ajax({
                    type: "GET",
                    url: "{{route('select.state')}}",
                    data: {country: country},
                    success: function (data) {
                        console.log(data);
                        $('#state').html(data);
                    },
                });
        
        
        $('#country-add-user').on('change', function () {
                var country = $('#country-add-user option:selected').val();
                $.ajax({
                    type: "GET",
                    url: "{{route('select.state')}}",
                    data: {country: country},
                    success: function (data) {
                        console.log(data);
                        $('#state').html(data);
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
                        // console.log(data);
                        $('.state-div').html(data.state_drop);
                    },
                });
            });
// 
         $('#example11').DataTable({
                dom: 'Bfrtip',
               buttons: [
                    {
            extend: 'csv',
            text: 'Save as csv',
             className: 'btn btn-primary text-white',
            exportOptions: {
                modifier: {
                    page: 'current'
                          }
                           }
                    }, 
                       {
            extend: 'excel',
            text: 'Save as excel',
             className: 'btn btn-primary text-white',
            exportOptions: {
                modifier: {
                    page: 'current'
                          }
                           }
                    }, 
                         {
            extend: 'print',
            text: 'Save as pdf',
           className: 'btn btn-primary text-white',
            exportOptions: {
                modifier: {
                    page: 'current'
                          }
                           }
                    }, 
                    
                 ]
            });
// 
        $('#example11').on('click','#edit-btn',function ()
        {
         
            // id = $('#user-id').val();
            var id = $(this).attr('href');
            $.ajax({
                url: "{{route('sa.get.edit.user.data')}}",
                type:"get",
                data:
                {
                    id:id,
                },
                success:function(data)
                {
                    // console.log(data.country_drop);
                    $('#profile-id-id').val(data.user.id);
                    $('#f-name-id').val(data.user.fname);
                    $('#l-name-id').val(data.user.lname);
                    $('#email-edit-id').val(data.user.email);
                    $('#company-id').val(data.user.company);
                    $('#city-id').val(data.user.city);
                    $('#state-id').val(data.user.state);
                    $('#address-id').val(data.user.address);
                    $('#zip-id').val(data.user.zip_code);
                    $('#phone-id').val(data.user.phone_no);
                    $('#email-id').val(data.user.email);
                    $('#password-id').val(data.user.decrypt);
                    $('#current-role').val(data.role);
                    $('.country-div').html(data.country_drop);
                    $('.state-div').html(data.state_drop);
                    // location.reload();
                },
            });
        });

        $('#example11').on('click','.del-btn',function ()
        {
            var id = $(this).attr('href');
            $('#user-id-block').val(id);
            $('#user-id-show-del').html(id);
        });
        $('#example11').on('click','.undel-btn',function ()
        {
            var id = $(this).attr('href');

            $('#user-id-unblock').val(id);
            $('#user-id-show-undel').html(id);
        });
        $('#example11').on('click','#edit-btn',function ()
        {
            var id = $(this).attr('href');
            $('#user-id-show').html(id);
        });

    }); // end of doc ready
</script>
@endsection