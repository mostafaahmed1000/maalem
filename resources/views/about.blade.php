<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Maalem Education</title>
    <link rel="stylesheet" href="{{ secure_asset_v('css/style.css') }}">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .section {
            padding: 8rem 0 6rem;
        }

        .about-page>section {
            min-height: auto !important;
        }

        .bg-alt {
            background-color: #f8fafc;
        }

        .about-identity-section {
            padding: 4.5rem 0 0.75rem !important;
        }

        .about-identity-section .merged-services-header {
            margin-bottom: 2.5rem !important;
        }

        .about-identity-section .identity-grid {
            margin-bottom: 0 !important;
            padding: 0.5rem 0 0 !important;
        }

        .about-identity-section .hex-card-wrapper {
            padding: 0.5rem 0 !important;
        }

        .about-content-section {
            padding: 1.5rem 0 5rem !important;
        }

        /* Responsive Improvements */
        @media (max-width: 768px) {
            .section {
                padding: 4rem 0 2.5rem !important;
            }

            .about-identity-section {
                padding: 3rem 0 0.75rem !important;
            }

            .about-identity-section .merged-services-header {
                margin-bottom: 2rem !important;
            }

            .about-content-section {
                padding: 1.25rem 0 3.5rem !important;
            }

            .about-hero {
                padding: 8rem 0 3rem !important;
            }

            .about-hero h1 {
                font-size: 2.2rem !important;
                margin-bottom: 1rem !important;
            }

            .about-hero-flex {
                gap: 2rem !important;
            }

            .about-hero-img {
                height: 280px !important;
            }

            .about-grid-cards {
                gap: 1.5rem !important;
                grid-template-columns: 1fr !important;
            }

            .about-grid-card {
                padding: 1.8rem !important;
            }

            .about-grid-card h3 {
                font-size: 1.3rem !important;
            }

            .about-vision-box {
                padding: 2rem 1.5rem !important;
                margin-top: 2.5rem !important;
                border-radius: 20px !important;
            }

            .about-vision-box h2 {
                font-size: 1.8rem !important;
                margin-bottom: 1rem !important;
            }
        }
    </style>
</head>

