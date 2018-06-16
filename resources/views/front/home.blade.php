@extends('front.layouts.master1')
@section('metas')
    <meta name="description"
          content="Dyntat is a CAP-Certified International Chain diagnostic center in Bangladesh that provides home & office blood samples collection & deliver reports within 24 hours."/>
@stop
@section('title') Home -Dyntat Bangladesh Limited | Accredited | Networked | Barcoded @stop
@section('content')


    <section class="network-warp">
        <div class="container">
            <div class="row">
                <div class="section-title">
                    <h2>A Growing Global Network</h2>
                    <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
                </div>
                <div class="map">
                    <img src="{{ asset('public/assets/images/map.png') }}" alt="A Growing Global Network"/>
                </div>
            </div>
        </div>
    </section>
    <section class="services-main-warp">
        <div class="container">
            <div class="row">
                <div class="block_slogan_1">
                    <p class="text_1"
                       style="font-family: 'Quintessential', cursive;font-size: 26px;color: #292929;font-weight: 600;">
                        Best time to go for a preventive health care check up is just when you don't need one.
                    </p>
                </div>
                <div class="line_2" style="margin: 0px 0px 15px;"></div>
                <div class="block_services_type_1">
                    <div class="service">
                        <div class="icon">
                            <img src="{{ asset('public/assets/images/icon_services_1_1.png') }}" alt="TESTS"></div>
                        <div class="title">
                            <h5>Tests</h5>
                        <p><a href="{{ route('test.all.front') }}" style="font-weight:normal; font-size:12px">View Our Tests Menu</a></p>
                        </div>
                        <div class="clearboth">
                        </div>
                        <div class="text">
                            <p style="min-height:100px;padding-bottom:0px;">Single laboratory for a 160 million
                                population that processes over 5,000 samples and above 20,000 investigations every
                                day.</p>
                            <a href="{{ route('test.all.front') }}" class="general_button fr">Read More</a>
                        </div>
                    </div>
                    <div class="service">
                        <div class="icon">
                            <img src="{{ asset('public/assets/images/icon_services_1_2.png') }}" alt="Technologies">
                        </div>
                        <div class="title">
                            <h5>Technologies</h5>

                        <p><a href="{{ route('technologies.front') }}" style="font-weight:normal; font-size:12px">View Technologies</a></p>
                        </div>
                        <div class="clearboth">
                        </div>
                        <div class="text">

                            <p style="min-height:100px;padding-bottom:0px;">Dyntat has made right use of the latest
                                available advanced superior technology, capable of working on its unbelievable volumes
                                and yet deliver quality and precision to its customers.</p>
                            <a href="{{ route('technologies.front') }}" class="general_button fr">Read More</a>
                        </div>
                    </div>
                    <div class="service">
                        <div class="icon">
                            <img src="{{ asset('public/assets/images/icon_services_1_3.png') }}" alt="Automation"></div>
                        <div class="title">
                            <h5>Automation</h5>
                        <p><a href="{{ route('instruments.front') }}" style="font-weight:normal; font-size:12px">View Our Instruments</a></p>
                        </div>
                        <div class="clearboth">
                        </div>
                        <div class="text">
                            <p style="min-height:100px;padding-bottom:0px;">With best brands of automated analyzers,
                                bar-coded system, bi-directional interfacing, and total laboratory automation -
                                Dyntat Bangladesh Limited succeeded in delivering quality reports.</p>
                            <a href="{{ route('instruments.front') }}" class="general_button fr">Read More</a>
                        </div>
                    </div>
                    <div class="clearboth">
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    {{--<section class="service-warp">--}}
    {{--<div class="container">--}}
    {{--<div class="row">--}}
    {{--<div class="line_2" style="margin: 0px 0px 15px;"></div>--}}
    {{--<div class="section-title">--}}
    {{--<h2>Diagnostic Services/ Online Test</h2>--}}
    {{--</div>--}}
    {{--<div class="services">--}}
    {{--<div class="owl-carousel owl-theme">--}}
    {{--@foreach($testAll as $test)--}}
    {{--<div class="item">--}}
    {{--<div class="single-service">--}}
    {{--<div class="fature-image">--}}
    {{--@if( $testImg = json_decode($test->picture))--}}
    {{--<img src="{{ adminUrl($testImg->thumb) }}" alt="{{ $test->title }}"/>--}}
    {{--@endif--}}
    {{--<div class="hover">--}}
    {{--<a href="{{ route('test.single.front', array($test->link)) }}"--}}
    {{--class="test-ream-more">Read More</a>--}}
    {{--</div>--}}
    {{--<div class="service-price hidden">--}}
    {{--@if($test->sale_price)--}}
    {{--<span class="old">&#x9f3; {{ tk($test->price) }}</span>--}}
    {{--<span class="new">&#x9f3; {{ tk($test->sale_price) }}</span>--}}
    {{--@else--}}
    {{--<span class="new">&#x9f3; {{ tk($test->price) }}</span>--}}
    {{--@endif--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<h5><a href="{{ route('test.single.front', array($test->link)) }}"--}}
    {{--class="test-ream-more">{{ $test->short_name }}</a></h5>--}}
    {{--<p>{{ $test->title }}</p>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--@endforeach--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-md-12 text-center">--}}
    {{--<a href="{{ route('test.all.front') }}" class="btn explore-test-btn">Explore All Tests</a>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</section>--}}


    <section class="services-main-warp">
        <div class="container">
            <div class="row">
                <div class="clearboth"></div>
            </div>
            <div class="col-md-6 block_main_testimonials">
                <h4 class="blink">Quick Links</h4>
                <div class="links-carusol">
                    <div class="link-single">
                        <a href="{{ route('health.all.front') }}">
                            <img src="{{ asset('public/assets/images/home_HS.png') }}" alt="Health Screen"/>
                            <div class="bx-caption"><span>Health Screen</span></div>
                        </a>
                    </div>
                    <div class="link-single">
                        <a href="{{ route('accreditation.front') }}">
                            <img src="{{ asset('public/assets/images/Home_CAP.jpg') }}" alt="Quality"/>
                            <div class="bx-caption"><span>Quality</span></div>
                        </a>
                    </div>
                    <div class="link-single">
                        <a href="{{ route('laboratory.front') }}">
                            <img src="{{ asset('public/assets/images/Home_LT1.jpg') }}" alt="Lab Tour"/>
                            <div class="bx-caption"><span>Lab Tour</span></div>
                        </a>
                    </div>
                    <div class="link-single">
                        <a href="{{ route('ServiceProvider.front') }}">
                            <img src="{{ asset('public/assets/images/Home_Outlet.jpg') }}" alt="Nearest Centre"/>
                            <div class="bx-caption"><span>Nearest Centre</span></div>
                        </a>
                    </div>
                    <div class="link-single">
                        <a href="{{ route('reportTrack.front') }}">
                            <img src="{{ asset('public/assets/images/Home_ReportTrack.jpg') }}" alt="Report Track"/>
                            <div class="bx-caption"><span>Report Track</span></div>
                        </a>
                    </div>
                    <div class="link-single">
                        <a href="{{ route('career') }}">
                            <img src="{{ asset('public/assets/images/Home_Opportunities.jpg') }}" alt="Career"/>
                            <div class="bx-caption"><span>Career</span></div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 block_main_testimonials">
                <h4>Quality Policy</h4>
                <div class="block_testimonials_2">
                    <div class="">
                        <div class="text">
                            <p id="quality-home">"Quality is never an accident, it is always the
                                result of dedication, focus, sincere effort, intelligent direction and skillful
                                execution. It represents the wise choice of many alternatives."</p>
                        </div>
                    </div>
                    <div class="clearboth">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="block_latest_projects_1">
                    <h4 class="blink">Be Our Partner</h4>
                    <div class="project">
                        <div class="image">
                            <img src="{{ asset('public/assets/images/Home_Customer.jpg') }}" alt="Customer">
                            <div class="info">
                                <a href="{{route('Customer')}}" class="icon_link"><i class="fa fa-link"
                                                                                     aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <div class="description">
                            <h6>
                                <a href="f{{route('Customer')}}" target="_blank">Customer</a></h6>
                        </div>
                    </div>
                    <div class="project">
                        <div class="image">
                            <img src="{{ asset('public/assets/images/Home_Dr.jpg') }}" alt="Healthcare">
                            <div class="info">
                                <a href="{{route('Healthcare', array('reg'=>'Doctor'))}}" class="icon_link"><i
                                            class="fa fa-link" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <div class="description">
                            <h6>
                                <a href="{{route('Healthcare', array('reg'=>'Doctor'))}}">Doctor</a></h6>
                        </div>
                    </div>
                    <div class="project">
                        <div class="image">
                            <img src="{{ asset('public/assets/images/Home_corporate.jpg') }}" alt="Corporate">
                            <div class="info">
                                <a href="{{route('Corporate')}}" class="icon_link"><i class="fa fa-link"
                                                                                      aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <div class="description">
                            <h6>
                                <a href="{{route('Corporate')}}">Corporate</a></h6>
                        </div>
                    </div>
                    <div class="project">
                        <div class="image">
                            <img src="{{ asset('public/assets/images/Home_Franchisee.jpg') }}" alt="Healthcare Partner">
                            <div class="info">
                                <a href="{{route('HealthcarePartner')}}" class="icon_link"><i class="fa fa-link"
                                                                                              aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <div class="description">
                            <h6>
                                <a href="{{route('HealthcarePartner')}}">Healthcare Partner</a></h6>
                        </div>
                    </div>
                    <div class="clearboth">
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <section class="partner-warp">
        <div class="container">
            <div class="row">
                <div class="section-title">
                    <h2>Be Our Partner</h2>
                </div>
                <div class="partner-carusol partner-carusol-avatar">
                    @foreach($PartnerAll as $Partner)
                        <div class="partner-single">
                            <div class="partner-avatar">
                                <img src="{{ adminUrl($Partner->thumb ) }}" alt="{{ $Partner->name }}">
                            </div>
                            <h5 class="name">{{ $Partner->name }}</h5>
                        </div>
                    @endforeach
                </div>
                <div class="partner-carusol partner-carusol-content">
                    @foreach($PartnerAll as $Partner)
                        <div class="partner-single">
                            <div class="partner-massage">{{ $Partner->message  }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="clintsays-warp">
        <div class="container">
            <div class="row">
                <div class="clintsays-carusol">
                    @foreach($ClientSaysAll as $ClientSay)
                        <div class="clintsays-single">
                            <div class="clint-avatar">
                                <div class="client-thumb">
                                    <img src="{{ adminUrl($ClientSay->thumb) }}" alt="{{ $ClientSay->name }}">
                                </div>
                                <strong class="name">{{ $ClientSay->name }}</strong>
                                <span class="position">{{ $ClientSay->subTitle }}</span>
                            </div>
                            <div class="clint-massage">{{ $ClientSay->message }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
