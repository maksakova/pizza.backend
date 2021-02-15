<template>
  <main class="discountsitem">
    <Menu simple="simple"/>
    <div class="container">
      <router-link to="/discounts" class="discountsitem__back">
        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M9.375 3.75L5.625 7.5L9.375 11.25" stroke="#828282" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        Вернуться к акциям
      </router-link>
      <div class="row">
        <div class="col-lg-8">
          <div class="discountsitem__item">
            <img src="@/assets/img/discounts/1.jpg" class="discountsitem__img">
            <div class="discountsitem__text">
              <h1>Скидка 20% на самовывоз</h1>
              <div class="discountsitem__description">
                <p>Большая пицца «4 сыра» плюс большая пицца «Пепперони» по будням с 9.00 до 11.00 стоит всего 650 ₽. Добавь пиццы в корзину и стоимость заказа уменьшится автоматически.</p>
              </div>
              <p class="discount-item__time time">Бессрочная акция</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <h2>Другие акции</h2>
          <div class="row">
            <DiscountOther v-for="discount in discounts" v-bind:key="discount.id" v-bind:item="discount"></DiscountOther>
          </div>
        </div>
      </div>
    </div>
  </main>
</template>

<script>
export default {
  name: "DiscountItem",
  data() {
    return {
      discounts: [
        {
          id: 1,
          name: 'Набор “Удачная ночь” за 35,30 руб.',
          time: 'до 31.12.2020',
          img: require('@/assets/img/discounts/2.jpg'),
        },
        {
          id: 2,
          name: 'Еще какая-то акция или скидка',
          time: 'до 31.12.2020',
          img: require('@/assets/img/discounts/3.jpg'),
        },
        {
          id: 3,
          name: 'Еще какая-то акция или скидка',
          time: 'Бессрочная акция',
          img: require('@/assets/img/discounts/4.jpg'),
        },
      ],
    }
  }
}
</script>

<style lang="sass">
@import "~@/assets/sass/main.sass"

.discountsitem
  padding: 0 0 40px
  h1
    font-size: 16px
    line-height: 19px
    color: $text
  h2
    font-size: 16px
    line-height: 19px
  &__back
    color: $text-light
    font-size: 12px
    line-height: 12px
    display: flex
    align-items: center
    margin-bottom: 10px
    svg
      margin-right: 6px
    &:hover
      color: $main
      svg path
        stroke: $main
  &__item
    background: $white
    border-radius: 10px
    margin-bottom: 30px
  &__img
    width: 100%
    border-radius: 10px
  &__text
    padding: 10px 10px 20px
    font-size: 12px
    line-height: 15px
    color: #4F4F4F
  .time
    margin-bottom: 0

@media (min-width: 768px)
  .discountsitem
    h2
      display: none

@media (min-width: 1200px)
  .discountsitem
    padding: 0 0 90px
    h1
      font-size: 20px
      line-height: 24px
      margin-bottom: 10px
    &__back
      font-size: 16px
      line-height: 19px
      color: #4F4F4F
      margin-bottom: 46px
      svg
        margin-right: 10px
        path
          stroke: #4F4F4F
    &__text
      padding: 40px
      font-size: 16px
      line-height: 19px
    &__description
      margin-bottom: 22px
    .time
      background-size: 20px
      font-size: 14px
      line-height: 17px
      padding-left: 25px


</style>