@extends('front.layouts.master')
@section('title') 404 @stop
@section('pagetitle') ERROR @stop
@section('content')
		<section class="service-postsec">
			<div class="container">
				<div class="row"> 
					<div class="col-md-9 col-md-push-3">
						<div class="main-content">   
							<div class="error-page-warp">  
							<h1>Opps ! <br> We Are Not Found That.</h1>
							</div>
						</div>
					</div>  
					<div class="col-md-3 col-md-pull-9">
						<aside class="right-sidebar">
							<div class="single-widget services-list sub-menu">
								<h4>About Us</h4>
								<ul>
									<li><a href="{{ route('about.front') }}"> Company</a></li>
									<li><a href="{{ route('management.front') }}"> Management & Leadership</a></li>
									<li><a href="{{ route('footprint.front') }}"> Our Global Footprint</a></li>
									<li><a href="{{ route('publications.front') }}">Publication</a></li>
									<li><a href="{{ route('opportunitie.front') }}">Be Our Partner</a></li>
									<li><a href="{{route('media.front')}}">Media</a></li>
									<li><a href="{{ route('career') }}">Career</a></li>
								</ul>
							</div>
							<div class="single-widget">  
								<img src="{{ asset('public/assets/images/Side_Banner_CORP.jpg')}}">  
							</div>
						</aside>
					</div>
				</div>
			</div>
		</section> 
		
@endsection
