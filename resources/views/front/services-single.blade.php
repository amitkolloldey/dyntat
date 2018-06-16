@extends('front.layouts.master')
@section('pagetitle2')
    <a href="{{route('test.all.front')}}">Services</a><span class="glyphicon glyphicon-menu-right"></span><a
            href="{{route('test.all.front')}}">Book Test Now</a><span
            class="glyphicon glyphicon-menu-right"></span>Test Details
@stop
@section('content')

    <section class="service-postsec">
        <div class="container">
            <div class="row">
                <div class="col-md-3" id="res">
                    <aside class="left-sidebar">
                        <div class="single-widget services-list sub-menu">
                            <h4>Test</h4>
                            <ul>
                                <li><a href="{{ route('testmenu') }}">Test Menu</a></li>
                                <li><a href="{{ route('disorders.front') }}">Disorders</a></li>
                                <li><a href="{{ route('reportTrack.front') }}">Report Track</a></li>
                                <li><a href="{{ route('bothlocation.front') }}">Booth Location</a></li>
                                <li><a href="{{ route('ServiceProvider.front') }}">Nearest Service Provider</a></li>
                            </ul>
                        </div>
                        <div class="single-widget services-list hidden">
                            <h4>Diagnostic Services</h4>
                            <ul>
                                @if($catAll)
                                    @foreach($catAll as $cat)
                                        <li> {{ $cat->name}}</li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </aside>
                </div>

                <div class="col-md-6">

                    @if($tests)
                        @foreach($tests as $test)
                    @section('title') {{ $test->title }} -Dyntat Bangladesh Limited @stop
                    @section('pagetitle') Test Details @stop
                    @section('metas')
                        <meta name="description" content="{{$test->meta_description}}"/>
                    @stop
                    <div class="servic-post-wapper single-page-service">
                        <div class="services">
                            <div class="single-service">
                                <div class="fature-image">
                                    @if($testImg = json_decode($test->picture))
                                        <img src="{{ adminUrl($testImg->large) }}" alt="{{ $test->title }}"/>
                                        <div class='service-price-1'>
                                            @if($test->sale_price != '')
                                                <span class='old'>&#x9f3;{{ tk($test->price) }} </span>
                                                <span class='new'>&#x9f3;{{ tk($test->sale_price) }} </span>
                                            @else
                                                <span class='new'>&#x9f3;{{ tk($test->price) }}</span>
                                            @endif
                                        </div>

                                    @endif
                                </div>
                                <div class="cart-request-btn">
                                    <div class="hover4"
                                         data-cart-add4="{{ route('add.to.cart4', array($test->id) ) }}"
                                         data-cart-remove4="{{ route('remove.to.cart4', array($test->id) ) }}">
                                        <a href="" class="request-call" data-id="{{$test->id}}">Request Call</a>
                                        @if(Cart::get($test->id) === null)
                                            <a href="{{ route('add.to.cart4', array($test->id) ) }}" class="add-cart4"
                                               data-palash="{{ route('clear.cart') }}">Add to Cart</a>
                                        @else
                                            <a href="{{ route('remove.to.cart4', array($test->id) ) }}"
                                               class="remove-cart4">Remove from Cart</a>
                                        @endif
                                    </div>
                                </div>
                                <div style="margin-top: 20px;"><h2 class="title">{{ $test->short_name }}</h2></div>
                                <div><h3 class="title">{{ $test->title }}</h3></div>
                                <div class="services-content"> {!! $test->content !!} </div>
                                <div class="related-tests">
                                    <h3 class="text-center">Others Tests</h3>
                                    <ul>
                                        @foreach ($test->categories as $cats)
                                            @foreach ($cats->tests as $cattest)
                                                <li>
                                                    @if($cattestImg = json_decode($cattest->picture))
                                                        <img src="{{ adminUrl($cattestImg->thumb) }}" alt="map"/>
                                                    @endif
                                                    <strong>{{ $cattest->short_name }}</strong>
                                                    <span>{{ $cattest->title }}</span>
                                                </li>
                                            @endforeach
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
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
                                            <ul style='text-align: right'>
                                                <li class='remove-from-cart'>
                                                    <div class='remove4'
                                                         data-cart-add4="{{ route('add.to.cart4', array($item->id) ) }}"
                                                         data-cart-remove4="{{ route('remove.to.cart4', array($item->id) ) }}"
                                                         data-cart-id4="{{$item->id}}">
                                                        <a class="remove-link4" href="{{ route('remove.to.cart4', array($item->id) ) }}" >
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
                                        <input type="text" name="parsonName" value="{{Auth::user()->name}}"
                                               disabled="disabled">
                                    </p>
                                    <p>
                                        <input type="text" name="ParsonEmail" value="{{Auth::user()->email}}"
                                               disabled="disabled">
                                    </p>
                                    <p>
                                        <input type="text" name="ParsonNumber" value="{{Auth::user()->mobile}}"
                                               disabled="disabled" placeholder="Cell Number">
                                    </p>
                                    {{--<p>--}}
                                    {{--<input type="text" name="ParsonNumberOpt" value="{{Auth::user()->mobile_opt}}"--}}
                                    {{--placeholder="Cell Number Optional">--}}
                                    {{--</p>--}}
                                    <p>
                                        <textarea name="ParsonAddress"
                                                  disabled="disabled"
                                                  placeholder="Address">{{Auth::user()->address}}</textarea>
                                    </p>
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
                                    <p>
                                        <input type="text" name="parsonName" placeholder="Name">
                                    </p>
                                    <p>
                                        <input type="text" name="ParsonEmail" placeholder="Email">
                                    </p>
                                    <p>
                                        <input type="text" name="ParsonNumber" placeholder="Cell Number">
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
                                            <a href="{{ route('login') }}"> already have an account log in</a>
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
                <label>Your number:</label>

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
@section('scripts')
    <script>
        //add to cart done
        $(".add-cart4").live('click', function (event) {
            event.preventDefault();
            $("div#divLoading").addClass('show');
            var paren = $(this).parents(".hover4"),
                addURL = $(this).parents(".hover4").data("cart-add4"),
                removeURL = $(this).parents(".hover4").data("cart-remove4");
            $.ajax({
                url: addURL, //this is your uri
                type: 'GET', //this is your method
                dataType: 'json',
                success: function (response) {
                    $("div#divLoading").removeClass('show');
                    if (response.datastatus) {
                        $(".single-widget.cart-widget").find("ul.item-list").html(response.data);
                        paren.find('.add-cart4').remove();
                        paren.append("<a class='remove-cart4' href='" + removeURL + "'><span class='remove-from-cart-text'>Remove from Cart</span><span class='glyphicon glyphicon-check'></span></a>");
                    } else {
                        location.reload(true);
                    }
                }
            });
        });
        //remove from cart done
        $(".remove-cart4").live('click', function (event) {
            event.preventDefault();
            $("div#divLoading").addClass('show');
            var paren = $(this).parents(".hover4"),
                addURL = $(this).parents(".hover4").data("cart-add4"),
                removeURL = $(this).parents(".hover4").data("cart-remove4");
            $.ajax({
                url: removeURL, //this is your uri
                type: 'GET', //this is your method
                dataType: 'json',
                success: function (response) {
                    $("div#divLoading").removeClass('show');
                    if (response.datastatus) {
                        $(".single-widget.cart-widget").find("ul.item-list").html(response.data);
                        paren.find('.remove-cart4').remove();
                        paren.append("<a class='add-cart4' href='" + addURL + "'><span class='add-to-cart-text'>Add to Cart</span><span class='glyphicon glyphicon-shopping-cart'></span></a>");
                    } else {
                        location.reload(true);
                    }
                }
            });
        });


        $(".remove-link4").live('click', function (event) {
            event.preventDefault();

            $("div#divLoading").addClass('show');
            var paren = $(this).parents(".remove4"),
                removeURL = $(this).parents(".remove4").data("cart-remove4"),
                addURL = $(this).parents(".hover4").data("cart-add4"),
                id = $(this).parents(".remove4").data("cart-id4");
            $.ajax({
                url: removeURL, //this is your uri
                type: 'GET', //this is your method
                dataType: 'json',
                success: function (response) {
                    $("div#divLoading").removeClass('show');
                    if (response.datastatus) {
                        $(".single-widget.cart-widget").find("ul.item-list").html(response.data);
                        $(".hover4").find('.remove-cart4').remove();
                        $(".hover4").append("<a class='add-cart4' href='" + addURL + "'><span class='add-to-cart-text'>Add to Cart</span><span class='glyphicon glyphicon-shopping-cart'></span></a>");

                    } else {
                        location.reload(true);
                    }
                }
            });
        });
    </script>
@endsection