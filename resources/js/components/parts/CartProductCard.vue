<template>
  <div class="cart-item">
    <div class="cart-item__image" :class="item.cat" :style="{ backgroundImage: 'url(' + item.img + ')' }"></div>
    <div class="cart-item__text">
      <div class="cart-item__description">
        <h3>{{ item.name }}</h3>

          <h4>
              <template v-if="item.currentVariant1 !== undefined">{{item.product_variants[item.currentVariant1].name}}</template>
              <template v-if="item.currentVariant2 !== undefined">{{item.product_variants[item.currentVariant2].name}}</template>
          </h4>

        <p v-if="item.additives && item.additives.length > 0">
          <span class="added">Добавлено: </span>
          <template v-for="add in item.additives">
            <span class="additive" :key="add">{{ingredients[add - 1].name}}</span>
          </template>
        </p>
      </div>

        <span class="cart-item__price cart-item__price-one">
          {{formatPrice(this.item.min_price)}}
        </span>

        <div class="cart-item__bottom">
            <vue-numeric-input v-model="item.quantity" :min="1" :max="100" :step="1" @input="cartItemQuantity(item, item.quantity)"></vue-numeric-input>
            <span class="cart-item__price">
          {{formatPrice(item.price * item.quantity)}} руб.
          </span>
        </div>

      <div class="cart-item__close" @click.prevent="removeFromCart(item)">
        <img :src=remove>
      </div>
    </div>
  </div>
</template>

<script>
import VueNumericInput from 'vue-numeric-input'

export default {
    name: "CartProductCard",
    components: {
        VueNumericInput
    },
    data() {
        return {
            value: 1,
            remove: 'img/common/remove.svg',
        };
    },
    props: {
        item: {
            type: Object,
            required: true
        },
        ingredients: {
            type: Array,
            required: true
        },
    },
    methods: {
        removeFromCart(item) {
            this.$store.commit('removeFromCart', item);
        },
        cartItemQuantity(item, quantity) {
            this.item.quantity = quantity;
            this.$store.commit('cartItemQuantity', {item, quantity});
        }
    },
    watch: {
        item: function(newVal, oldVal) { // watch it
            console.log('Prop changed: ', newVal, ' | was: ', oldVal)
        }
    },
}
</script>

<style lang="sass">
@import "resources/sass/main"

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
    white-space: nowrap
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
