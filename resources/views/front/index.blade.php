@extends('layouts.front')

<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;coordorder=latlong&amp;apikey=035fdfb1-becf-436d-a7a7-6f38a995941e" type="text/javascript"></script>
<script type="text/javascript" src="https://yandex.st/jquery/2.2.3/jquery.js"></script>

@section('content')
    <router-view></router-view>
@endsection
