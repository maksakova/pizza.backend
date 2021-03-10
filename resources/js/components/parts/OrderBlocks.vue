<template>
    <div>
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
                        <p><img src="/../img/contacts/3-marker.svg"> г. Минск, Ложинская, 5</p>
                        <p><img src="/../img/contacts/1-phone.svg"> <a href="tel:+ 375 (29) 112-11-77">+ 375 (29) 112-11-77</a></p>
                        <p><img src="/../img/contacts/2-clock.svg"> с 10:00 до 22:00 </p>
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
</template>

<script>
import axios from "axios";

export default {
    name: "OrderBlocks",
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
            url: "https://suggestions.dadata.ru/suggestions/api/4_1/rs/suggest/address",
            token: "9af52f392c48bb34c8fb20bb53573b1ee923e871",
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
    }
}
</script>
