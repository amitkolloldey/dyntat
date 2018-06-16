@extends('front.layouts.master')
@section('metas')
    <meta name="description" content="A page's description, usually one or two sentences."/>
@stop
@section('title') Order List -Dyntat Bangladesh Limited | Accredited | Networked | Barcoded @stop
@section('pagetitle') Orders @stop
@section('pagetitle2') Orders @stop
@section('content')


    <section class="service-postsec">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="health-post-wapper">
                        <div class="main-content">
                            <div class="panel panel-default user-panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Orders List</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="profile-detiels">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Order ID</th>
                                                <th>Date</th>
                                                <th>Order Status</th>
                                                <th>Report</th>
                                                <th>Action</th>
                                                {{--<th>Edit Order</th>--}}
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($Orders as $Order)
                                                <tr>
                                                    <td>{{$Order->invoice_no}}</td>

                                                    <td>{{date('d-m-Y',strtotime($Order->created_at))}}</td>
                                                    <td>
                                                        @if( !empty($Order->status))
                                                            <span class="label label-warning">{{ $Order->status }}</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($Order->report_id != null)
                                                            <button type="submit"
                                                                    onclick="window.open('{{"../public/adminStroage/".$Order->report->reposts}}')">
                                                                Download
                                                            </button>
                                                        @else
                                                            Not Available
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-app"
                                                           href="{{route('user.order.report', array($Order->id))}}">
                                                            <i class="fa fa-edit"></i>
                                                            Details
                                                        </a>
                                                    </td>
                                                    {{--<td>--}}
                                                        {{--@if( false && ($Order->status=="Pending"||$Order->status=="Processing"))--}}
                                                            {{--<a class="btn btn-app"--}}
                                                               {{--href="{{route('user.order.edit', array($Order->id))}}">--}}
                                                                {{--<i class="fa fa-edit"></i>--}}
                                                                {{--Edit--}}
                                                            {{--</a>--}}
                                                        {{--@else--}}
                                                            {{--Not Available--}}
                                                        {{--@endif--}}
                                                    {{--</td>--}}
                                                </tr>
                                            @endforeach
                                            </tbody>
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