
@extends('frontend.layouts.master')
@section('title', 'Home')

<style>

#brands_new{
    margin-top: 55px !important;
}
</style>
@section('content')
<!--slider -->


<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    @foreach ($marquees as $index => $marquee)
      <li data-target="#myCarousel" data-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}"></li>
    @endforeach
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    @foreach ($marquees as $index => $marquee)
      <div class="item {{ $index == 0 ? 'active' : '' }}">
        <img src="{{ asset('docs/pics/'.$marquee->pic) }}" alt="Slide {{ $index + 1 }}" />
      </div>
    @endforeach
  </div>
</div>

<!--endslider -->

<!--brands-->

<div class="brands " id="brands_new">
  <div class="container">
    <h3>Products</h3>
    <div class="brands-agile">
      @foreach ($categories as $cat )   
      <div class="col-md-2 w3layouts-brand">
        <div class="brands-w3l">
          <p>
            <a href="{{route('allproducts', $cat->id)}}">{{$cat->name}}</a>
          </p>
        </div>
      </div>
      @endforeach       
      {{-- <div class="clearfix"></div> --}}
    </div>

  </div>
</div>
<!--//brands-->

  <!-- top-brands -->
  <!--<div class="top-brands">-->
  <!--  <div class="container">-->
  <!--    <div class="grid_3 grid_5">-->
  <!--      <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">-->
  <!--        <ul id="myTab" class="nav nav-tabs" role="tablist">-->
  <!--          <li role="presentation" class="active">-->
  <!--            <a href="" id="expeditions-tab" role="tab" data-toggle="tab" aria-controls="expeditions" aria-expanded="true">Products </a>-->
  <!--          </li>-->
           
  <!--        </ul>-->
  <!--        <div id="myTabContent" class="tab-content">-->
  <!--          <div role="tabpanel" class="tab-pane fade in active" id="expeditions" aria-labelledby="expeditions-tab">-->
  <!--            <div class="agile-tp">-->
                
  <!--            </div>-->
  <!--            <div class="agile_top_brands_grids">-->
  <!--              @foreach ($featured as $fea ) -->
  <!--              <div class="col-md-6 col-lg-4 col-xs-12 top_brand_left">-->
  <!--                <div class="hover14 column">-->
  <!--                  <div class="agile_top_brand_left_grid">-->
  <!--                    <div class="agile_top_brand_left_grid_pos">-->
  <!--                      <img src="{{ asset('assets/images/offer.png') }}" alt=" " class="img-responsive" />-->
  <!--                    </div>-->
  <!--                    <div class="agile_top_brand_left_grid1" id="agile_top_brand_left_grid2">-->
  <!--                      <figure>-->
  <!--                        <div class="snipcart-item block"> -->
  <!--                          <div class="snipcart-thumb">-->
  <!--                              <div class="row">-->
  <!--                              <div class="col-md-8">-->
  <!--                            @if($fea->pic != null)-->
  <!--                           <a href="{{route('view.rproduct', [ 'id' => $fea->id])}}">-->
  <!--                            <img class="d-block img-fluid" src="{{asset('docs/pics/'.$fea->pic)}}">-->
  <!--                           </a>-->
  <!--                             @else-->
  <!--                             <img class="d-block" src="{{asset('docs/pics/no-image-png-5-Transparent-Images.png')}}">-->
  <!--                             @endif -->

  <!--                            </div>-->
  <!--                            <div class="col-md-3 text-center available">-->
  <!--                              <span id="available-text">Available in:</span> -->
  <!--                            <div class="available-div">-->
  <!--                              <span><a href="{{route('view.rproduct', [ 'id' => $fea->id])}}">{{$fea->r_weight}}</a></span>-->
  <!--                              @foreach ($rproduct_variant as $variant)-->
  <!--                              @if($variant->r_product_id == $fea->id)-->
  <!--                                <span><a href="{{route('view.rproduct', [ 'id' => $fea->id])}}">{{$variant->unit}}{{$variant->weight}}</a></span> -->
  <!--                              @endif-->
  <!--                              @endforeach-->
                               
                             
  <!--                            </div>-->
  <!--                            </div>-->
  <!--                          </div>-->
  <!--                          <div class="row">-->
  <!--                            <p>{{$fea->name}}</p>-->
  <!--                            <h4>${{number_format($fea->r_price,2)}}  / {{$fea->r_weight}}</h4>-->
  <!--                          </div>-->
  <!--                          </div>-->
  <!--                          <div class="snipcart-details top_brand_home_details">-->
    
  <!--                                @if($fea->out_of_stock == 1)-->
  <!--                                <button class="add-to-cart-btn btn btn-outline-primary ">Out of stock</button>-->
  <!--                                @else-->
  <!--                                 <button class="add-to-cart-btn btn btn-outline-primary mt-1 add-to-cart-ret" value="{{$fea->id}}" type="submit">Add to Cart</button>-->
  <!--                                @endif-->

  <!--                          </div>-->
  <!--                        </div>-->
  <!--                      </figure>-->
  <!--                    </div>-->
  <!--                  </div>-->
  <!--                </div>-->
  <!--              </div>-->
  <!--              @endforeach-->
  <!--              <div class="clearfix"></div>            -->
  <!--            </div>    -->
                       
  <!--            </div>-->
  <!--          </div>-->
  <!--        </div>-->
  <!--      </div>-->
  <!--    </div>-->
  <!--  </div>-->
  <!--</div>-->
  <!-- //top-brands -->



 <!--<div id="myCarousel" class="carousel slide" data-ride="carousel">-->
 
  <!---728x90--->
  
  <!-- new -->
  <!--<div class="newproducts-w3agile">-->
  <!--  <div class="container">-->
  <!--    <h3>New Products</h3>-->
  <!--    <div class="agile_top_brands_grids">-->
  <!--      @foreach ($offers as $offer)-->
  <!--      <div class="col-md-6 col-lg-4 col-xs-12 top_brand_left">-->
  <!--        <div class="hover14 column">-->
  <!--          <div class="agile_top_brand_left_grid">-->
  <!--            <div class="agile_top_brand_left_grid_pos">-->
  <!--              <img src="{{ asset('assets/images/offer.png') }}" alt=" " class="img-responsive" />-->
  <!--            </div>-->
  <!--            <div class="agile_top_brand_left_grid1" id="agile_top_brand_left_grid2">-->
  <!--              <figure>-->
  <!--                <div class="snipcart-item block"> -->
  <!--                  <div class="snipcart-thumb">-->
  <!--                    {{-- <div class="d-flex"> --}}-->
  <!--                      <div class="row">-->
  <!--                      <div class="col-md-8">-->
  <!--                    @if($offer->pic != null)-->
  <!--                   <a href="{{route('view.rproduct', [ 'id' => $offer->id])}}">-->
  <!--                    <img class="d-block img-fluid" src="{{asset('docs/pics/'.$offer->pic)}}">-->
  <!--                   </a>-->
  <!--                     @else-->
  <!--                     <img class="d-block" src="{{asset('docs/pics/no-image-png-5-Transparent-Images.png')}}">-->
  <!--                     @endif -->

  <!--                    </div>-->
  <!--                    <div class="col-md-3 text-center available">-->
  <!--                      <span id="available-text">Available in:</span> -->
  <!--                    <div class="available-div">-->
  <!--                      <span><a href="{{route('view.rproduct', [ 'id' => $offer->id])}}">{{$offer->r_weight}}</a></span>-->
  <!--                      @foreach ($rproduct_variant as $variant)-->
  <!--                      @if($variant->r_product_id == $offer->id)-->
  <!--                        <span><a href="{{route('view.rproduct', [ 'id' => $offer->id])}}">{{$variant->unit}}{{$variant->weight}}</a></span> -->
  <!--                      @endif-->
  <!--                      @endforeach-->
                       
  <!--                      {{-- <span>hi</span>-->
  <!--                      <span>hi</span>-->
  <!--                      <span>hi</span> --}}-->
  <!--                    </div>-->
  <!--                    </div>-->
  <!--                  </div>-->
  <!--                    {{-- <a href=""><img title=" " alt=" " src="{{ asset('docs/pics/'.$fea->pic) }}" /></a> --}}-->
  <!--                 {{-- <p>available in:</p>-->
  <!--                  </div> --}}-->
  <!--                  <div class="row">-->
  <!--                    <p>{{$offer->name}}</p>-->
  <!--                    <h4>${{number_format($offer->r_price,2)}}  / {{$offer->r_weight}}</h4>-->
  <!--                  </div>-->
  <!--                  </div>-->
  <!--                  <div class="snipcart-details top_brand_home_details">-->
  <!--                    {{-- <form action="{{route('view.rproduct', [ 'id' => $fea->id])}}" method="post"> --}}-->
  <!--                      {{-- <fieldset> --}}-->
  <!--                        @if($offer->out_of_stock == 1)-->
  <!--                        <button class="add-to-cart-btn btn btn-outline-primary ">Out of stock</button>-->
  <!--                        @else-->
  <!--                         <button class="add-to-cart-btn btn btn-outline-primary mt-1 add-to-cart-ret" value="{{$offer->id}}" type="submit">Add to Cart</button>-->
  <!--                        @endif-->
  <!--                        {{-- <input type="submit" name="submit" value="Add to cart" class="button" /> --}}-->
  <!--                      {{-- </fieldset> --}}-->
  <!--                    {{-- </form> --}}-->
  <!--                  </div>-->
  <!--                </div>-->
  <!--              </figure>-->
  <!--            </div>-->
  <!--          </div>-->
  <!--        </div>-->
  <!--      </div>           -->
  <!--      @endforeach       -->
  <!--      <div class="clearfix"></div>-->
  <!--    </div>-->
  <!--  </div>-->
  <!--</div>-->
  <!-- //new -->
