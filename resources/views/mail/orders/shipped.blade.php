@component('mail::message')
    <body>

    <table class="" style="width:100%;margin-top:10px">
        <tbody>
        <tr>
            <td class="" style="width:20px;padding:7px 0">&nbsp;</td>
            <td align="center" style="padding:7px 0">
                <table class="m_-2950854276005145007table" bgcolor="#ffffff" style="width:100%">
                    <tbody>
                    <tr>
                        <td align="center" style="padding:7px 0">
                            <font size="2" face="Open-sans, sans-serif" color="#555454">
                                <span style="font-weight:500;font-size:28px;text-transform:uppercase;line-height:33px">Congratulations!</span>
                            </font>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:7px 0">
                            <font size="2" face="Open-sans, sans-serif" color="#555454">
                                <span>{{"A new order have been placed on ".config('app.name')." by the following customer: ".$order->user->name. " (".$order->user->email.")"}}</span>
                            </font>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:0!important">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="border:1px solid #d6d4d4;background-color:#f8f8f8;padding:7px 0">
                            <table style="width:100%">
                                <tbody>
                                <tr>
                                    <td width="10" style="padding:7px 0">&nbsp;</td>
                                    <td style="padding:7px 0">
                                        <font size="2" face="Open-sans, sans-serif" color="#555454">
                                            <p style="border-bottom:1px solid #d6d4d4;margin:3px 0 7px;text-transform:uppercase;font-weight:500;font-size:18px;padding-bottom:10px">
                                                Order details
                                            </p>
                                            <span style="color:#777">
                                       <span style="color:#333"><strong>Order:</strong></span> {{ $order->invoice_no }}
                                                Placed on {{ $order->created_at }}<br><br>
                                                @if(!empty($payment->currency_amount))
                                                    <span style="color:#333"><strong>Payment:</strong></span> Online
                                                    Payment
                                                @else
                                                    <span style="color:#333"><strong>Payment:</strong></span> Cash on
                                                    delivery (COD)
                                                @endif
                                       </span>
                                        </font>
                                    </td>
                                    <td width="10" style="padding:7px 0">&nbsp;</td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:7px 0">
                            <font size="2" face="Open-sans, sans-serif" color="#555454">
                                <table class="m_-2950854276005145007table m_-2950854276005145007table-recap"
                                       bgcolor="#ffffff" style="width:100%;">
                                    <thead>
                                    <tr>
                                        <th style="border:1px solid #d6d4d4;background-color:#fbfbfb;font-family:Arial;color:#333;font-size:13px;padding:10px">
                                            SL NO
                                        </th>

                                        <th style="border:1px solid #d6d4d4;background-color:#fbfbfb;font-family:Arial;color:#333;font-size:13px;padding:10px">
                                            Test Name
                                        </th>
                                        <th style="border:1px solid #d6d4d4;background-color:#fbfbfb;font-family:Arial;color:#333;font-size:13px;padding:10px">
                                            Quantity
                                        </th>
                                        <th style="border:1px solid #d6d4d4;background-color:#fbfbfb;font-family:Arial;color:#333;font-size:13px;padding:10px">
                                            Price
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>

									<?php
									$sum = 0;
									$counter = 0;
									?>
                                    @foreach($tests as $i => $test)
                                        <?php $counter++;?>
                                        <tr style="background-color:#dde2e6">
                                            @if(!is_null($test->test_id))
												<?php $sum += $test->test->price;?>
                                                <td style="padding:0.6em 0.4em"> {{ $i+1 }} </td>
                                                <td style="padding:0.6em 0.4em">
                                                    <strong><a href=""
                                                               target="_blank">{{ $test->test->title }}</a></strong>
                                                </td>
                                                <td style="padding:0.6em 0.4em;text-align:center">{{ 1 }}</td>
                                                <td style="padding:0.6em 0.4em;text-align:right">{{ tk($test->test_price). " Tk" }}</td>
                                            @elseif(!is_null($test->helth_sc_id))
												<?php

                                                if(!empty($test->health->old_price)){
	                                                $sum += $test->health->old_price;
                                                }else{
	                                                $sum += $test->health->price;
                                                }
                                                ?>
                                                <td style="padding:0.6em 0.4em"> {{ $i+1 }} </td>
                                                <td style="padding:0.6em 0.4em">
                                                    <strong><a href=""
                                                               target="_blank">{{ $test->health->title }}</a></strong>
                                                </td>
                                                <td style="padding:0.6em 0.4em;text-align:center">{{ 1 }}</td>
                                                <td style="padding:0.6em 0.4em;text-align:right">{{ tk($test->helth_sc_price). " Tk" }}</td>

                                            @endif
                                        </tr>
                                    @endforeach


                                    <tr>
                                        <td bgcolor="#f8f8f8" colspan="2"
                                            style="border:1px solid #d6d4d4;color:#333;padding:7px 0">
                                            Total
                                        </td>
                                        <td  bgcolor="#f8f8f8" style="border:1px solid #d6d4d4;color:#333;padding:7px 0;text-align:center">
                                            {{$counter}}
                                        </td>
                                        <td bgcolor="#f8f8f8" align="right">
                                            {{tk($sum)." TK"}}
                                        </td>
                                    </tr>
                                    @if($order->discount_price>0)
                                        <tr>
                                            <td bgcolor="#f8f8f8" colspan="3"
                                                style="border:1px solid #d6d4d4;color:#333;padding:7px 0">
                                                <strong>Discount Amount</strong>
                                            </td>
                                            <td bgcolor="#f8f8f8" align="right">
                                                {{tk($order->discount_price)." TK"}}
                                            </td>
                                        </tr>


                                    <tr>
                                        <td bgcolor="#f8f8f8" colspan="3"
                                            style="border:1px solid #d6d4d4;color:#333;padding:7px 0">
                                            Sub Total
                                        </td>
                                        <td bgcolor="#f8f8f8" align="right">
                                            {{tk($sum-$order->discount_price)." TK"}}
                                        </td>
                                    </tr>
                                    @endif

                                    @if($order->delivery_charge>0)
                                        <tr>
                                            <td bgcolor="#f8f8f8" colspan="3"
                                                style="border:1px solid #d6d4d4;color:#333;padding:7px 0">
                                                <strong>Home Collection & Report Delivery Fee</strong>
                                            </td>
                                            <td bgcolor="#f8f8f8" align="right">
                                                {{tk($order->delivery_charge)." TK"}}
                                            </td>
                                        </tr>
                                    @endif

                                    <tr>
                                        <td bgcolor="#f8f8f8" colspan="3"
                                            style="border:1px solid #d6d4d4;color:#333;padding:7px 0">
                                            Total Paid
                                        </td>
                                        <td bgcolor="#f8f8f8" align="right">
                                            @if(!empty($payment->currency_amount))
                                                {{tk($payment->currency_amount)." TK"}}
                                            @else
                                                {{(0)." TK"}}
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <td bgcolor="#f8f8f8" colspan="3"
                                            style="border:1px solid #d6d4d4;color:#333;padding:7px 0">
                                            Payable Amount
                                        </td>
                                        <td bgcolor="#f8f8f8" align="right">
                                            @if(!empty($payment->currency_amount))
                                                {{tk($order->total-$payment->currency_amount)." TK"}}
                                            @else
                                                {{tk($order->total)." TK"}}
                                            @endif

                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </font>
                        </td>
                    </tr>

                    <tr>
                        <td class="m_-2950854276005145007box"
                            style="border:1px solid #d6d4d4;background-color:#f8f8f8;padding:7px 0">
                            <table class="m_-2950854276005145007table" style="width:100%">
                                <tbody>
                                <tr>
                                    <td width="10" style="padding:7px 0">&nbsp;</td>
                                    <td style="padding:7px 0">
                                        <font size="2" face="Open-sans, sans-serif" color="#555454">
                                            <p style="border-bottom:1px solid #d6d4d4;margin:3px 0 7px;text-transform:uppercase;font-weight:500;font-size:18px;padding-bottom:10px">
                                                Collection Details :

                                                @if($order->delivery_charge>0)
                                                    <span style="color:#777">
                            Home Collection & Report Delivery
                        </span>
                                                @else
                                                    <span style="color:#777">
                            I'll Come Dyntat Office
                        </span>
                                                @endif
                                            </p>

                                        </font>
                                    </td>
                                    <td width="10" style="padding:7px 0">&nbsp;</td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="m_-2950854276005145007space_footer" style="padding:0!important">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="padding:7px 0">
                            <table class="m_-2950854276005145007table" style="width:100%">
                                <tbody>
                                <tr>
                                    <td class="m_-2950854276005145007box m_-2950854276005145007address" width="310"
                                        style="border:1px solid #d6d4d4;background-color:#f8f8f8;padding:7px 0">
                                        <table class="m_-2950854276005145007table" style="width:100%">
                                            <tbody>
                                            <tr>
                                                <td width="10" style="padding:7px 0">&nbsp;</td>
                                                <td style="padding:7px 0">
                                                    <font size="2" face="Open-sans, sans-serif" color="#555454">
                                                        <p style="border-bottom:1px solid #d6d4d4;margin:3px 0 7px;text-transform:uppercase;font-weight:500;font-size:18px;padding-bottom:10px">
                                                            Delivery address
                                                        </p>

                                                        @if(!is_null($p = json_decode($order->shipping_address)))
                                                            <span style="color:#777">{{$p->name}}</span>
                                                            <br>{{$p->address}}<br>{{$p->mobile}}<br>
                                                            </span>
                                                        @else
                                                            <span style="color:#777">{{ $order->user->name }}</span>
                                                            <br>{{$order->user->address}}<br>{{ $order->user->mobile }}
                                                            <br>{{ $order->user->email }}
                                                            </span>

                                                        @endif

                                                    </font>
                                                </td>
                                                <td width="10" style="padding:7px 0">&nbsp;</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td width="20" class="m_-2950854276005145007space_address" style="padding:7px 0">
                                        &nbsp;
                                    </td>
                                    <td class="m_-2950854276005145007box m_-2950854276005145007address" width="310"
                                        style="border:1px solid #d6d4d4;background-color:#f8f8f8;padding:7px 0">
                                        <table class="m_-2950854276005145007table" style="width:100%">
                                            <tbody>
                                            <tr>
                                                <td width="10" style="padding:7px 0">&nbsp;</td>
                                                <td style="padding:7px 0">
                                                    <font size="2" face="Open-sans, sans-serif" color="#555454">
                                                        <p style="border-bottom:1px solid #d6d4d4;margin:3px 0 7px;text-transform:uppercase;font-weight:500;font-size:18px;padding-bottom:10px">
                                                            Billing address
                                                        </p>
                                                        <span style="color:#777">{{ $order->user->name }}</span><br>{{$order->user->address}}
                                                        <br>{{ $order->user->mobile }}<br>{{ $order->user->email }}
                                                    </font>
                                                </td>
                                                <td width="10" style="padding:7px 0">&nbsp;</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="m_-2950854276005145007space_footer" style="padding:0!important">&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="m_-2950854276005145007box"
                            style="border:1px solid #d6d4d4;background-color:#f8f8f8;padding:7px 0">
                            <table class="m_-2950854276005145007table" style="width:100%">
                                <tbody>
                                <tr>
                                    <td width="10" style="padding:7px 0">&nbsp;</td>
                                    <td style="padding:7px 0">
                                        <font size="2" face="Open-sans, sans-serif" color="#555454">
                                            <p style="border-bottom:1px solid #d6d4d4;margin:3px 0 7px;text-transform:uppercase;font-weight:500;font-size:18px;padding-bottom:10px">
                                                Customer message:
                                            </p>
                                            <span style="color:#777">
                                       No message
                                       </span>
                                        </font>
                                    </td>
                                    <td width="10" style="padding:7px 0">&nbsp;</td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="m_-2950854276005145007space_footer" style="padding:0!important">&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="m_-2950854276005145007footer" style="border-top:4px solid #333333;padding:7px 0">
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
            <td class="m_-2950854276005145007space" style="width:20px;padding:7px 0">&nbsp;</td>
        </tr>
        </tbody>
    </table>


    </body>
@endcomponent
