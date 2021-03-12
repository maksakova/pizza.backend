@extends('layouts.front')

@section('content')
    <main class="success">
        <the-menu simple="simple"></the-menu>
        <div class="container">
            <img src="/img/common/success.svg" class="success__img">
            <h1>Благодарим, что выбрали нас!</h1>
            <p>Ваш заказ <span>№{{app('request')->input('order')}}</span> будет приготовлен и доставлен в течение <delivery-time/></p>
            <a href="/" class="button">Отлично, жду!</a>
        </div>
    </main>
@endsection
