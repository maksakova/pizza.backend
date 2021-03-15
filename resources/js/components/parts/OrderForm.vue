<template>
    <div class="row">
        <div class="col-xl-9">
            <div class="order__block">
                <h2>1. Личные данные</h2>
                <label>
                    Имя
                    <input type="text" name="name" placeholder="Имя" v-model="deliveryName" required>
                </label>
                <label>
                    Телефон
                    <the-mask :type="'tel'"
                              :name="'phone'"
                              :placeholder="'+375 ( ) '"
                              v-model="deliveryPhone"
                              required
                              :mask="['+375 (##) ###-##-##']" />
                </label>
                <label class="checkbox">
                    <input type="checkbox" v-model="callback" name="callback" value="1" />
                    <div class="checkbox__text">Не перезванивать</div>
                </label>
            </div>
            <div class="order__block">
                <div class="row">
                    <div class="col-lg-10">
                        <h2>2. Доставка </h2>
                        <div class="order__block-delivery">
                            <div class="product-item__variants">
                                <div class="product-item__variants__item"
                                     v-for="item in deliveryMethods"
                                     :style="{ width: 'calc(100% / ' + deliveryMethods.length + ')' }">
                                    <label class="radio">
                                        <input type="radio"
                                               name="delivery_method"
                                               :value="item.id"
                                               v-model="deliveryMethod"
                                               v-on:change="changeDeliveryMethod(item.id)"
                                        />
                                        <div class="radio__text">{{item.name}}</div>
                                    </label>
                                </div>
                            </div>
                            <div class="order__delivery" v-if="deliveryMethod === 1">
                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11 2.75C6.45081 2.75 2.75 6.45081 2.75 11C2.75 15.5492 6.45081 19.25 11 19.25C15.5492 19.25 19.25 15.5492 19.25 11C19.25 6.45081 15.5492 2.75 11 2.75ZM11 17.75C7.2782 17.75 4.25 14.7218 4.25 11C4.25 7.2782 7.2782 4.25 11 4.25C14.7218 4.25 17.75 7.2782 17.75 11C17.75 14.7218 14.7218 17.75 11 17.75Z" fill="#44C373" stroke="#44C373" stroke-width="0.5"/>
                                    <path d="M10.2499 11.207V11.3105L10.3232 11.3837L13.1161 14.1767C13.409 14.4696 13.8838 14.4696 14.1767 14.1767C14.4696 13.8838 14.4696 13.409 14.1767 13.1161L11.7499 10.6893V6.49994C11.7499 6.08573 11.4142 5.74994 10.9999 5.74994C10.5857 5.74994 10.2499 6.08573 10.2499 6.49994V11.207Z" fill="#44C373" stroke="#44C373" stroke-width="0.5"/>
                                </svg>
                                Привезем за {{ $store.state.deliveryTime }}
                            </div>
                        </div>
                        <template v-if="deliveryMethod === 1">
                            <h2>Адрес доставки</h2>
                            <div class="label-flex">
                                <label class="label-70">
                                    Улица
                                    <input
                                        type="text"
                                        id="street"
                                        name="street"
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
                                    <input
                                        type="text"
                                        name="building"
                                        v-model="deliveryBuilding">
                                </label>
                                <label class="label-50">
                                    Квартира / офис
                                    <input
                                        type="text"
                                        name="flat"
                                        v-model="deliveryFlat">
                                </label>
                                <label class="label-50">
                                    Подъезд
                                    <input
                                        type="text"
                                        name="entrance"
                                        v-model="deliveryEntrance">
                                </label>
                                <label class="label-50">
                                    Этаж
                                    <input
                                        type="text"
                                        name="floor"
                                        v-model="deliveryFloor">
                                </label>
                                <label class="label-50">
                                    Код домофона
                                    <input
                                        type="text"
                                        name="code"
                                        v-model="deliveryCode">
                                </label>
                            </div>
                        </template>
                        <template v-else>
                            <h2>Прижайте к нам за едой по адресу:</h2>
                            <p><img src="/../img/contacts/3-marker.svg"> {{contacts['address']['value']}}</p>
                            <p><img src="/../img/contacts/1-phone.svg"> <a href="tel:+ 375 (29) 112-11-77"> {{contacts['phone']['value']}}
                            </a></p>
                            <p><img src="/../img/contacts/2-clock.svg"> {{contacts['time']['value']}}</p>
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
                                 v-for="item in paymentMethods"
                                 :style="{ width: 'calc(100% / ' + paymentMethods.length + ')' }">
                                <label class="radio">
                                    <input type="radio"
                                           name="payment_method"
                                           :value="item.id"
                                           v-model="paymentMethod"
                                           v-on:change="changePaymentMethod(item.id)"
                                    />
                                    <div class="radio__text">{{item.name}}</div>
                                </label>
                            </div>
                        </div>
                        <template v-if="paymentMethod === 1">
                            <label v-if="cashBack === false">
                                Нужна сдача
                                <input type="text" name="cashback" placeholder="Сдача с">
                            </label>
                            <label class="checkbox">
                                <input type="checkbox" v-model="cashBack" />
                                <div class="checkbox__text" v-model="cashBackValue">Без сдачи</div>
                            </label>
                            <label class="label-textarea">
                                Комментарий к заказу
                                <textarea name="comment" v-model="comment"></textarea>
                            </label>
                        </template>
                        <template v-else-if="paymentMethod === 2">
                            <!--<input type='hidden' name='wsb_storeid'
                                   value='543108307'>-->
                            <p>После нажатия кнопки Оформить, не будет
                                возможности изменить заказ или способ оплаты.</p>
                        </template>
                        <template v-else-if="paymentMethod === 3">
                            <!--<input type='hidden' name='wsb_storeid'
                                   value='390964697'>-->
                            <p>После нажатия кнопки Оформить, не будет
                                возможности изменить заказ или способ оплаты.</p>
                        </template>
                    </div>
                </div>
            </div>
            <input type="hidden" name="products" :value="this.products">
            <input type="hidden" name="cart_total" :value="this.$store.state.cartSum">
            <input type="hidden" name="delivery_price" :value="this.$store.state.deliveryPrice">
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
            <template v-if="paymentMethod === 1">
                <form method="POST" action="/order" enctype="multipart/form-data">
                    <input type="hidden" name="_token" :value="csrf">
                    <input type="hidden" name="name" v-model="deliveryName">
                    <input type="hidden" name="phone" v-model="deliveryPhone">
                    <input type="hidden" v-model="callback" name="callback" value="1" />
                    <input type="hidden" v-model="deliveryMethod" name="delivery_method" value="1" />
                    <input type="hidden" v-model="deliveryStreet" name="street" />
                    <input type="hidden" v-model="deliveryBuilding" name="building" />
                    <input type="hidden" v-model="deliveryFlat" name="flat" />
                    <input type="hidden" v-model="deliveryEntrance" name="entrance" />
                    <input type="hidden" v-model="deliveryFloor" name="floor" />
                    <input type="hidden" v-model="deliveryCode" name="code" />
                    <input type="hidden" v-model="paymentMethod" name="payment_method" value="1" />
                    <input type="hidden" v-model="cashBackValue" name="cashback">
                    <input type="hidden" v-model="comment" name="comment">
                    <input type="hidden" name="products" :value="this.products">
                    <input type="hidden" name="cart_total" :value="this.$store.state.cartSum">
                    <input type="hidden" name="delivery_price" :value="this.$store.state.deliveryPrice">
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
                </form>
            </template>

            <template v-else>
                <form action="https://securesandbox.webpay.by/" method="post">
                    <input type="hidden" name="_token" :value="csrf">
                    <input type="hidden" name="name" v-model="deliveryName">
                    <input type="hidden" name="phone" v-model="deliveryPhone">
                    <input type="hidden" v-model="callback" name="callback" value="1" />
                    <input type="hidden" v-model="deliveryMethod" name="delivery_method" value="1" />
                    <input type="hidden" v-model="deliveryStreet" name="street" />
                    <input type="hidden" v-model="deliveryBuilding" name="building" />
                    <input type="hidden" v-model="deliveryFlat" name="flat" />
                    <input type="hidden" v-model="deliveryEntrance" name="entrance" />
                    <input type="hidden" v-model="deliveryFloor" name="floor" />
                    <input type="hidden" v-model="deliveryCode" name="code" />
                    <input type="hidden" v-model="paymentMethod" name="payment_method" value="1" />
                    <input type="hidden" v-model="cashBackValue" name="cashback">
                    <input type="hidden" v-model="comment" name="comment">
                    <input type="hidden" name="products" :value="this.products">
                    <input type="hidden" name="cart_total" :value="this.$store.state.cartSum">
                    <input type="hidden" name="delivery_price" :value="this.$store.state.deliveryPrice">
                    <input type='hidden' name='*scart'>
                    <input type='hidden' name='wsb_storeid' :value="webpay['wsb_storeid']">
                    <input type='hidden' name=wsb_notify_url :value="webpay['wsb_notify_url']">
                    <input type='hidden' name='wsb_order_num' :value="webpay['wsb_order_num']">
                    <input type='hidden' name='wsb_total' :value="webpay['wsb_total']">
                    <input type='hidden' name='wsb_currency_id' :value="webpay['wsb_currency_id']">
                    <input type='hidden' name='wsb_version' :value="2">
                    <input type='hidden' name='wsb_seed' :value="webpay['wsb_seed']">
                    <input type='hidden' name='wsb_signature' :value="webpay['wsb_signature']">
                    <input type='hidden' name='wsb_return_url' :value="webpay['wsb_notify_url']">
                    <input type='hidden' name='wsb_cancel_return_url' :value="webpay['wsb_notify_url']">
                    <input type='hidden' name='wsb_invoice_item_name[0]' :value="'Оплата заказа №' + webpay['wsb_order_num']">
                    <input type='hidden' name='wsb_invoice_item_quantity[0]' value='1'>
                    <input type='hidden' name='wsb_invoice_item_price[0]' :value="webpay['wsb_total']">
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
                </form>
            </template>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "OrderForm",
    data() {
        return {
            deliveryMethods: [],
            deliveryMethod: this.$store.state.deliveryMethod,
            paymentMethods: [],
            paymentMethod: this.$store.state.paymentMethod,
            cashBack: false,
            cashBackValue: null,
            callback: false,
            currentItem: this.$store.state.currentItem,
            cartCount: this.$store.state.cartCount,
            cart: this.$store.state.cart,
            comment: null,
            deliveryName: null,
            deliveryPhone: null,
            deliveryEmail: null,
            deliveryStreet: this.$store.state.deliveryStreet,
            deliveryBuilding: this.$store.state.deliveryBuilding,
            deliveryFlat: this.$store.state.deliveryFlat,
            deliveryEntrance: this.$store.state.deliveryEntrance,
            deliveryFloor: this.$store.state.deliveryFloor,
            deliveryCode: this.$store.state.deliveryCode,
            suggestions: {},
            SuggestView: null,
            products: JSON.stringify(this.$store.state.cart),
            deliveryTime: this.$store.state.deliveryTime,
            ingredients: [],
            contacts: [],
            url: "https://suggestions.dadata.ru/suggestions/api/4_1/rs/suggest/address",
            token: "9af52f392c48bb34c8fb20bb53573b1ee923e871",
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            webpay: []
        }
    },
    methods: {
        changeDeliveryMethod(deliveryMethod) {
            this.$store.commit('changeDeliveryMethod', deliveryMethod);
        },
        changePaymentMethod(id) {
            this.$store.commit('changePaymentMethod', id);
        },
        newOrder() {
            this.order()
        },
    },
    mounted() {
        axios
            .post('/api/deliveryMethods')
            .then(response => (this.deliveryMethods = response.data));
        axios
            .post('/api/paymentMethods')
            .then(response => (this.paymentMethods = response.data));
        axios
            .post('/api/contacts')
            .then(response => (this.contacts = response.data));
        axios
            .post('/api/webpay', {
                cartSum: this.$store.state.cartSum
            })
            .then(response => (this.webpay = response.data));
    }
}
</script>
