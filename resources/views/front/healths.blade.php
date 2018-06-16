@extends('front.layouts.master')
@section('metas')
    <meta name="description" content="A page's description, usually one or two sentences."/>
@stop
@section('title') Health Screening -Dyntat Bangladesh Limited | Accredited | Networked | Barcoded @stop
@section('pagetitle') Health Screening @stop
@section('pagetitle2')Health Screening @stop
@section('content')
    <section class="service-postsec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="health-post-wapper">
                        <div class="healths">
                            @if($HealthScreens)
                                @foreach($HealthScreens as $HealthScreen)
                                    <a href="{{ route('health.single.front', array($HealthScreen->link)) }}">
                                        <div class="single-health">
                                            <div class="fature-image">
                                                <img src="{{ adminUrl($HealthScreen->thumb) }}"
                                                     alt="{{ $HealthScreen->title }}"/>
                                            </div>
                                            <h5>{{ $HealthScreen->title }}</h5>
                                        </div>
                                    </a>
                                @endforeach

                            @endif

                        </div>
                        {{--<div>--}}
                            {{--{{$HealthScreens->links()}}--}}
                        {{--</div>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
