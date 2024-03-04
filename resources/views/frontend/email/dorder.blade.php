
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body style="margin: 0; padding: 0;">
     <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td style="padding: 10px 0 30px 0;">

                   <table  align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 0px solid #cccccc; border-collapse: collapse;">
                    <tr>
                        <td bgcolor="#ff591b" style="padding: 0px 40px 3px 40px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">

                            </table>
                        </td>
                    </tr>
                    <tr>

                    </tr>
                </table>
                 <table class="table" align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="    padding: 28px 0px;">
                                    <tr>
                                        <td width="33.33%">
                                         {{-- <img width="90%" src="{{'localhost:8000/public/images/logo.png'}} "> --}}
                                         <img src="http://aslimall.com/public/images/logo.png" alt="" width="70%">
                                        </td>
                                        <td style="text-align: left;"  width="33.33%">
                                          <h4 style="margin-top: 0px; margin-bottom: 5px; color:#F35901">www.asliimall.com</h4>
                                          <h4 style="margin-top: 0px; margin-bottom: 5px; color:#F35901">accounting@asliimall.com</h4>
                                          <h4 style="margin-top: 0px; margin-bottom: 5px; color:#F35901">+1 (206) 484-1034</h4>
                                        </td>
                                        <td style="text-align: center;" width="33.33%">
                                            <h3 style="margin-top: 18px; margin-bottom: 5px; background-color: #F35901; color:#FFFFFF">Order Conformation</h3>
                                          {{-- <button bgcolor="#F35901" style="padding:10px; color:#F35901">Order Conformation</button> --}}
                                          <h4 style="margin-top: 10px; margin-bottom: 5px; color:#F35901 ">IMLA-00002-AMDG</h4>
                                        </td>
                                    </tr>
                  </table>

                  <table class="table" align="center" border="0" cellpadding="0" cellspacing="0"  width="600">
                                    <tr>
                                        <td style="text-align: center;" width="250">
                                          <h2 style="margin-top: 0px; margin-bottom: 5px;color:#F35901">SOLD TO</h2>
                                          <h4 style="margin-top: 0px; margin-bottom: 10px;color:#F35901">
                                            {{$order->get_dshipping->first()->address }},
                                            {{$order->get_dshipping->first()->city }},<br>
                                            {{$state }},
                                            {{$country }},
                                            {{$order->get_dshipping->first()->zip_code }}
                                          </h4>
                                        </td>
                                        <td style="text-align: center;"  width="250">
                                          <h2 style="margin-top: 0px; margin-bottom: 5px;color:#F35901">SHIP TO</h2>
                                          <h4 style="margin-top: 0px; margin-bottom: 10px;color:#F35901">
                                            {{$order->get_dshipping->first()->address }},
                                            {{$order->get_dshipping->first()->city }},<br>
                                            {{$state }},
                                            {{$country }},
                                            {{$order->get_dshipping->first()->zip_code }}
                                          </h4>
                                        </td>
                                    </tr>
                  </table>
                     <table class="table" align="center" border="1" cellpadding="0" cellspacing="0" width="600" style="margin-top:30px">
                                    <tr>
                                        <th bgcolor=" #F35901" style="font-size:12px;text-align: center; color: #ffffff;     padding: 12px 8px;">
                                        ORDER ID
                                        </th>
                                        <th bgcolor="#F35901" style="font-size:12px;text-align: center; color: #ffffff;     padding: 12px 8px;">
                                        CUSTOMER ID
                                        </th>
                                        <th  bgcolor="#F35901" style="font-size:12px;text-align: center; color: #ffffff;     padding: 12px 8px;">
                                        ORDER DATE
                                        </th>
                                        <th  bgcolor="#F35901" style="font-size:12px;text-align: center; color: #ffffff;     padding: 12px 8px;">
                                        SHIP DATE
                                        </th>
                                        <th  bgcolor="#F35901" style="font-size:12px;text-align: center; color: #ffffff;     padding: 12px 8px;">
                                        SHIP VIA
                                        </th>
                                        <th  bgcolor="#F35901" style="font-size:12px;text-align: center; color: #ffffff;     padding: 12px 8px;">
                                        TRACKING
                                        </th>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center;  color:#F35901;   padding: 8px 8px;">
                                            {{$order->id }}
                                        </td>
                                        <td style="text-align: center;  color:#F35901;   padding: 8px 8px;">
                                            {{$order->dinvoice_id}}
                                        </td>
                                        <td style="text-align: center;  color:#F35901;   padding: 8px 8px;">
                                            {{$order->created_at->format('M d, Y') }}
                                        </td>
                                        <td style="text-align: center;   color:#F35901;  padding: 8px 8px;">
                                            N/A
                                        </td>
                                        <td style="text-align: center;  color:#F35901;   padding: 8px 8px;">
                                            N/A
                                        </td>
                                        <td style="text-align: center;   color:#F35901;  padding: 8px 8px;">
                                            N/A
                                        </td>
                                    </tr>

                                </table>
                                <table class="table" align="center" border="1" cellpadding="0" cellspacing="0" width="600" style="margin-top: 30px; margin-bottom: 5px;">
                                     <tr>
                                        <th bgcolor="#F35901" style="font-size:12px;text-align: center; color: #ffffff;     padding: 12px 8px;">
                                          ITEM ID
                                        </th>

                                        <th  bgcolor="#F35901" style="font-size:12px;text-align: center; color: #ffffff;     padding: 12px 8px;">
                                        NAME
                                        </th>
                                        <th  bgcolor="#F35901" style="font-size:12px;text-align: center; color: #ffffff;     padding: 12px 8px;">
                                        QUANTITY
                                        </th>
                                        <th  bgcolor="#F35901" style="font-size:12px;text-align: center; color: #ffffff;     padding: 12px 8px;">
                                        UNIT PRICE
                                        </th>
                                        <th  bgcolor="#F35901" style="font-size:12px;text-align: center; color: #ffffff;     padding: 12px 8px;">
                                        TOTAL PRICE
                                        </th>
                                    </tr>

                                    @foreach ($order->get_dinfo as $item)
                                    <tr>
                                        <td style="text-align: center;  color:#F35901;   padding: 8px 10px;">
                                            {{$item->get_dproducts->item_id}}
                                        </td>
                                        <td style="text-align: center;   color:#F35901;  padding: 8px 10px;">
                                            {{$item->get_dproducts->name}}
                                        </td>
                                        <td style="text-align: center;  color:#F35901;   padding: 8px 10px;">
                                            {{$item->dproduct_qty}}
                                        </td>
                                        <td style="text-align: center;  color:#F35901;   padding: 8px 10px;">
                                            $ {{number_format($item->get_dproducts->d_price,2)}}
                                        </td>
                                        <td style="text-align: center;  color:#F35901;   padding: 8px 10px;">
                                            $ {{number_format($item->get_dproducts->d_price * $item->dproduct_qty,2)}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>


                  <table class="table" align="center" border="1" cellpadding="0" cellspacing="0" width="600" style="margin-top: 30px; margin-bottom: 5px;">
                                    <tr>
                                        <th bgcolor="#F35901" style="font-size:12px;text-align: center; color: #ffffff;     ">
                                          SUB-TOTAL
                                        </th>
                                        <th  bgcolor="#F35901" style="font-size:12px;text-align: center; color: #ffffff;    ">
                                        SALES TAX
                                        </th>
                                        <th  bgcolor="#F35901" style="font-size:12px;text-align: center; color: #ffffff;     ">
                                        SHIPPING /HANDLING
                                        </th>
                                        <th  bgcolor="#F35901" style="font-size:12px;text-align: center; color: #ffffff;     padding: 12px 8px;">
                                        GRAND TOTAL
                                        </th>

                                    </tr>
                                    <tr>
                                        <td style="text-align: center; color:#F35901;">
                                            $ {{number_format($order->grand_total,2) }}
                                        </td>
                                        <td style="text-align: center; color:#F35901;">
                                            $ 0.0
                                        </td>
                                        <td style="text-align: center; color:#F35901;">
                                            $ 0.0
                                        </td>
                                        <td style="text-align: center; color:#F35901;">
                                            <b>$ {{number_format($order->grand_total,2)}}</b>
                                        </td>

                                    </tr>

                  </table>
                  <br>
                  <table class="table" align="center" border="0" cellpadding="0" cellspacing="0" width="600" >
                                    <tr>
                                        <td style="text-align: right;color:#F35901;">
                                          
                                            @if ($order->payment_type == 'NET 15')
                                            <h6 style="font-size:11px;margin-top: 0px; margin-bottom: 0px;">Payment Due Date:</h6>
                                            {{$order->created_at->addDays(15)->format('M d, Y')}}
                                            @endif
                                            @if ($order->payment_type == 'NET 30')
                                            <h6 style="font-size:11px;margin-top: 0px; margin-bottom: 0px;">Payment Due Date:</h6>
                                                {{$order->created_at->addDays(30)->format('M d, Y') }}
                                            @endif
                                        
                                        </td>

                                    </tr>
                  </table>
                   <table class="table" align="center" border="0" cellpadding="0" cellspacing="0" width="600" >
                                    <tr>
                                        <td style=""><br>
                                          <h4 style="margin-top: 0px; margin-bottom: 0px;color:#F35901;">Note: please make a check payable to Asli Inc</h4><br>
                                            <h4 style="margin-top: 0px; margin-bottom: 0px;color:#F35901;">Payment Mailing Address: 45 Hardy Ct #118 Gulfport, MS 39507</h4><br>
                                            <p style="margin-top: 0px; margin-bottom: 0px;color:#F35901;"><b>Recommendation:</b> </p><br>

                                           <p style="margin-top: 0px; margin-bottom: 0px;color:#F35901;"><b>PAYMENT TERMS:</b>
                                            @if($order->payment_type == 'PayPal')
                                                {{$order->payment_type}} ( TxID: {{$order->payment_code}})<br>
                                            @else
                                                {{$order->payment_type}}<br>
                                            @endif
                                           </p>
                                           <p style="margin-top: 0px; margin-bottom: 0px;color:#F35901;"><b>Shipping / DELIVERY:</b><br>
                                        </p>

                                        </td>

                                    </tr>
                  </table>

                   <table class="table" align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="margin-top: 60px;">
                                    <tr>
                                        <td style="text-align: center;"  >
                                          <h3 style="margin-top: 0px; margin-bottom: 5px; background-color: #F35901;color:#FFFFFF;">Head Office</h3>
                                          <p style="margin-top: 0px; margin-bottom: 0px;color:#F35901;">2224 28th AVE </p>
                                          <p style="margin-top: 0px; margin-bottom: 0px;color:#F35901;">Gulfport MS 39507 </p>
                                        </td>
                                        <td style="text-align: center;"  >
                                          <h3 style="margin-top: 0px; margin-bottom: 5px; background-color: #F35901;color:#FFFFFF">Sales and Distribution</h3>
                                         <p style="margin-top: 0px; margin-bottom: 0px;color:#F35901;">D-402, Shree Darshan Chandlodia,</p>
                                          <p style="margin-top: 0px; margin-bottom: 0px;color:#F35901;">Daskroi, Ahmadabad Gujrat, India  </p>
                                        </td>
                                        <td style="text-align: center;" >
                                          <h3 style="margin-top: 0px; margin-bottom: 5px; background-color: #F35901;color:#FFFFFF">Sales and Distribution</h3>
                                          <p style="margin-top: 0px; margin-bottom: 0px;color:#F35901;">#11 Street No. 2 </p>
                                          <p style="margin-top: 0px; margin-bottom: 0px;color:#F35901;">Gulshan-E- Shehbaz Park Lahore, Pakistan    </p>
                                        </td>
                                    </tr>
                  </table>

                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

    </body>
    </html>
