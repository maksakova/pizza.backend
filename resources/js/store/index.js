import Vue from "vue";
import Vuex from "vuex";
import currentItem from "./store/modules/curentItem";
import cart from "./store/modules/cart";
import delivery from "./store/modules/delivery";

Vue.use(Vuex)

export default new Vuex.Store({
    modules: {
        currentItem,
        cart,
        delivery
    }
})
