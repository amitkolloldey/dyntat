@extends('front.layouts.master')
@section('metas')
	<meta name="description" content="A page's description, usually one or two sentences."/>
@stop
@if( app('request')->input('reg') == 'Doctor' )
	@section('title') Doctor -Dyntat Bangladesh Limited | Accredited | Networked | Barcoded @stop
	@section('pagetitle') Doctor @stop
	@section('pagetitle2')
		<a href="{{route('about.front')}}">About Us</a><span class="glyphicon glyphicon-menu-right"></span><a href="{{route('opportunitie.front')}}">Be Our Partner</a><span class="glyphicon glyphicon-menu-right"></span> Doctor
	@stop
@else
	@section('title') Healthcare Partner -Dyntat Bangladesh Limited | Accredited | Networked | Barcoded @stop
	@section('pagetitle') Healthcare Partner @stop
	@section('pagetitle2')
		<a href="{{route('about.front')}}">About Us</a><span class="glyphicon glyphicon-menu-right"></span><a href="{{route('opportunitie.front')}}">Be Our Partner</a><span class="glyphicon glyphicon-menu-right"></span> Healthcare Partner

	@stop
@endif


@section('content') 
		<section class="service-postsec">
			<div class="container">
				<div class="row"> 
					<div class="col-md-9">
						<div class="main-content">  
							<blockquote class="report-msg">
								@if(Route::currentRouteName('Doctor'))
			                        We offer to our valued doctors for their patients to avail the best of quality blood tests at rates unmatched by any other Diagnostics Laboratory. To enquire about special offers for Doctors kindly furnish the details below. Our representative will contact you
			                    @endif 
		                    </blockquote>
							<div class="customerCorpo">
								@if (session('smessage'))
								    <div class="alert alert-success">
								        {{ session('smessage') }}
								    </div>
								@endif  
								@if ($errors->any())
								    <div class="alert alert-danger">
								        <ul>
								            @foreach ($errors->all() as $error)
								                <li>{{ $error }}</li>
								            @endforeach
								        </ul>
								    </div>
								@endif 
								{!! Form::open(['route' => 'healthcareCreate', 'class' => 'customerCorpo-form']) !!}
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Mobile (required)</label> 
												<div class="input-group"> 
													<input type="text" class="form-control" name="mobile" value="" > 
												</div>  
											</div>
											<div class="form-group">
												<label> First Name (required)</label> 
												<div class="input-group"> 
													<input type="text" class="form-control" name="firstname" value="" > 
												</div>  
											</div>
											<div class="form-group">
												<label>Qualification (required)</label> 
												<div class="input-group"> 
													<select class="form-control" name="qualification"> 
														<option value="MD">MD</option>
														<option value="MS">MS</option>
														<option value="FCPS">FCPS</option>
														<option value="PhD">PhD</option>
														<option value="MDS">MDS</option>
														<option value="M.B.B.S.">M.B.B.S.</option>
														<option value="B.D.S.">B.D.S.</option>
														<option value="B.H.M.S.">B.H.M.S.</option>
														<option value="B.P.T.">B.P.T.</option>
														<option value="B.U.M.S.">B.U.M.S.</option>
														<option value="B.A.M.S.">B.A.M.S.</option>
														<option value="D.H.M.S.">D.H.M.S.</option>
														<option value="Others">Others</option>
													</select>
												</div>  
											</div>
											<div class="form-group">
												<label>E-Mail (required) </label> 
												<div class="input-group"> 
													<input type="text" class="form-control" name="email" value="" > 
												</div>  
											</div>
											<div class="form-group">
												<label>Home Address (required) </label> 
												<div class="input-group">  
													<textarea class="form-control" name="homeAddress"></textarea>
												</div>  
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Register As (required)</label> 
												<div class="input-group"> 
													<select class="form-control" name="registerAs">
														<option value="Doctor">Doctor</option>
														<option value="Hospital" @if( app('request')->input('reg') == 'Hospital' ) selected @endif>Hospital</option>
														<option value="Diagnostic Laboratory" @if( app('request')->input('reg') == 'Diagnostic' ) selected @endif>Diagnostic Laboratory</option>
														<option value="Clinic" @if( app('request')->input('reg') == 'Clinic' ) selected @endif>Clinic</option>
														<option value="Medical Health Check-up Centre"  @if( app('request')->input('reg') == 'Medical' ) selected @endif >Medical Health Check-up Centre</option> 
													</select>
												</div>  
											</div>
											<div class="form-group">
												<label> Last Name (required)</label> 
												<div class="input-group"> 
													<input type="text" class="form-control" name="lastname" value="" > 
												</div>  
											</div>
											<div class="form-group">
												<label>Specialization (required)</label> 
												<div class="input-group"> 
													<select class="form-control" name="specialization">
														<option value=""></option>
														<option value="ANAESTHESIOLOGY ">ANAESTHESIOLOGY </option>
														<option value="ANATOMY ">ANATOMY </option>
														<option value="AVIATION MEDICINE">AVIATION MEDICINE</option>
														<option value="BACTERIOLOGY">BACTERIOLOGY</option>
														<option value="BIOCHEMISTRY">BIOCHEMISTRY</option>
														<option value="BIOPHYSICS">BIOPHYSICS</option>
														<option value="CHILD HEALTH">CHILD HEALTH</option>
														<option value="CLINICAL PATHOLOGY">CLINICAL PATHOLOGY</option>
														<option value="COMMUNITY DENTISTRIES">COMMUNITY DENTISTRIES</option>
														<option value="COMMUNITY HEALTH ADMINISTRATION">COMMUNITY HEALTH ADMINISTRATION</option>
														<option value="COMMUNITY MEDICINE">COMMUNITY MEDICINE</option>
														<option value="CONSERVATIVE AND ENDODONTIC SURGERIES">CONSERVATIVE AND ENDODONTIC SURGERIES</option>
														<option value="DERMATOLOGY & VENEROLOGY">DERMATOLOGY & VENEROLOGY</option>
														<option value="DERMATOLOGY">DERMATOLOGY</option>
														<option value="ENT (OTORHINOLARYGOLOGY)">ENT (OTORHINOLARYGOLOGY)</option>
														<option value="FORENSIC MEDICINE">FORENSIC MEDICINE</option>
														<option value="GENERAL MEDICINE">GENERAL MEDICINE</option>
														<option value="GENERAL SURGERY">GENERAL SURGERY</option>
														<option value="GERIATRICS">GERIATRICS</option>
														<option value="HEALTH ADMINISTRATION">HEALTH ADMINISTRATION</option>
														<option value="HOSPITAL ADMINISTRATION">HOSPITAL ADMINISTRATION</option>
														<option value="LABORATORY MEDICINE">LABORATORY MEDICINE</option>
														<option value="LEPROSY">LEPROSY</option>
														<option value="MEDICAL VIROLOGY">MEDICAL VIROLOGY</option>
														<option value="MICROBIOLOGY">MICROBIOLOGY</option>
														<option value="NEURO ANAESTHESIA">NEURO ANAESTHESIA</option>
														<option value="NUCLEAR MEDICINE">NUCLEAR MEDICINE</option>
														<option value="OBSTETRICS & GYNAECOLOGY">OBSTETRICS & GYNAECOLOGY</option>
														<option value="OPHTHALMOLOGY">OPHTHALMOLOGY</option>
														<option value="ORAL MAXILLOFACIAL SURGERIES">ORAL MAXILLOFACIAL SURGERIES</option>
														<option value="ORAL MEDICINE">ORAL MEDICINE</option>
														<option value="ORTHODONTICS">ORTHODONTICS</option>
														<option value="ORTHOPAEDICS">ORTHOPAEDICS</option>
														<option value="PAEDIATRICS">PAEDIATRICS</option>
														<option value="PATHOLOGY">PATHOLOGY</option>
														<option value="PEDODONTICS">PEDODONTICS</option>
														<option value="PERIODONTICS">PERIODONTICS</option>
														<option value="PHARMACOLOGY">PHARMACOLOGY</option>
														<option value="PHYSICAL MEDICINE AND REHABILITATION">PHYSICAL MEDICINE AND REHABILITATION</option>
														<option value="PHYSIOLOGY">PHYSIOLOGY</option>
														<option value="PROSTHODONTICS">PROSTHODONTICS</option>
														<option value="PSYCHIATRY">PSYCHIATRY</option>
														<option value="PSYCOLOGICAL MEDICINE">PSYCOLOGICAL MEDICINE</option>
														<option value="RADIATION MEDICINE">RADIATION MEDICINE</option>
														<option value="RADIO DIAGNOSIS">RADIO DIAGNOSIS</option>
														<option value="RADIO THERAPY">RADIO THERAPY</option>
														<option value="RESEARCH AND DEVELOPMENT">RESEARCH AND DEVELOPMENT</option>
														<option value="SOCIAL AND PREVENTIVE MEDICINE">SOCIAL AND PREVENTIVE MEDICINE</option>
														<option value="SPORTS MEDICINE">SPORTS MEDICINE</option>
														<option value="TROPICAL MEDICINE AND HEALTH">TROPICAL MEDICINE AND HEALTH</option>
														<option value="TUBERCULOSIS & RESPIRATORY DISEASES">TUBERCULOSIS & RESPIRATORY DISEASES</option>
														<option value="VENEROLOGY">VENEROLOGY</option>
														<option value="Others">Others</option>
													</select> 
												</div>  
											</div>
											<div class="form-group">
												<label>Phone </label> 
												<div class="input-group"> 
													<input type="text" class="form-control" name="phone" value="" > 
												</div>  
											</div>
											<div class="form-group">
												<label>Chamber Address (required) </label> 
												<div class="input-group">  
													<textarea class="form-control" name="chamberAddress"></textarea>
												</div>  
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">  
												<div class="input-group"> 
													<button type="submit" class="btn btn-primary">Submit</button> 
												</div>
											</div>
										</div>
									</div>
								{!! Form::close() !!}
							</div>
						</div>
					</div>  
					<div class="col-md-3" id="res">
						<aside class="right-sidebar">
							<div class="single-widget services-list sub-menu">
								<h4>Opportunities</h4>
								<ul>
									<li><a href="{{route('Customer', array('reg'=>'Doctor'))}}">Customer</a></li>
									<li><a href="{{route('Healthcare', array( 'reg'=>'Doctor'))}}">Doctor</a></li>
									<li><a href="{{route('career')}}">Carrer</a></li>
									<li><a href="{{route('HealthcarePartner', array( 'reg'=>'Healthcare'))}}">Healthcare Partner</a></li>
									<li><a href="{{route('Corporate', array( 'reg'=>'Corporate'))}}">Corporate</a></li>
								</ul>
							</div>
							<div class="single-widget"> 
							@if( app('request')->input('reg') == 'Doctor' )
								<img src="{{ asset('public/assets/images/Side_Banner_DR.jpg')}}">
							@else 
								<img src="{{ asset('public/assets/images/agreement.jpg')}}">
							@endif  
							</div>
						</aside>
					</div>
				</div>
			</div>
		</section> 
		
@endsection
