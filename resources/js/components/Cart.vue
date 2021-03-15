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
                <cart-product-card v-for="(product, key) in cart" v-bind:key="key" v-bind:item="product" v-bind:ingredients="ingredients"/>
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
          <div class="cart__my-order">
              <h2>Мой заказ</h2>
              <table class="cart__order">
                  <tr>
                      <td>Сумма заказа:</td>
                      <td>{{ formatPrice($store.state.cartSum) }} руб.</td>
                  </tr>
                  <tr>
                      <td>Адрес доставки:</td>
                      <td>
                  <span class="cart__order__link"  @click="show('address-modal')">
                      <template v-if="$store.state.deliveryStreet && deliveryMethod === 1">{{$store.state.deliveryStreet}}, {{$store.state.deliveryBuilding}}</template>
                      <template v-else-if="deliveryMethod === 1">Укажите адрес</template>
                      <template v-else-if="deliveryMethod === 2">Самовывоз</template>

                  </span>
                      </td>
                  </tr>
                  <tr v-if="$store.state.deliveryFreeSum > $store.state.cartSum && $store.state.deliveryMethod === 1 && $store.state.deliveryStreet">
                      <td>
                          <div class="info">
                              <img src="/../img/common/info.svg">
                              <div class="info__item">
                                  <div class="info__item__inner">
                                      Для выбранной зоны <span>бесплатная доставка</span> доступна для заказов <span>от {{ $store.state.deliveryFreeSum }} руб</span>. Ознакомиться с зонами доставки можно на <a href="/map" class="link">Карте доставки</a>
                                  </div>
                              </div>
                          </div>
                          Доставка:
                      </td>
                      <td>{{ $store.state.deliveryPrice }} руб.</td>
                  </tr>
                  <tr>
                      <th>Итого:</th>
                      <th v-if="$store.state.deliveryFreeSum > $store.state.cartSum && $store.state.deliveryMethod === 1 && $store.state.deliveryStreet">{{ formatPrice($store.state.cartSum + $store.state.deliveryPrice) }} руб.</th>
                      <th v-else>{{ formatPrice($store.state.cartSum) }} руб.</th>
                  </tr>
              </table>
              <div class="cart__alert alert" v-if="$store.state.cartSum < $store.state.deliveryFreeSum && deliveryMethod === 1">
                  Минимальная сумма заказа для бесплатной доставки - <strong>{{$store.state.deliveryFreeSum}} руб.</strong>
              </div>
              <a href="/order" class="button button-order "
                 v-bind:class="{ disabled: $store.state.cartCount < 1 || (deliveryMethod === 1 && !$store.state.deliveryStreet) }">
            <span>
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M9.00004 2.20459C5.25287 2.20459 2.20459 5.25287 2.20459 9.00004C2.20459 12.7472 5.25287 15.7955 9.00004 15.7955C12.7472 15.7955 15.7955 12.7472 15.7955 9.00004C15.7955 5.25287 12.7472 2.20459 9.00004 2.20459ZM9.00004 14.4773C5.98004 14.4773 3.52278 12.02 3.52278 9.00004C3.52278 5.98004 5.98004 3.52278 9.00004 3.52278C12.02 3.52278 14.4773 5.98004 14.4773 9.00004C14.4773 12.02 12.02 14.4773 9.00004 14.4773Z" fill="white" stroke="white" stroke-width="0.5"/>
              <path d="M8.34082 9.16947V9.27302L8.41404 9.34624L10.6992 11.6314C10.9566 11.8888 11.3739 11.8888 11.6312 11.6314C11.8886 11.374 11.8886 10.9567 11.6312 10.6994L9.659 8.72713V5.31827C9.659 4.95427 9.36392 4.65918 8.99991 4.65918C8.63591 4.65918 8.34082 4.95427 8.34082 5.31827V9.16947Z" fill="white" stroke="white" stroke-width="0.5"/>
            </svg>
            {{ this.$store.state.deliveryTime }}
            </span>
                  Оформить заказ
              </a>
          </div>
        </div>
      </div>
    </div>

      <modal class="modaladdress"
             :width="623"
             :height="406"
             :adaptive="true"
             name="address-modal">
          <button class="modal-close" @click="hide('address-modal')">
              <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M5.91628 5.00007L9.81017 1.10608C10.0636 0.852787 10.0636 0.443255 9.81017 0.189966C9.55688 -0.0633221 9.14735 -0.0633221 8.89406 0.189966L5.00005 4.08396L1.10617 0.189966C0.852759 -0.0633221 0.443344 -0.0633221 0.190056 0.189966C-0.0633519 0.443255 -0.0633519 0.852787 0.190056 1.10608L4.08394 5.00007L0.190056 8.89407C-0.0633519 9.14736 -0.0633519 9.55689 0.190056 9.81018C0.316285 9.93653 0.482257 10 0.648111 10C0.813965 10 0.979819 9.93653 1.10617 9.81018L5.00005 5.91618L8.89406 9.81018C9.0204 9.93653 9.18626 10 9.35211 10C9.51797 10 9.68382 9.93653 9.81017 9.81018C10.0636 9.55689 10.0636 9.14736 9.81017 8.89407L5.91628 5.00007Z" fill="#828282"/>
              </svg>
          </button>
          <h2>Подтвердите адрес</h2>
          <div class="product-item__variants">

              <div class="product-item__variants__item"
                   v-for="item in deliveryMethods"
                   :style="{ width: 'calc(100% / ' + deliveryMethods.length + ')' }">
                  <label class="radio">
                      <input type="radio"
                             name="delivery_method"
                             :value="item.id"
                             v-model="deliveryMethod"
                             :change="changeDeliveryMethod(deliveryMethod)"
                      />
                      <div class="radio__text">{{item.name}}</div>
                  </label>
              </div>
          </div>

          <template v-if="deliveryMethod === 1">
              <h3>Пожалуйста, укажите адрес, куда доставить еду:</h3>

              <div class="label-flex">
                  <label class="label-70">
                      Улица
                      <input
                          id="street"
                          type="text"
                          placeholder="Введите адрес"
                          v-model="deliveryStreet"
                          :input="checkStreet(deliveryStreet)"
                      >
                      <template v-if="suggestions">
                          <div class="suggestion" ref="suggestionInput"
                               v-if="deliveryStreet && deliveryStreet !== suggestions[0].data.street_with_type">
                              <div class="suggestion__inner">
                                  <label class="radio" v-for="suggestion in suggestions">
                                      <input
                                          type="radio"
                                          :value="suggestion.data.street_with_type"
                                          v-model="deliveryStreet">
                                      <div class="suggestion__text">{{suggestion.data.street_with_type}}</div>
                                  </label>
                              </div>
                          </div>

                      </template>
                  </label>
                  <label class="label-30">
                      Дом
                      <input type="text" v-model="deliveryBuilding" id="house">
                  </label>
              </div>
              <button class="button" @click="addStreet(deliveryStreet, deliveryBuilding); checkZone(deliveryStreet); hide('address-modal');">Подтвердить</button>
              <p>Ознакомьтесь с <router-link to="/map" class="link">Картой доставки</router-link>. Если Вашего адреса нет в списке, но он относится к зоне бесплатной доставки, сообщите об этом оператору и совершите заказ по телефону. Либо воспользуйтель услугой Самовывоз.</p>
          </template>

          <template v-else>
              <h3>Прижайте к нам за едой по адресу:</h3>
              <p>г. Минск, Ложинская, 5</p>
              <a href="/contacts"><img src="/../img/contacts/map.jpg"></a>
              <button class="button" @click="hide('address-modal');">Подтвердить</button>
          </template>

      </modal>

      <modal
          :width="1000"
          :height="550"
          :adaptive="true"
          class="pr"
          name="product-modal">
          <product-modal v-bind:currentItem="currentItem" v-bind:ingredients="ingredients"/>
      </modal>
      <div id="map"></div>
  </main>