@endsection



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







{{-- Jquery CDN --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>



{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha512-bnIvzh6FU75ZKxp0GXLH9bewza/OIw6dLVh9ICg0gogclmYGguQJWl8U30WpbsGTqbIiAwxTsbe76DErLq5EDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
{{-- ======== slider js ========== --}}
<!-- Slick -->
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script> --}}

<script>
  // Function to set equal heights for product containers
  const setEqualHeight = () => {
    const productContainers = document.querySelectorAll('#agile_top_brand_left_grid2');

    // Reset heights to auto to get natural heights based on content
    productContainers.forEach(container => {
      container.style.height = 'auto';
    });

    // Get the tallest container height
    let maxHeight = 0;
    productContainers.forEach(container => {
      const containerHeight = container.clientHeight;
      maxHeight = Math.max(maxHeight, containerHeight);
    });

    // Set the tallest height for all product containers
    productContainers.forEach(container => {
      container.style.height = maxHeight + 'px';
    });
  };

  // Call setEqualHeight() when the window loads and on resize
  window.addEventListener('load', setEqualHeight);
  window.addEventListener('resize', setEqualHeight);
</script>

<script>
    $(document).ready(function()
    {
     

    $('.add-to-cart-ret').on("click", function()
        {
            var id = $(this).val();
     
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
                         window.location.replace("https://asliiinc.com/cart-display");
                    },

                });
          //  }
        });

        $('.add-to-cart-dis').on("click", function()
        {
            var id = $(this).val();
       
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
                        window.location.replace("https://asliiinc.com/cart-display");
                    },

                });
          //  }
           });
        });
  

</script>