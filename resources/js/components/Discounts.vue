<template>
  <main class="discounts">
    <Menu simple="simple"/>
    <div class="container">
      <h1>Акции</h1>
      <div class="row">
        <DiscountCard v-for="discount in discounts" v-bind:key="discount.id" v-bind:item="discount"></DiscountCard>
      </div>
    </div>
  </main>
</template>

<script>
export default {
  name: "Discounts",
  data() {
    return {
      discounts: [
        {
          id: 1,
          name: 'Скидка 20% на самовывоз',
          time: 'Бессрочная акция',
          img: require('@/assets/img/discounts/1.jpg'),
        },
        {
          id: 2,
          name: 'Набор “Удачная ночь” за 35,30 руб.',
          time: 'Акция действует до 31.12.2020',
          img: require('@/assets/img/discounts/2.jpg'),
        },
        {
          id: 3,
          name: 'Еще какая-то акция или скидка',
          time: 'Акция действует до 31.12.2020',
          img: require('@/assets/img/discounts/3.jpg'),
        },
        {
          id: 4,
          name: 'Еще какая-то акция или скидка',
          time: 'Бессрочная акция',
          img: require('@/assets/img/discounts/4.jpg'),
        },
      ],
    }
  }
}
</script>

<style lang="sass">
@import "../assets/sass/main.sass"

.discounts
  padding-bottom: 60px

</style>