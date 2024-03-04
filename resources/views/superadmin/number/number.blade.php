@extends('admin.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
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
                        <div class="col-lg-10 col-md-10 col-sm-10 col-10">
                            <h3>Update Website Support Number</h3>
                            <br>
                            <form action="{{route('sa.store.site.number')}}" method="post">
                                @csrf
                                @method('post')
                                <input name="site_number" class="form-control" value="{{$number}}"/><br>
                                
                                <button class="btn btn-success ">Update</button>
                                
                            </form>
                           
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @endsection

