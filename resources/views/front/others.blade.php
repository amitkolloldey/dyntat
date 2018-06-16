@extends('front.layouts.master')
@section('metas')
    <meta name="description" content=""/>
@stop
@section('title') Other Screening -Dyntat Bangladesh Limited | Accredited | Networked | Barcoded @stop
@section('pagetitle') Other Screening @stop
@section('pagetitle2') Other Screening @stop
@section('content')
    <section class="service-postsec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="health-post-wapper">
                        <div class="healths">
                            @if($HealthScreens)
                                @foreach($HealthScreens as $HealthScreen)
                                    <a href="{{ route('others.single.front', array($HealthScreen->link)) }}">
                                        <div class="single-health">
                                            <div class="fature-image">
                                                <img src="{{ adminUrl($HealthScreen->thumb) }}"
                                                     alt="{{ $HealthScreen->title }}"/>
                                            </div>
                                            <h5 style="height: 60px;">{{ $HealthScreen->title }}</h5>
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
