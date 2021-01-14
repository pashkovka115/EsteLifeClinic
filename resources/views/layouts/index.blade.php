<!DOCTYPE html>
<html lang="ru">
<head>

    <meta charset="utf-8">
    <!-- <base href="/"> -->

    <title>@section('title') Estelife-Clinic @show</title>
    <meta name="description" content="">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('/favicon/favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('/favicon/android-chrome-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="512x512"  href="{{ asset('/favicon/android-chrome-512x512.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/favicon/favicon-16x16.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/favicon/favicon-32x32.png') }}">
    <link rel="manifest" href="{{ asset('/favicon/site.webmanifest') }}">

    <!-- Custom Browsers Color Start -->
    <meta name="theme-color" content="#14387F">
    <!-- Custom Browsers Color End -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{ asset('css/main.min.css') }}">
    <link href="{{ URL::asset('css/temp.css')}}" rel="stylesheet" type="text/css" />
    {{ option('script_head')->val }}
    @yield('header_style')

</head>

<body>

@include('partials.header')

@include('partials.top_menu')

@yield('content')

@include('partials.footer')

@yield('footer_script')

</body>
</html>