<body>
    <!-- Floating Decor Shapes -->
    <div class="floating-decor shape-1"><svg viewBox="0 0 100 100" fill="currentColor">
            <circle cx="50" cy="50" r="40" />
        </svg></div>
    <div class="floating-decor shape-2"><svg viewBox="0 0 100 100" fill="currentColor">
            <rect x="20" y="20" width="60" height="60" rx="10" />
        </svg></div>
    <div class="floating-decor shape-3"><svg viewBox="0 0 100 100" fill="currentColor">
            <path d="M50 10 L90 90 L10 90 Z" />
        </svg></div>
    <div class="floating-decor shape-4"><svg viewBox="0 0 100 100" fill="currentColor">
            <path d="M30 50 L70 50 M50 30 L50 70" stroke="currentColor" stroke-width="15" stroke-linecap="round" />
        </svg></div>
    <div class="floating-decor shape-5"><svg viewBox="0 0 100 100" fill="currentColor">
            <circle cx="50" cy="50" r="30" stroke="currentColor" stroke-width="8" fill="none" />
        </svg></div>
    <div class="floating-decor shape-6"><svg viewBox="0 0 100 100" fill="currentColor">
            <rect x="30" y="30" width="40" height="40" rotate="45" fill="currentColor" opacity="0.5" />
        </svg></div>

    @include('partials.header')

    <main class="about-page">
        <!-- About Hero -->
        <section class="section bg-alt about-hero" style="padding: 12rem 0 6rem; position: relative; overflow: hidden;">
            <div class="container">
                <div class="about-hero-flex" style="display: flex; align-items: center; gap: 4rem; flex-wrap: wrap;">
                    <div style="flex: 1; min-width: 300px;" class="reveal reveal-left">
                        <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 1rem;">
                            <i class="fas fa-info-circle" style="color: var(--primary-color); font-size: 1.2rem;"></i>
                            <span data-i18n="about_subtitle"
                                style="font-weight: 700; color: var(--primary-color); text-transform: uppercase; letter-spacing: 1px;">Who
                                we are</span>
                        </div>
                        <h1 data-i18n="about_title"
                            style="font-size: 3.5rem; font-weight: 800; line-height: 1.1; margin-bottom: 2rem;">
                            Transforming Education Through <span style="color: var(--primary-color);">Expertise</span>
                        </h1>
                        <p data-i18n="about_p1"
                            style="font-size: 1.1rem; color: var(--text-light); line-height: 1.7; margin-bottom: 0;">
                            Maalem Educational Services is guided by a distinguished board of educational leaders whose
                            individual experience ranges from over 20 to more than 35 years in the field of education.
                        </p>
                    </div>
                    <div style="flex: 1; min-width: 300px;" class="reveal reveal-right">
                        <div class="faq-img-card about-hero-img" style="width: 100%; height: 400px;">
                            <img src="{{ secure_asset_v('assets/Mision-1.jpeg') }}" alt="Board Meeting"
                                style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Who We Are (Identity Section) -->
        <section class="merged-services-section about-identity-section" id="ecosystem"
            style="background: #f8fafc;">
            <div class="container">
                <div class="merged-services-header reveal" style="text-align: center; margin-bottom: 4rem;">
                    <span class="badge"
                        style="display: inline-flex; align-items: center; gap: 8px; background: rgba(37, 99, 235, 0.1); color: var(--primary-color); padding: 0.5rem 1.2rem; border-radius: 50px; font-weight: 700; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 1.5rem;">
                        <i class="fas fa-fingerprint"></i>
                        <span data-i18n="who_subtitle">Our Identity</span>
                    </span>
                    <h2 data-i18n="who_title" style="font-size: 2.8rem; font-weight: 800; color: var(--text-color);">Who
                        We Are</h2>
                </div>
                <div class="identity-grid">
                    <div class="hex-card-wrapper reveal">
                        <div class="hex-card bg-blue">
                            <div class="hex-img"><i class="fas fa-school"></i></div>
                            <h3 data-i18n="who_step1_h">School operator</h3>
                            <p data-i18n="who_step1_p">Not only consultancy – we take active leadership in school
                                operations.</p>
                        </div>
                    </div>
                    <div class="hex-card-wrapper reveal">
                        <div class="hex-card bg-gray">
                            <div class="hex-img"><i class="fas fa-globe-americas"></i></div>
                            <h3 data-i18n="who_step2_h">International expertise</h3>
                            <p data-i18n="who_step2_p">Multi-system expertise across diverse educational systems.</p>
                        </div>
                    </div>
                    <div class="hex-card-wrapper reveal">
                        <div class="hex-card bg-purple">
                            <div class="hex-img"><i class="fas fa-layer-group"></i></div>
                            <h3 data-i18n="who_step3_h">Centralized frameworks</h3>
                            <p data-i18n="who_step3_p">Integrated systems that ensure consistency and excellence.</p>
                        </div>
                    </div>
                    <div class="hex-card-wrapper reveal">
                        <div class="hex-card bg-blue">
                            <div class="hex-img"><i class="fas fa-handshake"></i></div>
                            <h3 data-i18n="who_step4_h">Partnership mindset</h3>
                            <p data-i18n="who_step4_p">A long-term mindset focused on sustainable growth.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- About Content Section -->
        <section class="section about-content-section">
            <div class="container">
                <div style="max-width: 1000px; margin: 0 auto;">
                    <div class="reveal" style="margin-bottom: 4rem;">
                        <p data-i18n="about_p2"
                            style="font-size: 1.2rem; line-height: 1.8; color: var(--text-color); margin-bottom: 2rem;">
                            This depth of expertise reflects decades of hands-on leadership across teaching, school
                            management, governance, and strategic educational development.
                        </p>
                        <p data-i18n="about_p3"
                            style="font-size: 1.2rem; line-height: 1.8; color: var(--text-color); margin-bottom: 2rem;">
                            Our board members have successfully established, led, and operated schools across
                            Alexandria, Cairo, and the Kingdom of Saudi Arabia, working with diverse educational systems
                            and international curricula.
                        </p>
                        <p data-i18n="about_p4"
                            style="font-size: 1.2rem; line-height: 1.8; color: var(--text-color); margin-bottom: 2rem;">
                            Their collective experience spans the full educational journey—from classroom instruction to
                            executive leadership—bringing a well-rounded and practical understanding of how schools
                            grow, evolve, and sustain excellence.
                        </p>
                    </div>

                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 3rem; margin-bottom: 4rem;"
                        class="reveal about-grid-cards">
                        <div class="about-grid-card"
                            style="background: #f8fafc; padding: 2.5rem; border-radius: 20px; border-left: 5px solid var(--primary-color);">
                            <h3 data-i18n="about_card1_h"
                                style="font-size: 1.5rem; font-weight: 700; margin-bottom: 1rem;">Institutional
                                Transformation</h3>
                            <p data-i18n="about_card1_p" style="color: var(--text-light); line-height: 1.7;">Rooted in
                                strong academic and professional backgrounds, the team brings expertise in educational
                                leadership, research-based pedagogy, organizational culture, data-driven
                                decision-making, and institutional transformation. Their work has consistently focused
                                on improving learning outcomes while building strong, values-driven school communities.
                            </p>
                        </div>
                        <div class="about-grid-card"
                            style="background: #f8fafc; padding: 2.5rem; border-radius: 20px; border-left: 5px solid var(--primary-color);">
                            <h3 data-i18n="about_card2_h"
                                style="font-size: 1.5rem; font-weight: 700; margin-bottom: 1rem;">Broad Impact</h3>
                            <p data-i18n="about_card2_p" style="color: var(--text-light); line-height: 1.7;">Beyond
                                individual institutions, Maalem plays an active role in the broader education landscape,
                                contributing to the development and enhancement of over 160 schools across Egypt and
                                Saudi Arabia. This work reflects a commitment not only to school improvement, but to
                                elevating education systems at scale.</p>
                        </div>
                    </div>

                    <!-- Our Principles / Core Values -->
                    <div class="reveal reveal-right"
                        style="margin-bottom: 4rem; padding: 3rem 0; background-color: var(--bg-alt); border-radius: 30px;">
                        <div class="category-header reveal" style="text-align: center; margin-bottom: 3rem;">
                            <div
                                style="display: flex; justify-content: center; align-items: center; gap: 10px; margin-bottom: 10px;">
                                <i class="fas fa-star" style="color: var(--primary-color); font-size: 1.2rem;"></i>
                                <span data-i18n="values_subtitle"
                                    style="font-weight: 700; color: var(--primary-color); text-transform: uppercase; letter-spacing: 1px;">Our
                                    Principles</span>
                            </div>
                            <h2 data-i18n="values_title" style="font-size: 2.5rem; font-weight: 700; margin: 0;">Core
                                Values</h2>
                        </div>

                        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 2rem; padding: 0 2rem; justify-content: center;"
                            class="reveal">
                            <div class="cat-card"
                                style="margin: 0; background: #fff; padding: 2.5rem 1.5rem; border-radius: 20px; text-align: center; box-shadow: 0 10px 30px rgba(0,0,0,0.02);">
                                <div class="cat-icon"
                                    style="font-size: 2rem; color: var(--primary-color); margin-bottom: 1.2rem;"><i
                                        class="fas fa-medal"></i></div>
                                <h3 data-i18n="val1_h"
                                    style="font-size: 1.3rem; font-weight: 700; margin-bottom: 0.8rem;">Excellence</h3>
                                <p data-i18n="val1_p"
                                    style="color: var(--text-light); font-size: 0.95rem; line-height: 1.6; margin: 0;">
                                    We commit to the highest standards of teaching and leadership.</p>
                            </div>
                            <div class="cat-card"
                                style="margin: 0; background: #fff; padding: 2.5rem 1.5rem; border-radius: 20px; text-align: center; box-shadow: 0 10px 30px rgba(0,0,0,0.02);">
                                <div class="cat-icon"
                                    style="font-size: 2rem; color: var(--primary-color); margin-bottom: 1.2rem;"><i
                                        class="fas fa-lightbulb"></i></div>
                                <h3 data-i18n="val2_h"
                                    style="font-size: 1.3rem; font-weight: 700; margin-bottom: 0.8rem;">Innovation</h3>
                                <p data-i18n="val2_p"
                                    style="color: var(--text-light); font-size: 0.95rem; line-height: 1.6; margin: 0;">
                                    We embrace modern methodologies and creative technology.</p>
                            </div>
                            <div class="cat-card"
                                style="margin: 0; background: #fff; padding: 2.5rem 1.5rem; border-radius: 20px; text-align: center; box-shadow: 0 10px 30px rgba(0,0,0,0.02);">
                                <div class="cat-icon"
                                    style="font-size: 2rem; color: var(--primary-color); margin-bottom: 1.2rem;"><i
                                        class="fas fa-shield-alt"></i></div>
                                <h3 data-i18n="val3_h"
                                    style="font-size: 1.3rem; font-weight: 700; margin-bottom: 0.8rem;">Integrity</h3>
                                <p data-i18n="val3_p"
                                    style="color: var(--text-light); font-size: 0.95rem; line-height: 1.6; margin: 0;">
                                    We uphold transparency and ethics in all operations.</p>
                            </div>
                            <div class="cat-card"
                                style="margin: 0; background: #fff; padding: 2.5rem 1.5rem; border-radius: 20px; text-align: center; box-shadow: 0 10px 30px rgba(0,0,0,0.02);">
                                <div class="cat-icon"
                                    style="font-size: 2rem; color: var(--primary-color); margin-bottom: 1.2rem;"><i
                                        class="fas fa-hands-helping"></i></div>
                                <h3 data-i18n="val4_h"
                                    style="font-size: 1.3rem; font-weight: 700; margin-bottom: 0.8rem;">Collaboration
                                </h3>
                                <p data-i18n="val4_p"
                                    style="color: var(--text-light); font-size: 0.95rem; line-height: 1.6; margin: 0;">
                                    We work hand-in-hand with educators and leaders.</p>
                            </div>
                            <div class="cat-card"
                                style="margin: 0; background: #fff; padding: 2.5rem 1.5rem; border-radius: 20px; text-align: center; box-shadow: 0 10px 30px rgba(0,0,0,0.02);">
                                <div class="cat-icon"
                                    style="font-size: 2rem; color: var(--primary-color); margin-bottom: 1.2rem;"><i
                                        class="fas fa-users"></i></div>
                                <h3 data-i18n="val5_h"
                                    style="font-size: 1.3rem; font-weight: 700; margin-bottom: 0.8rem;">Inclusivity</h3>
                                <p data-i18n="val5_p"
                                    style="color: var(--text-light); font-size: 0.95rem; line-height: 1.6; margin: 0;">
                                    We ensure equitable experiences.</p>
                            </div>
                        </div>
                    </div>

                    <div class="reveal about-vision-box"
                        style="margin-top: 4rem; padding: 4rem; background: var(--primary-color); border-radius: 30px; color: #fff;">
                        <h2 data-i18n="about_vision_h"
                            style="font-size: 2.2rem; font-weight: 800; margin-bottom: 1.5rem;">One Cohesive Vision</h2>
                        <p data-i18n="about_vision_p" style="font-size: 1.2rem; line-height: 1.8; opacity: 0.9;">
                            At Maalem, we believe education is not a set of isolated functions, but an integrated
                            ecosystem. Our approach centers on the development of the whole student—academically,
                            socially, and emotionally—by aligning leadership, teaching practices, operational systems,
                            and community engagement into one cohesive vision. We work with schools to create
                            environments where students thrive, educators grow, and institutions achieve lasting impact.
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    @include('partials.footer')
    @include('partials.scripts')
</body>

</html>
