<template>
    <span>{{ formatPrice($store.state.cartSum) }} руб.</span>
</template>

<script>

export default {
    name: "Cart-Sum",
    created() {
        this.watchCart()
    },
    computed: {},
    watch: {
        $route: 'watchCart'
    },
    methods: {
        watchCart() {
            if (this.$route.params.slug == 'success') {
                this.$store.commit('cleanCart');
            }
        }
    },
}
</script>

<style scoped>

</style>
