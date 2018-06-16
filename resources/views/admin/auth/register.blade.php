@extends('admin.auth.master')

@section('title') ThyroCareBD | Register @stop

@section('content')
<div class="register-page">
	<div class="register-box">
		<div class="register-logo">
			<a href="{{ route('home') }}"><b>ThyroCare</b>BD</a>
		</div>

		<div class="register-box-body">
			<p class="login-box-msg">Register a new membership</p>
				<form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
				<div class="form-group has-feedback"> 
					<input id="name" placeholder="Full name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
					<span class="glyphicon glyphicon-user form-control-feedback"></span>
					@if ($errors->has('name'))
						<span class="help-block">
							<strong>{{ $errors->first('name') }}</strong>
						</span>
					@endif 
				</div>
				<div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
					<input id="email" placeholder="Email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
					@if ($errors->has('email'))
						<span class="help-block">
							<strong>{{ $errors->first('email') }}</strong>
						</span>
					@endif 
				</div>
				<div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}"> 
					<input id="password" placeholder="Password" type="password" class="form-control" name="password" required>
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
					@if ($errors->has('password'))
						<span class="help-block">
							<strong>{{ $errors->first('password') }}</strong>
						</span>
					@endif
					
				</div>
				<div class="form-group has-feedback"> 
					<input id="password-confirm" placeholder="Retype password" type="password" class="form-control" name="password_confirmation" required>
					<span class="glyphicon glyphicon-log-in form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback"> 
					<input id="mobile" placeholder="Phone Number" type="text" class="form-control" name="mobile" value="{{ old('mobile') }}" required autofocus>
					<span class="glyphicon glyphicon-user form-control-feedback"></span>
					@if ($errors->has('mobile'))
						<span class="help-block">
							<strong>{{ $errors->first('mobile') }}</strong>
						</span>
					@endif 
				</div>
				<div class="form-group has-feedback"> 
					<input id="address" placeholder="Phone Number" type="text" class="form-control" name="address" value="{{ old('address') }}" required autofocus>
					<span class="glyphicon glyphicon-user form-control-feedback"></span>
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
									<input type="checkbox"> I agree to the <a href="#">terms</a>
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

			<div class="social-auth-links text-center">
			  <p>- OR -</p>
			  <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
				Facebook</a>
			  <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
				Google+</a>
			</div>

			<a href="login.html" class="text-center">I already have a membership</a>
		</div>
	  <!-- /.form-box -->
	</div>
</div>
<!-- /.register-box -->

@endsection
