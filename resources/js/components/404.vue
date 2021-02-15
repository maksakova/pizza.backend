<template>
  <main class="error">
    <Menu simple="simple"/>
    <div class="container">
      <div class="row">
        <div class="col-lg-4 offset-lg-4 col-sm-8 offset-sm-2">
          <img src="~@/assets/img/common/404.svg" class="error__img">
          <h1>Страница не найдена</h1>
          <p>Возможно, у вас опечатка в адресе страницы,
            или её просто не существует.</p>
          <router-link to="/" class="button">Вернуться на главную</router-link>
        </div>
      </div>
    </div>
  </main>
</template>

<script>
export default {
  name: "404"
}
</script>

<style lang="sass">
@import "../assets/sass/main.sass"

.error
  background: url('~@/assets/img/common/404.png') center right
  text-align: center
  min-height: 500px
  &__img
    margin: 30px 0 20px

@media (min-width: 992px)
  .error
    height: calc(100vh - 106px - 409px)

@media (min-width: 1200px)
  .error
    height: calc(100vh - 91px - 305px)
    p
      font-size: 16px
    &__img
      margin: 30px 0

</style>