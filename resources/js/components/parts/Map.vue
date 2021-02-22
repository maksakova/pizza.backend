<template>
    <yandex-map class="contacts__map"
                :coords="coords"
                :zoom="16" >
        <ymap-marker
            :coords="coords"
            marker-id="1"
            :icon="markerIcon"
        />
    </yandex-map>
</template>

<script>
export default {
    name: "Map",
    data() {
        return {
            coords: [
                53.946869, 27.688071,
            ],
            markerIcon: {
                layout: 'default#imageWithContent',
                imageHref: '/img/contacts/marker.svg',
                imageSize: [30, 40],
                imageOffset: [-15, -15],
                contentLayout: '<div style="background: red; width: 50px; color: #FFFFFF; font-weight: bold;">$[properties.iconContent]</div>'
            }
        }
    },
}
</script>

<style scoped>

</style>
