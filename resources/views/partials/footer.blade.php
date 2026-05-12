<footer id="site-footer">
    <div class="container">
        <div class="footer-grid">
            <div>
                <img src="{{ asset('identity/Logo/SVG/White.svg') }}" alt="Maalem Logo" class="logo-img" style="margin-bottom: 1rem; filter: brightness(0) invert(1);">
                <p data-i18n="footer_desc">Maalem is the leading platform for professional education in the region.</p>
            </div>
            <div>
                <h4 style="margin-bottom: 1rem;">Quick Links</h4>
                <ul>
                    <li><a href="{{ url('/') }}#home" data-i18n="nav_home">Home</a></li>
                    <li><a href="{{ url('/about') }}" data-i18n="nav_about">About Us</a></li>
                    <li><a href="{{ url('/') }}#courses" data-i18n="nav_courses">Courses</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p data-i18n="footer_copy">© 2026 Maalem Education. All rights reserved.</p>
        </div>
    </div>
</footer>