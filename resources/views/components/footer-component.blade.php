<footer class="footer mt-auto py-3" id="footer">
    <div class="container footer-container">
        <div class="d-flex footer-block text-white flex-wrap align-items-center">
            <a href="/" class="d-flex align-items-center mb-lg-0 text-dark text-decoration-none">
                <img src="{{ asset('storage/' . 'img/logo-fa.png') }}" alt="logo" height="55px">
            </a>
            <p class="footer-year">{{ date("Y") }}</p>
            <div class="social-icons">
                <img src="{{ asset('storage/' . 'img/icons/instagram.png') }}" alt="Инстаграм" height="23px">
                <img src="{{ asset('storage/' . 'img/icons/vk.png') }}" alt="Вконтакте" height="30px">
            </div>
        </div>
    </div>
</footer>
