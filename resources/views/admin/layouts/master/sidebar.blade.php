<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{asset('images/logo.png')}}" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><strong>ASLII MALL</strong></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-1 pb-1 mb-1 d-flex">
            <div class="image">
                <img src="{{asset('images/admin_icon.png')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item"><a href="#" class="d-block">
                        {{Auth::user()->fname}} {{Auth::user()->lname}}
                    </a></li>
                </ul>
            </div>
        </div>

        <div class="user-panel mt-1 pb-1 mb-1 d-flex">
            <div class="info">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="#" type="button" id="edit-profile-btn" class="" class="d-block" data-toggle="modal" data-target="#profile-btn-modal"><i class="nav-icon far fa-id-card"></i>
                            My Profile
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               @hasrole('Super Admin')
               <li class=" nav-item">
                    <a href="{{route('sa.dashboard')}}" class="{{ Request::is('sa/dashboard') ? 'active' : '' }} nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class=" nav-item">
                    <a href="{{route('sa.users.view')}}" class="{{ Request::is('sa/users-view') ? 'active' : '' }} nav-link">
                        <i class="nav-icon fas fa-user-alt"></i>
                        <p>All Users <span style="font-size:16px" class="right badge badge-primary">{{App\User::all()->count()}}</span></p>
                    </a>
                </li>

                <li class=" nav-item">
                    <a href="{{route('sa.stores.view')}}" class="{{ Request::is('sa/stores-view') ? 'active' : '' }} nav-link">
                        <i class="nav-icon fas fa-store-alt"></i>
                        <p>Delivery Locations <span style="font-size:16px" class="right badge badge-primary">{{App\Models\Store::all()->count()}}</span></p>
                    </a>
                </li>

                <li class=" nav-item">
                    <a href="{{route('sa.jobs.view')}}" class="{{ Request::is('sa/jobs-view') ? 'active' : '' }} nav-link">
                        <i class="nav-icon fas fa-user-alt"></i>
                        <p>All Jobs <span style="font-size:16px" class="right badge badge-primary">{{App\Models\Job::all()->count()}}</span></p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('sa.r.orders')}}" class="{{ Request::is('sa/r/orders') ? 'active' : '' }} nav-link">
                        <i class="fa fa-book nav-icon"></i>
                        <p>All Orders<span style="font-size:16px" class="right badge badge-primary"></span></p>
                    </a>
                </li>

                <li class="nav-item">
                <a href="{{route('sa.rproducts.view')}}" class="{{ Request::is('sa/rproducts-view') ? 'active' : '' }} nav-link">
                    <i class="nav-icon fas fa-fish"></i>
                    {{-- <i class="nav-icon far fa-circle text-info"></i> --}}
                    <p>All Products <span style="font-size:16px" class="right badge badge-primary"></span></p>
                </a>
              </li>

                <li class="nav-item">
                    <a href="{{route('sa.categories.view')}}" class="{{ Request::is('sa/categories-view') ? 'active' : '' }} nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        {{-- <i class="nav-icon far fa-circle text-info"></i> --}}
                        <p>Categories / Sub-Categories<span style="font-size:16px" class="right badge badge-primary"></span></p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{route('sa.add.product.form')}}" class="{{ Request::is('sa/add/product') ? 'active' : '' }} nav-link">
                        <i class="nav-icon fas fa-fish"></i>
                        {{-- <i class="nav-icon far fa-circle text-info"></i> --}}
                        <p>Add New Product <span style="font-size:16px" class="right badge badge-primary"></span></p>
                    </a>
                 </li>

                 <li class="nav-item">
                    <a href="{{route('sa.show.service')}}" class="{{ Request::is('sa/add/service') ? 'active' : '' }} nav-link">
                        <i class="nav-icon fas fa-fish"></i>
                        {{-- <i class="nav-icon far fa-circle text-info"></i> --}}
                        <p>Service Page<span style="font-size:16px" class="right badge badge-primary"></span></p>
                    </a>
                 </li>

                 <li class="nav-item">
                    <a href="{{route('sa.aboutus')}}" class="{{ Request::is('sa/aboutus') ? 'active' : '' }} nav-link">
                        <i class="nav-icon fas fa-store-alt"></i>
                        {{-- <i class="nav-icon far fa-circle text-info"></i> --}}
                        <p>About Us<span style="font-size:16px" class="right badge badge-primary"></span></p>
                    </a>
                 </li>
                 
                 
                <li class="nav-item">
                    <a href="{{route('sa.add.site.number')}}" class="{{ Request::is('sa/add/site/number') ? 'active' : '' }} nav-link">
                        <i class="nav-icon fas fa-phone"></i>
                        {{-- <i class="nav-icon far fa-circle text-info"></i> --}}
                        <p>Add Support Number <span style="font-size:16px" class="right badge badge-primary"></span></p>
                    </a>
                 </li>

                <!--<li class="nav-item">-->
                <!--    <a href="{{route('sa.r.orders')}}" class="{{ Request::is('sa/r/orders') ? 'active' : '' }} nav-link">-->
                <!--        <i class="fa fa-book nav-icon"></i>-->
                <!--        <p>All Orders<span style="font-size:16px" class="right badge badge-primary"></span></p>-->
                <!--    </a>-->
                <!--</li>-->
                <!--<li class="nav-item">-->
                <!--    <a href="{{route('sa.d.orders')}}" class="{{ Request::is('sa/d/orders') ? 'active' : '' }} nav-link">-->
                <!--        <i class="far fa-circle nav-icon"></i>-->
                <!--        <p>Distributor Orders<span style="font-size:16px" class="right badge badge-primary">{{App\Models\Distributororder::all()->count()}}</span></p>-->
                <!--    </a>-->
                <!--</li>-->

                <li class=" nav-item">
                    <a href="{{route('sa.connect')}}" class="{{ Request::is('sa/connect') ? 'active' : '' }} nav-link">
                        <i class="nav-icon fas fa-user-alt"></i>
                        <p>Connect Info <span style="font-size:16px" class="right badge badge-primary"></span></p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('sa.marquees.view')}}" class="{{ Request::is('marquees-view') ? 'active' : '' }} nav-link">
                        <i class="nav-icon fas fa-image"></i>
                        {{-- <i class="nav-icon far fa-circle text-info"></i> --}}
                        <p>Marquee Images <span style="font-size:16px" class="right badge badge-primary">{{App\Models\Marquee::all()->count()}}</span></p>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-power-off text-danger"></i>
                        <p>Logout</p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                @endhasrole

                @hasrole('Admin')
               <li class=" nav-item">
                    <a href="{{route('sa.dashboard')}}" class="{{ Request::is('sa/dashboard') ? 'active' : '' }} nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class=" nav-item">
                    <a href="{{route('sa.users.view')}}" class="{{ Request::is('sa/users-view') ? 'active' : '' }} nav-link">
                        <i class="nav-icon fas fa-user-alt"></i>
                        <p>All Users <span style="font-size:16px" class="right badge badge-primary">{{App\User::all()->count()}}</span></p>
                    </a>
                </li>

                <li class=" nav-item">
                    <a href="{{route('sa.stores.view')}}" class="{{ Request::is('sa/stores-view') ? 'active' : '' }} nav-link">
                        <i class="nav-icon fas fa-store-alt"></i>
                        <p>Delivery Locations <span style="font-size:16px" class="right badge badge-primary">{{App\Models\Store::all()->count()}}</span></p>
                    </a>
                </li>

                <li class=" nav-item">
                    <a href="{{route('sa.jobs.view')}}" class="{{ Request::is('sa/jobs-view') ? 'active' : '' }} nav-link">
                        <i class="nav-icon fas fa-user-alt"></i>
                        <p>All Jobs <span style="font-size:16px" class="right badge badge-primary">{{App\Models\Job::all()->count()}}</span></p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('sa.r.orders')}}" class="{{ Request::is('sa/r/orders') ? 'active' : '' }} nav-link">
                        <i class="fa fa-book nav-icon"></i>
                        <p>All Orders<span style="font-size:16px" class="right badge badge-primary"></span></p>
                    </a>
                </li>

                <li class="nav-item">
                <a href="{{route('sa.rproducts.view')}}" class="{{ Request::is('sa/rproducts-view') ? 'active' : '' }} nav-link">
                    <i class="nav-icon fas fa-fish"></i>
                    {{-- <i class="nav-icon far fa-circle text-info"></i> --}}
                    <p>All Products <span style="font-size:16px" class="right badge badge-primary"></span></p>
                </a>
              </li>

                <li class="nav-item">
                    <a href="{{route('sa.categories.view')}}" class="{{ Request::is('sa/categories-view') ? 'active' : '' }} nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        {{-- <i class="nav-icon far fa-circle text-info"></i> --}}
                        <p>Categories / Sub-Categories<span style="font-size:16px" class="right badge badge-primary"></span></p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{route('sa.add.product.form')}}" class="{{ Request::is('sa/add/product') ? 'active' : '' }} nav-link">
                        <i class="nav-icon fas fa-fish"></i>
                        {{-- <i class="nav-icon far fa-circle text-info"></i> --}}
                        <p>Add New Product <span style="font-size:16px" class="right badge badge-primary"></span></p>
                    </a>
                 </li>

                <!--<li class="nav-item">-->
                <!--    <a href="{{route('sa.r.orders')}}" class="{{ Request::is('sa/r/orders') ? 'active' : '' }} nav-link">-->
                <!--        <i class="fa fa-book nav-icon"></i>-->
                <!--        <p>All Orders<span style="font-size:16px" class="right badge badge-primary"></span></p>-->
                <!--    </a>-->
                <!--</li>-->
                <!--<li class="nav-item">-->
                <!--    <a href="{{route('sa.d.orders')}}" class="{{ Request::is('sa/d/orders') ? 'active' : '' }} nav-link">-->
                <!--        <i class="far fa-circle nav-icon"></i>-->
                <!--        <p>Distributor Orders<span style="font-size:16px" class="right badge badge-primary">{{App\Models\Distributororder::all()->count()}}</span></p>-->
                <!--    </a>-->
                <!--</li>-->

                <li class=" nav-item">
                    <a href="{{route('sa.connect')}}" class="{{ Request::is('sa/connect') ? 'active' : '' }} nav-link">
                        <i class="nav-icon fas fa-user-alt"></i>
                        <p>Connect Info <span style="font-size:16px" class="right badge badge-primary"></span></p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('sa.marquees.view')}}" class="{{ Request::is('marquees-view') ? 'active' : '' }} nav-link">
                        <i class="nav-icon fas fa-image"></i>
                        {{-- <i class="nav-icon far fa-circle text-info"></i> --}}
                        <p>Marquee Images <span style="font-size:16px" class="right badge badge-primary">{{App\Models\Marquee::all()->count()}}</span></p>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-power-off text-danger"></i>
                        <p>Logout</p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                @endhasrole

                @hasrole('Distributor')
                <li class=" nav-item">
                    <a href="{{route('d.dashboard')}}" class="{{ Request::is('d/dashboard') ? 'active' : '' }} nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('d.orders')}}" class="{{ Request::is('d/orders') ? 'active' : '' }} nav-link">
                        <i class="nav-icon fas fa-image"></i>
                        <p>Orders<span style="font-size:16px" class="right badge badge-primary">{{App\Models\Distributororder::where('user_id', Auth::user()->id)->count()}}</span></p>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-power-off text-danger"></i>
                        <p>Logout</p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                @endhasrole

                @hasrole('Retailer')
                <li class=" nav-item">
                    <a href="{{route('r.dashboard')}}" class="{{ Request::is('r/dashboard') ? 'active' : '' }} nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('r.orders')}}" class="{{ Request::is('r/orders') ? 'active' : '' }} nav-link">
                        <i class="nav-icon fas fa-image"></i>
                        <p>Orders<span style="font-size:16px" class="right badge badge-primary">{{App\Models\Retailerorder::where('user_id', Auth::user()->id)->count()}}</span></p>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-power-off text-danger"></i>
                        <p>Logout</p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                @endhasrole
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

    <!--profile Modal -->
    <div class="modal fade" id="profile-btn-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('profile.update')}}" method="post">
                @csrf
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <label class="mt-1" for="name">First Name:</label>
                                <input type="text" class="form-control" name="fname" id="f-name" value="" required>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <label class="mt-1" for="name">Last Name:</label>
                                <input type="text" class="form-control" name="lname" id="l-name" value="" required>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <label class="mt-1" for="name">Company Name:</label>
                                <input type="text" class="form-control" name="company" id="company-edit" value="" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                @php
                                    $user = Auth::user();
                                    $countries = App\Country::all();
                                    $country_code= $user->country;
                               
                                    $states = App\State::where('country_id', $country_code)->get();
                                @endphp
                                <label class="mt-1" for="name">Country:</label>
                                <select name="country" id="country" class="form-control">
                                    <option value="">-- SELECT --</option>
                                        @foreach($countries as $country)
                                        @php
                                            $select = old('country', $user->country) == $country->id ? 'selected' : '';
                                        @endphp
                                        <option value="{{ $country->id ?? old('country')}}" {{ $select }}>
                                            {{ $country->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <label class="mt-1" for="name">State:</label>
                                <select name="state" id="states" class="form-control">
                                    <option value="">-- SELECT --</option>
                                        @foreach($states as $state)
                                        @php
                                            $select = old('state', $user->state) == $state->id ? 'selected' : '';
                                        @endphp
                                        <option value="{{ $state->id ?? old('state')}}" {{ $select }}>
                                            {{ $state->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <label class="mt-1" for="name">City:</label>
                                <input type="text" class="form-control" name="city" id="city-edit" value="" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                <label class="mt-1" for="name">Address:</label>
                                <input type="text" class="form-control" name="address" id="address-edit" value="" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <label class="mt-1" for="name">Email:</label>
                                <input type="text" class="form-control" name="email" id="email-edit" value="" required>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <label class="mt-1" for="name">Password:</label>
                                <input type="text" class="form-control" name="decrypt" id="password-edit" value="" required>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                @php
                                    $user = Auth::user();
                                    $roleName = $user->getRoleNames();
                                @endphp
                                <label class="mt-1" for="name">Current Role:</label>
                                @if($roleName[0] == 'Retailer')
                                 <input type="text" class="form-control" name="current_role" id="" value="User" readonly> 
                                 @else
                                <input type="text" class="form-control" name="current_role" id="" value="{{$roleName[0]}}" readonly>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <label class="mt-1" for="name">Zip Code:</label>
                                <input type="text" class="form-control" name="zip_code" id="zip-edit" value="" required>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <label class="mt-1" for="name">Phone #:</label>
                                <input type="text" class="form-control" name="phone_no" id="phone-edit" value="" required>
                            </div>

                            {{-- <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <label class="mt-1" for="name">New Role:</label>
                                <select name="userrole" class="form-control" id="">
                                    <option value="">-- NONE --</option>
                                    <option value="Super Admin">Super Admin</option>
                                    <option value="Admin">Admin</option>
                                    <!--<option value="Distributor">Distributor</option>-->
                                    <option value="Retailer">User</option>
                                </select>
                            </div> --}}
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" id="profile-id" value="">
                        <button type="submit" class="btn btn-success btn-sm">Update Profile</button>
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Jquery CDN --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function ()
    {

        $('#country').on('change', function () {
                // $('#ustate').hide();
                // $('#state').show();
                var country = $('#country option:selected').val();
                $.ajax({
                    type: "GET",
                    url: "{{route('select.state')}}",
                    data: {country: country},
                    success: function (data) {
                        // console.log(data);
                        $('#states').html(data);
                    },
                });
            });

        $('#edit-profile-btn').click(function ()
        {
            $.ajax({
                url: "{{route('get.profile.data')}}",
                type:"get",
                success:function(data)
                {
                    console.log(data);
                    $('#profile-id').val(data.user.id);
                    $('#f-name').val(data.user.fname);
                    $('#l-name').val(data.user.lname);
                    $('#company-edit').val(data.user.company);
                    $('#city-edit').val(data.user.city);
                    $('#state-edit').val(data.user.state);
                    $('#address-edit').val(data.user.address);
                    $('#zip-edit').val(data.user.zip_code);
                    $('#phone-edit').val(data.user.phone_no);
                    $('#email-edit').val(data.user.email);
                    $('#password-edit').val(data.user.decrypt);
                    // location.reload();
                },
            });
        });

        // $('#edit-btn').click(function ()
        // {
        //     var id = $(this).attr('href');
        //     $('#record-id-show').html(id);
        // });

    }); // end of doc ready
</script>
