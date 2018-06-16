@extends('front.layouts.master')
@section('metas')
    <meta name="description" content="A page's description, usually one or two sentences."/>
@stop
@section('title') Checkout -Dyntat Bangladesh Limited | Accredited | Networked | Barcoded @stop
@section('pagetitle') Checkout @stop
@section('pagetitle2') Checkout @stop
@section('content')

    <?php
    $discountPrice = 0;
    $id_discount = -11;

    $homeService = Session::get('homeService', function () {
        return 0;
    });
    $discountData = Session::get('discount', function () {
        return null;
    });
    if (!is_null($discountData)) {
        $discountPrice = $discountData['discountPrice'];
        $id_discount = $discountData['id'];
    }

    $payableAmount = ceil(Cart::getSubTotal() + $homeService - $discountPrice);
    ?>
    <section class="service-postsec">
        <div class="container">
            <div class="row">
                {{--{{Session::getId()}}--}}
                <div class="col-lg-4">
                    <div class="col-lg-12">
                        <div class="checkout-index">
                            <h3 class="c-head">Collection Process</h3>
                        </div>
                        <div class="c-box">
                            <div class="home-service-parent"
                                 id="home-service-parent"
                                 data-cart-add-home-service="{{ route('add.to.cart.home.service')}}"
                                 data-cart-remove-home-service="{{ route('remove.to.cart.home.service')}}">
                                <p> Select Method</p>
                                <div class="checkout_shipping">

                                    <input type="radio" name="home-service-apply-0" id="home-service-apply-0"
                                           value="0" class="home-service-apply-0"
                                    <?php if (!is_null(Session::has('homeService')) && Session::get('homeService') > 0) {
                                        echo 'checked';
                                    }?>
                                    > <span>Home Collection & Report Delivery</span>
                                    {{-- Tk. @if(!empty($deliverycharge)){{$deliverycharge->deliverycharge}}@endif--}}
                                </div>
                                <div class="checkout_shipping">

                                    <input type="radio" name="home-service-apply-1" id="home-service-apply-1"
                                           value="1" class="home-service-apply-1">
                                    <span>I'll Come Dyntat Office</span>
                                </div>


                                {{--<input type="checkbox" id="home_service" class="home_service"--}}
                                {{--> Home Service--}}
                                {{--<span title="Home Service" class="glyphicon glyphicon-info-sign"></span>--}}
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-12 tests-marz-top">
                        <div class="checkout-user-info checkout-index">
                            <h3 class="c-head alignleft">User Information</h3>
                        </div>
                        <div class="c-box">
                            <div>
                                <div>
                                    <h6>Name:</h6>
                                </div>
                                <div>
                                    {{$userInfo['parsonName']}}
                                    {{--<input class="c-input" type="text" value="{{$userInfo['parsonName']}}" readonly>--}}

                                </div>
                            </div>
                            <div class="">
                                <div class="">
                                    <h6>Email:</h6>
                                </div>
                                <div class="">
                                    {{$userInfo['ParsonEmail']}}
                                    {{--<input class="c-input" type="text" value="{{$userInfo['ParsonEmail']}}" readonly>--}}

                                </div>
                            </div>
                            <div class="">
                                <div class="">
                                    <h6>Phone</h6>
                                </div>
                                <div class="">
                                    {{$userInfo['ParsonNumber']}}
                                    {{--<input class="c-input" type="text" value="{{$userInfo['ParsonNumber']}}" readonly>--}}

                                </div>
                            </div>
                            <div class="">
                                <div class="">
                                    <h6>Address:</h6>
                                </div>
                                <div class="">
                                    {{$userInfo['ParsonAddress']}}
                                    {{--<textarea class="c-input" readonly>{{$userInfo['ParsonAddress']}}</textarea>--}}

                                </div>
                            </div>
                        </div>
                        <div class="checkout_margin">
                            <input type="checkbox" id="shipping_address"
                                   class="shipping_address"> <span
                                    class="color">Sample collection from different location</span>
                        </div>
                        <div id="shipping_address_des">
                            <form id="shipping_form" method="post" action="">
                                <div class="checkout-user-info checkout-index">
                                    <h3 class="c-head">Home Collection Information</h3>
                                </div>
                                <div class="c-box">
                                    <input type="hidden" id="token" name="_token" value="{{csrf_token()}}">
                                    <div>
                                        <div>
                                            <h6>Name:</h6>
                                        </div>
                                        <div>
                                            <input name="s_name" class="c-input" type="text" value="">
                                        </div>
                                    </div>

                                    <div class="">
                                        <div class="">
                                            <h6>Phone</h6>
                                        </div>
                                        <div class="">
                                            <input name="s_mobile" class="c-input" type="text" value="">
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="">
                                            <h6>Address:</h6>
                                        </div>
                                        <div class="">
                                            <textarea name="s_address" class="c-input"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-content">
                                <div class="product-table-warp checkout-index">
                                    <h3 class="c-head alignleft">Order Review</h3>
                                </div>
                                <div class="c-box">
                                    <table class="table table-bordered cart_summary">
                                        <thead>
                                        <tr>
                                            {{--<th class="test_thumb">Image</th>--}}
                                            <th class="test_name">Test Name</th>
                                            {{--<th class="test_shortName">Short Code</th>--}}
                                            <th class="test_quantity">Quantity</th>
                                            <th class="test_price" style="text-align: right;">Price</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(!Cart::isEmpty() && $cartCollection = Cart::getContent())
                                            @foreach($cartCollection as $item)
                                                <tr>
                                                    {{--<td class="test_thumb">--}}
                                                    {{--<img src="{{ $item->attributes['imgPath'] }}" alt="">--}}
                                                    {{--</td>--}}
                                                    <td class="test_name">
                                                        {{ $item->name }}
                                                    </td>
                                                    {{--@if(isset($item->attributes['short_name']))--}}
                                                        {{--<td class="test_shortName">{{ $item->attributes['short_name'] }}</td>--}}
                                                    {{--@else--}}
                                                        {{--<td class="test_shortName">NO</td>--}}
                                                    {{--@endif--}}
                                                    <td class="test_quantity">{{ $item->quantity }}</td>
                                                    <td class="test_price">{{ tk($item->price)." Tk" }}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                        <tfoot id="tfoot">
                                        <tr>
                                            <td class="alignleft" colspan="1">Total</td>
                                            <td class="test_quantity">{{Cart::getTotalQuantity()}}</td>
                                            <td> {{tk(Cart::getSubTotal())." Tk"}}</td>

                                        </tr>
                                        {{--<tr>
                                            <td colspan="3">Total</td>
                                            <td>&#x9f3; {{tk(Cart::getSubTotal())}}</td>
                                        </tr>--}}
                                        </tfoot>
                                    </table>
                                    <table class='table table-bordered cart_summary'>
                                        <tfoot id='calculation'>
                                        @if($discountPrice>0)
                                            <tr>
                                                <td class="alignleft" colspan='3'>Discount Amount</td>
                                                <td>{{tk($discountPrice)." Tk"}}</td>
                                            </tr>

                                        <tr>
                                            <td class="alignleft" colspan='3'>Sub Total</td>
                                            <td> {{tk(Cart::getSubTotal()-$discountPrice)." Tk"}}</td>
                                        </tr>
                                        @endif
                                        @if(!is_null(Session::has('homeService')) && ($homeService = Session::get('homeService')) > 0)
                                            <tr>
                                                <td class="alignleft" colspan='3'>Home Collection & Report Delivery Fee
                                                </td>
                                                <td>{{tk($homeService)." Tk"}}</td>
                                            </tr>
                                        @endif
                                        <tr>
                                            <td class="alignleft" colspan='3'>Payable Amount</td>
                                            <td>
                                                {{tk($payableAmount)." Tk"}}</td>
                                                {{--&#x9f3; {{tk($payableAmount)}}</td>--}}
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row  tests-marz-top">
                    <!-- <div class="col-lg-6">
                            <div class="checkout-index">
                                <h3 class="c-head alignleft">Collection Process</h3>
                            </div>
                            <div class="c-box">
                                <div class="home-service-parent"
                                     id="home-service-parent"
                                     data-cart-add-home-service="{{ route('add.to.cart.home.service')}}"
                                     data-cart-remove-home-service="{{ route('remove.to.cart.home.service')}}">
                                    <p> Select Method</p>
                                    <div class="checkout_shipping">

                                        <input type="radio" name="home-service-apply-0" id="home-service-apply-0"
                                               value="0" class="home-service-apply-0"
                                        <?php if (!is_null(Session::has('homeService')) && Session::get('homeService') > 0) {
                        echo 'checked';
                    }?>
                            > <span>Home Collection & Report Delivery</span>
{{-- Tk. @if(!empty($deliverycharge)){{$deliverycharge->deliverycharge}}@endif--}}
                            </div>
                            <div class="checkout_shipping">

                                <input type="radio" name="home-service-apply-1" id="home-service-apply-1"
                                       value="1" class="home-service-apply-1">
                                <span>I'll Come Dyntat Office</span>
                            </div>


{{--<input type="checkbox" id="home_service" class="home_service"--}}
                    {{--> Home Service--}}
                    {{--<span title="Home Service" class="glyphicon glyphicon-info-sign"></span>--}}
                            </div>
                        </div>
                    </div> -->
                        {{--<div class="col-lg-6">--}}
                        {{--<div class="checkout-index">--}}
                        {{--<h3 class="c-head">Discount Offer</h3>--}}
                        {{--</div>--}}
                        {{--<div class="c-box">--}}
                        {{--<div>--}}
                        {{--<div>--}}
                        {{--<p><input type="checkbox" id="discount" class="discount"--}}
                        {{--data-add-coupon="{{route('add.to.coupon')}}"> <span>Apply Your Discount</span>--}}
                        {{--<span title="Discount" class="glyphicon glyphicon-info-sign"></span></p>--}}
                        {{--<div id="discount_div" class="hidden"--}}
                        {{--data-add-coupon="{{route('add.to.coupon')}}">--}}
                        {{--<form id="discount_form"--}}
                        {{--data-add-coupon="{{route('add.to.coupon')}}">--}}
                        {{--<input type="hidden" id="token" value="{{csrf_token()}}">--}}

                        {{--<div class="checkout_shipping">--}}
                        {{--<input type="radio" name="radioDiscount" id="-1"--}}
                        {{--value="coupon">--}}
                        {{--<span>{{"Using Coupon Code"}}</span>--}}
                        {{--<div class="hidden" id="coupon_div">--}}
                        {{--<input type="text" id="coupon_code" class="coupon_code"--}}
                        {{--placeholder="Enter you coupon">--}}
                        {{--<button class="btn btn-success" id="coupon_apply">--}}
                        {{--Apply--}}
                        {{--</button>--}}
                        {{--</div>--}}
                        {{--<div class='hidden' id='coupon_msg'></div>--}}
                        {{--</div>--}}
                        {{--@foreach($bank_discount as $discount)--}}
                        {{--<div class="checkout_shipping">--}}
                        {{--<input type="radio" name="radioDiscount"--}}
                        {{--id="{{$discount->id}}"--}}
                        {{--value="{{$discount->field_name}}">--}}
                        {{--<span>{{$discount->name}}</span>--}}
                        {{--<span>{{$discount->discount}} %</span>--}}
                        {{--</div>--}}
                        {{--@endforeach--}}
                        {{--</form>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}

                    </div>


                    <div class="row  tests-marz-top">
                        <div class="col-md-12">

                            <div class="payment-option-wrapper">
                                <div class="how_to_pay">
                                    <h5>Payment Method</h5>
                                </div>
                                <div class="ssl" id="ssl_div">
                                    <button class="accordion flex_center" id="btn_ssl">
                                        <div class="col-md-6"><input id="rad_ssl" type="radio"
                                                                     style="margin-right: 20px;">Pay Online & Place
                                            Your
                                            Order
                                        </div>
                                        <div class="col-md-6 alignright"><span class="payment-logos"><img
                                                        src="{{asset("public/assets/images/credit-card-icons.png")}}"
                                                        alt="SSL Commerzzz"></span></div>

                                    </button>
                                    <div class="panel" id="view_ssl">
                                        <div id="test-payment" class="margin flex_center">
                                            <div class="col-md-6">
                                                <div id="bank_discount_div"
                                                     data-add-coupon="{{route('add.to.coupon')}}">
                                                    <select id="bank_discount_sec">
                                                        <option id="1597532846" value="select" selected>Select a Card</option>
                                                        @foreach($bank_discount as $discount)
                                                            <option id="{{$discount->id}}"
                                                                    value="{{$discount->field_name}}"
                                                            >{{$discount->name}}</option>
                                                            {{--<div class="checkout_shipping">--}}
                                                            {{--<input type="radio" name="radioDiscount"--}}
                                                            {{--id="{{$discount->id}}"--}}
                                                            {{--value="{{$discount->field_name}}">--}}
                                                            {{--<span>{{$discount->name}}</span>--}}
                                                            {{--<span>{{$discount->discount}} %</span>--}}
                                                            {{--</div>--}}
                                                        @endforeach
                                                            <option id="0" value="other">Others Card</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 alignright"><p class="ssl_payment">
                                                    <a id="ssl-submit-post" href="{{route('checkout.to.ssl')}}"
                                                       title="Pay Online ">Confirm Order</a>
                                                </p></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cod" id="cod_div" data-add-coupon="{{route('add.to.coupon')}}">
                                    <button class="accordion flex_center" id="btn_cod">
                                        <div class="col-md-6"><input id="rad_cod" type="radio"
                                                                     style="margin-right: 20px;">Cash On Delivery &
                                            Place Your Order
                                        </div>
                                        <div class="col-md-6 alignright"><!--<img
                                                    src="https://cdn.store-assets.com/s/149518/f/204160.png"
                                                    alt="SSL Commerzzz" style="height: 38px;">--></div>
                                    </button>
                                    <div class="panel" id="view_cod">
                                        <div id="test-payment" class="margin flex_center">
<div class="col-md-6"></div> <div class="col-md-6 alignright">
                                            <p class="ssl_payment">
                                                <a id="cod-submit-post" href="{{route('preOdrers.val.front')}}"
                                                   title="Cash On Delivery">
                                                    Confirm Order
                                                   
                                                </a>
                                            </p>
</div>

                                        </div>
                                    </div>
                                </div>


                                <div class="row back">
                                    <div class="col-md-4">
                                        <a href="{{route('testmenu')}}" class="btn btn-primary">Add More Test</a>
                                    </div>
                                    <div class="col-md-8 alignright">
                                        <span class="need_help">Need Help?</span>
                                        <span class="popup_phone">+88 096 66 73 73 73 or </span>
                                        <span class="popup_contactus"><a target="_blank"
                                                                         href="http://androidpin.com/contact">Contact Us</a></span>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

             <div class="col-md-12 footer-payment-logos">
             <span><img src="{{asset("public/assets/images/paywith_web.png")}}" alt="SSL Commerzzz"></span>
             </div>

        </div>
        </div>
    </section>
    <style>
        button.accordion {
            background-color: #eee;
            color: #444;
            cursor: pointer;
            padding: 18px;
            width: 100%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 15px;
            transition: 0.4s;
            margin-top: 2px;
        }

        button.accordion.active, button.accordion:hover {
            background-color: #ddd;
        }

        div.panel {
            padding: 0 18px;
            display: none;
            background-color: white;
        }
    </style>
@endsection
@section('scripts')
    <script>
        if (!!window.performance && window.performance.navigation.type === 2) {
            console.log('Reloading');
            window.location.reload();
        }
        $(document).ready(function () {

            $("#view_ssl").hide();
            $("#view_cod").hide();
            $("#rad_ssl").prop("checked", false);

            $("#btn_ssl").click(function () {
                $("#view_ssl").toggle();
                $("#view_cod").hide();
                $("#rad_ssl").prop("checked", true);
                $("#rad_cod").prop("checked", false);
            });
            $("#btn_cod").click(function () {
                $("div#divLoading").addClass('show');
                $("#view_cod").toggle();
                $("#view_ssl").hide();
                $("#rad_cod").prop("checked", true);
                $("#rad_ssl").prop("checked", false);
                var URL = $(this).parents("#cod_div").data("add-coupon");
                $("#bank_discount_sec option").prop('selected', function () {
                    return this.defaultSelected;
                });
                $.ajax({
                    url: URL, //this is your uri
                    type: 'POST', //this is your method
                    dataType: 'json',
                    data: {
                        "id": 0,
                        "coupon": null,
                        "value": "other"
                    },
                    success: function (response) {
                        $("div#divLoading").removeClass('show');
                        if (response.datastatus) {
                            $("#calculation").html(response.data);
                            $("#total_amount").val(response.total);

                            $("#sslcommerz_form").find('.card').remove();
                            if (radioValue != "coupon") {
                                //$("#sslcommerz_form").append("<input class = 'card' name='multi_card_name' readonly='' value='" + radioValue + "' type='hidden'>");
                            }
                        } else {
                            alert(response.data);
                        }
                    }
                });
            });


            //.attr('selected','selected');
            @if(!is_null($discountData) && $discountData['id']>0)
            $("#" + "{{$discountData['id']}}").attr('selected', 'selected');
            @endif


            //home service
//            $("#home_service").live('click', function (event) {
//                event.preventDefault();
//                $("div#divLoading").addClass('show');
//                var addURL = $(this).parents("#home-service-parent").data("cart-add-home-service"),
//                    removeURL = $(this).parents("#home-service-parent").data("cart-remove-home-service");
//                //request to add home service condition
//                if ($('#home_service').prop('checked')) {
//                    $.ajax({
//                        url: addURL,
//                        type: 'GET',
//                        dataType: 'json',
//                        success: function (response) {
//                            $('#home_service').prop('checked', true);
//                            $("#calculation").html(response.data);
//                            $("#total_amount").val(response.total);
//                            $("div#divLoading").removeClass('show');
//                        }
//                    });
//                }
//                //request to remove home service condition
//                else {
//                    $.ajax({
//                        url: removeURL,
//                        type: 'GET',
//                        dataType: 'json',
//                        success: function (response) {
//                            $('#home_service').prop('checked', false);
//                            $("#calculation").html(response.data);
//                            $("#total_amount").val(response.total);
//                            $("div#divLoading").removeClass('show');
//                        }
//                    });
//                }
//            });

            //discount div controller
            $("#discount").live('click', function (event) {

                if ($('#discount').prop('checked')) {
                    $("#discount_div").removeClass('hidden');
                } else {
                    var URL = $(this).data("add-coupon");
                    var _token = $('#token').val();
                    $.ajax({
                        url: URL, //this is your uri
                        type: 'POST', //this is your method
                        dataType: 'json',
                        data: {
                            "_token": _token,
                            "id": -1,
                            "coupon": null,
                            "value": 'coupon'
                        },
                        success: function (response) {
                            if (response.datastatus) {
                                $("#calculation").html(response.data);
                                $("#total_amount").val(response.total);
                                $("#cod_div").show();
                                $("div#divLoading").removeClass('show');
                                $("#sslcommerz_form").find('.card').remove();
                                if (radioValue != "coupon") {
                                    $("#sslcommerz_form").append("<input class = 'card' name='multi_card_name' readonly='' value='" + radioValue + "' type='hidden'>");
                                }
                            } else {
                                $("div#divLoading").removeClass('show');
                                alert(response.data);
                            }
                        }
                    });
                    $('#discount_form')[0].reset();
                    $("#discount_div").addClass('hidden');
                    $("#coupon_msg").addClass('hidden');
                    $("#coupon_div").addClass('hidden');
                }
            });

            $("#bank_discount_sec").change(function () {
                $("div#divLoading").addClass('show');
                var URL = $(this).parents("#bank_discount_div").data("add-coupon");
                var id = $('#bank_discount_sec').find(":selected").attr('id');
                var value = $('#bank_discount_sec').find(":selected").val();

                $.ajax({
                    url: URL, //this is your uri
                    type: 'POST', //this is your method
                    dataType: 'json',
                    data: {
                        "id": id,
                        "coupon": null,
                        "value": value
                    },
                    success: function (response) {
                        $("div#divLoading").removeClass('show');
                        if (response.datastatus) {
                            $("#calculation").html(response.data);
                            $("#total_amount").val(response.total);

                            $("#sslcommerz_form").find('.card').remove();
                            if (radioValue != "coupon") {
                                //$("#sslcommerz_form").append("<input class = 'card' name='multi_card_name' readonly='' value='" + radioValue + "' type='hidden'>");
                            }
                        } else {
                            alert(response.data);
                        }
                    }
                });
            });
            //add discount
            $('#discount_form input').on('change', function () {
                $("div#divLoading").addClass('show');
                var radioValue = $('input[name=radioDiscount]:checked', '#discount_form').val();
                $("#coupon_div").addClass('hidden');
                var radioId = $('input[name=radioDiscount]:checked', '#discount_form').attr('id');
                var URL = $(this).parents("#discount_form").data("add-coupon");
                var _token = $('#token').val();
                if (radioValue == "coupon") {
                    $("#coupon_div").removeClass('hidden');
                    $("div#divLoading").removeClass('show');
                    $("#cod_div").show();
                } else {
                    $("#cod_div").hide();
                }
                $.ajax({
                    url: URL, //this is your uri
                    type: 'POST', //this is your method
                    dataType: 'json',
                    data: {
                        "_token": _token,
                        "id": radioId,
                        "coupon": null,
                        "value": radioValue
                    },
                    success: function (response) {
                        if (response.datastatus) {
                            $("#calculation").html(response.data);
                            $("#total_amount").val(response.total);
                            $("div#divLoading").removeClass('show');

                            $("#sslcommerz_form").find('.card').remove();
                            if (radioValue != "coupon") {
                                //$("#sslcommerz_form").append("<input class = 'card' name='multi_card_name' readonly='' value='" + radioValue + "' type='hidden'>");
                            }
                        } else {
                            $("div#divLoading").removeClass('show');
                            alert(response.data);
                        }
                    }
                });

            });

            //coupon apply button
            $("#coupon_apply").live('click', function (event) {
                event.preventDefault();
                $("div#divLoading").addClass('show');
                var coupon_code = $("#coupon_code").val();
                var _token = $('#token').val();
                if (coupon_code == '') {
                    //alert("Field can't be empty");
                    $("div#divLoading").removeClass('show');
                    $("#coupon_msg").removeClass('hidden');
                    $("#coupon_msg").html("<div style='color: red; margin-left: 15px;'>Field can't be empty</div>");
                } else {
                    var URL = $(this).parents("#discount_div").data("add-coupon");
                    $.ajax({
                        url: URL, //this is your uri
                        type: 'POST', //this is your method
                        dataType: 'json',
                        data: {
                            "_token": _token,
                            "id": null,
                            "coupon": coupon_code,
                            "value": null
                        },
                        success: function (response) {
                            if (response.datastatus) {
                                $("#calculation").html(response.data);
                                $("#total_amount").val(response.total);
                                $("div#divLoading").removeClass('show');
                                $("#coupon_msg").removeClass('hidden');
                                $("#coupon_msg").html("<div style='color: green;  margin-left: 15px;'>Coupon applied successful.</div>");
                            } else {
                                $("div#divLoading").removeClass('show');
                                $("#coupon_msg").removeClass('hidden');
                                $("#coupon_msg").html("<div style='color: red;  margin-left: 15px;'>" + response.data + "</div>");
                            }
                        }
                    });
                }
            });

            if ($('#shipping_address').prop('checked')) {
                $("#shipping_address_des").show();
            } else {
                $("#shipping_address_des").hide();
            }
            $("#shipping_address").live('click', function (event) {
                //event.preventDefault();

                if ($('#shipping_address').prop('checked')) {

                    $("#shipping_address_des").show();
                    $('#shipping_address').prop('checked', true);

                } else {
                    $("#shipping_address_des").hide();
                    $('#shipping_address').prop('checked', false);

                }
            });

            $("#cod-submit-post").live('click', function (event) {
                event.preventDefault();
                var cod = $(this).attr('href');
                $("#shipping_form").attr("action", cod);
                $("#shipping_form").submit();
            });

            $("#ssl-submit-post").live('click', function (event) {
                event.preventDefault();
                var id = $('#bank_discount_sec').find(":selected").attr('id');
                if(id!=1597532846){
                    var ssl = $(this).attr('href');
                    $("#shipping_form").attr("action", ssl);
                    $("#shipping_form").submit();
                }else{
                    alert("Ddd");
                }

            });

            $("#home-service-apply-0").live('click', function (event) {
                var addURL = $(this).parents("#home-service-parent").data("cart-add-home-service"),
                    removeURL = $(this).parents("#home-service-parent").data("cart-remove-home-service");
                $("#home-service-apply-1").prop('checked', false);
                $("#home-service-apply-0").prop('checked', true);

                $.ajax({
                    url: addURL,
                    type: 'GET',
                    dataType: 'json',
                    success: function (response) {
                        $('#home_service').prop('checked', true);
                        $("#calculation").html(response.data);
                        $("#total_amount").val(response.total);
                        $("div#divLoading").removeClass('show');
                    }
                });
            });
            if ($("#home-service-apply-0").prop('checked') == false && $("#home-service-apply-1").prop('checked') == false) {
                $("#home-service-apply-1").prop('checked', true);
            }
            $("#home-service-apply-1").live('click', function (event) {
                var addURL = $(this).parents("#home-service-parent").data("cart-add-home-service"),
                    removeURL = $(this).parents("#home-service-parent").data("cart-remove-home-service");
                $("#home-service-apply-1").prop('checked', true);
                $("#home-service-apply-0").prop('checked', false);

                $.ajax({
                    url: removeURL,
                    type: 'GET',
                    dataType: 'json',
                    success: function (response) {
                        $('#home_service').prop('checked', false);
                        $("#calculation").html(response.data);
                        $("#total_amount").val(response.total);
                        $("div#divLoading").removeClass('show');
                    }
                });

            });

        });
    </script>
@endsection
