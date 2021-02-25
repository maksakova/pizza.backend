@extends('layouts.front')

@section('content')
    <main class="map">
        <Menu simple="simple"/>
        <Menu simple="simple"/>
        <div class="container">
            <img src="/img/common/success.svg" class="success__img">
            <h1>Благодарим, что выбрали нас!</h1>
            <p>Ваш заказ <span>№123</span> будет приготовлен и доставлен в течение <span>60-90 минут</span></p>
            <router-link to="/" class="button">Отлично, жду!</router-link>
        </div>
    </main>
@endsection
