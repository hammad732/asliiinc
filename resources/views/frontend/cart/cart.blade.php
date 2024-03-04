@extends('frontend.layouts.master')


<style>

.checkout-btns-div{
    display:flex;
    gap: 10px;
    justify-content: end;

}
.add-to-checkout{
    max-width: 140px;
}
    .cart-display-content {
    width: 100%;
    padding: 2%;
    margin: auto;
    box-shadow: 2px 5px 6px -3px;
    margin-top: 3%;
    margin-bottom: 3%;
    border: 1px solid #024366;
    
}

.wrap-td{
    text-wrap: nowrap;
}
.cart-page-div{
    overflow-x: auto;
}
.cart-display-content .table thead th {
    vertical-align: bottom;
    border: none;
    width: 25%;
}
.h5_color{
    color: #F35901;
}

/*.checkout-btns-col{*/
/*    text-align:end;*/
/*}*/
/*.checkout-btns {*/
/*    display: inline-block;*/
/*    margin-right: 10px;*/
/*    margin-bottom: 10px; */
    /*padding: 10px 20px;*/
    /*background-color: #007bff;*/
/*    color: white;*/
/*    border: none;*/
/*    border-radius: 5px;*/
/*}*/

@media (max-width: 576px) {
   .checkout-btns-div{
    flex-direction: column;
        align-items: end;
}
}


@media only screen and (min-width: 768px) and (max-width: 768px)
{
    
    
    .cart-display-content {
    width: 96%;
    padding: 2%;
    margin: auto;
    box-shadow: 2px 5px 6px -3px;
    margin-top: 3%;
    margin-bottom: 3%;
    border: 1px solid #024366;
    }
}
@media only screen and (min-width: 375px) and (max-width: 480px)
{
    
        .cart-display-content {
    width: 100%;
    padding: 4%;
    margin: auto;
    box-shadow: 2px 5px 6px -3px;
    margin-top: 3%;
    margin-bottom: 3%;
    border: 1px solid #024366;
    }
    .cart-page-div .form-control {
        display: inline-block !important;
        width: 35% !important;
    }
    .cart-table-td-5 .form-control {
            height: calc(0.5em + 0.75rem + 1px);
            padding: 5px 5px 5px 5px;
            font-size: 15px;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: .25rem;
            transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }
        
}

@media only screen and (max-width: 576px)
{   
        .cart-display-content {
    width: 100%;
    padding: 4%;
    margin: auto;
    box-shadow: 2px 5px 6px -3px;
    margin-top: 3%;
    margin-bottom: 3%;
    border: 1px solid #024366;
    }
    
    .cart-page-div .form-control {
        display: inline-block !important;
        width: 35% !important;
    }
    .cart-table-td-5 .form-control {
            height: calc(0.5em + 0.75rem + 1px);
            padding: 5px 5px 5px 5px;
            font-size: 15px;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: .25rem;
            transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }
         
}

.cart-page-div .form-control {
    display: inline-block !important;
    width: 40% !important;
    text-align: center;
    padding: 0px;
}


    .cart-page-div{
        /*height:80vh;*/
    }
    
    .btn-primary{
        background-color:#F35901;
        border-color:#F35901;
        font-size:14px;
    }
    .btn-primary:hover{
        background-color:#FFFFFF;
        border-color:#F35901;
        color:#F35901;
    }
    a.btn-primary{
        
        background-color:#F35901;
        border-color:#F35901;
    }
    a.btn-primary:hover{
       background-color:#F35901;
        border-color:#F35901; 
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
    
    i#inc-btn-id-cart:hover {
    cursor: pointer;
    }
        i#dec-btn-id-cart:hover {
    cursor: pointer;
    }
    
           .table th{
    color: #F35901!important;
} 

           .table td{
    color: #F35901!important;
} 

           .p{
    color: #F35901!important;
} 
/*@media only screen and (max-width: 425px){*/
/*    .circle-icon{*/
/*   font-size: 13px !important;*/
/*}*/
/*.cart-page-div .form-control {*/
/*    display: inline-block !important;*/
/*    width: 50% !important;*/
/*}*/
/*}*/

/*@media only screen and (width: 768px){*/
/*    .proceed-to-checkBtn{*/
/*       padding:3% !important;*/
/*    }*/
/*}*/
/* #input-quantity-1,#input-quantity-2 {
        margin-left: 0.25rem;
        margin-right: 0.25rem
    } */

@media(max-width:768px) {
    #input-quantity-1,#input-quantity-2 {
        padding: 5%;
    text-align: center;
    }
}
@media(max-width:500px) {
    #input-quantity-1,#input-quantity-2 {
        padding: 0%;
    text-align: center;
    }
}


/* i#inc-btn-id-cart,i#dec-btn-id-cart 
{
    font-size: 25px;
} */

.center-th{
    text-align: center
}
.quantity-cell, .quantity-total, .quantity-price{
    min-width: 100px;
}

@media (max-width: 768px) {
    .order-summary-one, .order-summary-two{
        display: flex;
        justify-content: flex-end;
    }
}

@media(max-width:372px){
    .checkout-btns{
    padding: 0.375rem 1.75rem !important;
    
}
}
.order-summary-two{
    display: flex;
    align-items: center ;
}



</style>


@section('content')

