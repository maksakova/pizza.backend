import Vue from "vue";
import Vuex from "vuex";
import currentItem from "./modules/curentItem";
import cart from "./modules/cart";
import delivery from "./modules/delivery";

Vue.use(Vuex)

export default new Vuex.Store({
    modules: {
        currentItem,
        cart,
        delivery
    }
})

