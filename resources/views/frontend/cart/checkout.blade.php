
@extends('frontend.layouts.master')


<style>
    .btn
    {

        background-color:#F35901; !important
        border-color:#F35901;
    }
    .btn:hover
    {
        background-color:#F35901; !important
        border-color:#F35901;
        color:#F35901;
    }
    h4{
        color:#F35901 !important;
    }
        h5{
        color:#F35901 !important;
    }
    h6{
        color:#F35901 !important;
        margin-bottom: 0.5rem !important;
    }
        p{
        color:#F35901;
    }
            .checkouthead  h3{
        background: #F35901!important;
        width: 250px!important;
        padding: 10px!important;
        color: white!important;
        margin-bottom: 5px!important;
        margin-top: 15px!important;
        text-align:center;
    }
    label{
        font-weight: 400 !important;
    }
    .form-checkout{
     background: #f8f9fa;
    padding: 1rem;
    border-radius: 10px;
    }

    .table td{
        padding: 0.75rem !important;
        border-top: 1px solid #dee2e6;
    }

    .container-checkout{
        margin-bottom: 50px;
    }
    .pb-3{
        padding-bottom: 1rem;
    }
    .acolor{
        color: #F35901;
    }
    @media only screen and (max-width: 320px)
    {
    .table td{
        padding:8px !important;
    }
    }

    @media only screen and (max-width: 768px){
    .achar-masala{
        font-size:14px;
        display: flex;
        justify-content: flex-end;
    }
    }

</style>



