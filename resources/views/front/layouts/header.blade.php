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
                                            document.getElementById('logout-form').submit();"><span></span>Logout</a>
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





                                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            @if($userImg = json_decode($user->picture) )
                                                <img src="{{adminUrl($userImg->thumb)}}">
                                            @else
                                                <svg class="svg-stroke-container" width="24" height="22" viewBox="0 0 24 22" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M.5 21.5c.66-1.305 2.085-2.274 5.085-3.456 2.957-1.219 3.436-2.088 3.436-3.7 0-.38-.072-.472-.285-.749-.303-.39-.716-.924-.97-2.308l-.029-.126c-.618-.341-.972-.808-1.062-2.194 0-.688.192-1.115.384-1.366a52.882 52.882 0 0 1-.241-2c-.066-.879.19-2.286 1.124-3.405C8.588 1.423 9.818.5 12.014.5c2.273 0 3.52.963 4.166 1.77.91 1.134 1.122 2.51 1.03 3.343a19.481 19.481 0 0 1-.231 1.993c.187.249.375.661.375 1.318-.09 1.43-.444 1.896-.986 2.2l-.102.15c-.23 1.409-.659 1.945-.97 2.338-.216.272-.289.363-.289.732 0 1.564.497 2.47 3.447 3.704 2.786 1.098 4.204 2.054 5.046 3.403" stroke="#ff4500" stroke-width="2" fill-rule="nonzero" fill="none" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                            @endif
                                            {{$user->name}}
                                        </button>


              <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <li><a href="{{route('user.orders')}}">My orders</a></li>
                <li><a href="{{route('user.profile')}}">Profile</a></li>
                 <li>
                        <a href="" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();"><span></span>Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                              style="display: none;">
                            {{ csrf_field() }}
                        </form>

                    </li>
                </ul>

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