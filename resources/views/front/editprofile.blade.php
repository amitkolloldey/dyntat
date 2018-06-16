@extends('front.layouts.master')
@section('metas')
	<meta name="description" content="A page's description, usually one or two sentences."/>
@stop
@section('title') Edit Profile -Dyntat Bangladesh Limited | Accredited | Networked | Barcoded @stop
@section('pagetitle') Edit Profile @stop
@section('pagetitle2') Edit Profile @stop
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
									{!! Form::open(['route' => 'update.profile', 'class' => 'profile-update-form']) !!} 
										<div class="profile-detiels">
											<div class="attrebut">
												<div class="property">
													<h6>Your Image</h6>
												</div>
												<div class="value5"> 
													<div class="input-group post-thumb-field"> 
														<div id="multipleupload" class="multipleupload" action="{{ route('upload.user.thumb') }}">
															<div class="dropzone"  >
																<div class="dz-message" >
																@if( $yourImg =  json_decode(Auth::user()->picture) )
																	<img id="post-thumb-prev" class="profile-img" src="{{adminUrl($yourImg->thumb)}}" alt="" />
																@else
																	<img id="post-thumb-prev" class="profile-img" src="" alt="" />
																@endif
																	<h3 class="upload-title">Drop images here or click to upload.</h3>
																</div> 
															</div> 
														</div>
														@if(Auth::user()->picture)
														<input id="post-thumb-input" type="hidden" class="form-control" name="picture" value="{{Auth::user()->picture}}" >
														@else
														<input id="post-thumb-input" type="hidden" class="form-control" name="picture" value="" >
														@endif
													</div> 
												</div>
											</div>
											<div class="attrebut">
												<div class="property">
													<h6>Your Name</h6>
												</div>
												<div class="value5"> 
													<input type="text" name="name" value="{{Auth::user()->name}}">
												</div>
											</div> 
											<div class="attrebut">
												<div class="property">
													<h6>Your Phone</h6>
												</div>
												<div class="value5">
													<input type="text" name="mobile" value="{{Auth::user()->mobile}}">
												</div>
											</div>
											{{--<div class="attrebut">--}}
												{{--<div class="property">--}}
													{{--<h6>Your Optional Phone</h6>--}}
												{{--</div>--}}
												{{--<div class="value5">--}}
													{{--<input type="text" name="mobile_opt" value="{{Auth::user()->mobile_opt}}">--}}
												{{--</div>--}}
											{{--</div>--}}
											<div class="attrebut">
												<div class="property">
													<h6>Your Address</h6>
												</div>
												<div class="value5"> 
													<textarea name="address">{{Auth::user()->address}}</textarea>
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
							<div class="single-widget services-list sub-menu">
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