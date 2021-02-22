<template>
    <div class="footer__pay">
        <img v-for="item in pay"
             v-bind:key="item.id"
             :src=item.url
             v-bind:alt=item.name>
    </div>
</template>

<script>
export default {
    name: "Footer-Pay",
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
}
</script>

<style scoped>

</style>
