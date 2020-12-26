<!DOCTYPE html>
<html lang="ru">
<head>

    <meta charset="utf-8">
    <!-- <base href="/"> -->

    <title>@section('title') Estelife-Clinic @show</title>
    <meta name="description" content="">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Template Basic Images Start -->
    <meta property="og:image" content="path/to/image.jpg">
    <link rel="icon" href="{{ asset('img/favicon/favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicon/apple-touch-icon-180x180.png') }}">
    <!-- Template Basic Images End -->

    <!-- Custom Browsers Color Start -->
    <meta name="theme-color" content="#14387F">
    <!-- Custom Browsers Color End -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{ asset('css/main.min.css') }}">
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




