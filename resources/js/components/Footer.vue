<template>
    <footer>
        <div class="footer__info">
            <div class="container">
                <div class="row">
                    <div class="col-xl-2 col-lg-4">
                        <the-logo></the-logo>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-6 col-sm-5">
                        <p class="footer__phone">
                            <the-phone/>
                        </p>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-6 offset-md-0 col-sm-5 offset-sm-2">
                        <p class="footer__address">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11 2.75C6.45081 2.75 2.75 6.45081 2.75 11C2.75 15.5492 6.45081 19.25 11 19.25C15.5492 19.25 19.25 15.5492 19.25 11C19.25 6.45081 15.5492 2.75 11 2.75ZM11 17.75C7.2782 17.75 4.25 14.7218 4.25 11C4.25 7.2782 7.2782 4.25 11 4.25C14.7218 4.25 17.75 7.2782 17.75 11C17.75 14.7218 14.7218 17.75 11 17.75Z" fill="#44C373" stroke="#44C373" stroke-width="0.5"/>
                                <path d="M10.2499 11.207V11.3105L10.3232 11.3837L13.1161 14.1767C13.409 14.4696 13.8838 14.4696 14.1767 14.1767C14.4696 13.8838 14.4696 13.409 14.1767 13.1161L11.7499 10.6893V6.49994C11.7499 6.08573 11.4142 5.74994 10.9999 5.74994C10.5857 5.74994 10.2499 6.08573 10.2499 6.49994V11.207Z" fill="#44C373" stroke="#44C373" stroke-width="0.5"/>
                            </svg>
                            <the-time/>
                            <span class="text-l">Доставка по Минску</span>
                        </p>
                    </div>
                    <div class="col-xl-6">
                        <div class="footer__outer">
                            <ul class="footer__nav">
                                <li>
                                    <router-link to="/map">Карта доставки</router-link>
                                </li>
                                <li>
                                    <router-link to="/howto">Как заказать</router-link>
                                </li>
                                <li>
                                    <router-link to="/payment">Оплата</router-link>
                                </li>
                                <li>
                                    <router-link to="/discounts">Акции</router-link>
                                </li>
                                <li>
                                    <router-link to="/contacts">Контакты</router-link>
                                </li>
                            </ul>
                            <the-links/>
                        </div>
                    </div>
                </div>
                <div class="footer__menu">
                    <router-link
                        :to="{name: 'index', hash: '#' + item.slug}"
                        class="footer__menu__item"
                        v-for="item in menuCategories"
                        v-bind:key="item.id">
                        <h3>{{item.name}}</h3>
                    </router-link>
                </div>
            </div>
        </div>
        <div class="footer__copyright">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 order-lg-0 order-1">
                        <p>Общество с ограниченной ответственностью «Гудкарс».</p>
                        <p>Юридический адрес: 220125 г. Минск, ул. Ложинская 5, пом. 206.</p>
                        <br>
                        <p>2020 год. Все права защищены.</p>
                    </div>
                    <div class="col-xl-4 order-lg-1 order-2">
                        <p>УНП 191117933.</p>
                        <p>Интернет-магазин pizzamarket.by зарегистрирован в Торговом реестре Республики Беларусь 27.09.2016г. номер 353310.</p>
                        <p>Зарегистрировано решением Минского горисполкома от 04.06.2009 г.</p>
                    </div>
                    <div class="col-xl-5 order-lg-2 order-0">
                        <p>Принимаем к оплате</p>
                        <div class="footer__pay">
                            <img v-for="item in pay"
                                 v-bind:key="item.id"
                                 :src=item.url
                                 v-bind:alt=item.name>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</template>

<script>
export default {
    name: "Footer",
    data() {
        return {
            logo: '/img/common/logo.png',
            menuCategories: [],
            pay: [
                {
                    id: 1,
                    url: '/img/common/pay/1.png',
                    name: 'Webpay',
                },
                {
                    id: 2,
                    url: '/img/common/pay/2.png',
                    name: 'Visa',
                },
                {
                    id: 3,
                    url: '/img/common/pay/3.png',
                    name: 'Verified by Visa',
                },
                {
                    id: 4,
                    url: '/img/common/pay/4.png',
                    name: 'Mastercard',
                },
                {
                    id: 5,
                    url: '/img/common/pay/5.png',
                    name: 'Mastercard SecureCode',
                },
                {
                    id: 6,
                    url: '/img/common/pay/6.png',
                    name: 'Белкарт',
                },
                {
                    id: 7,
                    url: '/img/common/pay/7.png',
                    name: 'Белкарт Интернет-пароль',
                },
                {
                    id: 8,
                    url: '/img/common/pay/8.png',
                    name: 'ЕРИП',
                },
            ],
        }
    },
    mounted() {
        axios
            .post('/api/menuCategories')
            .then(response => (this.menuCategories = response.data));
    },
}
</script>

<style lang="sass">
@import "resources/sass/main"

footer
    background: $white
    padding: 18px 0
    text-align: center
    .custom-logo
        margin-bottom: 18px
        display: inline-block

.footer
    &__phone,
    &__address
        font-weight: 700
        margin-bottom: 18px
        svg
            margin-right: 5px
        .text-l
            display: block
            font-size: 12px
            font-weight: 400
            color: $text-light
    &__outer
        display: flex
        flex-direction: column-reverse
    &__nav
        display: flex
        justify-content: center
        flex-wrap: wrap
        margin-bottom: 10px
        li
            margin: 0 5px 10px
        a
            color: $text-light
            font-weight: 400
    &__menu
        display: flex
        justify-content: center
        flex-wrap: wrap
        margin-bottom: 10px
        h3
            font-size: 14px
            font-weight: 600
            margin: 0 5px 16px
    &__copyright
        font-size: 12px
        font-weight: 400
        line-height: 15px
        color: $text-light
        p
            margin-bottom: 0
    &__pay
        display: flex
        justify-content: center
        align-items: center
        flex-wrap: wrap
        padding: 15px 0 20px
        img
            margin: 0 5px 10px

@media (min-width: 1200px)
    footer
        text-align: left
        padding: 25px 0
    .footer
        &__outer
            flex-direction: row
        &__phone,
        &__address
            svg
                margin: 0
        &__menu
            justify-content: space-between
        &__pay
            justify-content: flex-start
            img
                margin: 0 5px 10px 0

@media (min-width: 1400px)
    .footer
        &__info
            box-shadow: 0px 15px 30px rgba(34, 39, 41, 0.05)
        &__phone,
        &__address
            font-size: 16px
            svg
                margin-right: 5px
            .text-l
                font-size: 14px
        &__outer
            justify-content: space-between
        &__nav
            margin-top: 5px
            li
                margin: 0 21px 0 0
        &__links
            a
                margin: 0 0 0 10px
        &__menu
            margin: 20px 0 10px
        &__copyright
            padding: 20px 0
        &__pay
            padding: 10px 0 20px
            justify-content: space-between

</style>
