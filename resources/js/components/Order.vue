<template>
  <main class="order">
    order
  </main>
</template>

<script>
export default {
  name: "Order",
  data() {
    return {
      deliveryMethod: true,
    }
  },
}
</script>

<style lang="sass">
@import "resources/sass/main"

.order
  padding: 0 0 60px
  &__block
    background: $white
    border-radius: 10px
    padding: 15px 15px 0
    margin-bottom: 20px
    h2
      font-size: 15px
      margin-bottom: 10px
  &__delivery
    color: $text-light
    margin-bottom: 24px
  &__order
    margin-bottom: 20px

@media (min-width: 992px)
  .order
    &__block
      &-delivery
        display: flex
        align-items: center
        margin-bottom: 20px
        .product-item__variants
          width: 258px
          margin: 0 30px 0 0
      &-pay
        .product-item__variants
          width: 384px
        p
          width: 396px
          font-size: 16px
          line-height: 19px
          color: $text-light
    &__delivery
      margin-bottom: 0

@media (min-width: 1200px)
  .order
    &__block
      padding: 28px 30px
      margin-bottom: 35px
      h2
        font-size: 20px
        line-height: 24px
        margin-bottom: 16px
        &:nth-child(3)
          font-size: 16px
          line-height: 19px
      &-delivery
        margin-bottom: 38px


</style>
