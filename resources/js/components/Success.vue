<template>
  <main class="success">
    <Menu simple="simple"/>
    <div class="container">
      <img src="~@/assets/img/common/success.svg" class="success__img">
      <h1>Благодарим, что выбрали нас!</h1>
      <p>Ваш заказ <span>№123</span> будет приготовлен и доставлен в течение <span>60-90 минут</span></p>
      <router-link to="/" class="button">Отлично, жду!</router-link>
    </div>
  </main>
</template>

<script>
export default {
  name: "Success"
}
</script>

<style lang="sass">
@import "../assets/sass/main.sass"

.success
  text-align: center
  min-height: 460px
  p
    color: $text-light
    span
      color: $text
  &__img
    margin: 30px 0 20px

@media (min-width: 992px)
  .success
    height: calc(100vh - 106px - 409px)

@media (min-width: 1200px)
  .success
    height: calc(100vh - 91px - 305px)
    p
      font-size: 16px
    &__img
      margin: 30px 0

</style>