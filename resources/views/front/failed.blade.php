@extends('front.layouts.master')
@section('metas')
    <meta name="description" content="A page's description, usually one or two sentences."/>
@stop
@section('title') Error -Dyntat Bangladesh Limited | Accredited | Networked | Barcoded @stop
@section('pagetitle') Error @stop
@section('pagetitle2') Error @stop
@section('content')
    <section class="service-postsec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-content">
                        <div class="jumbotron">
                            @if(Auth::check() && $userName = Auth::user()->name)
                                <h2>Hello, {{$userName}}!</h2>
                            @endif
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                            {{--<a class="btn btn-primary" href="{{route('home')}}" role="button">Go To Home</a></p>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
