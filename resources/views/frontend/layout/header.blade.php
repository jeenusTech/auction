<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{{site_info() !=null?site_info()->meta_description:'Baldwin’s currently boasts the most comprehensive stock of numismatic material in the UK, which is updated on a regular basis'}}."/>


    <title>{{ site_navigation() ? ucfirst(str_replace(['-','_'], ' ',site_navigation())). ' - '.(site_info() !=null?site_info()->title:config('app.name')) : config('app.name') }}</title>

    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('/frontend/icons/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('/frontend/icons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('/frontend/icons/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('/frontend/icons/site.webmanifest')}}">
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