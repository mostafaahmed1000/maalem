<style>
    /* ===== FOOTER ===== */
    #site-footer {
        background: #fff;
        border-top: 1px solid #e5e7eb;
        padding: 3rem 0 0;
    }

    .footer-inner {
        display: flex;
        flex-direction: column;
        gap: 0;
    }

    .footer-grid {
        display: grid;
        grid-template-columns: minmax(190px, 0.75fr) minmax(0, 1.75fr);
        gap: clamp(2.25rem, 5vw, 5rem);
        padding-bottom: 2rem;
        align-items: start;
    }

    .footer-logo-panel {
        display: flex;
        align-items: flex-start;
        justify-content: flex-start;
        min-height: 100%;
    }

    .footer-logo {
        height: clamp(190px, 22vw, 300px);
        max-width: 100%;
        width: auto;
        object-fit: contain;
    }

    .footer-content {
        display: flex;
        flex-direction: column;
        gap: clamp(2.25rem, 5vw, 4rem);
        min-width: 0;
    }

    .footer-nav-row {
        display: grid;
        grid-template-columns: repeat(2, minmax(180px, 1fr));
        gap: clamp(2rem, 5vw, 5rem);
        align-items: start;
    }

    .footer-brand {
        width: min(100%, 420px);
        margin-left: auto;
        display: flex;
        flex-direction: column;
        /* align-items: flex-end; */
        gap: 0.75rem;
        /* text-align: right; */
    }

    .footer-kicker {
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: #2563eb;
    }

    .footer-brand h2 {
        font-size: 1.6rem;
        font-weight: 800;
        color: #0f172a;
        line-height: 1.2;
        letter-spacing: -0.02em;
    }

    .footer-brand p {
        font-size: 0.875rem;
        color: #64748b;
        line-height: 1.6;
        max-width: 320px;
    }

    .footer-links h4,
    .footer-contact h4 {
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        color: #94a3b8;
        margin-bottom: 1rem;
    }

    .footer-links,
    .footer-contact {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    .footer-links ul {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    .footer-links a {
        font-size: 0.9rem;
        color: #374151;
        text-decoration: none;
        transition: color 0.2s;
    }

    .footer-links a:hover {
        color: #2563eb;
    }

    .footer-contact {
        gap: 0;
    }

    .footer-contact a {
        font-size: 0.9rem;
        color: #2563eb;
        text-decoration: none;
        display: block;
        margin-bottom: 0.4rem;
    }

    .footer-contact a:hover {
        text-decoration: underline;
    }

    .footer-contact span {
        font-size: 0.875rem;
        color: #64748b;
    }

    .footer-bottom {
        border-top: 1px solid #f1f5f9;
        padding: 1.25rem 0;
        text-align: center;
    }

    .footer-bottom p {
        font-size: 0.8rem;
        color: #94a3b8;
    }

    /* ===== RESPONSIVE ===== */

    @media (max-width: 900px) {
        .footer-grid {
            grid-template-columns: 1fr;
            gap: 2rem;
            min-height: auto;
        }

        .footer-logo-panel {
            justify-content: center;
        }

        .footer-logo {
            height: clamp(130px, 24vw, 180px);
        }

        .footer-brand {
            margin-left: 0;
            align-items: flex-start;
            text-align: left;
        }
    }

    /* Mobile */
    @media (max-width: 560px) {
        .footer-nav-row {
            grid-template-columns: 1fr;
            gap: 1.75rem;
        }

        .footer-logo-panel {
            justify-content: flex-start;
        }

        .footer-logo {
            height: clamp(112px, 32vw, 145px);
        }

        .footer-brand h2 {
            font-size: 1.4rem;
        }
    }
</style>


<footer id="site-footer">
    <div class="container footer-inner">
        <div class="footer-grid">
            <div class="footer-logo-panel">
                <img src="{{ secure_asset_v('identity/Logo/SVG/Blue.svg') }}" alt="Maalem Logo" class="footer-logo">

            </div>

            <div class="footer-content">
                <div class="footer-nav-row">
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

            </div>
        </div>
        <div class="footer-bottom">
            <p data-i18n="footer_copy">© 2026 Maalem Education. All rights reserved.</p>
        </div>
    </div>
</footer>