@section('content')

    <div class="container container-checkout py-5">

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <hr />
                <div class="checkouthead">
                    <h3>Checkout</h3>
                </div>
            </div>
        </div>
            <hr />
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                @if(session()->has('status'))
                    <p class="alert alert-success">{{session('status')}}</p>
                @endif
                @if(session()->has('msg'))
                    <p class="alert alert-danger">{{session('msg')}}</p>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                <h4>Shipping Information</h4>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="shippingcheck">
                  <label class="form-check-label" for="shippingcheck">
                        Update shipping address
                  </label>
                </div>
 
                <hr />
                <form action="{{ route('order.store') }}" method="post" >
                    @csrf

                    <div class="row pb-3">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <label for="uname">Email *</label>

                            <input type="text" class="form-control" placeholder="Email" name="email" value="{{$user->email}}" readonly>

                            @if ($errors->has('email'))
                                <span role="alert">
                             <strong class="text-danger">{{ $errors->first('email') }}</strong>
                             </span>
                            @endif
                        </div>

                        </div>

                            <div class="row pb-3">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                            <label for="uname">First Name *</label>
                            <input type="text" class="form-control" placeholder="First Name" name="fname" value="{{$user->fname}}"readonly>
                            @if ($errors->has('fname'))
                                <span role="alert">
                             <strong class="text-danger">{{ $errors->first('fname') }}</strong>
                             </span>
                            @endif
                        </div>


                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                            <label for="uname">Last Name *</label>
                            <input type="text" class="form-control" placeholder="Last Name" name="lname" value="{{$user->lname}}"readonly>
                            @if ($errors->has('lname'))
                                <span role="alert">
                             <strong class="text-danger">{{ $errors->first('lname') }}</strong>
                             </span>
                            @endif
                        </div>
                        </div>


                        <div class="row pb-3">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <label for="uname">Address *</label>
                            <textarea class="form-control" placeholder="Address" name="address" rows="3"readonly>{{$user->address}}</textarea>
                            @if ($errors->has('address'))
                                <span role="alert">
                             <strong class="text-danger">{{ $errors->first('address') }}</strong>
                             </span>
                            @endif
                        </div>
                        </div>

                        <div class="row pb-3">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                            <label for="uname">Country *</label>
                            <select name="country" id="country" class="form-control"  required readonly >
                                <option value="">Select Country</option>
                                @foreach($countries as $country)
                                    @php
                                        // $select = old('country', $user->country) == $country->id ? 'selected' : '';
                                    @endphp
                                    <option value="{{ $country->id ?? old('country')}}" {{ old('country', $user->country) == $country->id ? 'selected' : '' }}>
                                        {{ $country->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('country'))
                                <span role="alert">
                             <strong class="text-danger">{{ $errors->first('country') }}</strong>
                             </span>
                            @endif
                        </div>


                        <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                            <label for="uname">State *</label>
                            <select name="state" id="state" class="form-control"  required readonly >
                                <option value="">Select State</option>
                                @foreach($states as $state)
                                    @php
                                        // $select = old('state', $user->state) == $state->id ? 'selected' : '';
                                    @endphp
                                    <option value="{{ $state->id ?? old('state')}}" {{ old('state', $user->state) == $state->id ? 'selected' : '' }}>
                                        {{ $state->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('state'))
                                <span role="alert">
                             <strong class="text-danger">{{ $errors->first('state') }}</strong>
                             </span>
                            @endif
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                            <label for="uname">City *</label>
                            <input type="text" class="form-control" placeholder="City" name="city" value="{{$user->city}}" readonly>
                            @if ($errors->has('city'))
                                <span role="alert">
                             <strong class="text-danger">{{ $errors->first('city') }}</strong>
                             </span>
                            @endif
                        </div>
                        </div>

                        <div class="row pb-3">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <label for="uname">Zip Code *</label>
                                <input type="text" class="form-control" placeholder="Zip Code" name="zip_code" value="{{$user->zip_code}}" readonly>
                                @if ($errors->has('zip_code'))
                                    <span role="alert">
                             <strong class="text-danger">{{ $errors->first('zip_code') }}</strong>
                             </span>
                                @endif
                            </div>


                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <label for="uname">Phone# </label>
    {{--                            {{ $country_code->phonecode }}--}}
                                <input type="text" class="form-control" id="phone" placeholder="Phone#" name="phone_no" value="{{$user->phone_no}}" readonly>
                                @if ($errors->has('phone_no'))
                                    <span role="alert">
                             <strong class="text-danger">{{ $errors->first('phone_no') }}</strong>
                             </span>
                                @endif
                            </div>
                        </div>
                </div>
                <div class="form-checkout col-lg-4 col-md-4 col-sm-12 col-12 shadow-none p-3 mb-5 bg-light rounded">
                    <div class="row pb-3">
                        <div class="col-lg-7 col-md-7 col-sm-7 col-7 text-left">
                    <h5>Order Summary</h5>
                </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 col-5 text-right">
                            <a href="{{ route('cart.display') }}" style="color: F35901;">Edit Cart</a>
                        </div>
                </div>

                    <div class="ex1">
                        <table class="table text-center ">

                            @foreach($cartCollection as $item)
                                <tr class="">
                                    <td class="text-left achar-masala">
                                        <p> {{ $item->name }}</p>
                                    </td>
                                    <td class="text-right px-0" width="33%">
                                        <p>$ {{ number_format($item->price, 2)}}</strong></p>
                                    </td>
                                </tr>
                                <tr class="border border-0">    
                                    <td class="text-left achar-masala border-0">
                                        <p><small><strong> QTY: {{ $item->quantity }}</strong> </small></p>
                                    </td>
                                    <td class="border-0 text-right px-0" width="33%">
                                        <p><strong>  $ {{ number_format(\Cart::get($item->id)->getPriceSum(), 2)}}</strong></p>
                                    </td>
                                </tr>
                                <tr class="border border-0">
                                    <td class="text-left achar-masala border-0 right">
                                        <p><small><strong> Weight: </strong> </small></p>
                                    </td>
                                    <td class="border-0 px-0" width="33%">
                                        <span class="item-price text-right">
                                        
                                        @if($item->attributes->r_weight != 0)
                                         
                                        
                                          @php
                                            $a = $item->attributes->r_weight;
                                            $r_weight = preg_replace('/[^0-9.]+/', '', $a);
                                            
                                            $check_unit= $item->attributes->r_weight;
                                            
                                           $check_unit = preg_replace('/[^a-z]/i', '', $check_unit);
                                            
                                          @endphp
                                          @if($check_unit == 'oz')
                                           <p><strong>  {{ $item->quantity * $r_weight }}oz</strong></p>
                                           @elseif($check_unit == 'lb')
                                            <p><strong>  {{ $item->quantity * $r_weight }}lb</strong></p>
                                            @else
                                             <p><strong>{{ $item->quantity * $r_weight }}</strong></p>
                                         @endif
                                       
                                        @endif
                                        @if($item->attributes->d_weight != 0)
                                        <p><strong>  {{$item->attributes->d_weight }} / Unit</strong></p>
                                        @endif
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <hr />
                    <div class="row p-2">
                        <div class="col-lg-8 col col-md-8 col-sm-8 col-8">
                            <h6 class="achar-masala">Sub total</h6>
                            <h6 class="achar-masala">Shipping</h6>
                            <h6 class="achar-masala">Sales Tax</h6>
                        </div>
                        <div class="col-lg-4 col col-md-4 col-sm-4 col-4 text-right ps-0">
                            <h6 class="achar-masala">
                                <strong>$ {{ number_format(\Cart::getTotal(), 2)}}</strong>
                            </h6>
                            <h6 class="achar-masala"> -- </h6>
                            <h6 class="achar-masala"> $ 00</h6>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-lg-6 col col-md-6 col-sm-6 col-6">
                            <hr />
                            <h5>Total</h5>
                        </div>
                        <div class="col-lg-6 col col-md-6 col-sm-6 col-6 text-right">
                            <hr />
                           
                            <h5><strong>$ {{ number_format(\Cart::getTotal() , 2)}}</strong></h5>
                            
                        </div>
                    </div>
                    <hr>
                    <div class="row ">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <button type="submit" class="btn form-control method-btn" style="background-color: F35901; color: fff;">
                                <i class="fa fa-dollar-sign" aria-hidden="true"> </i>
                                Payment Method
                                <i class="fa fa-arrow-right" aria-hidden="true"> </i>
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>

@endsection



    <script>
        $(document).ready(function()
        {
            $('#shippingcheck').click( function () 
            {
                if($(this).prop("checked") == true)
                {
                    $(':input').prop('readonly', false);
                    $('#country').prop('readonly', false);
                    $('#state').prop('readonly', false);
                }
                else if($(this).prop("checked") == false)
                {
                    $(':input').prop('readonly', true);
                    $('#country').prop('readonly', true);
                    $('#state').prop('readonly', true);
                }
            });

            $('#country').on('change', function () {
                var country = $('#country option:selected').val();
                $.ajax({
                    type: "GET",
                    url: "{{route('select.state')}}",
                    data: {country: country},
                    success: function (data) {
                        console.log(data);
                        $('#state').html(data);
                    },
                });
            });

        });

        function preventBack()
            {
                window.history.forward();
            }

            setTimeout("preventBack()", 0);

            window.onunload = function () { null };
    </script>


