@extends('front.layouts.master')
@section('metas')
    <meta name="description" content="A page's description, usually one or two sentences."/>
@stop
@section('title') LogIn -Dyntat Bangladesh Limited | Accredited | Networked | Barcoded @stop
@section('pagetitle') LogIn @stop
@section('pagetitle2') LogIn @stop
@section('content')

    <section class="service-postsec">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="login-box">
                        <p class="login-box-msg">LogIn</p>
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <div class="form-group has-feedback">
                                <input id="email" type="email" class="form-control" name="email"
                                       placeholder="Your Email" value="{{ old('email') }}" required autofocus>
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <input id="password" type="password" class="form-control" name="password"
                                       placeholder="Your Password" required>
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            </div>
                            <div class="row">
                                <div class="col-xs-8">
                                    <div class="checkbox icheck">
                                        <label>
                                            <input type="checkbox"
                                                   name="remember" {{ old('remember') ? 'checked' : '' }}> Remember
                                            Me
                                        </label>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-xs-4">
                                    <button type="submit" class="btn btn-primary btn-block btn-flat">LogIn</button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>
                        <div class="log-reg-after">
                            <a href="{{ route('password.request') }}" class="first">I forgot my password</a>
                            <a href="{{ route('register') }}" class="secend">Register</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('scripts')

@endsection 
