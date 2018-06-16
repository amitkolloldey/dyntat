@extends('front.layouts.master')

@section('pagetitle2')
    <a href="{{route('others.all.front')}}">Other Screening</a><span
            class="glyphicon glyphicon-menu-right"></span>Other Screen Details
@stop
@section('content')

    <section class="service-postsec">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    @if($HealthScreens)
                        @foreach($HealthScreens as $HealthScreen)
                    @section('title') {{$HealthScreen->title}} -Dyntat Bangladesh Limited @stop
                    @section('pagetitle') Other Screen Details @stop
                    @section('metas')
                        <meta name="description" content="{{$HealthScreen->meta_description}}"/>
                    @stop
                    <div class="servic-post-wapper single-page-service">
                        <div class="services">
                            <div class="single-service">
                                <h2 class="title">{{ $HealthScreen->title }}</h2>
                                <div class="health-heading">
                                    <div class="health fature-image">
                                        <img src="{{ adminUrl($HealthScreen->thumb) }}"
                                             alt="{{ $HealthScreen->title }}"/>
                                    </div>
                                    <div class="cart-btn-wrapper">
                                        <div class="title2"
                                             data-cart-add-health2="{{ route('add.healthto.cart', array($HealthScreen->id)) }}"
                                             data-cart-remove-health2="{{ route('add.healthto.cart', array($HealthScreen->id)) }}">
                                            <a class="add-health-cart2" href="">Add To Cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="services-content" id="print"> {!! $HealthScreen->content !!} </div>
                                <button class="btn btn-primary hidden-print" type="submit" onClick="printDiv('print')">
                                    <span class="glyphicon glyphicon-print" aria-hidden="true"></span> PRINT THIS COUPON
                                </button>
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
                                        <a href="{{route('clear.cart2')}}" class="clear-cart">Clear Cart</a>
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

@endsection
@section('scripts')
    <script>

        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }

        $(".add-health-cart2").live('click', function (event) {
            event.preventDefault();
            $("div#divLoading").addClass('show');
            var paren = $(this).parents(".title2"),
                addURL = $(this).parents(".title2").data("cart-add-health2"),
                removeURL = $(this).parents(".title2").data("cart-remove-health2");
            $.ajax({
                url: addURL, //this is your uri
                type: 'GET', //this is your method
                dataType: 'json',
                success: function (response) {
                    if (response.datastatus == true) {
                        $(".single-widget.cart-widget").find("ul.item-list").html(response.data);
                    }
                    //paren.find('.add-cart2').remove();
                    //paren.append("<a class='remove-cart2' href='" + removeURL + "'><span class='glyphicon glyphicon-check'></span></a>");
                    $("div#divLoading").removeClass('show');
                }
            });
        });
    </script>
@endsection