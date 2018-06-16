@extends('front.layouts.master')
@section('metas')
    <meta name="description" content="A page's description, usually one or two sentences."/>
@stop
@section('pagetitle')Edit Orders @stop
@section('pagetitle2')Edit Orders @stop
@section('content')

    <section class="service-postsec">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <aside class="left-sidebar">
                        <div class="single-widget services-list">
                            {!! Form::open(['route' => 'cat.tests3', 'class' => 'ajax-cat-test2']) !!}
                            <h4 class="heading_s_icon">Tests:</h4>
                            <ul id="category">
                                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                <li id="-1"><a href=""> All</a></li>
                                @if($catAll)
                                    @foreach($catAll as $cat)
                                        <li id="{{ $cat->id}}">
                                            <a href=""> {{ $cat->name}}</a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                            {!! Form::close() !!}
                        </div>
                    </aside>
                </div>

                <div class="col-md-6">
                    <div class="servic-post-wapper">
                        @if($tests)
                            <div class="services">
                                <table class="table table-bordered">
                                    <thead>
                                    <h4 class="heading_s_icon">Test Menu</h4>
                                    <p>Click on the Left Side Test group to know more.</p>
                                    <tr>
                                        <td>Sl No.</td>
                                        <td>Test Code</td>
                                        <td>Test Name</td>
                                        <td>Add to Card</td>
                                    </tr>
                                    </thead>
                                    <tbody id="test_body">
                                    @foreach($tests as $i => $test)
                                        <tr id="{{($test->id).'test_body'}}">
                                            <td>{{$i+1}}</td>
                                            <td>{{$test->short_name}}</td>
                                            <td>{{ $test->title }}</td>
                                            <td>
                                                <div class="hover2"
                                                     data-cart-add="{{ route('add.to.cart2', array($test->id) ) }}"
                                                     data-cart-remove="{{ route('remove.to.cart2', array($test->id) ) }}"
                                                     style='text-align: center;'>
                                                    @if(Cart::get($test->id) === null)
                                                        <a href="{{ route('add.to.cart2', array($test->id) ) }}"
                                                           class="add-cart2">
                                                            <span class="glyphicon glyphicon-shopping-cart"></span></a>
                                                    @else
                                                        <a href="{{ route('remove.to.cart2', array($test->id) ) }}"
                                                           class="remove-cart2"><span
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
                                                    <div class='remove2'
                                                         data-cart-add="{{ route('add.to.cart2', array($item->id) ) }}"
                                                         data-cart-remove="{{ route('remove.to.cart2', array($item->id) ) }}"
                                                         data-cart-id="{{$item->id}}">
                                                        <a href="{{ route('remove.to.cart2', array($item->id) ) }}"
                                                           class="remove-link-2">
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

                            <div class="info-form-warp" id="check-checkout">
                                {!! Form::open(['route' => 'recheckout', 'class' => 'Checkout-form']) !!}
                                @if(Auth::check())
                                    <input type="hidden" value="{{$order_id}}" name="order_id">
                                    <p class="submit">
                                        <input id="reload" type="submit" name="submit" value="Proceed to Checkout">
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

@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {

            $(".add-cart2").live('click', function (event) {
                event.preventDefault();
                var paren = $(this).parents(".hover2"),
                    addURL = $(this).parents(".hover2").data("cart-add"),
                    removeURL = $(this).parents(".hover2").data("cart-remove");
                $.ajax({
                    url: addURL, //this is your uri
                    type: 'GET', //this is your method
                    dataType: 'json',
                    success: function (response) {
                        $(".single-widget.cart-widget").find("ul.item-list").html(response.data);
                        paren.find('.add-cart2').remove();
                        paren.append("<a class='remove-cart2' href='" + removeURL + "'><span class='glyphicon glyphicon-check'></span></a>");
                    }
                });
            });

            $(".remove-cart2").live('click', function (event) {
                event.preventDefault();
                var paren = $(this).parents(".hover2"),
                    addURL = $(this).parents(".hover2").data("cart-add"),
                    removeURL = $(this).parents(".hover2").data("cart-remove");
                $.ajax({
                    url: removeURL, //this is your uri
                    type: 'GET', //this is your method
                    dataType: 'json',
                    success: function (response) {
                        $(".single-widget.cart-widget").find("ul.item-list").html(response.data);
                        paren.find('.remove-cart2').remove();
                        paren.append("<a class='add-cart2' href='" + addURL + "'><span class='glyphicon glyphicon-shopping-cart'></span></a>");
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
                        } else {
                            location.reload(true);
                        }
                    }
                });
            });
        });
    </script>
@endsection