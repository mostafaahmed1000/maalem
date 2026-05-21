<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maalem Education - Empower Your Future</title>
    <link rel="stylesheet" href="{{ secure_asset_v('css/style.css') }}">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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

    <!-- Preloader -->
    <div id="preloader">
        <video id="preloaderVideo" muted playsinline preload="auto">
            <source src="{{ secure_asset_v('identity/Logo_Animation/Maalem.mp4') }}" type="video/mp4">
        </video>
        <!-- Overlay shown during white/blank video frames -->
        <div class="preloader-overlay">
            <div class="preloader-bar-wrap">
                <div class="preloader-bar-fill" id="preloaderBar"></div>
            </div>
        </div>
    </div>

    @include('partials.header')
    <style>
        /* ===== COURSES SECTION - RESPONSIVE FIX ===== */

        #courses {
            padding: 4rem 0;
        }

        #courses .section-title {
            text-align: center;
            margin-bottom: 3rem;
            padding: 0 1rem;
        }

        .course-carousel-wrapper {
            position: relative;
            overflow: hidden;
            padding: 0 1rem;
        }

        .course-carousel {
            display: flex;
            gap: 1.5rem;
            overflow-x: auto;
            scroll-snap-type: x mandatory;
            -webkit-overflow-scrolling: touch;
            scrollbar-width: none;
            padding-bottom: 1rem;
        }

        .course-carousel::-webkit-scrollbar {
            display: none;
        }

        /* ===== COURSE CARD ===== */
        .new-course-card {
            flex: 0 0 calc(33.333% - 1rem);
            min-width: 0;
            scroll-snap-align: start;
            background: #fff;
            border-radius: 16px;
            border: 1px solid #e5e7eb;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        /* Course Image */
        .course-img-wrap {
            width: 100%;
            aspect-ratio: 16/9;
            overflow: hidden;
            flex-shrink: 0;
        }

        .course-img {
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            transition: transform 0.4s ease;
        }

        .new-course-card:hover .course-img {
            transform: scale(1.05);
        }

        /* Course Content */
        .course-content {
            padding: 1.25rem;
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .course-content h3 {
            font-size: 1rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 0.5rem;
            line-height: 1.3;
        }

        .course-content p {
            font-size: 0.875rem;
            color: #64748b;
            margin-bottom: 1rem;
            line-height: 1.5;
            flex: 1;
        }

        /* ===== STATS ROW - THE BROKEN PART ===== */
        .course-stats {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            background: #f8fafc;
            border-radius: 10px;
            padding: 0.75rem;
            margin-bottom: 1rem;
            min-width: 0;
            overflow: hidden;
        }

        .stat-box {
            display: flex;
            align-items: center;
            gap: 0.4rem;
            min-width: 0;
            flex: 1;
        }

        .stat-box i {
            font-size: 1rem;
            color: #2563eb;
            flex-shrink: 0;
        }

        .stat-box>div {
            display: flex;
            flex-direction: column;
            min-width: 0;
        }

        .stat-label {
            font-size: 0.7rem;
            color: #94a3b8;
            white-space: nowrap;
        }

        .stat-val {
            font-size: 0.8rem;
            font-weight: 700;
            color: #0f172a;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .stat-divider {
            width: 1px;
            height: 28px;
            background: #e5e7eb;
            flex-shrink: 0;
        }

        /* Course Footer */
        .course-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 0.5rem;
            padding-top: 0.75rem;
            border-top: 1px solid #f1f5f9;
            flex-wrap: wrap;
        }

        .instructor {
            display: flex;
            align-items: center;
            gap: 0.4rem;
            font-size: 0.8rem;
            color: #374151;
            min-width: 0;
        }

        .instructor i {
            flex-shrink: 0;
        }

        .instructor span {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .view-details {
            display: flex;
            align-items: center;
            gap: 0.3rem;
            font-size: 0.75rem;
            font-weight: 700;
            color: #2563eb;
            text-decoration: none;
            white-space: nowrap;
            letter-spacing: 0.05em;
            flex-shrink: 0;
        }

        .view-details:hover {
            text-decoration: underline;
        }


        @media (max-width: 1024px) {
            .new-course-card {
                flex: 0 0 calc(50% - 0.75rem);
            }
        }

        @media (max-width: 640px) {
            #courses {
                padding: 4rem 0;
            }

            #courses .container {
                padding: 0 0.5rem;
            }

            .course-carousel-wrapper {
                padding: 0;
            }

            .course-carousel {
                flex-direction: column;
                gap: 1.5rem;
                padding: 0;
                overflow-x: visible;
            }

            .new-course-card {
                flex: none;
                width: 100%;
                min-width: unset;
                max-width: unset;
                border-radius: 20px;
            }

            .course-content {
                padding: 1.2rem;
            }

            .course-content h3 {
                font-size: 1.15rem;
            }

            .course-content p {
                font-size: 0.95rem;
                line-height: 1.7;
            }

            .course-stats {
                padding: 0.8rem;
                gap: 0.7rem;
            }

            .stat-val {
                font-size: 0.8rem;
            }

            .stat-label {
                font-size: 0.68rem;
            }

            .course-footer {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.8rem;
            }

            #courses .section-title h2 {
                font-size: 1.9rem;
            }
        }


        @media (max-width: 380px) {
            .course-footer {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.5rem;
            }
        }


        /* ── SERVICES GRID ── */
        .services-grid {
            grid-template-columns: repeat(3, 1fr) !important;
        }

        @media (max-width: 1100px) {
            .services-grid {
                grid-template-columns: repeat(2, 1fr) !important;
            }
        }

        @media (max-width: 640px) {

            .services-grid {
                grid-template-columns: 1fr !important;
                gap: 2rem;
                padding: 0 2.5rem !important;
            }

            .service-card-new {
                width: 100%;
                max-width: 100% !important;
                padding: 1.5rem !important;
                border-radius: 22px;
            }

            .service-img-new {
                height: 240px !important;
                border-radius: 18px;
            }

        }

        @media (max-width: 576px) {
            .services-grid {
                display: flex !important;
                flex-direction: column !important;
                align-items: center !important;
                gap: 1.75rem !important;
                padding: 0 !important;
                width: 100% !important;
            }

            .service-img-new {
                height: 240px !important;
                border-radius: 18px;
            }

            .service-card-new {
                width: 100% !important;
                max-width: 100% !important;
                flex: 0 0 100% !important;
                box-sizing: border-box !important;
            }
        }
    </style>
    <main>
        <!-- 1. Hero Section -->
        <section id="home" class="hero">
            <div class="decor-wavy">
                <svg viewBox="0 0 100 100" fill="none" stroke="var(--secondary-color)" stroke-width="1">
                    <path d="M10,50 Q20,40 30,50 T50,50 T70,50 T90,50" />
                    <path d="M10,60 Q20,50 30,60 T50,60 T70,60 T90,60" />
                </svg>
            </div>
            <div class="hero-right">
                <div class="hero-logo-container">
                    <img src="{{ secure_asset_v('identity/Logo/PNG/Blue.png') }}" alt="Maalem Logo"
                        class="hero-main-logo">
                    <p class="hero-slogan">Shaping Tomorrow's Landmark</p>
                </div>
            </div>
            <div class="hero-slider" id="heroSlider">
                <!-- Slide 1: Operating Schools -->
                <div class="hero-slide active">
                    <div class="hero-left">
                        <div class="hero-content-boxed reveal reveal-left active">
                            <div class="rotating-circle"></div>
                            <h1 data-i18n="hero_title_1">Excellence in <span>School Operation</span></h1>
                            <p data-i18n="hero_desc_1">Comprehensive management models that drive 300%+ growth and
                                academic excellence through strategic governance.</p>
                            <a href="{{ url('/partnerships') }}" class="btn btn-white btn-lg"
                                data-i18n="hero_cta1">Enquire Now <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Slide 2: Consulting -->
                <div class="hero-slide">
                    <div class="hero-left">
                        <div class="hero-content-boxed reveal reveal-left active">
                            <div class="rotating-circle"></div>
                            <h1 data-i18n="hero_title_2">Strategic <span>Educational Consulting</span></h1>
                            <p data-i18n="hero_desc_2">Partnering with schools to achieve international accreditation,
                                strategic planning, and sustainable institutional success.</p>
                            <a href="{{ url('/consultation') }}" class="btn btn-white btn-lg"
                                data-i18n="hero_cta2">Consult With Us <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Slide 3: Teacher Training -->
                <div class="hero-slide">
                    <div class="hero-left">
                        <div class="hero-content-boxed reveal reveal-left active">
                            <div class="rotating-circle"></div>
                            <h1 data-i18n="hero_title_3">Expert <span>Teacher Training</span></h1>
                            <p data-i18n="hero_desc_3">Empowering educators with four-pathway diploma programs designed
                                for the next generation of teaching excellence.</p>
                            <a href="{{ url('/training') }}" class="btn btn-white btn-lg" data-i18n="hero_cta3">Get
                                Certified <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 2. Get To Know About Us -->
        <section class="section vision-section" id="about">
            <div class="container vision-container">
                <div class="vision-left reveal reveal-left">
                    <div class="image-stack">
                        <div class="img-back"
                            style="background-image: url('{{ secure_asset_v('assets/Mision-1.jpeg') }}');">
                        </div>
                        <div class="img-front"
                            style="background-image: url('{{ secure_asset_v('assets/Mission-2.jpeg') }}');">
                        </div>
                        <div class="dotted-pattern"></div>
                    </div>
                </div>
                <div class="vision-right reveal reveal-right">
                    <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
                        <i class="fas fa-book-open" style="color: var(--primary-color); font-size: 1.2rem;"></i>
                        <span data-i18n="vision_subtitle"
                            style="font-weight: 700; color: var(--primary-color); text-transform: uppercase; letter-spacing: 1px;">Get
                            To Know About Us</span>
                    </div>
                    <h2 data-i18n="vision_title"
                        style="font-size: 2.5rem; font-weight: 800; line-height: 1.2; margin-bottom: 1.5rem;">Benefit
                        From Our Educational Expertise</h2>
                    <p data-i18n="vision_desc" style="color: var(--text-light); margin-bottom: 2rem;">Maalem Education
                        Services is dedicated to transforming education through strategic operations, continuous
                        professional development, and global accreditation support.</p>

                    <div class="mission-vision-grid" style="margin-bottom: 2.5rem;">
                        <div class="mv-item">
                            <h3 data-i18n="mission_h"
                                style="font-size: 1.2rem; margin-bottom: 0.5rem; text-transform: uppercase;">Our
                                Mission:</h3>
                            <p data-i18n="mission_p"
                                style="color: var(--text-light); font-size: 0.95rem; line-height: 1.6;">We partner with
                                schools to design and implement sustainable models of academic excellence, leadership
                                growth, and operational efficiency.</p>
                        </div>
                        <div class="mv-item">
                            <h3 data-i18n="vision_h"
                                style="font-size: 1.2rem; margin-bottom: 0.5rem; text-transform: uppercase;">Our Vision:
                            </h3>
                            <p data-i18n="vision_p"
                                style="color: var(--text-light); font-size: 0.95rem; line-height: 1.6;">To be a leading
                                educational services provider that empowers schools and educators to achieve
                                international standards.</p>
                        </div>
                    </div>

                    <a href="{{ url('/about') }}" class="btn btn-primary btn-lg" data-i18n="vision_cta">Learn More About
                        Us <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </section>

        <!-- 3. Why Maalem Education (Services) -->
        <section class="merged-services-section" id="services" style="background: #fff; padding-top: 4rem;">
            <div class="container">
                <div class="merged-services-header reveal">
                    <span class="badge"><i class="fas fa-school-flag" style="margin-right: 8px;"></i> <span
                            data-i18n="why_subtitle">Why Maalem Education</span></span>
                    <h2 data-i18n="why_title">Maalem is not only an <span>operator</span></h2>
                    <p data-i18n="why_desc">It is a complete <strong>education ecosystem</strong> that empowers schools
                        and educators to achieve excellence.</p>
                </div>
                <div class="services-grid">
                    <div class="service-card-new reveal">
                        <div class="service-img-new"
                            style="background-image: url('{{ secure_asset_v('assets/services/school_operation.png') }}');">
                        </div>
                        <div class="service-icon-new"><i class="fas fa-school-flag"></i></div>
                        <h3 data-i18n="service1_h">Running & Operating Schools</h3>
                        <ul>
                            <li><i class="fas fa-check"></i> <span data-i18n="service1_f1">Full academic & operational
                                    management</span></li>
                            <li><i class="fas fa-check"></i> <span data-i18n="service1_f2">Governance & quality
                                    assurance</span></li>
                            <li><i class="fas fa-check"></i> <span data-i18n="service1_f4">300%+ growth success
                                    rate</span></li>
                        </ul>
                        <a href="{{ url('/partnerships') }}" class="btn-service-new">Enquire Now <i
                                class="fas fa-arrow-right"></i></a>
                    </div>
                    <div class="service-card-new reveal">
                        <div class="service-img-new"
                            style="background-image: url('{{ secure_asset_v('assets/services/educational_consulting.png') }}');">
                        </div>
                        <div class="service-icon-new"><i class="fas fa-chess"></i></div>
                        <h3 data-i18n="service2_h">Educational Consulting</h3>
                        <ul>
                            <li><i class="fas fa-check"></i> <span data-i18n="service2_f1">Setup & strategic
                                    planning</span></li>
                            <li><i class="fas fa-check"></i> <span data-i18n="service2_f3">Accreditation
                                    readiness</span></li>
                            <li><i class="fas fa-check"></i> <span data-i18n="service2_f6">Growth marketing
                                    strategies</span></li>
                        </ul>
                        <a href="{{ url('/consultation') }}" class="btn-service-new">Consult With Us <i
                                class="fas fa-arrow-right"></i></a>
                    </div>
                    <div class="service-card-new reveal">
                        <div class="service-img-new"
                            style="background-image: url('{{ secure_asset_v('assets/services/teacher_training.png') }}');">
                        </div>
                        <div class="service-icon-new"><i class="fas fa-certificate"></i></div>
                        <h3 data-i18n="service3_h">Teacher Training Diploma</h3>
                        <ul>
                            <li><i class="fas fa-check"></i> <span data-i18n="service3_f1">Structured diploma
                                    program</span></li>
                            <li><i class="fas fa-check"></i> <span data-i18n="service3_f2">Four development
                                    pathways</span></li>
                            <li><i class="fas fa-check"></i> <span data-i18n="service3_f3">Practical, applied
                                    training</span></li>
                        </ul>
                        <a href="{{ url('/training') }}" class="btn-service-new">Get Certified <i
                                class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </section>

        <!-- 4. Featured Courses -->
        <section id="courses" class="section bg-alt reveal reveal-right" style="padding: 6rem 0;">
            <div class="container">
                <div class="section-title reveal" style="text-align: center; margin-bottom: 4rem;">
                    <div
                        style="display: flex; justify-content: center; align-items: center; gap: 10px; margin-bottom: 10px;">
                        <i class="fas fa-book-open" style="color: var(--primary-color); font-size: 1.2rem;"></i>
                        <span data-i18n="courses_subtitle"
                            style="font-weight: 700; color: var(--primary-color); text-transform: uppercase; letter-spacing: 1px;">Our
                            Courses</span>
                    </div>
                    <h2 data-i18n="courses_title" style="font-size: 2.5rem; font-weight: 700;">Our Featured Courses</h2>
                </div>
                <div class="course-carousel-wrapper reveal">
                    <div class="course-carousel" id="courseCarousel">
                        <div class="new-course-card">
                            <div class="course-img-wrap">
                                <div class="course-img"
                                    style="background-image: url('{{ secure_asset_v('assets/teaching_excellence_pathway_1778411860463.png') }}');">
                                </div>
                            </div>
                            <div class="course-content">
                                <h3 data-i18n="course1_name">Pathway One: Teaching Excellence</h3>
                                <p data-i18n="course1_desc"
                                    style="color: var(--text-light); font-size: 0.95rem; margin-bottom: 1.5rem;">A
                                    3-level comprehensive certification for classroom practitioners.</p>
                                <div class="course-stats">
                                    <div class="stat-box"><i class="far fa-clock"></i>
                                        <div><span class="stat-label">Duration:</span><span class="stat-val">Up to 120
                                                Hrs</span></div>
                                    </div>
                                    <div class="stat-divider"></div>
                                    <div class="stat-box"><i class="fas fa-layer-group"></i>
                                        <div><span class="stat-label">Levels:</span><span class="stat-val">3
                                                Levels</span></div>
                                    </div>
                                </div>
                                <div class="course-footer">
                                    <div class="instructor"><i class="fas fa-user-graduate"
                                            style="color: var(--primary-color);"></i><span>Certified Program</span>
                                    </div>
                                    <a href="{{ url('/course-teaching') }}" class="view-details">VIEW DETAILS <i
                                            class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="new-course-card">
                            <div class="course-img-wrap">
                                <div class="course-img"
                                    style="background-image: url('{{ secure_asset_v('assets/educational_leadership_pathway_1778411874245.png') }}');">
                                </div>
                            </div>
                            <div class="course-content">
                                <h3 data-i18n="course2_name">Pathway Two: Educational Leadership</h3>
                                <p data-i18n="course2_desc"
                                    style="color: var(--text-light); font-size: 0.95rem; margin-bottom: 1.5rem;">
                                    Empowering current and future school leaders with strategic skills.</p>
                                <div class="course-stats">
                                    <div class="stat-box"><i class="far fa-calendar-alt"></i>
                                        <div><span class="stat-label">Duration:</span><span class="stat-val">12–15
                                                Months</span></div>
                                    </div>
                                    <div class="stat-divider"></div>
                                    <div class="stat-box"><i class="fas fa-certificate"></i>
                                        <div><span class="stat-label">Total:</span><span class="stat-val">300
                                                Hours</span></div>
                                    </div>
                                </div>
                                <div class="course-footer">
                                    <div class="instructor"><i class="fas fa-award"
                                            style="color: var(--primary-color);"></i><span>Capstone Project</span></div>
                                    <a href="{{ url('/course-leadership') }}" class="view-details">VIEW DETAILS <i
                                            class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="new-course-card">
                            <div class="course-img-wrap">
                                <div class="course-img"
                                    style="background-image: url('{{ secure_asset_v('assets/school_operations_pathway_1778411887223.png') }}');">
                                </div>
                            </div>
                            <div class="course-content">
                                <h3 data-i18n="course3_name">Pathway Three: School Operations</h3>
                                <p data-i18n="course3_desc"
                                    style="color: var(--text-light); font-size: 0.95rem; margin-bottom: 1.5rem;">
                                    Targeted professional tracks for HR, Finance, and Marketing.</p>
                                <div class="course-stats">
                                    <div class="stat-box"><i class="fas fa-sitemap"></i>
                                        <div><span class="stat-label">Focus:</span><span class="stat-val">4 Core
                                                Tracks</span></div>
                                    </div>
                                    <div class="stat-divider"></div>
                                    <div class="stat-box"><i class="fas fa-tools"></i>
                                        <div><span class="stat-label">Applied:</span><span class="stat-val">Project
                                                Based</span></div>
                                    </div>
                                </div>
                                <div class="course-footer">
                                    <div class="instructor"><i class="fas fa-users-cog"
                                            style="color: var(--primary-color);"></i><span>Expert Led</span></div>
                                    <a href="{{ url('/course-operations') }}" class="view-details">VIEW DETAILS <i
                                            class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <!-- 5. Careers Section -->
        <section id="careers" class="section careers-section reveal">
            <div class="container" style="text-align: center;">
                <div class="careers-wrapper">
                    <div class="careers-image-container reveal">
                        <img src="{{ secure_asset_v('assets/careers_grid.png') }}" alt="Maalem Team">
                        <div class="careers-text-container reveal">
                            <span class="badge" style="color: #1d63dc; font-weight: 700;"><i class="fas fa-briefcase"
                                    style="margin-right: 8px;"></i> <span data-i18n="careers_subtitle">Join Our
                                    Team</span></span>
                            <h2 data-i18n="careers_title"
                                style="font-size: 3rem; font-weight: 800; margin-bottom: 1.5rem;">Shape the Future of
                                Education With Us</h2>
                            <p data-i18n="careers_desc"
                                style="max-width: 800px; margin: 0 auto 3rem; font-size: 1.2rem; color: var(--text-light);">
                                We are always looking for passionate educators, consultants, and leaders to join our
                                global network.</p>
                            <a href="{{ route('careers.index') }}" class="btn btn-primary btn-lg"
                                style="padding: 1.2rem 3rem; border-radius: 50px; font-weight: 800;">VIEW OPEN POSITIONS
                                <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>


                </div>
            </div>
        </section>


        <!-- 10. Our Instructors -->
        <section id="instructors" class="section bg-white reveal" style="padding: 6rem 0;">
            <div class="container">
                <div class="section-title reveal" style="text-align: center; margin-bottom: 4rem;">
                    <div
                        style="display: flex; justify-content: center; align-items: center; gap: 10px; margin-bottom: 10px;">
                        <i class="fas fa-chalkboard-teacher"
                            style="color: var(--primary-color); font-size: 1.2rem;"></i>
                        <span data-i18n="instructors_subtitle"
                            style="font-weight: 700; color: var(--primary-color); text-transform: uppercase; letter-spacing: 1px;">Our
                            Experts</span>
                    </div>
                    <h2 data-i18n="instructors_title" style="font-size: 2.5rem; font-weight: 700;">Our Instructors</h2>
                </div>

                <div class="instructors-grid">
                    @forelse($instructors as $instructor)
                        <div class="instructor-card-premium reveal">
                            <div class="instructor-img-box">
                                @if($instructor->image)
                                    <img src="{{ secure_asset_v(file_exists(public_path($instructor->image)) ? $instructor->image : 'storage/' . $instructor->image) }}"
                                         alt="{{ $instructor->name }}">
                                @else
                                    <img src="{{ secure_asset_v('identity/Logo/PNG/Blue.png') }}" alt="Maalem Logo"
                                        class="placeholder-logo">
                                @endif
                                <div class="instructor-rating">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="{{ $i <= $instructor->rating ? 'fas' : 'far' }} fa-star"></i>
                                    @endfor
                                </div>
                            </div>
                            <div class="instructor-info">
                                <h3>{{ $instructor->name }}</h3>
                                <p>{{ $instructor->title }}</p>
                            </div>
                        </div>
                    @empty
                        <p style="text-align: center; width: 100%; color: var(--text-light);">Stay tuned! Our expert
                            instructors will be listed here soon.</p>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- 11. Mentors -->
        <section id="mentors" class="mentors-section reveal">
            <div class="container">
                <div class="section-title reveal" style="text-align: center; margin-bottom: 8rem;">
                    <h2 data-i18n="teachers_title" style="font-size: 3.5rem; font-weight: 800;">Biographies</h2>
                </div>

                <div class="teachers-grid-new">
                    <!-- Teacher 1 -->
                    <a href="{{ url('/mentor-details?id=dina') }}" class="teacher-card-new reveal">
                        <div class="teacher-avatar-new"
                            style="background-image: url('{{ secure_asset_v('identity/Logo/SVG/Blue.svg') }}');"></div>
                        <h3 data-i18n="mentor1_name">Dr. Dina El Odessy</h3>
                        <span class="role" data-i18n="mentor1_role">Educational Director</span>
                    </a>

                    <!-- Teacher 2 -->
                    <a href="{{ url('/mentor-details?id=omar') }}" class="teacher-card-new reveal">
                        <div class="teacher-avatar-new"
                            style="background-image: url('{{ secure_asset_v('identity/Logo/SVG/Blue.svg') }}');"></div>
                        <h3 data-i18n="mentor2_name">Eng. Omar El Odessy</h3>
                        <span class="role" data-i18n="mentor2_role">Chairman of the Board</span>
                    </a>

                    <!-- Teacher 3 -->
                    <a href="{{ url('/mentor-details?id=karim') }}" class="teacher-card-new reveal">
                        <div class="teacher-avatar-new"
                            style="background-image: url('{{ secure_asset_v('identity/Logo/SVG/Blue.svg') }}');"></div>
                        <h3 data-i18n="mentor3_name">Mr. Karim El Sarnagawi</h3>
                        <span class="role" data-i18n="mentor3_role">CEO of Pyramakerz</span>
                    </a>

                    <!-- Teacher 4 -->
                    <a href="{{ url('/mentor-details?id=nourhan') }}" class="teacher-card-new reveal">
                        <div class="teacher-avatar-new"
                            style="background-image: url('{{ secure_asset_v('identity/Logo/SVG/Blue.svg') }}');"></div>
                        <h3 data-i18n="mentor4_name">Mrs. Nourhan Soudan</h3>
                        <span class="role" data-i18n="mentor4_role">CEO of LOIS Company</span>
                    </a>

                    <!-- Teacher 5 -->
                    <a href="{{ url('/mentor-details?id=magie') }}" class="teacher-card-new reveal">
                        <div class="teacher-avatar-new"
                            style="background-image: url('{{ secure_asset_v('identity/Logo/SVG/Blue.svg') }}');"></div>
                        <h3 data-i18n="mentor5_name">Eng. Magie S. Ginidy</h3>
                        <span class="role" data-i18n="mentor5_role">Operations Director</span>
                    </a>
                </div>
            </div>
        </section>

        <!-- 11. Pricing -->
        <section id="pricing" class="pricing-section reveal">
            <div class="container">
                <div class="section-title reveal" style="text-align: center; margin-bottom: 4rem;">
                    <div
                        style="display: flex; justify-content: center; align-items: center; gap: 10px; margin-bottom: 10px;">
                        <i class="fas fa-book" style="color: var(--primary-color); font-size: 1.2rem;"></i>
                        <span data-i18n="pricing_badge"
                            style="font-weight: 700; color: var(--primary-color); text-transform: uppercase; letter-spacing: 1px;">Pricing
                            Plans</span>
                    </div>
                    <h2 data-i18n="pricing_title">Our Educational Pricing And Membership Plans</h2>
                </div>
                <div class="pricing-grid">
                    <!-- Starter -->
                    <div class="pricing-card reveal">
                        <div class="pricing-header">
                            <span class="plan-name" data-i18n="plan1_name">Starter</span>
                            <div class="plan-price">
                                <h2 class="price-val" data-monthly="$0" data-yearly="$0">$0</h2>
                                <span class="price-period">/month</span>
                            </div>
                            <p class="plan-desc" data-i18n="plan1_desc">Perfect For Small Teams</p>
                            <a href="#" class="btn-pricing-dark" data-i18n="plan_cta1">GET STARTED</a>
                        </div>
                        <div class="pricing-body">
                            <ul class="plan-features">
                                <li><i class="far fa-check-circle"></i> <span data-i18n="plan1_f1">Individual
                                        Course</span></li>
                                <li><i class="far fa-check-circle"></i> <span data-i18n="plan1_f2">Course Learning
                                        Checks</span></li>
                                <li><i class="far fa-check-circle"></i> <span data-i18n="plan1_f3">Offline
                                        Learning</span></li>
                                <li><i class="far fa-check-circle"></i> <span data-i18n="plan1_f4">Course
                                        Discussions</span></li>
                                <li><i class="far fa-check-circle"></i> <span data-i18n="plan1_f5">One to One
                                        Guidance</span></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Pro -->
                    <div class="pricing-card reveal">
                        <div class="pricing-header">
                            <div
                                style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                                <span class="plan-name" style="margin-bottom: 0;" data-i18n="plan2_name">Pro</span>
                                <span class="plan-rec" data-i18n="plan_rec">Recommended</span>
                            </div>
                            <div class="plan-price">
                                <h2 class="price-val" data-monthly="$36" data-yearly="$27">$36</h2>
                                <span class="price-period">/month</span>
                            </div>
                            <p class="plan-desc" data-i18n="plan2_desc">Great for Growing Teams</p>
                            <a href="#" class="btn-pricing-dark" data-i18n="plan_cta1">GET STARTED</a>
                        </div>
                        <div class="pricing-body">
                            <ul class="plan-features">
                                <li><i class="far fa-check-circle"></i> <span data-i18n="plan2_f1">Standard
                                        Course</span></li>
                                <li><i class="far fa-check-circle"></i> <span data-i18n="plan2_f2">Regular Learning
                                        Checks</span></li>
                                <li><i class="far fa-check-circle"></i> <span data-i18n="plan2_f3">Limited Access
                                        Learning</span></li>
                                <li><i class="far fa-check-circle"></i> <span data-i18n="plan2_f4">Group
                                        Discussions</span></li>
                                <li><i class="far fa-check-circle"></i> <span data-i18n="plan2_f5">Email Support</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Professional -->
                    <div class="pricing-card reveal">
                        <div class="pricing-header">
                            <span class="plan-name" data-i18n="plan3_name">Professional</span>
                            <div class="plan-price">
                                <h2 class="price-val" data-monthly="$25" data-yearly="$19">$25</h2>
                                <span class="price-period">/month</span>
                            </div>
                            <p class="plan-desc" data-i18n="plan3_desc">Ideal For Growing Teams</p>
                            <a href="#" class="btn-pricing-dark" data-i18n="plan_cta2">JOIN NOW</a>
                        </div>
                        <div class="pricing-body">
                            <ul class="plan-features">
                                <li><i class="far fa-check-circle"></i> <span data-i18n="plan3_f1">Group Course</span>
                                </li>
                                <li><i class="far fa-check-circle"></i> <span data-i18n="plan3_f2">Peer Learning
                                        Checks</span></li>
                                <li><i class="far fa-check-circle"></i> <span data-i18n="plan3_f3">Hybrid
                                        Learning</span></li>
                                <li><i class="far fa-check-circle"></i> <span data-i18n="plan3_f4">Group
                                        Discussions</span></li>
                                <li><i class="far fa-check-circle"></i> <span data-i18n="plan3_f5">Expert
                                        Mentorship</span></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Enterprise -->
                    <div class="pricing-card reveal">
                        <div class="pricing-header">
                            <span class="plan-name" data-i18n="plan4_name">Enterprise</span>
                            <div class="plan-price">
                                <h2 class="price-val" data-monthly="$50" data-yearly="$38">$50</h2>
                                <span class="price-period">/month</span>
                            </div>
                            <p class="plan-desc" data-i18n="plan4_desc">Best For Large Organizations</p>
                            <a href="#" class="btn-pricing-dark" data-i18n="plan_cta3">SIGN UP TODAY</a>
                        </div>
                        <div class="pricing-body">
                            <ul class="plan-features">
                                <li><i class="far fa-check-circle"></i> <span data-i18n="plan4_f1">Custom Course</span>
                                </li>
                                <li><i class="far fa-check-circle"></i> <span data-i18n="plan4_f2">Advanced Learning
                                        Checks</span></li>
                                <li><i class="far fa-check-circle"></i> <span data-i18n="plan4_f3">Full Access
                                        Learning</span></li>
                                <li><i class="far fa-check-circle"></i> <span data-i18n="plan4_f4">Team
                                        Discussions</span></li>
                                <li><i class="far fa-check-circle"></i> <span data-i18n="plan4_f5">Dedicated
                                        Support</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 12. FAQ Section -->
        <section class="faq-section reveal" id="faq">
            <!-- Decorative Yellow Wavy -->
            <div class="decor-wavy-yellow">
                <svg viewBox="0 0 40 200" fill="none" stroke="#facc15" stroke-width="4">
                    <path d="M20,0 Q30,25 20,50 T20,100 T20,150 T20,200" />
                </svg>
            </div>

            <div class="container">
                <div class="faq-container">
                    <!-- Left Images -->
                    <div class="faq-images-left reveal reveal-left">
                        <div class="faq-img-card faq-img-1">
                            <img src="{{ secure_asset_v('assets/faq_student_2_1778408826051.png') }}"
                                alt="Student studying">
                        </div>
                        <div class="faq-img-card faq-img-2">
                            <img src="{{ secure_asset_v('assets/faq_student_1_1778408799723.png') }}"
                                alt="Student learning online">
                        </div>

                        <!-- Stats Badge -->
                        <div class="faq-stats-badge">
                            <div class="faq-user-avatars">
                                <img src="{{ secure_asset_v('assets/hero-student-1.png') }}" alt="User">
                                <img src="{{ secure_asset_v('assets/hero-student-2.png') }}" alt="User">
                                <img src="{{ secure_asset_v('assets/hero-student-1.png') }}" alt="User">
                            </div>
                            <div class="faq-stats-text">
                                <span>10K +</span>
                                <p data-i18n="faq_students">Active students</p>
                            </div>
                        </div>
                    </div>

                    <!-- Right Accordion -->
                    <div class="faq-content-right reveal reveal-right">
                        <div class="faq-label">
                            <i class="fas fa-book"></i>
                            <span data-i18n="faq_label">Faq's</span>
                        </div>
                        <h2 data-i18n="faq_title">Frequently Asked Have Any Questions?</h2>

                        <div class="faq-accordion">
                            <div class="faq-item active">
                                <div class="faq-header">
                                    <span data-i18n="faq1_q">What is online education learning?</span>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                                <div class="faq-body">
                                    <p data-i18n="faq1_a">Online education allows students to learn through digital
                                        platforms using the internet. It includes video lessons, live classes,
                                        assignments, and discussions — all accessible anytime, anywhere.</p>
                                </div>
                            </div>

                            <div class="faq-item">
                                <div class="faq-header">
                                    <span data-i18n="faq2_q">Do I need to attend classes at specific times?</span>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                                <div class="faq-body">
                                    <p data-i18n="faq2_a">We offer both synchronous live sessions and asynchronous
                                        recorded materials. You can choose the pace that fits your schedule best.</p>
                                </div>
                            </div>

                            <div class="faq-item">
                                <div class="faq-header">
                                    <span data-i18n="faq3_q">Are online courses recognized by employers?</span>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                                <div class="faq-body">
                                    <p data-i18n="faq3_a">Yes, our certificates are recognized across the industry, and
                                        we partner with top employers to ensure our curriculum meets market demands.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    @include('partials.scripts')
    <script src="{{ secure_asset_v('js/scroll3d.js') }}"></script>
    <script>
        function setPricing(period) {
            const btns = document.querySelectorAll('.pricing-toggle button');
            btns.forEach(btn => btn.classList.remove('active'));
            event.target.classList.add('active');

            const prices = document.querySelectorAll('.price-val');
            prices.forEach(price => {
                price.innerText = price.getAttribute('data-' + period);
            });

            const periods = document.querySelectorAll('.price-period');
            periods.forEach(p => {
                p.innerText = period === 'monthly' ? '/month' : '/year';
            });
        }
    </script>
</body>

</html>