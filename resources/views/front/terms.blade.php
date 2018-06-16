@extends('front.layouts.master')
@section('metas')
	<meta name="description" content="A page's description, usually one or two sentences."/>
@stop
@section('title') Terms -Dyntat Bangladesh Limited | Accredited | Networked | Barcoded @stop
@section('pagetitle') Terms @stop
@section('pagetitle2') Terms @stop
@section('content')
		<section class="service-postsec">
			<div class="container">
				<div class="row"> 
					<div class="col-md-9">
						<div class="main-content">  
							<blockquote class="report-msg">In using this website you are deemed to have read and agreed to the following terms and conditions</blockquote>
							<div class="clearboth"></div>
							<div class="line_1" style="margin:0px 0px 10px;"></div>
							<p> The following terminology applies to these Terms of use -- "Client", "You" and "Your" refers to you, the person accessing this website and accepting the Company's terms and conditions. "The Company" refers to Dyntat Bangladesh Ltd. Any use of the above terminology or other words in the singular, plural, capitalisation and/or he/she or they, are taken as interchangeable and therefore as referring to same. </p>

							<div class="block_accordeon_type_3 panel-group terms-privacy sidebar-accordeon" id="accordion" role="tablist" aria-multiselectable="true">

								<div class="panel panel-default">
									<div class="button_outer first panel-heading" role="tab" id="heading1">
									<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="true" aria-controls="collapse1">
										<div class="button_inner">Exclusions and Limitations</div>
									</a>
									</div><!-- accordeon trigger -->
									<div class="accordeon_content panel-collapse collapse in" id="collapse1" role="tabpanel" aria-labelledby="heading1">
										<!-- accordeon content goes here -->
										<p>The information on this web site is provided on an "as is" basis. To the fullest extent permitted by law of the country of website origin, this Company excludes all liability for damages arising out of or in connection with your use of this website, representations and warranties relating to this website and its contents or which is or may be provided by any affiliates or any other third party, including in relation to any inaccuracies or omissions in this website and/or the Company's literature.</p>
									</div>
									</a>
								</div>
									
								<div class="panel panel-default">
									<div class="button_outer" role="tab" id="heading2">
									<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="false" aria-controls="collapse2">
										<div class="button_inner">Payment</div>
									</a>
									</div><!-- accordeon trigger -->
									<div class="accordeon_content  panel-collapse collapse" id="collapse2" role="tabpanel" aria-labelledby="heading2">
										<!-- accordeon content goes here -->
										<p>All payments are made through Master or VISA credit / debit card through secure payment gateway, the bankers of the client can be contacted for any issue</p>
									</div>
								</div>
									
								<div class="panel panel-default">
									<div class="button_outer" role="tab" id="heading3">
									<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="false" aria-controls="collapse3">
										<div class="button_inner">Cancellation Policy</div>
									</a>
									</div><!-- accordeon trigger -->
									<div class="accordeon_content  panel-collapse collapse" id="collapse3" role="tabpanel" aria-labelledby="heading3">
										<!-- accordeon content goes here -->
										<p>Minimum 24 hours notice of cancellation required. Notification for instance, in person, via email, mobile phone 'text message' and/or fax, or any other means will be accepted subject to confirmation in writing.</p>
									</div>
								</div>
									
								<div class="panel panel-default">
									<div class="button_outer" role="tab" id="heading4">
									<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="false" aria-controls="collapse4">
										<div class="button_inner">Availability</div>
									</a>
									</div><!-- accordeon trigger -->
									<div class="accordeon_content  panel-collapse collapse" id="collapse4" role="tabpanel" aria-labelledby="heading4">
										<!-- accordeon content goes here -->
										<p>Unless otherwise stated, the services featured on this website are only available within India, Nepal, Bangladesh and GCC, or in relation to postings from the respective countries. All advertising is intended solely for these market. You are solely responsible for evaluating the fitness for a particular purpose of any downloads, programs and text available through this site. Redistribution or republication of any part of this site or its content is prohibited, including such by framing or other similar or any other means, without the express written consent of the Company. The Company does not warrant that the service from this site will be uninterrupted, timely or error free, although it is provided to the best ability. By using this service you thereby indemnify this Company, its employees, agents and affiliates against any loss or damage, in whatever manner, howsoever caused.</p>
									</div>
		                        </div>
									
								<div class="panel panel-default">
									<div class="button_outer" role="tab" id="heading5">
									<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse5" aria-expanded="false" aria-controls="collapse5">
										<div class="button_inner">Links to this website</div>
									</a>
									</div><!-- accordeon trigger -->
									<div class="accordeon_content  panel-collapse collapse" id="collapse5" role="tabpanel" aria-labelledby="heading5">
										<!-- accordeon content goes here -->
										<p>You may not create a link to any page of this website without our prior written consent. If you do create a link to a page of this website you do so at your own risk and the exclusions and limitations set out above will apply to your use of this website by linking to it.</p>
									</div>
		                        </div>
									
								<div class="panel panel-default">
									<div class="button_outer" role="tab" id="heading6">
									<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse6" aria-expanded="false" aria-controls="collapse6">
										<div class="button_inner">Copyright Notice</div>
									</a>
									</div><!-- accordeon trigger -->
									<div class="accordeon_content  panel-collapse collapse" id="collapse6" role="tabpanel" aria-labelledby="heading6">
										<!-- accordeon content goes here -->
										<p>Copyright and other relevant intellectual property rights exists on all text relating to the Company's services and the full content of this website. This brand names and logos of Dyntat, Aarogyam, SugarScan, HealthScreen etc. are registered trademark of Dyntat Bangladesh Ltd., India and other countries.</p>
									</div>                                                         	
								</div>
								  
							</div>
							<div class="separator" style="height:30px;"></div>
							<p>
                        Please refer <a href="{{ route('privacyPolicy.front') }}">'Privacy Policy'</a> to know more about Communication, Links to this website, Notification of Changes
                        </p>
						</div>
					</div> 
					<div class="col-md-3">
						<aside class="right-sidebar">
							<div class="single-widget services-list sub-menu">
								<h4>Services</h4>
								<ul>
									<li><a href="{{ route('about.front') }}">About</a></li>
									<li><a href="{{ route('laboratory.front') }}">Laboratory</a></li>
									<li><a href="{{ route('test.all.front') }}">Test</a></li>
									<li><a href="{{ route('health.all.front') }}">Health</a></li> 
								</ul>
							</div> 
						</aside>
					</div>
				</div>
			</div>
		</section> 
		
@endsection
