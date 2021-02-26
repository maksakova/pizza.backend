<template>
    <section class="menu" :class="simple" v-scroll="handleScroll">
        <div class="container">
            <div class="menu__outer">
                <scrollactive class="menu__inner" :offset="170">
                    <router-link :to="{name: 'index', hash: '#' + item.slug}" class="menu__item scrollactive-item"
                                 v-for="item in menuCategories"
                                 v-bind:key="item.id"
                                 :scrollOptions='{
                container: "body",
                duration: 700,
                easing: "ease",
                offset: -170,
                cancelable: true,
                onStart: false,
                onDone: false,
                onCancel: false,
                x: false,
                y: true
               }'>
                        <img :src=item.img>
                        <h3>{{item.name}}</h3>
                    </router-link>
                </scrollactive>
            </div>
        </div>
    </section>
</template>

<script>
import axios from 'axios'

export default {
    name: "Menu",
    data() {
        return {
            menuCategories: []
        }
    },
    methods: {
        handleScroll: function (evt, el) {
            if (window.scrollY > 100) {
                el.classList.add('fixed')
            } else {
                el.classList.remove('fixed')
            }
        },
    },
    props: {
        simple: {
            type: String,
            required: true
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

.menu
    margin-bottom: 20px
    background: $white
    h3
        font-size: 12px
        margin-bottom: 0
    img
        max-width: 20px
        max-height: 20px
    &__outer
        overflow-x: auto
        background: $white
        margin: 0 -15px
        padding: 10px 15px 6px
        -ms-overflow-style: none
        &::-webkit-scrollbar
            height: 4px
        &::-webkit-scrollbar-thumb
            background: transparent
    &__inner
        display: flex
        width: max-content
    &__item
        display: flex
        align-items: center
        cursor: pointer
        position: relative
        img
            margin-right: 10px
            transition: .3s
        &:not(:last-child)
            margin-right: 23px
        &:last-child
            margin-right: 15px
        &:hover
            img
                transform: scale(1.1)
        &:after
            content: ''
            width: 0
            height: 5px
            background: $main
            border-radius: 19px
            position: absolute
            left: 0
            bottom: -13px
            transition: .3s
    &.fixed
        position: fixed
        width: 100%
        box-shadow: 0px 15px 50px rgba(34, 39, 41, 0.05)
        top: 41px
        z-index: 10
        margin: 0
    &.simple,
    &.fixed
        .menu__outer
            box-shadow: none
            border-radius: 0
        .menu__item
            &.active,
            &.is-active
                &:after
                    width: 100%

@media (min-width: 576px)
    .menu
        &.fixed
            top: 117px
            background: $white
        &.simple
            background: $white
            margin-bottom: 20px

@media (min-width: 992px)
    .menu
        h3
            font-size: 16px
        img
            max-width: 34px
            max-height: 34px
        &.fixed
            top: 106px

@media (min-width: 1200px)
    .menu
        margin: -90px 0 65px
        background: transparent
        position: relative
        z-index: 1
        &__outer
            margin: 0
            box-shadow: 0px 15px 50px rgba(34, 39, 41, 0.05)
            border-radius: 8px
            padding: 26px 50px 24px
        &__inner
            width: 100%
            justify-content: space-between
        &__item
            flex-direction: column
            justify-content: center
            margin: 0
            img
                margin: 0 0 10px
                max-width: 40px
                max-height: 40px
        &.simple
            margin: 0 0 60px
        &.fixed
            top: 69px
            margin: 0
        &.fixed,
        &.simple
            .menu__outer
                padding: 13px 0
            .menu__item
                flex-direction: row
                align-items: center
                img
                    max-width: 30px
                    max-height: 30px
                    margin: 0 10px 0 0

@media (max-width: 360px)
    .menu
        h3
            font-size: 13px
        img
            max-width: 22px
            max-height: 22px


</style>
