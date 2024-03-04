@extends('frontend.layouts.master')

<style>
    .card p {
        color: orangered !important;
    }

    .card h3 {
        color: orangered !important;
    }

    .order-confirm-text {
        background-color: orangered
    }

    .pdf_btn {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 50%;
    }

    .thead {
        background-color: orangered;
        color: white;
    }

    .tbody {
        color: orangered;
    }

    .table-responsive {
        display: inline-table !important;
    }

    .invoice-generate-button {
        padding-bottom: 10px !important;
    }

    .content-wrapper {
        padding-top: 20px;
        padding-bottom: 20px;
    }

    .invoice-card {
        border: 1px solid rgba(0, 0, 0, .125);
        border-radius: 0.25rem;
        margin: 1rem !important;
    }

    .card-body {
        padding: 1rem;
    }

    h5 {
        font-size: 1.25rem !important;
        font-weight: 500 !important;
        color: white !important;
    }

    .note-row {
        margin-bottom: 10px;
    }

    p {
        margin-bottom: 16px !important;
        margin-top: 16px !important;
    }

    @media screen and (max-width: 480px) {
        .checkout-table {
            font-size: 13px !important;
            /*overflow-x:auto;*/
        }
    }

    .thankyou-table-div{
        overflow-x: auto !important;
    }
</style>

