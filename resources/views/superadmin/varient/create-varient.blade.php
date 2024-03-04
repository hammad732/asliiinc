@extends('admin.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <h1 class="text-center text-dark"><b>Add New varient</b></h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
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
                            <form action="{{route('varient.save')}}" method="post" enctype="multipart/form-data">
                                @csrf
                               <input type="hidden" name="r_product_id" value="{{$id}}">
                                <div class="row mb-2">
                                    {{-- <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                        <label class="mt-1" for="name">Service Name:</label>
                                        <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}" placeholder="Fish" required>
                                    </div> --}}
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                        <label class="mt-1" for="heading">Price:</label>
                                        <input type="text" class="form-control" name="price" id="Price" value="{{old('Price')}}" placeholder="Price" required>
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                        <label class="mt-1" for="heading">Weight:</label>
                                        <input type="text" class="form-control" name="unit" id="Unit" value="{{old('Unit')}}" placeholder="Weight" required>
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                        <label class="mt-1" for="heading">Unit:</label>
                                        <select class="form-control" id="unit" name="weight" required>
                                            <option value="" disabled selected>Select Unit</option>
                                            <option value="oz">Oz</option>
                                            <option value="lb">Lb</option>
                                        </select>
                                        {{-- <input type="text" class="form-control" name="weight" id="Weight" value="{{old('Weight')}}" placeholder="Weight" required> --}}
                                    </div>
                                    
                                  
                                </div>
                                <hr>

                               
                             
                         

                                 <div class="row mb-2">
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                        <label class="mt-1" for="image">Upload Image: </label>
                                   
                                        <input type="file" class="form-control" name="image" id="image" accept="image/*">
                                    </div>
                                    {{-- <div class="col-lg-4 col-md-4 col-sm-12 col-12 text-center">
                                        <label class="mt-1" for="subcategory">
                                            <input type="checkbox" class="form-control" name="featured" id="featured">Sales Item:
                                        </label>
                                    </div> --}}
                                   
                                </div> 

                               

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

   
  

    

    @endsection
