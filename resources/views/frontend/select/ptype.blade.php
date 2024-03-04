@extends('frontend.layouts.master')

@section('style')
<style>
    .subcat-row{
        height:70vh;
    }
    
          .rproducts  h1, h2, h3{
        background: #F35901!important;
        width: 250px!important;
        padding: 10px!important;
        color: white!important;
        margin-bottom: 0px!important;
        margin-top: 15px!important;
    }
</style>
@endsection

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">

            {{-- sub category section --}}
            <div class="subcategory subcat-row">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <h3>Select</h3>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-0 col-0"></div>
                        <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                            <a class="nav-link " href="{{route('sa.frontend.rproducts', ['name' => $name])}}">
                                <div class="card">
                                    <div class="card-body">
                                        <b>Retailer</b> <span class="float-right"><i class="fa fa-arrow-right"></i></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!--<div class="col-lg-4 col-md-6 col-sm-12 col-12">-->
                        <!--    <a class="nav-link " href="{{route('sa.frontend.dproducts', ['name' => $name])}}">-->
                        <!--        <div class="card">-->
                        <!--            <div class="card-body">-->
                        <!--                <b>Distributor</b> <span class="float-right"><i class="fa fa-arrow-right"></i></span>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </a>-->
                        <!--</div>-->
                        <div class="col-lg-2 col-md-2 col-sm-0 col-0"></div>
                    </div>
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
