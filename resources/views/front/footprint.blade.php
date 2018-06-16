@extends('front.layouts.master')
@section('metas')
	<meta name="description" content="A page's description, usually one or two sentences."/>
@stop
@section('title') Our Global Footprint -Dyntat Bangladesh Limited | Accredited | Networked | Barcoded @stop
@section('pagetitle') Our Global Footprint @stop
@section('pagetitle2')
	<a href="{{route('about.front')}}">About Us</a><span class="glyphicon glyphicon-menu-right"></span> Our Global Footprint
@stop
@section('content')
		<section class="service-postsec">
			<div class="container">
				<div class="row"> 
					<div class="col-md-9">
						<div class="main-content"> 
							<ul class="list_1">
								 <li>Three labs - uniform cost and quality to serve over a quarter of global population.</li>
								 <li>Unmatched regional and local network and logistic.</li>
							</ul> 
							<img src="{{ asset('public/assets/images/map_big.jpg')}}" alt="Global Footprint">
						</div>
					</div>
					<div class="col-md-3" id="res">
						<aside class="right-sidebar">
							<div class="single-widget services-list sub-menu">
								<h4>About Us</h4>
								<ul>
									<li><a href="{{ route('about.front') }}"> Company</a></li>
									<li><a href="{{ route('management.front') }}"> Management & Leadership</a></li>
									<li><a href="{{ route('footprint.front') }}"> Our Global Footprint</a></li>
									<li><a href="{{ route('publications.front') }}">Publication</a></li>
									<li><a href="{{route('media.front')}}">Media</a></li>
								</ul>
							</div>
							<div class="single-widget"> 
								<h4>Our Network</h4>
								<p>Networks of authorized, trained and equipped collection centers serve through a very strong IT and Logistics.</p>
								<img src="{{ asset('public/assets/images/bd-Network.png')}}" alt="dyntatbd-Network">
								<p>*SERVING AFGANISTAN, BAHRAIN, BANGLADESH, EGYPT, INDIA, IRAQ, KUWAIT, NEPAL, OMAN, QATAR, SAUDI ARABIA, UNITED ARAB EMIRATES AND OTHER COUNTRIES.</p>
							</div>
						</aside>
					</div>
				</div>
			</div>
		</section>

@endsection
