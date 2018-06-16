@extends('front.layouts.master')
@section('metas')
	<meta name="description" content="A page's description, usually one or two sentences."/>
@stop
@section('pagetitle') Book Test Now @stop
@section('content') 
		<section class="service-postsec">
			<div class="container">
				<div class="row"> 
					<div class="col-md-6 col-md-push-3">
						<div class="servic-post-wapper">
						@if($tests)
							<div class="services">  
								@foreach($tests as $test)
								<div class="single-service">
									<div class="fature-image">
										@if($images = json_decode($test->picture))
										<img src="{{ adminUrl($images->thumb) }}" alt="{{ $test->short_name }}" />
										@endif
										<div class="hover" 
											data-cart-add="{{ route('add.to.cart', array($test->id) ) }}" 
											data-cart-remove="{{ route('remove.to.cart', array($test->id) ) }}">
											<a href="" class="request-call" data-id="{{$test->id}}">Request Call</a>
											@if(Cart::get($test->id) === null)
												<a href="{{ route('add.to.cart', array($test->id) ) }}" class="add-cart" data-palash="{{ route('clear.cart') }}">Request Collection</a>
											@else
												<a href="{{ route('remove.to.cart', array($test->id) ) }}" class="remove-cart">Remove Request</a>
											@endif
										</div>
										<div class="service-price">
											<span class="old">&#x9f3;{{ $test->sale_price }}</span>
											<span class="new">&#x9f3;{{ $test->price }}</span>
										</div> 
									</div> 
									<h5><a href="{{ route('test.single.front', array($test->id)) }}">{{ $test->short_name }}</a></h5>
									<p><a href="{{ route('test.single.front', array($test->id)) }}">{{ $test->title }}</a></p>
								</div> 
								@endforeach  
							</div> 
							@if($tests->total() > $tests->perPage())
								<div class="pagination">
									<ul class="test-paginat">
									@for($i=1; $i<$tests->lastPage()+1; $i++)
										@if( $i == $tests->currentPage())
											<li><a href="{{$tests->url($i)}}" class="active">{{$i}}</a></li> 
										@else
											<li><a href="{{$tests->url($i)}}">{{$i}}</a></li> 
										@endif
									@endfor
									</ul>
								</div>
							@endif
						@endif
						</div>
					</div>
					<div class="col-md-3 col-md-pull-6">
						<aside class="left-sidebar"> 
							<div class="single-widget services-list">
								<h4>Diagnostic Services</h4>
								{!! Form::open(['route' => 'cat.tests', 'class' => 'ajax-cat-test']) !!}  
								<ul>
									@if($catAll) 
										@foreach($catAll as $cat)
										<li><input type="checkbox" name="catIds[]" value="{{ $cat->id}}" /> {{ $cat->name}}</li>
										@endforeach 
									@endif 
								</ul>
								{!! Form::close() !!}
							</div>
							<div class="single-widget services-list sub-menu hidden">
								<h4>Sub Pages</h4>
								<ul>
									<li><a href="{{ route('test.all.front') }}">Test Menu</a></li>
									<li><a href="{{ route('disorders.front') }}">Disorders</a></li>
									<li><a href="{{ route('reportTrack.front') }}">Report Track</a></li>
									<li><a href="{{ route('bothlocation.front') }}">Booth Location</a></li>
									<li><a href="{{ route('ServiceProvider.front') }}">Nearest Service Provider</a></li> 
								</ul>
							</div>
						</aside>
					</div>
					<div class="col-md-3">
						<aside class="right-sidebar"> 
							<div class="single-widget cart-widget"> 
								<h4>Your Cart</h4>
								<ul class="item-list"> 
									@if(!Cart::isEmpty() && $cartCollection = Cart::getContent()) 
										@foreach($cartCollection as $item) 
											<li> 
												<img src="{{ $item->attributes['imgPath'] }}" alt=""> 
												<div class="item-desc">
													@if(isset($item->attributes['short_name']))
														<strong>{{ $item->attributes['short_name'] }}</strong>
														<span>{{ $item->name }}</span>
													@else
														<strong>{{ $item->name }}</strong>
													@endif
												</div>
												<span class="item-price">{{ $item->price }}</span>
											</li>  
										@endforeach  
										<li class='subtotal'> 
                    						<a href="{{route('clear.cart')}}" class="clear-cart">Clear Cart</a>
                    						<strong class="cart-total">Total- &#x9f3; {{Cart::getTotal()}}</strong>
               							</li>
									@endif
								</ul> 
							</div>
							<div class="single-widget yourinfo-widget"> 
								<h4>Your Information</h4>
								<div class="info-form-warp">
								@if(session('cmsg')) 
									<h6 class="alert alert-danger">{{session('cmsg')}}</h6>
								@endif

								@if ($errors->any())
								    <div class="alert alert-danger cart-address">
								        <ul>
								            @foreach ($errors->all() as $error)
								                <li>{{ $error }}</li>
								            @endforeach
								        </ul>
								    </div>
								@endif 
								
								{!! Form::open(['route' => 'Checkout', 'class' => 'Checkout-form']) !!} 
									@if(Auth::check())
										<p>
											<input type="text" name="parsonName" value="{{Auth::user()->name}}" disabled="disabled">
										</p>
										<p>
											<input type="text" name="ParsonEmail" value="{{Auth::user()->email}}" disabled="disabled">
										</p>
										<p>
											<input type="text" name="ParsonNumber" value="{{Auth::user()->mobile}}" disabled="disabled">
										</p>
										<p> 
											<textarea name="ParsonAddress" disabled="disabled">{{Auth::user()->address}}</textarea>
										</p>
										<p class="submit">
											<input type="submit" name="submit" value="Proceed to Checkout" > 
										</p>
										<p class="login-link">
											<a href="{{ route('login') }}"> already have an account log in</a>
										</p>
									@else 
										<p>
											<input type="text" name="parsonName" placeholder="Name">
										</p>
										<p>
											<input type="text" name="ParsonEmail" placeholder="Email">
										</p>
										<p>
											<input type="text" name="ParsonNumber" placeholder="Call Number">
										</p>
										<p> 
											<textarea name="ParsonAddress" placeholder="Your Address"></textarea>
										</p>
										<p class="submit">
											<input type="submit" name="submit" value="Proceed to Checkout" > 
										</p>
										<p class="login-link">
											<a href="{{ route('login') }}"> already have an account log in</a>
										</p> 
									@endif
								{!! Form::close() !!} 
								</div>
							</div>
						</aside>
					</div>
				</div>
			</div>
		</section> 
		<div class="request-call-form">
			<div class="form-warp">
				{!! Form::open(['route' => 'requestCall', 'id' => 'requestCall']) !!}
					<input type="hidden" name="testId" value="" />
					<div class="form-group">
						<label>Your number:</label>

						<div class="input-group"> 
							<input type="text" class="form-control" name="number" value="" > 
						</div> 
						<!-- /.input group -->
					</div>
					<div class="form-group"> 

						<div class="input-group"> 
							<button type="submit" class="btn btn-primary">Request</button>
							<a href="" class="btn btn-primary Cenal">Cenal</a>
						</div>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
		
@endsection