{{-- @dd($cartCollection) --}}
    <div class="container py-5">
        <div class="cart-display-content">
            <div class="cart-page-div">
                    
                <table class="table text-center table-responsive">
                    <thead>
                    <tr>
                        <th>Product</th>
                        <th class="center-th">Quantity</th>
                        <th class="center-th">Price</th>
                        <th class="center-th">Total</th>
                        <th class="center-th">Action</th>

                    </tr>
                    </thead>
                    <tbody class="new-data">

                    @foreach($cartCollection as $item)
                        <tr>
                            <td class="text-left cart-table-td-2 wrap-td">
                                @if($item->attributes->r_weight != 0)
                                @php
                                $a = $item->attributes->r_weight;
                                 $number = preg_replace('/[^0-9.]+/', '', $a);
                                $check_unit= $item->attributes->r_weight;
                                $check_unit = preg_replace('/[^a-z]/i', '', $check_unit);
                                @endphp
                                @if($check_unit == 'oz')
                                <span class="read-less">{{$item->name}} ({{$number * $item->quantity}}oz)</span>
                                @elseif($check_unit == 'lb')
                                 <span class="read-less">{{$item->name}} ({{$number * $item->quantity}}lb)</span>
                                 @else
                                 <span class="read-less">{{$item->name}} ({{$number * $item->quantity}})</span>
                                @endif
                                @endif
                                @if($item->attributes->d_weight != 0)
                                <span class="read-less">{{$item->name}} ({{$item->attributes->d_weight}}oz / Unit)</span>
                                @endif
                                
                                
                                
                                <!--<p><small>-->
                                <!--    <a href="{{ route('cart.destroy', $item->id) }}" style="color: #ff5c00"data-title="Delete"><i class="fa fa-trash" aria-hidden="true"></i>-->
                                <!--        Remove-->
                                <!--    </a>-->
                                <!--</small></p>-->
                            </td>
                            <td class="cart-table-td-5 quantity-cell">
                                <i class="fa fa-minus-circle circle-icon" id="dec-btn-id-cart" value="{{ $item->id }}" onClick="decrement_quantity({{ $item->id }})" aria-hidden="true"></i>
                              {{-- @dd( $item->quantity); --}}
                                <input id="input-quantity-{{ $item->id }}" value="{{ $item->quantity }}" class="form-control qty-id-cart" type="text"  name="quantity" readonly>
                                
                                <i class="fa fa-plus-circle circle-icon" id="inc-btn-id-cart" value="{{ $item->id }}" onClick="increment_quantity({{ $item->id }})" aria-hidden="true"></i>
                            </td>
                            <td class="pro-price cart-table-td-4 quantity-price">
                                $ {{number_format($item->price,2)}}
                            </td>
                            <td class="pro-price cart-table-td-4 quantity-total">
                                $ {{ number_format(\Cart::get($item->id)->getPriceSum(), 2)}}
                            </td>
                             <td class="pro-price cart-table-td-4"> <p><small>
                                <a href="{{ route('cart.destroy', $item->id) }}" style="color: #ff5c00"data-title="Delete"><i class="fa fa-trash" aria-hidden="true"></i>
                                    Remove
                                </a>
                            </small></p> </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            
        </div>

        {{-------------------order summary starts---------------------}}
       
        <div class="row pt-3">
            <div class="col-lg-12 col col-md-12 col-sm-12 col-12"> <h5 class="text-center h5_color">Order Summary</h5><hr /> </div>
        </div>
       

            <div class="row order-summary-one">
                <div class="col-lg-8 col col-md-8 col-sm-8 col-8 text-right">
                   <p class="p"><strong>Sub total</strong></p>
                        <p class="p"><strong>Shipping</strong></p>
                        <p class="p"><strong >Sales Tax</strong></p>
                </div>
                <div class="col-lg-4 col col-md-4 col-sm-4 col-4 text-right">
                    <p class="p"><strong>$ <span class="sub-total">
                        {{ number_format(\Cart::getSubTotal(), 2)}}
                    <p class="p"> -- </p>
                    <p class="p"> $ 00 </p>
                </div>
            </div>
            <hr>
            <div class="row order-summary-two">
                <div class="col-lg-8 col col-md-8 col-sm-8 col-8 text-right">
                    
                    <h5 class="h5_color">Total</h5>
                </div>
                <div class="col-lg-4 col col-md-4 col-sm-4 col-4 text-right">
                  
                    <p style="float: right" class="p" >$
                        <span class="total-cost"><strong> {{ number_format(\Cart::getTotal(), 2)}} </strong></span>
                    </p>
                </div>
            </div>
        <hr />
            <div class="row pb-5 ">
                <!--<div class="col-lg-8 col col-md-8 col-sm-0 col-0"></div>-->
                <div class="col-lg-12 col col-md-12 col-sm-12 col-12 checkout-btns-div">
                <!--<div class=" checkout-btns-div">-->

                  
                    <a href="{{ route('home') }}" class="btn add-to-cart-btn form-control float-right continue-btn proceed-to-checkBtn add-to-checkout"><i class="fa fa-arrow-left" aria-hidden="true"> </i> Add More</a>
                      
                    @if(Auth::check() == 1)
                        <a href="{{ route('cart.checkout') }}" class="btn btn-primary form-control proceed-to-checkBtn add-to-checkout">Checkout <i class="fa fa-shopping-cart" aria-hidden="true"> </i> <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                    @else
                     <!--Button trigger modal   btn btn-warning float-right my-1 mx-1 checkout-btns -->
                    <button type="button" class="btn add-to-cart-btn float-right form-control add-to-checkout" data-toggle="modal" data-target="#loginModal">
                        <i class="fas fa-shopping-cart"></i> Checkout
                    </button>
                    @endif
                </div>
                <!--<div class="col-lg-8 col col-md-8 col-sm-0 col-0"></div>-->
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


    <script>
    //     $(document).ready(function ()
    // {
            // $('[data-toggle="tooltip"]').tooltip()
    

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
                url : "https://asliiinc.com/cart-update/"+cart_id,
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

    // });







    </script>

