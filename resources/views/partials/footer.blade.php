<footer id="site-footer">
    <div class="container footer-inner">
        <div class="footer-grid">
            <div class="footer-brand">
                <img src="{{ asset('identity/Logo/SVG/Blue.svg') }}" alt="Maalem Logo" class="footer-logo">
                <span class="footer-kicker" data-i18n="footer_kicker">Maalem Education</span>
                <h2 data-i18n="footer_title">Building Better Learning Systems</h2>
                <p data-i18n="footer_desc">Maalem is the leading platform for professional education in the region.</p>
            </div>
            <nav class="footer-links" aria-label="Footer navigation">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="{{ url('/') }}#home" data-i18n="nav_home">Home</a></li>
                    <li><a href="{{ url('/about') }}" data-i18n="nav_about">About Us</a></li>
                    <li><a href="{{ url('/') }}#services">Services</a></li>
                    <li><a href="{{ url('/') }}#courses" data-i18n="nav_courses">Courses</a></li>
                    <li><a href="{{ url('/') }}#pricing" data-i18n="nav_pricing">Pricing</a></li>
                </ul>
            </nav>
            <div class="footer-contact">
                <h4 data-i18n="nav_contact">Contact</h4>
                <a href="mailto:contact@maalem.com">contact@maalem.com</a>
                <span>Egypt</span>
            </div>
        </div>
        <div class="footer-bottom">
            <p data-i18n="footer_copy">© 2026 Maalem Education. All rights reserved.</p>
        </div>
    </div>
</footer>
