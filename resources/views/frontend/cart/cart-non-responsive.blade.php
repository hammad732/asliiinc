@extends('frontend.layouts.master')

@section('style')
<style>
    .cart-page-div{
        /*height:80vh;*/
    }
    
            .continue-btn{

        background-color:#F35901;
        border-color:#F35901;
    }
    .continue-btn:hover{
        background-color:#FFFFFF;
        border-color:#F35901;
        color:#F35901;
    }
</style>
@endsection

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-8 col-sm-12 col-12">

                <div class="cart-page-div">
                    <table class="table text-center">
                        <thead>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody class="new-data">
                        @foreach($cartCollection as $item)
                            <tr>
                                <td class="text-left cart-table-td-2">
                                    <span class="read-less">{{$item->name}}</span>
                                    <p><small>
                                        <a href="{{ route('cart.destroy', $item->id) }}" style="color: #ff5c00"data-title="Delete"><i class="fa fa-trash" aria-hidden="true"></i>
                                            Remove
                                        </a>
                                    </small></p>
                                </td>
                                <td class="cart-table-td-5">
                                    <button id="inc-btn-id-cart" value="{{ $item->id }}" onClick="increment_quantity({{ $item->id }})" class="btn btn-secondary" type="button">+</button>
                                    <input id="input-quantity-{{ $item->id }}" value="{{ $item->quantity }}" class="form-control qty-id-cart" type="text"  name="quantity" readonly>
                                    <button id="dec-btn-id-cart" value="{{ $item->id }}" onClick="decrement_quantity({{ $item->id }})" class="btn btn-secondary" type="button">-</button>
                                </td>
                                <td class="pro-price cart-table-td-4">
                                    $ {{$item->price}}
                                </td>
                                <td class="pro-price cart-table-td-4">
                                    $ {{ round((int)\Cart::get($item->id)->getPriceSum(), 2)}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

            {{-------------------order summary starts---------------------}}
            <div class="col-lg-4 col col-md-4 col-sm-4 col-12 p-2">
                <h5><strong>Order Summary</strong></h5>
                <hr/>

                <div class="row">
                    <div class="col-lg-8 col col-md-8 col-sm-8 col-8">
                        <p><strong>Sub total</strong></p>
                        <p><strong>Shipping</strong></p>
                        <p><strong>Sales Tax</strong></p>
                    </div>

                    <div class="col-lg-4 col col-md-4 col-sm-4 col-4 text-right">

                        <p><strong>$ <span class="sub-total">
                             {{ round((int)\Cart::getSubTotal(), 2)}}
                        <p><strong> -- </strong></p>
                        <p> <strong>$ 00 </strong></p>
                    </div>

                </div>
                <hr/>
                <div class="row">
                    <div class="col-lg-6 col col-md-6 col-sm-6 col-12">
                        <h5><strong>Grand Total</strong></h5>

                    </div>
                    <div class="col-lg-6 col col-md-6 col-sm-12 col-12">
                            <p style="float: right" >$
                                <span class="total-cost"><strong> {{ round((int)\Cart::getTotal(), 2)}} </strong></span>
                            </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col col-md-12 col-sm-12 col-12">

                        @if(Auth::check() == 1)
                            <a href="{{ route('cart.checkout') }}" class="btn btn-warning form-control">Proceed To Checkout <i class="fa fa-shopping-cart" aria-hidden="true"> </i> <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                        @else
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success  form-control" data-toggle="modal" data-target="#loginModal">
                            <i class="fa fa-lock" aria-hidden="true"></i> Login to proceed
                        </button>
                        @endif
                        <hr />
                        <a href="{{ url()->previous() }}" class="btn btn-primary form-control continue-btn cart-cont-btn"><i class="fa fa-arrow-left" aria-hidden="true"> </i> Continue Shopping <i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                    </div>
                </div>

            </div>
            {{---------------------order summary ends---------------------}}

        </div>
    </div>

    <!--login Modal -->
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

@endsection


@section('script')
    <script>
        $(document).ready(function ()
        {
            $('[data-toggle="tooltip"]').tooltip()
        });

        // cart page  increment and dcrement
        function increment_quantity(cart_id)
        {
            var inputQuantityElement = $("#input-quantity-"+cart_id);
            var newQuantity = parseInt($(inputQuantityElement).val())+1;
            save_to_db(cart_id, newQuantity);
        }

        function decrement_quantity(cart_id)
        {
            var inputQuantityElement = $("#input-quantity-"+cart_id);
            if($(inputQuantityElement).val() > 1)
            {
                var newQuantity = parseInt($(inputQuantityElement).val()) - 1;
                save_to_db(cart_id, newQuantity);
            }
        }

        function save_to_db(cart_id, new_quantity)
        {
            var inputQuantityElement = $("#input-quantity-"+cart_id);
            $.ajax({
                url : "http://asliimall.com/cart-update/"+cart_id,
                data : "cart_id="+cart_id+"&new_quantity="+new_quantity,
                type : 'GET',
                success : function(response) {
                    console.log(response)
                        // $('.new-data').html(response.data);
                        $('.sub-total').html(response.sub_total);
                        $('.total-cost').html(response.total_cost);
                        $('.cart-page-div').html(response.table);
                        $(inputQuantityElement).val(new_quantity);
                }
            });
        }

    </script>
@endsection
