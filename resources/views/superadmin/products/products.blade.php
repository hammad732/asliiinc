@extends('admin.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <h1 class="text-center text-dark"><b>Add New Product</b></h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <form action="{{route('sa.import.products')}}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                <h4>Add multiple products using CSV / Excel sheets</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <label class="mt-1" for="category">Select Category:</label>
                                <select class="form-control" name="category" value="{{old('category')}}" id="category-id-import" required>
                                    <option value="">--- Select Category ---</option>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <label class="mt-1" for="subcategory">Select Sub-Category:</label>
                                <div class="json-subcat-div"></div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <label class="mt-1" for="subcategory">Import Sheet:</label>
                                <input type="file" id="sheet-import" class="form-control" name="sheet" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                                <button type="submit"  class="btn btn-success imp-sheet-btn mt-2">Import Sheet</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>


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
                            <form action="{{route('sa.product.save')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-2">
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                        <label class="mt-1" for="name">Bar Code:</label>
                                        <input type="text" class="form-control" name="item_id" id="item_id" title="Enter only alphanumeric" value="{{old('item_id')}}" pattern="[a-zA-Z0-9\s]+" placeholder="BAR0011" required>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                        <label class="mt-1" for="name">Product Name:</label>
                                        <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}" placeholder="Fish" required>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                        <label class="mt-1" for="category">Select Category:</label>
                                        <select class="form-control" name="category" value="{{old('category')}}" id="category-id" required>
                                            <option value="">--- Select Category ---</option>
                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                        <label class="mt-1" for="subcategory">Select Sub-Category:</label>
                                        <div class="json-subcat-div"></div>
                                        <!--<select class="form-control" name="sub_category" value="{{old('sub_category')}}" id="sub-category-id" required>-->
                                            <!--<option value="">--- Select Sub-Category ---</option>-->
                                            <!--@foreach ($sub_categories as $category)-->
                                                <!--<option value="{{$category->name}}">{{$category->name}}</option>-->
                                            <!--@endforeach-->
                                        <!--</select>-->

                                    </div>
                                </div>
                                <hr>

                                <div class="r-div">
                                    <h3>Product</h3>
                                    <div class="row mb-2">
                                      
                                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                            <label class="mt-1" for="name">Price per Unit:</label>
                                            <input type="text" class="form-control" name="r_price" value="{{old('price')}}" id="price" step="any" title="Enter correct Price" placeholder="85" >
                                        </div>
                                         <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                            <label class="mt-1" for="name">Total Price:</label>
                                            <input type="text" class="form-control" name="t_price" value="{{old('t_price')}}" id="t_price" step="any" title="Enter Total Price" placeholder="85" >
                                        </div>
                                         <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                       <label class="mt-1" for="name">Select unit for Price:</label>
                                            <select class="form-control" name="price_unit" id="price_unit" required>
                                                  <option value="$">USD($)</option>
                                                <option value="€">Euro(€)</option>
                                                <option value="£">British Pound(£)</option>
                                                <option value="¥">Japanese Yen(¥)</option>
                                                <option value="₹">Indian Rupee(₹)</option>
                                                <option value="₨">Pakistani Rupee(₨)</option>
                                                <option value="₩">South Korean Won(₩)</option>
                                                <option value="฿">Thai Baht(฿)</option>
                                                <option value="₣">French Franc(₣)</option>
                                                <option value="₽">Russian Ruble(₽)</option>
                                                <option value="﷼">Saudi Riyal(﷼)</option>
                                                <option value="₲">Paraguayan Guarani(₲)</option>
                                                <option value="₺">Turkish Lira(₺)</option>
                                                <option value="֏">Armenian Dram(֏)</option>
                                                <option value="ƒ">Dutch Guilder(ƒ)</option>
                                                <option value="₣">Swiss Franc(₣)</option>
                                                <option value="៛">Cambodian Riel(៛)</option>
                                                <option value="﷼">Iranian Rial(﷼)</option>
                                                <option value="ریال">Qatari Riyal(ریال)</option>
                                                <option value="ر.س">Saudi Riyal(ر.س)</option>
                                                <option value="₯">Greek Drachma(₯)</option>
                                            </select>

                                        </div>
                                       <div></div>
                                        <div class="col-lg-4 col-md-4 col-sm-12 col-12 r_weight_oz">
                                            <label class="mt-1" for="name">Weight per Unit (oz):</label>
                                            <input type="text" class="form-control" id="r_weight_oz" name="r_weight_oz" value="" step="any" title="Enter correct Weight" placeholder="16" required>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12 col-12 r_weight_pl">
                                            <label class="mt-1" for="name">Weight per Unit (lb):</label>
                                            <input type="text" class="form-control" id="r_weight_pl" name="r_weight_pl" value="" step="any" title="Enter correct Weight" placeholder="16"  required>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12 col-12 r_weight_kg">
                                            <label class="mt-1" for="name">Weight per Unit (kg):</label>
                                            <input type="text" class="form-control" id="r_weight_kg" name="r_weight_kg" value="" step="any" title="Enter correct Weight" placeholder="16"  required>
                                        </div>
                                         <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                            <label class="mt-1" for="name">Total Weight:</label>
                                            <input type="text" class="form-control" name="t_weight" value="{{old('t_weight')}}" id="t_weight" step="any" title="Enter Total Weight" placeholder="85" >
                                        </div>
                                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                       <label class="mt-1" for="name">Select unit for weight:</label>
                                        <select class="form-control" id="unit" required>
                                            <option value="oz">Oz</option>
                                            <option value="lb">Lb</option>
                                            <option value="kg">Kg</option>
                                        </select>
                                        </div>
                                        
                                            {{-- <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                <label class="mt-1" for="Picture">Upload Image: </label>
                                           
                                                <input type="file" class="form-control" name="pic" id="pic" accept="image/*">
                                            </div> --}}
                                    </div>
                                    <hr>
                                </div>
                                <input type="hidden" name="variant[]" id="varaint" > 
                                <!-- Add Variant Button -->
                                <!--<button type="button" id="addVariant" class="btn btn-primary">Add Variant</button>-->

                                <!--<table class="table">-->
                                <!--    <thead>-->
                                <!--        <tr>-->
                                <!--            <th>Price</th>-->
                                <!--            <th>Unit</th>-->
                                <!--            <th>Weight</th>-->
                                <!--            <th>Image</th>-->
                                <!--            <th>Actions</th>-->
                                <!--        </tr>-->
                                <!--    </thead>-->
                                <!--    <tbody>-->
                                <!--        {{-- <input type="text" class="form-control" name="r_price" value="{{old('price')}}" id="price" step="any" title="Enter correct Price" placeholder="85" > --}}-->

                                <!--       {{-- @foreach ( as )-->
                                           
                                <!--       @endforeach --}}-->
                                <!--    </tbody>-->
                                <!--</table>-->

                                 <div class="row mb-2">
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                        <label class="mt-1" for="Picture">Upload Image: </label>
                                   
                                        <input type="file" class="form-control" name="pic" id="pic" accept="image/*">
                                    </div>
                                    {{-- <div class="col-lg-4 col-md-4 col-sm-12 col-12 text-center">
                                        <label class="mt-1" for="subcategory">
                                            <input type="checkbox" class="form-control" name="featured" id="featured">Sales Item:
                                        </label>
                                    </div> --}}
                                   
                                </div> 

                                <!--<div class="row mb-2">-->
                                <!--    <div class="col-lg-12 col-md-12 col-sm-12 col-12">-->
                                <!--        <label class="mt-1" for="name">Description:</label>-->
                                <!--        <textarea class="form-control" name="desc" id="desc" value="{{old('desc')}}" placeholder="write description" cols="30" rows="3" required></textarea>-->
                                <!--    </div>-->
                                <!--</div>-->

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success btn-md">SAVE</button>
                                </div>
                            </form>
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

    <!-- import Modal -->
    <div class="modal" id="import-model">
        <div class="modal-dialog">
            <div class="modal-content-transparent">
                <!-- Modal body -->
                <div class="modal-body text-center">
                    <img src="{{ asset('images/gif-load.gif') }}" alt="" class="gif-size" style="width:100px">
                    <h4 class="service-add-text  text-white"><strong>Importing products</strong></h4>
                    <h4 class="service-add-text  text-white"><strong>Please Wait...</strong></h4>
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
        $('.r_weight_pl').hide();
        $('.r_weight_kg').hide();
        $('#r_weight_pl').prop('required',false);
        $('#r_weight_kg').prop('required',false);
       $('#r_weight_oz').prop('required',true);
         
       
        $('#import-model').modal('hide');
     
        $('BODY').on('click','.imp-sheet-btn',function()
        {
            var inp1 =  $('#category-id-import').val();
            var inp2 =  $('#sheet-import').val();
            var inp3 =  $('#sub-category-id').val();

            if (inp1 != '' && inp2 != '' && inp3 != '')
            {
                $('#import-model').modal({backdrop: 'static', keyboard: false}, 'show');
            }
            else
            {
                alert('Complete all fields');
            }
        });

        $('#category-id').change(function()
        {
            var cat_id = $(this).val();
            $.ajax({
                type: "GET",
                url: "{{route('get.subcat.json')}}",
                data: {
                    cat_id: cat_id,
                },
                success: function (data)
                {
                   $('.json-subcat-div').html(data.subcat_drop);
                },
            });
        });

        $('#category-id-import').change(function()
        {
            var cat_id = $(this).val();
            $.ajax({
                type: "GET",
                url: "{{route('get.subcat.json')}}",
                data: {
                    cat_id: cat_id,
                },
                success: function (data)
                {
                   $('.json-subcat-div').html(data.subcat_drop);
                },
            });
        });
        
        //unit selection
       $('#unit').on('change', function() {
   
            var unit_id = this.value;
            
            if(unit_id == 'oz'){
                
           $('.r_weight_pl').hide(); 
           $('.r_weight_kg').hide(); 
           $('#r_weight_pl').prop('required',false);
           $('#r_weight_kg').prop('required',false);
            $('#r_weight_oz').prop('required',true);
           $('.r_weight_oz').show();
            }
            else if(unit_id == 'lb'){
              
            $('.r_weight_oz').hide(); 
            $('.r_weight_kg').hide(); 
           $('.r_weight_pl').show();
            $('#r_weight_oz').prop('required',false);
            $('#r_weight_kg').prop('required',false);
           $('#r_weight_pl').prop('required',true);
            
            }
             else if(unit_id == 'kg'){
              
            $('.r_weight_oz').hide(); 
            $('.r_weight_pl').hide(); 
           $('.r_weight_kg').show();
            $('#r_weight_oz').prop('required',false);
           $('#r_weight_pl').prop('required',false);
            $('#r_weight_kg').prop('required',true);
            
            }
        });


     

        var variantCount = 0; // Counter for variant rows

