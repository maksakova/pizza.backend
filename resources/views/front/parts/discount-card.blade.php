<div class="col-lg-4 col-sm-6">
    <div class="discount-item">
        <img class="discount-item__img" src="{{ $discount->img }}">
        <div class="discount-item__text">
            <div class="discount-item__info">
                <h2>{{ $discount->name }}</h2>
                <p class="discount-item__time">{{ $discount->time }}</p>
            </div>
            <a href="/{{ $discount->slug }}" class="button">Подробнее</a>
        </div>
    </div>
</div>
