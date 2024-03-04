@extends('frontend.layouts.master')

@section('style')
<style>
    .net_btn
    {

        background-color:#F35901;
        border-color:#F35901;
    }
    .net_btn:hover
    {
        background-color:#FFFFFF;
        border-color:#F35901;
        color:#F35901;
    }



    .paypal-credit-card .paypal-button-container {
        border-radius: 5px;
        background-color: #FFFFFF;
        padding: 20px;
        max-width: 760px;
        width: 100%;
        margin: 0 auto;
    }
    .paypal-credit-card .card_container {
        border-radius: 5px;
        background-color: #FFFFFF;
        padding: 20px;
        max-width: 760px;
        width: 100%;
        margin: 0 auto;
    }
    .paypal-credit-card .card_field{
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
        height:40px;
        background:white;
        font-size:17px;
        color:#3a3a3a;
        font-family:helvetica, tahoma, calibri, sans-serif;
    }
    .paypal-credit-card .card_field_50{
        width: 50%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
        height:40px;
        background:white;
        font-size:17px;
        color:#3a3a3a;
        font-family:helvetica, tahoma, calibri, sans-serif;
    }
    .paypal-credit-card .card_field_75{
        width: 75%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
        height:40px;
        background:white;
        font-size:17px;
        color:#3a3a3a;
        font-family:helvetica, tahoma, calibri, sans-serif;
    }
    .paypal-credit-card .row {
        display: -ms-flexbox; /* IE10 */
        display: flex;
        -ms-flex-wrap: wrap; /* IE10 */
        flex-wrap: wrap;
        margin: 0 -16px;
    }
    .paypal-credit-card .col-25 {
        -ms-flex: 25%; /* IE10 */
        flex: 25%;
    }
    .paypal-credit-card .col-50 {
        -ms-flex: 50%; /* IE10 */
        flex: 50%;
    }
    .paypal-credit-card input[type=text], select, textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
        height:40px;
        background:white;
        font-size:17px;
        color:#3a3a3a;
        font-family:helvetica, tahoma, calibri, sans-serif;
    }
    .paypal-credit-card input[type=submit] {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    .paypal-credit-card .message_container {
        border-radius: 5px;
        background:#FFFFFF;
        font-size:13px;
        font-family:monospace;
        padding: 20px;
    }
    .paypal-credit-card#loading {
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        position: fixed;
        display: block;
        opacity: 0.7;
        background-color: #fff;
        z-index: 99;
        text-align: center;
    }
    .paypal-credit-card#loading-image {
        position: absolute;
        z-index: 15;
        top: 50%;
        left: 50%;
        margin: -100px 0 0 -150px;
    }
    .paypal-credit-card .spinner {
        position: fixed;
        top: 50%;
        left: 50%;
        margin-left: -50px; /* half width of the spinner gif */
        margin-top: -50px; /* half height of the spinner gif */
        text-align:center;
        z-index:1234;
        overflow: auto;
        width: 100px; /* width of the spinner gif */
        height: 102px; /* height of the spinner gif +2px to fix IE8 issue */
    }
    .paypal-credit-card  .button_container {
        display: flex;
        justify-content: center;
    }
    .paypal-credit-card  button:hover {
        background-color: powderblue;
    }
    .paypal-credit-card button {
        width:229px;
        height:49px;
        background:lightblue;
        border:1px dotted black;
        font-size:17px;
        color:#3a3a3a;
        padding: 12px 20px;
        border-radius: 4px;
        cursor: pointer;
        margin: 0 auto;
    }
    .paypal-credit-card .btn_small{
        width:130px;
        height:39px;
        background:lightblue;
        border:1px dotted black;
        font-size:14px;
        color:#3a3a3a;
    }
    .paypal-credit-card .btn_small:hover {
        background-color: powderblue;
    }
    .paypal-credit-card{
        /*background-color: rgba(232, 232, 232, 1);*/
    }
    .container-payment{
        padding: 60px 0px !important;
    }
    
      h2{
        background: #F35901!important;
        width: 250px!important;
        padding: 10px!important;
        color: white!important;
        margin-bottom: 5px!important;
        margin-top: 15px!important;
    }
    /*--hiding footer for this page only----*/
    .footer-div{
        display:none;
    }
    .footer-div2 footer{
        bottom:0 !important;
    }
    </style>



