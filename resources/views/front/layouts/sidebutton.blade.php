<div class="side-button-div">
    <div class="quick-contact-div" id="myBtn">
        <a href="#">
            <div class="quick-contact">
                <img src="{{asset('public/assets/images/icon_call.png')}}" class="quick-contact-logo">
                <div class="quick-contact-text">
                    Quick Contact
                </div>
            </div>
        </a>
    </div>

    <div class="book-test-div">
        <a href="http://www.androidpin.com/testmenu">
            <div class="book-test">
                <img src="{{asset('public/assets/images/Book-Now_01.png')}}" class="book-test-logo">
                <div class="book-test-text">
                    Book A Test
                </div>
            </div>
        </a>
    </div>
</div>

<!-- The Modal -->
<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header quick_con">

            <ul>
                <li class="numbers">
                    <img src="{{asset('public/assets/images/icon_call.png')}}"
                         title="call us blue title" alt="call us blue alt">
                    <div class="content">

                         <a href="tel:+8809666737373"><span class="title">+8809666737373</span></a>


                    </div>
                    <span class="close" style="color: #2c3b41">&times;</span>
                </li>


                <li class="liveemail">
                    <a data-link_cat="contact pill" data-link_id="contact_pill_Email" data-link_meta="link_name:Email"
                       data-link_position="contact pill">
                        <img src="{{asset('public/assets/images/icon_email.png')}}"
                             alt="email">
                        <div class="content">

                            <span class="title"><a href="mailto:info@dyntatbd.com" target="_blank">info@dyntatbd.com</a></span>
                        </div>
                    </a>
                </li>
            </ul>


        </div>
        <div class="modal-body">
            <div id="fb-root"></div>
            <div class="fb-page" data-href="https://www.facebook.com/dyntatbd/" data-tabs="messages"
                 data-small-header="false" data-adapt-container-width="true" data-hide-cover="false"
                 data-show-facepile="true">
                <blockquote cite="https://www.facebook.com/dyntatbd/" class="fb-xfbml-parse-ignore"><a
                            href="https://www.facebook.com/dyntatbd/">Dyntat Bangladesh Limited</a></blockquote>
            </div>

        </div>
        <div class="modal-footer">
        </div>
    </div>

</div>
<script src="{{asset('public/assets/js/par_js/par_call.js')}}"></script>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=101091957258994";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>