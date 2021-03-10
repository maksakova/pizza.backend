<template>
    <div>
        <swiper class="swiper" :options="swiperOptions">
            <swiper-slide class="swiper-item"
                          v-for="image in mainBanners"
                          v-bind:key="image.id"
                          :style="{ backgroundImage: 'url(' + image.img + ')' }">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 offset-xl-1">
                            <a :href="image.link" v-html="image.text"></a>
                        </div>
                    </div>
                </div>
            </swiper-slide>
        </swiper>
        <Menu simple="no"/>
        <main class="main">
            <div class="container">
                <div v-for="(products, menu_category_slug) in catProducts" v-bind:key="products.id">
                    <h2 :id="menu_category_slug">{{ products['menu_category_name'] }}</h2>

                    <div class="main__filter" v-if="menu_category_slug == 'pizza'">
                        <div class="main__filter__inner">
                            <button class="main__filter__button"
                                    @click="activeFilters = []"
                                    v-bind:class="{active: activeFilters.length === 0}"
                            >Все</button>
                            <label class="checkbox"
                                   v-for="item in filters"
                                   v-bind:key="item.name">
                                <input type="checkbox" :value="item.id" v-model="activeFilters" />
                                <div class="checkbox__text">
                      <span class="main__filter__button">
                        <img :src=item.img>
                        {{item.name}}
                      </span>
                                </div>
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-9">

                            <div class="row main__menu" v-if="menu_category_slug === 'pizza'">
                                <product-card v-for="product in filterData" v-bind:key="product.id" v-bind:item="product" />
                            </div>

                            <div class="row main__menu" v-else>
                                <product-card v-for="product in products" v-bind:key="product.id" v-bind:item="product" />
                            </div>
                        </div>
                        <div class="col-xl-3 d-none d-xl-block">
                            <div class="main__cart">
                                <div class="main__cart__header">
                                    <div class="main__cart__title">
                                        <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M24.0232 19.1712H5.82824V17.8464H21.1679C21.7073 17.8464 22.1445 17.409 22.1445 16.8698V8.7117C22.1445 8.2589 21.8334 7.8656 21.3928 7.76127L5.82824 4.07894V2.89829C5.82824 2.52732 5.61786 2.18838 5.2856 2.02358L1.41044 0.10155C0.927119 -0.138395 0.341182 0.0592065 0.101619 0.542338C-0.137944 1.02547 0.0594662 1.6116 0.542598 1.85116L3.87512 3.50407V20.1478C3.87512 20.6872 4.31228 21.1243 4.85168 21.1243H6.93851C6.83303 21.4255 6.77486 21.7488 6.77486 22.0855C6.77486 23.6922 8.08216 24.9995 9.6889 24.9995C11.2958 24.9995 12.6031 23.6922 12.6031 22.0855C12.6031 21.7488 12.545 21.4255 12.4395 21.1243H17.4551C17.3496 21.4255 17.2914 21.7488 17.2914 22.0855C17.2914 23.6922 18.5987 24.9995 20.2056 24.9995C21.8124 24.9995 23.1197 23.6922 23.1197 22.0855C23.1197 21.7488 23.0615 21.4255 22.956 21.1243H24.0232C24.5626 21.1243 24.9998 20.6872 24.9998 20.1478C24.9998 19.6086 24.5626 19.1712 24.0232 19.1712ZM5.82824 6.08605L20.1913 9.48418V15.8933H5.82824V6.08605ZM9.6889 23.0464C9.15904 23.0464 8.72798 22.6153 8.72798 22.0855C8.72798 21.5556 9.15904 21.1243 9.6889 21.1243C10.219 21.1243 10.65 21.5556 10.65 22.0855C10.65 22.6153 10.219 23.0464 9.6889 23.0464ZM20.2056 23.0464C19.6756 23.0464 19.2445 22.6153 19.2445 22.0855C19.2445 21.5556 19.6756 21.1243 20.2056 21.1243C20.7355 21.1243 21.1666 21.5556 21.1666 22.0855C21.1666 22.6153 20.7355 23.0464 20.2056 23.0464Z" fill="#202020"/>
                                        </svg>
                                        <h3>Корзина <span>(<cart-count/>)</span></h3>
                                    </div>
                                    <button class="main__cart__button" v-if="$store.state.cartCount > 0" @click="cleanCart()">Очистить</button>
                                </div>
                                <div class="main__cart__empty" v-if="$store.state.cartCount === 0">
                                    <img src="/img/main/cart-empty.svg">
                                    <p>Добавьте товар в корзину.<br>
                                        У нас все очень вкусное.</p>
                                </div>
                                <div class="main__cart__items">
                                    <cart-product-card v-for="(product, key) in $store.state.cart" v-bind:key="key" v-bind:item="product" v-bind:ingredients="ingredients"/>
                                </div>
                                <div class="main__cart__total">
                                    Сумма заказа:
                                    <cart-sum/>
                                </div>
                                <router-link to="/cart" class="button button-cart-arrow" v-bind:class="{ disabled: $store.state.cartCount === 0 }">Оформить заказ</router-link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <Seo/>

        <modal
            :width="1000"
            :height="550"
            :adaptive="true"
            class="pr"
            name="product-modal">
            <product-modal v-bind:currentItem="currentItem" v-bind:ingredients="ingredients"/>
        </modal>

        <modal class="modalinfo"
               :width="403"
               :height="343"
               :adaptive="true"
               name="demand-modal">
            <img src="/img/common/demand.png">
            <h2>Повышенный спрос</h2>
            <p>Заказов сейчас очень много, и время доставки может быть увеличено</p>
            <button class="button" @click="hide('demand-modal')">Хорошо</button>
        </modal>

        <modal class="modalinfo"
               :width="403"
               :height="371"
               :adaptive="true"
               name="closed-modal">
            <img src="/img/common/closed.png">
            <h2>Сейчас доставка не работает</h2>
            <p>Мы открываемся завтра в 10:00.<br>
                Вы можете сделать заказ на завтра</p>
            <button class="button" @click="hide('closed-modal')">Хорошо</button>
        </modal>
    </div>
