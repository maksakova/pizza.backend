import Vue from "vue";
import Vuex from "vuex";
import createPersistedState from "vuex-persistedstate";

Vue.use(Vuex)

let store = {
    plugins: [createPersistedState()],
    state: {
        cartItems: [],
        cartTotal: 0,

        currentItemId: 0,

        cart: [],
        cartCount: 0,
    },

    mutations: {
        currentItem(state, id) {
            state.currentItemId = id
        },

        addCartItem(state, item) {
            state.cart.push(item);

            state.cartTotal++;
        }
    }
};

export default store;

