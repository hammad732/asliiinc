@extends('admin.layouts.master')

<style>
    .add-new-varient{
        color: #fff;
    }
</style>

@section('content')
{{-- @dd($aboutContent) --}}
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <h1 class="text-center text-dark"><b>List of About Content</b></h1>
                        <center><p class="text-center product-update-msg bg-success m-0 w-25 rounded"></p></center>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
     
{{-- <div>  <button  type="button" class="btn btn-success mb-2" ><b><a href="{{route('service.create')}}">Add New Service </a></b></button></div> --}}
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
                                          
                                            <th>Text</th>
                                            <th>Edit</th>
                                            {{-- <th>Delete</th> --}}
                                            
                                        </tr>
                                    </thead>
                                    {{-- @dd($service) --}}
                                    <tbody>
                                        
                                        <tr>
                                            <td>{{$service[0]->id}}</td>
                                    
                                            <td>
                                                @if($service[0]->banner_image != null)
                                                    <img src="{{ asset('/docs/pics/'.$service[0]->banner_image) }}" width="50px" />
                                                @else
                                                  <p>No Image Available</p>
                                                @endif
                                                </td>
                                           
                                            <td>{{$service[0]->banner_title}}</td>
                                            <td>
                                                @if($service[0]->text != null)
                                                    {{$service[0]->text}}
                                                @else
                                                  <p>No Text Available</p>
                                                @endif
                                                </td>

                                            <td>
                                                <a href="{{route('aboutus.edit', $service[0]->id)}}" id="edit-btn" class="btn btn-primary btn-sm" >Edit</a>
                                            </td>
                                            {{-- <td>
                                               
                                                <a href="{{route('service.delete', $service[0]->id)}}" type="button" class="btn btn-danger btn-sm del-btn">Delete</a>
                                            </td> --}}
                                           
                                        </tr>
                                     
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






        {{-- CONTENT SECTION --}}

        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <h1 class="text-center text-dark"><b>List of Contents</b></h1>
                        <center><p class="text-center product-update-msg bg-success m-0 w-25 rounded"></p></center>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
     
<div>  <button  type="button" class="btn btn-success mb-2" ><b><a href="{{route('content.create')}}" class="add-new-varient">Add New Content </a></b></button></div>
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
                                          
                                            <th>Text</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                            
                                        </tr>
                                    </thead>
                                    {{-- @dd($service) --}}
                                    <tbody>
                                        @foreach ($aboutContent as $content)
                                            
                                        
                                        <tr>
                                            <td>{{$content->id}}</td>
                                    
                                            <td>
                                                @if($content->image != null)
                                                    <img src="{{ asset('/docs/pics/'.$content->image) }}" width="50px" />
                                                @else
                                                  <p>No Image Available</p>
                                                @endif
                                                </td>
                                           
                                            <td>{{$content->heading}}</td>
                                            <td>
                                                @if($content->text != null)
                                                    {{$content->text}}
                                                @else
                                                  <p>No Text Available</p>
                                                @endif
                                                </td>

                                            <td>
                                                <a href="{{route('content.edit', $content->id)}}" id="edit-btn" class="btn btn-primary btn-sm" >Edit</a>
                                            </td>
                                            <td>
                                               
                                                <a href="{{route('content.delete', $content->id)}}" type="button" class="btn btn-danger btn-sm del-btn">Delete</a>
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







    </div>
    <!-- /.content-wrapper -->

  
    @endsection

{{-- Jquery CDN --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>