</template>

<script>
import Menu from '../components/parts/Menu'
import Seo from '../components/parts/Seo'
import 'swiper/css/swiper.css'
import { Swiper, SwiperSlide, directive } from 'vue-awesome-swiper'
import axios from "axios";

export default {
    name: "Index",
    components: {
        Menu,
        Seo,
        Swiper,
        SwiperSlide
    },
    data() {
        return {
            swiperOptions: {
                pagination: {
                    el: '.swiper-pagination'
                },
            },
            activeFilters: [],
            mainBanners: [],
            filters: [],
            products: [],
            ingredients: [],
            settings: [],
            currentItem: this.$store.state.currentItem,
            cartCount: this.$store.state.cartCount,
            cart: this.$store.state.cart
        }
    },
    directives: {
        swiper: directive
    },
    mounted() {
        axios
            .post('/api/mainBanners')
            .then(response => (this.mainBanners = response.data));
        axios
            .post('/api/filters')
            .then(response => (this.filters = response.data));
        axios
            .post('/api/ingredients')
            .then(response => (this.ingredients = response.data));
        axios
            .post('/api/settings')
            .then(response => (this.settings = response.data));
    },
    created() {
        this.fetchData()
    },
    watch: {
        $route: 'fetchData'
    },
    methods: {
        activeFilter: function () {
            this.isActive = !this.isActive;
        },
        cleanCart() {
            this.$store.commit('cleanCart');
        },
        fetchData() {
            console.log(this.$route.params.slug);
            axios
                .post('/api/products', {
                    category: this.$route.params.slug
                })
                .then(response => (this.products = response.data))
        }
    },
    computed: {
        catProducts() {
            console.log(this.$route.params.slug);
            return this.products.reduce((p,c) => {
                const menu_category_name = c.menu_category.name;
                const menu_category_slug = c.menu_category.slug;
                p[menu_category_slug] = p[menu_category_slug] || [];
                p[menu_category_slug]['menu_category_name'] = menu_category_name;
                p[menu_category_slug].push(c);
                return p;
            }, {});
        },
        filterData() {
            let data = []
            if (this.activeFilters.length) {
                data = this.products.filter(x => this.activeFilters.indexOf(x.menu_filter_id) + '' != -1)
            } else {
                data = this.catProducts['pizza']
            }
            return data
        },
    },
}
</script>

