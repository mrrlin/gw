<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('/bootstrap/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/about.css') }}">

    <title>О нас</title>
  </head>
  <body>
    @component('components.header-component')
    @endcomponent

    <section class="hero-section">
        <div class="container">
            <h1>Мы создаем уникальные дизайны мебели</h1>
            <p class="mb-4">Исследуйте свой идеальный дом с дизайнами мебели от FurnAR</p>
            <a href="/category-products" class="btn btn--purple">Посмотреть каталог</a>
        </div>
    </section>

    <section class="about-section">
        <div class="container text-center">
            <h2>О нас</h2>
            <p>Дизайн-студия мебели специализируется на создании эксклюзивных дизайнов мебели, которая сочетает в себе
                функциональность и эстетическую привлекательность. Мы открываем мир исследования новых возможностей в оформлении интерьера каждого дома.</p>
            <p>Наша команда опытных дизайнеров и мастеров мебели использует инновационные
                технологии, чтобы создавать уникальные изделия, которые смогут покорить сердца многих.</p>

            <h5 class="pb-3">Здесь вы можете ознакомиться с инструкцией о подготовке к работе с дополненной реальностью:</h5>
            <a href="/download" class="btn btn--purple text-white">Инструкция</a>
        </div>
    </section>

    <section class="partnership-section text-white pt-5 mb-5">
        <div class="container">
            <h2 class="text-center">Партнерство с производителями мебели</h2>
            <div class="row partnership-row pt-5">
                <div class="col-lg-4 col-md-6">
                    <div class="partner-card">
                        <img class="partner-img" src="img/partners/best.jpg" alt="Partner Logo" height="180px">
                        <h3 class="text-center pt-3">Мебельный Дом</h3>
                        <p class="text-center">Крупный производитель мебели, известный своим современным дизайном и высоким качеством. Поддерживает использование AR-технологий для визуализации мебели в реальном времени.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="partner-card">
                        <img class="partner-img" src="img/partners/equanimity.jpg" alt="Partner Logo" height="180px">
                        <h3 class="text-center pt-3">Элегантный Стиль</h3>
                        <p class="text-center">Известный бренд, специализирующийся на элегантной и роскошной мебели. Их коллекции поддерживают использование AR-технологий для визуализации мебели в интерьерах.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="partner-card">
                        <img class="partner-img" src="img/partners/hand.jpg" alt="Partner Logo" height="180px">
                        <h3 class="text-center pt-3">Инновационный Дизайн</h3>
                        <p class="text-center">Производитель с фокусом на инновационных решениях в мебельном дизайне. Их продукция поддерживает использование AR-технологий, позволяя клиентам визуализировать мебель в своих интерьерах.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>



    @component('components.footer-component')
    @endcomponent

    <script src="{{ asset('/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  </body>
</html>