</template>

<script>
import axios from "axios";

export default {
    name: "Cart",
    data() {
        return {
            products: [],
            deliveryMethods: [],
            deliveryMethod: this.$store.state.deliveryMethod,
            deliveryTime: this.$store.state.deliveryTime,
            currentItem: this.$store.state.currentItem,
            cartCount: this.$store.state.cartCount,
            cart: this.$store.state.cart,
            suggestions: {},
            deliveryStreet: this.$store.state.deliveryStreet,
            deliveryBuilding: this.$store.state.deliveryBuilding,
            SuggestView: null,
            ingredients: [],
            url: "https://suggestions.dadata.ru/suggestions/api/4_1/rs/suggest/address",
            token: "9af52f392c48bb34c8fb20bb53573b1ee923e871",
        }
    },
    methods: {
        addStreet(deliveryStreet, deliveryBuilding) {
            this.$store.commit('addStreet', {deliveryStreet, deliveryBuilding});
        },
        changeDeliveryMethod(deliveryMethod) {
            this.$store.commit('changeDeliveryMethod', deliveryMethod);
        },
    },
    mounted() {
        axios
            .post('/api/randomProducts')
            .then(response => (this.products = response.data));
        axios
            .post('/api/deliveryMethods')
            .then(response => (this.deliveryMethods = response.data));
        axios
            .post('/api/ingredients')
            .then(response => (this.ingredients = response.data));
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
    &__my-order
        position: sticky
        top: 74px


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
              height: 168px
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
