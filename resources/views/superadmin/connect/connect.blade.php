@extends('admin.layouts.master')
<style>
    .add-new-varient{
        color: #fff;
    }
    .add-new-varient:hover{
        color: #fff !important;
    }
</style>
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <h1 class="text-center text-dark"><b>Connect Information</b></h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
                            <div>  <button  type="button" class="btn btn-success mb-2" ><b><a href="{{route('sa.connect.create')}}" class="add-new-varient">Add New Connect </a></b></button></div>

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
                                            <th>Region</th>
                                            <th>Type</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th colspan = "2">Action</th>
                                        </tr>
                                    </thead>
                                    {{-- {{dd($jobs)}} --}}
                                    <tbody>
                                         @foreach($connect as $con)
                                        <tr>
                                           <td>{{$con->region}}</td>
                                           <td>{{$con->type}}</td>
                                            <td>{{$con->email}}</td>
                                            <td>{{$con->phone_no}}</td>
                                            <td>{{$con->address}}</td>
                                            <td><a href="{{$con->id}}" id="edit-btn" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit-btn-modal">Edit</a></td>
                                            <td><a href="{{route('sa.connect.delete',['id' =>$con->id])}}" id="delete-btn" type="button" class="btn btn-primary btn-sm" >Delete</a></td>
                                           
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

    <!--edit job Modal -->
    <div class="modal fade" id="edit-btn-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Connect Info  </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('sa.connect.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="modal-body">
                        <div class="row mb-2">
                             <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <label class="mt-1" for="email">Region</label>
                                <input type="text" class="form-control" name="region" id="connect-region-edit" required>
                            </div>
                              <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <label class="mt-1" for="type">Type</label>
                                <input type="text" class="form-control" name="type" id="connect-type-edit" required>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <label class="mt-1" for="email">Email</label>
                                <input type="text" class="form-control" name="email" id="connect-email-edit" required>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <label class="mt-1" for="phone_no">Phone</label>
                                <input type="text" class="form-control" name="phone_no" id="connect-phone-edit"  required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                <label class="mt-1" for="address">address</label>
                                <input type="text" class="form-control" name="address" id="connect-address-edit"  required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" id="connect-id-edit" value="">
                        <button type="submit" class="btn btn-success btn-sm">Update</button>
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @endsection

{{-- Jquery CDN --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function ()
    {

        $('#example1').on('click','#edit-btn',function ()
        {
            // id = $('#job-id').val();
            var id = $(this).attr('href');
            $.ajax({
                url: "{{route('sa.get.connect.data')}}",
                type:"get",
                data:
                {
                    id:id,
                },
                success:function(data)
                {
                    // console.log(data);
                    $('#connect-id-edit').val(data.connect.id);
                    $('#connect-region-edit').val(data.connect.region);
                    $('#connect-type-edit').val(data.connect.type);
                    $('#connect-email-edit').val(data.connect.email);
                    $('#connect-phone-edit').val(data.connect.phone_no);
                    $('#connect-address-edit').val(data.connect.address);
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
