<template>
    <span>{{ email }}</span>
</template>

<script>
export default {
    name: "Email",
    data() {
        return {
            email: ''
        }
    },
    mounted() {
        axios
            .post('/api/email')
            .then(response => (this.email = response.data));
    },
}
</script>
