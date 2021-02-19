<template>
    <a href="/" class="custom-logo">
        <img :src=logo>
    </a>
</template>

<script>
import axios from "axios";

export default {
    name: "Дogo",
    data() {
        return {
            logo: '1'
        }
    },
    mounted() {
        axios
            .post('/api/logo')
            .then(response => (this.logo = response.data));
    },
}
</script>

<style scoped>

</style>
