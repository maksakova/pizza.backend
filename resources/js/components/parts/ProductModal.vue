<template>
  <div class="product-modal">
      {{ $store.state.currentItemId }}
    <span class="product-modal__back" @click="hide('product-modal')">
      <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M9.375 3.75L5.625 7.5L9.375 11.25" stroke="#828282" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
      Вернуться в меню
    </span>
    <!--<div class="product-modal__inner">
      <div class="product-modal__image">
        <img :src="products[currentItem].img">
      </div>
      <div class="product-modal__text">
        <div class="product-modal__text__inner">
          <h2>{{products[currentItem].name}}</h2>
          <h4>{{products[currentItem].description}} 25 см, традиционное тесто, 420 г</h4>
          <p>{{products[currentItem].composition}} <span v-if="products[currentItem].weight">{{products[currentItem].weight}}</span></p>

          <div v-if="products[currentItem].variants">
            <div class="product-item__variants" v-for="(variants, key) in variantsList" v-bind:key="variants.id">
              <div class="product-item__variants__item"
                   v-for="variant in variants"
                   v-bind:key="variant.id"
                   :style="{ width: 'calc(100% / ' + variants.length + ')' }">
                <label class="radio">
                  <input type="radio"
                         v-if="key == 1"
                         :name="key"
                         :data-price="variant.price"
                         :value="variant.id"
                         :checked="variant.id === 1"
                         v-model="currentVariant1"
                  />
                  <input type="radio"
                         v-if="key == 2"
                         :name="key"
                         :data-price="variant.price"
                         :value="variant.id"
                         :checked="variant.id === 3"
                         v-model="currentVariant2"
                  />
                  <div class="radio__text">{{variant.name}}</div>
                </label>
              </div>
            </div>
          </div>

          <div class="product-modal__add" v-if="products[currentItem].menucat_id === 1">
            <h3>Добавить в пиццу</h3>

            <b-tabs>
              <b-tab v-for="(additives, cat_name) in catAdditives" v-bind:key="additives.id" :title="cat_name">
                <label class="checkbox" v-for="additiveItem in additives" v-bind:key="additiveItem.id">
                  <input type="checkbox"
                         :value="additiveItem.id"
                         v-model="chooseAdditives"/>
                  <div class="checkbox__text">
                    <img :src="additiveItem.img">
                    <h4>{{additiveItem.name}}</h4>
                    <span>{{additiveItem.price[products[currentItem].variants[currentVariant2 - 1].size]}} руб.</span>
                  </div>
                </label>
              </b-tab>
            </b-tabs>
          </div>
        </div>
        <div class="product-modal__button">
            <template v-for="thisVariant in chooseCurrentVariant">
              <template v-if="products[currentItem].variants[thisVariant - 1].price">
                <button class="button"
                        @click="addItem(currentItem, chooseCurrentVariant, products[currentItem].variants[thisVariant - 1].price * 1 + pizzaSum, chooseAdditives);
                  hide('product-modal');" v-bind:key="thisVariant">
                  Добавить в корзину за
                {{formatPrice(products[currentItem].variants[thisVariant - 1].price * 1 + pizzaSum)}}
                руб.</button>
              </template>
            </template>
        </div>
      </div>
    </div>-->
  </div>
</template>

<script>
export default {
  name: "ProductModal",
  data() {
    return {
      currentVariant1: 1,
      currentVariant2: 3,
      chooseAdditives: [],
    }
  },
  computed: {
    variantsList() {
      var vars = this.products[this.currentItem].variants;
      return vars.reduce((p,c) => {
        const type_id = c.type_id;
        p[type_id] = p[type_id] || [];
        p[type_id].push(c);
        return p;
      }, {});
    },
    catAdditives() {
      return this.additives.reduce((p,c) => {
        const cat_name = c.cat_name;
        p[cat_name] = p[cat_name] || [];
        p[cat_name].push(c);
        return p;
      }, {});
    },
    chooseCurrentVariant() {
      return [this.currentVariant1, this.currentVariant2]
    },
    pizzaSum() {
      var totalPizzaSum = 0;
      for (let i = 0; i < this.chooseAdditives.length; i += 1) {
        totalPizzaSum += additives[this.chooseAdditives[i] - 1].price[products[this.currentItem].variants[this.currentVariant2 - 1].size] * 1
      }
      totalPizzaSum = totalPizzaSum * 1
      return totalPizzaSum
    }
  },
}
</script>

<style lang="sass">
@import "resources/sass/main"

