<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en"> <!--<![endif]-->
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
<body onscroll="myFunction()">
<div class="site-wrapper">
    <div class="sub-menu-social hidden" id="sub-menu-social">
        <div class="floating-menu-div">
            <div class="sub-menu">
                <ul>
                    <li class="question">
                        <a href="tel:+8809666737373">
                            CALL US: +8809666737373
                        </a>
                    </li>


                    <li class="social-icons">
                        {{--<a class="social facebook" href="https://www.facebook.com/dyntatbd/" target="_blank"><i--}}
                            {{--class="fa fa-facebook-square" aria-hidden="true"--}}
                            {{--style="margin-right: 0px;color: blue;"></i></a>--}}
                        <a class="social facebook" href="https://www.facebook.com/dyntatbd/" target="_blank">
                        <span> <img src="{{asset('public/assets/images/facebook.png')}}" style="width: 1.5em;"
                                    alt="Facebook"></span>
                        </a>
                        <a class="social youtube"
                           href="https://www.youtube.com/channel/UCNz8x8dIfldAPiumTUsh0MQ" target="_blank">
                        <span> <img src="{{asset('public/assets/images/youtube.png')}}" style="width: 1.5em;"
                                    alt="Youtube"></span>

                        </a>
                        <a class="social instagram" href="https://www.instagram.com/dyntat.bd"
                           target="_blank">
                        <span> <img src="{{asset('public/assets/images/instagram.png')}}" style="width: 1.5em;"
                                    alt="Facebook"></span>

                        </a>
                    </li>


                    @if(Auth::check() && $user = Auth::user())
                    <li class="login">
                        <a href="{{route('user.profile')}}">
                            @if($userImg = json_decode($user->picture) )
                            <img src="{{adminUrl($userImg->thumb)}}">
                            @else
                            <svg class="svg-stroke-container" width="24" height="22" viewBox="0 0 24 22" xmlns="http://www.w3.org/2000/svg">
                                <path d="M.5 21.5c.66-1.305 2.085-2.274 5.085-3.456 2.957-1.219 3.436-2.088 3.436-3.7 0-.38-.072-.472-.285-.749-.303-.39-.716-.924-.97-2.308l-.029-.126c-.618-.341-.972-.808-1.062-2.194 0-.688.192-1.115.384-1.366a52.882 52.882 0 0 1-.241-2c-.066-.879.19-2.286 1.124-3.405C8.588 1.423 9.818.5 12.014.5c2.273 0 3.52.963 4.166 1.77.91 1.134 1.122 2.51 1.03 3.343a19.481 19.481 0 0 1-.231 1.993c.187.249.375.661.375 1.318-.09 1.43-.444 1.896-.986 2.2l-.102.15c-.23 1.409-.659 1.945-.97 2.338-.216.272-.289.363-.289.732 0 1.564.497 2.47 3.447 3.704 2.786 1.098 4.204 2.054 5.046 3.403" stroke="#ff4500" stroke-width="2" fill-rule="nonzero" fill="none" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                            @endif
                            {{$user->name}}
                        </a>
                    </li>
                    <li class="logout">
                        <a href="" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();"><span
                                    class="glyphicon glyphicon-log-out"></span>Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                              style="display: none;">
                            {{ csrf_field() }}
                        </form>

                    </li>
                    @else
                    <li class="login">
                        <a href="#" id="login-user-login">

                            <svg class="svg-stroke-container" width="24" height="22" viewBox="0 0 24 22" xmlns="http://www.w3.org/2000/svg">
                                <path d="M.5 21.5c.66-1.305 2.085-2.274 5.085-3.456 2.957-1.219 3.436-2.088 3.436-3.7 0-.38-.072-.472-.285-.749-.303-.39-.716-.924-.97-2.308l-.029-.126c-.618-.341-.972-.808-1.062-2.194 0-.688.192-1.115.384-1.366a52.882 52.882 0 0 1-.241-2c-.066-.879.19-2.286 1.124-3.405C8.588 1.423 9.818.5 12.014.5c2.273 0 3.52.963 4.166 1.77.91 1.134 1.122 2.51 1.03 3.343a19.481 19.481 0 0 1-.231 1.993c.187.249.375.661.375 1.318-.09 1.43-.444 1.896-.986 2.2l-.102.15c-.23 1.409-.659 1.945-.97 2.338-.216.272-.289.363-.289.732 0 1.564.497 2.47 3.447 3.704 2.786 1.098 4.204 2.054 5.046 3.403" stroke="#ff4500" stroke-width="2" fill-rule="nonzero" fill="none" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>


                            <span style="color: orangered">Login</span>
                        </a>
                        {{--<a href="{{ route('adminFacebook') }}"--}}
                               {{--target="_blank"><span> <img--}}
                        {{--src="{{asset('public/assets/images/facebook.png')}}"--}}
                        {{--style="width: 1.3em;" alt="Facebook"></span></a>--}}
                        {{--<a href="{{ route('adminHome') }}"><span> <img--}}
                        {{--src="https://dhqbrvplips7x.cloudfront.net/webchat/1.0.23/agent-e202505f.png"--}}
                        {{--style="width: 1.3em;" alt="Facebook"></span></a>--}}
                    </li>
                    @endif





                </ul>
            </div>
        </div>
    </div>
    <header id="header-warp">
        <nav id="navegation-warp">
            <div class="container">
                <div class="row">

                    <div class="mainMenu-warp">

                        <div class="brand">
                            <a href="{{ route('home') }}">
                                <img src="{{asset("public/assets/images/logo.png")}}"
                                alt="Dyntat Bangladesh Limited">
                            </a>
                        </div>

                        <div class="menu-arrow">
                            <a href="" class="mobile-menu-arrow">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                        </div>

                        <div class="main-sub-menu">
                            <div class="sub-menu">
                                <ul>
                                    <li class="question">
                                        <a href="tel:+8809666737373">
                                            CALL US: +8809666737373
                                        </a>
                                    </li>
                                    <li class="social-icons hidden">
                                        <a class="social facebook" href="https://www.facebook.com/dyntatbd/"
                                           target="_blank">
                                        <span> <img src="{{asset('public/assets/images/facebook.png')}}"
                                                    style="width: 1.3em;" alt="Facebook"></span>
                                        </a>
                                        <a class="social youtube"
                                           href="https://www.youtube.com/channel/UCNz8x8dIfldAPiumTUsh0MQ" target="_blank">
                                        <span> <img src="{{asset('public/assets/images/youtube.png')}}"
                                                    style="width: 1.3em;" alt="Youtube"></span>

                                        </a>
                                        <a class="social instagram" href="https://www.instagram.com/dyntat.bd"
                                           target="_blank">
                                        <span> <img src="{{asset('public/assets/images/instagram.png')}}"
                                                    style="width: 1.3em;" alt="Facebook"></span>

                                        </a>
                                    </li>
                                    @if(Auth::check() && $user = Auth::user())
                                    <li class="login">
                                        <a href="{{route('user.profile')}}">
                                            @if($userImg = json_decode($user->picture) )
                                            <img src="{{adminUrl($userImg->thumb)}}">
                                            @else
                                            <svg class="svg-stroke-container" width="24" height="22" viewBox="0 0 24 22" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M.5 21.5c.66-1.305 2.085-2.274 5.085-3.456 2.957-1.219 3.436-2.088 3.436-3.7 0-.38-.072-.472-.285-.749-.303-.39-.716-.924-.97-2.308l-.029-.126c-.618-.341-.972-.808-1.062-2.194 0-.688.192-1.115.384-1.366a52.882 52.882 0 0 1-.241-2c-.066-.879.19-2.286 1.124-3.405C8.588 1.423 9.818.5 12.014.5c2.273 0 3.52.963 4.166 1.77.91 1.134 1.122 2.51 1.03 3.343a19.481 19.481 0 0 1-.231 1.993c.187.249.375.661.375 1.318-.09 1.43-.444 1.896-.986 2.2l-.102.15c-.23 1.409-.659 1.945-.97 2.338-.216.272-.289.363-.289.732 0 1.564.497 2.47 3.447 3.704 2.786 1.098 4.204 2.054 5.046 3.403" stroke="#ff4500" stroke-width="2" fill-rule="nonzero" fill="none" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                            @endif
                                            {{$user->name}}
                                        </a>
                                    </li>
                                    <li class="logout">
                                        <a href="" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();"><span
                                                    class="glyphicon glyphicon-log-out"></span>Logout</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                            {{ csrf_field() }}
                                        </form>

                                    </li>
                                    @else
                                    <li class="login">
                                        <a href="#" id="login-user-login2">

                                            <svg class="svg-stroke-container" width="24" height="22" viewBox="0 0 24 22" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M.5 21.5c.66-1.305 2.085-2.274 5.085-3.456 2.957-1.219 3.436-2.088 3.436-3.7 0-.38-.072-.472-.285-.749-.303-.39-.716-.924-.97-2.308l-.029-.126c-.618-.341-.972-.808-1.062-2.194 0-.688.192-1.115.384-1.366a52.882 52.882 0 0 1-.241-2c-.066-.879.19-2.286 1.124-3.405C8.588 1.423 9.818.5 12.014.5c2.273 0 3.52.963 4.166 1.77.91 1.134 1.122 2.51 1.03 3.343a19.481 19.481 0 0 1-.231 1.993c.187.249.375.661.375 1.318-.09 1.43-.444 1.896-.986 2.2l-.102.15c-.23 1.409-.659 1.945-.97 2.338-.216.272-.289.363-.289.732 0 1.564.497 2.47 3.447 3.704 2.786 1.098 4.204 2.054 5.046 3.403" stroke="#ff4500" stroke-width="2" fill-rule="nonzero" fill="none" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>


                                            <span style="color: orangered">Login</span>
                                        </a>
                                        {{--<a href="{{ route('adminFacebook') }}"--}}
                                               {{--target="_blank"><span> <img--}}
                                        {{--src="{{asset('public/assets/images/facebook.png')}}"--}}
                                        {{--style="width: 1.3em;" alt="Facebook"></span></a>--}}
                                        {{--<a href="{{ route('adminHome') }}"><span> <img--}}
                                        {{--src="https://dhqbrvplips7x.cloudfront.net/webchat/1.0.23/agent-e202505f.png"--}}
                                        {{--style="width: 1.3em;" alt="Facebook"></span></a>--}}
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>



                        <ul class="main-menu">
                            <li><a href="{{ route('home') }}">Home<span class="subtext">start</span></a></li>

                            <li><a href="{{ route('about.front') }}">About Us<span class="subtext">Who We Are</span></a>
                                <ul class="submenu">
                                    <li><a href="{{ route('about.front') }}"> Company</a></li>
                                    <li><a href="{{ route('management.front') }}"> Management & Leadership</a></li>
                                    <li><a href="{{ route('footprint.front') }}"> Our Global Footprint</a></li>
                                    <li><a href="{{ route('publications.front') }}">Publication</a></li>
                                    <li><a href="{{route('media.front')}}">Media</a></li>
                                </ul>
                            </li>


                            <li><a href="{{ route('laboratory.front') }}">Laboratory<span class="subtext">what we do</span></a>
                                <ul class="submenu">
                                    <li><a href="{{ route('laboratory.front') }}">About Lab</a></li>
                                    <li><a href="{{ route('accreditation.front') }}">Quality</a></li>
                                    <li><a href="{{ route('technologies.front') }}">Technologies</a></li>
                                    <li><a href="{{ route('instruments.front') }}">Instruments</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('testmenu') }}">Services<span
                                            class="subtext">what we offer</span></a>
                                <ul class="submenu">
                                    {{--<li><a href="{{ route('test.all.front') }}">Book A Test Now</a></li>--}}
                                    <li><a href="{{ route('testmenu') }}">Test Menu</a></li>
                                    <li><a href="{{ route('disorders.front') }}">Disorders</a></li>
                                    <li><a href="{{ route('reportTrack.front') }}">Report Track</a></li>
                                    <li><a href="{{ route('ServiceProvider.front') }}">Nearest Service Provider</a></li>
                                    <li><a href="{{ route('bothlocation.front') }}">Booth Location</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('health.all.front') }}">Health Screening<span class="subtext">special offer</span></a>
                                <ul class="submenu">
                                    <li><a href="{{ route('health.all.front') }}">Health Screening Packages</a></li>
                                    <li><a href="{{ route('others.all.front') }}">Other Packages</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('opportunitie.front') }}">Opportunity
                                    <span class="subtext">what we bring</span></a>
                                <ul class="submenu">
                                    <li><a href="{{ route('career') }}">Career</a></li>
                                    <li><a href="{{ route('opportunitie.front') }}">Be Our Partner</a></li>

                                </ul>
                            </li>
                            {{--<li><a href="{{route('offers.front')}}">Offer<span class="subtext">Special Offer</span></a></li>--}}

                            {{--<li><a href="{{ route('test.all.front') }}">Online Test<span--}}
                                    {{--class="subtext">Book Your Test</span></a></li>--}}

                            <li><a href="{{ route('contact.front') }}">Contact Us<span
                                            class="subtext">write to us</span></a>
                            </li>

                        </ul>

                    </div>
                </div>

                <div class="book_now">
                    <a href="http://www.androidpin.com/testmenu" id="ctabutton" class="sh-component ctabutton kl-cta-ribbon " data-target="smoothscroll" itemprop="url"><strong>Book</strong>Now
                        <svg version="1.1" class="trisvg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" preserveAspectRatio="none" width="14px" height="5px" viewBox="0 0 14.017 5.006" enable-background="new 0 0 14.017 5.006" xml:space="preserve"><path fill-rule="evenodd" clip-rule="evenodd" d="M14.016,0L7.008,5.006L0,0H14.016z"></path></svg>
                    </a> </div>


            </div>
        </nav>
        {{--todo::Parvez call.blade--}}
        {{--@include('front.layouts.call')--}}
        @include('front.layouts.login')
        @include('front.layouts.sidebutton')
        @include('front.layouts.socialbutton')
    </header>

    <script>
        var navbar = document.getElementById("sub-menu-social");
        var sticky = navbar.offsetTop;
        var id = document.getElementById("sub-menu-social");
        var id_social = document.getElementById("id-social-button");

        function myFunction() {
            if (window.pageYOffset >= 200) {
                id.classList.remove("hidden");
                id_social.classList.add("hidden");
            } else {
                id.classList.add("hidden");
                id_social.classList.remove("hidden");

            }
        }
    </script>


    @if( (Route::currentRouteName() == 'home' ) )
    @include('front.layouts.slider')
    @endif

    @if( (Route::currentRouteName() != 'home' && Route::currentRouteName() != 'career') )
    @include('front.layouts.breadcrumbs')
    @endif

    <section class="service-postsec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-content">
                        @if($publications)
                        @foreach($publications as $publication)
                        @section('title') {{$publication->name}} -Dyntat Bangladesh Limited @stop
                        @section('pagetitle') Publicaion Details @stop
                        @section('metas')
                        <meta name="description"
                              content="{{$publication->meta_description}}">
                        @stop
                        <div class="publication-bb-custom-wrapper">
                            <h3><a>{{$publication->name}}</a></h3>



                            <nav>
                                <!--<a id="bb-nav-first" href="#" class="bb-custom-icon bb-custom-icon-first">
                                    <i class="fa fa-angle-double-left" aria-hidden="true"></i>
                                </a>-->
                                <a id="bb-nav-prev" href="#" class="bb-custom-icon bb-custom-icon-arrow-left">
                                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                                </a>
                                <a id="bb-nav-next" href="#" class="bb-custom-icon bb-custom-icon-arrow-right">
                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                </a>
                                <!--<a id="bb-nav-last" href="#" class="bb-custom-icon bb-custom-icon-last">
                                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                </a>-->
                            </nav>

                            <div id="bb-bookblock" class="bb-bookblock">
                                @if($pages = json_decode($publication->book))
                                @foreach($pages as $page)
                                <div class="bb-item">
                                    <img src="{{adminUrl($page->pageImage)}}" alt="{{$page->pageName}}"/>
                                </div>
                                @endforeach
                                @endif
                            </div>

                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </section>

    <footer class="footer-warp">
        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <section class="section_top">
                        <div class="inner">
                            <!--Footer Load From Footer.htm-->
                            <div id="Footercontent">

                                <div class="block_footer_menu">
                                    <ul>
                                        <li><a href="{{ route('home') }}">Home<span class="subtext">start</span></a></li>

                                        <li><a href="{{ route('about.front') }}">About Us<span class="subtext">Who We Are</span></a>
                                        </li>


                                        <li><a href="{{ route('laboratory.front') }}">Laboratory<span
                                                        class="subtext">what we do</span></a>
                                        </li>
                                        <li><a href="{{ route('test.all.front') }}">Services<span
                                                        class="subtext">what we offer</span></a></li>

                                        <li><a href="{{ route('opportunitie.front') }}">Opportunity
                                                <span class="subtext">what we bring</span></a></li>

                                        <li><a href="http://androidpin.com/blog" target="_blank">Blog<span
                                                        class="subtext">Our Blog</span></a></li>

                                        <li><a href="{{ route('contact.front') }}">Contact Us<span
                                                        class="subtext">write to us</span></a></li>

                                    </ul>
                                </div>

                                <div class="block_footer_contacts" style="line-height: 1em;">
                                    <p class="phone">Tel: <span class="num"><span>(+88) 09666737373 / (+88) 01944443850 / (+88) 01944443851 </span></span>
                                    </p>

                                    <p class="address">Email: info@dyntatbd.com </br>
                                        Address: Confidence Centre (12th floor), Kha-9,<br> Pragoti Sarani,
                                        Shazadpur, Gulshan, Dhaka -1212, Bangladesh</p>
                                </div>

                                <div class="clearboth"></div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-sm-12">
                        <div class="footerbtm-left">
                            <span class="copy-msg">Copyright @ 2017 | Dr A Velumani - Dyntat Bangladesh Limited. All rights reserved.</span>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12">
                        <div class="footerbtm-right">
                            <ul class="footer-menu">

                                <li class="social-icons">Follow Us :
                                    {{--<a class="social facebook" href="https://www.facebook.com/dyntatbd/" target="_blank"><i--}}
                                        {{--class="fa fa-facebook-square" aria-hidden="true"--}}
                                        {{--style="margin-right: 0px;color: blue;"></i></a>--}}
                                    <a class="social facebook" href="https://www.facebook.com/dyntatbd/" target="_blank">
                                    <span> <img src="{{asset('public/assets/images/facebook.png')}}"
                                                style="width: 1.5em;" alt="Facebook"></span>
                                    </a>
                                    <a class="social youtube"
                                       href="https://www.youtube.com/channel/UCNz8x8dIfldAPiumTUsh0MQ" target="_blank">
                                    <span> <img src="{{asset('public/assets/images/youtube.png')}}"
                                                style="width: 1.5em;" alt="Youtube"></span>

                                    </a>
                                    <a class="social instagram" href="https://www.instagram.com/dyntat.bd"
                                       target="_blank">
                                    <span> <img src="{{asset('public/assets/images/instagram.png')}}"
                                                style="width: 1.5em;" alt="Facebook"></span>

                                    </a>
                                </li>


                                <li><a href="{{ route('terms.front') }}">Terms of use</a></li>
                                <li><a href="{{ route('privacyPolicy.front') }}">Privacy Policy</a></li>
                                <li><a href="{{ route('sitemap.front') }}">Sitemap</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

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
<script>
    var Page = (function () {

        var config = {
                $bookBlock: $('#bb-bookblock'),
                $navNext: $('#bb-nav-next'),
                $navPrev: $('#bb-nav-prev'),
                $navFirst: $('#bb-nav-first'),
                $navLast: $('#bb-nav-last')
            },
            init = function () {
                config.$bookBlock.bookblock({
                    speed: 800,
                    shadowSides: 0.8,
                    shadowFlip: 0.7
                });
                initEvents();
            },
            initEvents = function () {

                var $slides = config.$bookBlock.children();

                // add navigation events
                config.$navNext.on('click touchstart', function () {
                    config.$bookBlock.bookblock('next');
                    return false;
                });

                config.$navPrev.on('click touchstart', function () {
                    config.$bookBlock.bookblock('prev');
                    return false;
                });

                config.$navFirst.on('click touchstart', function () {
                    config.$bookBlock.bookblock('first');
                    return false;
                });

                config.$navLast.on('click touchstart', function () {
                    config.$bookBlock.bookblock('last');
                    return false;
                });

                // add swipe events
                $slides.on({
                    'swipeleft': function (event) {
                        config.$bookBlock.bookblock('next');
                        return false;
                    },
                    'swiperight': function (event) {
                        config.$bookBlock.bookblock('prev');
                        return false;
                    }
                });

                // add keyboard events
                $(document).keydown(function (e) {
                    var keyCode = e.keyCode || e.which,
                        arrow = {
                            left: 37,
                            up: 38,
                            right: 39,
                            down: 40
                        };

                    switch (keyCode) {
                        case arrow.left:
                            config.$bookBlock.bookblock('prev');
                            break;
                        case arrow.right:
                            config.$bookBlock.bookblock('next');
                            break;
                    }
                });
            };

        return {init: init};

    })();
    Page.init();
</script>
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