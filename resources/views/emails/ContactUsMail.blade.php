@component('mail::message')
# Hello Admin,

You Have New Query From {{$body['name']}},

<p>Email: <b><i>{{$body['email']}}</i></b></p>
<p>Subject: <b><i>{{$body['subject']}}</i></b></p>
<p>Message: <b><i>{{$body['message']}}</i></b></p>

@component('mail::button', ['url' => $body['url']])
View In Admin Area
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
