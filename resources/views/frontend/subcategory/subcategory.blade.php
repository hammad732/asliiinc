@extends('frontend.layouts.master')

@section('style')
<style>
    .subcat-row{
       margin-bottom: 25rem;
    }
    
          .rproducts  h1, h2, h3{
        background: #F35901!important;
        width: 160px!important;
        /*padding: 10px!important;*/
        color: white!important;
        margin-bottom: 0px!important;
        margin-top: 15px!important;
        border-radius: .25rem;
        line-height: 1.4;
        font-size: 20px;
            /*margin:auto;*/

    }
      .back{
         background: #F35901!important;
        width: 160px!important;
        padding: 10px!important;
        color: white!important;
        margin-bottom: 5px!important;
        margin-top: 15px!important;
    }
    .card-body b {
    font-size: 16px;
}
    @media screen and (max-width: 576px) {
     .rproducts  h1, h2, h3{
        background: #F35901!important;
        width: 160px !important;
        padding: 10px!important;
        color: white!important;
        margin-bottom: 0px!important;
        margin-top: 15px!important;
        text-align:center !important;
            border-radius: .25rem;
            margin:auto;

    }
    .back-btn{
        text-align:center;
    }
    
}

</style>
@endsection

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper py-5">
        <!-- Main content -->
        <section class="content">

            {{-- sub category section --}}
            <div class="subcategory subcat-row">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                             @if (Auth::check() == 0)
                         <div class="back-btn">    <a href="{{Route('main')}}" class="btn btn-default back"><i class="fas fa-arrow-alt-circle-left"></i> Back</a></div>
                             @else
                     <div class="back-btn"><a href="{{Route('home')}}" class="btn btn-default back"><i class="fas fa-arrow-alt-circle-left"></i> Back</a></div>
                             @endif 
                            <h3 class="text-center">Sub Categories</h3>
                        </div>
                    </div> 
                    <div class="row">
                        @if($main_cat=='Cook food & Catering')
                         <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                            <a class="nav-link sub-cat-link " href="http://tzzaa.com/">
                                <div class="card">
                                    <div class="card-body">
                                        <b>Catering</b> <span class="float-right"><i class="fa fa-arrow-right"></i></span>
                                        <!--<h4 class="card-title "></h4>-->
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endif
                        @foreach ($sub_categories as $subcat)
                        
                        <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                            <a class="nav-link sub-cat-link " href="{{route('rproduct.list', ['name' => $subcat->name])}}">
                                <div class="card">
                                    {{-- <img class="card-img-top" src="{{asset('images/rproducts/chicken.png')}}" alt=""> --}}
                                    <div class="card-body">
                                        <b>{{$subcat->name}} </b> <span class="float-right"><i class="fa fa-arrow-right"></i></span>
                                        <!--<h4 class="card-title "></h4>-->
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
