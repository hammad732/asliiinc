@extends('frontend.layouts.master')

@section('title', 'All Products')

<style>

  .back-btn:hover{
    color: #F35901;
  }
 .newproducts-w3agile {
    position: relative;
}

.back-btn {
    color: #f35901;
    text-decoration: none;
    left: 18px;
}
  .back-btn > i{
    margin-right: 5px;
  }
  .snipcart-thumb-inner{
      margin-top:10px;
  }
  .snipcart-thumb-inner h6{
      font-weight:600;
      margin-bottom:5px;
      margin-top:5px;
      font-size: 14px;
  }
  .text{
       text-align: left !important;
  }
 .agile_top_brand_left_grid1 img {
    margin: 0 auto !important;
    object-fit: scale-down !important;
}

#scroll-to-top {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  background-color: F35901;
  color: white;
  cursor: pointer;
  padding: 18px;
  border-radius: 50%;
}

</style>


@section('content')
 <button onclick="topFunction()" id="scroll-to-top" title="Go to top"><i class="fa fa-arrow-up"></i></button>
<div class="newproducts-w3agile">
    <div class="container">
      
      <a href="{{route('home')}}" class="back-btn"> <i class="fa fa-arrow-left"></i> Back</a>
      
      <h3>{{$categories->name}}</h3>
   
      <div class="agile_top_brands_grids">

        {{-- added $index=> in the loop for pagination to be displayed below --}}
        @foreach ($featured as $fea ) 
        {{-- @dd($featured)               --}}
        <!--<div class="col-md-6 col-lg-4 col-xs-12 top_brand_left">-->
        <!--  <div class="hover14 column">-->
        <!--    <div class="agile_top_brand_left_grid">-->
        <!--      <div class="agile_top_brand_left_grid_pos">-->
        <!--        <img src="{{ asset('assets/images/offer.png') }}" alt=" " class="img-responsive" />-->
        <!--      </div>-->
        <!--      <div class="agile_top_brand_left_grid1" id="agile_top_brand_left_grid2">-->
                <!--<figure>-->
                <!--  <div class="snipcart-item block"> -->
                <!--    <div class="snipcart-thumb">-->
                <!--      {{-- <div class="d-flex"> --}}-->
                <!--        <div class="row">-->
                <!--        <div class="col-md-8">-->
                <!--      @if($fea->pic != null)-->
                <!--     <a href="{{route('view.rproduct', [ 'id' => $fea->id])}}">-->
                <!--      <img class="d-block img-fluid" src="{{asset('docs/pics/'.$fea->pic)}}">-->
                <!--     </a>-->
                <!--       @else-->
                <!--       <img class="d-block" src="{{asset('docs/pics/no-image-png-5-Transparent-Images.png')}}">-->
                <!--       @endif -->

                <!--      </div>-->
                <!--      <div class="col-md-3 text-center available">-->
                <!--        <span id="available-text">Available in:</span> -->
                <!--      <div class="available-div">-->
                <!--        <span><a href="{{route('view.rproduct', [ 'id' => $fea->id])}}">{{$fea->r_weight}}</a></span>-->
                     
                <!--        @foreach ($rproduct_variant as $variant)-->
                      
                <!--        @if($variant->r_product_id == $fea->id)-->
                <!--          <span><a href="{{route('view.rproduct', [ 'id' => $fea->id])}}">{{$variant->unit}}{{$variant->weight}}</a></span> -->
                <!--        @endif-->
                <!--        @endforeach-->
                       
                <!--        {{-- <span>hi</span>-->
                <!--        <span>hi</span>-->
                <!--        <span>hi</span> --}}-->
                <!--      </div>-->
                <!--      </div>-->
                <!--    </div>-->
                <!--      {{-- <a href=""><img title=" " alt=" " src="{{ asset('docs/pics/'.$fea->pic) }}" /></a> --}}-->
                <!--   {{-- <p>available in:</p>-->
                <!--    </div> --}}-->
                <!--    <div class="row">-->
                      <!--<p>{{$fea->name}}</p>-->
                      <!--<h4>${{number_format($fea->r_price,2)}}  / {{$fea->r_weight}}</h4>-->
                <!--    </div>-->
                <!--    </div>-->
                    <!--<div class="snipcart-details top_brand_home_details">-->
                    <!--  {{-- <form action="{{route('view.rproduct', [ 'id' => $fea->id])}}" method="post"> --}}-->
                    <!--    {{-- <fieldset> --}}-->
                    <!--      @if($fea->out_of_stock == 1)-->
                    <!--      <button class="add-to-cart-btn btn btn-outline-primary ">Out of stock</button>-->
                    <!--      @else-->
                    <!--       <button class="add-to-cart-btn btn btn-outline-primary mt-1 add-to-cart-ret" value="{{$fea->id}}" type="submit">Add to Cart</button>-->
                    <!--      @endif-->
                    <!--      {{-- <input type="submit" name="submit" value="Add to cart" class="button" /> --}}-->
                    <!--    {{-- </fieldset> --}}-->
                    <!--  {{-- </form> --}}-->
                    <!--</div>-->
                <!--  </div>-->
                <!--</figure>-->
        <!--      </div>-->
        <!--    </div>-->
        <!--  </div>-->
        <!--</div>-->
  @php
    $weight = $fea->r_weight;

    $weightUnit = preg_replace('/[0-9\.]/', '', $weight);

