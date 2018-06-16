@extends('front.layouts.master')
@section('metas')
	<meta name="description" content="A page's description, usually one or two sentences."/>
@stop
@section('styles') 
<style type="text/css">
.form-group .booktest-lest {
  margin: 0;
  padding: 0;
}
.form-group .booktest-lest > li {
  float: left;
  font-size: 16px;
  padding: 8px 0;
  width: 33.3333%;
}
.form-group .booktest-lest > li input[type="checkbox"] {
  margin-right: 10px;
}
</style>
@stop
@section('title') Booking Test -Dyntat Bangladesh Limited | Accredited | Networked | Barcoded @stop
@section('pagetitle') Booking Test @stop
@section('pagetitle2') Booking Test @stop
@section('content')
		<section class="service-postsec">
			<div class="container">
				<div class="row"> 
					<div class="col-md-9">
						<div class="main-content">  
							@if(session('message'))
							<div class="alert alert-success" role="alert">
								<strong>Well done!</strong>  
									{{session('message')}} 
							</div>
							@endif
							<div class="register-box">
								<h3 class="login-box-msg">Booking Test Now</h3>
								@if ($errors->any())
								    <div class="alert alert-danger cart-address">
								        <ul>
								            @foreach ($errors->all() as $error)
								                <li>{{ $error }}</li>
								            @endforeach
								        </ul>
								    </div>
								@endif 
								<form class="form-horizontal" role="form" method="POST" action="{{ route('booktest.front') }}"> 
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
									
									<div class="form-group has-feedback"> 
										<input id="mobile" placeholder="Phone Number" type="text" class="form-control" name="mobile" value="{{ old('mobile') }}" required autofocus>
										<span class="glyphicon glyphicon-phone form-control-feedback"></span>
										@if ($errors->has('mobile'))
											<span class="help-block">
												<strong>{{ $errors->first('mobile') }}</strong>
											</span>
										@endif 
									</div>
									<div class="form-group has-feedback"> 
										<textarea id="address" placeholder="Your Address" class="form-control" name="address" required autofocus>{{ old('address') }}</textarea>  
										@if ($errors->has('address'))
											<span class="help-block">
												<strong>{{ $errors->first('address') }}</strong>
											</span>
										@endif 
									</div>
									<div class="form-group has-feedback">
										@if($testall)
											<ul class="booktest-lest">
												@foreach($testall as $test) 
													<li>
														<input type="checkbox" name="testList[]" value="{{$test->id}}">{{$test->title}}
													</li>  
												@endforeach
											</ul>
										@endif
									</div>
									<div class="row"> 
										<div class="col-xs-4">
										  <button type="submit" class="btn btn-primary btn-block btn-flat">Booking Test</button>
										</div>
										<!-- /.col -->
									</div>
								</form>   
							</div>
						</div>
					</div>  
					<div class="col-md-3" id="res">
						<aside class="right-sidebar">
							<div class="single-widget services-list sub-menu">
								<h4>Services</h4>
								<ul>
									<li><a href="{{ route('test.all.front') }}">Test Menu</a></li>
									<li><a href="{{ route('disorders.front') }}">Disorders</a></li>
									<li><a href="{{ route('reportTrack.front') }}">Report Track</a></li>
									<li><a href="{{ route('bothlocation.front') }}">Booth Location</a></li>
									<li><a href="{{ route('ServiceProvider.front') }}">Nearest Service Provider</a></li> 
								</ul>
							</div>
							<div class="single-widget cart-widget"> 
								<img src="{{ asset('public/assets/images/Report_Track.jpg')}}">
							</div>
						</aside>
					</div>
				</div>
			</div>
		</section> 
@endsection
