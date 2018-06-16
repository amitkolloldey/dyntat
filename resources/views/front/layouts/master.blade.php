<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en"> <!--<![endif]-->
@include('front/layouts/head')

<body onscroll="myFunction()">
<div class="site-wrapper">

@include('front.layouts.header')
@if( (Route::currentRouteName() == 'home' ) )
    @include('front.layouts.slider')
@endif

@if( (Route::currentRouteName() != 'home' && Route::currentRouteName() != 'career') )
    @include('front.layouts.breadcrumbs')
@endif

<!-- Content Wrapper. Contains page content -->
@yield('content')
<!-- /.content-wrapper -->

@include('front/layouts/footer')

</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{ asset('public/assets/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('public/assets/js/jquery-migrate-1.4.1.min.js') }}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ asset('public/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/assets/js/modernizr-2.8.3-respond-1.4.2.min.js') }}"></script>
<script src="{{ asset('public/assets/js/slick.min.js') }}"></script>
<script src="{{ asset('public/assets/js/jquery.pogo-slider.js') }}"></script>
<script src="{{ asset('public/assets/js/jquery.tabslet.min.js') }}"></script>
<script src="{{ asset('public/assets/js/jquery.prettyPhoto.js') }}"></script>
<script src="{{ asset('public/assets/js/jquery.bookblock.js') }}"></script>
<script src="{{ asset('public/assets/js/scripts.js') }}"></script>
<script src="{{ asset('public/assets/slider_box/jquery.flexslider-min.js') }}"></script>
<script src="{{ asset('public/assets/slider_box/jquery.tools.min.js') }}"></script>




<script src="http://www.dyntat.com/layout/plugins/bxslider/jquery.bxslider.min.js"></script>
<script src="http://www.dyntat.com/layout/js/formvalidation.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDAb29Vv44OcQYF8gUM4GZxp88Qvlyzlhw&callback=initMap"
        type="text/javascript"></script>
@yield('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $('#js-main-slider').pogoSlider({
            autoplay: true,
            autoplayTimeout: 3000,
            displayProgess: false,
            preserveTargetSize: true,
            targetWidth: 1000,
            targetHeight: 350,
            responsive: true,
            generateButtons: false
        }).data('plugin_pogoSlider');

        $('.clintsays-carusol').slick({
            arrows: false,
            autoplay: true,
            dots: true
        });
        $('.links-carusol').slick({
            arrows: false,
            dots: false,
            speed: 300,
            slidesToShow: 3,
            autoplay: true,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        infinite: true,
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });

        $('.partner-carusol-avatar').slick({
            centerMode: true,
            slidesToShow: 5,
            slidesToScroll: 1,
            variableWidth: false,
            asNavFor: '.partner-carusol-content',
            prevArrow: "<i class='fa fa-angle-left slick-prev' aria-hidden='true'></i>",
            nextArrow: "<i class='fa fa-angle-right slick-next' aria-hidden='true'></i>",
            responsive: [
                {
                    breakpoint: 1199,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        infinite: true,
                    }
                },
                {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });

        $('.partner-carusol-content').slick({
            fade: true,
            arrows: false,
            centerMode: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            variableWidth: false,
            asNavFor: '.partner-carusol-avatar'
        });
    });

    var owl = $('.owl-carousel');

    owl.owlCarousel({
        loop: true,
        margin: 10,
        autoplay: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: false,
                loop: true
            },
            600: {
                items: 3,
                nav: false,
                loop: true
            },
            1000: {
                items: 4,
                nav: false,
                loop: true
            }
        }
    })
    $('.play').on('click', function () {
        owl.trigger('play.owl.autoplay', [1000])
    })
    $('.stop').on('click', function () {
        owl.trigger('stop.owl.autoplay')
    });

</script>
<div id="divLoading">
</div>
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WRVKZQZ"
            height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->
</body>
</html>