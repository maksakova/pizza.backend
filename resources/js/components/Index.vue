<template>
    <div>
        <swiper class="swiper" :options="swiperOptions">
            <!--<swiper-slide class="swiper-item"
                          v-for="image in images"
                          v-bind:key="image.id"
                          :style="{ backgroundImage: 'url(' + image.url + ')' }">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 offset-xl-1">
                            <div class="text1">
                                asd <span>ad</span>
                            </div>
                            <div class="text3">
                                ad
                            </div>
                        </div>
                    </div>
                </div>
            </swiper-slide>-->
            <swiper-slide class="swiper-item">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 offset-xl-1">
                            <div class="text1">
                                asd <span>ad</span>
                            </div>
                            <div class="text3">
                                ad
                            </div>
                        </div>
                    </div>
                </div>
            </swiper-slide>
            <swiper-slide>2</swiper-slide>
            <swiper-slide>3</swiper-slide>
        </swiper>
        <Menu/>
    </div>
</template>

<script>
import Menu from '../components/parts/Menu'
import VueAwesomeSwiper from 'vue-awesome-swiper'
import 'swiper/css/swiper.css'
import { Swiper, SwiperSlide, directive } from 'vue-awesome-swiper'

export default {
    name: "Index",
    components: {
        Menu,
        Swiper,
        SwiperSlide
    },
    data() {
        return {
            swiperOptions: {
                pagination: {
                    el: '.swiper-pagination'
                },
            }
        }
    },
    directives: {
        swiper: directive
    }
}
</script>

<style lang="sass">
@import "resources/sass/main"

.swiper-item
    width: 100%
    height: 120px
    background-size: cover
    background-position: center
    padding: 30px 15px 15px
    .text1
        background: #000
        color: $white
        display: inline-block
        font-size: 15px
        font-weight: 700
        border-radius: 6px
        padding: 2px 8px
        margin-bottom: 4px
        span
            color: #FFC413
            font-weight: 800
    .text3
        font-weight: 700
        color: $white

.main__menu
    background: $white
    margin-bottom: 24px
.main__filter
    overflow-x: auto
    margin: 0 -15px 15px 0
    &::-webkit-scrollbar
        height: 0
    &__inner
        width: max-content
    &__button
        font-size: 12px
        border: 2px solid $light
        background: transparent
        box-sizing: border-box
        filter: drop-shadow(0px 5px 20px rgba(119, 119, 119, 0.1))
        border-radius: 26px
        padding: 6px 12px
        margin: 0 15px 0 0
        color: $text
        transition: .3s
        display: inline-block
        &.active
            background: $white
            border: 2px solid transparent
    .checkbox
        margin: 0
        width: auto
        &__text
            padding: 0
            &:before,
            &:after
                display: none
        input:checked + .checkbox__text
            .main__filter__button
                background: $white
                border: 2px solid $white
                box-shadow: 0 5px 8px rgba(34, 39, 41, 0.05)

.main__cart
    background: $white
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.03)
    border-radius: 10px
    padding-bottom: 10px
    position: sticky
    top: 158px
    margin: 130px 0 80px
    h3
        font-size: 18px
        font-weight: 700
        margin-bottom: 0
    &__header
        border-radius: 10px 10px 0 0
        background: $main
        box-shadow: inset 0 2px 2px #8FEAB1, inset 0px -2px 2px rgba(0, 99, 28, 0.3)
        display: flex
        justify-content: space-between
        padding: 12px 15px
        svg
            margin-right: 10px
    &__title
        display: flex
        align-items: center
    &__items
        max-height: calc(100vh - 127px - 60px - 49px - 72px - 49px)
        overflow-y: auto
        &::-webkit-scrollbar
            width: 4px
            background: $bg
        &::-webkit-scrollbar-thumb
            background: $main
    &__button
        border: none
        background: transparent
        padding: 0
        &:hover
            text-decoration: underline
    &__total
        padding: 22px 15px 20px
        display: flex
        justify-content: space-between
        align-items: center
        font-weight: 700
        span
            font-size: 20px
    .cart-item
        border-bottom: 1px solid #F2F2F2
        border-radius: 0
        margin-bottom: 0
    &__empty
        display: flex
        flex-direction: column
        justify-content: center
        align-items: center
        text-align: center
        padding: 45px 15px 15px
        color: #C4C4C4
        height: calc(100% - 49px - 72px - 49px)
        img
            margin-bottom: 15px


@media (min-width: 576px)
    .main__menu
        background: transparent

@media (min-width: 992px)
    .swiper-container
        height: 300px

    .swiper-item
        height: 300px
        .text1
            font-size: 50px
        .text3
            font-size: 35px

    .main
        &__filter
            &__button
                font-size: 14px

@media (min-width: 1200px)
    .swiper
        margin-bottom: 65px

    .swiper-container
        height: 420px
        z-index: -1

    .swiper-item
        height: 420px
        display: flex
        align-items: center
        padding-bottom: 24px
        .text1
            margin-bottom: 20px

    .main
        &__filter
            margin: 0 0 20px 0
            overflow: unset
            &__button
                padding: 8px 14px
                margin-right: 26px
                &:hover
                    transform: translateY(-5px)
        &__menu
            margin-bottom: 82px

</style>
