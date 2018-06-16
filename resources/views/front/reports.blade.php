@extends('front.layouts.master')
@section('metas')
	<meta name="description" content="A page's description, usually one or two sentences."/>
@stop
@section('title') Orders List -Dyntat Bangladesh Limited | Accredited | Networked | Barcoded @stop
@section('pagetitle') Orders @stop
@section('content')
		<section class="service-postsec">
			<div class="container">
				<div class="row"> 
					<div class="col-md-9">
						<div class="health-post-wapper"> 
							<div class="main-content">  
								<div class="panel panel-default user-panel">
									<div class="panel-heading">
										<h3 class="panel-title">Report List</h3> 
									</div>
									<div class="panel-body">
										<div class="profile-detiels">
											<table class="table table-bordered">
												<thead>
													<tr>
														<th>ID</th>
														<th>Test Thumb</th>
														<th>Name</th>
														<th>Action</th>  
													</tr>
												</thead>
												<tbody>
												@if($Products) 
													@foreach($Products as $Product)
														<tr>
															<td>{{$Product->id}}</td>  
															<td><img src="{{$Product->attributes->imgPath}}" alt="" width="100px"></td> 
															<td>{{$Product->name}}</td> 
															<td>
															@if($Product->report)
																<a href="{{adminUrl($Product->report)}}" target="_blank" download>Download</a>
															@else
																Not Abilable
															@endif
															</td> 
														</tr> 
													@endforeach
												@endif
												</tbody>
											</table>
										</div>
									</div>
								</div> 
							</div>
						</div>
					</div> 
					<div class="col-md-3" id="res">
						<aside class="right-sidebar">
							<div class="single-widget services-list">
								<h4>SERVICES</h4>
								<ul>
									<li><a href="{{route('user.profile')}}">Your Profile</a></li>
									<li><a href="{{route('change.password')}}">Change Password</a></li>
									<li><a href="{{ route('user.orders') }}">Order History</a></li>
									<li role="separator" class="divider"></li>
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
@endsection