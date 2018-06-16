@extends('front.layouts.master')
@section('metas')
    <meta name="description" content="A page's description, usually one or two sentences."/>
@stop
@section('title') Health Care Partner -Dyntat Bangladesh Limited | Accredited | Networked | Barcoded @stop
@section('pagetitle') Health Care Partner @stop
@section('pagetitle2')
    <a href="{{route('about.front')}}">About Us</a><span class="glyphicon glyphicon-menu-right"></span><a href="{{route('opportunitie.front')}}">Be Our Partner</a><span class="glyphicon glyphicon-menu-right"></span> Health Care Partner
@stop
@section('content')
    <section class="service-postsec">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="main-content">
                        <blockquote class="report-msg">
                            <p>Without our volumes, our rates are not possible. Without our rates, our volumes are not
                                possible. You can use our volumes and our rates to make your own brand of collection
                                centers and network, till you get your own volumes.</p>
                            <p>If you are laboratory or diagnostic centre or hospital - right now in single location or
                                multiple location, untill you get justifying volumes we would be the best solution.</p>
                            <p>We also help you, along with a good rate structure for you and your multiple collection
                                centers we offer a complete solution for your IT, branding and marketing needs.</p>
                        </blockquote>
                        <div class="HealthcarePartner">

                            <article>
                                <div class="links">
                                    <a href="" class="general_read_more">Types of Healthcare Partner</a>
                                </div>
                            </article>

                            <article>
                                <div class="f_pic">
                                    <a href="{{route('Healthcare', array( 'reg'=>'Hospital'))}}"><img
                                                src="{{ asset('public/assets/images/Home_Franchisee.jpg') }}"
                                                alt=""></a>
                                    <div class="info">
                                        <a href="{{route('Healthcare', array( 'reg'=>'Hospital'))}}" class="date">FOR
                                            Hospital</a>
                                        <div class="clearboth"></div>
                                    </div>
                                </div>

                                <div class="content_1">
                                    <h4><a href="{{route('Healthcare', array( 'reg'=>'Hospital'))}}">Hospital</a></h4>
                                    <p>If you are an entrepreneur or a laboratory which wishes to lean to one of the
                                        brand - to earn better returns in clinical chemistry business you can register
                                        here and we will pass it on to our channel partner who is aggressive in your
                                        region.</p>
                                    <p>Having a Username and Password of a trusted brand helps to earn better good will
                                        from the market.</p>
                                </div>
                                <div class="clearboth"></div>

                                <div class="links">
                                    <a href="{{route('Healthcare', array( 'reg'=>'Hospital'))}}"
                                       class="general_read_more">Click here to register as Hospital</a>
                                </div>
                            </article>
                            <article>
                                <div class="f_pic">
                                    <a href="{{route('Healthcare', array( 'reg'=>'Diagnostic'))}}"><img
                                                src="{{ asset('public/assets/images/Home_Franchisee.jpg') }}"
                                                alt=""></a>
                                    <div class="info">
                                        <a href="{{route('Healthcare', array( 'reg'=>'Diagnostic'))}}" class="date">FOR
                                            Diagnostic Laboratory</a>
                                        <div class="clearboth"></div>
                                    </div>
                                </div>

                                <div class="content_1">
                                    <h4><a href="{{route('Healthcare', array( 'reg'=>'Diagnostic'))}}">Diagnostic
                                            Laboratory</a></h4>
                                    <p>If you are an entrepreneur or a laboratory which wishes to lean to one of the
                                        brand - to earn better returns in clinical chemistry business you can register
                                        here and we will pass it on to our channel partner who is aggressive in your
                                        region.</p>
                                    <p>Having a Username and Password of a trusted brand helps to earn better good will
                                        from the market.</p>
                                </div>
                                <div class="clearboth"></div>

                                <div class="links">
                                    <a href="{{route('Healthcare', array( 'reg'=>'Diagnostic'))}}"
                                       class="general_read_more">Click here to register as Diagnostic Laboratory</a>
                                </div>
                            </article>
                            <article>
                                <div class="f_pic">
                                    <a href="{{route('Healthcare', array( 'reg'=>'Clinic'))}}"><img
                                                src="{{ asset('public/assets/images/Home_Franchisee.jpg') }}"
                                                alt=""></a>
                                    <div class="info">
                                        <a href="{{route('Healthcare', array( 'reg'=>'Clinic'))}}" class="date">FOR
                                            Clinic</a>
                                        <div class="clearboth"></div>
                                    </div>
                                </div>

                                <div class="content_1">
                                    <h4><a href="{{route('Healthcare', array( 'reg'=>'Clinic'))}}">Clinic</a></h4>
                                    <p>If you are an entrepreneur or a laboratory which wishes to lean to one of the
                                        brand - to earn better returns in clinical chemistry business you can register
                                        here and we will pass it on to our channel partner who is aggressive in your
                                        region.</p>
                                    <p>Having a Username and Password of a trusted brand helps to earn better good will
                                        from the market.</p>
                                </div>
                                <div class="clearboth"></div>

                                <div class="links">
                                    <a href="{{route('Healthcare', array( 'reg'=>'Clinic'))}}"
                                       class="general_read_more">Click here to register as Clinic</a>
                                </div>
                            </article>
                            <article>
                                <div class="f_pic">
                                    <a href="{{route('Healthcare', array( 'reg'=>'Medical'))}}"><img
                                                src="{{ asset('public/assets/images/Home_Franchisee.jpg') }}"
                                                alt=""></a>
                                    <div class="info">
                                        <a href="{{route('Healthcare', array( 'reg'=>'Medical'))}}" class="date">FOR
                                            Medical Health Check-up Centre</a>
                                        <div class="clearboth"></div>
                                    </div>
                                </div>
                                <div class="content_1">
                                    <h4><a href="{{route('Healthcare', array( 'reg'=>'Medical'))}}">Medical Health
                                            Check-up Centre</a></h4>
                                    <p>If you are an entrepreneur or a laboratory which wishes to lean to one of the
                                        brand - to earn better returns in clinical chemistry business you can register
                                        here and we will pass it on to our channel partner who is aggressive in your
                                        region.</p>
                                    <p>Having a Username and Password of a trusted brand helps to earn better good will
                                        from the market.</p>
                                </div>
                                <div class="clearboth"></div>
                                <div class="links">
                                    <a href="{{route('Healthcare', array( 'reg'=>'Medical'))}}"
                                       class="general_read_more">Click here to register as Medical Health Check-up
                                        Centre</a>
                                </div>
                            </article>
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
