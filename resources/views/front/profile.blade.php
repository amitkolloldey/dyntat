@extends('front.layouts.master')
@section('metas')
    <meta name="description" content="A page's description, usually one or two sentences."/>
@stop
@section('title') User Profile -Dyntat Bangladesh Limited | Accredited | Networked | Barcoded @stop
@section('pagetitle') User Profile @stop
@section('pagetitle2') User Profile @stop
@section('content')
    <section class="service-postsec">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="health-post-wapper">
                        <div class="main-content">
                            <div class="panel panel-default user-panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Your Profile</h3>
                                    <h3 class="panel-title edit-profile-url">
                                        <a href="{{route('edit.profile')}}">Edit</a>
                                    </h3>
                                </div>
                                <div class="panel-body">
                                    <div class="profile-detiels">
                                        <div class="attrebut">
                                            <div class="property">
                                                <h6>Your Image</h6>
                                            </div>
                                            <div class="value5">
                                                @if( $yourImg =  json_decode(Auth::user()->picture) )
                                                    <img src="{{adminUrl($yourImg->thumb)}}" alt="" class="profile-img">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="attrebut">
                                            <div class="property">
                                                <h6>Your Name</h6>
                                            </div>
                                            <div class="value5">
                                                <p>{{Auth::user()->name}}</p>
                                            </div>
                                        </div>
                                        <div class="attrebut">
                                            <div class="property">
                                                <h6>Your Email</h6>
                                            </div>
                                            <div class="value5">
                                                <p>{{Auth::user()->email}}</p>
                                            </div>
                                        </div>
                                        <div class="attrebut">
                                            <div class="property">
                                                <h6>Your Phone</h6>
                                            </div>
                                            <div class="value5">
                                                <p>{{Auth::user()->mobile}}</p>
                                            </div>
                                        </div>
                                        {{--<div class="attrebut">--}}
                                            {{--<div class="property">--}}
                                                {{--<h6>Your Optional Phone</h6>--}}
                                            {{--</div>--}}
                                            {{--<div class="value5">--}}
                                                {{--<p>{{Auth::user()->mobile_opt}}</p>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        <div class="attrebut">
                                            <div class="property">
                                                <h6>Your Address</h6>
                                            </div>
                                            <div class="value5">
                                                <p>{{Auth::user()->address}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <aside class="right-sidebar">
                        <div class="single-widget services-list sub-menu">
                            <h4>User Profile</h4>
                            <ul>
                                <li><a href="{{route('user.profile')}}">Your Profile</a></li>
                                <li><a href="{{route('change.password')}}">Change Password</a></li>
                                <li><a href="{{ route('user.orders') }}">Order History</a></li>
                                <li><a href=""
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log
                                        Out</a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
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