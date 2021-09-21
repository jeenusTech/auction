@component('mail::message')
# Hello Admin,

You Have New Query From {{$body['name']}},

<p>Email: <b><i>{{$body['email']}}</i></b></p>
<p>Subject: <b><i>{{$body['subject']}}</i></b></p>
<p>Contact: <b><i>{{$body['phone']}}</i></b></p>
<p>Address: <b><i>{{$body['address']}}</i></b></p>
<img src="{{getimg($body['image'])}}" width="175px" alt="query image">

@component('mail::button', ['url' => $body['url']])
View In Admin Panel
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
