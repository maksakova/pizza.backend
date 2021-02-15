<template>
  <main class="order">
    <Menu simple="simple"/>
    <div class="container">
      <div class="row">
        <div class="col-xl-9">
          <h1>Оформление заказа</h1>
          <div class="order__block">
            <h2>1. Личные данные</h2>
            <label>
              Имя
              <input type="text" placeholder="Имя">
            </label>
            <label>
              Телефон
              <input type="tel" placeholder="+375 ( ) ">
            </label>
            <label>
              Почта
              <input type="email" placeholder="Email">
            </label>
          </div>
          <div class="order__block">
            <div class="row">
              <div class="col-lg-10">
                <h2>2. Доставка </h2>
                <div class="order__block-delivery">
                  <div class="product-item__variants">
                    <div class="product-item__variants__item"
                         :style="{ width: 'calc(100% / 2)' }">
                      <label class="radio">
                        <input type="radio"
                               :name="'Доставка'"
                               :value="true"
                               v-model="deliveryMethod"
                               checked
                        />
                        <div class="radio__text">Привезите</div>
                      </label>
                    </div>
                    <div class="product-item__variants__item"
                         :style="{ width: 'calc(100% / 2)' }">
                      <label class="radio">
                        <input type="radio"
                               :name="'Доставка'"
                               :value="false"
                               v-model="deliveryMethod"
                        />
                        <div class="radio__text">Заберу сам</div>
                      </label>
                    </div>
                  </div>
                  <div class="order__delivery" v-if="deliveryMethod === true">
                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M11 2.75C6.45081 2.75 2.75 6.45081 2.75 11C2.75 15.5492 6.45081 19.25 11 19.25C15.5492 19.25 19.25 15.5492 19.25 11C19.25 6.45081 15.5492 2.75 11 2.75ZM11 17.75C7.2782 17.75 4.25 14.7218 4.25 11C4.25 7.2782 7.2782 4.25 11 4.25C14.7218 4.25 17.75 7.2782 17.75 11C17.75 14.7218 14.7218 17.75 11 17.75Z" fill="#44C373" stroke="#44C373" stroke-width="0.5"/>
                      <path d="M10.2499 11.207V11.3105L10.3232 11.3837L13.1161 14.1767C13.409 14.4696 13.8838 14.4696 14.1767 14.1767C14.4696 13.8838 14.4696 13.409 14.1767 13.1161L11.7499 10.6893V6.49994C11.7499 6.08573 11.4142 5.74994 10.9999 5.74994C10.5857 5.74994 10.2499 6.08573 10.2499 6.49994V11.207Z" fill="#44C373" stroke="#44C373" stroke-width="0.5"/>
                    </svg>
                    Привезем за 60-90 мин.
                  </div>
                </div>
                <template v-if="deliveryMethod === true">
                  <h2>Адрес доставки</h2>
                  <div class="label-flex">
                    <label class="label-70">
                      Улица
                      <input type="text" value="Слободская">
                    </label>
                    <label class="label-30">
                      Дом
                      <select>
                        <option>1</option>
                        <option>2</option>
                      </select>
                    </label>
                    <label class="label-50">
                      Квартира / офис
                      <input type="text">
                    </label>
                    <label class="label-50">
                      Подъезд
                      <input type="text">
                    </label>
                    <label class="label-50">
                      Этаж
                      <input type="text">
                    </label>
                    <label class="label-50">
                      Код домофона
                      <input type="text">
                    </label>
                  </div>
                </template>
                <template v-else>
                  <h2>Прижайте к нам за едой по адресу:</h2>
                  <p><img src="@/assets/img/contacts/3-marker.svg"> г. Минск, Ложинская, 5</p>
                  <p><img src="@/assets/img/contacts/1-phone.svg"> <a href="tel:+ 375 (29) 112-11-77">+ 375 (29) 112-11-77</a></p>
                  <p><img src="@/assets/img/contacts/2-clock.svg"> с 10:00 до 22:00 </p>
                </template>
              </div>
            </div>
          </div>
          <div class="order__block order__block-pay">
            <div class="row">
              <div class="col-lg-10">
                <h2>3. Оплата</h2>
                <div class="product-item__variants">
                  <div class="product-item__variants__item"
                       :style="{ width: 'calc(100% / 3' }">
                    <label class="radio">
                      <input type="radio"
                             :name="'Оплата'"
                             :value="'cash'"
                             v-model="paymentMethod"
                             checked
                      />
                      <div class="radio__text">Наличными</div>
                    </label>
                  </div>
                  <div class="product-item__variants__item"
                       :style="{ width: 'calc(100% / 3' }">
                    <label class="radio">
                      <input type="radio"
                             :name="Оплата"
                             :value="'erip'"
                             v-model="paymentMethod"
                      />
                      <div class="radio__text">'Ерип'</div>
                    </label>
                  </div>
                  <div class="product-item__variants__item"
                       :style="{ width: 'calc(100% / 3' }">
                    <label class="radio">
                      <input type="radio"
                             :name="Оплата"
                             :value="'webpay'"
                             v-model="paymentMethod"
                      />
                      <div class="radio__text">'WebPay'</div>
                    </label>
                  </div>
                </div>
                <template v-if="paymentMethod === 'cash'">
                  <label v-if="cashBack === false">
                    Нужна сдача
                    <input type="text" placeholder="Сдача с">
                  </label>
                  <label class="checkbox">
                    <input type="checkbox" v-model="cashBack" />
                    <div class="checkbox__text">Без сдачи</div>
                  </label>
                  <label class="label-textarea">
                    Комментарий к заказу
                    <textarea></textarea>
                  </label>
                </template>
                <template v-else-if="paymentMethod === 'erip'">
                  <p>После нажатия кнопки Оформить, не будет
                    возможности изменить заказ или способ оплаты.</p>
                </template>
                <template v-else-if="paymentMethod === 'webpay'">
                  <p>После нажатия кнопки Оформить, не будет
                    возможности изменить заказ или способ оплаты.</p>
                </template>
              </div>
            </div>
          </div>
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
          <table class="order__order">
            <tr v-for="(product, key) in cartItems" v-bind:key="key" v-bind:item="product" v-bind:cartItemId="key">
              <td>{{ products[product.product_id].name }}</td>
              <td>×{{ product.count }}</td>
              <td>{{formatPrice(product.price * product.count)}} руб.</td>
            </tr>
            <tr>
              <td colspan="2">
                Доставка:
              </td>
              <td>5 руб.</td>
            </tr>
            <tr>
              <th colspan="2">Итого:</th>
              <th>{{ formatPrice(cartTotal) }} руб.</th>
            </tr>
          </table>
          <button class="button button-order">
            <span>
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M9.00004 2.20459C5.25287 2.20459 2.20459 5.25287 2.20459 9.00004C2.20459 12.7472 5.25287 15.7955 9.00004 15.7955C12.7472 15.7955 15.7955 12.7472 15.7955 9.00004C15.7955 5.25287 12.7472 2.20459 9.00004 2.20459ZM9.00004 14.4773C5.98004 14.4773 3.52278 12.02 3.52278 9.00004C3.52278 5.98004 5.98004 3.52278 9.00004 3.52278C12.02 3.52278 14.4773 5.98004 14.4773 9.00004C14.4773 12.02 12.02 14.4773 9.00004 14.4773Z" fill="white" stroke="white" stroke-width="0.5"/>
              <path d="M8.34082 9.16947V9.27302L8.41404 9.34624L10.6992 11.6314C10.9566 11.8888 11.3739 11.8888 11.6312 11.6314C11.8886 11.374 11.8886 10.9567 11.6312 10.6994L9.659 8.72713V5.31827C9.659 4.95427 9.36392 4.65918 8.99991 4.65918C8.63591 4.65918 8.34082 4.95427 8.34082 5.31827V9.16947Z" fill="white" stroke="white" stroke-width="0.5"/>
            </svg>
            60-90 мин.
            </span>
            Оформить заказ
          </button>
        </div>
      </div>
    </div>
  </main>
