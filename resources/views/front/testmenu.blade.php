@extends('front.layouts.master1')
@section('metas')
    <meta name="description"
          content="Dyntat - a reputed pathology lab and diagnostic centre offers preventive health check up packages at affordable costs.">
@stop
@section('title') Test Menu -Dyntat Bangladesh Limited | Accredited | Networked | Barcoded @stop
@section('pagetitle') Test Menu @stop
@section('pagetitle2')
    <a href="{{route('test.all.front')}}">Services</a><span class="glyphicon glyphicon-menu-right"></span>Test Menu
@stop
@section('content')
    <section class="service-postsec">
        <div class="container">
            <blockquote class="report-msg">
                As a clinical testing laboratory with a vision to provide quality diagnostic services at affordable
                rates,
                our test menu is a carefully crafted list of niche investigations catering as much to sick care as well
                as
                to preventive care customers. Our tests covers varied age groups from offerings for prenatal screening
                to
                age related diseases, screening for hormonal imbalance, nutritional deficiencies and tracking lifestyle
                disorders. Browse through the list to know more.
            </blockquote>
        </div>
    </section>
    <section class="msg-cart">
        <div class="container" id="msg-cart-succ">
        </div>
    </section>
    <section class="service-postsec" style="padding-top: 0px">
        <div class="container">
            <div class="row">
                <div class="col-md-3" id="res">
                    <aside class="left-sidebar">
                        <div class="single-widget services-list">
                            {!! Form::open(['route' => 'cat.tests2', 'class' => 'ajax-cat-test2']) !!}
                            <h4 class="heading_s_icon">Tests:</h4>
                            <ul id="category" class="category">
                                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                <li id="-1" class="testmenu-category-list"><a href=""> All</a></li>
                                @if($catAll)
                                    @foreach($catAll as $cat)
                                        <li id="{{ $cat->id}}" class="testmenu-category-list">
                                            <a href=""> {{ $cat->name}}</a>
                                        </li>
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
                                    <div class="title test-menu-hs"
                                         data-cart-add-health="{{ route('add.healthto.cart', array($health->id)) }}"
                                         data-cart-content-health="{{$health->content}}"
                                         data-cart-remove-health="{{ route('add.healthto.cart', array($health->id)) }}">
                                        <a class="add-health-cart" data-popup-open="popup-1"
                                           href="">
                                            {{$health->title}}
                                        </a>

                                    </div>
                                @endforeach
                            </div>
                        </aside>
                    </div>
                </div>

                <div class="col-md-6 testmenu_list">
                    <div>
                        <div>
                            <h4 class="heading_s_icon">Test Menu</h4>
                            <p>Click on the Left Side Test group to know more.</p></div>
                        <div class="servic-post-wapper">
                            @if($tests)

                                <div class="services test_list">

                                    <table class="table testmenu test_fixed_headers">
                                        <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Test Name</th>
                                            <th>Net Payment</th>
                                            <th>Add to Cart</th>

                                        </tr>
                                        </thead>

                                        <tbody id="test_body">
                                        @foreach($tests as $i => $test)
                                            <tr id="{{($test->id).'test_body'}}" class='testmenu-table-row'>
                                                <td>{{$test->sl_no}}</td>
                                                <td>{{ $test->title }}</td>
                                                <td>{{ tk($test->price) }}</td>

                                                <td>
                                                    <div class="hover2"
                                                         data-title="{{$test->title}}"
                                                         data-cart-add="{{ route('add.to.cart2', array($test->id) ) }}"
                                                         data-cart-remove="{{ route('remove.to.cart2', array($test->id) ) }}"
                                                         style='text-align: center;'>

                                                        @if(!in_array((int)$test->id,$selected_id))

                                                            @if(Cart::get($test->id) === null)
                                                                <a href="{{ route('add.to.cart2', array($test->id) ) }}"
                                                                   class="add-cart2">
                                                                    <span class="glyphicon glyphicon-shopping-cart"></span></a>
                                                            @else
                                                                <a href="{{ route('remove.to.cart2', array($test->id) ) }}"
                                                                   class="remove-cart2"><span
                                                                            class="glyphicon glyphicon-check"></span></a>
                                                            @endif
                                                        @else
                                                            <a class="remove-cart2"><span
                                                                        class="glyphicon glyphicon-check"></span></a>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <p class="test_note">* Tests will be performed by dyntat India lab</p>

                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <aside class="right-sidebar">
                        <div class="single-widget cart-widget">
                            <h4>Your Cart</h4>
                            <ul class="item-list">
                                @if(!Cart::isEmpty() && $cartCollection = Cart::getContent())
                                    @foreach($cartCollection as $item)
                                        <li>
                                            <div class="item-desc">
                                                <strong>{{ $item->name }}</strong>
                                            </div>
                                            <ul class='cart_price'>
                                                <li class='remove-from-cart'>

                                                    <span class="item-price">Tk {{ tk($item->price) }}</span>

                                                    <div class='remove2'
                                                         data-title-2="{{ $item->name }}"
                                                         data-cart-add="{{ route('add.to.cart2', array($item->id) ) }}"
                                                         data-cart-remove="{{ route('remove.to.cart2', array($item->id) ) }}"
                                                         data-cart-id="{{$item->id}}">
                                                        <a href="{{ route('remove.to.cart2', array($item->id) ) }}"
                                                           class="remove-link-2">
                                                            <span class="glyphicon glyphicon-trash"></span>
                                                        </a>

                                                    </div>
                                                </li>

                                            </ul>
                                        </li>
                                    @endforeach
                                    <li class='subtotal'>
                                        <a href="{{route('clear.cart2')}}" class="clear-cart">Clear Cart</a>
                                        <strong class="cart-total">Total-
                                            {{tk(Cart::getSubTotal()) . " Tk"}}</strong>
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
                                            Already have an account? <a class='btn btn-primary'
                                                                        href='{{ route('login') }}'
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
        <div class="popup" data-popup="popup-1">
            <div class="popup-inner">
                <div id="body-popup-hs"></div>

                <p><a data-popup-close="popup-1" href="#">Close</a></p>
                <a class="popup-close" data-popup-close="popup-1" href="#">x</a>
            </div>
        </div>
    </section>

