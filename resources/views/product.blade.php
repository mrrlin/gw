<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('/bootstrap/css/bootstrap.min.css') }}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/ar-styles.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/hittest.css') }}">

    <!-- Polifill -->
    <script async src="https://unpkg.com/es-module-shims@1.6.3/dist/es-module-shims.js"></script>

    <script type="importmap">
    {
        "imports": {
            "three": "https://unpkg.com/three@0.132.0/build/three.module.js",
            "three/addons/": "https://unpkg.com/three@0.132.0/examples/jsm/",
            "mindar-image-three": "https://cdn.jsdelivr.net/npm/mind-ar@1.2.1/dist/mindar-image-three.prod.js"
        }
    }
    </script>

    <script src="{{ asset('/js/index.js') }}" type="module"></script>
    <script src="{{ asset('/js/hittest_ar.js') }}" type="module"></script>

    <title>{{ $product->name }}</title>
  </head>
  <body>
    <!-- <input type="hidden" id="ar-model" value="{!! $product->path !!}"> -->

    <input type="hidden" id="ar-model" value="{{ asset('storage/' . $product->ar_model) }}">

    @component('components.header-component')
    @endcomponent

    <section class="product-container pt-5" id="product-container">
        <div class="container pt-5">
            <div class="d-flex product">
                <div class="col-12 col-lg-6">
                    <img class="product-picture" src="{{ asset('storage/' . $product->image) }}" alt="Product">
                </div>
                <div class="col-12 col-lg-6 description-column">
                    <h4 class="product-title">{{ $product->name }}</h4>
                    <div class="product-color">
                        <span>Цвет:</span> {{ $product->color }}
                    </div>
                    <div class="product-description">
                        <p>{{ $product->description }}</p>
                    </div>
                    <div class="actions">
                        <div id="control">
                            <button type="button" class="btn btn--purple" id="startButton">Посмотреть в AR</button>

                        </div>

                        @if(Auth::check())
                            <button type="button" class="btn btn--purple add-to-favorites" data-product-id="{{ $product->id }}" data-user-id="{{ Auth::user()->id }}">Добавить в избранное</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ar-block" id="ar-block">
        <div id="scanning" class="hidden">
            <div class="inner">
                <img src="../img/chair-picture.jpg" alt="Chair">
                <div class="scanline"></div>
            </div>
        </div>
        <div id="control">
            <button class="btn btn--purple" id="stopButton">Выйти</button>
            <div id="ar-model-changes">
                <div class="buttons-container">
                    <button class="btn btn-style" id="turnVertical">⇅</button>
                    <button class="btn btn-style" id="turnHorizontal">⇆</button>
                </div>
                <div class="range-size">
                    <label for="sizeRange" class="form-label">Размер:</label>
                    <input type="range" class="form-range"  id="sizeRange" min="0.1" max="5.0" step="0.1" value="0.1">
                </div>
            </div>
        </div>
        <div id="container">
        </div>
    </section>

    @component('components.footer-component')
    @endcomponent

    <!-- Bootstrap JS -->
    <script src="{{ asset('/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  </body>
</html>
