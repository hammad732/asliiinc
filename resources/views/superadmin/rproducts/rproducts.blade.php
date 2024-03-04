@extends('admin.layouts.master')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <h1 class="text-center text-dark"><b>List of Products</b></h1>
                        <center><p class="text-center product-update-msg bg-success m-0 w-25 rounded"></p></center>
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
                                <b>Total ({{count($rproducts)}}) Products found</b>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                        <!-- add new rProducts Button trigger modal -->
                        <!--<button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#add-new-rproduct-modal"><b>Add New Retail Product</b></button>-->
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
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>BAR CODE</th>
                                            <th>EDIT</th>
                                            <!--<th>Varients</th>-->
                                            <th>Out of Stock</th>
                                            <th>DELETE</th>
                                            <th>STATUS</th>
                                            <th>IMAGE</th>
                                            <th>PRODUCT</th>
                                            <th>PRICE</th>
                                            <th>Total PRICE</th>
                                            <th>WEIGHT per UNIT</th>
                                            <th>Total WEIGHT</th>
                                            <!--<th>UNIT per PACK</th>-->
                                            <!--<th>DESCRIPTION</th>-->
                                            <th>SUB-CATEGORY</th>
                                            <th>CATEGORY</th>
                                            <th>SALES</th>
                                            
                                        </tr>
                                    </thead>
                                    {{-- {{dd($rproducts)}} --}} 
                                    <tbody>
                                        @foreach ($rproducts as $product)
                                        
                                        <tr>
                                            <td>{{$product->item_id}}</td>
                                            <td>
                                                <a href="{{$product->id}}" id="edit-btn" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit-btn-modal">Edit</a>
                                            </td>
                                            <!--<td>-->
                                            <!--    <a href="{{route('show.varient',$product->id)}}" id="varient-btn" type="button" class="btn btn-primary btn-sm">Varient</a>-->
                                            <!--</td>-->
                                            <td>
                                                @if($product->out_of_stock == 1)
                                                 <a href="{{route('stock',$product->id)}}" id="edit-btn" type="button" class="btn btn-primary btn-sm" >Out stock</a>
                                                 @else
                                                  <a href="{{route('stock',$product->id)}}" id="edit-btn" type="button" class="btn btn-primary btn-sm" >In stock</a>
                                                  @endif
                                            </td>
                                            <td>
                                                <!-- delete Button trigger modal -->
                                                <a href="{{$product->id}}" type="button" class="btn btn-danger btn-sm del-btn" data-toggle="modal" data-target="#del-btn-modal">Delete</a>
                                            </td>
                                            <td>
                                                <!--update product status -->
                                                <button class="btn btn-primary btn-sm productStatus" id="active{{$product->id}}" data-productStatus="{{$product->id}}">{{ $product->status == 1 ? 'Active' : 'Inactive' }}</button>
                                            </td>
                                            <td>
                                            @if($product->pic != null)
                                                <img src="{{ asset('/docs/pics/'.$product->pic) }}" width="50px" />
                                            @else
                                              <p>No Image Available</p>
                                            @endif
                                            </td>
                                            <td>{{$product->name}}</td>
                                            @php 
                                             $nmbr = round($product->r_price);
                                             $nmbr1 = round($product->t_price);
                                             
                                            @endphp
                                            <td>
                                                {{$product->price_unit}}{{number_format($product->r_price,2)}}
                                         
                                             </td>
                                              <td>
                                                 {{$product->price_unit}}{{number_format($product->t_price,2)}}
                                         
                                             </td>
                                           
                                            <td>{{$product->r_weight}}</td>
                                            <td>{{$product->t_weight}}</td>
                                    
                                           {{-- <td>{{$product->desc}}</td> --}}
                                            {{-- @dd($product->getSubCat->name) --}}
                                            <td>{{$product->getSubCat->name}}</td>
                                            <td>{{$product->getSubCat->getCat->name}}</td>
                                            <td>
                                                @if ($product->featured == 'on')
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

    <!-- Add varient Modal -->
    <!--<div class="modal fade" id="varient-btn-modal" tabindex="-1" role="dialog" aria-labelledby="varient-btn-modal" aria-hidden="true">-->
    <!--    <div class="modal-dialog modal-lg" role="document">-->
    <!--    <div class="modal-content">-->
    <!--        <div class="modal-header">-->
    <!--            <h5 class="modal-title" id="exampleModalLongTitle">Add New Product Form</h5>-->
    <!--            <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
    <!--                <span aria-hidden="true">&times;</span>-->
    <!--            </button>-->
    <!--        </div>-->
    <!--        <div class="modal-body">-->
    <!--            <div class="container-fluid">-->
    <!--                <div class="row">-->
    <!--                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">-->
    <!--                        <form action="{{route('sa.product.save')}}" method="post" enctype="multipart/form-data">-->
    <!--                            @csrf-->
                               

    <!--                                <div class="row mb-2">-->
    <!--                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">-->
    <!--                                        <label class="mt-1" for="name">Update Bar Code:</label>-->
    <!--                                        <input type="text" class="form-control"  name="item_id" id="edit-item-id" title="Enter only alphanumeric" pattern="[a-zA-Z0-9\s]+" placeholder="AB12" required>-->
    <!--                                    </div>-->
    <!--                                </div>-->
    <!--                                <div class="row mb-2">-->
    <!--                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">-->
    <!--                                        <label class="mt-1" for="name">Update product:</label>-->
    <!--                                        <input type="text" class="form-control" name="name" id="edit-name" required>-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">-->
    <!--                                        <label class="mt-1" for="category">Update Category:</label>-->
    <!--                                             <div class="main-cat-div"></div>-->
    <!--                                        </div>-->
    <!--                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12 Sub-Category">-->
    <!--                                        <label class="mt-1" for="name">Update Sub-Category:</label>-->
    <!--                                        <div class="sub-cat-div"></div>-->
    <!--                                    </div>-->
    <!--                                     <div class="col-lg-4 col-md-4 col-sm-12 col-12 Select-Sub-Cat">-->
    <!--                                        <label class="mt-1" for="subcategory">Select Sub-Category:</label>-->
    <!--                                        <div class="json-subcat-div"></div>-->
    <!--                                    </div>                               -->
                                    
    <!--                            </div>-->
    <!--                            <hr>-->

    <!--                            <div class="r-div">-->
    <!--                                <h3>Product</h3>-->
    <!--                                <div class="row mb-2">-->
                                      
    <!--                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">-->
    <!--                                        <label class="mt-1" for="name">Price per Unit (USD $):</label>-->
    <!--                                        <input type="text" class="form-control" name="r_price" value="{{old('price')}}" id="price" step="any" title="Enter correct Price" placeholder="85" >-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-2 col-md-4 col-sm-6 col-6">-->
    <!--                                   <label class="mt-1" for="name">Select unit for weight:</label>-->
    <!--                                    <select class="form-control" id="unit" required>-->
    <!--                                        <option value="oz">Oz</option>-->
    <!--                                        <option value="lb">Lb</option>-->
    <!--                                    </select>-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-2 col-md-4 col-sm-6 col-6 r_weight_oz">-->
    <!--                                        <label class="mt-1" for="name">Weight per Unit (oz):</label>-->
    <!--                                        <input type="text" class="form-control" id="r_weight_oz" name="r_weight_oz" value="" step="any" title="Enter correct Weight" placeholder="16" required>-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-2 col-md-4 col-sm-6 col-6 r_weight_pl">-->
    <!--                                        <label class="mt-1" for="name">Weight per Unit (lb):</label>-->
    <!--                                        <input type="text" class="form-control" id="r_weight_pl" name="r_weight_pl" value="" step="any" title="Enter correct Weight" placeholder="16"  required>-->
    <!--                                    </div>-->
                                        
    <!--                                        {{-- <div class="col-lg-4 col-md-4 col-sm-12 col-12">-->
    <!--                                            <label class="mt-1" for="Picture">Upload Image: </label>-->
                                           
    <!--                                            <input type="file" class="form-control" name="pic" id="pic" accept="image/*">-->
    <!--                                        </div> --}}-->
    <!--                                </div>-->
    <!--                                <hr>-->
    <!--                            </div>-->
    <!--                            <input type="hidden" name="variant[]" id="varaint" > -->
    <!--                             Add Variant Button -->
    <!--                            <button type="button" id="addVariant" class="btn btn-primary">Add Variant</button>-->

    <!--                            <table class="table">-->
    <!--                                <thead>-->
    <!--                                    <tr>-->
    <!--                                        <th>Price</th>-->
    <!--                                        <th>Unit</th>-->
    <!--                                        <th>Weight</th>-->
    <!--                                        <th>Image</th>-->
    <!--                                        <th>Actions</th>-->
    <!--                                    </tr>-->
    <!--                                </thead>-->
    <!--                                <tbody>-->
    <!--                                    {{-- <input type="text" class="form-control" name="r_price" value="{{old('price')}}" id="price" step="any" title="Enter correct Price" placeholder="85" > --}}-->

    <!--                                   {{-- @foreach ( as )-->
                                           
    <!--                                   @endforeach --}}-->
    <!--                                </tbody>-->
    <!--                            </table>-->

    <!--                             <div class="row mb-2">-->
    <!--                                <div class="col-lg-4 col-md-4 col-sm-12 col-12">-->
    <!--                                    <label class="mt-1" for="Picture">Upload Image: </label>-->
                                   
    <!--                                    <input type="file" class="form-control" name="pic" id="pic" accept="image/*">-->
    <!--                                </div>-->
    <!--                                {{-- <div class="col-lg-4 col-md-4 col-sm-12 col-12 text-center">-->
    <!--                                    <label class="mt-1" for="subcategory">-->
    <!--                                        <input type="checkbox" class="form-control" name="featured" id="featured">Sales Item:-->
    <!--                                    </label>-->
    <!--                                </div> --}}-->
                                   
    <!--                            </div> -->

    <!--                            <div class="row mb-2">-->
    <!--                                <div class="col-lg-12 col-md-12 col-sm-12 col-12">-->
    <!--                                    <label class="mt-1" for="name">Description:</label>-->
    <!--                                    <textarea class="form-control" name="desc" id="desc" value="{{old('desc')}}" placeholder="write description" cols="30" rows="3" required></textarea>-->
    <!--                                </div>-->
    <!--                            </div>-->

    <!--                            <div class="modal-footer">-->
    <!--                                <button type="submit" class="btn btn-success btn-md">SAVE</button>-->
    <!--                            </div>-->
    <!--                        </form>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--    </div>-->
    <!--</div>-->

    <!--edit rproduct Modal -->
    <div class="modal fade" id="edit-btn-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Product </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('sa.rproduct.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="modal-body">
                        <div class="row mb-2">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <label class="mt-1" for="name">Update Bar Code:</label>
                                <input type="text" class="form-control" value="" name="item_id" id="edititemid" title="Enter only alphanumeric" pattern="[a-zA-Z0-9\s]+" placeholder="AB12" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <label class="mt-1" for="name">Update product:</label>
                                <input type="text" class="form-control" name="name" id="edit-name" required>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <label class="mt-1" for="category">Update Category:</label>
                                     <div class="main-cat-div"></div>
                                </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12 Sub-Category">
                                <label class="mt-1" for="name">Update Sub-Category:</label>
                                <div class="sub-cat-div"></div>
                            </div>
                             <div class="col-lg-4 col-md-4 col-sm-12 col-12 Select-Sub-Cat">
                                <label class="mt-1" for="subcategory">Select Sub-Category:</label>
                                <div class="json-subcat-div"></div>
                            </div>

                        
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <label class="mt-1" for="subcategory">Unit per Pack:</label>
                                <input type="text" class="form-control" name="unit" value="{{old('weight')}}" id="edit-unit" step="any" title="Enter correct weight" placeholder="5" >
                            </div>
                            <!--<div class="col-lg-4 col-md-4 col-sm-12 col-12">-->
                            <!--    <label class="mt-1" for="subcategory">Total Unit:</label>-->
                            <!--    <input type="text" class="form-control" name="t_unit" value="{{old('t_unit')}}" id="edit-t_unit" step="any" title="Enter Total Unit" placeholder="5" >-->
                            <!--</div>-->
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <!--<label class="mt-1" for="name">Price per Unit:{{old('price_unit')}}</label>-->
                                <label class="mt-1" for="name">Price per Unit: <span id="edit-p_unit">{{ old('price_unit') }}</span></label>

                                <input type="text" class="form-control" name="r_price" value="{{old('price')}}" id="edit-price" step="any" title="Enter correct Price" placeholder="85" >
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <label class="mt-1" for="name">Total Price: <span id="editp_unit">{{ old('price_unit') }}</span></label>
                                <input type="text" class="form-control" name="t_price" value="{{old('t_price')}}" id="edit-t_price" step="any" title="Enter Total Price" placeholder="85" >
                            </div>
                            <!--<div class="col-lg-4 col-md-4 col-sm-12 col-12">-->
                            <!--    <label class="mt-1" for="name">Unit for Price:</label>-->
                            <!--     <select class="form-control" name="price_unit" value="{{old('price_unit')}}" id="p_unit" required>-->
                            <!--                    <option value="$">USD($)</option>-->
                            <!--                    <option value="€">Euro(€)</option>-->
                            <!--                </select>-->
                            <!--</div>-->
                             <div class="col-lg-4 col-md-4 col-sm-6 col-6 r_weight_oz">
                                <label class="mt-1" for="name">Weight per Unit:</label>
                                <input type="text" class="form-control edit-weight" name="r_weight" value="{{old('r_weight')}}" step="any" placeholder="2oz or 2lb">
                            </div>
                             <div class="col-lg-4 col-md-4 col-sm-6 col-6 r_weight_oz">
                                <label class="mt-1" for="name">Total Weight:</label>
                                <input type="text" class="form-control edit-weight" name="t_weight" value="{{old('t_weight')}}" id="t_weight" step="any" placeholder="2oz or 2lb">
                            </div>
                            </div>
                            
                        <!--<div class="row mb-2">-->
                        <!--    <div class="col-lg-12 col-md-12 col-sm-12 col-12">-->
                        <!--        <label class="mt-1" for="name">Update Description:</label>-->
                        <!--        <textarea class="form-control" name="desc" id="edit-desc" placeholder="write description" cols="30" rows="3" required></textarea>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <div class="row mb-2">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <label class="mt-1" >Old Image:</label>
                                <div id="old-pic-div">
                                    

                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <label class="mt-1" for="Picture">Upload New Image:</label>
                                <input type="file" class="form-control" name="pic" value="{{old('pic')}}" id="edit-pic" accept="image/*"  >
                            </div>
                        </div>
                        {{-- <div class="row mb-2">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <label class="mt-1" for="edit-featured">
                                    <input type="checkbox" class="form-control" name="featured" id="edit-featured">Sales Item:
                                </label>

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

    <!--delete rproduct Modal -->
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
                    <p style="color:red"><b>Deleting product?</b></p>
                </div>
                <div class="modal-footer">
                    <form action="{{route('sa.rproduct.delete')}}" method="get">
                        @csrf
                        <input type="hidden" name="id" id="rproduct-id" value="">
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
         $('.Select-Sub-Cat').hide();
       
         $('.r_weight_pl').hide();
         $('#r_weight_pl').val();
        $('#r_weight_pl').prop('required',false);
       $('#r_weight_oz').prop('required',true);
       
        $('#example1').on('click','#edit-btn',function ()
        {
            // id = $('#rproduct-id').val();
            var id = $(this).attr('href');
            $.ajax({
                url: "{{route('sa.get.edit.rproduct.data')}}",
                type:"get",
                data:
                {
                    id:id,
                },
                success:function(data)
                {
                    //  var b=JSON.stringify(data);
                    //  str = b.replace(/\\/g, '');
                    // console.log(data.rproduct.name);
                    $('#edit-id').val(data.rproduct.id);
                    $('#edititemid').val(data.rproduct.item_id);
                    $('#edit-item-id').val(data.rproduct.item_id);
                    $('#edit-name').val(data.rproduct.name);
                    $('#edit-price').val(data.rproduct.r_price);
                    $('#edit-t_price').val(data.rproduct.t_price);
                    $('#edit-p_unit').html(data.rproduct.price_unit);
                    $('#editp_unit').html(data.rproduct.price_unit);
                    $('#edit-unit').val(data.rproduct.unit);
                    $('#edit-t_unit').val(data.rproduct.t_unit);
                    $('.edit-weight').val(data.rproduct.r_weight);
                    $('.edit-t_weight').val(data.rproduct.t_weight);
                    $('#edit-desc').val(data.rproduct.desc);
                    $('.sub-cat-div').html(data.subcat_drop);
                    $('.main-cat-div').html(data.maincat_drop);
                    //  $('#edit-pic').val(data.old_pic);
                    
                    var fea = data.rproduct.featured;
                    if (fea == 'on')
                    {
                        $("#edit-featured").prop("checked", 1);
                    }
                    else
                    {
                        $("#edit-featured").prop("checked", 0);
                    }
                    var sale = data.rproduct.sales;
                    if (sale == 'on')
                    {
                        $("#edit-sales").prop("checked", 1);
                    }
                    else
                    {
                        $("#edit-sales").prop("checked", 0);
                    }
                  var oldPicDiv = $('#old-pic-div');
                   
                    
                    if (data.old_pic && data.old_pic !== '<img src="docs/pics/" id="old-pic" width="50px" />') {
                        oldPicDiv.html(data.old_pic);
                    } else {
                        oldPicDiv.html('<p>No image uploaded</p>');
                    }

                    // location.reload();
                },
            });
        });

        $('#example1').on('click','.del-btn',function ()
        {
            var id = $(this).attr('href');
            $('#rproduct-id').val(id);
            $('#rproduct-id-show-del').html(id);
        });
        $('#example1').on('click','#edit-btn',function ()
        {
            var id = $(this).attr('href');
            $('#rproduct-id-show').html(id);
        });
        
         //unit selection
       $('#unit').on('change', function() {
         
         var unit_id = this.value();
   
          if(unit_id == 'oz'){
           $('.r_weight_pl').hide(); 
           $('#r_weight_pl').prop('required',false);
            $('#r_weight_oz').prop('required',true);
           $('.r_weight_oz').show();
            }
            else if(unit_id == 'pl'){
            $('.r_weight_oz').hide(); 
           $('.r_weight_pl').show();
            $('#r_weight_oz').prop('required',false);
           $('#r_weight_pl').prop('required',true);
            
            }
          });
          
          //subcategory get
           $(document).on('change', '#main-category-id', function(e)
          { 
              e.preventDefault();
            var cat_id = $(this).val();
           
            $.ajax({
                type: "GET",
                url: "{{route('get.subcat.json')}}",
                data: {
                    cat_id: cat_id,
                },
                success: function (data)
                {
                    //console.log(data);
                    $('.Sub-Category').hide();
                     $('.Select-Sub-Cat').show();
                   $('.json-subcat-div').html(data.subcat_drop);
                   
                },
            });
        });

          
          //subcategory get
          $(document).on('click', '.productStatus', function()
          { 
              
                if($(this).text().trim()=='Active'){
                    $(this).text('Inactive')
                }else{
                    $(this).text('Active')
                }
              var productBtnId =  $(this).attr('id')
              //alert(productBtnId)
             var product_id = $(this).attr('data-productStatus')
             
            $.ajax({
                type: "POST",
                url: "{{route('rproduct_update_status')}}",
                data: {
                    "product_id":product_id,
                    "productBtnId":productBtnId,
                    "_token": "{{ csrf_token() }}"
                },
                success: function (data)
                {
                    console.log(data)
                  $('.product-update-msg').show().text('Product status updated');
                  setTimeout(function() { 
                      $('.product-update-msg').hide();
                  }, 3000);
                        
                    
                    
                },
            });
              
        });

    }); // end of doc ready
    
    
    
</script>

