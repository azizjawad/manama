<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Manama Order ID: MFF5000</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <style>
        * {
            font-family: DejaVu Sans, sans-serif;
        }


        @page{ margin: 0;}




    </style>
</head>

<body style="margin:0; padding:0;">
    <!--Mailing Start-->
    <div leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0"
        style="background-color:#ffffff; height:29.7cm; max-width:22cm; margin-bottom: 40px; position: relative;">
        <table bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0"
            style="width:100%; background-color:#ffffff;border-collapse:separate !important; border-spacing:0;color:#242128; margin:0;padding:30px; padding-top: 20px;"
            heigth="auto">

            <tbody>
                <tr>
                    <td align="left" valign="center" style="padding-bottom:20px;border-top:0;width:100% !important;">
                        <img src="logos/logo-dark.png" style="width:200px; height:auto" />
                    </td>
                    <td align="right" valign="center" style="padding-bottom:20px;border-top:0;width:100% !important;">
                        <p
                            style="color: #8f8f8f; font-weight: normal; line-height: 1.2; font-size: 12px; white-space: nowrap; ">
                            <b>Sold By : Outlet Mall</b><br>
                            Address : 26/3, Bhose, Panchgani 412 805.Maharashtra, India.<br>
                            GSTIN : 27AHKPJ8468J1ZN<br>
                            Email : info@manamatoppings.com
                        </p>
                    </td>
                </tr>

                <tr>
                    <td colspan="2" style="padding-top:30px; border-top:1px solid #f1f0f0">
                        <table style="width: 100%;">
                            <tbody>
                                <tr>
                                    <td
                                        style="vertical-align:middle; border-radius: 3px; padding:30px; background-color: #f9f9f9; border-right: 5px solid white;">
                                        <p
                                            style="color:#303030; font-size: 12px;  line-height: 1.6; margin:0; padding:0;">
                                            {{ $order->shipping_address_detail->fullname }}<br>{{ $order->shipping_address_detail->address }}<br>
                                            Order ID : {{ $order->order_no }}<br>
                                            {{($order->gstn_no) ? 'GST No: '.$order->gstn_no:'' }}
                                            {{-- Shipping Method : Standard Shipping --}}
                                        </p>
                                    </td>

                                    <td
                                        style="text-align: right; padding-top:0px; padding-bottom:0; vertical-align:middle; padding:30px; background-color: #f9f9f9; border-radius: 3px; border-left: 5px solid white;">
                                        <p
                                            style="color:#8f8f8f; font-size: 12px; padding: 0; line-height: 1.6; margin:0; ">
                                            Payment Method :
                                            {{ empty($order->transaction_id) ? 'Cash On Delivery' : 'Online Payment' }}<br>
                                            @if(!empty($order->transaction_id))
                                                Transaction ID : {{ $order->transaction_id }}<br>
                                            @endif
                                            {{-- Invoice #: 4020<br> --}}
                                            {{ date('d M, Y', strtotime($order->created_at)) }}
                                        </p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <table style="width: 100%; margin-top:40px;">
                            <thead>
                                <tr>
                                    <th style="text-align:left; font-size: 10px; color:#8f8f8f; padding-bottom: 15px;">
                                        ITEM NAME
                                    </th>
                                    <th style="text-align:right; font-size: 10px; color:#8f8f8f; padding-bottom: 15px">
                                        MRP</th>
                                    <th style="font-size: 10px; color:#8f8f8f; padding-bottom: 15px">
                                        QTY
                                    </th>
                                    <th style="font-size: 10px; color:#8f8f8f; padding-bottom: 15px">
                                        GST
                                    </th>
                                    @if($order->state == 'Maharashtra')
                                        <th style="font-size: 10px; color:#8f8f8f; padding-bottom: 15px">
                                            CGST
                                        </th>
                                        <th style="font-size: 10px; color:#8f8f8f; padding-bottom: 15px">
                                            SGST
                                        </th>
                                    @else
                                        <th style="font-size: 10px; color:#8f8f8f; padding-bottom: 15px">
                                            IGST
                                        </th>
                                    @endif
                                    {{-- <th style="font-size: 10px; color:#8f8f8f; padding-bottom: 15px">
                                        GST
                                    </th>
                                    <th style="text-align:right; font-size: 10px; color:#8f8f8f; padding-bottom: 15px">
                                        IGST
                                    </th> --}}
                                    <th style="text-align:right; font-size: 10px; color:#8f8f8f; padding-bottom: 15px;">
                                        Total
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->order_details as $item)
                                @php
                                    $productDetails = $item->product_info->first();
                                @endphp
                                    <tr>
                                        <td style="padding-top:0px; padding-bottom:5px;">
                                            <h4
                                                style="font-size: 12px; line-height: 1; margin-bottom:0; color:#303030; font-weight:500; margin-top: 10px;">
                                                {{$productDetails->listing_name}}</h4>
                                            <p href="#"
                                                style="font-size: 9px; text-decoration: none; line-height: 1.7; color:#909090; margin-top:0px; margin-bottom:0;">
                                                HSN Code : {{$productDetails->hsn_code}}</p>
                                        </td>
                                        <td style="padding-top:0px; padding-bottom:5px;" align="right">
                                            <p
                                                style="font-size: 11px; line-height: 1; color:#303030; margin-bottom:0; margin-top:0; vertical-align:top; white-space:nowrap;">
                                                &#8377; {{number_format($item->product_cost)}}</p>
                                        </td>
                                        <td align="center">
                                            <p href="#"
                                                style="font-size: 11px; text-decoration: none; line-height: 1; color:#909090; margin-top:0px; margin-bottom:0;">
                                                {{$item->quantity}}
                                                pcs</p>
                                        </td>
                                        <td align="center">
                                            <p href="#"
                                               style="font-size: 11px; text-decoration: none; line-height: 1; color:#909090; margin-top:0px; margin-bottom:0;">
                                                {{$productDetails->gst_rate}}%
                                            </p>
                                        </td>
                                        @if($order->state == 'Maharashtra')
                                            <td style="padding-top:0px; padding-bottom:0; text-align: right;">
                                                <p
                                                    style="font-size: 11px; line-height: 1; color:#303030; margin-bottom:0; margin-top:0; vertical-align:top; white-space:nowrap;">
                                                    &#8377; {{number_format(($item->product_cost * $item->quantity) * ($productDetails->gst_rate / 2) / 100 )}}</p>
                                            </td>
                                            <td style="padding-top:0px; padding-bottom:0; text-align: right;">
                                                <p
                                                    style="font-size: 11px; line-height: 1; color:#303030; margin-bottom:0; margin-top:0; vertical-align:top; white-space:nowrap;">
                                                    &#8377; {{number_format(($item->product_cost * $item->quantity) * ($productDetails->gst_rate / 2) / 100 )}}</p>
                                            </td>
                                        @else
                                            <td style="padding-top:0px; padding-bottom:0; text-align: right;">
                                                <p
                                                    style="font-size: 11px; line-height: 1; color:#303030; margin-bottom:0; margin-top:0; vertical-align:top; white-space:nowrap;">
                                                    &#8377; {{number_format(($item->product_cost * $item->quantity) * $productDetails->gst_rate / 100 )}}</p>
                                            </td>
                                        @endif
                                        {{-- <td align="center">
                                            <p href="#"
                                                style="font-size: 11px; text-decoration: none; line-height: 1; color:#909090; margin-top:0px; margin-bottom:0;">
                                                18%</p>
                                        </td>
                                        <td style="padding-top:0px; padding-bottom:0; text-align: right;">
                                            <p
                                                style="font-size: 11px; line-height: 1; color:#303030; margin-bottom:0; margin-top:0; vertical-align:top; white-space:nowrap;">
                                                &#8377; 10.71</p>
                                        </td> --}}
                                        <td style="padding-top:0px; padding-bottom:0; text-align: right;">
                                            <p
                                                style="font-size: 11px; line-height: 1; color:#303030; margin-bottom:0; margin-top:0; vertical-align:top; white-space:nowrap;">
                                                &#8377; {{number_format($item->product_cost * $item->quantity)}}</p>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>


        <table bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0"
            style="width:100%; background-color:#ffffff; border-spacing:0;color:#242128; margin:0;padding:30px; padding-top: 20px;"
            heigth="auto">
            <tr>
                <td colspan="2" style="border-top:1px solid #f1f0f0">&nbsp;</td>
            </tr>
            <tr>
                <td style="width: 100%">
                    <p href="#"
                        style="font-size: 13px; text-decoration: none; line-height: 1.6; color:#909090; margin-top:0px; margin-bottom:0; text-align: right;">
                        Subtotal : </p>
                </td>
                <td style="padding-top:0px; text-align: right;">
                    <p
                        style="font-size: 13px; line-height: 1.6; color:#303030; margin-bottom:0; margin-top:0; vertical-align:top; white-space:nowrap; margin-left:15px">
                        &#8377;
                        {{$order->sub_total}}</p>
                </td>
            </tr>



            {{-- <tr>
                <td style="width: 100%">
                    <p href="#"
                        style="font-size: 13px; text-decoration: none; line-height: 1.6; color:#909090; margin-top:0px; margin-bottom:0; text-align: right;">
                        Tax : </p>
                </td>
                <td style="padding-top:0px; text-align: right;">
                    <p
                        style="font-size: 13px; line-height: 1.6; color:#303030; margin-bottom:0; margin-top:0; vertical-align:top; white-space:nowrap; margin-left:15px">
                        &#8377; 21.42</p>
                </td>
            </tr> --}}

            <tr>
                <td style="width: 100%">
                    <p href="#"
                        style="font-size: 13px; text-decoration: none; line-height: 1.6; color:#909090; margin-top:0px; margin-bottom:0; text-align: right;">
                        Shipping : </p>
                </td>
                <td style="padding-top:0px; text-align: right;">
                    <p
                        style="font-size: 13px; line-height: 1.6; color:#303030; margin-bottom:0; margin-top:0; vertical-align:top; white-space:nowrap; margin-left:15px">
                        &#8377;
                        {{ ($order->shipping_charges == 0) ? 'Free Shipping':$order->shipping_charges}}</p>
                </td>
            </tr>
            @if ($order->discount > 0)

            <tr>
                <td style="width: 100%">
                    <p href="#"
                        style="font-size: 13px; text-decoration: none; line-height: 1.6; color:#909090; margin-top:0px; margin-bottom:0; text-align: right;">
                        Discount (-): </p>
                </td>
                <td style="padding-top:0px; text-align: right;">
                    <p
                        style="font-size: 13px; line-height: 1.6; color:#303030; margin-bottom:0; margin-top:0; vertical-align:top; white-space:nowrap; margin-left:15px">
                        &#8377; {{$order->discount}}</p>
                </td>
            </tr>
            @endif
            <tr>
                <td style=" width: 100%; padding-bottom:15px;">
                    <p href="#"
                        style="font-size: 13px; text-decoration: none; line-height: 1.6; color:#909090; margin-top:0px; margin-bottom:0; text-align: right;">
                        <strong>Total : </strong>
                    </p>
                </td>
                <td style="padding-top:0px; text-align: right; padding-bottom:15px;">
                    <p
                        style="font-size: 13px; line-height: 1.6; color:#303030; margin-bottom:0; margin-top:0; vertical-align:top; white-space:nowrap; margin-left:15px">
                        <strong>&#8377;
                            {{number_format($order->total_amount)}}</strong></p>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="border-top:1px solid #f1f0f0">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:center;">
                    <p style="color: #909090; font-size:11px; text-align:center;">Invoice was created on a computer and
                        is valid without the signature and seal. </p>
                </td>
            </tr>
        </table>
    </div>
    <!--Mailing End-->
</body>
</html>
