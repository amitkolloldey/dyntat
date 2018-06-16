@extends('front.layouts.master')
@section('metas')
    <meta name="description" content="Dyntat Management Team">
@stop
@section('title') About Us -Dyntat Bangladesh Limited | Accredited | Networked | Barcoded @stop
@section('pagetitle') About Us @stop
@section('pagetitle2')
    <a href="{{route('about.front')}}">About Us</a><span class="glyphicon glyphicon-menu-right"></span> Company
@stop
@section('content')
    <section class="service-postsec">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="main-content">
                        <h4>Welcome to Dyntat</h4>
                        <blockquote class="report-msg">
                            Thank You for availing our services. You can now track your reports here by providing your
                            barcode and lab code details. We look forward to serving you again.
                        </blockquote>
                        <div>
                            <style>.flexslider .slides > li {
                                    display: block;
                                }</style>
                            <section class="section_slider_6">
                                <div class="inner"
                                     style="max-width:300px; margin-right:20px; margin-top:5px; float:left; padding:3px; display:block; border:1px solid #ededed;">
                                    <div id="slider" class="slider flexslider" style="disply:block;">
                                        <ul class="slides">
                                            <li>
                                                <img src="{{asset("public/assets/slider_box/images/Dyntat_Building.jpg")}}"
                                                     alt="Dyntat_Building"/>
                                            </li>
                                            <li>
                                                <img src="{{asset("public/assets/slider_box/images/About_2.jpg")}}"
                                                     alt=""
                                                     height="206"/>
                                            </li>
                                            <li>
                                                <img src="{{asset("public/assets/slider_box/images/Map.jpg")}}" alt=""/>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div class="test">
                            Dyntat Bangladesh limited is the first automated laboratory operating out of a single
                            centralized setup. Our services can be availed through our network of 500+ B2B clients all
                            over the country. Through our network which includes laboratories, hospitals, doctors and
                            organizations, we are serving millions of people in Bangladesh.

                            Dyntat Bangladesh Limited focuses on providing quality services at affordable costs to
                            doctors, clinics, laboratories and hospitals in Bangladesh. Dyntat Bangladesh Limited
                            operates with unique centralized laboratory model which focuses on strong technologies,
                            strong brands and strong systems that enable all laboratories to give their clients the best
                            of science and technology at affordable costs.

                            Our clear focus on speed and accuracy made us the first referral diagnostics laboratory in
                            Bangladesh to have an IT enabled, 24x7, fully automated set up (covering over 20,000 sq. ft.
                            floor space) that ensures error free processing of over 5,000 samples daily. Our unmatched
                            speed factor is achieved through a combination of air and surface express cargo logistics
                            and IT enabled, barcoded, bi-directional systems that ensure a turnaround time of 4 to 8
                            hours for processing of samples that arrives at any time of the day or night.

                            A meticulously created and monitored system, well chosen and trained manpower, wise
                            selection of the best global technologies for specialized testing and an uncompromised
                            approach to instrumentation have ensured that Dyntat is looked upon as a yardstick for
                            quality by stakeholders in the diagnostic industry. The uniqueness of Dyntat Bangladesh
                            limited is its effort to innovate and remain at par with the global standards for best of
                            the quality service delivery, at a highly cost effective price.
                        </div>
                    </div>
                    <div class="differe">
                        <h2 class="heading_w_icon"> Our Differentiators</h2>
                        <ul class="list_1">
                            <li>Unique referral laboratory - Dyntat Bangladesh Ltd. is the 1st referral diagnostic
                                laboratory in Bangladesh.
                            </li>
                            <li>Unique quality - World's best technology delivering world class quality.</li>
                            <li>Unique cost - Volume-driven benefits at unmatched cost.</li>
                            <li>Unique concept - Single laboratory with over 20,000 sq. ft. floor space which performs
                                the investigations for millions of citizens of Bangladesh.
                            </li>
                            <li>Unique systems - Unique logistics support which ensure the samples to reach our
                                laboratory before mid-night.
                            </li>
                            <li>Unique operations -Our laboratory works 24 x 7 to cater the needs of our customers.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3" id="res">
                    <aside class="right-sidebar">
                        <div class="single-widget services-list sub-menu">
                            <h4>About Us</h4>
                            <ul>
                                <li><a href="{{ route('about.front') }}"> Company</a></li>
                                <li><a href="{{ route('management.front') }}"> Management & Leadership</a></li>
                                <li><a href="{{ route('footprint.front') }}"> Our Global Footprint</a></li>
                                <li><a href="{{ route('publications.front') }}">Publication</a></li>
                                <li><a href="{{route('media.front')}}">Media</a></li>
                            </ul>
                        </div>
                        <div class="single-widget">
                            <h4>Our Network</h4>
                            <p>Networks of authorized, trained and equipped collection centers serve through a very
                                strong IT and Logistics.</p>
                            <img src="{{ asset('public/assets/images/bd-Network.png')}}" alt="dyntatbd-Network">
                        </div>
                    </aside>
                </div>
            </div>
            <div class="row">

                <div class="block_our_stages">
                    <h2 class="heading_w_icon"> Our Strengths</h2>
                    <div class="row">
                        <div class="col-md-4 bbb">
                            <div class="stage">
                                <p>Quality</p>
                            </div>
                            <p>Best of the Global brands, Best of the their instruments, Best of the technologies,
                                Best of the reagents, Best of the procedures, Best of systems, Best of IT, well
                                trained and highly focused pathologist, biochemists, scientists and technologists,
                                gives "Best of the Quality". The endeavor of Dyntat has always been to provide
                                utmost quality in every stage of service - right from collection of sample to
                                processing to delivery of reports. Our systems, processes, man-power and IT ensure
                                the highest level of perfection and timely efficacy in each delivery.</p>
                        </div>
                        <div class="col-md-4 bbb">
                            <div class="stage">
                            <p>System</p>
                            </div>
                            <p>IT when used ideally to integrate men, machines and methods - it delivers secured,
                                assured, reliable, reproducible solutions even in diagnostic industry. Analyzers,
                                web servers and barcodes when integrated - it gives a system that is empowered,
                                controlled and monitored end to end.</p>
                        </div>
                        <div class="col-md-4 bbb">
                            <div class="stage">
                            <p>Reach</p>
                            </div>
                            <p>More and more brands are using Dyntat Bangladesh Limited as their cost effective
                                backward linkage. Our presence is expanding in more and more cities in the country.
                                Dyntat Bangladesh Limited today boasts of having capacity of processing over 6
                                million investigations per year.</p>
                        </div>
                        <div class="col-md-4 bbb">
                            <div class="stage">
                            <p>Cost</p>
                            </div>
                            <p>A fully optimized, highly efficient, seamless automation has ensured men, material
                                and machines delivering highest level of quality service at affordable costs.</p>
                        </div>
                        <div class="col-md-4 bbb">
                            <div class="stage">
                            <p>Focus</p>
                            </div>
                            <p>Our clear focus is to facilitate and standardize quality and cost of laboratory
                                services across the country. By helping laboratories to outsource numerical
                                pathology (clinical chemistry), the quality of services are ensured by a username /
                                password. Since costs make economical sense for laboratories that lack volumes this
                                unique B2B focus helps the industry. Logically we focus more on preventive care than
                                sick care.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
    <script type="text/javascript">
        jQuery(function () {
            jQuery('#slider').flexslider({
                animation: 'slide',
                controlNav: false,
                directionNav: true,
                animationLoop: true,
                slideshow: true,
                slideshowSpeed: 3000,
                useCSS: false
            });
        });
    </script>
@endsection
