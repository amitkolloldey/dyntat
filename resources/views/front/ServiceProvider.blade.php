@extends('front.layouts.master')
@section('metas')
    <meta name="description" content="A page's description, usually one or two sentences."/>
@stop
@section('title') Nearest Service Provider -Dyntat Bangladesh Limited | Accredited | Networked | Barcoded @stop
@section('pagetitle') Nearest Service Provider @stop
@section('pagetitle2')
    <a href="{{route('test.all.front')}}">Services</a><span
            class="glyphicon glyphicon-menu-right"></span>Nearest Service Provider
@stop
@section('content')
    <section class="service-postsec">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="servicearea-post-wapper">
                        @if($servicesAreas)
                            <div class="block_contact_us_type_1  booth_loc">
                                @foreach($servicesAreas as $i => $servicesArea)
                                    <div class="area">
                                        <h4 class="heading_w_icon">{{$servicesArea->name}}</h4>
                                        <ul class="areaClient" <?php if($i!=0){echo "style='display: none'";}?>>
                                            @foreach($servicesArea->client as $servicesClient)
                                                <li>{{$servicesClient->name}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-3" id="res">
                    <aside class="right-sidebar">
                        <div class="single-widget services-list sub-menu">
                            
                        </div>
                        <div class="single-widget cart-widget">
                            <img src="{{ asset('public/assets/images/dhaka_map.jpg')}}" alt="dyntatbd-ReportTrack">
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(".heading_w_icon").on('click', function () {
            var paren = $(this).parents(".area");
            paren.find(".areaClient").toggle('fast');
        });
    </script>
@endsection
