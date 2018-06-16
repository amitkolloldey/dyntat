@extends('front.layouts.master')
@section('metas')
    <meta name="description" content="A page's description, usually one or two sentences."/>
@stop
@section('title') Order Details -Dyntat Bangladesh Limited | Accredited | Networked | Barcoded @stop
@section('pagetitle') Order Details @stop
@section('pagetitle2') Order Details @stop
@section('content')


    <section class="service-postsec">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="health-post-wapper">
                        <div class="main-content">
                            <div class="panel panel-default user-panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Orders Details</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="profile-detiels">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Test Name</th>
                                                <th style="text-align: right">Price</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($tests as $i => $test)
                                                @if(!is_null($test->test_id))
                                                    <tr>
                                                        <td>{{ $i+1}}</td>
                                                        <td>{{ $test->test->title }}</td>

                                                        <td style="text-align: right">{{ "".tk($test->test_price) }}</td>
                                                    </tr>
                                                @elseif(!is_null($test->helth_sc_id))
                                                    <tr>
                                                        <td>{{ $i+1 }}</td>
                                                        <td>{{ $test->health->title }}</td>

                                                        <td style="text-align: right">{{ "".tk($test->helth_sc_price) }}</td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                            </tbody>
                                            <tfoot style="text-align: right">
                                            <tr>
                                                <td colspan="2">Home Collection & Report Delivery</td>
                                                <td>{{"".tk($order->delivery_charge)}}</td>
                                            </tr>
                                            @if($order->discount_price>0)
                                                <tr>
                                                    <td colspan="2">Discount</td>
                                                    <td>{{"".tk($order->discount_price)}}</td>
                                                </tr>
                                            @endif
                                            <tr>
                                                <td colspan="2"><b>Total</b></td>
                                                <td>{{"".tk($order->total)}}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><b>Paid Amount</b></td>
                                                <td>{{"".tk($payment)}}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><b>Payable Amount</b></td>
                                                <td>{{"".tk(($order->total)-$payment)}}</td>
                                            </tr>
                                            </tfoot>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3" id="res">
                    <aside class="right-sidebar">
                        <div class="single-widget services-list">
                            <h4>USER PROFILE</h4>
                            <ul>
                                <li><a href="{{route('user.profile')}}">Your Profile</a></li>
                                <li><a href="{{route('change.password')}}">Change Password</a></li>
                                <li><a href="{{ route('user.orders') }}">Order History</a></li>
                                <li><a href="" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Log Out</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('scripts')
@endsection