@endsection
@section('scripts')
    <script src="{{asset('public/assets/js/notify.js')}}"></script>
    <script>
        $(document).ready(function () {

            $(".add-cart2").live('click', function (event) {
                event.preventDefault();
                $("div#divLoading").addClass('show');
                var paren = $(this).parents(".hover2"),
                    addURL = $(this).parents(".hover2").data("cart-add"),
                    removeURL = $(this).parents(".hover2").data("cart-remove"),
                    title = $(this).parents(".hover2").data("title");


                $.ajax({
                    url: addURL, //this is your uri
                    type: 'GET', //this is your method
                    dataType: 'json',
                    success: function (response) {
                        $(".single-widget.cart-widget").find("ul.item-list").html(response.data);
                        paren.find('.add-cart2').remove();
                        paren.append("<a class='remove-cart2' href='" + removeURL + "'><span class='glyphicon glyphicon-check'></span></a>");
                        $("div#divLoading").removeClass('show');

                        // $(".bottom-right-notifiction").notify(
                        //     title + " added successfully",
                        //     {position: "top left", className: 'success'}
                        // );
                        $.notify(
                            title + " added successfully",
                            {position: "bottom left", className: 'success'}
                        );


                        // $(".cart-widget").notify("Hello Box");

                        // $("#msg-cart-succ").append("<div id='temp-msg' class='alert-success'>Your test is successfully added.</div>");
                        // setTimeout(function () {
                        //     $('#temp-msg').remove();
                        // }, 3000);
                    }
                });
            });


            $(".add-health-cart").live('click', function (event) {
                event.preventDefault();
                var paren = $(this).parents(".title"),
                    addURL = $(this).parents(".title").data("cart-add-health"),
                    removeURL = $(this).parents(".title").data("cart-remove-health"),
                    content = $(this).parents(".title").data("cart-content-health");
                var targeted_popup_class = jQuery(this).attr('data-popup-open');
                var addToCart = "<a class='btn btn-primary' href='" + addURL + "' id='popup-button-add'>Add To Cart</a>";
                $("#body-popup-hs").html(addToCart + content + addToCart);
                //$("#body-popup-hs").html(content);
                $('[data-popup="' + targeted_popup_class + '"]').fadeIn(350);
            });

            $("#popup-button-add").live('click', function (event) {
                event.preventDefault();
                $("div#divLoading").addClass('show');
                var link = $(this).attr("href");
                $.ajax({
                    url: link, //this is your uri
                    type: 'GET', //this is your method
                    dataType: 'json',
                    success: function (response) {
                        if (response.datastatus == true) {
                            $(".single-widget.cart-widget").find("ul.item-list").html(response.data);
                        }
                        //paren.find('.add-cart2').remove();
                        //paren.append("<a class='remove-cart2' href='" + removeURL + "'><span class='glyphicon glyphicon-check'></span></a>");
                        $("div#divLoading").removeClass('show');
                        $("#msg-cart-succ").append("<div id='temp-msg' class='alert-success'>Your package is successfully added.</div>");
                        setTimeout(function () {
                            $('#temp-msg').remove();
                        }, 3000);
                        $(".popup").fadeOut(350);
                    }
                });
            });
            $(".remove-cart2").live('click', function (event) {
                event.preventDefault();
                $("div#divLoading").addClass('show');
                var paren = $(this).parents(".hover2"),
                    addURL = $(this).parents(".hover2").data("cart-add"),
                    removeURL = $(this).parents(".hover2").data("cart-remove"),
                    title = $(this).parents(".hover2").data("title");
                $.ajax({
                    url: removeURL, //this is your uri
                    type: 'GET', //this is your method
                    dataType: 'json',
                    success: function (response) {
                        $("div#divLoading").removeClass('show');
                        if (response.datastatus) {
                            $(".single-widget.cart-widget").find("ul.item-list").html(response.data);
                            paren.find('.remove-cart2').remove();
                            paren.append("<a class='add-cart2' href='" + addURL + "'><span class='glyphicon glyphicon-shopping-cart'></span></a>");

                            $.notify(
                                title + " removed successfully",
                                {position: "bottom left", className: 'error'}
                            );
                        } else {
                            location.reload(true);
                        }
                    }
                });
            });

            $("form.ajax-cat-test2 li").on('click', function (event) {
                $("div#divLoading").addClass('show');
                event.preventDefault();
                var id = $(this).attr('id');
                var paren = $(this).parents("form.ajax-cat-test2"),
                    url = paren.attr('action');
                $.ajax({
                    url: url, //this is your uri
                    type: 'POST', //this is your method
                    data: {
                        "_token": $('#token').val(),
                        id: id
                    },
                    dataType: 'json',
                    success: function (response) {
                        $("div#divLoading").removeClass('show');
                        $(".servic-post-wapper").find("#test_body").html(response.data);
                        $(".single-widget.cart-widget").find("ul.item-list").html(response.cart);
                        $(".servic-post-wapper").find(".pagination").remove();
                        $(".servic-post-wapper").append(response.paginat);
                    }
                });
            });

            $(".remove-link-2").live('click', function (event) {
                event.preventDefault();
                $("div#divLoading").addClass('show');
                var paren = $(this).parents(".remove2"),
                    removeURL = paren.data("cart-remove"),
                    addURL = paren.data("cart-add"),
                    title = paren.data("title-2"),
                    id = paren.data("cart-id");
                $.ajax({
                    url: removeURL, //this is your uri
                    type: 'GET', //this is your method
                    dataType: 'json',
                    success: function (response) {
                        $("div#divLoading").removeClass('show');
                        if (response.datastatus) {
                            $(".single-widget.cart-widget").find("ul.item-list").html(response.data);
                            $("#" + id + 'test_body').find(".hover2").append("<a class='add-cart2' href='" + addURL + "'><span class='glyphicon glyphicon-shopping-cart'></span></a>");

                            $('#' + id + 'test_body').find('.remove-cart2').remove();

                            $.notify(
                                title + " removed successfully",
                                {position: "bottom left", className: 'error'}
                            );
                        } else {
                            location.reload(true);
                        }
                    }
                });
            });
        });

        $(function () {
//            //----- OPEN
//            $('[data-popup-open]').on('click', function(e)  {
//                var targeted_popup_class = jQuery(this).attr('data-popup-open');
//                $('[data-popup="' + targeted_popup_class + '"]').fadeIn(350);
//
//                e.preventDefault();
//            });
            //----- CLOSE
            $('[data-popup-close]').on('click', function (e) {
                var targeted_popup_class = jQuery(this).attr('data-popup-close');
                $('[data-popup="' + targeted_popup_class + '"]').fadeOut(350);
                e.preventDefault();
            });
        });

        //        $(".add-health-cart").live('click', function (event) {
        //            event.preventDefault();
        //            $("div#divLoading").addClass('show');
        //            var paren = $(this).parents(".title"),
        //                addURL = $(this).parents(".title").data("cart-add-health"),
        //                removeURL = $(this).parents(".title").data("cart-remove-health");
        //            $.ajax({
        //                url: addURL, //this is your uri
        //                type: 'GET', //this is your method
        //                dataType: 'json',
        //                success: function (response) {
        //                    if (response.datastatus == true) {
        //                        $(".single-widget.cart-widget").find("ul.item-list").html(response.data);
        //                    }
        //                    //paren.find('.add-cart2').remove();
        //                    //paren.append("<a class='remove-cart2' href='" + removeURL + "'><span class='glyphicon glyphicon-check'></span></a>");
        //                    $("div#divLoading").removeClass('show');
        //                }
        //            });
        //        });
        //
    </script>
@endsection