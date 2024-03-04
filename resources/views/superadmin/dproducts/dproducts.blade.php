@extends('admin.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        
        <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link " id="nav-home-tab" href="{{route('sa.rproducts.view')}}" >Retailer Products</a>
            <a class="nav-item nav-link active" id="nav-profile-tab"  href="{{route('sa.dproducts.view')}}" >Distributor Products</a>
          </div>
        </nav>
        
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <h1 class="text-center text-dark"><b>List of Distributor Products</b></h1>
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
                                <b>Total ({{count($dproducts)}}) Distributor Products found</b>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                        <!-- add new dproducts Button trigger modal -->
                        <!--<button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#add-new-dproduct-modal"><b>Add New Distributor Product</b></button>-->
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
                                            <th>BAR CODE</th>
                                            <th>EDIT</th>
                                            <th>DELETE</th>
                                            <th>IMAGE</th>
                                            <th>Distributor PRODUCT</th>
                                            <th>No of CASES</th>
                                            <th>No of UNITS</th>
                                            <th>PRICE</th>
                                            <th>WEIGHT/Unit</th>
                                            <th>DESCRIPTION</th>
                                            <th>SUB-CATEGORY</th>
                                            <th>CATEGORY</th>
                                            <th>SALES</th>
                                            <th>SALES</th>
                                        </tr>
                                    </thead>
                                    {{-- {{dd($dproducts)}} --}}
                                    <tbody>
                                        @foreach ($dproducts as $product)
                                        <tr>
                                            <td>{{$product->item_id}}</td>
                                            <td>
                                                <a href="{{$product->id}}" id="edit-btn" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit-btn-modal">Edit</a>
                                            </td>
                                            <td>
                                                <!-- delete Button trigger modal -->
                                                <a href="{{$product->id}}" type="button" class="btn btn-danger btn-sm del-btn" data-toggle="modal" data-target="#del-btn-modal">Delete</a>
                                            </td>
                                            <td><img src="{{ asset('/docs/pics/'.$product->pic) }}" width="50px" /></td>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->no_of_cases }}</td>
                                            <td>{{$product->no_of_units }}</td>
                                            <td>${{number_format($product->d_price,2)}}</td>
                                            <td>{{$product->d_weight }}oz</td>
                                            <td>{{$product->desc}}</td>
                                            <td>{{$product->getSubCat->name}}</td>
                                            <td>{{$product->getSubCat->getCat->name}}</td>
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

    <!-- Add new dproduct Modal -->
    <div class="modal fade" id="add-new-dproduct-modal" tabindex="-1" role="dialog" aria-labelledby="add-new-dproduct-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add New Distributor Product Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form action="{{route('sa.dproduct.save')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-2">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <label class="mt-1" for="name">Bar Code:</label>
                                <input type="text" class="form-control" name="item_id" id="item_id" title="Enter only alphanumeric" value="{{old('item_id')}}" pattern="[a-zA-Z0-9\s]+" placeholder="BAR0011" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <label class="mt-1" for="name">Distributor Product Name:</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}" placeholder="Fish" required>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <label class="mt-1" for="subcategory">Select Sub-Category:</label>
                                <select class="form-control" name="sub_category" value="{{old('sub_category')}}" id="sub-category-id" required>
                                    <option value="">--- Select Sub-Category ---</option>
                                    @foreach ($sub_categories as $category)
                                        <option value="{{$category->name}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <div class="row mb-2">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <label class="mt-1" for="Picture">Upload Image: </label>
                                <input type="file" class="form-control" name="pic" id="pic" accept="image/*"  required>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <label class="mt-1" for="name">Description:</label>
                                <textarea class="form-control" name="desc" id="desc" value="{{old('desc')}}" placeholder="write description" cols="30" rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <label class="mt-1" for="subcategory">
                                    <input type="checkbox" class="form-control" name="featured" id="featured">Sales Item:
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

    <!--edit dproduct Modal -->
    <div class="modal fade" id="edit-btn-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Distributor Product </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('sa.dproduct.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="modal-body">
                        <div class="row mb-2">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <label class="mt-1" for="name">Update Bar Code:</label>
                                <input type="text" class="form-control" name="item_id" id="edit-item-id" title="Enter only alphanumeric" pattern="[a-zA-Z0-9\s]+" placeholder="AB12" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <label class="mt-1" for="name">Update Distributor product:</label>
                                <input type="text" class="form-control" name="name" id="edit-name" required>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <label class="mt-1" for="name">Update Sub-Category:</label>

                                <div class="sub-cat-div">

                                </div>

                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                <label class="mt-1" for="subcategory">Minumum No. of Cases Required:</label>
                                <input type="text" class="form-control" value="{{old('weight')}}" name="no_of_cases" id="edit-no-of-cases" step="any">
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                <label class="mt-1" for="subcategory">No. of units per Case</label>
                                <input type="text" class="form-control" value="{{old('weight')}}" name="no_of_units" id="edit-no-of-units" step="any">
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                <label class="mt-1" for="name">Price per Case (USD $):</label>
                                <input type="text" class="form-control" name="d_price" value="{{old('price')}}" id="edit-price" step="any">
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                <label class="mt-1" for="name">Weight per unit (oz):</label>
                                <input type="text" class="form-control" name="d_weight" value="{{old('d_weight')}}" id="edit-weight" placeholder="32" step="any">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
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
                                <label class="mt-1" for="Picture">Upload New Image:<!-- (300px by 300px)--> </label>
                                <input type="file" class="form-control" name="pic" id="edit-pic" accept="image/*"  >
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <label class="mt-1" for="edit-featured">
                                    <input type="checkbox" class="form-control" name="featured" id="edit-featured">Sales Item:
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

    <!--delete dproduct Modal -->
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
                    <p style="color:red"><b>Deleting distributor product?</b></p>
                </div>
                <div class="modal-footer">
                    <form action="{{route('sa.dproduct.delete')}}" method="get">
                        @csrf
                        <input type="hidden" name="id" id="dproduct-id" value="">
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
            // id = $('#dproduct-id').val();
            var id = $(this).attr('href');
            $.ajax({
                url: "{{route('sa.get.edit.dproduct.data')}}",
                type:"get",
                data:
                {
                    id:id,
                },
                success:function(data)
                {
                    console.log(data);
                    $('#edit-id').val(data.dproduct.id);
                    $('#edit-item-id').val(data.dproduct.item_id);
                    $('#edit-item-id').html(data.dproduct.item_id);
                    $('#edit-name').val(data.dproduct.name);
                    $('#edit-price').val(data.dproduct.d_price);
                    $('#edit-weight').val(data.dproduct.d_weight);
                    $('#edit-no-of-cases').val(data.dproduct.no_of_cases);
                    $('#edit-no-of-units').val(data.dproduct.no_of_units);
                    $('#edit-desc').val(data.dproduct.desc);
                    $('.sub-cat-div').html(data.subcat_drop);

                    var fea = data.dproduct.featured;
                    if (fea == 'on')
                    {
                        $("#edit-featured").prop("checked", 1);
                    }
                    else
                    {
                        $("#edit-featured").prop("checked", 0);
                    }
                    var sale = data.dproduct.sales;
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
            $('#dproduct-id').val(id);
            $('#dproduct-id-show-del').html(id);
        });
        $('#example1').on('click','#edit-btn',function ()
        {
            var id = $(this).attr('href');
            $('#dproduct-id-show').html(id);
        });

    }); // end of doc ready
</script>
