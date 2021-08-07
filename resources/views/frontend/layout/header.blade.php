<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Baldwin’s currently boasts the most comprehensive stock of numismatic material in the UK, which is updated on a regular basis."/>


    <title>{{ View::hasSection('title') ? View::getSection('title') . ' - '.config('app.name') : config('app.name') }}</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <!-- =======================================================
  * Template Name: Dewi - v4.3.0
  * Template URL: https://bootstrapmade.com/dewi-free-multi-purpose-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  
</head>
<body id="frontpage">
@include('frontend.layout.navigation')

@yield('content')

@include('frontend.layout.footer')

<script>
    window.onload = function(){
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
        case 'info':
            swal("Info","{{ Session::get('message') }}","info");
            break;

        case 'warning':
            swal("Warning","{{ Session::get('message') }}","warning");
            break;

        case 'success':
            swal("Success","{{ Session::get('message') }}","success");
            break;

        case 'error':
            swal("Error","{{ Session::get('message') }}","error");
            break;
    }
  @endif
}
</script>