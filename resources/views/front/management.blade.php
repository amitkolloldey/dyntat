@extends('front.layouts.master')
@section('metas')
    <meta name="description" content="A page's description, usually one or two sentences."/>
@stop
@section('title') Management & Leadership -Dyntat Bangladesh Limited | Accredited | Networked | Barcoded @stop
@section('pagetitle') Management & Leadership @stop
@section('pagetitle2')
    <a href="{{route('about.front')}}">About Us</a><span
            class="glyphicon glyphicon-menu-right"></span>Management & Leadership
@stop
@section('content')
    <section class="service-postsec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-content">
                        <div class="mission">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="heading_w_icon">Mission</h4>
                                    <blockquote class="report-msg">
                                        Being in the healthcare industry, it is the patient who is both our primary
                                        customer and concern. Ensuring that the right value is given in right time to
                                        the right patient is the test we undergo everyday successfully.
                                    </blockquote>
                                </div>
                                <div class="col-md-6">
                                    <h4 class="heading_w_icon">Vision</h4>
                                    <blockquote class="report-msg">
                                        Being in the healthcare industry, it is the patient who is both our primary
                                        customer and concern. Ensuring that the right value is given in right time to
                                        the right patient is the test we undergo everyday successfully.
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                        <div class="line_2" style="margin: 7px 0px 15px;"></div>
                        <div class="mambership-user">
                            <h4 class="heading_w_icon">Management & Leadership</h4>
                            <div class="single-mamuser">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="user-thumb"><img
                                                    src="{{ asset('public/assets/images/1_Dr_A_Velumani.jpg')}}"
                                                    alt="Dr. A Velumani"></div>

                                    </div>
                                    <div class="col-lg-9">
                                        <div class="user-msg">
                                            <h6>Dr. A. Velumani, <span>Our Leader &amp; Creator of Dyntat</span></h6>
                                            <p>Dr. A.Velumani, the Founder of Dyntat is an outstanding entrepreneur
                                                and a true visionary. Born in a landless farmer's family in
                                                Appanickenpatti Pudur, an obscure village near Coimbatore in India,
                                                Velumani was a brilliant student and became the first graduate from his
                                                village. He went on to acquire a PhD in Thyroid Chemistry and joined as
                                                a Scientist at Bhabha Atomic Research Centre (BARC), Mumbai, where he
                                                served 14 years before venturing to do something on his own. Dr. A.
                                                Velumani decided to step out of his comfort zone and started Dyntat
                                                with his provident fund money of Rs. 1 lakh. Today, Dyntat brand is
                                                estimated to be worth more than half a billion USD. Dyntat became one
                                                the first Indian diagnostic laboratories to obtain internationally
                                                renowned quality accreditations including ISO 9001-2000 as early as
                                                2001, ISO 9001 in 2008; NABL (National Accreditation Board for Testing
                                                and Calibration Laboratories) in 2005 and CAP (College of American
                                                Pathologists) certification in 2006. After a highly successful
                                                operations serving a billion population in India, Dr. A. Velumani
                                                decided to go global with Dyntat, and with operations in Bahrain and
                                                Bangladesh in 2013. Dr A Velumani has been highly successful in
                                                converting educated as employable, graduates as professionals,
                                                individuals as entrepreneurs, and vendors as partners and most
                                                importantly transforming intimidating problems into opportunities for
                                                prosperity.</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="line_2" style="margin: 7px 0px 15px;"></div>
                            <div class="single-mamuser">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="user-thumb"><img
                                                    src="{{ asset('public/assets/images/5_Ziaul_Hasan.jpg')}}"
                                                    alt="Dr. A Velumani"></div>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="user-msg">
                                            <h6>Barrister Md. Ziaul Hasan</h6>
                                            <p>Mr. Hasan is the senior representative of Institutional Investors. Mr.
                                                Hasan serves as an advisor to numerous governments, local and
                                                international companies located in Bangladesh. He taught Banking Law and
                                                Court Procedure at the Dhaka Bank Institute and he represents his
                                                clients as the lead counsel in the High Court and Supreme Court of
                                                Bangladesh. Mr. Hasan also has expertise in taxation and structuring of
                                                various government contracts. His specialty includes securities law,
                                                banking law, security documentation, loan syndication, commercial
                                                litigation, intellectual property law, etc. Mr. Hasan is also highly
                                                experienced in Arbitration practices, and serves as a lecturer of Dhaka
                                                Bank Training Institute as well as the Vice Principal of London College
                                                of Legal Studies, a law college providing LLB (Hons) under the
                                                University of London. Mr. Hasan completed the LL.B (Hons.) from
                                                University of London in 1995, LL.B from University of Dhaka in 1988 and
                                                B.Sc. from University of Dhaka in 1985. Mr. Ziaul Hasan received
                                                professional qualification on Barrister-at Law from Gray's Inn, UK. He
                                                is also an Advocate, Supreme Court of Bangladesh since 1991, and
                                                District Judge Court, Dhaka since 1989.</p>
                                        </div>
                                    </div>
                                </div>
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
                    {{--<div class="single-widget"> --}}
                    {{--<h4>Our Network</h4>--}}
                    {{--<p>Networks of authorized, trained and equipped collection centers serve through a very strong IT and Logistics.</p>--}}
                    {{--<img src="{{ asset('public/assets/images/bd-Network.png')}}" alt="dyntatbd-Network">--}}
                    {{--</div>--}}
                    {{--</aside>--}}
                    {{--</div> --}}
                </div>
            </div>
    </section>

@endsection
