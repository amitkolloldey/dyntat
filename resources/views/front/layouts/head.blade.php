<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="no-cache">
    <meta http-equiv="Expires" content="-1">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta name="robots" content="noindex, nofollow">
    <!-- Meta -->
    @yield('metas')
    <link rel="apple-touch-icon" href="assets/images/apple-touch-icon.png">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('public/assets/images/favicon.ico') }}">
    <!-- Bootstrap -->
    <link href="{{ asset('public/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/css/bootstrap-theme.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/css/flaticon.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/css/pogo-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/css/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/css/bookblock.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/css/responsive.css') }}" rel="stylesheet">
    <!--todo:: Parvez floating call buttonCall-->
    <link href="{{ asset('public/assets/css/par_css/par_call.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/css/par_css/par_side_button.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/css/par_css/par_social_button.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/css/par_css/par_login.css') }}" rel="stylesheet">
    <!--todo:: Parvez auto play slide show-->

    <link rel="stylesheet" href="{{ asset('public/assets/slider/onebyone/css/jquery.onebyone.css') }}" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('public/assets/slider/onebyone/css/animate.css') }}" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('public/assets/slider/onebyone/css/style.css') }}" type="text/css"/>



    <link href="{{ asset('public/assets/css/owlcarousel/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{ asset('public/assets/css/owlcarousel/owl.theme.default.min.css')}}" rel="stylesheet">
    {{--<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Didact+Gothic"/>--}}
    <link href="http://fonts.googleapis.com/css?family=PT+Sans:400,400italic,700,700italic|Open+Sans:400,400italic,600,600italic,700,700italic,800,800italic|Quintessential"
          rel="stylesheet" type="text/css"/>
    <!--todo:: Parvez auto play slide show-->
    {{--<link href="{{ asset('public/assets/slider_career/style.css')}}" rel="stylesheet">--}}
    <link href="{{ asset('public/assets/slider_career/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{ asset('public/assets/slider_career/nivo-slider.css')}}" rel="stylesheet">
    <link href="{{ asset('public/assets/slider_career/flexslider.css')}}" rel="stylesheet">

    <link href="{{ asset('public/assets/slider_box/style.css')}}" rel="stylesheet">

@yield('styles')
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Google Tag Manager -->
    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-WRVKZQZ');</script>
    <!-- End Google Tag Manager -->

</head>
