@extends('front.layouts.master')
@section('metas')
    <meta name="description" content="A page's description, usually one or two sentences."/>
@stop
@section('title') Media -Dyntat Bangladesh Limited | Accredited | Networked | Barcoded @stop
@section('pagetitle') Media @stop
@section('pagetitle2')
    <a href="{{route('about.front')}}">About Us</a><span class="glyphicon glyphicon-menu-right"></span>Media
@stop
@section('content')
    <section class="service-postsec">
        <div class="container">
            <div class="main-content">
                <div class="media-post">
                    <div class="row">
                        @if($Medias)
                            @foreach($Medias as $Media)
                                <div class="col-md-4">
                                    <div class="single-media-post2">
                                        <iframe width="auto" height="auto" src="{{$Media->url}}" frameborder="0"
                                                allowfullscreen></iframe>
                                        <div class="media-title">
                                            {{$Media->title}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div>
                        {{$Medias->links()}}
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
        {{--<div class="single-widget">--}}
        {{--<h4>Our Network</h4>--}}
        {{--<p>Networks of authorized, trained and equipped collection centers serve through a very--}}
        {{--strong IT and Logistics.</p>--}}
        {{--<img src="{{ asset('public/assets/images/bd-Network.png')}}" alt="dyntatbd-Network">--}}
        {{--</div>--}}
        {{--</aside>--}}
        {{--</div>--}}
    </section>

@endsection
