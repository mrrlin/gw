<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('/bootstrap/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">

    <title>Главная</title>
  </head>
  <body>
    @component('components.header-component')
    @endcomponent

    <section class="carousel-block">
        <div id="carouselBlock" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/carousel/background7.jpg" class="d-block w-100" alt="...">
                    <h1 class="slide-content">Мебель в дополненной реальности</h1>
                </div>
                <div class="carousel-item">
                    <img src="img/carousel/background3.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="img/carousel/background4.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="img/carousel/background5.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselBlock" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselBlock" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <section class="py-5 text-center container pt-5">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light text-white">FurnAR</h1>
                <p class="lead text-muted">Наша дизай-студия мебеди предоставит вам возможность увидеть различные предметы мебели прямо в вашей комнате</p>
                <p>
                <a href="#" class="btn my-2 btn--purple">Посмотреть каталог</a>
                <a href="#" class="btn btn-secondary my-2">Связаться с нами</a>
                </p>
            </div>
        </div>
    </section>

    <section class="products-list container">
        <h3 class="new-designs-title text-white text-center">Наши новые дизайны</h3>

        <div class="container px-4 py-5" id="custom-cards">
            <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
            <div class="col">
                <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg">
                    <img src="img/img-models/table-circle.jpg" alt="">
                </div>
            </div>

            <div class="col">
                <div class="card card-cover new-designs-card h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg">
                    <img class="rounded-5 h-100" src="img/img-models/tea-table.jpg" alt="">
                </div>
            </div>

            <div class="col">
                <div class="card card-cover first-card new-designs-card h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"">
                    <img src="img/img-models/modern-sofa.jpg" alt="">
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
