<template>
    <table class="order__order">
        <tr v-for="(product, key) in cart" v-bind:key="key" v-bind:item="product" v-bind:cartItemId="key">
            <td>{{ product.name }}</td>
            <td>×{{ product.quantity }}</td>
            <td>{{formatPrice(product.price * product.quantity)}} руб.</td>
        </tr>
        <tr v-if="$store.state.deliveryFreeSum > $store.state.cartSum && $store.state.deliveryMethod === 1">
            <td colspan="2">
                Доставка:
            </td>
            <td>{{$store.state.deliveryPrice}} руб.</td>
        </tr>
        <tr>
            <th colspan="2">Итого:</th>
            <th v-if="$store.state.deliveryFreeSum > $store.state.cartSum && $store.state.deliveryMethod === 1">{{ formatPrice($store.state.cartSum + $store.state.deliveryPrice) }} руб.</th>
            <th v-else>{{ formatPrice($store.state.cartSum) }} руб.</th>
        </tr>
    </table>
</template>

<script>
export default {
    name: "TableOrder",
    data() {
        return {
            cartCount: this.$store.state.cartCount,
            cart: this.$store.state.cart,
        }
    }
}
</script>

<style scoped>

</style>
