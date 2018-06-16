<?php

\Session::put('backUrl', URL::previous());
?>

<div id="login-model" class="modal-login">

    <!-- Modal content -->
    <div class="modal-content-login">
        <div class="modal-header-login quick_con-login">
            <span class="close-login" style="color: #f75016">&times;</span>


        </div>
        <div class="modal-body-login">
            <div class="login-box">
                <h4 class="modal__h4">LOGIN</h4>
                <div class="facebook-button-wrapper">
                    <a href="{{ route('adminFacebook') }}"
                       target="_blank">
                        <button class="facebook-button button">
                        <span class="facebook-button__content">
                            <span class="facebook-button__logo">
                                Facebook login
                            </span>
                        </span>
                        </button>

                    </a>
                </div>
                <div class="login-separator">Or</div>

                {{--<div class="facebook-button-wrapper">--}}

                {{--<span>--}}
                {{--<img class="login-facebook-image"--}}
                {{--src="{{asset('public/assets/images/fb_icon_wide.jpg')}}"--}}
                {{--alt="Facebook">--}}
                {{--</span>--}}

                {{--</div>--}}
                <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <div class="form-group has-feedback">
                        <input id="email" type="email" class="form-control" name="email"
                               placeholder="Email Address" value="{{ old('email') }}" required autofocus>
                        {{--<span class="glyphicon glyphicon-envelope form-control-feedback"></span>--}}
                    </div>
                    <div class="form-group has-feedback">
                        <input id="password" type="password" class="form-control" name="password"
                               placeholder="Password" required>
                        <a class="forgot-pp" href="{{ route('password.request') }}">Forgot?</a>
                        {{--<span class="glyphicon glyphicon-lock form-control-feedback"></span>--}}
                    </div>
                    <div class="submit">
                    {{--<div class="col-xs-8">--}}
                    {{--<div class="checkbox icheck">--}}
                    {{--<label>--}}
                    {{--<input type="checkbox"--}}
                    {{--name="remember" {{ old('remember') ? 'checked' : '' }}> Remember--}}
                    {{--Me--}}
                    {{--</label>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    <!-- /.col -->
                        <button type="submit" class="modal__padding-left-right">LogIn</button>
                        <!-- /.col -->
                    </div>
                </form>
                <div class="login-registration-link">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="secend">Signup here</a>
                </div>
            </div>

        </div>
        <div class="modal-footer-login">
        </div>
    </div>
</div>
<script src="{{asset('public/assets/js/par_js/par_login.js')}}"></script>