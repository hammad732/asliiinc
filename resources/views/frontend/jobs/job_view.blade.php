@extends('frontend.layouts.master')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper py-5">
        <!-- Main content -->
        <section class="content">

            {{-- rproduct-view section --}}
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
                                <img class="card-img-top" src="{{asset('../../docs/pics/'.$rproduct->first()->pic)}}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-12 mt-5">
                            <h2 class="mb-3">{{$rproduct->first()->name}}</h2>
                            <h4 class="mb-5 ">{{$rproduct->first()->desc}}</h5>
                            <hr>
                            <p class="mb-3">Quantity:
                                <button id="inc-btn-id" class="btn btn-secondary" type="button">+</button>
                                <input id="qty-id" class="form-control" type="text" name="quantity" value="1" readonly>
                                <button id="dec-btn-id" class="btn btn-secondary" type="button">-</button>
                            </p>
                            <p>Weight: <span id="lb-id">{{$rproduct->first()->weight}}</span> lb(s)</p>
                            <hr class="mb-3">

                            <input type="hidden" name="unit_price" value="{{$rproduct->first()->price}}" id="unitprice-id">
                            <input type="hidden" name="unit_weight" value="{{$rproduct->first()->weight}}" id="unitweight-id">

                            <h5 >Price (USD): $<span id="price-id" class="price-span">{{$rproduct->first()->price}}</span></h4>
                            <button class="btn btn-outline-primary mt-3 mb-3" type="submit">Buy Now</button>
                            <button class="btn btn-outline-primary mt-3 mb-3" type="submit">Add to Cart</button>
                            <hr>
                            <span class="share-span">SHARE Distributor PRODUCT:</span>
                            <div class="fa-icons-div">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-3"><a href="http://"><i class="fa fa-facebook-square"></i></a></div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-3"><a href="http://"><i class="fab fa-twitter-square"></i></i></a></div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-3"><a href="http://"><i class="fa fa-instagram"></i></a></div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-3"><a href="http://"><i class="fa fa-whatsapp"></i></a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                            {{-- Featured slider at rproduct-view--}}
                            <h3>Sales Distributor Items:</h3>
                            <div class="card">
                                <div class="card-body">
                                    <section class="customer-logos-rproduct-view slider">
                                        @foreach ($featured as $fea)
                                            <div class="slide text-center">
                                                <img style="height: 250px" class="d-block" src="{{asset('../../docs/pics/'.$fea->pic)}}">
                                                <h4 class="">{{$fea->name}}</h4>
                                                <p>{{$fea->desc}}</p>
                                                <p>Price (USD) ${{$fea->price}}</p>
                                                <p>Weight: {{$fea->weight}} (lb)</p>
                                                <a href="{{route('view.rproduct', [ 'id' => $fea->id])}}" type="button" class="btn btn-outline-warning mt-3">view</a>
                                                <button class="btn btn-outline-primary mt-3" type="submit">Add to Cart</button>
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
                price_val = parseInt(price_val);
                unitprice_val = parseInt(unitprice_val);
                unitweight_val = parseInt(unitweight_val);

                $('#qty-id').val(inc_val);
                $('#lb-id').html(lb_val + unitweight_val);
                $('#price-id').html(price_val + unitprice_val);
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
                price_val = parseInt(price_val);
                unitprice_val = parseInt(unitprice_val);
                unitweight_val = parseInt(unitweight_val);

                $('#qty-id').val(inc_val);
                $('#lb-id').html(lb_val - unitweight_val);
                $('#price-id').html(price_val - unitprice_val);
            }
        });

    }); // End of doc ready
</script>
