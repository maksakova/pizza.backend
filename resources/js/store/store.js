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

        addToCart(state, {item, currentVariant1 = 0, currentVariant2 = 0}) {
            /*if (item.product_variants.length > 0) {
                price = item.product_variants[currentVariant1].price

                let found = state.cart.find(product => product === item);

                console.log(currentVariant1)

                if (found) {
                    found.quantity ++;
                    found.totalPrice = found.quantity * price;
                    state.cartTotal += price;
                } else {
                    state.cart.push(item);

                    Vue.set(item, 'quantity', 1);
                    Vue.set(item, 'variant', currentVariant1);
                    Vue.set(item, 'totalPrice', price);

                    state.cartTotal += price;

                    console.log(state.cart)
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
            }*/

            if (item.product_variants.length === 0) {
                let found = state.cart.find(product => product === item);
                if (found) {
                    found.quantity ++;
                    found.totalPrice = found.quantity * found.price;
                } else {
                    state.cart.push(item);
                    Vue.set(item, 'quantity', 1)
                    Vue.set(item, 'price', item.min_price)
                }
                console.log(item)
            }

            state.cartCount = 0
            state.cartTotal = 0

            state.cart.forEach(item =>
                    state.cartCount += item.quantity,
                state.cartTotal += item.price * item.quantity
            );

        },

        cartItemQuantity(state, {item, quantity}) {
            let found = state.cart.find(product => product === item);
            if (found) {
                found.quantity = quantity;
            }

            state.cartCount = 0
            state.cartTotal = 0

            state.cart.forEach(item =>
                    state.cartCount += item.quantity,
                state.cartTotal += item.price * item.quantity
            );
        },

        removeFromCart(state, item) {
            let index = state.cart.indexOf(item);

            if (index > -1) {
                let product = state.cart[index];
                state.cartCount -= product.quantity;

                state.cart.splice(index, 1);
            }

            state.cartCount = state.cart.length;
        },

        cleanCart(state) {
            state.cart = []
            state.cartCount = 0
            state.cartTotal = 0
        },

        updateCart(state) {
            state.cartCount = 0
            state.cartTotal = 0

            state.cart.forEach(item =>
                    state.cartCount += item.quantity,
                state.cartTotal += item.price * item.quantity
            );

            console.log(state.cartCount)
        }
    },
};

export default store;

