@extends('front.layouts.master')

@section('pagetitle2')
    <a href="{{route('about.front')}}">About Us</a><span class="glyphicon glyphicon-menu-right"></span> <a
            href="{{route('publications.front')}}"> Publicaion</a><span
            class="glyphicon glyphicon-menu-right"></span> Publicaion Details

@stop
@section('content')
    <section class="service-postsec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-content">
                        @if($publications)
                            @foreach($publications as $publication)
                        @section('title') {{$publication->name}} -Dyntat Bangladesh Limited @stop
                        @section('pagetitle') Publicaion Details @stop
                        @section('metas')
                            <meta name="description"
                                  content="{{$publication->meta_description}}">
                        @stop
                        <div>
                            <iframe src="{{route('publication-sin.front', array($publication->link))}}" height="1050px" width="100%" frameBorder="0">

                            </iframe>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
@section('scripts')
    <script>
        var Page = (function () {

            var config = {
                    $bookBlock: $('#bb-bookblock'),
                    $navNext: $('#bb-nav-next'),
                    $navPrev: $('#bb-nav-prev'),
                    $navFirst: $('#bb-nav-first'),
                    $navLast: $('#bb-nav-last')
                },
                init = function () {
                    config.$bookBlock.bookblock({
                        speed: 800,
                        shadowSides: 0.8,
                        shadowFlip: 0.7
                    });
                    initEvents();
                },
                initEvents = function () {

                    var $slides = config.$bookBlock.children();

                    // add navigation events
                    config.$navNext.on('click touchstart', function () {
                        config.$bookBlock.bookblock('next');
                        return false;
                    });

                    config.$navPrev.on('click touchstart', function () {
                        config.$bookBlock.bookblock('prev');
                        return false;
                    });

                    config.$navFirst.on('click touchstart', function () {
                        config.$bookBlock.bookblock('first');
                        return false;
                    });

                    config.$navLast.on('click touchstart', function () {
                        config.$bookBlock.bookblock('last');
                        return false;
                    });

                    // add swipe events
                    $slides.on({
                        'swipeleft': function (event) {
                            config.$bookBlock.bookblock('next');
                            return false;
                        },
                        'swiperight': function (event) {
                            config.$bookBlock.bookblock('prev');
                            return false;
                        }
                    });

                    // add keyboard events
                    $(document).keydown(function (e) {
                        var keyCode = e.keyCode || e.which,
                            arrow = {
                                left: 37,
                                up: 38,
                                right: 39,
                                down: 40
                            };

                        switch (keyCode) {
                            case arrow.left:
                                config.$bookBlock.bookblock('prev');
                                break;
                            case arrow.right:
                                config.$bookBlock.bookblock('next');
                                break;
                        }
                    });
                };

            return {init: init};

        })();
        Page.init();
    </script>
@endsection 
