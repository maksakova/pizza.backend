/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;


import Vuex from 'vuex';
import store from "./store/store"
import VueRouter from 'vue-router';
import VueScrollactive from 'vue-scrollactive';
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import YmapPlugin from 'vue-yandex-maps'
import vmodal from 'vue-js-modal'

window.Vuex = Vuex;
Vue.use(Vuex);

/* for Ymaps */
const settings = {
    apiKey: '035fdfb1-becf-436d-a7a7-6f38a995941e',
    lang: 'ru_RU',
    coordorder: 'latlong',
    version: '2.1',
}

Vue.use(BootstrapVue)
Vue.use(IconsPlugin)
Vue.use(YmapPlugin, settings)
Vue.use(vmodal)

Vue.use(VueRouter)
Vue.use(VueScrollactive);

Vue.component('the-menu', require('./components/parts/Menu.vue').default);
Vue.component('footer-menu', require('./components/parts/Footer-Menu.vue').default);
Vue.component('footer-pay', require('./components/parts/Footer-Pay.vue').default);
Vue.component('index', require('./components/Index.vue').default);
Vue.component('seo', require('./components/parts/Seo.vue').default);
Vue.component('map-address', require('./components/parts/Map.vue').default);
Vue.component('product-card', require('./components/parts/ProductCard.vue').default);
Vue.component('product-modal', require('./components/parts/ProductModal.vue').default);

Vue.directive('scroll', {
    inserted: function (el, binding) {
        let f = function (evt) {
            if (binding.value(evt, el)) {
                window.removeEventListener('scroll', f)
            }
        }
        window.addEventListener('scroll', f)
    }
})

Vue.directive('click-outside', {
    bind () {
        this.event = event => this.vm.$emit(this.expression, event)
        this.el.addEventListener('click', this.stopProp)
        document.body.addEventListener('click', this.event)
    },
    unbind() {
        this.el.removeEventListener('click', this.stopProp)
        document.body.removeEventListener('click', this.event)
    },

    stopProp(event) { event.stopPropagation() }
})

Vue.config.productionTip = false

Vue.mixin({
    methods: {
        show (el) {
            this.$modal.show(el);
        },
        hide (el) {
            this.$modal.hide(el);
        },
        formatPrice(value) {
            let val = (value/1).toFixed(2)
            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
        },
        changeCurrentItemId(id) {
            this.setCurrentItemId(id - 1)
        },
        addItem(currentItem, currentVariant = 1, price, chooseAdditives = []) {
            this.addCartItem({
                product_id: currentItem,
                count: 1,
                variants: currentVariant,
                additives: chooseAdditives,
                price: price,
            });
            this.getCartTotal()
        },
        deleteItem(cartItemId) {
            console.log(cartItemId);
            this.deleteCartItem(cartItemId)
            this.getCartTotal()
        },
    },
})

const routes = [
    {
        path: '/',
    },
]

const router = new VueRouter({
    mode: 'history',
    routes,
    store: store,
})

const app = new Vue({ router }).$mount('#app')
