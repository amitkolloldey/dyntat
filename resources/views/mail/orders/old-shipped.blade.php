@component('mail::message')
    <body>
    <div style="padding: 15px;">
        <div>
            <div style="text-align: center;font-size: 27px;padding-bottom: 9px;">CONGRATULATIONS!</div>
            <div>
                <p>
                    {{"A new order was placed on ".config('app.name')." by the following customer: ".$order->user->name. " (".$order->user->email.")"}}
                </p>
            </div>
            <hr>
        </div>
        <div>


            <table style="border: 1px solid #ddd; width: 100%;margin-bottom: 10px;">
                <thead>
                <tr>
                    <th colspan="2"
                        style=" text-align: center; background-color: #fbfbfb;color: #444;font-weight: 500;font-family: Open-sans, sans-serif;font-size: 25px;">
                        Customer Details
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td style=" text-align: left; color: #74787E;font-weight: 500;font-family: Open-sans, sans-serif;font-size: 14px;">
                        Order Id
                    </td>
                    <td style=" text-align: left; color: #74787E;font-weight: 500;font-family: Open-sans, sans-serif;font-size: 14px;">{{ $order->invoice_no }}</td>
                </tr>


                @if(!is_null($p = json_decode($order->shipping_address)))
                    <tr>
                        <td>Name</td>
                        <td>{{$p->name}}</td>
                    </tr>

                    <tr>
                        <td>Contact</td>
                        <td>{{$p->mobile}}</td>
                    </tr>

                    <tr>
                        <td>Shipping Address</td>
                        <td>{{$p->address}}<</td>
                    </tr>
                @else
                    <tr>
                        <td style=" text-align: left; color: #74787E;font-weight: 500;font-family: Open-sans, sans-serif;font-size: 14px;">
                            Name
                        </td>
                        <td style=" text-align: left; color: #74787E;font-weight: 500;font-family: Open-sans, sans-serif;font-size: 14px;">{{ $order->user->name }}</td>
                    </tr>
                    <tr>
                        <td style=" text-align: left; color: #74787E;font-weight: 500;font-family: Open-sans, sans-serif;font-size: 14px;">
                            Email
                        </td>
                        <td style=" text-align: left; color: #74787E;font-weight: 500;font-family: Open-sans, sans-serif;font-size: 14px;">{{ $order->user->email }}</td>
                    </tr>
                    <tr>
                        <td style=" text-align: left; color: #74787E;font-weight: 500;font-family: Open-sans, sans-serif;font-size: 14px;">
                            Contact
                        </td>
                        <td style=" text-align: left; color: #74787E;font-weight: 500;font-family: Open-sans, sans-serif;font-size: 14px;">{{ $order->user->mobile }}</td>
                    </tr>
                    <tr>
                        <td style=" text-align: left; color: #74787E;font-weight: 500;font-family: Open-sans, sans-serif;font-size: 14px;">
                            Shipping Address
                        </td>
                        <td style=" text-align: left; color: #74787E;font-weight: 500;font-family: Open-sans, sans-serif;font-size: 14px;">{{$order->user->address}}</td>
                    </tr>

                @endif

                <tr>
                    <td style=" text-align: left; color: #74787E;font-weight: 500;font-family: Open-sans, sans-serif;font-size: 14px;">
                        Order Date
                    </td>
                    <td style=" text-align: left; color: #74787E;font-weight: 500;font-family: Open-sans, sans-serif;font-size: 14px;">{{ $order->created_at }}</td>
                </tr>
                </tbody>
            </table>
        </div>

        <div>
            <table style="border: 1px solid #ddd;width: 100%;margin-bottom: 10px;">
                <thead>
                <tr>
                    <th colspan="6"
                        style=" text-align: center; background-color: #fbfbfb;color: #444;font-weight: 500;font-family: Open-sans, sans-serif;font-size: 25px;">
                        Test Or Health List
                    </th>
                </tr>
                <tr>
                    <th style=" text-align: left; color: #74787E;font-weight: 500;font-family: Open-sans, sans-serif;font-size: 14px;">
                        ID
                    </th>
                    <th style=" text-align: left; color: #74787E;font-weight: 500;font-family: Open-sans, sans-serif;font-size: 14px;">
                        Test Name
                    </th>
                    <th style=" text-align: left; color: #74787E;font-weight: 500;font-family: Open-sans, sans-serif;font-size: 14px;">
                        Price
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($tests as $i => $test)
                    @if(!is_null($test->test_id))
                        <tr>
                            <td style=" text-align: left; color: #74787E;font-weight: 500;font-family: Open-sans, sans-serif;font-size: 14px;">{{ $i+1 }}</td>

                            <td style=" text-align: left; color: #74787E;font-weight: 500;font-family: Open-sans, sans-serif;font-size: 14px;">{{ $test->test->title }}</td>


                            <td style=" text-align: left; color: #74787E;font-weight: 500;font-family: Open-sans, sans-serif;font-size: 14px;">{{ $test->test_price. " Tk" }}</td>
                        </tr>
                    @elseif(!is_null($test->helth_sc_id))
                        <tr>
                            <td style=" text-align: left; color: #74787E;font-weight: 500;font-family: Open-sans, sans-serif;font-size: 14px;">{{ $i+1 }}</td>
                            <td style=" text-align: left; color: #74787E;font-weight: 500;font-family: Open-sans, sans-serif;font-size: 14px;">{{ $test->health->title }}</td>
                            <td style=" text-align: left; color: #74787E;font-weight: 500;font-family: Open-sans, sans-serif;font-size: 14px;">{{ $test->helth_sc_price. " Tk" }}</td>
                        </tr>
                    @endif

                @endforeach
                </tbody>
            </table>
        </div>

        <div>
            <table style="border: 2px solid #ddd;width: 100%;margin-bottom: 10px;">
                <thead>
                <tr>
                    <th colspan="3"
                        style=" text-align: center; background-color: #fbfbfb;color: #444;font-weight: 500;font-family: Open-sans, sans-serif;font-size: 25px;">
                        Payment Details
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($payment as $pay)
                    @if(!is_null($pay['tran_id']))
                        <tr>
                            <td style=" text-align: left; color: #74787E;font-weight: 500;font-family: Open-sans, sans-serif;font-size: 14px;">
                                Tran Id
                            </td>
                            <td style=" text-align: left; color: #74787E;font-weight: 500;font-family: Open-sans, sans-serif;font-size: 14px;">
                                {{$pay['tran_id']}}
                            </td>
                        </tr>

                        <tr>
                            <td style=" text-align: left; color: #74787E;font-weight: 500;font-family: Open-sans, sans-serif;font-size: 14px;">
                                Card Type
                            </td>
                            <td style=" text-align: left; color: #74787E;font-weight: 500;font-family: Open-sans, sans-serif;font-size: 14px;">
                                {{$pay['card_type']}}
                            </td>
                        </tr>

                        <tr>
                            <td style=" text-align: left; color: #74787E;font-weight: 500;font-family: Open-sans, sans-serif;font-size: 14px;">
                                Tran Date
                            </td>
                            <td style=" text-align: left; color: #74787E;font-weight: 500;font-family: Open-sans, sans-serif;font-size: 14px;">
                                {{$pay['tran_date']}}
                            </td>
                        </tr>

                        <tr>
                            <td style=" text-align: left; color: #74787E;font-weight: 500;font-family: Open-sans, sans-serif;font-size: 14px;">
                                Paid Amount
                            </td>
                            <td style=" text-align: left; color: #74787E;font-weight: 500;font-family: Open-sans, sans-serif;font-size: 14px;">
                                {{$pay['currency_amount']. " Tk"}}
                            </td>
                        </tr>

                    @endif
                @endforeach
                <tfoot>
                <tr>
                    <td
                            style=" text-align: left; color: #74787E;font-weight: 500;font-family: Open-sans, sans-serif;font-size: 14px;">
                        Shipping Status
                    </td>
                    @if($order->delivery_charge>0)
                        <td style=" text-align: left; color: #74787E;font-weight: 500;font-family: Open-sans, sans-serif;font-size: 14px;">
                            Home Collection & Report Delivery
                        </td>
                    @else
                        <td style=" text-align: left; color: #74787E;font-weight: 500;font-family: Open-sans, sans-serif;font-size: 14px;">
                            I'll Come Dyntat Office
                        </td>
                    @endif
                </tr>
                <tr>
                    <td
                            style=" text-align: left; color: #74787E;font-weight: 500;font-family: Open-sans, sans-serif;font-size: 14px;">
                        Total Paid
                    </td>
                    <td style=" text-align: left; color: #74787E;font-weight: 500;font-family: Open-sans, sans-serif;font-size: 14px;">{{$sum. " Tk"}}</td>
                </tr>
                <tr>
                    <td
                            style=" text-align: left; color: #74787E;font-weight: 500;font-family: Open-sans, sans-serif;font-size: 14px;">
                        Payable Amount
                    </td>
                    <td style=" text-align: left; color: #74787E;font-weight: 500;font-family: Open-sans, sans-serif;font-size: 14px;">{{$order->total-$sum. " Tk"}}</td>
                </tr>
                </tfoot>
                </tbody>
            </table>
        </div>

        <div style="color: #74787E;font-weight: 500;font-family: Open-sans, sans-serif;font-size: 14px;padding-top: 10px;">
            <div style="padding-bottom: 8px;">Thanks,</div>
            <div style="padding-bottom: 16px;"> {{ config('app.name') }}
                <div>
                    <address>Confidence Centre (12th floor), Kha-9,<br>
                        Pragoti Sarani, Shazadpur, Gulshan,<br>
                        Dhaka -1212, Bangladesh
                    </address>
                    <a href="tel:+8809666737373">(+88) 09666737373</a> / <a href="tel:+8801944443850">(+88)
                        01944443850</a> <br><a href="tel:+8801944443851">(+88) 01944443851</a><br>
                    <a href="mailto: info@dyntatbd.com">info@dyntatbd.com</a>
                </div>
            </div>
        </div>
    </div>
    </body>
@endcomponent
