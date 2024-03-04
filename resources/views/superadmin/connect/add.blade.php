@extends('admin.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <h1 class="text-center text-dark"><b>Add New Service</b></h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <form action="{{route('sa.connect.add')}}" method="post" enctype="multipart/form-data">
        @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
                <div class="row mb-2">
                   <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <label class="mt-1" for="region">Region</label>
                    <input type="text" class="form-control" name="region" id="connect-region-edit" placeholder="Enter region (e.g., North America)" required>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <label class="mt-1" for="email">Email</label>
                    <input type="text" class="form-control" name="email" id="connect-email-edit" placeholder="example@gmail.com" required>
                </div>
                  <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <label class="mt-1" for="type">Type</label>
                                <input type="text" class="form-control" name="type" placeholder="Head Office" id="connect-type-edit" required>
                            </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <label class="mt-1" for="phone_no">Phone</label>
                    <input type="text" class="form-control" name="phone_no" id="connect-phone-edit" placeholder="+1213234325" required>
                </div>
                </div>
                <div class="row mb-2">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <label class="mt-1" for="address">Address</label>
                    <input type="text" class="form-control" name="address" id="connect-address-edit" placeholder="Enter address (e.g., 123 Main St, City, Country)" required>
                </div>
                    </div>

            </div>
            <div class="modal-footer">
                <input type="hidden" name="id" id="connect-id-edit" value="">
                <button type="submit" class="btn btn-success btn-sm">Add</button>
            </div>
        </form>
    </div>
</div>
        </div>
    </section>
@endsection

