<div class="col-md-4 col-lg-12">
    <a href="/discounts/{{ $discount->slug }}" class="discount-other">
        <img class="discount-other__img" src={{ $discount->img }}>
        <div class="discount-other__text">
            <h3>{{ $discount->name }}</h3>
            <p class="discount-other__time">{{ $discount->time }}</p>
        </div>
    </a>
</div>
