<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="css/style.css">

    <title>Избранное</title>
  </head>
  <body>
    @component('components.header-component')
    @endcomponent

    <section class="catalog-container pt-5">
        <h2 class="pt-5 pb-4 text-center">Избранное</h2>
        <div class="container px-4 py-2" id="custom-cards">
            <div class="row row-cols-1 row-cols-lg-3 row-cols-xl-4 align-items-stretch g-4 py-1">
            @if(!empty($products))
                @foreach($products as $product)
                    <div class="col">
                        <div class="card card-product">
                            <img class="card-product-image" src="{{ asset('storage/' . $product->image) }}" alt="Диван">
                            <div class="d-flex flex-column p-3 pb-4 text-white">
                                <h5 class="card-title pb-3 text-center">{{ $product->name }}</h5>
                                <a href="/product/{{ $product->id }}" class="btn btn--purple btn--center">Посмотреть</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <h2 class="">Hi</h2>
            @endif
            </div>
        </div>
    </section>

    @component('components.footer-component')
    @endcomponent

    <script src="{{ asset('/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  </body>
</html>
