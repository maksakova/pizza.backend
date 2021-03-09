<div id="map" class="contacts__map"></div>

<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;coordorder=latlong&amp;apikey=035fdfb1-becf-436d-a7a7-6f38a995941e" type="text/javascript"></script>
<script type="text/javascript" src="https://yandex.st/jquery/2.2.3/jquery.min.js"></script>
<script>
    ymaps.ready(init);

    function init() {
        var myMap = new ymaps.Map('map', {
                center: [53.946869, 27.688071],
                zoom: 15,
                controls: ['geolocationControl', 'searchControl']
            }),

            myPlacemark = new ymaps.Placemark([53.946869, 27.688071], {
                hintContent: 'Собственный значок метки',
                balloonContent: 'Это красивая метка'
            }, {
                // Опции.
                // Необходимо указать данный тип макета.
                iconLayout: 'default#image',
                // Своё изображение иконки метки.
                iconImageHref: '/img/contacts/marker.svg',
                // Размеры метки.
                iconImageSize: [30, 40],
                // Смещение левого верхнего угла иконки относительно
                // её "ножки" (точки привязки).
                iconImageOffset: [-15, -15]
            })

        myMap.geoObjects
            .add(myPlacemark)
    }
</script>
