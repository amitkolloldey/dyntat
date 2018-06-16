@extends('front.layouts.master')
@section('metas')
    <meta name="description" content="Dyntat Health Screen Magazine -Monthly magazine focuses on Healthcare discussion which is conceptualized and published by passionate professionals at Dyntat">
@stop
@section('title') Publicaion -Dyntat Bangladesh Limited | Accredited | Networked | Barcoded @stop
@section('pagetitle') Publicaion @stop
@section('pagetitle2')
    <a href="{{route('about.front')}}">About Us</a><span class="glyphicon glyphicon-menu-right"></span> Publicaion
@stop
@section('content')
    <section class="service-postsec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-content">
                        <blockquote class="report-msg">
                            As a diagnostic laboratory with passion for healthcare, Dyntat Technologies Limited
                            prides for its role as publisher of well respected, decade old publication which is
                            conceptualized and published by passionate professionals at Dyntat. Started in 2003, this
                            40 pager monthly magazine today has a circulation of 70,000 copies and reaches out to
                            Doctors, Pathologists and Healthcare professionals.
                        </blockquote>
                        <div class="container_Book_list">
                            @if($publications)
                                @foreach($publications as $publication)
                                    <div class="single-book">
                                        <div class="book-thumb">
                                            <div class="bk-front">
                                                <a href="{{route('publication.front', array($publication->link))}}"
                                               class="more-link"><div class="bk-cover"
                                                     style="background-image: url('{{adminUrl($publication->thumb)}}')"></div></a>
                                            </div>
                                            <div class="bk-left">
                                                <h5>
                                                    <span>{{$publication->date}}</span> <span>H S</span>
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="book-content">
                                            <a href="{{route('publication.front', array($publication->link))}}"
                                               class="more-link">{{$publication->date}}</a>
                                        </div>
                                    </div>
                                @endforeach
                                <div>
                                    {{$publications->links()}}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                {{--<div class="col-md-3" id="res">--}}
                    {{--<aside class="right-sidebar">--}}
                        {{--<div class="single-widget services-list sub-menu">--}}
                            {{--<h4>About Us</h4>--}}
                            {{--<ul>--}}
                                {{--<li><a href="{{ route('about.front') }}"> Company</a></li>--}}
                                {{--<li><a href="{{ route('management.front') }}"> Management & Leadership</a></li>--}}
                                {{--<li><a href="{{ route('footprint.front') }}"> Our Global Footprint</a></li>--}}
                                {{--<li><a href="{{ route('publications.front') }}">Publication</a></li>--}}
                                {{--<li><a href="{{route('media.front')}}">Media</a></li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                        {{--<div class="single-widget">--}}
                            {{--<h4>Our Network</h4>--}}
                            {{--<p>Networks of authorized, trained and equipped collection centers serve through a very--}}
                                {{--strong IT and Logistics.</p>--}}
                            {{--<img src="{{ asset('public/assets/images/bd-Network.png')}}" alt="dyntatbd-Network">--}}
                            {{--<p>*SERVING AFGANISTAN, BAHRAIN, BANGLADESH, EGYPT, INDIA, IRAQ, KUWAIT, NEPAL, OMAN, QATAR,--}}
                                {{--SAUDI ARABIA, UNITED ARAB EMIRATES AND OTHER COUNTRIES.</p>--}}
                        {{--</div>--}}
                    {{--</aside>--}}
                {{--</div>--}}
            </div>
        </div>
    </section>

@endsection
