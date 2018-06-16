<section class="section_slider_1">
    <div class="slider_line_1"></div>
    <div class="slider_line_2"></div>
    <div id="slider" class="slider">

        @if($sliderAll)
            @foreach( $sliderAll as $slider )
                <div class="oneByOne_item">
                    <a href="{{ $slider->link }}" target="_blank">
                        <img src="{{ adminUrl($slider->thumb) }}" alt="Slider Image" class="pic_2_1"
                             data-ease-type="" style="margin-left: 0px;left: 0%;"/>
                    </a>
                </div>
        @endforeach
    @endif


    <!--Slider 1-->
        <div class="oneByOne_item">
            <a href="{{route('media.front')}}"><img
                        src="{{ asset('public/assets/slider/images/home/new_video_cover.png')}}" alt="" class="pic_1_1"
                        data-ease-type="bounceInRight"/></a>
            <div class="text_1_1" data-ease-type="fadeInUp"><b>Corporate Video</b></div>

            <div class="text_1_3" data-ease-type="fadeInUp">Watch Dyntat Bangladesh Corporate Video</div>
            <div class="text_2_4" data-ease-type="fadeInUp"><a href="{{route('media.front')}}"
                                                               class="general_button big arrow_right"><span>Watch Video</span></a>
            </div>
        </div>

        <!--Slider 1-->
        <div class="oneByOne_item">
            <img src="{{ asset('public/assets/slider/images/home/pic_slider_1_1_1.png')}}" alt="" class="pic_1_1"
                 data-ease-type="bounceInRight"/>
            <img src="{{ asset('public/assets/slider/images/home/pic_slider_1_1_2.png')}}" alt="" class="pic_1_2"
                 data-ease-type="bounceInRight"/>
            <div class="text_1_1" data-ease-type="fadeInUp"><b>A Unique Laboratory</b></div>

            <div class="text_1_3" data-ease-type="fadeInUp">OVER 5,000 SAMPLES AND ABOVE 20,000 INVESTIGATIONS ARE
                PROCESSED EVERYDAY
            </div>
            <div class="text_2_4" data-ease-type="fadeInUp"><a href="{{route('about.front')}}"
                                                               class="general_button big arrow_right"><span>Know More</span></a>
            </div>
        </div>
        <!--Slider 2-->
        <div class="oneByOne_item">
            <img src="{{ asset('public/assets/slider/images/home/pic_slider_1_3_1.png')}}" alt="" class="pic_3_1"
                 data-ease-type="bounceInDown"/>
            <img src="{{ asset('public/assets/slider/images/home/pic_slider_1_3_2.png')}}" alt="" class="pic_3_2"
                 data-ease-type="bounceInDown"/>
            <img src="{{ asset('public/assets/slider/images/home/pic_slider_1_3_3.png')}}" alt="" class="pic_3_3"
                 data-ease-type="bounceInDown"/>
            <div class="text_3_1" data-ease-type="fadeInLeft"></div>
            <div class="text_3_2" data-ease-type="fadeInLeft">ROBUST AUTOMATION</div>
            <div class="text_3_3" data-ease-type="fadeInLeft">WELL EQUIPPED DIAGNOSTIC LABORATORY</div>
            <div class="text_3_4" data-ease-type="fadeInLeft">Barcoded and Bidirectionally Interfaced system and an
                intelligent laboratory information system (LIS) | Helps improved quality and reduced turnaround time
            </div>
            <div class="text_3_5" data-ease-type="fadeInLeft"><a href="{{route('laboratory.front')}}"
                                                                 class="general_button big arrow_right"><span>Know More</span></a>
            </div>
        </div>
        <!--Slider 3-->

        <div class="oneByOne_item">
            <img src="{{ asset('public/assets/slider/images/home/pic_slider_1_2_1.png')}}" alt="" class="pic_2_1"
                 data-ease-type="fadeInRight"/>
            <img src="{{ asset('public/assets/slider/images/home/pic_slider_1_2_2.png')}}" alt="" class="pic_2_2"
                 data-ease-type="fadeInRight"/>
            <div class="text_3_1" data-ease-type="fadeInLeft"></div>
            <div class="text_3_2" data-ease-type="fadeIn">OPPORTUNITY IN HEALTHCARE</div>
            <div class="text_3_3" data-ease-type="fadeIn">BECOME OUR HEALTHCARE PARTNER</div>
            <div class="text_3_4" data-ease-type="fadeIn">Best Brand | Best Margins | Best Support | Less Investment |
                End to End Training | Fast Growing Industry
            </div>
            <div class="text_3_5" data-ease-type="fadeIn"><a href="{{route('HealthcarePartner')}}"
                                                             class="general_button big arrow_down"><span>Know More</span></a>
            </div>
        </div>
        <!--Slider 4-->
        <div class="oneByOne_item">
            <img src="{{ asset('public/assets/slider/images/home/pic_slider_1_4_1.png')}}" alt="" class="pic_3_1"
                 data-ease-type="bounceInUp"/>
            <img src="{{ asset('public/assets/slider/images/home/pic_slider_1_4_2.png')}}" alt="" class="pic_3_2"
                 data-ease-type="bounceInUp"/>
            <!--img src="images/home/pic_slider_1_4_3.png" alt="" class="pic_3_3" data-ease-type="bounceInUp" /-->
            <div class="text_3_1" data-ease-type="fadeInLeft"></div>
            <div class="text_3_2" data-ease-type="fadeInLeft">Quality</div>
            <div class="text_3_3" data-ease-type="fadeInLeft">WE NEVER COMPROMISE ON QUALITY</div>
            <div class="text_3_4" data-ease-type="fadeInLeft">Dyntat Technologies Limited is certified by College of
                American Pathologist (CAP) and International Organization for Standardization (ISO)
            </div>
            <div class="text_3_5" data-ease-type="fadeInLeft"><a href="{{route('accreditation.front')}}"
                                                                 class="general_button big arrow_right"><span>Know More</span></a>
            </div>
        </div>

        <!--Slider 5-->
        <div class="oneByOne_item">
            <img src="{{ asset('public/assets/slider/images/Map.jpg')}}" width="416" alt="Our Global Footprint"
                 class="pic_2_2" data-ease-type="fadeInRight">

            <div class="text_3_1" data-ease-type="fadeInLeft"></div>
            <div class="text_3_2" data-ease-type="fadeInLeft">Our Global Footprint</div>
            <div class="text_3_3" data-ease-type="fadeInLeft">Three labs - uniform cost and quality to serve over a
                quarter of global population
            </div>
            <div class="text_3_4" data-ease-type="fadeInLeft" style="margin-top:25px;">Unmatched regional and local
                network and logistics
            </div>
            <div class="text_3_5" data-ease-type="fadeIn"><a href="{{route('footprint.front')}}"
                                                             class="general_button big arrow_down"><span>View Map</span></a>
            </div>
        </div>
        <div class="oneByOne_item">
            <a href="http://androidpin.com/testmenu" target="_blank">
                <img src="http://androidpin.com/public/adminStroage/slider/sl-3-22338.jpg" alt="Slider Image" class="pic_2_1" data-ease-type="" style="margin-left: 0px;left: 0%;">
            </a>
        </div>
    </div>


