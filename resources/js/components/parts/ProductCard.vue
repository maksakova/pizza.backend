<template>
    <div class="col-lg-4 col-sm-6 product-item__outer">
        <div class="product-item">
            <div class="product-item__image"
                 v-if="item.menu_filter_id"
                 v-bind:class="item.menu_filter.slug"
                 :style="{ backgroundImage: 'url(' + item.img + ')' }"></div>
            <div class="product-item__image"
                 v-else
                 :style="{ backgroundImage: 'url(' + item.img + ')' }"></div>
            <div class="product-item__text">
                <div>
                    <h3>{{item.name}}</h3>
                    <p>{{item.composition}} <span v-if="item.weight">{{item.weight}}</span></p>
                </div>

                <div>
                    <div class="product-item__variants" v-if="item.variants_show == 1 && item.product_variants.length > 0">

                        <div class="product-item__variants__item"
                             v-for="(variant, key) in item.product_variants"
                             v-bind:key="variant.id"
                             :style="{ width: 'calc(100% / ' + item.product_variants.length + ')' }">
                            <label class="radio">
                                <input type="radio"
                                       :name="item.id"
                                       :data-price="variant.price"
                                       :value="key"
                                       v-model="currentVariant1"
                                />
                                <div class="radio__text">{{variant.name}}</div>
                            </label>
                        </div>
                    </div>

                    <div class="product-item__bottom">

                        <!--One type of variants Product-->
                        <template
                            v-if="item.variants_show == 1 && item.product_variants.length > 0">
            <span class="product-item__price">
              {{ item.product_variants[currentVariant1].price }} руб.
            </span>
                            <button class="button" @click="addToCart(item, currentVariant1)">
                                Выбрать
                            </button>
                        </template>

                        <!--Product with Modal-->
                        <template v-else-if="item.variants_show == 0 && item.product_variants.length > 0">
            <span class="product-item__price">
              от {{ item.min_price }} руб.
            </span>
                            <button class="button"
                                    @click="show('product-modal');
                                    currentItem(item)">
                                Выбрать
                            </button>
                        </template>

                        <!--Simple Product-->
                        <template v-else>
            <span class="product-item__price">
              {{ item.min_price }} руб.
            </span>
                            <button class="button" @click="addToCart(item)">
                                Выбрать
                            </button>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    name: "ProductCard",
    props: {
        item: {
            type: Object,
            required: true
        },
    },
    data() {
        return {
            currentVariant1: 0,
        }
    },
    methods: {
        currentItem(item) {
            this.$store.commit('currentItem', item);
        },
        addToCart(item, currentVariant1) {
            console.log(item);
            this.$store.commit('addToCart', {item, currentVariant1});
        }
    }
}
</script>

<style lang="sass">
@import "resources/sass/main"

.product-item
    padding: 15px 0
    border-bottom: 1px solid $bg
    border-radius: 8px
    transition: .3s
    h3
        font-size: 16px
        line-height: 19px
        font-weight: 700
    p
        font-size: 14px
        font-weight: 400
        line-height: 17px
        color: $text-light
        margin-bottom: 15px
        span
            color: $text
    &__image
        width: 100%
        height: 180px
        border-radius: 8px
        background-size: cover
        background-position: center
        margin-bottom: 16px
        position: relative
        &.veg
            &:after
                content: url("/../img/common/product-veg-small.svg")
                position: absolute
                top: 8px
                right: 7px
        &.hot
            &:after
                content: url("/../img/common/product-hot-small.svg")
                position: absolute
                top: 8px
                right: 7px
    &__text
        padding: 0 3px
        height: auto
        display: flex
        flex-direction: column
        justify-content: space-between
    &__variants
        display: flex
        padding: 2px
        background: $bg
        box-shadow: inset 0px -1px 5px rgba(0, 0, 0, 0.1)
        height: 35px
        border-radius: 20px
        margin-bottom: 16px
        position: relative
        &__item
            font-size: 12px
            font-weight: 500
            height: 31px
            display: flex
            justify-content: center
            align-items: center
            color: $text-light
            transition: .3s
            position: relative
            z-index: 1
            cursor: pointer
            &.active
                font-weight: 600
                color: $main-dark
        &__bg
            position: absolute
            height: 31px
            background: $white
            box-shadow: 0px 4px 3px rgba(64, 94, 72, 0.1)
            border-radius: 20px
            transition: .3s
    &__bottom
        display: flex
        justify-content: space-between
        align-items: center
    &__price
        font-weight: 700
    &:hover
        transform: translateY(-5px)

@media (min-width: 576px)
    .product-item
        border: none
        background: $white
        padding: 0px 0 15px
        margin: 15px 0 0
        &__text
            padding: 0 20px
            height: calc(100% - 196px)

@media (min-width: 992px)
    .product-item
        &__text
            height: calc(100% - 196px)

@media (min-width: 1200px)
    .product-item
        padding: 0px 0 24px
        h3
            margin-bottom: 12px
        &__image
            height: 194px
            margin-bottom: 20px
            &.veg
                &:after
                    content: url("/../img/common/product-veg.svg")
                    top: unset
                    right: 6px
                    bottom: 0
            &.hot
                &:after
                    content: url("/../img/common/product-hot.svg")
                    top: unset
                    right: 6px
                    bottom: 0
        &__text
            height: calc(100% - 240px)
        &__variants
            height: 40px
            margin-bottom: 20px
            &__item,
            &__bg
                height: 36px

@media (min-width: 1400px)
    .product-item
        &__price
            font-size: 20px
        &__variants
            &__item
                font-size: 14px

</style>
