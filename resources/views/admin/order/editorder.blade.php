@extends('admin.layouts.master')

@section('title') Dashboard @stop

@section('styles')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('public/admin-assets/plugins/select2/select2.min.css') }}">
    <style>
        .admin-thumb {
            width: 50px;
        }

        .table-bordered > thead > tr > th.table-name {
            background-color: #00a65a;
            color: #ffffff;
            font-size: 35px;
            text-align: center;
        }

        .table-bordered > thead > tr > th,
        .table-bordered > tfoot > tr > th {
            font-size: 16px;
        }
    </style>
@stop

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Orders
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('adminHome') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('orders') }}">Orders</a></li>
            <li class="active">Order Detiels</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <div class="box-body">
            <div class="row">
                <div class="col-md-3">
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
                <div class="col-md-6">
                    <div>
                        <div>
                            <h4 class="heading_s_icon">Test Menu</h4>
                            <p>Click on the Left Side Test group to know more.</p></div>
                        <div class="servic-post-wapper" style="overflow:auto; max-height: 182vh;">
                            @if($tests)
                                <div class="services">
                                    <table class="table table-bordered testmenu">
                                        <thead>
                                        <tr>
                                            <td>Sl No.</td>
                                            <td>Test Code</td>
                                            <td>Test Name</td>
                                            <td>Add to Card</td>
                                        </tr>
                                        </thead>
                                        <tbody id="test_body">
                                        @foreach($tests as $i => $test)
                                            <tr id="{{($test->id).'test_body'}}" class='testmenu-table-row'>
                                                <td>{{$i+1}}</td>
                                                <td>{{$test->short_name}}</td>
                                                <td>{{ $test->title }}</td>
                                                <td>
                                                    <div class="hover2"
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
                                                <li><span class="item-price">{{ ($item->price) }}</span>
                                                </li>
                                            </ul>
                                        </li>
                                    @endforeach
                                    <li class='subtotal'>
                                        <a href="{{route('clear.cart')}}" class="clear-cart">Clear Cart</a>
                                        <strong class="cart-total">Total-
                                            &#x9f3; {{(Cart::getSubTotal())}}</strong>
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
        <div id="divLoading">
        </div>
    </section>
@stop
@section('scripts')
    <script>
        $(document).ready(function () {
            $("form.ajax-cat-test2 li").on('click', function (event) {
                event.preventDefault();
                $("div#divLoading").addClass('show');
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







            $(".add-cart2").on('click', function (event) {
                event.preventDefault();
                $("div#divLoading").addClass('show');
                var paren = $(this).parents(".hover2"),
                    addURL = $(this).parents(".hover2").data("cart-add"),
                    removeURL = $(this).parents(".hover2").data("cart-remove");
//                $.ajax({
//                    url: addURL, //this is your uri
//                    type: 'GET', //this is your method
//                    dataType: 'json',
//                    success: function (response) {
//                        $(".single-widget.cart-widget").find("ul.item-list").html(response.data);
//                        paren.find('.add-cart2').remove();
//                        paren.append("<a class='remove-cart2' href='" + removeURL + "'><span class='glyphicon glyphicon-check'></span></a>");
//                        $("div#divLoading").removeClass('show');
//                        $("#msg-cart-succ").append("<div id='temp-msg' class='alert-success'>Your test is successfully added.</div>");
//                        setTimeout(function () {
//                            $('#temp-msg').remove();
//                        }, 3000);
//                    }
//                });
            });

            $(".add-health-cart").on('click', function (event) {
                event.preventDefault();
                var paren = $(this).parents(".title"),
                    addURL = $(this).parents(".title").data("cart-add-health"),
                    removeURL = $(this).parents(".title").data("cart-remove-health"),
                    content = $(this).parents(".title").data("cart-content-health");
                var targeted_popup_class = jQuery(this).attr('data-popup-open');
                var addToCart = "<a class='btn btn-primary' href='" + addURL + "' id='popup-button-add'>Add To Cart</a>";
                $("#body-popup-hs").html(addToCart + content);
                //$("#body-popup-hs").html(content);
                $('[data-popup="' + targeted_popup_class + '"]').fadeIn(350);
            });

            $("#popup-button-add").on('click', function (event) {
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
            $(".remove-cart2").on('click', function (event) {
                event.preventDefault();
                $("div#divLoading").addClass('show');
                var paren = $(this).parents(".hover2"),
                    addURL = $(this).parents(".hover2").data("cart-add"),
                    removeURL = $(this).parents(".hover2").data("cart-remove");
//                $.ajax({
//                    url: removeURL, //this is your uri
//                    type: 'GET', //this is your method
//                    dataType: 'json',
//                    success: function (response) {
//                        $("div#divLoading").removeClass('show');
//                        if (response.datastatus) {
//                            $(".single-widget.cart-widget").find("ul.item-list").html(response.data);
//                            paren.find('.remove-cart2').remove();
//                            paren.append("<a class='add-cart2' href='" + addURL + "'><span class='glyphicon glyphicon-shopping-cart'></span></a>");
//                            $("#msg-cart-succ").append("<div id='temp-msg' class='alert-danger'>Your test is successfully removed.</div>");
//                            setTimeout(function () {
//                                $('#temp-msg').remove();
//                            }, 3000);
//                        } else {
//                            location.reload(true);
//                        }
//                    }
//                });
            });



            $(".remove-link-2").live('click', function (event) {
                event.preventDefault();
                $("div#divLoading").addClass('show');
                var paren = $(this).parents(".remove2"),
                    removeURL = paren.data("cart-remove"),
                    addURL = paren.data("cart-add"),
                    id = paren.data("cart-id");

//                $.ajax({
//                    url: removeURL, //this is your uri
//                    type: 'GET', //this is your method
//                    dataType: 'json',
//                    success: function (response) {
//                        $("div#divLoading").removeClass('show');
//                        if (response.datastatus) {
//                            $(".single-widget.cart-widget").find("ul.item-list").html(response.data);
//                            $("#" + id + 'test_body').find(".hover2").append("<a class='add-cart2' href='" + addURL + "'><span class='glyphicon glyphicon-shopping-cart'></span></a>");
//                            $('#' + id + 'test_body').find('.remove-cart2').remove();
//                            $("#msg-cart-succ").append("<div id='temp-msg' class='alert-danger'>Your test is successfully removed.</div>");
//                            setTimeout(function () {
//                                $('#temp-msg').remove();
//                            }, 3000);
//                        } else {
//                            location.reload(true);
//                        }
//                    }
//                });
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
@stop