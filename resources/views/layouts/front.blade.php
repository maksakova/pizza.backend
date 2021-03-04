<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta id="post_token" name="csrf-token" content="{{ csrf_token() }}" />

    <title>Pizzamarket</title>
    <link rel="icon" href="favicon.ico">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('fonts/stylesheet.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    @include('front.parts.header')
    @yield('content')
    @include('front.parts.footer')
</div>

<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;coordorder=latlong&amp;apikey=035fdfb1-becf-436d-a7a7-6f38a995941e" type="text/javascript"></script>
<script type="text/javascript" src="https://yandex.st/jquery/2.2.3/jquery.min.js"></script>
<script src="{{mix('js/app.js')}}"></script>
</body>
</html>
