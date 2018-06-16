@extends('front.layouts.master')
@section('metas')
    <meta name="description" itemprop="description"
          content="Find latest openings in Dyntat Technologies Search and Apply now!">
@stop
@section('title') Career -Dyntat Bangladesh Limited | Accredited | Networked | Barcoded @stop
@section('pagetitle') Career @stop
@section('pagetitle2')
    <a href="{{route('opportunitie.front')}}">Opportunity</a><span class="glyphicon glyphicon-menu-right"></span>Career
@stop
@section('content')
    <div class="row">

        <section class="section_slider_2">
            <div class="slider_line_1"></div>
            <div class="inner">
                <div id="slider" class="nivoSlider">
                    <img src="{{ asset('public/assets/slider_career/images/pic_slider_4_1.jpg')}}" alt="" title="#caption_2"/>
                    <img src="{{ asset('public/assets/slider_career/images/pic_slider_4_2.jpg')}}" alt="" title="#caption_1"/>
                    <img src="{{ asset('public/assets/slider_career/images/pic_slider_4_3.jpg')}}" alt="" title="#caption_3"/>
                </div>
            </div>
            <div class="slider_line_2"></div>
            <div id="caption_1" class="nivo-html-caption">
                <h6>Career @ Dyntat</h6>
                <p>I stepped in with a qualification and ambition but I am now filled with passion
                    and determination to create a
                    difference</p>
            </div>
            <div id="caption_2" class="nivo-html-caption">
                <h6>If you are the one who thinks</h6>
                <p>creativity does wonders, innovation is the way of life, learning is continuous
                    process, challenges are to be
                    faced head on and service to the community</p>
            </div>
            <div id="caption_3" class="nivo-html-caption">
                <p>In a healthcare, you are pushed with a drive to serve and not to work</p>
            </div>

        </section>
    </div>
    <section class="service-postsec">
        <div class="container">

            <div class="row">
                <div class="col-md-9">
                    <div class="main-content">
                        <h3>Welcome to Dyntat</h3>
                        <p>We thank you for evincing your interest to explore career opportunities with us.</p>
                        <p>While innovating services that are absolutely world - class and truly affordable to common
                            man's pocket, we seek passionate footsteps to lead the vision of the organization.</p>
                        <p>Talented and energetic people are invited to be a part of our team, who can dream big, think
                            smart and work faster.</p>
                        <p>We at Dyntat, are at a constant endeavor to provide a robust professional ecosystem for
                            each one to successfully accomplish one's ambition.</p>
                        <p>If each one of us is determined to make a difference to the health of human beings, then this
                            organization would excel into be a force to be reckoned.</p>
                        <div class="clearboth"></div>
                        <div class="job-post-wrapper">
                            @if(sizeof($Careers)>0)
                                @foreach($Careers as $Career)
                                    <div class="single-job">
                                        <h5 class="jobtitle">Job Title : {{$Career->title}}</h5>
                                        <span class="email">Send CV : {{$Career->email}}</span>
                                        <span class="enddate">Deadline : {{$Career->endDate}}</span>
                                        <a href="{{route('single.job', array($Career->id))}}" class="read-more">Job
                                            Details</a>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <h3>Drop your CV to</h3>
                    <a href="mailto:career@dyntatbd.com" target="_blank">career@dyntatbd.com</a>
                </div>
                {{--<div class="col-md-3" id="res">--}}
                {{--<aside class="right-sidebar">--}}
                {{--<div class="single-widget services-list sub-menu">--}}
                {{--<h4>Opportunity</h4>--}}
                {{--<ul>--}}
                {{--<li><a href="{{ route('career') }}">Career</a></li>--}}
                {{--<li><a href="{{ route('opportunitie.front') }}">Be Our Partner</a></li>--}}
                {{--</ul>--}}
                {{--</div>--}}
                {{--<div class="single-widget">--}}
                {{--<img src="{{ asset('public/assets/images/Side_Banner_CORP.jpg')}}" alt="dyntatbd-Career">--}}
                {{--</div>--}}
                {{--</aside>--}}
                {{--</div>--}}
            </div>
        </div>
    </section>

@endsection
@section('scripts')
    <script type="text/javascript" src="{{ asset('public/assets/slider_career/jquery.prettyPhoto.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/slider_career/jquery.tools.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/slider_career/html5.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/slider_career/jquery.nivo.slider.pack.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/slider_career/jquery.scroll.to.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/slider_career/jquery.flexslider-min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/slider_career/jquery.form.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/slider_career/jquery.sort.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/slider_career/main.js') }}"></script>
    <script type="text/javascript">
        $(function () {
            $('#slider').nivoSlider({
                afterLoad: function () {
                    var width = 100 / $('.section_slider_2 .nivo-controlNav a').length;
                    $('.section_slider_2 .nivo-controlNav a').css('width', width + '%');
                    $('.section_slider_2 .nivo-directionNav a').attr('href', 'javascript:void(0)');
                }
            });
        });
    </script>
@endsection