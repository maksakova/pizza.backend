@extends('layouts.front')

@section('content')
    <main class="map">
        <the-menu simple="simple"></the-menu>
        <div class="container">
            <h1>{{ $page->name }}</h1>
            <div class="row">
                <div class="col-lg-8">
                    <div class="text-page">
                        {!! $page->content !!}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="howto__map">
                        <a href="/map" class="button">Проверить зону доставки</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
