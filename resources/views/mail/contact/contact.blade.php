@component('mail::message')

You have mail From Thyrobd.<br>
Your Name   : {{$fromData['name']}} <br>
Your Number   : {{$fromData['number']}} <br>
Your Email   : {{$fromData['email']}} <br>
Your Message : {{$fromData['message']}}

@component('mail::button', ['url' => config('app.url')])
Visit Our Site
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
