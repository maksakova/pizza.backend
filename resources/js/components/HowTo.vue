<template>
  <main class="howto">
    <Menu simple="simple"/>
    <div class="container">
      <h1>Условия заказа</h1>
      <div class="row">
        <div class="col-lg-8">
          <div class="row">
            <div class="col-sm-6">
              <div class="howto__item">
                <h2>15.00 руб.</h2>
                <p>Минимальная сумма заказа</p>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="howto__item">
                <h2>с 10:00 до 22:00</h2>
                <p>Доставка (только в г. Минске)</p>
              </div>
            </div>
          </div>
          <div class="text-page">
            <h3>Порядок действий при оформлении заказа на сайте:</h3>
            <ol>
              <li>Добавить нужные товары в корзину путем нажатия на кнопку купить в уменьшенной карточке товара;</li>
              <li>Для перехода в корзину товаров нажать на сумму рядом с изображением корзины в шапке (верхней части) сайта;</li>
              <li>В корзине товаров просмотреть и при необходимости отредактировать состав заказа, после чего нажать на кнопку «Вперед»;</li>
              <li>Далее заполнить поля «Имя», «Телефон» и «Адрес» и нажать на кнопку «Вперед»</li>
              <li>Выбрать способ оплаты, после чего нажать на кнопку «Вперед». Далее в зависимости от выбранного способа оплаты совершить необходимые дей ствия.</li>
            </ol>
            <ul>
              <li>Время приема заказов на доставку: <strong>с 10.00 – до 22.00 ежедневно</strong>.</li>
              <li>Доставка еды осуществляется <strong>только в г. Минске</strong>.</li>
              <li>Доставка осуществляется <strong>строго в соответствии с границами</strong> <router-link to="/map" class="link">зоны доставки</router-link>.</li>
              <li><strong>Адрес доставки</strong> автоматически проверяется в форме заказа.</li>
              <li>Если ваш адрес не входит в зону доставки, вы можете воспользоваться <strong>самовывозом</strong>. Мы находимся по адресу <strong>г.Минск, ул. Ложинская, 5</strong>.</li>
              <li>Оплаченные заказы <strong>не подлежат редактированию</strong>.</li>
            </ul>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="howto__map">
            <router-link to="/map" class="button">Проверить зону доставки</router-link>
          </div>
        </div>
      </div>
    </div>
  </main>
</template>

<script>
export default {
  name: "HowTo"
}
</script>

<style lang="sass">
@import "../assets/sass/main.sass"

.howto
  h2
    font-weight: 800
    color: $main
    margin-bottom: 0
  &__map
    background: url('~@/assets/img/contacts/map.jpg') center
    background-size: cover
    height: 120px
    display: flex
    justify-content: center
    align-items: center
    border-radius: 20px
    margin-bottom: 30px
  &__item
    background: #FCFCFC
    border: 3px solid $bg
    border-radius: 10px
    text-align: center
    padding: 20px 15px 0
    margin-bottom: 15px

@media (min-width: 768px)
  .howto
    &__map
      height: 280px

@media (min-width: 1200px)
  .howto
    h2
      font-size: 25px
      line-height: 30px
      margin-bottom: 8px
    &__item
      padding: 44px 14px 24px
      margin-bottom: 46px
      p
        font-size: 16px
        line-height: 19px

</style>