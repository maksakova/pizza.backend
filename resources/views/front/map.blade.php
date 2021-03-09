@extends('layouts.front')

@section('content')
    <main class="map">
        <the-menu simple="simple"></the-menu>
        <Menu simple="simple"/>
        <div class="container">
            <h1>{{ $page->name }}</h1>
            <div class="map__info">
                {!! $page->content !!}
                <div class="map__alert alert">
                    {!! $page->add !!}
                </div>
            </div>
            <div id="map" class="map__map"></div>
        </div>
    </main>
@endsection

<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;coordorder=latlong&amp;apikey=035fdfb1-becf-436d-a7a7-6f38a995941e" type="text/javascript"></script>
<script type="text/javascript" src="https://yandex.st/jquery/2.2.3/jquery.js"></script>

<script>
    ymaps.ready(init);

    function init() {
        var myMap = new ymaps.Map('map', {
                center: [53.90274647009774, 27.55560136148148],
                zoom: 11,
                controls: ['geolocationControl', 'searchControl']
            }),
            deliveryPoint = new ymaps.GeoObject({
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

        function onZonesLoad(json, myMap) {

            // Добавляем зоны на карту
            var deliveryZones = ymaps.geoQuery(json);

            deliveryZones.addToMap(myMap);

            /*deliveryZones.addToMap(myMap);*/

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
            searchControl.events.add('resultshow', function (e) {
                highlightResult(searchControl.getResultsArray()[e.get('index')]);
            });

            // Проверим попадание метки геолокации в одну из зон доставки.
            myMap.controls.get('geolocationControl').events.add('locationchange', function (e) {
                highlightResult(e.get('geoObjects').get(0));
            });

            // При перемещении метки сбрасываем подпись, содержимое балуна и перекрашиваем метку.
            deliveryPoint.events.add('dragstart', function () {
                deliveryPoint.properties.set({iconCaption: '', balloonContent: ''});
                deliveryPoint.options.set('iconColor', 'black');
            });

            // По окончании перемещения метки вызываем функцию выделения зоны доставки.
            deliveryPoint.events.add('dragend', function () {
                highlightResult(deliveryPoint);
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
                    deliveryPoint.geometry.setCoordinates(coords);
                    deliveryPoint.options.set('iconColor', polygon.properties.get('fill'));
                    // Задаем подпись для метки.
                    if (typeof(obj.getThoroughfare) === 'function') {
                        setData(obj);
                    } else {
                        // Если вы не хотите, чтобы при каждом перемещении метки отправлялся запрос к геокодеру,
                        // закомментируйте код ниже.
                        ymaps.geocode(coords, {results: 1}).then(function (res) {
                            var obj = res.geoObjects.get(0);
                            setData(obj);
                        });
                    }
                } else {
                    // Если переданные координаты не попадают в полигон, то задаём стандартную прозрачность полигонов.
                    deliveryZones.setOptions('fillOpacity', 0.4);
                    // Перемещаем метку по переданным координатам.
                    deliveryPoint.geometry.setCoordinates(coords);
                    // Задаём контент балуна и метки.
                    deliveryPoint.properties.set({
                        iconCaption: 'Доставка транспортной компанией',
                        balloonContent: 'Cвяжитесь с оператором',
                        balloonContentHeader: ''
                    });
                    // Перекрашиваем метку в чёрный цвет.
                    deliveryPoint.options.set('iconColor', 'black');
                }

                function setData(obj){
                    var address = [obj.getThoroughfare(), obj.getPremiseNumber(), obj.getPremise()].join(' ');
                    if (address.trim() === '') {
                        address = obj.getAddressLine();
                    }
                    var price = polygon.properties.get('description');
                    price = price.match(/<strong>(.+)<\/strong>/)[1];
                    deliveryPoint.properties.set({
                        iconCaption: address,
                        balloonContent: address,
                        balloonContentHeader: price
                    });
                }
            }
        }

        axios
            .get('/js/data.geojson')
            .then(response => {
                var json = response.data;
                onZonesLoad(json, myMap)
            });
    }
</script>
