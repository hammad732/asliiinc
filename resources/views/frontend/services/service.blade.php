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
                        <h1 class="text-center text-dark"><b>List of Services</b></h1>
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
                        <!-- add new rProducts Button trigger modal -->
                        <!--<button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#add-new-rproduct-modal"><b>Add New Retail Product</b></button>-->
                    </div>
                </div>
            </div><!-- /.container-fluid -->
<div>  <button  type="button" class="btn btn-success mb-2" ><b><a href="{{route('service.create')}}" class="add-new-varient">Add New Service </a></b></button></div>
            <!-- Default box -->
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Image</th>
                                            <th>Heading</th>
                                            <th>Type</th>
                                            <th>Text</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                            
                                        </tr>
                                    </thead>
                                    {{-- {{dd($services)}} --}}
                                    <tbody>
                                        @foreach ($services as $service)
                                        <tr>
                                            <td>{{$service->id}}</td>
                                    
                                            <td>
                                                @if($service->image != null)
                                                    <img src="{{ asset('/docs/pics/'.$service->image) }}" width="50px" />
                                                @else
                                                  <p>No Image Available</p>
                                                @endif
                                                </td>
                                           
                                            <td>{{$service->heading}}</td>
                                            <td>{{$service->type}}</td>
                                            <td>{!! $service->text !!}</td>
                                            <td>
                                                <a href="{{route('service.edit', $service->id)}}" id="edit-btn" class="btn btn-primary btn-sm" >Edit</a>
                                            </td>
                                            <td>
                                               
                                                <a href="{{route('service.delete', $service->id)}}" type="button" class="btn btn-danger btn-sm del-btn">Delete</a>
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

   

    @endsection

{{-- Jquery CDN --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

{{-- <script type="text/javascript">
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
                    //console.log(data);
                    $('#edit-id').val(data.rproduct.id);
                    $('#edit-item-id').val(data.rproduct.item_id);
                    $('#edit-item-id').html(data.rproduct.item_id);
                    $('#edit-name').val(data.rproduct.name);
                    $('#edit-price').val(data.rproduct.r_price);
                    $('#edit-unit').val(data.rproduct.unit);
                    $('.edit-weight').val(data.rproduct.r_weight);
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
                    $('#old-pic-div').html(data.old_pic);
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
    
    
    
</script> --}}

