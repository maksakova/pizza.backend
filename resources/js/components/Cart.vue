<template>
  <main class="cart">
    <Menu simple="simple"/>
    <div class="container">
      <div class="row">
        <div class="col-xl-9">
          <template v-if="$store.state.cartCount > 0">
            <div class="cart__header">
              <h1>Корзина <span>({{ $store.state.cartCount }})</span></h1>
              <div class="cart__remove" v-if="$store.state.cartCount > 0" @click="show('clear-modal');">Очистить корзину</div>
            </div>
            <div class="cart__products-header d-none d-xl-flex">
              <div class="cart__products-header__price">Цена</div>
              <div class="cart__products-header__count">Количество</div>
              <div class="cart__products-header__total">Итого</div>
              <div class="cart__products-header__delete">Удалить</div>
            </div>
            <div class="cart__products">
                <cart-product-card v-for="(product, key) in cart" v-bind:key="key" v-bind:item="product"/>
            </div>
            <h2>Не забудьте заказать</h2>
            <div class="cart__products scroll">
              <div class="row">
                <product-card v-for="product in products" v-bind:key="product.id" v-bind:item="product"/>
              </div>
            </div>
          </template>

          <template v-else>
            <h1>Корзина пуста</h1>
            <br>
            <p>
              <router-link to="/">Вернуться в меню</router-link>
            </p>
          </template>
        </div>
        <div class="col-xl-3 offset-xl-0 col-lg-6 offset-lg-3">
          <div class="steps-order d-none d-xl-flex">
            <div class="steps-order__item active">
              <div class="steps-order__item__number">1</div>
              Корзина
            </div>
            <div class="steps-order__item">
              <div class="steps-order__item__number">2</div>
              Оформление заказа
            </div>
            <div class="steps-order__item">
              <div class="steps-order__item__number">3</div>
              Заказ принят
            </div>
          </div>
          <h2>Мой заказ</h2>
          <table class="cart__order">
            <tr>
              <td>Сумма заказа:</td>
              <td>{{ formatPrice($store.state.cartSum) }} руб.</td>
            </tr>
            <tr>
              <td>Адрес доставки:</td>
              <td><span class="cart__order__link" @click="show('address-modal')">Укажите адрес</span></td>
            </tr>
            <tr>
              <td>
                <div class="info">
                  <img src="/../img/common/info.svg">
                  <div class="info__item">
                    <div class="info__item__inner">
                      Для выбранной зоны <span>бесплатная доставка</span> доступна для заказов <span>от 50 руб</span>. Ознакомиться с зонами доставки можно на <router-link to="/map" class="link">Карте доставки</router-link>
                    </div>
                  </div>
                </div>
                Доставка:
              </td>
              <td>5 руб.</td>
            </tr>
            <tr>
              <th>Итого:</th>
              <th>{{ formatPrice($store.state.cartSum + $store.state.deliveryPrice) }} руб.</th>
            </tr>
          </table>
          <div class="cart__alert alert">
            Минимальная сумма заказа - <strong>15 руб.</strong>
          </div>
          <a href="/order" class="button button-order " v-bind:class="{ disabled: $store.state.cartCount < 1 }">
            <span>
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M9.00004 2.20459C5.25287 2.20459 2.20459 5.25287 2.20459 9.00004C2.20459 12.7472 5.25287 15.7955 9.00004 15.7955C12.7472 15.7955 15.7955 12.7472 15.7955 9.00004C15.7955 5.25287 12.7472 2.20459 9.00004 2.20459ZM9.00004 14.4773C5.98004 14.4773 3.52278 12.02 3.52278 9.00004C3.52278 5.98004 5.98004 3.52278 9.00004 3.52278C12.02 3.52278 14.4773 5.98004 14.4773 9.00004C14.4773 12.02 12.02 14.4773 9.00004 14.4773Z" fill="white" stroke="white" stroke-width="0.5"/>
              <path d="M8.34082 9.16947V9.27302L8.41404 9.34624L10.6992 11.6314C10.9566 11.8888 11.3739 11.8888 11.6312 11.6314C11.8886 11.374 11.8886 10.9567 11.6312 10.6994L9.659 8.72713V5.31827C9.659 4.95427 9.36392 4.65918 8.99991 4.65918C8.63591 4.65918 8.34082 4.95427 8.34082 5.31827V9.16947Z" fill="white" stroke="white" stroke-width="0.5"/>
            </svg>
            60-90 мин.
            </span>
            Оформить заказ
          </a>
        </div>
      </div>
    </div>
  </main>
</template>

<script>

import axios from "axios";

export default {
    name: "Cart",
    data() {
        return {
            products: [],
            currentItem: this.$store.state.currentItem,
            cartCount: this.$store.state.cartCount,
            cart: this.$store.state.cart
        }
    },
    mounted() {
        axios
            .post('/api/products')
            .then(response => (this.products = response.data));
    },
}
</script>

<style lang="sass">
@import "resources/sass/main"

.cart
  padding: 0 0 60px
  h1
    margin-bottom: 0
    span
      font-size: 12px
      font-weight: 400
      color: $text-light
  &__header
    display: flex
    justify-content: space-between
    align-items: center
    margin-bottom: 10px
  &__remove
    color: $text-light
    font-size: 12px
    font-weight: 500
    text-decoration: underline
    cursor: pointer
    &:hover
      color: $main
  &__products-header
    width: 100%
    padding: 0 15px
    justify-content: flex-end
    font-size: 12px
    color: $text-light
    text-align: center
    margin-bottom: 16px
    &__price
      width: 140px
    &__count
      width: 98px
    &__total
      width: 140px
    &__delete
      width: 60px
  &__products
    margin-bottom: 44px
  &__order
    margin: -6px 0 16px
    &__link
      text-decoration: underline
      cursor: pointer
      &:hover
        color: $main
  &__alert
    margin-bottom: 20px

@media (max-width: 575px)
  .cart
    &__products
      margin-bottom: 44px
      &.scroll
        overflow-x: auto
        margin: 0 -15px 30px
        padding-left: 15px
        &::-webkit-scrollbar
          height: 0
        .row
          width: max-content
          .product-item__outer
            width: 260px
          .product-item
            padding: 0 0 15px
            background: $white
            height: 100%
            h3
              font-size: 14px
            p
              font-size: 12px
            &__image
              height: 122px
              margin-bottom: 10px
            &__text
              padding: 0 10px
              height: calc(100% - 138px)
            .button
              font-size: 0
              width: 32px
              height: 28px
              background-image: url('/../img/common/product-plus.svg')
              background-repeat: no-repeat
              background-position: center
              border-radius: 9px
              padding: 0

@media (min-width: 992px)
  .cart
    &__header
      margin-bottom: 26px
    &__products
      &.scroll
        padding: 0
        margin: 0 0 44px

@media (min-width: 1200px)
  .cart
    h1
      span
        font-size: 14px
    &__header
      justify-content: flex-start
      margin-bottom: 8px
    &__remove
      font-size: 14px
      margin-left: 24px

</style>
