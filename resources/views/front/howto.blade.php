@extends('layouts.front')

@section('content')
    <main class="howto">
        <the-menu simple="simple"></the-menu>
        <Menu simple="simple"/>
        <div class="container">
            <h1>{{ $page->name }}</h1>
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="howto__item">
                                <h2>{{$contacts['min']->value}} руб.</h2>
                                <p>Минимальная сумма заказа</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="howto__item">
                                <h2>{{$contacts['time']->value}}</h2>
                                <p>Доставка (только в г. Минске)</p>
                            </div>
                        </div>
                    </div>
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
