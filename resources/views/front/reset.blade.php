@extends('front.layouts.master')
@section('metas')
	<meta name="description" content="A page's description, usually one or two sentences."/>
@stop
@section('title') Reset Password -Dyntat Bangladesh Limited | Accredited | Networked | Barcoded @stop
@section('pagetitle') Reset Password @stop
@section('pagetitle2') Reset Password @stop
@section('content')

<section class="service-postsec">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="login-box">
					<p cllass="ogin-box-msg">Reset Password</p>
					@if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
					<form class="form-horizontal" role="form" method="POST" action="{{ route('password.request') }}">
						{{ csrf_field() }}
						<input type="hidden" name="token" value="{{ $token }}">

						<div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
							<input id="email" type="email" class="form-control" name="email" placeholder="Your Email" value="{{ $email or old('email') }}" required autofocus>
							<span class="glyphicon glyphicon-envelope form-control-feedback"></span>

							@if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
						</div>
						<div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
							<input id="password" type="password" class="form-control" name="password" placeholder="New Password" required>
							<span class="glyphicon glyphicon-lock form-control-feedback"></span>

							@if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
						</div>
						<div class="form-group has-feedback {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
							<input id="password" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
							<span class="glyphicon glyphicon-lock form-control-feedback"></span>

							@if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
						</div>
						<div class="row">
							<div class="col-xs-12">
								<button type="submit" class="btn btn-primary btn-block btn-flat">Reset Password</button>
							</div>
							<!-- /.col -->
						</div>
					</form>
					<div class="log-reg-after">
						<a href="{{ route('login') }}" class="first">LogIn</a>
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
