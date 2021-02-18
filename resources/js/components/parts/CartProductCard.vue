<template>
  <div class="cart-item">
    <div class="cart-item__image" :class="products[item.product_id].cat" :style="{ backgroundImage: 'url(' + products[item.product_id].img + ')' }"></div>
    <div class="cart-item__text">
      <div class="cart-item__description">
        <h3>{{ products[item.product_id].name }}</h3>

        <h4 v-if="typeof(this.item.variants) === 'number'">{{ products[item.product_id].variants[item.variants].name }}</h4>

        <h4 v-else-if="typeof(this.item.variants) === 'object'">
          <span v-for="thisVariant in this.item.variants" v-bind:key="thisVariant - 1">
            {{products[item.product_id].variants[thisVariant - 1].name}}
          </span>
        </h4>

        <p v-if="this.item.additives.length && this.item.additives.length > 0">
          <span class="added">Добавлено: </span>
          <template v-for="add in this.item.additives">
            <span class="additive" :key="add - 1">{{additives[add - 1].name}}</span>
          </template>
        </p>
      </div>

      <template v-if="typeof(this.item.variants) === 'number'">
        <span class="cart-item__price cart-item__price-one" >
          {{products[this.item.product_id].variants[this.item.variants].price}}
        </span>
        <div class="cart-item__bottom">
          <vue-numeric-input v-model="item.count" :min="1" :max="100" :step="1" @input="changeCount(item.product_id)"></vue-numeric-input>
          <span class="cart-item__price">{{formatPrice(products[this.item.product_id].variants[this.item.variants].price * item.count)}} руб.</span>
        </div>
      </template>

      <template v-else-if="typeof(this.item.variants) === 'object' || !this.item.variants">
        <span class="cart-item__price cart-item__price-one">
          {{formatPrice(this.item.price)}}
        </span>
        <div class="cart-item__bottom">
          <vue-numeric-input v-model="item.count" :min="1" :max="100" :step="1" @input="changeCount(item.product_id)"></vue-numeric-input>
          <span class="cart-item__price">
          {{formatPrice(this.item.price * item.count)}} руб.
          </span>
        </div>
      </template>
      <!--<div class="cart-item__close" @click="show('delete-modal'); changeCurrentItemId(this.item.id)">
        <img :src=remove>
      </div>-->
      <div class="cart-item__close" @click="deleteItem(cartItemId)">
        <img :src=remove>
      </div>
    </div>
  </div>
</template>

<script>
import VueNumericInput from 'vue-numeric-input'
import products from '@/products'
import additives from "@/additives";
import {mapActions} from 'vuex';

export default {
  name: "CartProductCard",
  components: {
    VueNumericInput
  },
  data() {
    return {
      value: 1,
      remove: require('@/assets/img/common/remove.svg'),
      products: products,
      additives: additives,
    };
  },
  props: {
    item: {
      type: Object,
      required: true
    },
    cartItemId: {
      type: Number,
      required: true
    }
  },
  methods: {
    ...mapActions(['getCartTotal']),
    changeCount() {
      this.getCartTotal()
    }
  },
}
</script>

<style lang="sass">
@import "@/assets/sass/main.sass"

.cart-item
  background: $white
  border-radius: 10px
  padding: 15px
  display: flex
  margin-bottom: 15px
  position: relative
  h3
    font-size: 14px
    font-weight: 700
    line-height: 130%
    margin-bottom: 10px
  h4
    font-size: 12px
    line-height: 15px
    font-weight: 600
  p
    font-size: 12px
    line-height: 15px
    color: $text-light
    .added
      color: $text
    .additive:not(:last-child)
      &:after
        content: ', '
  &__close
    position: absolute
    top: 8px
    right: 15px
    cursor: pointer
    &:hover
      filter: brightness(0)
  &__image
    width: 56px
    height: 38px
    border-radius: 8px
    background-size: cover
    background-position: center
    margin-right: 10px
  &__text
    width: calc(100% - 66px)
  &__bottom
    margin: 20px 0 0
    display: flex
    justify-content: space-between
    align-items: center
  &__price
    font-weight: 700
    &-one
      display: none

@media (min-width: 992px)
  .cart__products
    .cart-item
      &__image
        width: 138px
        height: 92px
        margin-right: 20px
      &__text
        width: calc(100% - 102px)
        display: flex
      &__bottom
        max-width: 300px
        margin: 0
      &__close
        position: static
        width: 60px
        text-align: center
        display: flex
        justify-content: center
        align-items: center
      &__description
        width: calc(100% - 140px - 140px - 140px)
      &__price
        width: 140px
        text-align: center
        display: flex
        justify-content: center
        align-items: center
        &-one
          display: flex
      &__count
        width: 98px
        text-align: center

</style>