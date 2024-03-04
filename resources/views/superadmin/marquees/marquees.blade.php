@extends('admin.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <h1 class="text-center text-dark"><b>List of Marquee Images</b></h1>
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
                                <b>Total ({{count($marquees)}}) Marquee Images found</b>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                        <!-- add new marquees Button trigger modal -->
                        <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#add-new-marquee-modal"><b>Add New Marquee Image</b></button>
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
                                            <th>NAME</th>
                                            <th>PICTURE</th>
                                            <th>EDIT</th>
                                            <th>DELETE</th>
                                        </tr>
                                    </thead>
                                    {{-- {{dd($marquee)}} --}}
                                    <tbody>
                                        @foreach ($marquees as $marquee)
                                        <tr>
                                            <td>{{$marquee->id}}</td>
                                            <td>{{$marquee->name}}</td>
                                            <td><img src="{{ asset('docs/pics/'.$marquee->pic) }}" width="150px" /></td>
                                            <td>
                                                <a href="{{$marquee->id}}" id="edit-btn" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit-btn-modal">Edit</a>
                                            </td>
                                            <td>
                                                <!-- delete Button trigger modal -->
                                                <a href="{{$marquee->id}}" type="button" class="btn btn-danger btn-sm del-btn" data-toggle="modal" data-target="#del-btn-modal">Delete</a>
                                            </td>
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

    <!-- Add new marquee Modal -->
    <div class="modal fade" id="add-new-marquee-modal" tabindex="-1" role="dialog" aria-labelledby="add-new-marquee-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add New Marquee Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form action="{{route('sa.marquee.save')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-2">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <label class="mt-1" for="name">Enter Marquee Image Name:</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="vegetables" required>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                                <label class="mt-1" for="Picture">Upload Image: <span style=" font-size:14px">(*width 1200px to 2500px & height 400px to 400px)</span></label>
                                <input type="file" class="form-control" name="pic" id="pic" accept="image/*"  required>
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


    <!--edit marquee Modal -->
    <div class="modal fade" id="edit-btn-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit marquee ID No. <span id="marquee-id-show"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('sa.marquee.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="modal-body">
                        <div class="row mb-2">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <label class="mt-1" for="name">Update marquee Name:</label>
                                <input type="text" class="form-control" name="name" id="edit-name" required>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <label class="mt-1" for="Picture">Upload New Image: <br> (*width 1200px to 2500px & height 400px to 400px)</label>
                                <input type="file" class="form-control" name="pic" id="edit-pic" accept="image/*"  >
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                <label class="mt-1" >Old Image:</label>
                                <div id="old-pic-div"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" id="edit-id" value="">
                        <button type="submit" class="btn btn-success btn-sm">Update</button>
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--delete marquee Modal -->
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
                    <p style="color:red"><b>Deleting ID No. <span id="marquee-id-show-del"></span> ?</b></p>
                </div>
                <div class="modal-footer">
                    <form action="{{route('sa.marquee.delete')}}" method="get">
                        @csrf
                        <input type="hidden" name="id" id="marquee-id" value="">
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
        $('#example1').on('click','#edit-btn',function ()
        {
            // id = $('#marquee-id').val();
            var id = $(this).attr('href');
            $.ajax({
                url: "{{route('sa.get.edit.marquee.data')}}",
                type:"get",
                data:
                {
                    id:id,
                },
                success:function(data)
                {
                    console.log(data);
                    $('#edit-id').val(data.marquee.id);
                    $('#edit-name').val(data.marquee.name);
                    $('#edit-price').val(data.marquee.price);
                    $('#edit-weight').val(data.marquee.weight);
                    $('#edit-desc').val(data.marquee.desc);
                    var fea = data.marquee.featured;
                    if (fea == 'on')
                    {
                        $("#edit-featured").prop("checked", 1);
                    }
                    else
                    {
                        $("#edit-featured").prop("checked", 0);
                    }
                    var sale = data.marquee.sales;
                    if (sale == 'on')
                    {
                        $("#edit-sales").prop("checked", 1);
                    }
                    else
                    {
                        $("#edit-sales").prop("checked", 0);
                    }
                    $('#old-pic-div').html(data.old_pic);
                    // location.reload();
                },
            });
        });

        $('#example1').on('click','.del-btn',function ()
        {
            var id = $(this).attr('href');
            $('#marquee-id').val(id);
            $('#marquee-id-show-del').html(id);
        });
        $('#example1').on('click','#edit-btn',function ()
        {
            var id = $(this).attr('href');
            $('#marquee-id-show').html(id);
        });

    }); // end of doc ready
</script>
