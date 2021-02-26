@extends('layouts.front')

@section('content')
    <main class="success">
        <Menu simple="simple"/>
        <Menu simple="simple"/>
        <div class="container">
            <img src="/img/common/success.svg" class="success__img">
            <h1>Благодарим, что выбрали нас!</h1>
            <p>Ваш заказ <span>№{{$_GET['order']}}</span> будет приготовлен и доставлен в течение <delivery-time/></p>
            <router-link to="/" class="button">Отлично, жду!</router-link>
        </div>
    </main>
@endsection
