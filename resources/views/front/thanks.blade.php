@extends('front.layouts.master')
@section('metas')
    <meta name="description" content="A page's description, usually one or two sentences."/>
@stop
@section('title') Thanks -Dyntat Bangladesh Limited | Accredited | Networked | Barcoded @stop
@section('pagetitle') Thanks @stop
@section('pagetitle2') Thanks @stop
@section('content')
    <section class="service-postsec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-content">
                        <div class="jumbotron">
                            @if(Auth::check() && $userName = Auth::user()->name)
                                <h2>Hello, {{$userName}}!</h2>
                            @else
                                @if($userData = session('CheckUserInfo'))
                                    <h1>Hello, {{$userData['parsonName']}}!</h1>
                                @endif
                            @endif
                            @if(session('message'))
                                <div class="alert alert-success" role="alert">
                                    {{session('message')}}
                                </div>
                            @endif
                            <a class="btn btn-primary" href="{{route('home')}}" role="button">Go To Home</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
