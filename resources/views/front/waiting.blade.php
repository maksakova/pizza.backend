@extends('layouts.front')

@section('content')
    <main class="success">
        <the-menu simple="simple"></the-menu>
        <div class="container">
            <img src="/img/common/success.svg" class="success__img">
            <h1>Перейти к оплате</h1>
            <form action="https://securesandbox.webpay.by/" method="post">
                @csrf
                <input type='hidden' name='*scart'>
                <input type='hidden' name='wsb_storeid' value='{{$wsb_storeid}}'>
                <input type='hidden' name=wsb_notify_url value='{{$wsb_notify_url}}'>
                <input type='hidden' name='wsb_order_num' value='{{$wsb_order_num}}'>
                <input type='hidden' name='wsb_total' value='{{$wsb_total}}'>
                <input type='hidden' name='wsb_currency_id' value='{{$wsb_currency_id}}'>
                <input type='hidden' name='wsb_version' value='2'>
                <input type='hidden' name='wsb_seed' value='{{$wsb_seed}}'>
                <input type='hidden' name='wsb_signature' value='{{$wsb_signature}}'>
                <input type='hidden' name='wsb_return_url' value='{{$returnUrl}}'>
                <input type='hidden' name='wsb_cancel_return_url' value='{{$returnUrl}}'>
                <input type='hidden' name='wsb_invoice_item_name[0]' value='Оплата заказа #{{$wsb_order_num}}'>
                <input type='hidden' name='wsb_invoice_item_quantity[0]' value='1'>
                <input type='hidden' name='wsb_invoice_item_price[0]' value='{{$wsb_total}}'>
                <input type='hidden' name='wsb_test' value='{{$wsb_test}}'>

                <input type="hidden" name="name" value="{{$wsb_seed}}">
                <input type="hidden" name="phone" value="123">
                <input type="hidden" name="callback" value="1" />
                <input type="hidden" name="delivery_method" value="1" />
                <input type="hidden" value="deliveryStreet" name="street" />
                <input type="hidden" value="deliveryBuilding" name="building" />
                <input type="hidden" value="deliveryFlat" name="flat" />
                <input type="hidden" value="deliveryEntrance" name="entrance" />
                <input type="hidden" value="deliveryFloor" name="floor" />
                <input type="hidden" value="deliveryCode" name="code" />
                <input type="hidden" name="payment_method" value="1" />
                <input type="hidden" value="cashBackValue" name="cashback">
                <input type="hidden" value="comment" name="comment">
                <input type="hidden" name="products" value="true">
                <input type="hidden" name="cart_total" value="{{$wsb_total}}">
                <input type="hidden" name="delivery_price" value="5">
                <button class="button">Оплатить</button>
            </form>
        </div>
    </main>
@endsection
