@extends('layouts.front')

@section('content')
    <main class="discounts">
        <the-menu simple="simple"></the-menu>
        <div class="container">
            <a href="/discounts" class="discountsitem__back">
                <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.375 3.75L5.625 7.5L9.375 11.25" stroke="#828282" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Вернуться к акциям
            </a>
            <div class="row">
                <div class="col-lg-8">
                    <div class="discountsitem__item">
                        <img src="{{ $discount->img }}" class="discountsitem__img">
                        <div class="discountsitem__text">
                            <h1>{{ $discount->name }}</h1>
                            <div class="discountsitem__description">
                                <p>{{ $discount->content }}</p>
                            </div>
                            <p class="discount-item__time time">{{ $discount->time }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <h2>Другие акции</h2>
                    <div class="row">
                        @foreach($discounts as $discount)
                            @include('front.parts.discount-other')
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
<script>
    import Menu from "../../js/components/parts/Menu";
    export default {
        components: {
            Menu
        },
    }
</script>
