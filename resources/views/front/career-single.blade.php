@extends('front.layouts.master')
@section('metas')
    <meta name="description" content="Dyntat Bangladesh Limited"/>
@stop
@section('title') {{$Career->title}} -Dyntat Bangladesh Limited @stop
@section('pagetitle') Job Details @stop
@section('pagetitle2')
    <a href="{{route('about.front')}}">About Us</a><span class="glyphicon glyphicon-menu-right"></span><a
            href="{{route('career')}}">Career</a><span class="glyphicon glyphicon-menu-right"></span>Job Details

@stop
@section('content')
    <section class="service-postsec">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="main-content">
                        <section class="slider">
                            <img src="{{ asset('public/assets/images/pic_slider_4_2.jpg') }}" alt="Career">
                        </section>
                        <div class="job-post-wrapper single-job-post">
                            <div class="single-job">
                                <h3>Job Title : {{$Career->title}}</h3>
                                <span class="email"><strong>Send CV : </strong> {{strtolower($Career->email)}}</span>
                                <span class="enddate"><strong> Deadline : </strong> {{$Career->endDate}}</span>
                                <div class="job-content">
                                    <strong>Job Details : </strong> {!! $Career->content !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3" id="res">
                    <aside class="right-sidebar">
                        <div class="single-widget services-list sub-menu">
                            <h4>Laboratory</h4>
                            <ul>
                                <li><a href="{{ route('laboratory.front') }}">About Lab</a></li>
                                <li><a href="{{ route('accreditation.front') }}">Quality</a></li>
                                <li><a href="{{ route('technologies.front') }}">Technologies</a></li>
                                <li><a href="{{ route('instruments.front') }}">Instruments</a></li>
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
