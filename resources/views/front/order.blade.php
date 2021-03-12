@extends('layouts.front')

@section('content')
    <main class="order">
        <the-menu simple="simple"></the-menu>
        <div class="container">

            <form class="row" method="POST" action="{{ route('front.orders.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="col-xl-9">
                    <order-blocks/>
                </div>
                <div class="col-xl-3 offset-xl-0 col-lg-6 offset-lg-3">
                    <div class="steps-order d-none d-xl-flex">
                        <div class="steps-order__item active">
                            <div class="steps-order__item__number">1</div>
                            Корзина
                        </div>
                        <div class="steps-order__item active">
                            <div class="steps-order__item__number">2</div>
                            Оформление заказа
                        </div>
                        <div class="steps-order__item">
                            <div class="steps-order__item__number">3</div>
                            Заказ принят
                        </div>
                    </div>
                    <h2>Мой заказ</h2>
                    <div><table-order/></div>
                    <button class="button button-order">
            <div>
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M9.00004 2.20459C5.25287 2.20459 2.20459 5.25287 2.20459 9.00004C2.20459 12.7472 5.25287 15.7955 9.00004 15.7955C12.7472 15.7955 15.7955 12.7472 15.7955 9.00004C15.7955 5.25287 12.7472 2.20459 9.00004 2.20459ZM9.00004 14.4773C5.98004 14.4773 3.52278 12.02 3.52278 9.00004C3.52278 5.98004 5.98004 3.52278 9.00004 3.52278C12.02 3.52278 14.4773 5.98004 14.4773 9.00004C14.4773 12.02 12.02 14.4773 9.00004 14.4773Z" fill="white" stroke="white" stroke-width="0.5"/>
              <path d="M8.34082 9.16947V9.27302L8.41404 9.34624L10.6992 11.6314C10.9566 11.8888 11.3739 11.8888 11.6312 11.6314C11.8886 11.374 11.8886 10.9567 11.6312 10.6994L9.659 8.72713V5.31827C9.659 4.95427 9.36392 4.65918 8.99991 4.65918C8.63591 4.65918 8.34082 4.95427 8.34082 5.31827V9.16947Z" fill="white" stroke="white" stroke-width="0.5"/>
            </svg>
            <delivery-time/>
            </div>
                        Оформить заказ
                    </button>
                </div>
            </form>
        </div>
    </main>
@endsection
