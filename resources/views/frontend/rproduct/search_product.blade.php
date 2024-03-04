@extends('frontend.layouts.master')

@section('style')
<style>
.product-search-input.product-input-btn {
    width: 60% !important;
}
.productsearch-btn.product-btnnn {
    padding: 5px!important;
    color: white!important;
    width: 30% !important;
    margin-top: 0px !important;
    font-size: 32px !important;
}
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

/*h1 {*/
/*    font-size: 68px;*/
/*    letter-spacing: -2px;*/
/*    text-align: center;*/
/*    padding-top: 30px;*/
/*    font-weight: 700;*/
/*    font-family: 'Lobster Two', cursive;*/
/*    text-shadow: 2px 2px rgba(12, 11, 11, 0.56);*/
/*}*/

/*.ie h1 {*/
/*    filter: dropshadow(color=#000000, offx=0, offy=3);*/
/*    padding-bottom: 12px;*/
/*}*/

/*.ie h2 {*/
/*    filter: dropshadow(color=#000000, offx=0, offy=3);*/
/*}*/

/*h3 {*/
/*    font-size: 25px;*/
/*    margin: 0.2em 0;*/
/*}*/

/*.ie h3 {*/
/*    filter: dropshadow(color=#000000, offx=0, offy=3);*/
/*}*/

/*h4 {*/
/*    margin-bottom: 5px;*/
/*}*/

/*p,*/
/*pre {*/
/*    margin: 0 0 10px 0;*/
/*}*/

    .category  h1, h2, h3{
        background: #F35901!important;
        width: 250px!important;
        padding: 10px!important;
        color: white!important;
        margin-bottom: 0px!important;
        margin-top: 15px!important;
    }
    .titel{
       height:60px; 
    }
    @media screen and (width: 768px) {
      .titel {
          font-size:20px;
          /*height:110px !important;*/
      }
    }
    
    @media screen and (width: 1024px) {
      .titel {
          height:115px !important;
      }
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
                                    <img class="d-block" src="{{asset('docs/pics/'.$marq->pic)}}" alt="">
                                    @else
                                    <img class="d-block" src="{{asset('docs/pics/no-image-png-5-Transparent-Images.png')}}" alt="">
                                    @endif
                                           
                                        </div>
                                    @endforeach
                                </section>
                                <div class="text-div">
                                    <!--<h4 class="text-center">WELCOME TO</h4>-->
                                    <!--<h1>ASLII MALL</h1>-->
                                    
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
                                            <h4 class="titel">{{$fea->name}}</h4>
                                            <p class="">${{number_format($fea->r_price,2)}}  / {{$fea->r_weight}} </p>
                                      @if($fea->out_of_stock == 1)
                                      <button class="btn btn-outline-primary mt-1 ">Out of stock</button>
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
                     <div class="rproducts">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                             @if(count($search_products) > 0)
                            <h5><b>{{count($search_products)}}</b> items found for <b>"{{$q}}"</b></h5>
                            @else
                            <div class="col-lg-12 col-md-12  col-sm-12 col-12 text-center pb-4 bottom-adjustment"> 
                            <i class="fa fa-search pb-4" style="font-size:6rem;color:#F35901"></i>
                            <h4>Search No Result</h4>
                              <h5>We're sorry. We cannot find any matches for your search <b></b>"{{$q}}"</b>.</h5>
                             </div>
                            @endif 
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($search_products as $prod)
                         <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                <div class="card">
                                    @if($prod->pic != null)
                                    <img class="card-img-top" src="{{asset('docs/pics/'.$prod->pic)}}" alt="">
                                    @else
                                    <img class="card-img-top" src="{{asset('docs/pics/no-image-png-5-Transparent-Images.png')}}" alt="">
                                    @endif
                                    <div class="card-body text-center">
                                        <h4 class=" text-center titel">{{$prod->name}}</h4>
                                        <p class=" text-center">${{$prod->r_price}} / {{$prod->r_weight}}</p>
                                       
                                        {{-- <button class="btn btn-outline-primary" value="{{ $prod->id }}" type="submit">Add to Cart</button> --}}
                                  
                                     @if($prod->out_of_stock == 1)
                                      <button class="btn btn-outline-primary mt-1 ">Out of stock</button>
                                      @else
                                            <button class="btn btn-outline-primary add-to-cart" value="{{ $prod->id }}">Add to cart</button>
                                      @endif
                                    </div>
                                </div>
                        </div>
                        @endforeach
                    </div>
                </div>
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
                                                <h4 class="titel">{{$fea->name}}</h4>
                                                <p class="">${{number_format($fea->r_price,2)}}  / {{$fea->r_weight}} </p>
                                                
                                                <button class="btn btn-outline-primary mt-3 add-to-cart-ret" value="{{$fea->id}}" type="submit">Add to Cart</button>
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
                    <div class="rproducts">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            @if(count($search_products) > 0)
                            <h5><b>{{count($search_products)}}</b> items found for <b>"{{$q}}"</b></h5>
                            @else
                            <div class="col-lg-12 col-md-12  col-sm-12 col-12 text-center pb-4 bottom-adjustment"> 
                            <i class="fa fa-search pb-4" style="font-size:6rem;color:#F35901"></i>
                            <h4>Search No Result</h4>
                              <h5>We're sorry. We cannot find any matches for your search <b></b>"{{$q}}"</b>.</h5>
                             </div>
                            @endif 
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($search_products as $prod)
                         <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                <div class="card">
                                   @if($prod->pic != null)
                                    <img class="card-img-top" src="{{asset('docs/pics/'.$prod->pic)}}" alt="">
                                    @else
                                    <img class="card-img-top" src="{{asset('docs/pics/no-image-png-5-Transparent-Images.png')}}" alt="">
                                    @endif
                                    <div class="card-body text-center">
                                        <h4 class=" text-center titel">{{$prod->name}}</h4>
                                        <p class=" text-center">${{$prod->r_price}} / {{$prod->r_weight}}</p>
                                      
                                        {{-- <button class="btn btn-outline-primary" value="{{ $prod->id }}" type="submit">Add to Cart</button> --}}
                                        
                                        
                                      @if($prod->out_of_stock == 1)
                                      <button class="btn btn-outline-primary mt-1 ">Out of stock</button>
                                      @else
                                        <button class="btn btn-outline-primary add-to-cart" value="{{ $prod->id }}">Add to cart</button>
                                      @endif
                                      
                                        
                                    </div>
                                </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

                </div>
            </div>
                @endif
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
<script>
    $(document).ready(function()
    {

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
