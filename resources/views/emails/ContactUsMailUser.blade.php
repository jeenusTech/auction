@component('mail::message')
# Hello {{$body['name']}},

<p><b><i>{{$body['message']}}</i></b></p>

@component('mail::button', ['url' => $body['url']])
Latest Auction
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
