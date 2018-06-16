@extends('front.layouts.master')
@section('metas')
    <meta name="description" content="A page's description, usually one or two sentences."/>
@stop
@section('title') Be Our Partner -Dyntat Bangladesh Limited | Accredited | Networked | Barcoded @stop
@section('pagetitle') Be Our Partner @stop
@section('pagetitle2')
    <a href="{{route('opportunitie.front')}}">Opportunity</a><span
            class="glyphicon glyphicon-menu-right"></span>Be Our Partner
@stop
@section('content')
    <section class="service-postsec">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="main-content">
                        <div class="opportunities">
                            <div class="opportun-servic-2">
                                <div class="thumb"><img src="{{ asset('public/assets/images/Home_Customer-2.jpg')}}"
                                                        alt="Customer"></div>
                                <div class="des">
                                    <h6>Customer</h6>
                                    <a href="{{route('Customer')}}" class="tags">Register For Service</a>
                                    <p class="ppp">To know nearest collection centre details and to communicate.</p>
                                </div>
                                <div class="line_2"></div>
                            </div>

                            <div class="opportun-servic-2">
                                <div class="thumb"><img src="{{ asset('public/assets/images/Home_dr-2.jpg')}}"
                                                        alt="Doctors"></div>
                                <div class="des">
                                    <h6>Doctors</h6>
                                    <a href="{{route('Healthcare', array( 'reg'=>'Doctor'))}}" class="tags">Register to
                                        Avail Offers</a>
                                    <p class="ppp">Register with us to book for tests for your patients, view booking
                                        status, to know nearest collection centre details and to communicate.</p>
                                </div>
                                <div class="line_2"></div>
                            </div>
                            <div class="opportun-servic-2">
                                <div class="thumb"><img
                                            src="{{ asset('public/assets/images/Home_Opportunities-2.jpg')}}"
                                            alt="Career"></div>
                                <div class="des"><h6>Career</h6>
                                    <a href="{{route('career')}}" class="tags">Apply For Job</a>
                                    <p class="ppp">Talented and energetic people are invited to be a part of our team,
                                        who can dream big, think smart and work faster.</p>
                                </div>
                                <div class="line_2"></div>
                            </div>
                            <div class="opportun-servic-2">
                                <div class="thumb"><img src="{{ asset('public/assets/images/Home_Franchisee-2.jpg')}}"
                                                        alt="Healthcare Partner"></div>
                                <div class="des"><h6>Healthcare Partner</h6>
                                    <a href="{{route('HealthcarePartner')}}" class="tags">Register For Healthcare
                                        Partner</a>
                                    <p class="ppp">You can use our volumes and our rates to make your own brand of
                                        collection centers and network, till you get your own volumes.</p>
                                </div>
                                <div class="line_2"></div>
                            </div>
                            <div class="opportun-servic-2">
                                <div class="thumb"><img src="{{ asset('public/assets/images/Home_Corporate-2.jpg')}}"
                                                        alt="Corporate"></div>
                                <h6>Corporate</h6>
                                    <a href="{{route('Corporate')}}" class="tags">Enquire for Offers</a>
                                    <p class="ppp"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3" id="res">
                    <aside class="right-sidebar-2">
                        <div class="single-widget">
                            <div class="block_accordeon_type_4 panel-group sidebar-accordeon" id="accordion"
                                 role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default">
                                    <div class="button_outer first panel-heading" role="tab" id="headingOne">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion"
                                           href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <div class="button_inner">
                                                Why to register?
                                            </div>
                                        </a>
                                    </div><!-- accordeon trigger -->
                                    <div class="accordeon_content panel-collapse collapse in" id="collapseOne"
                                         role="tabpanel" aria-labelledby="headingOne">
                                        <!-- accordeon content goes here -->
                                        <p>Registration is quick and gives you a secure login space to perform the
                                            activities as per your registered category.</p>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="button_outer">
                                        <a class="collapsed" role="button" data-toggle="collapse"
                                           data-parent="#accordion" href="#collapseTwo" aria-expanded="false"
                                           aria-controls="collapseTwo">
                                            <div class="button_inner">Privacy</div>
                                        </a>
                                    </div><!-- accordeon trigger -->
                                    <div class="accordeon_content panel-collapse collapse" id="collapseTwo"
                                         role="tabpanel" aria-labelledby="headingTwo">
                                        <!-- accordeon content goes here -->
                                        <p>Your details will not be used for spamming or will not be shared with
                                            outsiders.</p>
                                    </div>
                                </div>
                                <div class="block_testimonials" style="margin-top: 20px">
                                    <div class="content_2">
                                        <div class="text" style="border: 1px solid lightgray;padding: 10px;text-align: justify;">
                                            <p>" Dyntat - Accredited laboratoty, widest network and longest automated
                                                sample movement track. One lab for a billion population. "</p>
                                        </div>
                                    </div>
                                    <div class="clearboth"></div>
                                </div>
                            </div>
                        </div>
                    </aside>

                </div>
            </div>
        </div>
    </section>

@endsection
