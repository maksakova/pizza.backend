import Vue from "vue";
import Vuex from "vuex";
import createPersistedState from "vuex-persistedstate";

Vue.use(Vuex)

let store = {
    plugins: [createPersistedState()],
    state: {
        cartItems: [],
        cartTotal: 0,

        currentItem: [],

        cart: [],
        cartCount: 0,
    },

    mutations: {
        currentItem(state, item) {
            state.currentItem = item
        },

        addToCart(state, item) {
            let found = state.cart.find(product => product.id == item.id);

            if (found) {
                found.quantity ++;
                found.totalPrice = found.quantity * found.price;
            } else {
                state.cart.push(item);

                Vue.set(item, 'quantity', 1);
                Vue.set(item, 'totalPrice', item.price);
            }

            state.cartCount++;
        }
    }
};

export default store;

