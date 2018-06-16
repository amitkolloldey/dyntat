@extends('admin.layouts.master')

@section('title') Dashboard @stop

@section('styles')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('public/admin-assets/plugins/select2/select2.min.css') }}">
    <style>
        .admin-thumb {
            width: 50px;
        }

        .table-bordered > thead > tr > th.table-name {
            background-color: #00a65a;
            color: #ffffff;
            font-size: 35px;
            text-align: center;
        }

        .table-bordered > thead > tr > th,
        .table-bordered > tfoot > tr > th {
            font-size: 16px;
        }
    </style>
@stop

@section('content')

    <?php
    //todo::Parvez tk
    function taka_format($amount = 0)
    {
        $tmp = explode('.', $amount); // for float or double values
        $strMoney = '';
        $divide = 1000;
        $amount = $tmp[0];
        $strMoney .= str_pad($amount % $divide, 3, '0', STR_PAD_LEFT);
        $amount = (int)($amount / $divide);
        while ($amount > 0) {
            $divide = 100;
            $strMoney = str_pad($amount % $divide, 2, '0', STR_PAD_LEFT) . ',' . $strMoney;
            $amount = (int)($amount / $divide);
        }

        if (substr($strMoney, 0, 1) == '0')
            $strMoney = substr($strMoney, 1);

        if (isset($tmp[1])) // if float and double add the decimal digits here.
        {
            return $strMoney . '.' . $tmp[1];
        }
        return $strMoney;
    }
    ?>


    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Order
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('adminHome') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('orders') }}">Orders</a></li>
            <li class="active">Order Details</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">


        <div class="row">

            <div class="box" id="print">
                <!-- /.box-header -->
                <div class="box-body">
                    @if(!is_null($order->ref_info))
                        <div class="col-md-12">
                            <div>
                                <h3>Reference: {{ $order->ref_info }}</h3>
                            </div>
                        </div>
                    @endif
                    <div class="col-md-12">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th colspan="2" class="table-name">Customer Details</th>
                            </tr>
                            <tr>
                                <th>Property</th>
                                <th>Value</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Order No</td>
                                <td>{{ $order->invoice_no }}</td>
                            </tr>
                            {{--<tr>--}}
                            {{--<td>User Type</td>--}}
                            {{--<td>{{ $order->userType }}</td>--}}
                            {{--</tr>--}}
                            <tr>
                                <td>User Name</td>
                                <td>{{ $order->user->name }}</td>
                            </tr>
                            <tr>
                                <td>User Email</td>
                                <td>{{ $order->user->email }}</td>
                            </tr>
                            <tr>
                                <td>User Phone</td>
                                <td>{{ $order->user->mobile }}</td>
                            </tr>
                            <tr>
                                <td>User Address</td>
                                <td>{{ $order->user->address }}</td>
                            </tr>
                            <tr>
                                <td>Shipping Information</td>
                                @if(!is_null($p = json_decode($order->shipping_address)))
                                    <td>{{$p->name}}<br>{{$p->mobile}}<br>{{$p->address}}</td>
                                @else
                                    <td>{{ $order->user->name}}<br>{{$order->user->mobile}}
                                        <br>{{$order->user->address}}</td>
                                @endif
                            </tr>
                            <tr>
                                <td>Order Date</td>
                                <td>{{ $order->created_at }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th colspan="3" class="table-name">Payment Details</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($payment as $pay)
                                <tr>
                                    <td>Payment Store Id<br>Tran Id<br>Card Type<br>Tran Date</td>
                                    <td>{{$pay['id']}}<br>{{$pay['tran_id']}}
                                        <br>{{$pay['card_type']}}
                                        <br>{{$pay['tran_date']}}</td>
                                    <td>{{$pay['currency_amount']}}</td>
                                </tr>
                            @endforeach
                            <tfoot>
                            <tr>
                                <td colspan="2">Shipping Status</td>
                                @if($order->delivery_charge>0)
                                    <td>Home Collection & Report Delivery</td>
                                @else
                                    <td>I'll Come Dyntat Office</td>
                                @endif
                            </tr>
                            <tr>
                                <td colspan="2">Total Paid</td>
                                <td>{{$sum}}</td>
                            </tr>
                            <tr>
                                <td colspan="2">Payable Amount</td>
                                <td>{{$order->total-$sum}}</td>
                            </tr>
                            </tfoot>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th colspan="6" class="table-name">Test Or Health List
                                    {{--<span--}}
                                    {{--style="float: right;">--}}
                                    {{--@if($order->status == "Pending" || $order->status == "Processing" || $order->status == "Sample Collection Processing")--}}
                                    {{--<a--}}
                                    {{--href="{{route('order.processing.edit', array($order->id))}}"--}}
                                    {{--style="color: white;">ADD</a></span>@endif--}}
                                </th>
                            </tr>
                            <tr>
                                <th>ID</th>
                                <th>Test Name</th>
                                <th>Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tests as $i=>$test)
                                @if(!is_null($test->test_id))
                                    <tr>
                                        <td>{{ $i+1 }}</td>
                                        

                                        <td>{{ $test->test->title }}</td>

                                        {{--@if($test->attributes->product_type == 'Test')--}}
                                        {{--@else--}}
                                        {{--<td>Not Available</td>--}}
                                        {{--@endif--}}

                                        <td>{{ $test->test_price }}</td>
                                    </tr>
                                @elseif(!is_null($test->helth_sc_id))
                                    <tr>
                                        <td>{{ $i+1 }}</td>
                                        
                                        <td>{{ $test->health->title }}</td>


                                        <td>{{ $test->helth_sc_price }}</td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        @if($order->report_id != NULL)
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th colspan="6" class="table-name">Report</th>
                                </tr>
                                <tr>
                                    <th>ID</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Report</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->created_at}}</td>
                                    <td>
                                        @if( !empty($order->status))
                                            <span class="label label-warning">{{ $order->status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($order->report_id != null)
                                            <button type="submit"
                                                    onclick="window.open('{{adminUrl($order->report->reposts)}}')">
                                                Download
                                            </button>
                                        @else
                                            Not Available
                                        @endif
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                        @endif


                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </section>
    <!-- /.content -->

@stop
@section('scripts')
    <!-- Select2 -->
    <script src="{{ asset('public/admin-assets/plugins/select2/select2.full.min.js') }}"></script>
    <!-- page script -->
    <script>
        $(".select2").select2();
        $(function () {
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
    </script>
@stop