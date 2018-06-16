@extends('front.layouts.master')
@section('metas')
    <meta name="description" content="A page's description, usually one or two sentences."/>
@stop
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
    </style>
@stop
@section('title') Booking Test -Dyntat Bangladesh Limited | Accredited | Networked | Barcoded @stop
@section('pagetitle') Offers @stop
@section('pagetitle2') Offers @stop
@section('content')
    <section class="service-postsec">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="main-content">
                        @if($Offers)
                            <div class="services offers">
                                @foreach($Offers as $Offer)
                                    <div class="offers-row">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="offers-img">
                                                    <a href="{{route('offer.front', array($Offer->link) )}}">
                                                        <img src="{{ adminUrl($Offer->thumb) }}"
                                                             alt="{{ $Offer->title }}"/>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="row">
                                                    <h3>
                                                        <a href="{{route('offer.front', array($Offer->link) )}}"
                                                           class="title">{{$Offer->title}}</a>
                                                    </h3>
                                                </div>
                                                <div class="row">{!! substr($Offer->content, 0, 250) !!}</div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <div>
                                {{$Offers->links()}}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-3" id="res">
                    <aside class="right-sidebar">
                        <div class="single-widget services-list sub-menu">
                            <h4>OFFER</h4>
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
    </section>
@endsection
