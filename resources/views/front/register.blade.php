@extends('front.layouts.master')
@section('metas')
    <meta name="description" content="A page's description, usually one or two sentences."/>
@stop
@section('title') Register -Dyntat Bangladesh Limited | Accredited | Networked | Barcoded @stop
@section('pagetitle') Register @stop
@section('pagetitle2') Register @stop
@section('content')

    <section class="service-postsec">
        <div class="container">
            @if(isset($error_msg))
                <div class="alert-warning" style="text-align: center">
                    {{$error_msg}}
                </div>
            @endif
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="register-box">
                        <h3 class="login-box-msg">Register a new membership</h3>
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}
                            <div class="form-group has-feedback">
                                <input id="name" placeholder="Full name" type="text" class="form-control" name="name"
                                       value="{{ old('name') }}" required autofocus>
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                @if ($errors->has('name'))
                                    <span class="help-block">
									<strong>{{ $errors->first('name') }}</strong>
								</span>
                                @endif
                            </div>
                            <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                                <input id="email" placeholder="Email" type="email" class="form-control" name="email"
                                       value="{{ old('email') }}" required>
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                @if ($errors->has('email'))
                                    <span class="help-block">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
                                @endif
                            </div>
                            <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
                                <input id="password" placeholder="Password" type="password" class="form-control"
                                       name="password" required>
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                @if ($errors->has('password'))
                                    <span class="help-block">
									<strong>{{ $errors->first('password') }}</strong>
								</span>
                                @endif
                            </div>
                            <div class="form-group has-feedback">
                                <input id="password-confirm" placeholder="Retype password" type="password"
                                       class="form-control" name="password_confirmation" required>
                                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <input id="mobile" placeholder="Phone Number" type="text" class="form-control"
                                       name="mobile" value="{{ old('mobile') }}" required autofocus>
                                <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                                @if ($errors->has('mobile'))
                                    <span class="help-block">
									<strong>{{ $errors->first('mobile') }}</strong>
								</span>
                                @endif
                            </div>
                            <div class="form-group has-feedback">
                                <textarea id="address" placeholder="Your Address" class="form-control" name="address"
                                          required autofocus>{{ old('address') }}</textarea>
                                @if ($errors->has('address'))
                                    <span class="help-block">
									<strong>{{ $errors->first('address') }}</strong>
								</span>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-xs-8">
                                    <div class="checkbox icheck">
                                        <label>
                                            <input name="agreement" type="checkbox"> I agree to the <a
                                                    href="{{ route('terms.front') }}">terms</a>
                                        </label>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-xs-4">
                                    <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>
                        <div class="log-reg-after">
                            <a href="{{ route('password.request') }}" class="first">I Forgot My Password</a>
                            <a href="{{ route('login') }}" class="secend">LogIn</a>
                        </div>
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
