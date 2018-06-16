@extends('front.layouts.master')
@section('metas')
    <meta name="description" content="Availing the corporate enquiry">
@stop
@if( (Route::currentRouteName() == 'Customer' ) )
@section('title') Customer -Dyntat Bangladesh Limited | Accredited | Networked | Barcoded @stop
@section('pagetitle') Customer @stop
@section('pagetitle2')
    <a href="{{route('about.front')}}">About Us</a><span class="glyphicon glyphicon-menu-right"></span><a href="{{route('opportunitie.front')}}">Be Our Partner</a><span class="glyphicon glyphicon-menu-right"></span> Customer

@stop
@endif

@if( (Route::currentRouteName() == 'Corporate' ) )
@section('title') Corporate -Dyntat Bangladesh Limited | Accredited | Networked | Barcoded @stop
@section('pagetitle') Corporate @stop
@section('pagetitle2')
    <a href="{{route('about.front')}}">About Us</a><span class="glyphicon glyphicon-menu-right"></span><a href="{{route('opportunitie.front')}}">Be Our Partner</a><span class="glyphicon glyphicon-menu-right"></span> Corporate

@stop
@endif

@section('content')
    <section class="service-postsec">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="main-content">
                        <blockquote class="report-msg">
                            @if(Route::currentRouteName('Customer'))
                                To know nearest collection centre details and to communicate.
                            @endif
                            @if(Route::currentRouteName('Corporate'))
                                To enquiry about the corporate special offers kindly furnish the details below. Our
                                representative will contact you.
                            @endif
                        </blockquote>
                        <div class="customerCorpo">
                            @if (session('smessage'))
                                <div class="alert alert-success">
                                    {{ session('smessage') }}
                                </div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            {!! Form::open(['route' => 'customerCorpoCreate', 'class' => 'customerCorpo-form']) !!}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Contact Person Name (Min. 3 Char.)</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="personName" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Contact Person Mobile </label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="personMobile" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Contact Person Type</label>
                                        <div class="input-group">
                                            <select class="form-control" name="userType">
                                                <option value="Customer">Customer</option>
                                                <option value="Corporate">Corporate</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Company Name (Min. 3 Char.)</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="companyName" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Contact Person E-Mail (Valid E-Mail)</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="email" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Remarks (Min. 3 Char.)</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="remarks" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <button type="submit" class="btn btn-primary">Request</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-3" id="res">
                    <aside class="right-sidebar">
                        <div class="single-widget services-list sub-menu">
                                <h4>Opportunities</h4>
                            <ul>
                                <li><a href="{{route('Customer', array('reg'=>'Doctor'))}}">Customer</a></li>
                                <li><a href="{{route('Healthcare', array( 'reg'=>'Doctor'))}}">Doctor</a></li>
                                <li><a href="{{route('career')}}">Carrer</a></li>
                                <li><a href="{{route('HealthcarePartner', array( 'reg'=>'Healthcare'))}}">Healthcare
                                        Partner</a></li>
                                <li><a href="{{route('Corporate', array( 'reg'=>'Corporate'))}}">Corporate</a></li>
                            </ul>
                        </div>
                        <div class="single-widget">
                            <img src="{{ asset('public/assets/images/Side_Banner_CORP.jpg')}}">
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>

@endsection
