<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel Receipt Generator') }}</title>
    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            /*border: 1px solid #eee;*/
            /*box-shadow: 0 0 10px rgba(0, 0, 0, .15);*/
            font-size: 20px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 0px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 30px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 1px;
        }

        .invoice-box table tr.heading td {
            /*background: #eee;*/
            /*border-bottom: 1px solid #ddd;*/
            color: white;
            font-weight: bold;
            font-size: larger;
        }

        .invoice-box table tr.details td {
            padding-bottom: 10px;
        }

        .invoice-box table tr.item td{
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
            text-align: right;

        }
        .invoice-box table tr td:nth-child(2) {
            text-align: center;
        }
        .invoice-box table tr td:nth-child(3) {
            text-align: right;
        }
        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .rtl table {
            text-align: right;
        }

        .rtl table tr td:nth-child(2) {
            text-align: left;
        }
        * {
            -webkit-print-color-adjust: exact !important;   /* Chrome, Safari */
            color-adjust: exact !important;                 /*Firefox*/
        }
    </style>
</head>

<body>
<div class="invoice-box p1-5">
    <table cellpadding="0" cellspacing="0" class="table">
        <tr class="top">
            <td colspan="3">
                <table>
                    <tr class="information">
                        <td colspan="4">
                            <table class="table table-striped">
                                <tr>
                                    <td style="padding-right:100px;">
                                        <h3 class="text-white nopadding">
                                            {{$companydets_array->company_name}}
                                        </h3>
                                    </td>

                                    <td style="text-align:right">
                                      Receipt #: {{$invoice_array->id}}<br>
                                        Created: {{date('d-M-y', strtotime($invoice_array->created_at))}}<br>
                                    </td>
                                </tr>
                            </table>
                        </td>

                    </tr>

                    <tr class="information">
                        <td colspan="4">
                            <table class="table table-striped">
                                <tr>
                                    <td style="padding-right:100px;">
                                        <h4>Bill From:</h4>
                                        TPIN: {{$companydets_array->company_tpin}},<br>
                                        Website: <a href="{{$companydets_array->company_website}}">
                                      {{$companydets_array->company_website}}</a> <br>
                                        Email:<a mailto="{{$companydets_array->company_email}}"></a>
                                         {{$companydets_array->company_email}}<br>
                          Residential Address: {{$companydets_array->company_physical_address}}<br>
                               Postal Address: {{$companydets_array->company_postal_address}}
                                    </td>
                                    <td style="text-align:right">
                                        <h4>Bill To:</h4>
                                        {{$invoice_array->to}}<br>
                                        {{$invoice_array->client_physical_address}}<br>
                                        {{$invoice_array->client_phone}}<br>
                                        {{$invoice_array->client_email}}<br>
                                    </td>

                                </tr>

                            </table>
                        </td>
                    </tr>
                    <tr class="heading title" style="background-color: #1b4b72;color: #1b4b72">
                        <td style="text-align: left;">
                            Item
                        </td>
                        <td style="text-align: left;">
                            Quantity
                        </td>
                        <td style="text-align: left;">
                            Unit Cost
                        </td>
                        <td style="text-align: left;">
                            Price (K)
                        </td>
                    </tr>
                    @foreach($invoiceItemsresults ?? '' as $item)
                        <tr class="item">
                            <td style="text-align: left;">
                                {{$item->item_description}}
                            </td>
                            <td style="text-align: left;">
                                {{$item->item_quantity}}
                            </td>
                            <td style="text-align: left;">
                                {{number_format($item->item_cost,2)}}
                            </td>
                            <td style="text-align: left;">
                                {{number_format($item->item_cost * $item->item_quantity,2) }}
                            </td>
                        </tr>
                    @endforeach

                    <tr class="total">

                        <td colspan="4"  style="text-align:right;">
                            @foreach($total as $t)
                                <p class="title" style="color: #0EA84C;font-size: larger">Total:K {{number_format($t->total,2) }}</p>
                            @endforeach
                        </td>
                    </tr>
                    <tr>

                        <td colspan="4">
                            
                        </td>
                    </tr>
                    <tfoot>
                    <tr>
                        <td>
                            <p class="lead" >
                                Prepared By:<strong>{{ Auth::user()->first_name." ".Auth::user()->last_name }}</strong> </p>
                        </td>
                    </tr>
                    </tfoot>
                </table>
            </table>
                <p style="font-size: 10px;text-align: right;">&copy;copyright:<a href="https://www.danielngandu.com"> danielngandu.com</a> </p>

</div>
</body>
</html>
