<header>
    <div class="container">
        <nav>
            <a href="{{ url('/') }}">
                <img src="{{ asset('identity/Logo/SVG/Blue.svg') }}" alt="Maalem Logo" class="logo-img">
            </a>
            <ul class="nav-links">
                <li><a href="{{ url('/') }}#home" data-i18n="nav_home">Home</a></li>
                <li><a href="{{ url('/about') }}" data-i18n="nav_about">About Us</a></li>
                <li><a href="{{ url('/') }}#services">Services</a></li>
                <li><a href="{{ url('/') }}#courses" data-i18n="nav_courses">Courses</a></li>
                <li><a href="{{ url('/') }}#pricing" data-i18n="nav_pricing">Pricing</a></li>
                <li><a href="{{ url('/') }}#contact" data-i18n="nav_contact">Contact</a></li>
            </ul>
            <div class="nav-actions" style="display: none;">
                <button class="lang-toggle" id="langToggle" title="Toggle Language"><i class="fas fa-globe"></i></button>
            </div>
        </nav>
    </div>
</header>
