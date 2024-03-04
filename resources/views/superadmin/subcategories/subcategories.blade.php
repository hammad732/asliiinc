@extends('admin.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        
        <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link " id="nav-home-tab" href="{{route('sa.categories.view')}}" >Categories</a>
            <a class="nav-item nav-link active" id="nav-profile-tab"  href="{{route('sa.sub.categories.view')}}" >Sub-Categories</a>
          </div>
        </nav>
        
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <h1 class="text-center text-dark"><b>List of Sub-Categories</b></h1>
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
                                <b>Total ({{count($sub_categories)}}) Sub-Categories found</b>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                        <!-- add new sub_categories Button trigger modal -->
                        <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#add-new-subcategory-modal"><b>Add New Sub-Category</b></button>
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
                                            {{-- <th>PICTURE</th> --}}
                                            <th>SUB-CATEGORY NAME</th>
                                            <th>CATEGORY NAME</th>
                                            <th>EDIT</th>
                                            <th>DELETE</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($sub_categories as $category)
                                        <tr>
                                            <td>{{$category->id}}</td>
                                            {{-- <td><img src="{{ asset('/docs/pics/'.$category->pic) }}" width="50px" /></td> --}}
                                            <td>{{$category->name}}</td>
                                            <td>{{$category->getCat->name}}</td>
                                            <td>
                                                <a href="{{$category->id}}" id="edit-btn" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit-btn-modal">Edit</a>
                                            </td>
                                            <td>
                                                <!-- delete Button trigger modal -->
                                                <a href="{{$category->id}}" type="button" class="btn btn-danger btn-sm del-btn" data-toggle="modal" data-target="#del-btn-modal">Delete</a>
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

    <!-- Add new subcategory Modal -->
    <div class="modal fade" id="add-new-subcategory-modal" tabindex="-1" role="dialog" aria-labelledby="add-new-subcategory-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add New Sub-Category Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form action="{{route('sa.sub.category.save')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-2">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <label class="mt-1" for="name">Enter Sub-Category Name:</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Meat" required>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <label class="mt-1" for="category">Select Category:</label>
                                <select class="form-control" name="category" id="category-id" required>
                                    <option value="">--- Select Category ---</option>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->name}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <label class="mt-1" for="Picture">Upload Picture: <span style="color:red; font-size:11px">*image size 50kb only</span></label>
                                <input type="file" class="form-control" name="pic" id="pic" accept="image/*"  required>
                            </div> --}}
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


    <!--edit Sub-Category Modal -->
    <div class="modal fade" id="edit-btn-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Sub-Category ID No. <span id="subcategory-id-show"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('sa.sub.category.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <label class="mt-1" for="name">Update Sub-Category Name:</label>
                                <input type="text" class="form-control" name="name" id="edit-name" value="" required>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                            <label class="mt-1" for="name">Update Main-Category:</label>
                               <div id="maincat_drop"></div>
                            </div>
                            
                        </div>
                        {{-- <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <label class="mt-1" for="Picture">New Picture: <span style="color:red; font-size:11px">*image size 50kb only</span></label>
                                <input type="file" class="form-control" name="pic" id="edit-pic" accept="image/*">
                            </div>
                        </div> --}}
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

    <!--delete Sub-Category Modal -->
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
                    <p style="color:red"><b>Deleting ID No. <span id="subcategory-id-show-del"></span> ?</b></p>
                </div>
                <div class="modal-footer">
                    <form action="{{route('sa.sub.category.delete')}}" method="get">
                        @csrf
                        <input type="hidden" name="id" id="subcategory-id" value="">
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
            // id = $('#subcategory-id').val();
            var id = $(this).attr('href');
            $.ajax({
                url: "{{route('sa.get.edit.sub.category.data')}}",
                type:"get",
                data:
                {
                    id:id,
                },
                success:function(data)
                {
                    // console.log(data);
                    $('#edit-id').val(data.subcategory.id);
                    $('#edit-name').val(data.subcategory.name);
                    $('#maincat_drop').html(data.maincat_drop);
                    // $('#old-pic-div').html(data.old_pic);
                    // location.reload();
                },
            });
        });

        $('#example1').on('click','.del-btn',function ()
        {
            var id = $(this).attr('href');
            $('#subcategory-id').val(id);
            $('#subcategory-id-show-del').html(id);
        });
        $('#example1').on('click','#edit-btn',function ()
        {
            var id = $(this).attr('href');
            $('#subcategory-id-show').html(id);
        });

    }); // end of doc ready
</script>
