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

        addToCart(state, item) {
            let found = state.cart.find(product => product.id == item.id);

            if (found) {
                found.quantity ++;
                found.totalPrice = found.quantity * found.min_price;
                state.cartTotal += found.min_price;
            } else {
                state.cart.push(item);

                Vue.set(item, 'quantity', 1);
                Vue.set(item, 'totalPrice', item.min_price);

                state.cartTotal += item.min_price;
            }

            state.cartCount++;
        },

        cartQuantity(state, item, quantity) {
            state.item.quantity = quantity;
            console.log(state.item.quantity);
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
        }
    }
};

export default store;