$("#addVariant").click(function() {
    var unit = $("#unit").val();
    // var weight = unit === 'oz' ? $("#r_weight_oz").val() : $("#r_weight_pl").val();
    var weight = unit === 'oz' ? $("#r_weight_oz").val() : (unit === 'lb' ? $("#r_weight_lb").val() : $("#r_weight_kg").val());

    // var weight = unit === 'lb' ? $("#r_weight_lb").val() : $("#r_weight_pl").val();
    var price = $("#price").val();
    var image = $("#image").val();
    var variantInput = $("#varaint"); 

    // Increment the variant counter for unique IDs
    variantCount++;

    $("table tbody").append(
        "<tr>" +
        "<td><input type='text' name='variant_price[]' value='" + price + "' class='form-control'></td>"  +
        "<td><select class='form-control' name='variant_weight[]' required>" +
"<option value='oz'" + (unit === 'oz' ? " selected" : "") + ">Oz</option>" +
"<option value='lb'" + (unit === 'lb' ? " selected" : "") + ">Lb</option></select></td>" +
        "<td><input type='text' name='variant_unit[]' value='" + weight + "' class='form-control'></td>" +
        "<td><input type='file' name='variant_image[]' accept='image/*' class='form-control' id='image" + variantCount + "' ></td>" +
        "<td><button class='btn btn-danger delete-variant'>Delete</button></td>" +
        "</tr>"
    );

    // Clear input fields after adding a variant
    $("#price, #r_weight_oz, #r_weight_pl,#r_weight_kg").val("");
});

var variants = [];

$(document).on("click", "table .delete-variant", function(event) {
    event.preventDefault(); // Prevent the default action

    var row = $(this).closest("tr");
    var rowIndex = row.index(); // Get the index of the row to delete

    // Remove the variant from the array and the table
    variants.splice(rowIndex, 1);
    row.remove();

    // Update the hidden input with the updated array of variants
    $("#varaint").val(variants.join("; ")); // Join the array using a delimiter
});



    // Delete Variant Button Click Event
    // $("table").on("click", ".delete-variant", function() {
    //     var row = $(this).closest("tr");
    //     var rowIndex = row.index(); // Get the index of the row to delete

    //     // Remove the variant from the array and the table
    //     variants.splice(rowIndex, 1);
    //     row.remove();

    //     // Update the hidden input with the updated array of variants
    //     $("#varaint").val(variants.join("; ")); // Join the array using a delimiter
    // });


        
        
}); // end of doc ready



   

</script>