</section>
@section('scripts')

    {{--<script type="text/javascript" src="{{ asset('public/assets/slider/onebyone/jquery.js') }}"></script>--}}
    <script type="text/javascript" src="{{ asset('public/assets/slider/onebyone/jquery.onebyone.min.js') }}"></script>
    <script type="text/javascript">
        $(function () {
            $('#slider').oneByOne({
                width: 2000,
                className: 'oneByOne1',
                easeType: 'bounceInRight',
                slideShow: true,
                slideShowDelay: 5000,
                showArrow: true,
                showButton: true,
                responsive: true
            });
        });
    </script>
@endsection



{{--<section class="main-slider">--}}
{{--<div class="pogoSlider" id="js-main-slider">--}}
{{--<div class="abs" style="margin-top:50px;float: right;z-index: 100;transform: rotate(45deg);-ms-transform: rotate(45deg);-webkit-transform: rotate(45deg);">--}}
{{--<a href="{{route('offers.front')}}">Special Offer</a>--}}
{{--</div>--}}
{{--@if($sliderAll)--}}
{{--@foreach( $sliderAll as $slider )--}}
{{--todo::Parvez Slider--}}
{{--<div>--}}
{{--<a href="{{$slider->link}}" target="_blank">--}}
{{--<div class="pogoSlider-slide" data-transition="shrinkReveal" data-duration="1000"--}}
{{--style="background-image:url( {{ adminUrl($slider->thumb) }} );"></div>--}}
{{--</a>--}}
{{--</div>--}}
{{--@endforeach--}}
{{--@endif--}}

{{--</div><!-- .pogoSlider -->--}}
{{--</section>--}}