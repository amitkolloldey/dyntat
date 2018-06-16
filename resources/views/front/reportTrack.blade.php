@extends('front.layouts.master')
@section('metas')
    <meta name="description" content="Availing the corporate enquiry">
@stop
@section('title') Report Track -Dyntat Bangladesh Limited | Accredited | Networked | Barcoded @stop
@section('pagetitle') Report Track @stop
@section('pagetitle2')
    <a href="{{route('test.all.front')}}">Services</a><span class="glyphicon glyphicon-menu-right"></span>Report Track
@stop
@section('content')
    <section class="service-postsec">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="main-content">
                        <blockquote class="report-msg">
                            Thank You for availing our services. You can now track your reports here by providing your
                            barcode and lab code details. We look forward to serving you again.
                        </blockquote>
                        <div class="report-info">
                            <ul>
                                <li>If you don't have the details to fill the below mentioned details, you can get the
                                    same information from Collection Centre.
                                </li>
                                <li><a href="{{ route('login') }}" class="btn btn-warning">Login</a> to view/download
                                    the reports, if booked your tests online.
                                </li>
                            </ul>
                        </div>
                        <div class="report-form">
                            {!! Form::open(['route' => 'reportTrackSearch.front', 'class' => 'test-create-form']) !!}
                                <div class="form-group">
                                    <input type="text" class="form-control" name="barcode" placeholder="Barcode  * (Allotted to your sample)">
                                </div>
                                <div>
                                    @if($errors->first('barcode'))
                                        <strong class="error-msg">{{ $errors->first('barcode') }} </strong>
                                    @endif
                                </div>

                                <button type="submit" class="btn btn-default">Check Status</button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-3" id="res">
                    <aside class="right-sidebar">
                        <div class="single-widget services-list sub-menu">
                            <h4>SERVICES</h4>
                            <ul>
                                <li><a href="{{ route('test.all.front') }}">Book A Test Now</a></li>
                                <li><a href="{{ route('testmenu') }}">Test Menu</a></li>
                                <li><a href="{{ route('disorders.front') }}">Disorders</a></li>
                                <li><a href="{{ route('reportTrack.front') }}">Report Track</a></li>
                                <li><a href="{{ route('ServiceProvider.front') }}">Nearest Service Provider</a></li>
                            </ul>
                        </div>
                        <div class="single-widget cart-widget">
                            <img src="{{ asset('public/assets/images/Report_Track.jpg')}}" alt="dyntatbd-ReportTrack">
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>

@endsection
