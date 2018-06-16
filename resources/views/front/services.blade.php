@extends('front.layouts.master')
@section('metas')
    <meta name="description"
          content="Book Dyntat Wellness and preventive health care packages at affordable costs and with quality reports.">
@stop
@section('title') Book Test Now -Dyntat Bangladesh Limited | Accredited | Networked | Barcoded @stop
@section('pagetitle') Book Test Now @stop
@section('pagetitle2')
    <a href="{{route('test.all.front')}}">Services</a><span class="glyphicon glyphicon-menu-right"></span>Book Test Now
@stop
@section('content')

    <section class="service-postsec">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <aside class="left-sidebar">
                        <div class="single-widget services-list">
                            <h4>Diagnostic Services</h4>
                            {!! Form::open(['route' => 'cat.tests', 'class' => 'ajax-cat-test']) !!}
                            <ul>
                                @if($catAll)
                                    @foreach($catAll as $cat)
                                        <li><input type="checkbox" name="catIds[]"
                                                   value="{{ $cat->id}}"/> {{ $cat->name}}</li>
                                    @endforeach
                                @endif
                            </ul>
                            {!! Form::close() !!}
                        </div>

                    </aside>
                    <div class="left-sidebar-healths" style="margin-top: 10px;">
                        <aside class="left-sidebar">
                            <div class="single-widget services-list">
                                <h4>Health Screening:</h4>
                                @foreach($healths as $health)
                                    <div class="title3 test-menu-hs"
                                         data-cart-add-health3="{{ route('add.healthto.cart', array($health->id)) }}"
                                         data-cart-remove-health3="{{ route('add.healthto.cart', array($health->id)) }}"
                                         data-cart-img-health3="{{$health->thumb}}"
                                    >
                                        <a class="add-health-cart3"
                                           href="">
                                            {{$health->title}}
                                        </a>

                                    </div>
                                @endforeach
                            </div>
                        </aside>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="servic-post-wapper">
                        @if($tests)
                            <div class="services" style="overflow:auto; max-height: 195vh;">
                                @foreach($tests as $test)
                                    <div id="{{$test->id}}">
                                        <div class="single-service">
                                            <div class="fature-image">
                                                @if($images = json_decode($test->picture))
                                                    <img src="{{ adminUrl($images->thumb) }}"
                                                         alt="{{ $test->title }}"/>
                                                @endif
                                                <div class="hover"
                                                     data-cart-add="{{ route('add.to.cart', array($test->id) ) }}"
                                                     data-cart-remove="{{ route('remove.to.cart', array($test->id) ) }}">
                                                    @if(!in_array((int)$test->id,$selected_id))
                                                        @if(Cart::get($test->id) === null)
                                                            <a href="{{ route('add.to.cart', array($test->id) ) }}"
                                                               class="add-cart"
                                                               data-palash="{{ route('clear.cart') }}"><span
                                                                        class='add-to-cart-text'>Add to Cart</span><span
                                                                        class='glyphicon glyphicon-shopping-cart'></span></a>
                                                        @else
                                                            <a href="{{ route('remove.to.cart', array($test->id) ) }}"
                                                               class="remove-cart"><span class='remove-from-cart-text'>Remove from Cart</span><span
                                                                        class='glyphicon glyphicon-check'></span></a>
                                                        @endif
                                                    @else
                                                        <a class="package-test">
                                                            <span class='remove-from-cart-text'>Package test</span>
                                                            <span class='glyphicon glyphicon-check'></span></a>
                                                    @endif
                                                </div>
                                                <div class='service-price'>
                                                    @if($test->sale_price != '')
                                                        <span class='old'>&#x9f3;{{ tk($test->price) }} </span>
                                                        <span class='new'>&#x9f3;{{ tk($test->sale_price) }} </span>
                                                    @else
                                                        <span class='new'>&#x9f3;{{ tk($test->price) }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <h5>
                                                <a href="{{ route('test.single.front', array($test->link)) }}">{{ $test->short_name }}</a>
                                            </h5>
                                            <p>
                                                <a href="{{ route('test.single.front', array($test->link)) }}">{{ $test->title }}</a>
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            {{--<div class="pagination">--}}
                            {{--{{$tests->links()}}--}}
                            {{--</div>--}}
                        @endif
                    </div>
                </div>

                <div class="col-md-3">
                    <a href="" class="request-call" data-id="{{1}}">
                        <div class="request_call">
                            Request Call
                        </div>
                    </a>
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
                                            <ul style='text-align: right'>
                                                <li class='remove-from-cart'>
                                                    <div class='remove'
                                                         data-cart-add="{{ route('add.to.cart', array($item->id) ) }}"
                                                         data-cart-remove="{{ route('remove.to.cart', array($item->id) ) }}"
                                                         data-cart-id="{{$item->id}}">
                                                        <a href="{{ route('remove.to.cart', array($item->id) ) }}"
                                                           class="remove-link">
                                                            <span class="glyphicon glyphicon-remove"></span>
                                                        </a>

                                                    </div>
                                                </li>
                                                <li><span class="item-price">{{ tk($item->price) }}</span>
                                                </li>
                                            </ul>
                                        </li>
                                    @endforeach
                                    <li class='subtotal'>
                                        <a href="{{route('clear.cart')}}" class="clear-cart">Clear Cart</a>
                                        <strong class="cart-total">Total-
                                            &#x9f3; {{tk(Cart::getSubTotal())}}</strong>
                                    </li>
                                @endif
                            </ul>
                        </div>
                        <div class="single-widget yourinfo-widget">
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

                                    {{--<p>--}}
                                    {{--<input type="text" name="parsonName" value="{{Auth::user()->name}}"--}}
                                    {{--disabled="disabled">--}}
                                    {{--</p>--}}
                                    {{--<p>--}}
                                    {{--<input type="text" name="ParsonEmail" value="{{Auth::user()->email}}"--}}
                                    {{--disabled="disabled">--}}
                                    {{--</p>--}}
                                    {{--<p>--}}
                                    {{--<input type="text" name="ParsonNumber" value="{{Auth::user()->mobile}}"--}}
                                    {{--disabled="disabled" placeholder="Cell Number">--}}
                                    {{--</p>--}}
                                    {{--<p>--}}
                                    {{--<input type="text" name="ParsonNumberOpt" value="{{Auth::user()->mobile_opt}}"--}}
                                    {{--placeholder="Cell Number Optional">--}}
                                    {{--</p>--}}
                                    {{--<p>--}}
                                    {{--<textarea name="ParsonAddress"--}}
                                    {{--disabled="disabled"--}}
                                    {{--placeholder="Address">{{Auth::user()->address}}</textarea>--}}
                                    {{--</p>--}}
                                    @if(empty(Auth::user()->address) or empty(Auth::user()->mobile))
                                        <p class="submit">
                                            <a href="{{route('user.profile')}}">UPDATE YOUR PROFILE</a>
                                        </p>
                                    @else
                                        <p class="submit">
                                            <input id="reload" type="submit" name="submit" value="Proceed to Checkout">
                                        </p>
                                    @endif
                                    @if(!Auth::check())
                                        <p class="login-link">
                                            <a href="{{ route('login') }}"> already have an account log in</a>
                                        </p>
                                    @endif
                                @else
                                    <h4>Your Information</h4>
                                    <p>
                                        <input type="text" name="parsonName" placeholder="Name">
                                    </p>
                                    <p>
                                        <input type="email" name="ParsonEmail" placeholder="Email">
                                    </p>
                                    <p>
                                        <input type="number" name="ParsonNumber" placeholder="Cell Number">
                                    </p>
                                    {{--<p>--}}
                                    {{--<input type="text" name="ParsonNumberOpt" placeholder="Cell Number Optional">--}}
                                    {{--</p>--}}
                                    <p>
                                        <textarea name="ParsonAddress" placeholder="Your Address"></textarea>
                                    </p>
                                    <p class="submit">
                                        <input type="submit" name="submit" value="Proceed to Checkout">
                                    </p>
                                    @if(!Auth::check())
                                        <p class="login-link">
                                            ALREADY HAVE AN ACCOUNT? <a class='btn btn-primary' href='{{ route('login') }}'
                                                                        id='login-user-login'>log in</a>
                                            {{--<a href="{{ route('login') }}"> already have an account? log in</a>--}}
                                        </p>
                                    @endif
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
            <input type="hidden" name="testId" value=""/>
            <div class="form-group">
                <label>Your cell number:</label>

                <div class="input-group">
                    <input type="text" class="form-control" name="number" value="">
                </div>
                <!-- /.input group -->
            </div>
            <div class="form-group">

                <div class="input-group">
                    <button type="submit" class="btn btn-primary">Request</button>
                    <a href="" class="btn btn-primary Cenal">Cancel</a>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
