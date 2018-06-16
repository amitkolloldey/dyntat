@extends('front.layouts.master')
@section('metas')
    <meta name="description" content="A page's description, usually one or two sentences."/>
@stop
@section('title') Sitemap -Dyntat Bangladesh Limited | Accredited | Networked | Barcoded @stop
@section('pagetitle') Sitemap @stop
@section('pagetitle2') Sitemap @stop
@section('content')
    <section class="service-postsec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-content">
                        <blockquote class="report-msg">www.dyntatbd.com :: Sitemap :- Get an overview of each
                            sections and pages in the site
                        </blockquote>
                        <div style="text-align: center">
                            <div class="tree" style="width:100%" align="center">
                                <ul>
                                    <li>
                                        <a href="{{route('home')}}">Home</a>
                                        <ul>
                                            <li>
                                                <a href="{{ route('about.front') }}">About Us</a>
                                                <ul>
                                                    <li><a href="{{ route('about.front') }}"> Company</a></li>
                                                    <li><a href="{{ route('management.front') }}"> Management &
                                                            Leadership</a></li>
                                                    <li><a href="{{ route('footprint.front') }}"> Our Global
                                                            Footprint</a></li>
                                                    <li><a href="{{ route('publications.front') }}">Publication</a></li>
                                                    <li><a href="{{route('media.front')}}">Media</a></li>
                                                </ul>
                                            </li>

                                            <li>
                                                <a href="{{ route('laboratory.front') }}">Laboratory</a>
                                                <ul>
                                                    <li><a href="{{ route('laboratory.front') }}">About Lab</a></li>
                                                    <li><a href="{{ route('accreditation.front') }}">Quality</a></li>
                                                    <li><a href="{{ route('technologies.front') }}">Technologies</a>
                                                    </li>
                                                    <li><a href="{{ route('instruments.front') }}">Instruments</a></li>
                                                </ul>
                                            </li>

                                            <li>
                                                <a href="{{ route('about.front') }}">Services</a>
                                                <ul>
                                                    {{--<li><a href="{{ route('test.all.front') }}">Book A Test Now</a></li>--}}
                                                    <li><a href="{{ route('testmenu') }}">Test Menu</a></li>
                                                    <li><a href="{{ route('disorders.front') }}">Disorders</a></li>
                                                    <li><a href="{{ route('reportTrack.front') }}">Report Track</a></li>
                                                    <li><a href="{{ route('ServiceProvider.front') }}">Nearest Service
                                                            Provider</a>

                                                    <li><a href="{{ route('bothlocation.front') }}">Booth Location</a>
                                                    </li>
                                                </ul>
                                            </li>

                                            <li>
                                                <a href="{{ route('about.front') }}">Health Screening</a>
                                                <ul>
                                                    <li><a href="{{ route('health.all.front') }}">Health Screening
                                                            Package</a></li>
                                                    <li><a href="{{ route('others.all.front') }}">Others Package</a>
                                                    </li>
                                                </ul>
                                            </li>

                                            <li>
                                                <a href="{{ route('opportunitie.front') }}">Opportunity</a>
                                                <ul>
                                                    <li><a href="{{ route('career') }}">Career</a></li>
                                                    <li><a href="{{ route('opportunitie.front') }}">Be Our Partner</a>
                                                    </li>

                                                </ul>
                                            </li>

                                            <li><a href="{{ route('contact.front') }}">Contact Us</a>
                                            </li>

                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            {{--<div class="tree">--}}
                            {{--<ul>--}}
                            {{--<li>--}}
                            {{--<a href="{{ route('test.all.front') }}">Services</a>--}}
                            {{--<ul>--}}
                            {{--<li><a href="{{ route('testmenu') }}">Test Menu</a></li>--}}
                            {{--<li><a href="{{ route('health.all.front') }}">Health Screening</a></li>--}}
                            {{--<li><a href="{{ route('disorders.front') }}">Disorders</a></li>--}}
                            {{--<li><a href="{{ route('reportTrack.front') }}">Report Track</a></li>--}}
                            {{--<li><a href="{{ route('ServiceProvider.front') }}">Find a outlet</a></li>--}}
                            {{--</ul>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                            {{--<a href="{{ route('opportunitie.front') }}">Opportunities</a>--}}
                            {{--<ul>--}}
                            {{--<li><a href="{{ route('career') }}">Career</a></li>--}}
                            {{--<li><a href="{{route('HealthcarePartner')}}">Channel Partner</a></li>--}}
                            {{--</ul>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                            {{--<a href="{{ route('contact.front') }}">Contact Us</a></li>--}}
                            {{--</ul>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
