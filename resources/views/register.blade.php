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
            <h2 class="text-center text-white pt-5 pb-3">Регистрация</h2>
            <form enctype="multipart/form-data" method="POST" action="/register">
                @csrf
                <input type="hidden" name="avatar" value="/users/default.png">
                <!-- <input type="hidden" name="name" value="Test"> -->
                <div class="mb-3">
                    <label for="name" class="form-label text-white">Имя</label>
                    <input type="text" name="name" class="form-control" id="name" aria-describedby="name">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label text-white">Email</label>
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label text-white">Пароль</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                <!-- <label>Upload Your Image
                    <input type="file" name="avatar" />
                </label> -->
                <button type="submit" class="btn btn--purple">Зарегистрироваться</a>
            </form>
        </div>
    </section>

    @component('components.footer-component')
    @endcomponent

    <script src="{{ asset('/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  </body>
</html>
