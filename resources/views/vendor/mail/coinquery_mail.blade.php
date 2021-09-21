@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => config('app.url')])
{{ config('app.name') }}
@endcomponent
@endslot

{{-- Body --}}
{{ $slot }}

{{-- Subcopy --}}
@isset($subcopy)
@slot('subcopy')
@component('mail::subcopy')
You have got an email from : {{ $name }} <br><br>

User details: <br><br>

Name: {{ $name }} <br>
Email: {{ $email }} <br>
Phone: {{ $phone }} <br>
Subject: {{ $subject }} <br>
Address: {{ $address }} <br><br>

Thanks
@endcomponent
@endslot
@endisset

{{-- Footer --}}
@slot('footer')
@component('mail::footer')
© {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')
@endcomponent
@endslot
@endcomponent