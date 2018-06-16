@extends('front.layouts.master')
@section('metas')
	<meta name="description" content="Dyntat Laboratory - The world’s largest fully automated diagnostic centre which is supported by completely barcoded and IT driven systems.">
@stop
@section('title') Laboratory -Dyntat Bangladesh Limited | Accredited | Networked | Barcoded @stop
@section('pagetitle') Laboratory @stop
@section('pagetitle2')
	<a href="{{route('laboratory.front')}}">Laboratory</a><span class="glyphicon glyphicon-menu-right"></span>About Lab
@stop
@section('content')
		<section class="service-postsec">
			<div class="container">
				<div class="row"> 
					<div class="col-md-12">
						<div class="main-content"> 
							<div class="Laboratory">
								<span class="dropcaps_1">T</span>
								<p>hyrocare prides itself as Bangladesh's first automated clinical chemistry laboratory with a focus on providing quality services at affordable costs to clients like laboratories, doctors, hospitals and organizations as well as patients from across the country and abroad. Our Centralized Processing Laboratory consists of 20,000 sq. ft that has a capacity to process over 20,000 samples in a day. Situated in Dhaka, the laboratory operates 24x7, processing over 5,000 samples a day with a turn-around time of 24 hours. </p>
								<div class="block_tabs_type_1">
									<div class='tabs tabs_default'>
										<ul class='horizontal'>
											<li><a href="#tab-1">Automation</a></li>
											<li><a href="#tab-2">Barcoding</a></li>
											<li><a href="#tab-3">Quality</a></li>
											<li><a href="#tab-4">Technologies</a></li>
											<li><a href="#tab-5">Instrumentation</a></li>
											<li><a href="#tab-6">Logistics</a></li>
										</ul>
										<div id='tab-1'>
											<span class="pic w_frame alignleft"><img src="{{ asset('public/assets/images/Lab_1.jpg') }}" alt="Laboratory Automation"></span>
											<div class="oh">
									            <h2 class="fw_n">
									                Laboratory Automation</h2>
									                <p>Our Central Processing Laboratory situated in Dhaka is a state-of-art, fully automated diagnostic laboratory equipped with the most advanced instrumentation from leading international brands. With a minimum but highly qualified workforce, the laboratory is driven by barcoded and bidirectionally interfaced system and an intelligent laboratory information system (LIS).</p>
									        </div>
										</div>
										<div id='tab-2'> 
											<span class="pic w_frame alignright"><img src="{{ asset('public/assets/images/Lab_2.jpg') }}" alt="Barcoding and bidirectional interfacing<"></span>
											<div class="oh">
									            <h2 class="fw_n">
									                Barcoding and bidirectional interfacing</h2>
									            <p>At Dyntat, we rely on efficient systems for smooth and error free processing of 5,000 samples that we receive each day. Every sample is identified by the barcode on the vial. Through this system, the moment the vial is mounted on the automation instrument, it is automatically routed to the correct analyzer for processing and simultaneously output data is synchronized with the software to generate and upload the reports on the website, making the entire process fast and error free. Thus, our systems ensure that right tests are done on the right specimen, and right results are delivered to the right people at the right time and right cost. Not only does bar-coding ensure error-free reporting, it also helps in curtailing the time consumed or lost in pre-analytical procedures and offers a smooth, hassle free and efficient operation.</p>
									        </div>
										</div>
										<div id='tab-3'>
											<span class="pic w_frame alignright"><img src="{{ asset('public/assets/images/Lab_3.png') }}" alt="Quality"></span>
											<div class="oh">
									            <h2 class="fw_n">Quality</h2>
									            <p>Best of the Global brands, Best of the their instruments, Best of the technologies, Best of the reagents, Best of the procedures, Best of systems, Best of IT, well trained and highly focused pathologist, biochemists, scientists and technologists, gives "Best of the Quality".</p>
									            <p>&nbsp;</p>
									            <p>The endeavor of Dyntat has always been to provide utmost quality in every stage of service - right from collection of sample to processing to delivery of reports. Our systems, processes, man-power and IT ensure the highest level of perfection and timely efficacy in each delivery.
									            <br></p>
									        </div>
										</div>
										<div id='tab-4'>
											<span class="pic w_frame alignright"> <img src="{{ asset('public/assets/images/Lab_4.jpg') }}" alt="Technologies"></span>
											<div class="oh">
									            <h2 class="fw_n">Technologies</h2>
									            <p>The new, upcoming and modern technologies are rapidly introducing new diagnostic tools and constantly evolving the booming diagnostic market. Moreover, in today's competitive environment operating a successful and cost effective practice is challenging. With a similar intention to conduct diagnostic testing economically, Dyntat Technologies Limited our affiliate began its journey in healthcare sector with a very simple, reliable, highly specific and reproducible technology - the Radioimmunoassay, a Nobel Prize winning, breakthrough technology in diagnostics. However, with exponentially increasing number of samples which demand on an average more than one lakh investigations per day, Dyntat has made right use of the latest available advanced superior technology, capable of working on its unbelievable volumes and yet deliver quality and precision to its customers.</p>
									        </div>
										</div>
										<div id='tab-5'>
											<span class="pic w_frame alignright">
									                                    <img src="{{ asset('public/assets/images/Lab_5.jpg') }}" alt="Technologies"></span>
									        <div class="oh">
									            <h2 class="fw_n">Technologies</h2>
									            <h6>Click on the Technologies to know more details.</h6>
									            <ul class="list_1">
									                <li><a href="{{route('technologies.front')}}#collapseOne">Chemiluminescence Immuno Assay (CLIA)</a></li>
									                <li><a href="{{route('technologies.front')}}#collapseTow">Enzyme Linked Immuno-Sorbent Assay (ELISA)</a></li>
									                <li><a href="{{route('technologies.front')}}#collapseThree">High Performance Liquid Chromatography (HPLC)</a></li>
									                <li><a href="{{route('technologies.front')}}#collapseFour">Electrophoresis</a></li>
									                <li><a href="{{ route('technologies.front') }}">Flowcytometry</a></li>
									                <li><a href="{{ route('technologies.front') }}">Fluorescence Flowcytometry</a></li>
									                <li><a href="{{route('technologies.front')}}#collapseFour">Nephelometry</a></li>
									                <li><a href="{{route('technologies.front')}}#collapseFive">Photometry</a></li>
									                <li><a href="{{route('technologies.front')}}#collapseSix">Liquid Chromatography Mass Spectrometry (LCMS)</a></li>
									                <li><a href="{{route('technologies.front')}}#collapseSeven">Induction Coupled Plasma - Mass Spectrometry (ICP-MS)</a></li>
									            </ul>
									        </div>
										</div>
										<div id='tab-6'>
											<span class="pic w_frame alignright"><img src="{{ asset('public/assets/images/Lab_6.jpg') }}" alt="Our Backend Prowess"></span>
											<div class="oh">
									            <h2 class="fw_n">Our Backend Prowess</h2>
									            <p>Our state of the art logistics facilitates collection of more than 5,000 samples from all parts of the country to the centralized lab of Dyntat Bangladesh Limited. This is possible due to our strong logistic network and well coordinated process to ensure that the samples reach the central laboratory before mid-night daily. The samples are meticulously collected, collated, checked for sample integrity, temperature and other aspects of Preanalytical Quality Control and then stored appropriately.</p>
												<p>&nbsp;</p>
												<p>Our state of the art IT helps in seamless integration of all the processes including download of work orders from the web server, scanning of barcodes  and specimens are arranged accordingly for efficient processing. More than 5,000 different samples are processed every night and the reports are directly uploaded back in to the website for our customers to see.</p>

									        </div>
										</div>
									</div>
								</div> 
								<div class="lab-portfolio clearfix">
									<h3 class="heading_w_icon">Lab Tour</h3>
									<div class="portfolio">
										<div class="single-portfolio">
											<img src="{{ asset('public/assets/images/001.jpg') }}" alt="dyntatbd-labratory">
											<div class="portfolio-hover">
												<a href="{{ asset('public/assets/images/001.jpg') }}" class="icon_zoom" rel="prettyPhoto[LAB]">
													<i class="fa fa-search-plus" aria-hidden="true"></i>
												</a>
											</div>
										</div>
										<div class="single-portfolio">
											<img src="{{ asset('public/assets/images/002.jpg')}}" alt="dyntatbd-labratory">
											<div class="portfolio-hover">
												<a href="{{ asset('public/assets/images/002.jpg') }}" class="icon_zoom" rel="prettyPhoto[LAB]">
													<i class="fa fa-search-plus" aria-hidden="true"></i>
												</a>
											</div>
										</div>
										<div class="single-portfolio">
											<img src="{{ asset('public/assets/images/003.jpg')}}" alt="dyntatbd-labratory">
											<div class="portfolio-hover">
												<a href="{{ asset('public/assets/images/003.jpg') }}" class="icon_zoom" rel="prettyPhoto[LAB]">
													<i class="fa fa-search-plus" aria-hidden="true"></i>
												</a>
											</div>
										</div>
										<div class="single-portfolio">
											<img src="{{ asset('public/assets/images/004.jpg')}}" alt="dyntatbd-labratory">
											<div class="portfolio-hover">
												<a href="{{ asset('public/assets/images/004.jpg') }}" class="icon_zoom" rel="prettyPhoto[LAB]">
													<i class="fa fa-search-plus" aria-hidden="true"></i>
												</a>
											</div>
										</div>
										<div class="single-portfolio">
											<img src="{{ asset('public/assets/images/005.jpg')}}" alt="dyntatbd-labratory">
											<div class="portfolio-hover">
												<a href="{{ asset('public/assets/images/005.jpg') }}" class="icon_zoom" rel="prettyPhoto[LAB]">
													<i class="fa fa-search-plus" aria-hidden="true"></i>
												</a>
											</div>
										</div>
										<div class="single-portfolio">
											<img src="{{ asset('public/assets/images/006.jpg')}}" alt="dyntatbd-labratory">
											<div class="portfolio-hover">
												<a href="{{ asset('public/assets/images/006.jpg') }}" class="icon_zoom" rel="prettyPhoto[LAB]">
													<i class="fa fa-search-plus" aria-hidden="true"></i>
												</a>
											</div>
										</div>
										<div class="single-portfolio">
											<img src="{{ asset('public/assets/images/007.jpg')}}" alt="dyntatbd-labratory">
											<div class="portfolio-hover">
												<a href="{{ asset('public/assets/images/007.jpg') }}" class="icon_zoom" rel="prettyPhoto[LAB]">
													<i class="fa fa-search-plus" aria-hidden="true"></i>
												</a>
											</div>
										</div>
										<div class="single-portfolio">
											<img src="{{ asset('public/assets/images/008.jpg')}}" alt="dyntatbd-labratory">
											<div class="portfolio-hover">
												<a href="{{ asset('public/assets/images/008.jpg') }}" class="icon_zoom" rel="prettyPhoto[LAB]">
													<i class="fa fa-search-plus" aria-hidden="true"></i>
												</a>
											</div>
										</div>
										<div class="single-portfolio">
											<img src="{{ asset('public/assets/images/009.jpg')}}" alt="dyntatbd-labratory">
											<div class="portfolio-hover">
												<a href="{{ asset('public/assets/images/009.jpg') }}" class="icon_zoom" rel="prettyPhoto[LAB]">
													<i class="fa fa-search-plus" aria-hidden="true"></i>
												</a>
											</div>
										</div>
										<div class="single-portfolio">
											<img src="{{ asset('public/assets/images/010.jpg')}}" alt="dyntatbd-labratory">
											<div class="portfolio-hover">
												<a href="{{ asset('public/assets/images/010.jpg') }}" class="icon_zoom" rel="prettyPhoto[LAB]">
													<i class="fa fa-search-plus" aria-hidden="true"></i>
												</a>
											</div>
										</div>
										<div class="single-portfolio">
											<img src="{{ asset('public/assets/images/011.jpg')}}" alt="dyntatbd-labratory">
											<div class="portfolio-hover">
												<a href="{{ asset('public/assets/images/011.jpg') }}" class="icon_zoom" rel="prettyPhoto[LAB]">
													<i class="fa fa-search-plus" aria-hidden="true"></i>
												</a>
											</div>
										</div>
										<div class="single-portfolio">
											<img src="{{ asset('public/assets/images/012.jpg')}}" alt="dyntatbd-labratory">
											<div class="portfolio-hover">
												<a href="{{ asset('public/assets/images/012.jpg') }}" class="icon_zoom" rel="prettyPhoto[LAB]">
													<i class="fa fa-search-plus" aria-hidden="true"></i>
												</a>
											</div>
										</div>
										<div class="single-portfolio">
											<img src="{{ asset('public/assets/images/013.jpg')}}" alt="dyntatbd-labratory">
											<div class="portfolio-hover">
												<a href="{{ asset('public/assets/images/013.jpg') }}" class="icon_zoom" rel="prettyPhoto[LAB]">
													<i class="fa fa-search-plus" aria-hidden="true"></i>
												</a>
											</div>
										</div>
										<div class="single-portfolio">
											<img src="{{ asset('public/assets/images/014.jpg')}}" alt="dyntatbd-labratory">
											<div class="portfolio-hover">
												<a href="{{ asset('public/assets/images/014.jpg') }}" class="icon_zoom" rel="prettyPhoto[LAB]">
													<i class="fa fa-search-plus" aria-hidden="true"></i>
												</a>
											</div>
										</div>
										<div class="single-portfolio">
											<img src="{{ asset('public/assets/images/015.jpg')}}" alt="dyntatbd-labratory">
											<div class="portfolio-hover">
												<a href="{{ asset('public/assets/images/015.jpg') }}" class="icon_zoom" rel="prettyPhoto[LAB]">
													<i class="fa fa-search-plus" aria-hidden="true"></i>
												</a>
											</div>
										</div>
										<div class="single-portfolio">
											<img src="{{ asset('public/assets/images/016.jpg')}}" alt="dyntatbd-labratory">
											<div class="portfolio-hover">
												<a href="{{ asset('public/assets/images/016.jpg') }}" class="icon_zoom" rel="prettyPhoto[LAB]">
													<i class="fa fa-search-plus" aria-hidden="true"></i>
												</a>
											</div>
										</div>
									</div> 
								</div>
							</div>
						</div>
					</div>
					{{--<div class="col-md-3" id="res">--}}
						{{--<aside class="right-sidebar">--}}
							{{--<div class="single-widget services-list sub-menu">--}}
								{{--<h4>Laboratory</h4>--}}
								{{--<ul>--}}
									{{--<li><a href="{{ route('laboratory.front') }}">About Lab</a></li>--}}
									{{--<li><a href="{{ route('accreditation.front') }}">Quality</a></li>--}}
									{{--<li><a href="{{ route('technologies.front') }}">Technologies</a></li>--}}
									{{--<li><a href="{{ route('instruments.front') }}">Instruments</a></li>--}}
								{{--</ul>--}}
							{{--</div>--}}
							{{--<div class="single-widget">  --}}
								{{--<img src="{{ asset('public/assets/images/accreditation.png')}}" alt="dyntatbd-Quality">--}}
							{{--</div>--}}
						{{--</aside>--}}
					{{--</div>--}}
				</div>
			</div>
		</section> 
		
@endsection
@section('scripts') 
<script type="text/javascript">

$(document).ready(function(){
    $('.tabs').tabslet();
    $(".icon_zoom[rel^='prettyPhoto']").prettyPhoto({
		theme : 'light_rounded', 
		social_tools : false, 
		slideshow: 5000
	});
});

</script>  
@endsection
