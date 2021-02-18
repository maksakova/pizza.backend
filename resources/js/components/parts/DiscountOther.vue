<template>
  <div class="col-md-4 col-lg-12">
    <router-link to="/discountsitem" class="discount-other">
      <img class="discount-other__img" :src=item.img>
      <div class="discount-other__text">
        <h3>{{item.name}}</h3>
        <p class="discount-other__time">{{item.time}}</p>
      </div>
    </router-link>
  </div>
</template>

<script>
export default {
  name: "DiscountOther",
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

.discount-other
  padding: 10px
  display: flex
  align-items: flex-start
  background: $white
  border-radius: 8px
  margin-bottom: 15px
  transition: .3s
  h3
    font-size: 14px
    font-weight: 700
    line-height: 17px
    margin-bottom: 10px
  &__img
    width: 118px
    margin-right: 10px
    border-radius: 4px
  &__text
    width: calc(100% - 128px)
  &__time
    color: $text-light
    background: url('~@/assets/img/discounts/clock.svg') left center no-repeat
    font-size: 11px
    font-weight: 400
    padding-left: 20px
    margin-bottom: 0
  &:hover
    transform: translateY(-5px)

@media (min-width: 768px)
  .discount-other
    flex-wrap: wrap
    &__img
      width: 100%
    &__text
      width: 100%

@media (min-width: 992px)
  .discount-other
    margin-bottom: 15px
    &__img
      width: 110px
    &__text
      width: calc(100% - 120px)

@media (min-width: 1200px)
  .discount-other
    padding: 15px
    margin-bottom: 30px
    &__img
      width: 167px
      margin-right: 15px
    &__text
      width: calc(100% - 182px)


</style>