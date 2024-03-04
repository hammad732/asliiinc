@extends('admin.layouts.master')


@section('style')
<style>
    .card p{
        color: white;
    }
    .order-confirm-text{
        background-color: orangered;
    }
    .pdf_btn{
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 50%;
    }
    .thead{
        background-color: orangered;
        color:white;
    }
    
        .tbody {
        color:white;
    }
    
                .table-responsive {
        display: inline-table!important;
    }
</style>
@endsection()

@section('content')

@php
    $country = App\Country::where('id', $order->get_rshipping->first()->country);
    $country = $country->first()->name;
    $state = App\State::where('id', $order->get_rshipping->first()->state);
    $state = $state->first()->name;
@endphp

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <a href="{{route('sa.rorder.pdf.download', ['order_id' => $order->id])}}" class="pdf_btn link btn btn-success mt-2" type="button">
                            <i class="fas fa-file-invoice"></i>
                            <strong>Generate Incoice</strong>
                        </a>
                    </div>
                </div>

                <div class="card text-white bg-light m-3">
                  <div class="card-body">

                    <div class="container">

                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <img src="{{asset('images/logo.png')}}" alt="" srcset="" width="200px">
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <p >www.asliimall.com</p>
                                <p>accounting@asliimall.com</p>
                                <p>+1 (206) 484-1034</p>

                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <p class="order-confirm-text text-center" style="color:white" >Order Confirmation</p>
                                <p class="text-center">IMLA-00002-AMDG</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                <p class="text-right"><strong>SOLD TO:</strong></p>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                <p>{{$order->get_rshipping->first()->address}},
                                    {{$order->get_rshipping->first()->zip_code}},
                                    {{$order->get_rshipping->first()->city}}, {{$state}}, {{$country}}.
                                </p>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                <p class="text-right"><strong>SHIP TO:</strong></p>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                <p>
                                    {{$order->get_rshipping->first()->address}},
                                    {{$order->get_rshipping->first()->zip_code}},
                                    {{$order->get_rshipping->first()->city}}, {{$state}}, {{$country}}.

                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                                <table class="table table-responsive" border="2px">
                                    <thead class="thead">
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Customer ID</th>
                                            <th>Order Date</th>
                                            <th>Ship Date</th>
                                            <th>Ship Via</th>
                                            <th>Tracking</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody">
                                        <tr>
                                            <td>{{$order->id}}</td>
                                            <td>@php
                                                $words = explode(" ", $state);
                                                $acronym = "";
                                                
                                                foreach ($words as $w) 
                                                {
                                                  $acronym .= $w[0];
                                                }
                                                @endphp
                                                000{{$order->get_user->id }}AM{{$acronym}}</td>
                                            <td>{{$order->created_at->format('M d, Y')}}</td>
                                            <td>N/A</td>
                                            <td>N/A</td>
                                            <td>N/A</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <table class="table table-responsive" border="2px">
                                    <thead class="thead">
                                        <tr>
                                            <th>Item ID</th>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>Unit Price</th>
                                            <th>Total Price</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody">
                                       {{-- @dd($order->get_rinfo); --}}
                                        @foreach ($order->get_rinfo as $item)
                                        @if ($item->get_rproducts == null)
                                        <tr class="text-center">
                                            <td scope="row" colspan="5" > Product Not Avaiable Now</td>
                                        </tr>
                                        @else
                                       
                                        <tr>
                                            <td scope="row">{{$item->get_rproducts->id}}</td>
                                            <td>{{$item->get_rproducts->name}}</td>
                                            <td>{{$item->rproduct_qty}}</td>
                                            <td>${{number_format($item->get_rproducts->r_price,2)}}</td>
                                            <td>${{number_format($item->get_rproducts->r_price * $item->rproduct_qty,2)}}</td>
                                        </tr>

                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-md-0 col-sm-0 col-0">

                            </div>
                            <div class="col-lg-8 col-md-12 col-sm-12 col-12">

                                <table class="table table-responsive" border="2px">
                                    <thead class="thead">
                                        <tr>
                                            <th>Sub-Total</th>
                                            <th>Sales Tax</th>
                                            <th>Shipping</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody">
                                        <tr>
                                            
                                            <td>${{number_format($order->grand_total,2)}}</td>
                                            <td>$ 0.0 </td>
                                            <td>$ 0.0 </td>
                                            <td><b> ${{number_format($order->grand_total,2)}}</b> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-12 col-12">

                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <p class="text-right">
                                    
                                    @if ($order->payment_type == 'NET 15')
                                        <strong>Payment Due Date:</strong>
                                    {{$order->created_at->addDays(15)->format('M d, Y')}}
                                    @endif
                                    @if ($order->payment_type == 'NET 30')
                                        <strong>Payment Due Date:</strong>
                                        {{$order->created_at->addDays(30)->format('M d, Y')}}
                                    @endif
                                </p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                <p><b>Note: please make a check payable to Asli Inc</b></p>
                                <p><b>Payment Mailing Address: 45 Hardy Ct #118 Gulfport, MS 39507</b></p>
                                <p><b>Recommendation</b> </p>
                                <p style="margin-top: 0px; margin-bottom: 0px;"><b>PAYMENT TERMS:</b>
                                    @if($order->payment_type == 'PayPal')
                                        {{$order->payment_type}} ( TxID: {{$order->payment_code}})
                                    @else
                                        {{$order->payment_type}}
                                    @endif
                                 </p>
                                <p><b>Shipping / DELIVERY:</b> </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <p style="color:white" class="order-confirm-text text-center">Head Office</p>
                                <p class="text-center">2224 28th AVE Gulfport MS 39507</p>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <p style="color:white" class="order-confirm-text text-center">Sales & Distribution</p>
                                <p class="text-center">D-402, Shree Darshan Chandlodia, Daskroi, Ahmadabad Gujrat, India </p>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <p style="color:white" class="order-confirm-text text-center">Sales & Distribution</p>
                                <p class="text-center">#11 Street No. 2 Gulshan-E- Shehbaz Park Lahore, Pakistan</p>
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

@section('script')
    <script>
    $(document).ready(function()
    {
        // https://sweetalert.js.org/guides/

    });


</script>
@endsection
