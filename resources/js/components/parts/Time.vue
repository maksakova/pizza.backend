<template>
    <span>{{ time }}</span>
</template>

<script>
export default {
    name: "Time",
    data() {
        return {
            time: ''
        }
    },
    mounted() {
        axios
            .post('/api/time')
            .then(response => (this.time = response.data));
    },
}
</script>

<style scoped>

</style>