<style lang="sass">
@import "resources/sass/main"

.swiper-container
    height: 120px

.swiper-item
    width: 100%
    height: 120px
    background-size: cover
    background-position: center
    padding: 30px 15px 15px
    .text1
        background: #000
        color: $white
        display: inline-block
        font-size: 15px
        font-weight: 700
        border-radius: 6px
        padding: 2px 8px
        margin-bottom: 4px
        span
            color: #FFC413
            font-weight: 800
    .text3
        font-weight: 700
        color: $white

.main__menu
    background: $white
    margin-bottom: 24px
.main__filter
    overflow-x: auto
    margin: 0 -15px 15px 0
    &::-webkit-scrollbar
        height: 0
    &__inner
        width: max-content
        input
            width: auto
    &__button
        font-size: 12px
        border: 2px solid $light
        background: transparent
        box-sizing: border-box
        filter: drop-shadow(0px 5px 20px rgba(119, 119, 119, 0.1))
        border-radius: 26px
        padding: 6px 12px
        margin: 0 15px 0 0
        color: $text
        transition: .3s
        display: inline-block
        &.active
            background: $white
            border: 2px solid transparent
    .checkbox
        margin: 0
        width: auto
        &__text
            padding: 0
            &:before,
            &:after
                display: none
        input:checked + .checkbox__text
            .main__filter__button
                background: $white
                border: 2px solid $white
                box-shadow: 0 5px 8px rgba(34, 39, 41, 0.05)

.main__cart
    background: $white
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.03)
    border-radius: 10px
    padding-bottom: 10px
    position: sticky
    top: 158px
    margin: 15px 0 80px
    h3
        font-size: 18px
        font-weight: 700
        margin-bottom: 0
    &__header
        border-radius: 10px 10px 0 0
        background: $main
        box-shadow: inset 0 2px 2px #8FEAB1, inset 0px -2px 2px rgba(0, 99, 28, 0.3)
        display: flex
        justify-content: space-between
        padding: 12px 15px
        svg
            margin-right: 10px
    &__title
        display: flex
        align-items: center
    &__items
        max-height: calc(100vh - 127px - 60px - 49px - 72px - 49px)
        overflow-y: auto
        &::-webkit-scrollbar
            width: 4px
            background: $bg
        &::-webkit-scrollbar-thumb
            background: $main
    &__button
        border: none
        background: transparent
        padding: 0
        &:hover
            text-decoration: underline
    &__total
        padding: 22px 15px 20px
        display: flex
        justify-content: space-between
        align-items: center
        font-weight: 700
        span
            font-size: 20px
    .cart-item
        border-bottom: 1px solid #F2F2F2
        border-radius: 0
        margin-bottom: 0
    &__empty
        display: flex
        flex-direction: column
        justify-content: center
        align-items: center
        text-align: center
        padding: 45px 15px 15px
        color: #C4C4C4
        min-height: 387px
        img
            margin-bottom: 15px


@media (min-width: 576px)
    .main__menu
        background: transparent

@media (min-width: 992px)
    .swiper-container
        height: 300px

    .swiper-item
        height: 300px
        .text1
            font-size: 50px
            line-height: 1.3
            padding: 8px 18px
        .text3
            font-size: 46px
            text-transform: uppercase

    .main
        &__filter
            &__button
                font-size: 14px

@media (min-width: 1200px)
    .swiper
        margin-bottom: 65px

    .swiper-container
        height: 420px

    .swiper-item
        height: 420px
        display: flex
        align-items: center
        padding-bottom: 24px

    .main
        &__filter
            margin: 0 0 20px 0
            overflow: unset
            &__button
                padding: 8px 14px
                margin-right: 26px
                &:hover
                    transform: translateY(-5px)
        &__menu
            margin-bottom: 82px

@media (min-width: 1600px)
    .swiper-container
        height: 560px

    .swiper-item
        height: 560px

</style>