@section('content')
    @php
        $country = App\Country::where('id', $order->get_rshipping->first()->country);
        $country = $country->first()->name;
        $state = App\State::where('id', $order->get_rshipping->first()->state);
        $state = $state->first()->name;
    @endphp

    {{-- @dd($order) --}}

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper pt-3">
        <!-- Main content -->
        <section class="content">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center invoice-generate-button ">
                        <a href="{{ route('pdf.download', ['order_id' => $order->id]) }}"
                            class="pdf_btn link btn btn-success mt-2" type="button">
                            <i class="fas fa-file-invoice"></i>
                            <strong>Generate Invoice</strong>
                        </a>
                    </div>
                </div>

                <div class="card invoice-card m-3">
                    <div class="card-body">

                        <div class="">

                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                    <img src="{{ asset('images/logo.png') }}" alt="" srcset="" width="200px">
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                    <p>www.asliiinc.com</p>
                                    <p>{{$connects->email}}</p>
                                    <p>{{$connects->phone_no}}</p>

                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                    <h5 class="order-confirm-text text-center text-white">Order Confirmation</h5>
                                    <p class="text-center ">IMLA-00002-AMDG</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                    <p class="text-right"><strong>SOLD TO:</strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                    <p>{{ $order->get_rshipping->first()->address }},
                                        {{ $order->get_rshipping->first()->zip_code }},
                                        {{ $order->get_rshipping->first()->city }}, {{ $state }},
                                        {{ $country }}.
                                    </p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                    <p class="text-right"><strong>SHIP TO:</strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                    <p>
                                        {{ $order->get_rshipping->first()->address }},
                                        {{ $order->get_rshipping->first()->zip_code }},
                                        {{ $order->get_rshipping->first()->city }}, {{ $state }},
                                        {{ $country }}.
                                    </p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12 thankyou-table-div">

                                    <table class="myTable table table-responsive table-sm checkout-table" border="2px">
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
                                                <td>{{ $order->id }}</td>
                                                <td>{{ $order->rinvoice_id }}</td>
                                                <td>{{ $order->created_at->format('M d, Y') }}</td>
                                                <td>N/A</td>
                                                <td>N/A</td>
                                                <td>N/A</td>
                                            </tr>
                                        </tbody>
                                    </table>


                                    <table class=" myTable table table-responsive table-sm checkout-table" border="2px">
                                        <thead class="thead">
                                            <tr>
                                                <th>Item ID</th>
                                                <th>Name</th>
                                                <th>Quantity</th>
                                                <th>Item Weight</th>
                                                <th>Case Price</th>
                                                <th>Total Price</th>
                                            </tr>
                                        </thead>
                                        <tbody class="tbody">

                                            @foreach ($order->get_rinfo as $item)
                                                <tr>


                                                    <td scope="row">{{ $item->get_rproducts->item_id }}</td>
                                                    <td>{{ $item->get_rproducts->name  }}</td>
                                                    <td>{{ $item->rproduct_qty }}</td>
                                                    @if ($item->r_varient_id == null)
                                                    <td>{{ $item->get_rproducts->r_weight }}</td>
                                                    @else
                                                    {{-- <td>{{ $item->get_rproducts->variant }}</td> --}}
                                                    @foreach ($item->get_rproducts->variant as $variant)

                                                        @if ($item->r_varient_id == $variant->id)
                                                            <td>{{ $variant->unit }} / {{ $variant->weight }}</td>
                                                            
                                                        @endif
                                                        
                                                    @endforeach
                                                    @endif
                                                    
                                                    <td>$ {{ number_format($item->rproduct_pirce, 2) }}</td>
                                                    <td>$ {{ number_format($item->rproduct_pirce * $item->rproduct_qty, 2) }}</td>
                                                    {{-- @dd($item->get_rproducts->r_price); --}}
                                                   
                                                </tr>
                                            @endforeach


                                        </tbody>
                                    </table>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4 col-md-0 col-sm-0 col-0">

                                </div>
                                <div class="col-lg-8 col-md-12 col-sm-12 col-12 thankyou-table-div">

                                    <table class="myTable table table-responsive checkout-table table-sm checkout-table"
                                        border="2px">
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
                                                <td>$ {{ number_format($order->grand_total, 2) }}</td>
                                                <td>$ 0.0 </td>
                                                <td>$ 0.0 </td>
                                                <td><b> $ {{ number_format($order->grand_total, 2) }}</b> </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-12 col-12">

                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                    <p>

                                        @if ($order->payment_type == 'NET 15')
                                            <strong>Payment Due Date:</strong>
                                            {{ $order->created_at->addDays(15)->format('M d, Y') }}
                                        @endif
                                        @if ($order->payment_type == 'NET 30')
                                            <strong>Payment Due Date:</strong>
                                            {{ $order->created_at->addDays(30)->format('M d, Y') }}
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row note-row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12 note-row-inner-div">
                                    <p><b>Note: please make a check payable to Asli Inc</b></p>
                                    <p><b>Payment Mailing Address: {{$connects->address}}</b></p>
                                    <p><b>Recommendation</b> </p>
                                    <p style="margin-top: 0px; margin-bottom: 0px;"><b>PAYMENT TERMS:</b>
                                        @if ($order->payment_type == 'PayPal')
                                            {{ $order->payment_type }} ( TxID: {{ $order->payment_code }})
                                        @else
                                            {{ $order->payment_type }}
                                        @endif
                                    </p>
                                    <p><b>Shipping / DELIVERY:</b> </p>
                                </div>
                            </div>

                            {{-- <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                    <h5 class="order-confirm-text text-center text-white">Head Office</h5>
                                    <p class="text-center">2224 28th AVE Gulfport MS 39507</p>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                    <h5 class="order-confirm-text text-center text-white">Sales & Distribution</h5>
                                    <p class="text-center">D-402, Shree Darshan Chandlodia, Daskroi, Ahmadabad Gujrat, India
                                    </p>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                    <h5 class="order-confirm-text text-center text-white">Sales & Distribution</h5>
                                    <p class="text-center">#11 Street No. 2 Gulshan-E- Shehbaz Park Lahore, Pakistan</p>
                                </div>
                            </div> --}}

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
        $(document).ready(function() {
            // https://sweetalert.js.org/guides/

            swal({
                title: "Thank you for your order!",
                // text: "You clicked the button!",
                icon: "success",
                button: "Got it",
            });

            $('.myTable').DataTable({
                responsive: true,
                "searching": false,
                "paging": false,
                "ordering": false,
                "info": false
            });
        });
    </script>
@endsection
