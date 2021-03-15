@extends('layouts.front')

@section('content')
    <main class="success">
        <the-menu simple="simple"></the-menu>
        <div class="container">
            @if(app('request')->input('wsb_tid') || app('request')->input('order'))
                <img src="/img/common/success.svg" class="success__img">
                <h1>Благодарим, что выбрали нас!</h1>
                <p>Ваш заказ <span>№{{app('request')->input('order')}}{{app('request')->input('wsb_order_num')}}</span> будет приготовлен и доставлен в течение <delivery-time/></p>
                <a href="/" class="button">Отлично, жду!</a>
            @else
                <h1>Платеж отклонен</h1>
                <p>Вашему заказу присвоен номер <span>№{{app('request')->input('order')}}{{app('request')->input('wsb_order_num')}}</span>. <br>Если хотите оплатить его наличными - обратитесь к оператору и назовите номер заказа</p>
                <a href="tel:{{$contacts['phone']->value}}" class="button">Позвонить</a>
            @endif
        </div>
    </main>
@endsection
