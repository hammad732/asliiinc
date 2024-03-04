@extends('admin.layouts.master')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{Auth::user()->fname}} {{Auth::user()->lname}} Dashboard</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <div class="container-fluid">
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
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-light">
                            <div class="inner">
                            <h3>{{App\Models\Marquee::count()}}</h3>

                            <p>Banner Marquees</p>
                            </div>
                            <div class="icon">
                            <i class="ion ion-image"></i>
                            </div>
                            <a href="{{route('sa.marquees.view')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-secondary">
                            <div class="inner">
                            <h3>{{App\User::count()}}</h3>

                            <p>Registered Users</p>
                            </div>
                            <div class="icon">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            </div>
                            <a href="{{route('sa.users.view')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    
                    <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{App\Models\Store::count()}}</h3>

                            <p>Stores</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{route('sa.stores.view')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                    </div>
                    <!-- ./col -->
                    
                    <div class="col-lg-3 col-6">
                    <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                            <h3>{{App\Models\Job::count()}}</h3>
                            <p>Job</p>
                            </div>
                            <div class="icon">
                            <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{route('sa.jobs.view')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    
                    <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{App\Models\Category::count()}}</h3>

                            <p>Categories</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{route('sa.categories.view')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                    <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                            <h3>{{App\Models\SubCategory::count()}}</h3>
                            <p>Sub Categories</p>
                            </div>
                            <div class="icon">
                            <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{route('sa.sub.categories.view')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-primary">
                            <div class="inner">
                            <h3>{{App\Models\RProduct::count()}}</h3>

                            <p>Products</p>
                            </div>
                            <div class="icon">
                            <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{route('sa.rproducts.view')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                            <h3>{{App\Models\Retailerorder::count()}}</h3>

                            <p>Orders</p>
                            </div>
                            <div class="icon">
                            <i class="fa fa-book" aria-hidden="true"></i>
                            </div>
                            <a href="{{route('sa.r.orders')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    
                    <!--<div class="col-lg-3 col-6">-->
                        <!-- small box -->
                    <!--    <div class="small-box bg-primary">-->
                    <!--        <div class="inner">-->
                    <!--        <h3>{{App\Models\DProduct::count()}}</h3>-->

                    <!--        <p>Distributor Products</p>-->
                    <!--        </div>-->
                    <!--        <div class="icon">-->
                    <!--        <i class="ion ion-bag"></i>-->
                    <!--        </div>-->
                    <!--        <a href="{{route('sa.dproducts.view')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!-- ./col -->
                    
                    <!--<div class="col-lg-3 col-6">-->
                        <!-- small box -->
                    <!--    <div class="small-box bg-info">-->
                    <!--        <div class="inner">-->
                    <!--        <h3>{{App\Models\Distributororder::count()}}</h3>-->

                    <!--        <p>Distributor Orders</p>-->
                    <!--        </div>-->
                    <!--        <div class="icon">-->
                    <!--        <i class="fa fa-book" aria-hidden="true"></i>-->
                    <!--        </div>-->
                    <!--        <a href="{{route('sa.d.orders')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!-- ./col -->
                    
                </div>
                <!-- /.row -->
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
