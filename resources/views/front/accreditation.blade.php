@extends('front.layouts.master')
@section('metas')
    <meta name="description" content="Dyntat is among the few Bangladeshi laboratories which accredited by CAP (College of American Pathologists) and Certified by ISO 9001.">
@stop
@section('title') Accreditation -Dyntat Bangladesh Limited | Accredited | Networked | Barcoded @stop
@section('pagetitle') Accreditation @stop
@section('pagetitle2')
    <a href="{{route('laboratory.front')}}">Laboratory</a><span class="glyphicon glyphicon-menu-right"></span>Accreditation
@stop
@section('content')
<section class="service-postsec">
    <div class="container">
        <div class="row"> 
            <div class="col-md-9">
                <div class="main-content"> 
                    <div class="accreditation">
                        <div class="dropcaps_2">T</div>
                        <p>hyrocare is among the few Indian laboratories that meet the international standards of quality and is accredited by reputed global agencies like the College of American Pathologists (CAP) and the International Organization of Standardization (ISO) as well as NABL.</p>
                        <p>Our stringent quality control parameters coupled with intelligent IT enabled systems ensure the consistent reproducibility of results and reports. Our internal Quality Parameters include not only the systems ad instruments but also well trained and responsible staff to execute the entire processing in highly calibrated, sophisticated analyzers.</p>
                        <p>Dyntat has been certified by both national and international accrediting bodies for its quality services.<br><br>These include,</p>

                        <div class="block_accordeon_type_2 panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="button_outer first panel-heading" role="tab" id="headingOne"><div class="button_inner">
                                        <a role="button" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" data-parent="#accordion">ISO 9001:2008</a>
                                    </div></div><!-- accordeon trigger -->

                                <div class="accordeon_content panel-collapse collapse in" id="collapseOne" role="tabpanel" aria-labelledby="headingOne">
                                    <p>The central processing laboratory of Dyntat is certified by ISO 9001:2008 certifications for quality processes and organizational performance in  the year <b>2001</b>. Issued by The International Organization for Standardization (ISO), the certification has a significant bearing on market credibility.</p>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="button_outer panel-heading" role="tab" id="headingTow"><div class="button_inner">
                                        <a role="button" data-toggle="collapse" href="#collapseTow" aria-expanded="true" aria-controls="collapseTow" data-parent="#accordion">NABL</a>
                                    </div></div><!-- accordeon trigger -->
                                <div class="accordeon_content  panel-collapse collapse" id="collapseTow" role="tabpanel" aria-labelledby="headingTow">
                                    <p>Accredited by the National Accreditation Board for Testing and Calibration Laboratories (NABL) - an autonomous body under the aegis of Department of Science &amp; Technology, Government of India in the year <b>2005</b>.</p>
                                    <p style="display:none">As a laboratory, the certification confirms that we adhere to the standard protocol of quality control and process as described in various clauses of ISO 15189 standards. This certification also takes into consideration the processes and quality parameters at our collection centers and checks if the said quality parameter is met to maintain quality in pre-analytical stages.</p>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="button_outer panel-heading" role="tab" id="headingThree"><div class="button_inner">
                                        <a role="button" data-toggle="collapse" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree" data-parent="#accordion">CAP</a>
                                    </div></div><!-- accordeon trigger -->
                                <div class="accordeon_content  panel-collapse collapse" id="collapseThree" role="tabpanel" aria-labelledby="headingThree">
                                    <p>Dyntat is also accredited by College of American Pathologists (CAP) in the year <b>2007</b>, an internationally recognized
                                        accrediting organisation which sets stringent and meticulous standards for quality in laboratories and has accredited so for only 
                                        25 in India.</p>
                                </div>
                            </div>
                            <div class="clearboth"></div> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3" id="res">
                <aside class="right-sidebar">
                    <div class="single-widget services-list sub-menu">
                        <h4>LABORATORY</h4>
                        <ul>
                            <li><a href="{{ route('laboratory.front') }}">About Lab</a></li>
                            <li><a href="{{ route('accreditation.front') }}">Quality</a></li>
                            <li><a href="{{ route('technologies.front') }}">Technologies</a></li>
                            <li><a href="{{ route('instruments.front') }}">Instruments</a></li>
                        </ul>
                    </div>
                    <div class="single-widget">  
                        <img src="{{ asset('public/assets/images/accreditation.png')}}">  
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section> 

@endsection
