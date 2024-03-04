@extends('frontend.layouts.master')

<style>
    #example-img {
        width: 100% !important
    }

    .title-div {
        margin-top: 20px;
        text-align: center;
    }

    .price-div,
    .desc-heading {
        margin-bottom: 10px
    }

    .price-heading {
        margin-bottom: 10px;
        text-transform: capitalize
    }

    .button-div,
    .desc-div {
        margin-top: 10px;
    }

    @media(max-width: 768px) {
        .available-div {
            margin-top: 10px;
        }
    }

    .product-h2 {
        text-transform: capitalize;
    }

    .single-product-heading {
        margin-top: 5px;

    }

    .btn-add-one {
        max-width: 100px;
    }

    @media(max-width: 991px) {
        .price-heading {
            text-align: center;
        }

        .price-div {
            margin-top: 10px;
        }
    }



    .custom-btn {
        width: 150px !important;

    }
</style>

@section('content')
   


    <div class="products">

        <div class="container mt-2 mb-3">
            <div class="row no-gutters">
                <div class="col-md-5 pr-2">
                    <div class="card">
                        <div class="demo">
                            <img id="example-img" src="{{ asset('docs/pics/' . $rproduct->first()->pic) }}" alt=" "
                                class="img-responsive" />


                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card">
                        <div class="price-div"> <span class="font-weight-bold">
                                <h2 class="price-heading">{{ $rproduct->first()->name }}</h2>
                            </span>
                       
                            <h4 class="font-weight-bold">Price: <span
                                class="product-price"> {{ $rproduct->first()->r_price }}</span>
   
                             
                            </h4>
                        </div>
                        
                        <div class="buttons"> <button
                                class="custom-btn add-to-cart-btn btn btn-outline-primary mt-1 add-to-cart-ret"
                                value="{{ $rproduct->first()->id }}" type="button">Add to Cart</button></div>
                        <hr>
                        <div class="product-description">
                            <div><span class="font-weight-bold">
                                    <h4 class="font-weight-bold">Available in:</h4>
                                </span>
                                {{-- @dd($rproduct->first()); --}}
                                <button class="variant-button1 variant-button btn-active"
                                    data-id="{{ $rproduct->first()->id }}" data-price="{{ $rproduct->first()->r_price }}"
                                    data-image="{{ asset('docs/pics/' . $rproduct->first()->pic) }}"
                                    data-weight="{{ $rproduct->first()->r_weight }}">{{ $rproduct->first()->r_weight }}</button>
                               
                                    @foreach ($rproduct_variant as $variant)
                                    @if ($variant->image != null)
                                        <button class="variant-button" data-variant-id="{{ $variant->id }}"
                                            data-price="{{ $variant->price }}"
                                            data-image="{{ asset('docs/pics/' . $variant->image) }}"
                                            data-weight="{{ $variant->unit }} / {{ $variant->weight }}">
                                            {{ $variant->unit }}{{ $variant->weight }}
                                        </button>
                                    @else
                                        <button class="variant-button" data-variant-id="{{ $variant->id }}"
                                            data-price="{{ $variant->price }}"
                                            data-image="{{ asset('docs/pics/' . $rproduct->first()->pic) }}"
                                            data-weight="{{ $variant->unit }} / {{ $variant->weight }}">
                                            {{ $variant->unit }}{{ $variant->weight }}
                                        </button>
                                    @endif
                                @endforeach
                            </div>
                            <div class="d-flex flex-row align-items-center"></div>
                            <div class="desc-div">
                                <h4 class="font-weight-bold desc-heading">Description:</h4>
                                <p>{{ $rproduct->isEmpty() ? '' : $rproduct->first()->desc }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




     <input type="hidden" name="selected_variant_price" id="selectedVariantPrice" value="  ">
            <input type="hidden" name="selected_variant_weight" id="selectedVariantWeight" value=""> 
            <input type="hidden" name="selected_variant_id" id="selectedVariantId" value=""> 

    {{-- <div class="newproducts-w3agile">
        <div class="container">
            <h3>New offers</h3>
            <div class="agile_top_brands_grids">
                <div class="col-md-3 top_brand_left-1">
                    <div class="hover14 column">
                        <div class="agile_top_brand_left_grid">
                            <div class="agile_top_brand_left_grid_pos">
                               
                                <img src="{{ asset('docs/pics/offer.png') }}" alt=" " class="img-responsive" />
                            </div>
                            <div class="agile_top_brand_left_grid1">
                                <figure>
                                    <div class="snipcart-item block">
                                        <div class="snipcart-thumb">
                                            <a
                                                href="https://p.w3layouts.com/demos_new/13-02-2017/super_market-demo_Free/405423547/web/products.html"><img
                                                    title=" " alt=" "  src="images/14.png" /></a>
                                            <p>Fried-gram</p>
                                            <div class="stars">
                                                <i class="fa fa-star blue-star" aria-hidden="true"></i>
                                                <i class="fa fa-star blue-star" aria-hidden="true"></i>
                                                <i class="fa fa-star blue-star" aria-hidden="true"></i>
                                                <i class="fa fa-star blue-star" aria-hidden="true"></i>
                                                <i class="fa fa-star gray-star" aria-hidden="true"></i>
                                            </div>
                                            <h4>$35.99 <span>$55.00</span></h4>
                                        </div>
                                        <div class="snipcart-details top_brand_home_details">
                                            <form
                                                action="https://p.w3layouts.com/demos_new/13-02-2017/super_market-demo_Free/405423547/web/single.html#"
                                                method="post">
                                                <fieldset>
                                                    <input type="hidden" name="cmd" value="_cart" />
                                                    <input type="hidden" name="add" value="1" />
                                                    <input type="hidden" name="business" value=" " />
                                                    <input type="hidden" name="item_name" value="Fortune Sunflower Oil" />
                                                    <input type="hidden" name="amount" value="35.99" />
                                                    <input type="hidden" name="discount_amount" value="1.00" />
                                                    <input type="hidden" name="currency_code" value="USD" />
                                                    <input type="hidden" name="return" value=" " />
                                                    <input type="hidden" name="cancel_return" value=" " />
                                                    <input type="submit" name="submit" value="Add to cart"
                                                        class="button" />
                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 top_brand_left-1">
                    <div class="hover14 column">
                        <div class="agile_top_brand_left_grid">
                            <div class="agile_top_brand_left_grid_pos">
                                <img src="images/offer.png" alt=" " class="img-responsive" />
                            </div>
                            <div class="agile_top_brand_left_grid1">
                                <figure>
                                    <div class="snipcart-item block">
                                        <div class="snipcart-thumb">
                                            <a
                                                href="https://p.w3layouts.com/demos_new/13-02-2017/super_market-demo_Free/405423547/web/products.html"><img
                                                    title=" " alt=" " src="images/15.png" /></a>
                                            <p>Navaratan-dal</p>
                                            <div class="stars">
                                                <i class="fa fa-star blue-star" aria-hidden="true"></i>
                                                <i class="fa fa-star blue-star" aria-hidden="true"></i>
                                                <i class="fa fa-star blue-star" aria-hidden="true"></i>
                                                <i class="fa fa-star blue-star" aria-hidden="true"></i>
                                                <i class="fa fa-star gray-star" aria-hidden="true"></i>
                                            </div>
                                            <h4>$30.99 <span>$45.00</span></h4>
                                        </div>
                                        <div class="snipcart-details top_brand_home_details">
                                            <form
                                                action="https://p.w3layouts.com/demos_new/13-02-2017/super_market-demo_Free/405423547/web/single.html#"
                                                method="post">
                                                <fieldset>
                                                    <input type="hidden" name="cmd" value="_cart" />
                                                    <input type="hidden" name="add" value="1" />
                                                    <input type="hidden" name="business" value=" " />
                                                    <input type="hidden" name="item_name" value="basmati rise" />
                                                    <input type="hidden" name="amount" value="30.99" />
                                                    <input type="hidden" name="discount_amount" value="1.00" />
                                                    <input type="hidden" name="currency_code" value="USD" />
                                                    <input type="hidden" name="return" value=" " />
                                                    <input type="hidden" name="cancel_return" value=" " />
                                                    <input type="submit" name="submit" value="Add to cart"
                                                        class="button" />
                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 top_brand_left-1">
                    <div class="hover14 column">
                        <div class="agile_top_brand_left_grid">
                            <div class="agile_top_brand_left_grid_pos">
                                <img src="images/offer.png" alt=" " class="img-responsive" />
                            </div>
                            <div class="agile_top_brand_left_grid_pos">
                                <img src="images/offer.png" alt=" " class="img-responsive" />
                            </div>
                            <div class="agile_top_brand_left_grid1">
                                <figure>
                                    <div class="snipcart-item block">
                                        <div class="snipcart-thumb">
                                            <a
                                                href="https://p.w3layouts.com/demos_new/13-02-2017/super_market-demo_Free/405423547/web/products.html"><img
                                                    src="images/16.png" alt=" " class="img-responsive" /></a>
                                            <p>White-peasmatar</p>
                                            <div class="stars">
                                                <i class="fa fa-star blue-star" aria-hidden="true"></i>
                                                <i class="fa fa-star blue-star" aria-hidden="true"></i>
                                                <i class="fa fa-star blue-star" aria-hidden="true"></i>
                                                <i class="fa fa-star blue-star" aria-hidden="true"></i>
                                                <i class="fa fa-star gray-star" aria-hidden="true"></i>
                                            </div>
                                            <h4>$80.99 <span>$105.00</span></h4>
                                        </div>
                                        <div class="snipcart-details top_brand_home_details">
                                            <form
                                                action="https://p.w3layouts.com/demos_new/13-02-2017/super_market-demo_Free/405423547/web/single.html#"
                                                method="post">
                                                <fieldset>
                                                    <input type="hidden" name="cmd" value="_cart" />
                                                    <input type="hidden" name="add" value="1" />
                                                    <input type="hidden" name="business" value=" " />
                                                    <input type="hidden" name="item_name" value="Pepsi soft drink" />
                                                    <input type="hidden" name="amount" value="80.00" />
                                                    <input type="hidden" name="discount_amount" value="1.00" />
                                                    <input type="hidden" name="currency_code" value="USD" />
                                                    <input type="hidden" name="return" value=" " />
                                                    <input type="hidden" name="cancel_return" value=" " />
                                                    <input type="submit" name="submit" value="Add to cart"
                                                        class="button" />
                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 top_brand_left-1">
                    <div class="hover14 column">
                        <div class="agile_top_brand_left_grid">
                            <div class="agile_top_brand_left_grid_pos">
                                <img src="images/offer.png" alt=" " class="img-responsive" />
                            </div>
                            <div class="agile_top_brand_left_grid1">
                                <figure>
                                    <div class="snipcart-item block">
                                        <div class="snipcart-thumb">
                                            <a
                                                href="https://p.w3layouts.com/demos_new/13-02-2017/super_market-demo_Free/405423547/web/products.html"><img
                                                    title=" " alt=" " src="images/17.png" /></a>
                                            <p>Channa-dal</p>
                                            <div class="stars">
                                                <i class="fa fa-star blue-star" aria-hidden="true"></i>
                                                <i class="fa fa-star blue-star" aria-hidden="true"></i>
                                                <i class="fa fa-star blue-star" aria-hidden="true"></i>
                                                <i class="fa fa-star blue-star" aria-hidden="true"></i>
                                                <i class="fa fa-star gray-star" aria-hidden="true"></i>
                                            </div>
                                            <h4>$35.99 <span>$55.00</span></h4>
                                        </div>
                                        <div class="snipcart-details top_brand_home_details">
                                            <form
                                                action="https://p.w3layouts.com/demos_new/13-02-2017/super_market-demo_Free/405423547/web/single.html#"
                                                method="post">
                                                <fieldset>
                                                    <input type="hidden" name="cmd" value="_cart" />
                                                    <input type="hidden" name="add" value="1" />
                                                    <input type="hidden" name="business" value=" " />
                                                    <input type="hidden" name="item_name"
                                                        value="Fortune Sunflower Oil" />
                                                    <input type="hidden" name="amount" value="35.99" />
                                                    <input type="hidden" name="discount_amount" value="1.00" />
                                                    <input type="hidden" name="currency_code" value="USD" />
                                                    <input type="hidden" name="return" value=" " />
                                                    <input type="hidden" name="cancel_return" value=" " />
                                                    <input type="submit" name="submit" value="Add to cart"
                                                        class="button" />
                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div> --}}
@endsection

{{-- Jquery CDN --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $('.variant-button').click(function() {
            var variantId = $(this).data('variant-id');
            var variantPrice = $(this).data('price');
            var variantWeight = $(this).data('weight');
            var varientImage = this.getAttribute('data-image');


            // var variantImage = $(this).data('image');
            // var originalImage = 'http://127.0.0.1:8000/docs/pics/' + variantImage;

            // Set the selected variant image
            // $('#example-img').attr('src', originalImage);
            document.getElementById("example-img").src = varientImage;


            $('#selectedVariantPrice').val(variantPrice);
            $('#selectedVariantWeight').val(variantWeight);
            $('#selectedVariantId').val(variantId);

            // Display the selected price to the user
            $('.product-price').text(variantPrice);
            // var variantWeight = $(this).data('weight');
         
        
        });

        $('.variant-button1').click(function() {
            var Id = $(this).data('id');
            var variantPrice = $(this).data('price');
            var variantWeight = $(this).data('weight');
            var varientImage = this.getAttribute('data-image');
            // $('#selectedVariantId').val() = null;
            // var variantImage = $(this).data('image');
            // var originalImage = 'http://127.0.0.1:8000/docs/pics/' + variantImage;

            // Set the selected variant image
            // $('#example-img').attr('src', originalImage);
            document.getElementById("example-img").src = varientImage;


            $('#selectedVariantPrice').val(variantPrice);
            $('#selectedVariantWeight').val(variantWeight);
            // $('#selectedVariantId').val(Id);

            // Display the selected price to the user
            $('.product-price').text(variantPrice);
            var variantWeight = $(this).data('weight');
            // var productPrice = $('.product-price');
           
        });


    });
</script>

<script>
    $(document).ready(function()
        {
            $('.add-to-cart-ret').on("click", function() {
                var id = $(this).val();
                var variantid = $('#selectedVariantId').val();;
                var price = $('#selectedVariantPrice').val();
                
                var weight = $('#selectedVariantWeight').val();
         
                $('#myModal2').modal({
                    backdrop: 'static',
                    keyboard: false
                }, 'show');
                $.ajax({
                    type: "GET",
                    url: "{{ route('cart.add', '') }}/" + id,
                    data: {
                        id: id,
                        variantid: variantid,
                        price: price,
                        r_weight: weight
                        

                    },
                    success: function(data) {
                        setTimeout(function() {
                            $('.product-add-text').removeClass('d-none');
                        }, 500);
                        setTimeout(function() {
                            $('.product-add-text').addClass('d-none');
                            $('#myModal2').modal('hide');
                        }, 1000);
                        $('#basket').html(data.cart_count);
                        // $("#basket").effect( "bounce", {times:3}, 300 );
                        window.location.replace(
                            "https://asliiinc.com/cart-display"
                            );
                    },

                });
                //  }
            });




        }); // End of doc ready
</script>
<script>
    $(document).ready(function() {
        $('.variant-button').on('click', function() {
            $('.variant-button').removeClass('btn-active');
            $(this).addClass('btn-active');
        });
    });
</script>
