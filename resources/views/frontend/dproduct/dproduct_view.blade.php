@extends('frontend.layouts.master')

@section('style')
<style>

      #img-zoomer-box {
    width: 500px;
    height: auto;
    position: relative;
    margin-top: 10px;
  }
  
  #img1 {
    width: 100%;
    height: auto;
  }
  
  #img-zoomer-box:hover, #img-zoomer-box:active {
    cursor: zoom-in;
    display: block;
  }
  
  #img-zoomer-box:hover #img2, #img-zoomer-box:active #img2 {
    opacity: 1;
  }
  #img2 {
    width: 340px;
    height: 340px;
    /*background: url('https://bit.ly/2mgDw0y') no-repeat #FFF;*/
    box-shadow: 0 5px 10px -2px rgba(0,0,0,0.3);
    pointer-events: none;
    position: absolute;
    opacity: 0;
    border: 4px solid whitesmoke;
    z-index: 99;
    border-radius: 100%;
    display: block;
    transition: opacity .2s;
  }
  
      .rproducts  h1, h2, h3{
        background: #F35901!important;
        width: 350px!important;
        padding: 10px!important;
        color: white!important;
        margin-bottom: 0px!important;
        margin-top: 15px!important;
       
    }
    
   
   h4 {
    color: #F35901!important;
} 
h5 {
    color: #F35901!important;
}
p {
    color: #F35901!important;
}

.modal-footer .btn-primary{
    color:white!important;
    background-color:#F35901!important;
}
label {
    color: #F35901!important;
}

</style>
@endsection

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">

            {{-- dproduct-view section --}}
            <div class="rproduct-view">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                        </div>
                    </div>
                    <h3>Distributor Product Detail:</h3>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                            <div class="card img-card">
                                
                                <!--<div id="img-zoomer-box">-->
                                <!--  <img src="{{asset('../../docs/pics/'.$dproduct->first()->pic)}}" id="img1" />-->
                                <!--  <div >-->
                                <!--      <img src="{{asset('../../docs/pics/'.$dproduct->first()->pic)}}" id="img2" />-->
                                <!--  </div>-->
                                <!--</div>-->
                                
                                <img id="single-prod-img" class="card-img-top" src="{{asset('../../docs/pics/'.$dproduct->first()->pic)}}" alt="">
                            
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-12 col-12 mt-5">
                            <!--<div class="zoom-image">-->
                            <!--    <img id="single-prod-img" style="width:1200px;height:800px" class="card-img-top" src="{{asset('../../docs/pics/'.$dproduct->first()->pic)}}" alt="">-->
                            <!--</div>-->
                            <div class="product-detail">
                                <h2 class="mb-3">{{$dproduct->first()->name}}</h2>
                                <h4 class="mb-5 ">{{$dproduct->first()->desc}}</h5>
                                <hr>
                                <p class="mb-3">Quantity:
                                    <button id="inc-btn-id" class="btn btn-secondary" type="button">+</button>
                                    <input id="qty-id" class="form-control" type="text" name="quantity" value="1" readonly>
                                    <button id="dec-btn-id" class="btn btn-secondary" type="button">-</button>
                                </p>
                                <p>No of Cases: <span id="lb-id">1</span></p>
                                <p>Weight: <span id="">{{$dproduct->first()->d_weight}}oz / Unit</span></p>
                                <hr class="mb-3">
    
                                <input type="hidden" name="unit_price" value="{{$dproduct->first()->d_price}}" id="unitprice-id">
                                <input type="hidden" name="unit_weight" value="1" id="unitweight-id">
    
                                <h5 >Price (USD): $<span id="price-id" class="price-span">{{number_format($dproduct->first()->d_price,2)}}</span></h4>
                                {{-- <button class="btn btn-outline-primary mt-3 mb-3" type="submit">Buy Now</button> --}}
                                    <button class="btn btn-outline-primary mt-3 mb-3 add-to-cart-view" value="{{$dproduct->first()->id}}"type="submit">Add to Cart</button>
                                <hr>
                                <span class="share-span">SHARE Distributor PRODUCT:</span>
                                <div class="fa-icons-div">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-3"><a href="http://"><i class="fab fa-facebook-square"></i></a></div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-3"><a href="http://"><i class="fab fa-twitter-square"></i></i></a></div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-3"><a href="http://"><i class="fab fa-instagram"></i></a></div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-3"><a href="http://"><i class="fab fa-whatsapp"></i></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                            {{-- Featured slider at dproduct-view--}}
                            <h3>Sales Distributor Items:</h3>
                            <div class="card">
                                <div class="card-body">
                                    <section class="customer-logos-rproduct-view slider">
                                        @foreach ($featured as $fea)
                                            <div class="slide text-center">
                                                <img style="height: 250px" class="d-block" src="{{asset('../../docs/pics/'.$fea->pic)}}">
                                                <h4 class="">{{$fea->name}} / Case</h4>
                                                <p>Price (USD) ${{number_format($fea->d_price,2)}} / Case</p>
                                                <p>{{$fea->d_weight}}oz / Unit</p>
                                                <a href="{{route('view.dproduct', [ 'id' => $fea->id])}}" type="button" class="btn btn-outline-primary mt-3">view</a>
                                                {{-- <button class="btn btn-outline-primary mt-3" type="submit">Add to Cart</button> --}}
                                            </div>
                                            <hr>
                                        @endforeach
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
                            <h4 class="product-add-text  text-white"><strong>Product Added Successfully!</strong></h4>
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

