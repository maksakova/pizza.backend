import Vue from "vue";
import Vuex from "vuex";
import createPersistedState from "vuex-persistedstate";

Vue.use(Vuex)

let store = {
    plugins: [createPersistedState()],
    state: {
        currentItem: [],
        cart: [],
        cartCount: 0,
        cartTotal: 0
    },

    mutations: {
        currentItem(state, item) {
            state.currentItem = item
        },

        addToCart(state, {item, currentVariant = 0}) {
            let price;

            if (item.product_variants.length > 0) {
                price = item.product_variants[currentVariant].price
                console.log(price)

                let found = state.cart.find(product => product.id == item.id && currentVariant == item.variant);

                if (found) {
                    found.quantity ++;
                    found.totalPrice = found.quantity * price;
                    state.cartTotal += price;
                } else {
                    state.cart.push(item);

                    Vue.set(item, 'quantity', 1);
                    Vue.set(item, 'variant', currentVariant);
                    Vue.set(item, 'totalPrice', price);

                    state.cartTotal += price;
                }
            } else {
                price = item.min_price

                let found = state.cart.find(product => product.id == item.id);

                if (found) {
                    found.quantity ++;
                    found.totalPrice = found.quantity * price;
                    state.cartTotal += price;
                } else {
                    state.cart.push(item);

                    Vue.set(item, 'quantity', 1);
                    Vue.set(item, 'totalPrice', price);

                    state.cartTotal += price;
                }
            }

            state.cartCount++;
        },

        cartQuantity(state, item, quantity) {
            state.item.quantity = quantity;
            state.cartCount = state.cart.length;
        },

        removeFromCart(state, item) {
            let index = state.cart.indexOf(item);

            if (index > -1) {
                let product = state.cart[index];
                state.cartCount -= product.quantity;

                state.cart.splice(index, 1);
            }

            state.cartCount = state.cart.length;
            state.cartTotal = 0;
        },

        cleanCart(state) {
            state.cart = []
            state.cartCount = 0
            state.cartTotal = 0
        }
    }
};

export default store;

