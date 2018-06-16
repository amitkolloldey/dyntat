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
                <div class="col-md-8">
                    <div class="main-content">
                        <div class="product-table-warp">
                            <table class="table table-bordered cart_summary">
                                <thead>
                                <tr>
                                    <th class="test_thumb">Image</th>
                                    <th class="test_name">Name</th>
                                    <th class="test_shortName">Short Code</th>
                                    <th class="test_quantity">Quentity</th>
                                    <th class="test_price" style="text-align: right;">Price</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!Cart::isEmpty() && $cartCollection = Cart::getContent())
                                    @foreach($cartCollection as $item)
                                        <tr>
                                            <td class="test_thumb">
                                                <img src="{{ $item->attributes['imgPath'] }}" alt="">
                                            </td>
                                            <td class="test_name">
                                                {{ $item->name }}
                                            </td>
                                            @if(isset($item->attributes['short_name']))
                                                <td class="test_shortName">{{ $item->attributes['short_name'] }}</td>
                                            @else
                                                <td class="test_shortName">NO</td>
                                            @endif
                                            <td class="test_quantity">{{ $item->quantity }}</td>
                                            <td class="test_price">&#x9f3; {{ tk($item->price) }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                                <tfoot id="tfoot">
                                <tr>
                                    <td colspan="4">Total Test</td>
                                    <td>{{Cart::getTotalQuantity()}}</td>
                                </tr>
                                <tr>
                                    <td colspan="4">Total</td>
                                    <td>&#x9f3; {{tk(Cart::getSubTotal())}}</td>
                                </tr>
                                </tfoot>
                            </table>
                            <table class='table table-bordered cart_summary'>
                                <tfoot id='calculation'>
                                <tr>
                                    <td colspan='4'>After Discount</td>
                                    <td>&#x9f3; {{tk(Cart::getSubTotal()-$discountPrice)}}</td>
                                </tr>
                                @if(!is_null(Session::has('homeService')) && ($homeService = Session::get('homeService')) > 0)
                                    <tr>
                                        <td colspan='4'>Home Service</td>
                                        <td>&#x9f3; {{tk($homeService)}}</td>
                                    </tr>
                                @endif
                                <tr>
                                    <td colspan='4'>Payable Price</td>
                                    <td>
                                        &#x9f3; {{tk($payableAmount)}}</td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>


                    </div>
                </div>
                <div class="col-md-4">
                    <aside class="right-sidebar">
                        <div class="single-widget">
                            <div class="services">
                                <h3>Service</h3>
                                <div class="home-service-parent"
                                     id="home-service-parent"
                                     data-cart-add-home-service="{{ route('add.to.cart.home.service')}}"
                                     data-cart-remove-home-service="{{ route('remove.to.cart.home.service')}}">
                                    <input type="checkbox" id="home_service" class="home_service"
                                    <?php if (!is_null(Session::has('homeService')) && Session::get('homeService') > 0) {
                                        echo 'checked';
                                    }?>> Home Service
                                    <span title="Home Service" class="glyphicon glyphicon-info-sign"></span>
                                </div>
                                <div>
                                    <div>
                                        <input type="checkbox" id="discount" class="discount"
                                               data-add-coupon="{{route('add.to.coupon')}}"> Apply Your Discount
                                        <span title="Discount" class="glyphicon glyphicon-info-sign"></span>
                                        <div id="discount_div" class="hidden"
                                             data-add-coupon="{{route('add.to.coupon')}}">
                                            <form id="discount_form" data-add-coupon="{{route('add.to.coupon')}}">
                                                <input type="hidden" id="token" value="{{csrf_token()}}">

                                                <div>
                                                    <input type="radio" name="radioDiscount" id="-1" value="coupon">
                                                    <span>{{"Coupon"}}</span>
                                                    <div class="hidden" id="coupon_div">
                                                        <input type="text" id="coupon_code" class="coupon_code"
                                                               placeholder="Enter you coupon">
                                                        <button class="btn btn-success" id="coupon_apply">Apply</button>
                                                    </div>
                                                    <div class='hidden' id='coupon_msg'></div>
                                                </div>
                                                @foreach($bank_discount as $discount)
                                                    <div>
                                                        <input type="radio" name="radioDiscount" id="{{$discount->id}}"
                                                               value="{{$discount->field_name}}">
                                                        <span>{{$discount->name}}</span>
                                                        <span>{{$discount->discount}} %</span>
                                                    </div>
                                                @endforeach
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
            <div class="row">
                <div class="back">
                    <a href="{{route('home.back')}}" class="btn btn-primary">Continue Shopping</a>
                </div>
                <div class="payment-option-wrapper">
                    <div class="how_to_pay">
                        <h3>Choose how to pay</h3>
                        <span>* Required fields </span>
                    </div>
                    <div class="ssl" id="ssl_div">
                        <button class="accordion" id="btn_ssl">
                            <input id="rad_ssl" type="radio" style="margin-right: 20px;">Pay Online & Place Your Order
                        </button>
                        <div class="panel" id="view_ssl">
                            <div id="test-payment">
                                <p class="ssl_payment">
                                    <a href="{{route('checkout.to.ssl')}}" title="Pay Online ">
                                        Click to continue
                                        <span class="payment-logos">
                                   <img src="{{ asset('public/assets/images/payonline.jpg') }}"
                                        alt="SSL Commerzzz">
                                </span>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="cod" id="cod_div">
                        <button class="accordion" id="btn_cod">
                            <input id="rad_cod" type="radio" style="margin-right: 20px;">Cash On Delivery & Place Your Order
                        </button>
                        <div class="panel" id="view_cod">
                            <div id="test-payment">
                                <p class="ssl_payment">
                                    <a href="{{route('preOdrers.val.front')}}" title="Cash On Delivery">
                                        Click to continue
                                        <span class="payment-logos">
                                <img src="{{ asset('public/assets/images/cash.png') }}" alt="Cash On Delivery">
                                </span>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

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
                $("#view_cod").toggle();
                $("#view_ssl").hide();
                $("#rad_cod").prop("checked", true);
                $("#rad_ssl").prop("checked", false);
            });

            @if(!is_null($discountData) && $discountData['id']>-2)
            $("#discount").prop("checked", true);
            $("#" + "{{$discountData['id']}}").prop("checked", true);
            $("#discount_div").removeClass('hidden');
            @if($discountData['id'] == -1)
            $("#coupon_div").removeClass('hidden');
            @else
            $("#cod_div").hide();
            @endif
            @endif


            //home service
            $("#home_service").live('click', function (event) {
                event.preventDefault();
                $("div#divLoading").addClass('show');
                var addURL = $(this).parents("#home-service-parent").data("cart-add-home-service"),
                    removeURL = $(this).parents("#home-service-parent").data("cart-remove-home-service");
                //request to add home service condition
                if ($('#home_service').prop('checked')) {
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
                }
                //request to remove home service condition
                else {
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
                }
            });

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
                                $("#sslcommerz_form").append("<input class = 'card' name='multi_card_name' readonly='' value='" + radioValue + "' type='hidden'>");
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

        });

    </script>
@endsection
