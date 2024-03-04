@extends('admin.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <h1 class="text-center text-dark"><b>List of Wholesale Products</b></h1>
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
                                <b>Total ({{count($wproducts)}}) Wholesale Products found</b>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                        <!-- add new wProducts Button trigger modal -->
                        <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#add-new-wproduct-modal"><b>Add New Wholesale Product</b></button>
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
                                            <th>ITEM ID</th>
                                            <th>IMAGE</th>
                                            <th>Wholesale PRODUCT NAME</th>
                                            <th>FEATURED</th>
                                            <th>SALES</th>
                                            <th>SUB-CATEGORY NAME</th>
                                            <th>CATEGORY NAME</th>
                                            <th>PRICE (USD)</th>
                                            <th>WEIGHT (LB)</th>
                                            <th>DESCRIPTION</th>
                                            <th>EDIT</th>
                                            <th>DELETE</th>
                                        </tr>
                                    </thead>
                                    {{-- {{dd($wproducts)}} --}}
                                    <tbody>
                                        @foreach ($wproducts as $product)
                                        <tr>
                                            <td>{{$product->item_id}}</td>
                                            <td><img src="{{ asset('/docs/pics/'.$product->pic) }}" width="50px" /></td>
                                            <td>{{$product->name}}</td>
                                            <td>
                                                @if ($product->featured == 'on')
                                                    yes
                                                @else
                                                    no
                                                @endif
                                            </td>
                                            <td>
                                                @if ($product->sales == 'on')
                                                    yes
                                                @else
                                                    no
                                                @endif
                                            </td>
                                            <td>{{$product->getSubCat->name}}</td>
                                            <td>{{$product->getSubCat->getCat->name}}</td>
                                            <td>{{$product->price}}</td>
                                            <td>{{$product->weight}}</td>
                                            <td>{{$product->desc}}</td>
                                            <td>
                                                <a href="{{$product->id}}" id="edit-btn" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit-btn-modal">Edit</a>
                                            </td>
                                            <td>
                                                <!-- delete Button trigger modal -->
                                                <a href="{{$product->id}}" type="button" class="btn btn-danger btn-sm del-btn" data-toggle="modal" data-target="#del-btn-modal">Delete</a>
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

    <!-- Add new wproduct Modal -->
    <div class="modal fade" id="add-new-wproduct-modal" tabindex="-1" role="dialog" aria-labelledby="add-new-wproduct-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add New Wholesale Product Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form action="{{route('sa.wproduct.save')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-2">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <label class="mt-1" for="name">Enter Item ID:</label>
                                <input type="text" class="form-control" name="item_id" id="item_id" title="Enter only alphanumeric" pattern="[a-zA-Z0-9\s]+" placeholder="AB12" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <label class="mt-1" for="name">Enter Wholesale Product Name:</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Fish" required>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <label class="mt-1" for="subcategory">Select Sub-Category:</label>
                                <select class="form-control" name="sub_category" id="sub-category-id" required>
                                    <option value="">--- Select Sub-Category ---</option>
                                    @foreach ($sub_categories as $category)
                                        <option value="{{$category->name}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <label class="mt-1" for="name">Enter Wholesale Product Price (USD):</label>
                                <input type="text" class="form-control" name="price" id="price" pattern="[0-9]+" title="Enter correct Price" placeholder="85" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <label class="mt-1" for="subcategory">Weight per pack (lb):</label>
                                <input type="text" class="form-control" name="weight" id="weight" pattern="[0-9\.]+" title="Enter correct weight" placeholder="5" required>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <label class="mt-1" for="Picture">Upload Image: <span style="color:red; font-size:11px">*image size 50kb only</span></label>
                                <input type="file" class="form-control" name="pic" id="pic" accept="image/*"  required>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <label class="mt-1" for="name">Description:</label>
                                <textarea class="form-control" name="desc" id="desc" placeholder="write description" cols="30" rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <label class="mt-1" for="subcategory">
                                    <input type="checkbox" class="form-control" name="featured" id="featured">Featured Item:
                                </label>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <label class="mt-1" for="subcategory">
                                    <input type="checkbox" class="form-control" name="sales" id="sales">Sales Item:
                                </label>
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


    <!--edit wproduct Modal -->
    <div class="modal fade" id="edit-btn-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Wholesale Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('sa.wproduct.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="modal-body">
                        <div class="row mb-2">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <label class="mt-1" for="name">Update Item ID:</label>
                                <input type="text" class="form-control" name="item_id" id="edit-item-id" title="Enter only alphanumeric" pattern="[a-zA-Z0-9\s]+" placeholder="AB12" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <label class="mt-1" for="name">Update Wholesale product Name:</label>
                                <input type="text" class="form-control" name="name" id="edit-name" required>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <label class="mt-1" for="name">Update Wholesale product Price (PKR):</label>
                                <input type="text" class="form-control" name="price" id="edit-price" pattern="[0-9]+" title="Enter correct Price" placeholder="85" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <label class="mt-1" for="subcategory">Update Weight per pack (lb):</label>
                                <input type="text" class="form-control" name="weight" id="edit-weight" pattern="[0-9\.]+" title="Enter correct weight" placeholder="5" required>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <label class="mt-1" for="name">Update Description:</label>
                                <textarea class="form-control" name="desc" id="edit-desc" placeholder="write description" cols="30" rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <label class="mt-1" >Old Image:</label>
                                <div id="old-pic-div">

                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <label class="mt-1" for="Picture">Upload New Image: <span style="color:red; font-size:11px">*image size 50kb only</span></label>
                                <input type="file" class="form-control" name="pic" id="edit-pic" accept="image/*"  >
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <label class="mt-1" for="edit-featured">
                                    <input type="checkbox" class="form-control" name="featured" id="edit-featured">Featured Item:
                                </label>

                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <label class="mt-1" for="edit-sales">
                                    <input type="checkbox" class="form-control" name="sales" id="edit-sales">Sales Item:
                                </label>
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

    <!--delete wproduct Modal -->
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
                    <p style="color:red"><b>Deleting ... ?</b></p>
                </div>
                <div class="modal-footer">
                    <form action="{{route('sa.wproduct.delete')}}" method="get">
                        @csrf
                        <input type="hidden" name="id" id="wproduct-id" value="">
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
            // id = $('#wproduct-id').val();
            var id = $(this).attr('href');
            $.ajax({
                url: "{{route('sa.get.edit.wproduct.data')}}",
                type:"get",
                data:
                {
                    id:id,
                },
                success:function(data)
                {
                    // console.log(data);
                    $('#edit-id').val(data.wproduct.id);
                    $('#edit-item-id').val(data.wproduct.item_id);
                    $('#edit-name').val(data.wproduct.name);
                    $('#edit-price').val(data.wproduct.price);
                    $('#edit-weight').val(data.wproduct.weight);
                    $('#edit-desc').val(data.wproduct.desc);
                    var fea = data.wproduct.featured;
                    if (fea == 'on')
                    {
                        $("#edit-featured").prop("checked", 1);
                    }
                    else
                    {
                        $("#edit-featured").prop("checked", 0);
                    }
                    var sale = data.wproduct.sales;
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
            $('#wproduct-id').val(id);
            $('#wproduct-id-show-del').html(id);

        });
        $('#example1').on('click','#edit-btn',function ()
        {
            var id = $(this).attr('href');
            $('#wproduct-id-show').html(id);
        });

    }); // end of doc ready
</script>
