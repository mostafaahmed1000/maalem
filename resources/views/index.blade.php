<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maalem Education - Empower Your Future</title>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <!-- Floating Decor Shapes -->
    <div class="floating-decor shape-1"><svg viewBox="0 0 100 100" fill="currentColor"><circle cx="50" cy="50" r="40"/></svg></div>
    <div class="floating-decor shape-2"><svg viewBox="0 0 100 100" fill="currentColor"><rect x="20" y="20" width="60" height="60" rx="10"/></svg></div>
    <div class="floating-decor shape-3"><svg viewBox="0 0 100 100" fill="currentColor"><path d="M50 10 L90 90 L10 90 Z"/></svg></div>
    <div class="floating-decor shape-4"><svg viewBox="0 0 100 100" fill="currentColor"><path d="M30 50 L70 50 M50 30 L50 70" stroke="currentColor" stroke-width="15" stroke-linecap="round"/></svg></div>
    <div class="floating-decor shape-5"><svg viewBox="0 0 100 100" fill="currentColor"><circle cx="50" cy="50" r="30" stroke="currentColor" stroke-width="8" fill="none"/></svg></div>
    <div class="floating-decor shape-6"><svg viewBox="0 0 100 100" fill="currentColor"><rect x="30" y="30" width="40" height="40" rotate="45" fill="currentColor" opacity="0.5"/></svg></div>
    
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
                    <img src="{{ secure_asset_v('identity/Logo/PNG/Blue.png') }}" alt="Maalem Logo" class="hero-main-logo">
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
                            <p data-i18n="hero_desc_1">Comprehensive management models that drive 300%+ growth and academic excellence through strategic governance.</p>
                            <a href="{{ url('/partnerships') }}" class="btn btn-white btn-lg" data-i18n="hero_cta1">Enquire Now <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Slide 2: Consulting -->
                <div class="hero-slide">
                    <div class="hero-left">
                        <div class="hero-content-boxed reveal reveal-left active">
                            <div class="rotating-circle"></div>
                            <h1 data-i18n="hero_title_2">Strategic <span>Educational Consulting</span></h1>
                            <p data-i18n="hero_desc_2">Partnering with schools to achieve international accreditation, strategic planning, and sustainable institutional success.</p>
                            <a href="{{ url('/consultation') }}" class="btn btn-white btn-lg" data-i18n="hero_cta2">Consult With Us <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Slide 3: Teacher Training -->
                <div class="hero-slide">
                    <div class="hero-left">
                        <div class="hero-content-boxed reveal reveal-left active">
                            <div class="rotating-circle"></div>
                            <h1 data-i18n="hero_title_3">Expert <span>Teacher Training</span></h1>
                            <p data-i18n="hero_desc_3">Empowering educators with four-pathway diploma programs designed for the next generation of teaching excellence.</p>
                            <a href="{{ url('/training') }}" class="btn btn-white btn-lg" data-i18n="hero_cta3">Get Certified <i class="fas fa-arrow-right"></i></a>
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
                        <div class="img-back" style="background-image: url('{{ secure_asset_v('assets/Mision-1.jpeg') }}');"></div>
                        <div class="img-front" style="background-image: url('{{ secure_asset_v('assets/Mission-2.jpeg') }}');"></div>
                        <div class="dotted-pattern"></div>
                    </div>
                </div>
                <div class="vision-right reveal reveal-right">
                    <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
                        <i class="fas fa-book-open" style="color: var(--primary-color); font-size: 1.2rem;"></i>
                        <span data-i18n="vision_subtitle" style="font-weight: 700; color: var(--primary-color); text-transform: uppercase; letter-spacing: 1px;">Get To Know About Us</span>
                    </div>
                    <h2 data-i18n="vision_title" style="font-size: 2.5rem; font-weight: 800; line-height: 1.2; margin-bottom: 1.5rem;">Benefit From Our Educational Expertise</h2>
                    <p data-i18n="vision_desc" style="color: var(--text-light); margin-bottom: 2rem;">Maalem Education Services is dedicated to transforming education through strategic operations, continuous professional development, and global accreditation support.</p>
                    
                    <div class="mission-vision-grid" style="margin-bottom: 2.5rem;">
                        <div class="mv-item">
                            <h3 data-i18n="mission_h" style="font-size: 1.2rem; margin-bottom: 0.5rem; text-transform: uppercase;">Our Mission:</h3>
                            <p data-i18n="mission_p" style="color: var(--text-light); font-size: 0.95rem; line-height: 1.6;">We partner with schools to design and implement sustainable models of academic excellence, leadership growth, and operational efficiency.</p>
                        </div>
                        <div class="mv-item">
                            <h3 data-i18n="vision_h" style="font-size: 1.2rem; margin-bottom: 0.5rem; text-transform: uppercase;">Our Vision:</h3>
                            <p data-i18n="vision_p" style="color: var(--text-light); font-size: 0.95rem; line-height: 1.6;">To be a leading educational services provider that empowers schools and educators to achieve international standards.</p>
                        </div>
                    </div>

                    <a href="{{ url('/about') }}" class="btn btn-primary btn-lg" data-i18n="vision_cta">Learn More About Us <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </section>

        <!-- 3. Why Maalem Education (Services) -->
        <section class="merged-services-section" id="services" style="background: #fff; padding-top: 4rem;">
            <div class="container">
                <div class="merged-services-header reveal" style="margin-bottom: 5rem;">
                    <span class="badge"><i class="fas fa-school-flag" style="margin-right: 8px;"></i> <span data-i18n="why_subtitle">Why Maalem Education</span></span>
                    <h2 data-i18n="why_title">Maalem is not only an <span>operator</span></h2>
                    <p data-i18n="why_desc">It is a complete <strong>education ecosystem</strong> that empowers schools and educators to achieve excellence.</p>
                </div>
                <div class="services-grid">
                    <div class="service-card-new reveal">
                        <div class="service-img-new" style="background-image: url('{{ secure_asset_v('assets/services/school_operation.png') }}');"></div>
                        <div class="service-icon-new"><i class="fas fa-school-flag"></i></div>
                        <h3 data-i18n="service1_h">Running & Operating Schools</h3>
                        <ul>
                            <li><i class="fas fa-check"></i> <span data-i18n="service1_f1">Full academic & operational management</span></li>
                            <li><i class="fas fa-check"></i> <span data-i18n="service1_f2">Governance & quality assurance</span></li>
                            <li><i class="fas fa-check"></i> <span data-i18n="service1_f4">300%+ growth success rate</span></li>
                        </ul>
                        <a href="{{ url('/partnerships') }}" class="btn-service-new">Enquire Now <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div class="service-card-new reveal">
                        <div class="service-img-new" style="background-image: url('{{ secure_asset_v('assets/services/educational_consulting.png') }}');"></div>
                        <div class="service-icon-new"><i class="fas fa-chess"></i></div>
                        <h3 data-i18n="service2_h">Educational Consulting</h3>
                        <ul>
                            <li><i class="fas fa-check"></i> <span data-i18n="service2_f1">Setup & strategic planning</span></li>
                            <li><i class="fas fa-check"></i> <span data-i18n="service2_f3">Accreditation readiness</span></li>
                            <li><i class="fas fa-check"></i> <span data-i18n="service2_f6">Growth marketing strategies</span></li>
                        </ul>
                        <a href="{{ url('/consultation') }}" class="btn-service-new">Consult With Us <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div class="service-card-new reveal">
                        <div class="service-img-new" style="background-image: url('{{ secure_asset_v('assets/services/teacher_training.png') }}');"></div>
                        <div class="service-icon-new"><i class="fas fa-certificate"></i></div>
                        <h3 data-i18n="service3_h">Teacher Training Diploma</h3>
                        <ul>
                            <li><i class="fas fa-check"></i> <span data-i18n="service3_f1">Structured diploma program</span></li>
                            <li><i class="fas fa-check"></i> <span data-i18n="service3_f2">Four development pathways</span></li>
                            <li><i class="fas fa-check"></i> <span data-i18n="service3_f3">Practical, applied training</span></li>
                        </ul>
                        <a href="{{ url('/training') }}" class="btn-service-new">Get Certified <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </section>

        <!-- 4. Featured Courses -->
        <section id="courses" class="section bg-alt reveal reveal-right" style="padding: 6rem 0;">
            <div class="container">
                <div class="section-title reveal" style="text-align: center; margin-bottom: 4rem;">
                    <div style="display: flex; justify-content: center; align-items: center; gap: 10px; margin-bottom: 10px;">
                        <i class="fas fa-book-open" style="color: var(--primary-color); font-size: 1.2rem;"></i>
                        <span data-i18n="courses_subtitle" style="font-weight: 700; color: var(--primary-color); text-transform: uppercase; letter-spacing: 1px;">Our Courses</span>
                    </div>
                    <h2 data-i18n="courses_title" style="font-size: 2.5rem; font-weight: 700;">Our Featured Courses</h2>
                </div>
                <div class="course-carousel-wrapper reveal">
                    <div class="course-carousel" id="courseCarousel">
                        <div class="new-course-card">
                            <div class="course-img-wrap">
                                <div class="course-img" style="background-image: url('{{ secure_asset_v('assets/teaching_excellence_pathway_1778411860463.png') }}');"></div>
                            </div>
                            <div class="course-content">
                                <h3 data-i18n="course1_name">Pathway One: Teaching Excellence</h3>
                                <p data-i18n="course1_desc" style="color: var(--text-light); font-size: 0.95rem; margin-bottom: 1.5rem;">A 3-level comprehensive certification for classroom practitioners.</p>
                                <div class="course-stats">
                                    <div class="stat-box"><i class="far fa-clock"></i><div><span class="stat-label">Duration:</span><span class="stat-val">Up to 120 Hrs</span></div></div>
                                    <div class="stat-divider"></div>
                                    <div class="stat-box"><i class="fas fa-layer-group"></i><div><span class="stat-label">Levels:</span><span class="stat-val">3 Levels</span></div></div>
                                </div>
                                <div class="course-footer">
                                    <div class="instructor"><i class="fas fa-user-graduate" style="color: var(--primary-color);"></i><span>Certified Program</span></div>
                                    <a href="{{ url('/course-teaching') }}" class="view-details">VIEW DETAILS <i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="new-course-card">
                            <div class="course-img-wrap">
                                <div class="course-img" style="background-image: url('{{ secure_asset_v('assets/educational_leadership_pathway_1778411874245.png') }}');"></div>
                            </div>
                            <div class="course-content">
                                <h3 data-i18n="course2_name">Pathway Two: Educational Leadership</h3>
                                <p data-i18n="course2_desc" style="color: var(--text-light); font-size: 0.95rem; margin-bottom: 1.5rem;">Empowering current and future school leaders with strategic skills.</p>
                                <div class="course-stats">
                                    <div class="stat-box"><i class="far fa-calendar-alt"></i><div><span class="stat-label">Duration:</span><span class="stat-val">12–15 Months</span></div></div>
                                    <div class="stat-divider"></div>
                                    <div class="stat-box"><i class="fas fa-certificate"></i><div><span class="stat-label">Total:</span><span class="stat-val">300 Hours</span></div></div>
                                </div>
                                <div class="course-footer">
                                    <div class="instructor"><i class="fas fa-award" style="color: var(--primary-color);"></i><span>Capstone Project</span></div>
                                    <a href="{{ url('/course-leadership') }}" class="view-details">VIEW DETAILS <i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="new-course-card">
                            <div class="course-img-wrap">
                                <div class="course-img" style="background-image: url('{{ secure_asset_v('assets/school_operations_pathway_1778411887223.png') }}');"></div>
                            </div>
                            <div class="course-content">
                                <h3 data-i18n="course3_name">Pathway Three: School Operations</h3>
                                <p data-i18n="course3_desc" style="color: var(--text-light); font-size: 0.95rem; margin-bottom: 1.5rem;">Targeted professional tracks for HR, Finance, and Marketing.</p>
                                <div class="course-stats">
                                    <div class="stat-box"><i class="fas fa-sitemap"></i><div><span class="stat-label">Focus:</span><span class="stat-val">4 Core Tracks</span></div></div>
                                    <div class="stat-divider"></div>
                                    <div class="stat-box"><i class="fas fa-tools"></i><div><span class="stat-label">Applied:</span><span class="stat-val">Project Based</span></div></div>
                                </div>
                                <div class="course-footer">
                                    <div class="instructor"><i class="fas fa-users-cog" style="color: var(--primary-color);"></i><span>Expert Led</span></div>
                                    <a href="{{ url('/course-operations') }}" class="view-details">VIEW DETAILS <i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 9. MOOC Section -->
        <section class="mooc-section" id="mooc">
            <div class="container mooc-container" style="display: flex; align-items: center; gap: 5rem;">
                <div class="mooc-content reveal" style="flex: 1.2;">
                    <div class="mooc-header">
                        <span data-i18n="mooc_subtitle">Strategic Innovation Component</span>
                        <h2 data-i18n="mooc_title">MOOC Integration Model</h2>
                        <p data-i18n="mooc_desc">As part of the strategic educational development model, MAALEM integrates facilitated MOOC (Massive Open Online Course) study groups to enhance technology and AI learning tracks while maintaining cost efficiency and international exposure.</p>
                    </div>
                    
                    <div class="mooc-list">
                        <div class="mooc-item">
                            <i class="fas fa-check-circle"></i>
                            <span data-i18n="mooc_item1">Curated Coursera / EdX courses aligned with diploma modules</span>
                        </div>
                        <div class="mooc-item">
                            <i class="fas fa-check-circle"></i>
                            <span data-i18n="mooc_item2">Facilitated study groups with structured discussion</span>
                        </div>
                        <div class="mooc-item">
                            <i class="fas fa-check-circle"></i>
                            <span data-i18n="mooc_item3">Arabic-language academic support for complex content</span>
                        </div>
                        <div class="mooc-item">
                            <i class="fas fa-check-circle"></i>
                            <span data-i18n="mooc_item4">Assignment guidance and accountability systems</span>
                        </div>
                        <div class="mooc-item">
                            <i class="fas fa-check-circle"></i>
                            <span data-i18n="mooc_item5">Optional international certification (approx. $45 per course)</span>
                        </div>
                    </div>

                    <p class="mooc-footer-text" data-i18n="mooc_footer">
                        This approach reduces content development costs, increases global benchmarking exposure, and strengthens accreditation alignment with international CPD standards.
                    </p>
                </div>

                <div class="mooc-visual reveal" style="flex: 0.8;">
                    <img src="{{ secure_asset_v('assets/mooc_integration_visual_1778412150376.png') }}" alt="MOOC Integration">
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
                        <span class="badge" style="color: #1d63dc; font-weight: 700;"><i class="fas fa-briefcase" style="margin-right: 8px;"></i> <span data-i18n="careers_subtitle">Join Our Team</span></span>
                        <h2 data-i18n="careers_title" style="font-size: 3rem; font-weight: 800; margin-bottom: 1.5rem;">Shape the Future of Education With Us</h2>
                        <p data-i18n="careers_desc" style="max-width: 800px; margin: 0 auto 3rem; font-size: 1.2rem; color: var(--text-light);">We are always looking for passionate educators, consultants, and leaders to join our global network.</p>
                        <a href="{{ route('careers.index') }}" class="btn btn-primary btn-lg" style="padding: 1.2rem 3rem; border-radius: 50px; font-weight: 800;">VIEW OPEN POSITIONS <i class="fas fa-arrow-right"></i></a>
                    </div>
                    </div>
                    
                    
                </div>
            </div>
        </section>

        <!-- 6. Identity Section -->
        <section class="merged-services-section" id="ecosystem" style="background: #f8fafc; padding-bottom: 2rem;">
            <div class="container">
                <div class="merged-services-header reveal">
                    <span class="badge"><i class="fas fa-fingerprint" style="margin-right: 8px;"></i> <span data-i18n="who_subtitle">Our Identity</span></span>
                    <h2 data-i18n="who_title">Who We Are</h2>
                </div>
                <div class="identity-grid">
                    <div class="hex-card-wrapper reveal">
                        <div class="hex-card bg-blue">
                            <div class="hex-img"><i class="fas fa-school"></i></div>
                            <h3 data-i18n="who_step1_h">School operator</h3>
                            <p data-i18n="who_step1_p">Not only consultancy – we take active leadership in school operations.</p>
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

        <!-- 7. Core Values -->
        <section class="section category-section reveal reveal-right" style="padding: 6rem 0; background-color: var(--bg-alt);">
            <div class="container" style="margin-top: 8rem;">
                <div class="category-header reveal" style="text-align: center; margin-bottom: 4rem;">
                    <div style="display: flex; justify-content: center; align-items: center; gap: 10px; margin-bottom: 10px;">
                        <i class="fas fa-star" style="color: var(--primary-color); font-size: 1.2rem;"></i>
                        <span data-i18n="values_subtitle" style="font-weight: 700; color: var(--primary-color); text-transform: uppercase; letter-spacing: 1px;">Our Principles</span>
                    </div>
                    <h2 data-i18n="values_title" style="font-size: 2.5rem; font-weight: 700;">Core Values</h2>
                </div>
                <div class="category-carousel-wrapper reveal">
                    <button class="cat-nav-btn prev" id="catPrev"><i class="fas fa-arrow-left"></i></button>
                    <div class="category-carousel" id="catCarousel">
                        <div class="cat-card"><div class="cat-icon"><i class="fas fa-medal"></i></div><h3 data-i18n="val1_h">Excellence</h3><p>We commit to the highest standards.</p></div>
                        <div class="cat-card"><div class="cat-icon"><i class="fas fa-lightbulb"></i></div><h3 data-i18n="val2_h">Innovation</h3><p>We embrace modern methodologies.</p></div>
                        <div class="cat-card"><div class="cat-icon"><i class="fas fa-shield-alt"></i></div><h3 data-i18n="val3_h">Integrity</h3><p>We uphold transparency and ethics.</p></div>
                        <div class="cat-card"><div class="cat-icon"><i class="fas fa-hands-helping"></i></div><h3 data-i18n="val4_h">Collaboration</h3><p>We work hand-in-hand with leaders.</p></div>
                        <div class="cat-card"><div class="cat-icon"><i class="fas fa-users"></i></div><h3 data-i18n="val5_h">Inclusivity</h3><p>We ensure equitable experiences.</p></div>
                    </div>
                    <button class="cat-nav-btn next" id="catNext"><i class="fas fa-arrow-right"></i></button>
                </div>
            </div>
        </section>


        <!-- 10. Our Instructors -->
        <section id="instructors" class="section bg-white reveal" style="padding: 6rem 0;">
            <div class="container">
                <div class="section-title reveal" style="text-align: center; margin-bottom: 4rem;">
                    <div style="display: flex; justify-content: center; align-items: center; gap: 10px; margin-bottom: 10px;">
                        <i class="fas fa-chalkboard-teacher" style="color: var(--primary-color); font-size: 1.2rem;"></i>
                        <span data-i18n="instructors_subtitle" style="font-weight: 700; color: var(--primary-color); text-transform: uppercase; letter-spacing: 1px;">Our Experts</span>
                    </div>
                    <h2 data-i18n="instructors_title" style="font-size: 2.5rem; font-weight: 700;">Our Instructors</h2>
                </div>
                
                <div class="instructors-grid">
                    @forelse($instructors as $instructor)
                        <div class="instructor-card-premium reveal">
                            <div class="instructor-img-box">
                                @if($instructor->image)
                                    <img src="{{ secure_asset_v('storage/' . $instructor->image) }}" alt="{{ $instructor->name }}">
                                @else
                                    <img src="{{ secure_asset_v('identity/Logo/PNG/Blue.png') }}" alt="Maalem Logo" class="placeholder-logo">
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
                        <p style="text-align: center; width: 100%; color: var(--text-light);">Stay tuned! Our expert instructors will be listed here soon.</p>
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
                        <div class="teacher-avatar-new" style="background-image: url('{{ secure_asset_v('identity/Logo/SVG/Blue.svg') }}');"></div>
                        <h3 data-i18n="mentor1_name">Dr. Dina El Odessy</h3>
                        <span class="role" data-i18n="mentor1_role">Educational Director</span>
                    </a>

                    <!-- Teacher 2 -->
                    <a href="{{ url('/mentor-details?id=omar') }}" class="teacher-card-new reveal">
                        <div class="teacher-avatar-new" style="background-image: url('{{ secure_asset_v('identity/Logo/SVG/Blue.svg') }}');"></div>
                        <h3 data-i18n="mentor2_name">Eng. Omar El Odessy</h3>
                        <span class="role" data-i18n="mentor2_role">Chairman of the Board</span>
                    </a>

                    <!-- Teacher 3 -->
                    <a href="{{ url('/mentor-details?id=karim') }}" class="teacher-card-new reveal">
                        <div class="teacher-avatar-new" style="background-image: url('{{ secure_asset_v('identity/Logo/SVG/Blue.svg') }}');"></div>
                        <h3 data-i18n="mentor3_name">Mr. Karim El Sarnagawi</h3>
                        <span class="role" data-i18n="mentor3_role">CEO of Pyramakerz</span>
                    </a>

                    <!-- Teacher 4 -->
                    <a href="{{ url('/mentor-details?id=nourhan') }}" class="teacher-card-new reveal">
                        <div class="teacher-avatar-new" style="background-image: url('{{ secure_asset_v('identity/Logo/SVG/Blue.svg') }}');"></div>
                        <h3 data-i18n="mentor4_name">Mrs. Nourhan Soudan</h3>
                        <span class="role" data-i18n="mentor4_role">CEO of LOIS Company</span>
                    </a>

                    <!-- Teacher 5 -->
                    <a href="{{ url('/mentor-details?id=magie') }}" class="teacher-card-new reveal">
                        <div class="teacher-avatar-new" style="background-image: url('{{ secure_asset_v('identity/Logo/SVG/Blue.svg') }}');"></div>
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
                    <div style="display: flex; justify-content: center; align-items: center; gap: 10px; margin-bottom: 10px;">
                        <i class="fas fa-book" style="color: var(--primary-color); font-size: 1.2rem;"></i>
                        <span data-i18n="pricing_badge" style="font-weight: 700; color: var(--primary-color); text-transform: uppercase; letter-spacing: 1px;">Pricing Plans</span>
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
                                <li><i class="far fa-check-circle"></i> <span data-i18n="plan1_f1">Individual Course</span></li>
                                <li><i class="far fa-check-circle"></i> <span data-i18n="plan1_f2">Course Learning Checks</span></li>
                                <li><i class="far fa-check-circle"></i> <span data-i18n="plan1_f3">Offline Learning</span></li>
                                <li><i class="far fa-check-circle"></i> <span data-i18n="plan1_f4">Course Discussions</span></li>
                                <li><i class="far fa-check-circle"></i> <span data-i18n="plan1_f5">One to One Guidance</span></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Pro -->
                    <div class="pricing-card reveal">
                        <div class="pricing-header">
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
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
                                <li><i class="far fa-check-circle"></i> <span data-i18n="plan2_f1">Standard Course</span></li>
                                <li><i class="far fa-check-circle"></i> <span data-i18n="plan2_f2">Regular Learning Checks</span></li>
                                <li><i class="far fa-check-circle"></i> <span data-i18n="plan2_f3">Limited Access Learning</span></li>
                                <li><i class="far fa-check-circle"></i> <span data-i18n="plan2_f4">Group Discussions</span></li>
                                <li><i class="far fa-check-circle"></i> <span data-i18n="plan2_f5">Email Support</span></li>
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
                                <li><i class="far fa-check-circle"></i> <span data-i18n="plan3_f1">Group Course</span></li>
                                <li><i class="far fa-check-circle"></i> <span data-i18n="plan3_f2">Peer Learning Checks</span></li>
                                <li><i class="far fa-check-circle"></i> <span data-i18n="plan3_f3">Hybrid Learning</span></li>
                                <li><i class="far fa-check-circle"></i> <span data-i18n="plan3_f4">Group Discussions</span></li>
                                <li><i class="far fa-check-circle"></i> <span data-i18n="plan3_f5">Expert Mentorship</span></li>
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
                                <li><i class="far fa-check-circle"></i> <span data-i18n="plan4_f1">Custom Course</span></li>
                                <li><i class="far fa-check-circle"></i> <span data-i18n="plan4_f2">Advanced Learning Checks</span></li>
                                <li><i class="far fa-check-circle"></i> <span data-i18n="plan4_f3">Full Access Learning</span></li>
                                <li><i class="far fa-check-circle"></i> <span data-i18n="plan4_f4">Team Discussions</span></li>
                                <li><i class="far fa-check-circle"></i> <span data-i18n="plan4_f5">Dedicated Support</span></li>
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
                            <img src="{{ secure_asset_v('assets/faq_student_2_1778408826051.png') }}" alt="Student studying">
                        </div>
                        <div class="faq-img-card faq-img-2">
                            <img src="{{ secure_asset_v('assets/faq_student_1_1778408799723.png') }}" alt="Student learning online">
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
                                    <p data-i18n="faq1_a">Online education allows students to learn through digital platforms using the internet. It includes video lessons, live classes, assignments, and discussions — all accessible anytime, anywhere.</p>
                                </div>
                            </div>

                            <div class="faq-item">
                                <div class="faq-header">
                                    <span data-i18n="faq2_q">Do I need to attend classes at specific times?</span>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                                <div class="faq-body">
                                    <p data-i18n="faq2_a">We offer both synchronous live sessions and asynchronous recorded materials. You can choose the pace that fits your schedule best.</p>
                                </div>
                            </div>

                            <div class="faq-item">
                                <div class="faq-header">
                                    <span data-i18n="faq3_q">Are online courses recognized by employers?</span>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                                <div class="faq-body">
                                    <p data-i18n="faq3_a">Yes, our certificates are recognized across the industry, and we partner with top employers to ensure our curriculum meets market demands.</p>
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

