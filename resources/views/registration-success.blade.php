<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="css/style.css">

    <title>Главная</title>
  </head>
  <body>
    @component('components.header-component')
    @endcomponent

    <section class="form-container pt-5">
        <div class="container pt-5">
            <h1 class="text-white text-center pt-5">Вы успешно зарегистрировались!</h1>
        </div>
    </section>

    @component('components.footer-component')
    @endcomponent

    <script src="{{ asset('/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  </body>
</html>
