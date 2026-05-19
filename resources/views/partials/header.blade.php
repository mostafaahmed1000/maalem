<header>
    <div class="container">
        <nav>
            <a href="{{ url('/') }}">
                <img src="{{ secure_asset_v('identity/Logo/SVG/Blue.svg') }}" alt="Maalem Logo" class="logo-img">
            </a>
            <button class="hamburger" id="hamburgerBtn" aria-label="Toggle menu">
                <span></span><span></span><span></span>
            </button>
            <ul class="nav-links" id="navLinks">
                <li><a href="{{ url('/') }}#home" data-i18n="nav_home">Home</a></li>
                <li><a href="{{ url('/about') }}" data-i18n="nav_about">About Us</a></li>
                <li><a href="{{ url('/') }}#services">Services</a></li>
                <li><a href="{{ url('/') }}#courses" data-i18n="nav_courses">Courses</a></li>
                <li><a href="{{ route('careers.index') }}">Careers</a></li>
            </ul>
            <div class="nav-actions" style="display: none;">
                <button class="lang-toggle" id="langToggle" title="Toggle Language"><i
                        class="fas fa-globe"></i></button>
            </div>
        </nav>
    </div>
</header>