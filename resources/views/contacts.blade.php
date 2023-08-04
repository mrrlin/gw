<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="css/style.css">

    <style>
        #map {
            height: 380px;
            width: 60%;
            position: absolute;
            left: 50%;
            transform: translate(-50%);
        }

        @media (max-width: 800px) {
            #map {
                width: 85%;
            }
        }
    </style>

    <title>Контакты</title>
  </head>
  <body>
    @component('components.header-component')
    @endcomponent

    <section class="contacts-container pt-5">
        <div class="container text-white pt-5">
            <h1 class="text-center">Контакты</h1>
            <p>Свяжитесь с нами для получения дополнительной информации:</p>
            <ul>
                <li>Телефон: +1 123 456 789</li>
                <li>Email: info@gmail.com</li>
                <li>Адрес: ул. Горького, 50, Владимир</li>
            </ul>
        </div>
        <div class="pb-5">
            <div id="map"></div>
        </div>
    </section>

    @component('components.footer-component')
    @endcomponent

    <script src="{{ asset('/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://www.openlayers.org/api/OpenLayers.js"></script>
    <script src="js/map.js"></script>
</body>
</html>
