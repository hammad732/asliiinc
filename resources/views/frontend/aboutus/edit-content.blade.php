@extends('admin.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <h1 class="text-center text-dark"><b>Edit About Content</b></h1>
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
                            <form action="{{route('content.update')}}" method="post" enctype="multipart/form-data">
                                @csrf
                               <input type="hidden" name="id" value="{{$content->id}}">
                                <div class="row mb-2">
                                    {{-- <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                        <label class="mt-1" for="name">Service Name:</label>
                                        <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}" placeholder="Fish" required>
                                    </div> --}}
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                        <label class="mt-1" for="heading">Content Heading:</label>
                                        <input type="text" class="form-control" name="heading" id="heading" value="{{$content->heading}}" placeholder="Heading" required>
                                    </div>
                                  

                                  
                                </div>
                                <hr>   

                                 <div class="row mb-2">
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                        <label class="mt-1" for="image">Upload Image: </label>
                                   
                                        <input type="file" class="form-control" name="image" id="image" accept="image/*">
                                    </div>
                                   
                                </div> 

                                <div class="row mb-2">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                        <label class="mt-1" for="text">Description:</label>
                                        <textarea name="text" id="text" >{!!$content->text!!} </textarea>
                                        {{-- <textarea class="form-control" name="text" id="text" placeholder="write description" cols="30" rows="3" required>{{$service->text}}</textarea> --}}
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success btn-md">Update</button>
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

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script src="https://cdn.tiny.cloud/1/q7ow9ld171nez8h70is8pzhzafij2muj43b2p8bw5jbe6z4c/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<script>
    
    tinymce.init({
   selector: '#text',
   height: 500,
       plugins: [
       'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
       'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
       'table emoticons template paste help codesample', 'image'
       ],
   
    
       toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
       'bullist numlist outdent indent | link image | print preview media fullpage | ' +
       'forecolor backcolor emoticons | help | codesample',
       menu: {
           favs: {title: 'My Favorites', items: 'code visualaid | searchreplace | spellchecker | emoticons'}
       },
       menubar: 'favs file edit view insert format tools table help'
     });
   tinymce.activeEditor.execCommand('mceCodeEditor');
</script>
    
   

    @endsection
