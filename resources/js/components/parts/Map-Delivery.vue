<template>
    <div id="map" class="map__map"></div>
</template>

<script>
import { loadYmap } from 'vue-yandex-maps'
import {mapGetters} from "vuex";

export default {
    name: "Map-Delivery",

    data() {
        return {
            coords: [53.90274647009774, 27.55560136148148],
            geojson: null,
        }
    },

    async mounted() {
        const settings = {
            apiKey: '035fdfb1-becf-436d-a7a7-6f38a995941e',
            lang: 'ru_RU',
            coordorder: 'latlong',
            version: '2.1',
        }
        await loadYmap({ ...settings, debug: true });

        var myMap = new window.ymaps.Map('map', {
                center: this.coords,
                zoom: 11,
                controls: ['geolocationControl', 'searchControl']
            }),
            deliveryPoint = new window.ymaps.GeoObject({
                geometry: {type: 'Point'},
                properties: {iconCaption: 'Адрес'}
            }, {
                preset: 'islands#blackDotIconWithCaption',
                draggable: true,
                iconCaptionMaxWidth: '215'
            }),
            searchControl = myMap.controls.get('searchControl');
        searchControl.options.set({noPlacemark: true, placeholderContent: 'Введите адрес доставки'});
        myMap.geoObjects.add(deliveryPoint);

        var json = this.deliveryZones

        onZonesLoad(json, myMap)

        function onZonesLoad(json, myMap) {
            // Добавляем зоны на карту.
            var deliveryZones = window.ymaps.geoQuery(json);
            console.log(deliveryZones);
            deliveryZones.addToMap(myMap);

            // Задаём цвет и контент балунов полигонов.
            deliveryZones.each(function (obj) {
                obj.options.set({
                    fillColor: obj.properties.get('fill'),
                    fillOpacity: obj.properties.get('fill-opacity'),
                    strokeColor: obj.properties.get('stroke'),
                    strokeWidth: obj.properties.get('stroke-width'),
                    strokeOpacity: obj.properties.get('stroke-opacity')
                });
                obj.properties.set('balloonContent', obj.properties.get('description'));
            });

            // Проверим попадание результата поиска в одну из зон доставки.
            window.searchControl.events.add('resultshow', function (e) {
                highlightResult(window.searchControl.getResultsArray()[e.get('index')]);
            });

            // Проверим попадание метки геолокации в одну из зон доставки.
            myMap.controls.get('geolocationControl').events.add('locationchange', function (e) {
                highlightResult(e.get('geoObjects').get(0));
            });

            // При перемещении метки сбрасываем подпись, содержимое балуна и перекрашиваем метку.
            window.deliveryPoint.events.add('dragstart', function () {
                window.deliveryPoint.properties.set({iconCaption: '', balloonContent: ''});
                window.deliveryPoint.options.set('iconColor', 'black');
            });

            // По окончании перемещения метки вызываем функцию выделения зоны доставки.
            window.deliveryPoint.events.add('dragend', function () {
                highlightResult(window.deliveryPoint);
            });

            function highlightResult(obj) {
                // Сохраняем координаты переданного объекта.
                var coords = obj.geometry.getCoordinates(),
                    // Находим полигон, в который входят переданные координаты.
                    polygon = deliveryZones.searchContaining(coords).get(0);

                if (polygon) {
                    // Уменьшаем прозрачность всех полигонов, кроме того, в который входят переданные координаты.
                    deliveryZones.setOptions('fillOpacity', 0.4);
                    polygon.options.set('fillOpacity', 0.8);
                    // Перемещаем метку с подписью в переданные координаты и перекрашиваем её в цвет полигона.
                    window.deliveryPoint.geometry.setCoordinates(coords);
                    window.deliveryPoint.options.set('iconColor', polygon.properties.get('fill'));
                    // Задаем подпись для метки.
                    if (typeof(obj.getThoroughfare) === 'function') {
                        setData(obj);
                    } else {
                        // Если вы не хотите, чтобы при каждом перемещении метки отправлялся запрос к геокодеру,
                        // закомментируйте код ниже.
                        window.ymaps.geocode(coords, {results: 1}).then(function (res) {
                            var obj = res.geoObjects.get(0);
                            setData(obj);
                        });
                    }
                } else {
                    // Если переданные координаты не попадают в полигон, то задаём стандартную прозрачность полигонов.
                    deliveryZones.setOptions('fillOpacity', 0.4);
                    // Перемещаем метку по переданным координатам.
                    window.deliveryPoint.geometry.setCoordinates(coords);
                    // Задаём контент балуна и метки.
                    window.deliveryPoint.properties.set({
                        iconCaption: 'Доставка транспортной компанией',
                        balloonContent: 'Cвяжитесь с оператором',
                        balloonContentHeader: ''
                    });
                    // Перекрашиваем метку в чёрный цвет.
                    window.deliveryPoint.options.set('iconColor', 'black');
                }

                function setData(obj){
                    var address = [obj.getThoroughfare(), obj.getPremiseNumber(), obj.getPremise()].join(' ');
                    if (address.trim() === '') {
                        address = obj.getAddressLine();
                    }
                    var price = polygon.properties.get('description');
                    price = price.match(/<strong>(.+)<\/strong>/)[1];
                    window.deliveryPoint.properties.set({
                        iconCaption: address,
                        balloonContent: address,
                        balloonContentHeader: price
                    });
                }
            }



        }

        /*const axios = require('axios').default;

        axios
            .get('data.geojson')
            .then(response => (this.geojson = response));*/
    },
}
</script>

<style scoped>

</style>