</template>

<script>
import products from '@/products'
import {mapActions, mapGetters} from "vuex";

export default {
  name: "Order",
  data() {
    return {
      deliveryMethod: true,
      paymentMethod: 'cash',
      cashBack: false,
      products: products,
    }
  },
  methods: {
    ...mapActions(['getCartTotal']),
    ...mapActions(['getCartItems']),
  },
  computed: {
    ...mapGetters(['cartItems', 'cartTotal']),
  },
  mounted() {
    this.getCartTotal()
  }
}
</script>

<style lang="sass">
@import "@/assets/sass/main.sass"

.order
  padding: 0 0 60px
  &__block
    background: $white
    border-radius: 10px
    padding: 15px 15px 0
    margin-bottom: 20px
    h2
      font-size: 15px
      margin-bottom: 10px
  &__delivery
    color: $text-light
    margin-bottom: 24px
  &__order
    margin-bottom: 20px

@media (min-width: 992px)
  .order
    &__block
      &-delivery
        display: flex
        align-items: center
        margin-bottom: 20px
        .product-item__variants
          width: 258px
          margin: 0 30px 0 0
      &-pay
        .product-item__variants
          width: 384px
        p
          width: 396px
          font-size: 16px
          line-height: 19px
          color: $text-light
    &__delivery
      margin-bottom: 0

@media (min-width: 1200px)
  .order
    &__block
      padding: 28px 30px
      margin-bottom: 35px
      h2
        font-size: 20px
        line-height: 24px
        margin-bottom: 16px
        &:nth-child(3)
          font-size: 16px
          line-height: 19px
      &-delivery
        margin-bottom: 38px


</style>