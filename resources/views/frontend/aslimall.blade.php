@extends('frontend.layouts.master')

@section('style')
<style>
.slide-cards{
      border: 1px solid #ccc;
      border-radius: 5px;
      margin:5px;
}
.modal-footer .btn-primary{
    color:white!important;
    background-color:#F35901!important;
}
label {
    color: #F35901!important;
}
h4 {
    color: #F35901!important;
}
p {
    color: #F35901!important;
}
.title{
  height: 45px;  
} 
@media only screen and (min-width: 768px) and (max-width: 1024px)
{
    .title{
     height: 80px;
    }
}



    .category  h1, h2, h3{
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
            
            {{-- banner section --}}
            <div class="banner">
                {{-- <div class="container-fluid"> --}}
                    {{-- <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12"> --}}
                            <div class="marquee-div">
                                {{-- main page slider--}}
                                 <section class="main-marquee slider">
                                    @foreach ($marquees as $marq)
                                        <div class="slide text-center">
                                            @if($marq->pic != null)
                                            <img class="d-block" src="{{asset('docs/pics/'.$marq->pic)}}">
                                             @else
                                             <img class="d-block" src="{{asset('docs/pics/no-image-png-5-Transparent-Images.png')}}">
                                             @endif 
                                        </div>
                                    @endforeach
                                </section>
                                <div class="text-div">
                                </div>
                            </div>
                        {{-- </div>
                    </div> --}}
                {{-- </div> --}}
            </div>
            {{-- not loggedin --}}
            @if (Auth::check() == 0)
                {{-- Featured section --}}
                <div class="trending">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                <h2 class="text-center mb-2 home-heading">Sales Items</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                {{-- Featured slider--}}
                                <section class="customer-logos slider">
                                    @foreach ($featured as $fea)
                                        <div class="slide text-center ">
                                             @if($fea->pic != null)
                                            <img class="d-block" src="{{asset('docs/pics/'.$fea->pic)}}">
                                             @else
                                             <img class="d-block" src="{{asset('docs/pics/no-image-png-5-Transparent-Images.png')}}">
                                             @endif 
                                            <h4 class="title">{{$fea->name}}</h4>
                                            <p class="">${{number_format($fea->r_price,2)}}  / {{$fea->r_weight}}</p>
                                            <!--<a href="{{route('view.rproduct', [ 'id' => $fea->id])}}" type="button" class="btn btn-outline-warning mt-1">view</a>-->
                                           
                                             @if($fea->out_of_stock == 1)
                                              <button class="btn btn-outline-primary ">Out of stock</button>
                                              @else
                                               <button class="btn btn-outline-primary mt-1 add-to-cart-ret" value="{{$fea->id}}" type="submit">Add to Cart</button>
                                              @endif
                                        </div>
                                    @endforeach
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            {{-- category section --}}
            <div class="category">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-5 col-12">
                            <h2 class="text-center mb-2 home-heading">Products</h2>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-7 col-12">
                           <div class="form-div">
                             <form class="form-s" action="{{Route('product_search')}}" method="">
                                 @csrf
                                <input class="search-form-control mr-sm-2 product-search-input product-input-btn" name="search" type="search" placeholder="Search" aria-label="Search">
                               <button class="btn btn-outline-primary  my-sm-0 productsearch-btn product-btnnn" type="submit">Search</button>
                             </form>
                           </div>
                        </div>
                    </div>
                    <div class="row categories-set">
                        @foreach ($categories as $cat)
                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                            <a class="cat-link" href="{{route('subcategories.list', ['name' => $cat->name])}}">
                                <div class="card">
                                    {{-- <img class="card-img-top" src="{{asset('images/rproducts/chicken.png')}}" alt=""> --}}
                                    <div class="card-body">
                                        <b>{{$cat->name}}</b> <span class="float-right"><i class="fa fa-arrow-right"></i></span>
                                        <!--<h5 class=" text-center"></h5>-->
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

           @endif

            @if (Auth::check() == 1)
            
           
                @php
                    $user = Auth::user();
                    $roleName = $user->getRoleNames();
                @endphp

                {{-- Retailer Slider --}}
                @if ($roleName[0] == 'Retailer' || $roleName[0] == 'Super Admin')
               
                    {{-- Featured section --}}
                    <div class="trending mb-2">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h2 class="text-center mb-2 home-heading">Sales Items</h2><hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    {{-- Featured slider--}}
                                    <section class="customer-logos slider">
                                        @foreach ($featured as $fea)
                                            <div class="slide text-center ">
                                                @if($fea->pic != null)
                                                <img class="d-block" src="{{asset('docs/pics/'.$fea->pic)}}">
                                                 @else
                                                 <img class="d-block" src="{{asset('docs/pics/no-image-png-5-Transparent-Images.png')}}">
                                                 @endif 
                                                <h4 class="title">{{$fea->name}}</h4>
                                                <p class="">${{number_format($fea->r_price,2)}}  / {{$fea->r_weight}}</p>
                                                <!--<a href="{{route('view.rproduct', [ 'id' => $fea->id])}}" type="button" class="btn btn-outline-warning mt-3">view</a>-->
                                              
                                     @if($fea->out_of_stock == 1)
                                      <button class="btn btn-outline-primary ">Out of stock</button>
                                      @else
                    
                                        <button class="btn btn-outline-primary mt-3 add-to-cart-ret" value="{{$fea->id}}" type="submit">Add to Cart</button>
                                      @endif
                                            </div>
                                        @endforeach
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                      {{-- category section --}}
                 <div class="category">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                            <h2 class="text-center mb-2 home-heading">Products</h2>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                           <div class="form-div">
                              <form class="form-s" action="{{Route('product_search')}}" method="">
                                 @csrf
                                <input class="search-form-control mr-sm-2 product-search-input product-input-btn" name="search" type="search" placeholder="Search" aria-label="Search">
                               <button class="btn btn-outline-primary  my-sm-0 productsearch-btn product-btnnn" type="submit">Search</button>
                             </form>
                           </div>
                        </div>
                    </div>
                    <div class="row categories-set">
                        @foreach ($categories as $cat)
                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                            <a class="cat-link" href="{{route('subcategories.list', ['name' => $cat->name])}}">
                                <div class="card">
                                    {{-- <img class="card-img-top" src="{{asset('images/rproducts/chicken.png')}}" alt=""> --}}
                                    <div class="card-body">
                                        <b>{{$cat->name}}</b> <span class="float-right"><i class="fa fa-arrow-right"></i></span>
                                        <!--<h5 class=" text-center"></h5>-->
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
                @endif

                {{-- distributor Slider --}}
                <!--@if ($roleName[0] == 'Distributor' || $roleName[0] == 'Super Admin')-->
                <!--    {{-- sales section --}}-->
                <!--    <div class="trending mb-2">-->
                <!--        <div class="container">-->
                <!--            <div class="row">-->
                <!--                <div class="col-lg-12 col-md-12 col-sm-12 col-12">-->
                <!--                    <h2 class="text-center mb-2 home-heading">Sales</h2><hr>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--            <div class="row">-->
                <!--                <div class="col-lg-12 col-md-12 col-sm-12 col-12">-->
                <!--                    {{-- Featured slider--}}-->
                <!--                    <section class="customer-logos slider">-->
                <!--                        @foreach ($sales as $fea)-->
                <!--                            <div class="slide text-center ">-->
                <!--                                <img class="d-block" src="{{asset('docs/pics/'.$fea->pic)}}">-->
                <!--                                <h4 class="">{{$fea->name}}</h4>-->
                <!--                                <p class="">${{number_format($fea->d_price,2)}} / Case <br>-->
                <!--                                {{$fea->d_weight}}oz / Unit-->
                <!--                                </p>-->
                <!--                                <a href="{{route('view.dproduct', [ 'id' => $fea->id])}}" type="button" class="btn btn-outline-warning mt-3">view</a>-->
                <!--                                <button class="btn btn-outline-primary mt-3 add-to-cart-dis"value="{{$fea->id}}"  type="submit">Add to Cart</button>-->
                <!--                            </div>-->
                <!--                        @endforeach-->
                <!--                    </section>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--@endif-->
            @endif

            {{-- ==== for AJAX  --}}
            @if (Auth::check())
                <input type="hidden" name="auth" id="auth-id" value="1">
            @else
                <input type="hidden" name="auth" id="auth-id" value="0">
            @endif

            <!-- login Modal -->
            <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>

                <!-- loader Modal -->
            <div class="modal" id="myModal2">
                <div class="modal-dialog">
                    <div class="modal-content-transparent">


                        <!-- Modal body -->
                        <div class="modal-body text-center">
                            <img src="{{ asset('images/gif-load.gif') }}" alt="" class="gif-size" style="width:100px">
                            <h4 class="product-add-text d-none text-white"><strong>Product Added Successfully!</strong></h4>
                        </div>


                    </div>
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

{{-- Jquery CDN --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

{{-- ======== slider js ========== --}}
<!-- Slick -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>

<script>
    $(document).ready(function()
    {
          // ======== slider at main-marquee ==========
        $('.main-marquee').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            arrows: false,
            dots: false,
            pauseOnHover: false,
            vertical: false,
            verticalSwiping: false,
            infinite: true,
             adaptiveHeight: true,
             arrows: false,
            responsive: [
                {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1
                }
            }, {
                breakpoint: 520,
                settings: {
                    slidesToShow: 1
                }
            }]
        });

        $('.add-to-cart-ret').on("click", function()
        {
            var id = $(this).val();
           //  var auth = $('#auth-id').val();

            // if (auth == 0)
            // {
            //     $('#loginModal').modal({backdrop: 'static', keyboard: false}, 'show');
            // }
            // else if(auth == 1)
            // {
                $('#myModal2').modal({backdrop: 'static', keyboard: false}, 'show');
                $.ajax({
                    type: "GET",
                    url: "{{ route('cart.add',"+id+") }}",
                    data:
                    {
                        id: id
                    },
                    success: function (data)
                    {
                        setTimeout(function(){
                            $('.product-add-text').removeClass('d-none');
                        }, 500);
                        setTimeout(function(){
                            $('.product-add-text').addClass('d-none');
                            $('#myModal2').modal('hide');
                        }, 1000);
                        $('#basket').html(data.cart_count);
                        // $("#basket").effect( "bounce", {times:3}, 300 );
                         window.location.replace("http://asliimall.com/cart-display");
                    },

                });
          //  }
        });

        $('.add-to-cart-dis').on("click", function()
        {
            var id = $(this).val();
            //var auth = $('#auth-id').val();

            // if (auth == 0)
            // {
            //     $('#loginModal').modal({backdrop: 'static', keyboard: false}, 'show');
            // }
            // else if(auth == 1)
            // {
                $('#myModal2').modal({backdrop: 'static', keyboard: false}, 'show');
                $.ajax({
                    type: "GET",
                    url: "{{ route('d.cart.add',"+id+") }}",
                    data:
                    {
                        id: id
                    },
                    success: function (data)
                    {
                        setTimeout(function(){
                            $('.product-add-text').removeClass('d-none');
                        }, 500);
                        setTimeout(function(){
                            $('.product-add-text').addClass('d-none');
                            $('#myModal2').modal('hide');
                        }, 1000);
                        $('#basket').html(data.cart_count);
                        // $("#basket").effect( "bounce", {times:3}, 300 );
                        window.location.replace("http://asliimall.com/cart-display");
                    },

                });
          //  }
        });


    });
</script>
