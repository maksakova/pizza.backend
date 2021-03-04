@extends('layouts.front')

@section('content')
    <main class="map">
        <the-menu simple="simple"></the-menu>
        <Menu simple="simple"/>
        <div class="container">
            <h1>{{ $page->name }}</h1>
            <div class="map__info">
                {!! $page->content !!}
                <div class="map__alert alert">
                    {!! $page->add !!}
                </div>
            </div>
            <div id="map" class="map__map"></div>
        </div>
    </main>
@endsection
