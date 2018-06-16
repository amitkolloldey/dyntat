@extends('front.layouts.master')
@section('metas')
	<meta name="description" content="Dyntat Bangladesh Limited"/>
@stop
@section('title') User Profile -Dyntat Bangladesh Limited | Accredited | Networked | Barcoded @stop
@section('pagetitle') User Profile @stop
@section('pagetitle2') Change Password @stop
@section('content')
		<section class="service-postsec">
			<div class="container">
				<div class="row">
					<div class="col-md-9">
						<div class="health-post-wapper">
							<div class="main-content">
								<div class="panel panel-default user-panel">
									<div class="panel-heading">
										<h3 class="panel-title">Your Profile</h3>
										<h3 class="panel-title edit-profile-url"><a href="">Edit</a></h3>
									</div>
									<div class="panel-body">
									{!! Form::open(['route' => 'update.password', 'class' => 'profile-update-form']) !!} 
										<div class="profile-detiels"> 
											<div class="attrebut">
												<div class="property">
													<h6>Your Current Password</h6>
												</div>
												<div class="value5"> 
													<input type="password" name="current_password" value="">
												</div>
											</div> 
											<div class="attrebut">
												<div class="property">
													<h6>Your New Password</h6>
												</div>
												<div class="value5">
													<input type="password" name="new_password" value="">
												</div>
											</div> 
											<div class="attrebut">
												<div class="property">
													<h6>Confirm Password</h6>
												</div>
												<div class="value5"> 
													<input type="password" name="confirm_password" value="">
												</div>
											</div>
											<div class="attrebut">
												<input type="submit" name="submit" value="submit">
											</div>
										</div>
									{!! Form::close() !!}
									</div>
								</div>
							</div>
						</div>
					</div> 
					<div class="col-md-3">
						<aside class="right-sidebar">
							<div class="single-widget services-list">
								<h4>USER PROFILE</h4>
								<ul>
									<li><a href="{{route('user.profile')}}">Your Profile</a></li>
									<li><a href="{{route('change.password')}}">Change Password</a></li>
									<li><a href="{{ route('user.orders') }}">Order History</a></li>
									<li><a href="" onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">Log Out</a>
										<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							          		{{ csrf_field() }}
							        	</form>
									</li>
								</ul>
							</div> 
						</aside>
					</div> 
				</div>
			</div>
		</section> 
		
@endsection
@section('scripts') 
<script src="{{ asset('public/admin-assets/dist/js/dropzone.js') }}"></script>
<script type="text/javascript">

$(document).ready(function(){
    $('.tabs').tabslet(); 
});
 $(document).ready(function () {
	var actionUrl = $(".multipleupload").attr('data-action');
	Dropzone.autoDiscover = false;
	$("#multipleupload").dropzone( { 
		paramName: "picture",
		url: actionUrl, 
		uploadMultiple:false,
		previewsContainer: false,
		addRemoveLinks: true,
		sending: function(file, xhr, formData){
					formData.append( '_token', $("input[name=_token]").val() );
				},
		success: function(file, response, done){
			console.log("aaaaaaaaaaa"); 		
                    $("#multipleupload").parents('.post-thumb-field').find('#post-thumb-input').attr("value", response.imageName);
                    $("#multipleupload").parents('.post-thumb-field').find('#post-thumb-prev').attr("src", response.image);
                }
	});  
});
</script>  
@endsection