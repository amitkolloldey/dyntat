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