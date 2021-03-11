import Vue from "vue";
import Vuex from "vuex";
import createPersistedState from "vuex-persistedstate";
import {forEach} from "vue-scrollactive/src/utils";

Vue.use(Vuex)

let store = {
    plugins: [createPersistedState()],
    state: {
        currentItem: [],
        cart: [],
        cartCount: 0,
        cartSum: 0,
        paymentMethod: 1,
        deliveryMethod: 1,
        deliveryFreeSum: 50,
        deliveryPrice: 5,
        deliveryTime: '60-90 мин.',
        deliveryCoords: null,
        deliveryStreet: null,
        deliveryBuilding: null,
        deliveryFlat: null,
        deliveryEntrance: null,
        deliveryFloor: null,
        deliveryCode: null,
    },

    mutations: {
        currentItem(state, item) {
            state.currentItem = item
        },

        addToCart(state, {item, currentVariant1, currentVariant2, additives, price}) {

            if (item.product_variants.length === 0) {
                let found = state.cart.find(product => product.id === item.id && product.currentVariant1 === item.currentVariant1);
                if (found) {
                    found.quantity ++;
                    found.totalPrice = found.quantity * found.price;
                } else {
                    state.cart.push(item);
                    Vue.set(item, 'quantity', 1)
                    Vue.set(item, 'price', item.min_price)
                }
            } else {
                let found = state.cart.find(product => (product.id === item.id && product.currentVariant1 === currentVariant1));
                if (currentVariant2) {
                    found = state.cart.find(product => (product.id === item.id && product.currentVariant1 === currentVariant1));
                }

                if (found) {

                    found.quantity ++;

                    found.totalPrice = found.quantity * found.price;

                } else {

                    item.quantity = 1
                    item.currentVariant1 = currentVariant1

                    if (!currentVariant2) {
                        item.price = item.product_variants[currentVariant1].price
                    } else {
                        item.currentVariant2 = currentVariant2
                        item.price = item.product_variants[currentVariant2].price
                        if (additives) {
                            item.additives = additives
                            item.price = price
                        } else {
                            item.price = item.product_variants[currentVariant2].price
                        }
                    }

                    state.cart.push(item)
                }

            }

            state.cartCount = 0
            state.cartSum = 0

            state.cart.forEach(el => {
                state.cartCount += el.quantity,
                state.cartSum += el.price * el.quantity
            });

        },

        cartItemQuantity(state, {item, quantity}) {
            item.quantity = quantity;

            state.cartCount = 0
            state.cartSum = 0

            state.cart.forEach(el => {
                state.cartCount += el.quantity,
                state.cartSum += el.price * el.quantity
            });
        },

        removeFromCart(state, item) {
            let index = state.cart.indexOf(item);

            if (index > -1) {
                let product = state.cart[index];
                state.cartCount -= product.quantity;

                state.cart.splice(index, 1);
            }

            state.cartCount = 0
            state.cartSum = 0

            state.cart.forEach(el => {
                state.cartCount += el.quantity,
                state.cartSum += el.price * el.quantity
            });
        },

        cleanCart(state) {
            state.cart = []
            state.cartCount = 0
            state.cartSum = 0
        },

        addStreet(state, {deliveryStreet, deliveryBuilding}) {
            state.deliveryStreet = deliveryStreet
            state.deliveryBuilding = deliveryBuilding
        },
        changeDeliveryMethod(state, id) {
            state.deliveryMethod = id
        },
        changePaymentMethod(state, id) {
            state.paymentMethod = id
        },
        changeDeliveryFreeSum(state, value) {
            state.deliveryFreeSum = value
        },
        changeDeliveryTime(state, value) {
            state.deliveryTime = value
        },
    },
};

export default store;

