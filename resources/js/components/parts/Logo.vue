<template>
    <a href="/" class="custom-logo">
        <img :src=logo>
    </a>
</template>

<script>
import axios from "axios";

export default {
    name: "Logo",
    data() {
        return {
            logo: ''
        }
    },
    mounted() {
        axios
            .post('/api/logo')
            .then(response => (this.logo = response.data));
    },
}
</script>
