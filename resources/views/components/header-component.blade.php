<header class="py-3 text-white fixed-top" id="header">
    <div class="container-fluid d-grid gap-3 align-items-center" style="grid-template-columns: 1fr 2fr;">
      <!-- Мобильное меню -->
      <div class="dropdown d-lg-none">
        <a href="/" class="d-flex align-items-center col-lg-4 mb-2 mb-lg-0 link-light text-decoration-none dropdown-toggle" id="dropdownNavLink" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="{{ asset('storage/' . 'img/logo-fa.png') }}" alt="logo" height="75px">
            <h3 class="title">FurnAR</h3>
        </a>
        <ul class="dropdown-menu text-small shadow text-white" aria-labelledby="dropdownNavLink" style="">
          <li><a class="dropdown-item active" href="/about" aria-current="page">О нас</a></li>
          <li><a class="dropdown-item" href="/category-products">Каталог</a></li>
          <li><a class="dropdown-item" href="/contacts">Контакты</a></li>
          <li><a class="dropdown-item" href="/download">Инструкция</a></li>
          @if(Auth::check())
            <li><a class="dropdown-item" href="/favorites">Избранное</a></li>
          @endif
        </ul>
      </div>
      <div class="text-end d-lg-none">
            @if (Auth::check())
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="btn btn--purple">Выйти</button>
                </form>
                <span style="color:red">User - {{ Auth::user()->name }}</span>
            @else
                <a href="/login" class="me-2"><img src="{{ asset('storage/' . 'img/user.png') }}" alt="Войти" height="55px"></a>
            @endif
        </div>
      </div>

      <!-- Десктопное меню -->
      <div class="d-none d-lg-block desctop-menu">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 link-dark text-decoration-none">
            <img src="{{ asset('storage/' . 'img/logo-fa.png') }}" alt="logo" height="75px">
            <h3 class="title">FurnAR</h3>
        </a>
        <div>
            <ul class="nav">
            <li><a class="nav-link text-white" href="/about" aria-current="page">О нас</a></li>
            <li><a class="nav-link text-white" href="/category-products">Каталог</a></li>
            <li><a class="nav-link text-white" href="/contacts">Контакты</a></li>
            <li><a class="nav-link text-white" href="/download">Инструкция</a></li>
            @if(Auth::check())
                <li><a class="nav-link text-white" href="/favorites">Избранное</a></li>
            @endif
            </ul>
        </div>


      <div class="d-none d-lg-block">
            @if (Auth::check())
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="btn btn--purple">Выйти</button>
                </form>
                <span style="color:red">User - {{ Auth::user()->name }}</span>
            @else
                <a href="/login" class="btn btn-outline-light me-2">Войти</a>
                <a href="/register" class="btn btn-sign-up btn--purple me-2">Регистрация</a>
            @endif
      </div>
      </div>
    </div>
</header>
