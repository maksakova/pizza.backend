<template>
  <div class="col-lg-4 col-sm-6">
    <div class="discount-item">
      <img class="discount-item__img" :src=item.img>
      <div class="discount-item__text">
        <div class="discount-item__info">
          <h2>{{item.name}}</h2>
          <p class="discount-item__time">{{item.time}}</p>
        </div>
        <router-link to="/discountsitem" class="button">Подробнее</router-link>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "DiscountCard",
  props: {
    item: {
      type: Object,
      required: true
    },
  },
}
</script>

<style lang="sass">
@import "~@/assets/sass/main.sass"

.discount-item
  background: $white
  border-radius: 8px
  margin-bottom: 30px
  height: calc(100% - 30px)
  transition: .3s
  h2
    font-size: 14px
    line-height: 130%
    margin-bottom: 10px
  &__img
    border-radius: 8px
    width: 100%
  &__text
    padding: 15px
  &__time
    color: $text-light
    background: url('~@/assets/img/discounts/clock.svg') left center no-repeat
    font-size: 12px
    font-weight: 400
    padding-left: 20px
    margin-bottom: 20px
  &:hover
    transform: translateY(-5px)

@media (min-width: 576px)
  .discount-item
    &__info
      height: 84px

@media (min-width: 768px)
  .discount-item
    h2
      font-size: 16px
      line-height: 19px
@media (min-width: 1200px)
  .discount-item
    &__text
      padding: 20px


</style>