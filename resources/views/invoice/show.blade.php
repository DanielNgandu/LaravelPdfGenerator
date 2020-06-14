<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        body{
            background-color: #F6F6F6;
        }
        .brandSection{
            background-color: #3B99B3;
            border:1px solid #417482;
        }
        .headerLeft h1{
            color:#fff;
            margin: 0px;
            font-size:28px;
        }
        .header{
            border-bottom: 2px solid #417482;
            padding: 10px;
        }
        .headerRight p{
            margin: 0px;
            font-size:10px;
            color:#88CFE3;
            text-align: right;
        }
        .contentSection{
            background-color: #fff;
            padding: 0px;
        }
        .content{
            background-color: #fff;
            padding:20px;
        }
        .content h1{
            font-size:22px;
            margin:0px;
        }
        .content p{
            margin: 0px;
            font-size: 11px;
        }
        .content span{
            font-size: 11px;
            color:#F2635F;
        }
        .panelPart{
            background-color: #fff;
        }
        .panel-body{
            background-color: #3BA4C2;
            color:#fff;
            padding: 5px;
        }
        .panel-footer {
            background-color:#fff;
        }
        .panel-footer h1{
            font-size: 20px;
            padding:15px;
            border:1px dotted #DDDDDD;
        }
        .panel-footer p{
            font-size:13px;
            background-color: #F6F6F6;
            padding: 5px;
        }
        .tableSection{
            background-color: #fff;
        }
        .tableSection h1{
            font-size:18px;
            margin:0px;
        }
        th{
            background-color: #383C3D;
            color:#fff;
        }
        .table{
            padding-bottom: 10px;
            margin:0px;
            border:1px solid #DDDDDD;
        }
        td:nth-child(2){
            text-align: left;
        }
        td {
            height: 100%;
        }
        .bg {
            background-color: #f00;
            width: 100%;
            height: 100%;
            display: block;
        }
        .lastSectionleft{
            background-color: #fff;
            padding-top:20px;
        }
        .Sectionleft p{
            border:1px solid #DDDDDD;
            height:140px;
            padding: 5px;
        }
        .Sectionleft span{
            color:#42A5C5;
        }
        .lastPanel{
            text-align:center;
        }
        .panelLastLeft p,.panelLastRight p{
            font-size:11px;
            padding:5px 2px 5px 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12 brandSection">
            <div class="row">
                <div class="col-md-12 col-sm-12 header">
                    <div class="col-md-3 col-sm-3 headerLeft">

                        {{$invoice_array->to}}
                    </div>
                    <div class="col-md-9 col-sm-9 headerRight">
                        <p>www.yourbrand.com</p>
                        <p>mail@yourbrand.com</p>
                        <p>(000)555 555 55</p>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 content">
                    <h1>Invoice<strong> 0001</strong></h1>
                    <p>01 September,2012</p>
                    <span>Payment due by 25 November 2012</span>
                </div>
                <div class="col-md-12 col-sm-12 panelPart">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 panelPart">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    FROM
                                </div>
                                <div class="panel-footer">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-6 col-xs-6">
                                            <h1>LOGO</h1>
                                        </div>
                                        <div class="col-md-8 col-sm-6 col-xs-6">
                                            <p>your name</p>
                                            <p>your name</p>
                                            <p>your name</p>
                                            <p>your name</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 panelPart">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    TO
                                </div>
                                <div class="panel-footer">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-6 col-xs-6">
                                            <h1>LOGO</h1>
                                        </div>
                                        <div class="col-md-8 col-sm-6 col-xs-6">
                                            <p>your name</p>
                                            <p>your name</p>
                                            <p>your name</p>
                                            <p>your name</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 tableSection">
                    <h1>ITEMS</h1>
                    <table class="table text-center">
                        <thead>
                        <tr class="tableHead">
                            <th style="width:30px;">Quantity</th>
                            <th>Description</th>
                            <th style="width:100px;">Unit Price</th>
                            <th style="width:100px;text-align:center;">TOTAL</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>2</td>
                            <td>dance ac eart neque molsize connalis</td>
                            <td>$100</td>
                            <td>3</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>dance ac eart neque molsize connalis</td>
                            <td>$100</td>
                            <td>3</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>dance ac eart neque molsize connalis</td>
                            <td>$100</td>
                            <td>3</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>dance ac eart neque molsize connalis</td>
                            <td>$100</td>
                            <td>3</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>dance ac eart neque molsize connalis</td>
                            <td>$100</td>
                            <td>3</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>dance ac eart neque molsize connalis</td>
                            <td>$100</td>
                            <td>3</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12 col-sm-12 lastSectionleft ">
                    <div class="row">
                        <div class="col-md-8 col-sm-6 Sectionleft">
                            <p><i>Special Notes</i></p>
                            <span><i>Lorem ipsum dolor sit amet,ipsum dolor.</i> </span>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="panel panel-default">
                                <div class="panel-body lastPanel">
                                    AMOUNT DUE
                                </div>
                                <div class="panel-footer lastFooter">
                                    <div class="row">
                                        <div class="col-md-5 col-sm-6 col-xs-6 panelLastLeft">
                                            <p>SUBTOTAL</p>
                                            <p>TAX</p>
                                            <p>SHIPPING</p>
                                            <p>TOTAL</p>
                                        </div>
                                        <div class="col-md-7 col-sm-6 col-xs-6 panelLastRight">
                                            <p>$90</p>
                                            <p>$90</p>
                                            <p>$90</p>
                                            <p><strong>$270</strong></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>
