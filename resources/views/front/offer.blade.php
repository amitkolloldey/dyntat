@extends('front.layouts.master')

@section('styles')
    <style type="text/css">
        .services.offers .single-service.single-offer {
            margin-left: 0;
            margin-right: 0;
            width: 100%;
        }

        .services.offers .single-service.single-offer .fature-image .hover {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .services.offers .single-service.single-offer .hover .title {
            color: #ffffff;
            font-size: 20px;
            font-style: italic;
            position: absolute;
            text-transform: capitalize;
            top: 48%;
        }

        .services.offers .single-service.single-offer .offer-content {
            margin-top: 20px;
            width: 100%;
        }
    </style>
@stop
@section('pagetitle2')
    <a href="{{route('offers.front')}}">Offer</a><span class="glyphicon glyphicon-menu-right"></span>Offer Details
@stop
@section('content')
    <section class="service-postsec">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="main-content">
                        @if($Offer)
                            @foreach($Offer as $offer)
                            @section('title') {{$offer->title}} -Dyntat Bangladesh Limited @stop
                            @section('pagetitle') Offer Details @stop
                        @section('metas')
                            <meta name="description" content="{{$offer->meta_description}}"/>
                        @stop
                        <div class="services offers">
                            <div class="single-service single-offer">
                                <div class="fature-image">
                                    <img src="{{ adminUrl($offer->thumb) }}" alt="{{ $offer->title }}"/>
                                </div>
                                <h1>{{$offer->title}}</h1>
                                <div class="offer-content">{!! $offer->content !!}</div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-md-3" id="res">
                    <div id="accordion" class="float-panel">
                        <aside class="right-sidebar">
                            <div class="single-widget services-list sub-menu">
                                <h4>Offer</h4>
                                <ul>
                                    <li><a href="{{ route('test.all.front') }}">Test Menu</a></li>
                                    <li><a href="{{ route('disorders.front') }}">Disorders</a></li>
                                    <li><a href="{{ route('reportTrack.front') }}">Report Track</a></li>
                                    <li><a href="{{ route('bothlocation.front') }}">Booth Location</a></li>
                                    <li><a href="{{ route('ServiceProvider.front') }}">Nearest Service Provider</a></li>
                                </ul>
                            </div>
                            <div class="single-widget cart-widget">
                                <img src="{{ asset('public/assets/images/Report_Track.jpg')}}"
                                     alt="dyntatbd-ReportTrack">
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script src="{{ asset('public/assets/js/float-panel.js') }}"></script>
    <script>

    </script>
@endsection
