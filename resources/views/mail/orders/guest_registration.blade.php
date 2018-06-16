@component('mail::message')
    <body>
    <div style="padding: 15px;">
        <div style="text-align: center;font-size: 27px;padding-bottom: 9px;">{{"HI! ".$user->name}}</div>
        <p>THANK YOU FOR CREATING A CUSTOMER ACCOUNT AT THYROCARE BANGLADESH LIMITED.</p>
        <hr>
        <div>
            <p>YOUR LOGIN DETAILS</p>
            <p>
                {{"HERE ARE YOUR LOGIN DETAILS:"}}
            </p>
            <p>
                {{"E-mail address: ".$user->email}}
            </p>
            <p>{{"Password: ".$user->password}}</p>
        </div>
        <div>
            <p>
                Please sign in and update your information and password.
            </p>
        </div>
        <div>
            <p>
                IMPORTANT SECURITY TIPS:
            </p>
            <ul>
                <li style="color: #74787E;font-weight: 500;font-family: Open-sans, sans-serif;font-size: 16px;">Always
                    keep your account details safe.
                </li>
                <li style="color: #74787E;font-weight: 500;font-family: Open-sans, sans-serif;font-size: 16px;">Never
                    disclose your login details to anyone.
                </li>
                <li style="color: #74787E;font-weight: 500;font-family: Open-sans, sans-serif;font-size: 16px;">Change
                    your password regularly.
                </li>
                <li style="color: #74787E;font-weight: 500;font-family: Open-sans, sans-serif;font-size: 16px;">Should
                    you suspect someone is using your account illegally, please notify us immediately.
                </li>
            </ul>
        </div>
        <div style="color: #74787E;font-weight: 500;font-family: Open-sans, sans-serif;font-size: 16px;">
            You can now place orders on our website <a href="http://www.dyntatbd.com/booktest">Dyntat Bangladesh
                Limited</a>
        </div>
        <div style="color: #74787E;font-weight: 500;font-family: Open-sans, sans-serif;font-size: 16px;padding-top: 10px;">
            <div style="padding-bottom: 8px;">Thanks,</div>
            <div style="padding-bottom: 16px;"> {{ config('app.name') }}
                <div>
                    <address>Confidence Centre (12th floor), Kha-9,<br>
                        Pragoti Sarani, Shazadpur, Gulshan,<br>
                        Dhaka -1212, Bangladesh
                    </address>
                    <a href="tel:+8809666737373">(+88) 09666737373</a> / <a href="tel:+8801764403959">(+88)
                        01764403959</a> <br><a href="tel:+8801712369923">(+88) 01712369923</a><br>
                    <a href="mailto: info@dyntatbd.com">info@dyntatbd.com</a>
                </div>
            </div>
        </div>
    </div>
    </body>
@endcomponent
