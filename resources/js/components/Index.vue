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
                <div class="row">
                    <div class="col-xl-9">
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
                        <img :src=item.url>
                        {{item.name}}
                      </span>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <div class="row main__menu" v-if="menu_category_slug === 'pizza'">
                                <product-card v-for="product in filterData" v-bind:key="product.id" v-bind:item="product" v-bind:ingredients="ingredients"/>
                            </div>

                            <div class="row main__menu" v-else>
                                <product-card v-for="product in products" v-bind:key="product.id" v-bind:item="product" v-bind:ingredients="ingredients"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 d-none d-xl-block">
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
            <product-modal v-bind:currentItem="currentItem"/>
        </modal>
    </div>
</template>

<script>
import Menu from '../components/parts/Menu'
import Seo from '../components/parts/Seo'
import 'swiper/css/swiper.css'
import { Swiper, SwiperSlide, directive } from 'vue-awesome-swiper'
import axios from "axios";
import {mapGetters, mapActions, mapMutations} from 'vuex'

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
            ingredients: []
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
            .post('/api/products')
            .then(response => (this.products = response.data));
        axios
            .post('/api/ingredients')
            .then(response => (this.ingredients = response.data));
    },
    methods: {
        activeFilter: function () {
            this.isActive = !this.isActive;
        },
        ...mapActions(['getCurrentItemId']),
    },
    computed: {
        catProducts() {
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
    margin: 130px 0 80px
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
        height: calc(100% - 49px - 72px - 49px)
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