@endphp


  <div class="col-md-3 top_brand_left-1">
            <div class="hover14 column">
              <div class="agile_top_brand_left_grid">
                <div class="agile_top_brand_left_grid_pos">
                  <!--<img src="{{ asset('assets/images/offer.png') }}" alt=" " class="img-responsive" />-->
                </div>
                <div class="agile_top_brand_left_grid1">
                  <figure>
                    <div class="snipcart-item block">
                      <div class="snipcart-thumb">
                        <!--<a-->
                        <!--  href="https://p.w3layouts.com/demos_new/13-02-2017/super_market-demo_Free/405423547/web/products.html"-->
                        <!--  > -->
                        @if(!$fea->pic == "")
                          <img class="d-block img-fluid" src="{{asset('docs/pics/'.$fea->pic)}}">
                          @else
                          <img class="d-block img-fluid" src="{{asset('docs/pics/no-image.PNG')}}">
                          @endif
                          <!--</a>-->
                        <strong><p class="text">{{$fea->name}}</p></strong>
                        
                  {{--    <h4>${{number_format($fea->r_price,2)}} </h4> --}}
                      <div class="snipcart-thumb-inner">
                      <h6>Price Per Unit:  @empty($fea->price_unit)$@else{{$fea->price_unit}}@endempty{{$fea->r_price}}</h6>
                      <!--<h6>Total Price: <b>@empty($fea->price_unit)$@else{{$fea->price_unit}}@endempty{{$fea->t_price}} </b></h6>-->
                       <h6>Total Price: 
                          @if(!$fea->t_price == null)
                           {{$fea->price_unit}}{{$fea->t_price}}
                          
                          @endif
                           </h6>
                      <h6>Weight Per Unit: {{$fea->r_weight}}  </h6>
                      <h6>Total Weight: 
                          @if(!$fea->t_weight == null)
                           {{$fea->t_weight}}
                           <!--{{$weightUnit}}-->
                          
                          @endif
                           </h6>
                     <!--<h6>Unit Per Pack: {{$fea->unit}}  </h6>-->
                     <h6>Total Unit: {{$fea->unit}}  </h6>

                      </div>
                      </div>
                     <div class="snipcart-details top_brand_home_details">
                      {{-- <form action="{{route('view.rproduct', [ 'id' => $fea->id])}}" method="post"> --}}
                          @if($fea->out_of_stock == 1)
                          <button class="add-to-cart-btn btn btn-outline-primary ">Out of stock</button>
                          @else
                           <button class="add-to-cart-btn btn btn-outline-primary mt-1 add-to-cart-ret" value="{{$fea->id}}" type="submit">Add to Cart</button>
                          @endif
                          {{-- <input type="submit" name="submit" value="Add to cart" class="button" /> --}}
                      {{-- </form> --}}
                    </div>
                    </div>
                  </figure>
                </div>
              </div>
            </div>
          </div>
          
          
        {{-- /////////////////////////////////Pagination////////////////// --}}
        {{-- @if (($index + 1) % 3 === 0 || $loop->last)
                <div class="clearfix"></div>
            @endif --}}
       {{-- /////////////////////////////////////////////////////////////      --}}
        @endforeach

        {{-- /////////////////////////////////Pagination////////////////// --}}
        {{-- <div class="pagination-container">
         <center> {{ $featured->links() }}</center> 
      </div> --}}
      {{-- /////////////////////////////////////////////////////////////      --}}
        <div class="clearfix"></div>            
      </div>  
    </div>
  </div>
@endsection

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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>

function topFunction() {

 document.body.scrollIntoView({ behavior: 'smooth', block: 'start' });
}
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
                         window.location.replace("https://asliiinc.com/cart-display");
                    },

                });
          //  }
        });
        
        
        let mybutton = document.getElementById("scroll-to-top");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}


        
      });
</script>