<script>

    $(document).ready(function ()
    {
        $('#qty-id').val(1);

        // $('#single-prod-img').mouseenter(function(){
        //     $('.zoom-image').show();
        //     $('.product-detail').hide();
        // });
        // $('#single-prod-img').mouseleave(function(){
            
        //     $('.zoom-image').hide();
        //     $('.product-detail').show();
        // });

        $('.add-to-cart-view').on("click", function()
        {
            var id = $(this).val();
           // var auth = $('#auth-id').val();

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
         //   }
        });

        $('#inc-btn-id').click(function ()
        {
            var inc_val = $('#qty-id').val();
            var lb_val = $('#lb-id').html();
            var unitprice_val = $('#unitprice-id').val();
            var unitweight_val = $('#unitweight-id').val();
            var price_val = $('#price-id').html();

            if (inc_val == 10)
            {
                $('#qty-id').val(10);
            }
            else
            {
                inc_val = parseInt(inc_val) + 1;
                lb_val = parseInt(lb_val);
                price_val = parseFloat(price_val);
                unitprice_val = parseFloat(unitprice_val);
                unitweight_val = parseInt(unitweight_val);

                $('#qty-id').val(inc_val);
                $('#lb-id').html(lb_val + unitweight_val);
                $('#price-id').html((price_val + unitprice_val).toFixed(2));
            }
        });

        $('#dec-btn-id').click(function ()
        {
            var inc_val = $('#qty-id').val();
            var lb_val = $('#lb-id').html();
            var unitprice_val = $('#unitprice-id').val();
            var unitweight_val = $('#unitweight-id').val();
            var price_val = $('#price-id').html();

            if (inc_val == 1)
            {
                $('#qty-id').val(1);
            }
            else
            {
                inc_val = parseInt(inc_val) - 1;
                lb_val = parseInt(lb_val);
                price_val = parseFloat(price_val);
                unitprice_val = parseFloat(unitprice_val);
                unitweight_val = parseInt(unitweight_val);

                $('#qty-id').val(inc_val);
                $('#lb-id').html(lb_val - unitweight_val);
                $('#price-id').html((price_val - unitprice_val).toFixed(2));
            }
        });

    }); // End of doc ready
    
    
    
    var zoomer = function (){
    document.getElementById('img-zoomer-box')
      .addEventListener('mousemove', function(e) {
  
      var original = document.getElementById('img1'),
          magnified = document.getElementById('img2'),
          style = magnified.style,
          x = e.pageX - this.offsetLeft,
          y = e.pageY - this.offsetTop,
          imgWidth = original.width,
          imgHeight = original.height,
          xperc = ((x/imgWidth) * 100),
          yperc = ((y/imgHeight) * 100);
  
      if(x > (.01 * imgWidth)) {
        xperc += (.15 * xperc);
      };//lets user scroll past right edge of image
  
      if(y >= (.01 * imgHeight)) {
        yperc += (.15 * yperc);
      };//lets user scroll past bottom edge of image
  
      style.backgroundPositionX = (xperc - 9) + '%';
      style.backgroundPositionY = (yperc - 9) + '%';
  
      style.left = (x - 180) + 'px';
      style.top = (y - 180) + 'px';
  
    }, false);
  }();
  
  
</script>