.product-modal
  background: $white
  right: 0
  max-width: calc(100vw - 60px)
  z-index: 100
  margin: 0 auto
  border-radius: 8px
  padding: 16px 0 11px 20px
  height: calc(100vh - 60px)
  max-height: 550px
  &::-webkit-scrollbar
    width: 4px
    background: $bg
    border-radius: 4px
  &::-webkit-scrollbar-thumb
    background: #BDBDBD
    border-radius: 4px
  h2
    font-size: 18px
    font-weight: 700
    line-height: 130%
  h3
    font-size: 16px
    font-weight: 700
    line-height: 130%
  h4
    font-size: 14px
    line-height: 17px
  p
    color: $text-light
    font-weight: 400
  &__back
    color: $text-light
    font-size: 12px
    line-height: 12px
    display: flex
    align-items: center
    margin-bottom: 10px
    cursor: pointer
    svg
      margin-right: 6px
    &:hover
      color: $main
      svg path
        stroke: $main
  &__inner
    display: flex
    height: 100%
  &__image
    width: 53%
    img
      width: 100%
      border-radius: 8px
  &__text
    width: calc(47% - 11px)
    &__inner
      overflow-y: auto
      overflow-x: hidden
      height: calc(100% - 70px)
      padding: 0 14px 0 34px
      &::-webkit-scrollbar
        width: 4px
        background: $bg
        border-radius: 4px
      &::-webkit-scrollbar-thumb
        background: #BDBDBD
        border-radius: 4px
  &__add
    &__cat,
    .nav-tabs
      position: relative
      display: flex
      justify-content: space-between
      padding: 4px 6px 10px
      margin-bottom: 20px
      border-bottom: none
      &:after
        content: ''
        width: 100%
        height: 5px
        background: $bg
        border-radius: 5px
        position: absolute
        bottom: 0
        left: 0
      .nav-link
        padding: 0
        border: none
        position: relative
        z-index: 1
        &:hover
          border: none
        &.active
          border: none
          &:after
            content: ''
            width: 100%
            height: 5px
            background: $main
            border-radius: 5px
            position: absolute
            left: 0
            bottom: -9px
    .checkbox
      font-size: 12px
      line-height: 15px
      box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1)
      border-radius: 8px
      text-align: center
      width: calc((100% - 9px) / 2)
      height: calc(100% - 9px)
      margin: 0 0 9px
      transition: .3s
      &:not(:nth-child(2n))
        margin: 0 9px 9px 0
      h4
        font-size: 12px
        line-height: 15px
        margin-bottom: 6px
        height: 30px
        display: flex
        justify-content: center
        align-items: flex-end
      span
        font-weight: 700
      &__text
        padding: 6px
        border: 2px solid $white
        border-radius: 8px
        img
          margin-bottom: 10px
        &:before,
        &:after
          opacity: 0
      input:checked + .checkbox__text
        border: 2px solid $main
        &:before,
        &:after
          opacity: 0
      &:hover
        transform: translateY(-5px)
  &__button
    text-align: center
    padding: 10px
    .button
      margin: 0 auto
      height: 50px


@media (min-width: 768px)
  .product-modal
    &__back
      display: none
    .checkbox
      font-size: 12px
      line-height: 15px
      box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1)
      border-radius: 8px
      text-align: center
      width: calc((100% - 18px) / 3)
      height: calc(100% - 9px)
      margin: 0 0 9px
      transition: .3s
      &:not(:nth-child(2n))
        margin: 0 0 9px
      &:not(:nth-child(3n))
        margin: 0 9px 9px 0

@media (min-width: 1200px)
  .product-modal
    h2
      font-size: 20px
      line-height: 24px
      margin-bottom: 12px
    h3
      font-size: 18px
      font-weight: 600
      line-height: 22px
    p
      font-size: 14px
      line-height: 17px

@media (max-width: 992px)
  .product-modal
    &__image
      width: 45%
    &__text
      width: calc(55% - 11px)
    &__add
      .nav-tabs
        min-width: max-content
        a
          margin-right: 20px
      .tabs
        div:first-child
          overflow-x: auto
          &::-webkit-scrollbar
            width: 0
            height: 0
            background: transparent
          &::-webkit-scrollbar-thumb
            background: transparent
        .tab-pane
          overflow-x: unset !important
@media (max-width: 575px)
  .pr
    .vm--modal
      height: 100vh !important
      border-radius: 0 !important
  .product-modal
    top: 0
    max-width: 100vw
    padding: 30px 10px 10px
    overflow-y: auto
    overflow-x: hidden
    h2
      margin-bottom: 8px
    &__inner
      display: block
    &__back
      position: fixed
      background: $white
      top: 0
      left: 0
      padding: 10px
      width: 100%
      z-index: 10
      margin-bottom: 0
    &__image
      width: 100%
      margin-bottom: 15px
    &__text
      width: 100%
      padding: 0
      &__inner
        padding: 0
    &__add
      padding-bottom: 70px
      &__scroll
        overflow-x: auto
        margin-right: -10px
        &::-webkit-scrollbar
          width: 0
          height: 0
          background: transparent
        &::-webkit-scrollbar-thumb
          background: transparent
      &__cat
        min-width: max-content
        a
          margin-right: 20px
    &__button
      position: fixed
      bottom: 0
      left: 0
      padding: 10px
      width: 100%
      z-index: 10



</style>
