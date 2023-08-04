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
    </style>

    <title>Скачать маркер</title>
  </head>
  <body>
    @component('components.header-component')
    @endcomponent

    <section class="instruction-container pt-5">
        <div class="container pt-5 mt-5">
            <h2 class="text-white text-center pb-5">Инструкция</h2>
            <div class="row">
                <div class="col-md-4">
                    <img src="img/download-page/print5.png" class="mx-auto d-block" height="180px" alt="download image">
                    <p class="mt-2 text-white text-center">Скачайте и распечатайте специальное изображение-маркер</p>
                </div>
                <div class="col-md-4">
                    <img src="img/download-page/model.svg" class="mx-auto d-block" height="180px" alt="Responsive image">
                    <p class="mt-2 text-white text-center">Выберите предмет мебели из каталога и запустите AR</p>
                </div>
                <div class="col-md-4">
                    <img src="img/download-page/camera1.png" class="mx-auto d-block" height="180px" alt="Responsive image">
                    <p class="mt-2 text-white text-center">Наведите камеру на лист с распечатанным маркером</p>
                </div>
            </div>
            <div class="row mt-4 pb-5">
                <div class="col-12 text-center">
                    <p class="text-white pb-3">Вы можете скачать изображение-маркер, нажав на кнопку ниже:</p>
                    <a href="/img/chair-picture.jpg" download class="btn btn--purple text-white mb-5">Скачать изображение-маркер</a>
                </div>
            </div>
        </div>

    </section>

    @component('components.footer-component')
    @endcomponent

    <script src="{{ asset('/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