@section('content')
{{-- @dd($order); --}}
    <div class="container cont_hi pt-5">

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <hr />
                <h2 class="text-center">Payment Detail</h2>
                <hr />
            </div>
        </div>

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

        <div class="row mb-3 container-payment">
            <div class="col-lg-4 col-md-3 col-sm-0 col-0"></div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-12">

                <form action="{{ route('thank.you') }}" method="get" id='payment-form-id'>
                    @csrf
                    <div class="row mb-2">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <label for="">Select Payment Method</label>
                            <select name="payment_type" class="form-control" id="payment-type" required>
                                <option value="">-- SELECT --</option>
                                {{-- <option value="PayPal">Debit / Credit Card</option>
                                <option value="PayPal">Paypal</option> --}}
                                <option value="COD">COD (Cash on delivery)</option>
                                {{-- <option value="NET 15">NET 15</option>
                                <option value="NET 30">NET 30</option> --}}
                            </select>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <!--// PayPal form-->
                            <div id="paypal-credit-card" class="paypal-credit-card pt-3">
                                <div class="container">
                                    <div class="row ">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                                <!-- Buttons container -->
                                            <table border="0" align="center" valign="top" bgcolor="#FFFFFF" style="width:39%">
                                                <tr>
                                                <td colspan="2">
                                                    <div id="paypal-button-container"></div>
                                                </td>
                                                </tr>
                                                <tr><td colspan="2">&nbsp;</td></tr>
                                            </table>

                                            <input type='hidden' id='card-billing-first-name' name='card-billing-first-name' value="{{$order->get_rshipping->first()->fname}}"/>
                                            <input type='hidden' id='card-billing-last-name' name='card-billing-last-name' value="{{$order->get_rshipping->first()->lname}}"/>
                                            <input type='hidden' id='card-billing-address' name='card-billing-address' value="{{$order->get_rshipping->first()->address}}"/>
                                            <input type='hidden' id='card-billing-address-city' name='card-billing-address-city' value="{{$order->get_rshipping->first()->city}}"/>
                                            <input type='hidden' id='card-billing-address-zip_code' name='card-billing-address-zip_code' value="{{$order->get_rshipping->first()->zip_code}}"/>
                                            <input type='hidden' id='card-billing-address-country_name' name='card-billing-address-country_name' value="{{$order->get_rshipping->first()->country}}"/>
                                            <input type='hidden' id='card-billing-address-state_name' name='card-billing-address-state_name' value="{{$order->get_rshipping->first()->state}}"/>
                                            <input type='hidden' id='card-billing-amount' name='card-billing-amount' value="{{$order->grand_total}}"/>

                                            <input type='hidden' name='return' value="{{ url('/paypal-sucess', $order->id) }}">

                                            <input type='hidden' id="order-id" name="order_id" value="{{ $order->id }}">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row ">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <button type="submit" class="btn btn-info form-control net_btn" style="background-color: F35901; color: fff; border-color: F35901">
                                <i class="fa fa-lock" aria-hidden="true"> </i>
                                Continue Securely
                                <i class="fa fa-arrow-right" aria-hidden="true"> </i>
                            </button>
                        </div>
                    </div>

                </form>
            </div>
            <div class="col-lg-4 col-md-3 col-sm-0 col-0"></div>
        </div>

    </div>

    <!-- The Modal -->
<div class="modal" id="loginModal">
    <div class="modal-dialog">
        <div class="modal-content-transparent">


            <!-- Modal body -->
            <div class="modal-body text-center" style="margin-top:30%">
                <img src="{{ asset('images/gif-load.gif') }}" alt="" class="gif-size" style="width:100px">
                <h4 class="product-add-text text-white"><strong><i class="fa fa-book"> </i> Completing Order...</strong></h4>
            </div>


        </div>
    </div>
</div>


@endsection



<!--LIVE-->
<script src="https://www.paypal.com/sdk/js?client-id=ATI48POUXkWw6ujAP-hxnBAhZkW-fxAtcYxPjm2bBYfjpUoxtAprlVKC3L4e7kc7btNAMC0PzeBAYbHF&currency=USD"></script>
<!--sandbox-test-->
<!--<script src="https://www.paypal.com/sdk/js?client-id=AZ5Ysmf-t9v7y2dIb-VEz2EVoy_2Rko7gXhHwG-_0xGxzIYS1FA1iVPkTyn0aMbH0mB4rC4znDHjVFMi&currency=USD"></script>-->

    <script>
        $(document).ready(function()
        {
            $('#paypal-credit-card').hide();
            $('.net_btn').show();
            $('#payment-form-id').show();

            $('.net_btn').click(function ()
            {
                var a = $('#payment-type').val();
                if (a == '')
                {
                    alert('Please select payment method');
                }
                else
                {
                    $('#payment-form-id').hide();
                    $('#loginModal').modal({backdrop: 'static', keyboard: false}, 'show');
                }
            });

            $('BODY').on('change','#payment-type', function ()
            {
                var a = $(this).val();
                if (a == 'PayPal')
                {
                    $('#paypal-credit-card').show();
                    $('.net_btn').hide();
                }
                else
                {
                    $('#paypal-credit-card').hide();
                    $('.net_btn').show();
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


        $( "#payment-method" ).change(function()
    {
        val = $('#payment-method').val();
        if(val == 'online')
        {
            $('#payment-method-btn').prop('disabled', true);
            $('#paypal-credit-card').show();
        }
        else
        {
            $('#payment-method-btn').prop('disabled', false);
            $('#paypal-credit-card').hide();
        }
    });

    // Render the PayPal button into #paypal-button-container
    paypal.Buttons({

        // Set up the transaction
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '{{$order->grand_total}}',
                    },
                }]
            });
        },

        // Finalize the transaction
        onApprove: function(data, actions) {
            
            $('#payment-form-id').hide();
            $('#loginModal').modal({backdrop: 'static', keyboard: false}, 'show');
            
            return actions.order.capture().then(function(details) {
                // Show a success message to the buyer
                var id = $('#order-id').val();
                var payment_code = details.purchase_units[0].payments.captures[0].id

                $.ajax({
                    type: "post",
                    url: "{{route('paypal.payment.option')}}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id: id,
                        payment_code: payment_code
                    },
                    success: function (data)
                    {
                        var id = data.order_id;
                        var url = 'http://asliimall.com/rthank-you/'+id;
                        window.location.replace(url);
                    },
                });
            });
        },

        //Changes credit/debit button behavior to "old" version
        onShippingChange: function(data,actions){
            //if not needed do nothing..
            return actions.resolve();
        }


    }).render('#paypal-button-container');


    function preventBack()
            {
                window.history.forward();
            }

            setTimeout("preventBack()", 0);

            window.onunload = function () { null };

    </script>


