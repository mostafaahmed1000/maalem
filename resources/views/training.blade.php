<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Educational Training Programs - Maalem Education</title>
    <link rel="stylesheet" href="{{ secure_asset_v('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .training-page {
            padding: 10rem 0 0;
            background-color: #f8fafc;
        }

        .training-hero {
            text-align: center;
            margin-bottom: 5rem;
        }

        .training-hero h1 {
            font-size: 3rem;
            font-weight: 800;
            color: var(--text-color);
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }

        .training-hero p {
            font-size: 1.2rem;
            color: var(--text-light);
            max-width: 800px;
            margin: 0 auto;
            line-height: 1.7;
        }

        .pathways-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2.5rem;
            margin-bottom: 6rem;
        }

        .pathway-card {
            background: #fff;
            border-radius: 40px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.05);
            display: flex;
            flex-direction: column;
            transition: all 0.3s ease;
            border: 1px solid #f1f5f9;
        }

        .pathway-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 30px 80px rgba(29, 99, 220, 0.1);
            border-color: var(--primary-light);
        }

        .pathway-img-wrap {
            position: relative;
            height: 240px;
            overflow: hidden;
        }

        .pathway-img {
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            transition: transform 0.5s ease;
        }

        .pathway-card:hover .pathway-img {
            transform: scale(1.08);
        }

        .pathway-content {
            padding: 2.5rem;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .pathway-badge {
            display: inline-block;
            align-self: flex-start;
            padding: 0.4rem 1rem;
            background: #eff6ff;
            color: var(--primary-color);
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 1.2rem;
        }

        .pathway-title {
            font-size: 1.6rem;
            font-weight: 800;
            color: var(--text-color);
            margin-bottom: 1rem;
            line-height: 1.3;
        }

        .pathway-desc {
            font-size: 0.95rem;
            color: var(--text-light);
            line-height: 1.6;
            margin-bottom: 1.8rem;
            flex-grow: 1;
        }

        .pathway-meta {
            display: flex;
            flex-direction: column;
            gap: 0.8rem;
            padding: 1.5rem;
            background: #f8fafc;
            border-radius: 20px;
            margin-bottom: 2rem;
        }

        .pathway-meta-item {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 0.9rem;
            color: var(--text-color);
            font-weight: 600;
        }

        .pathway-meta-item i {
            color: var(--primary-color);
            font-size: 1.1rem;
            width: 20px;
        }

        .pathway-meta-item span {
            color: var(--text-light);
            font-weight: 500;
            margin-right: 5px;
        }

        .btn-view-details {
            padding: 1.1rem;
            background: #f1f5f9;
            color: var(--text-color);
            border-radius: 15px;
            font-weight: 700;
            text-align: center;
            display: block;
            transition: all 0.3s ease;
        }

        .btn-view-details:hover {
            background: var(--primary-color);
            color: #fff;
        }

        /* MOOC spacing adjustments on dedicated page */
        .training-mooc-section {
            padding: 6rem 0;
            border-top: 1px solid #e2e8f0;
            border-bottom: 1px solid #e2e8f0;
            background: #fff;
        }

        /* Apply CTA Section */
        .apply-cta-section {
            padding: 5rem 0 1.5rem;
            text-align: center;
            background: radial-gradient(circle at top, #eff6ff 0%, #f8fafc 100%);
        }

        .apply-cta-card {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            padding: 4rem 3rem;
            border-radius: 40px;
            box-shadow: 0 25px 70px rgba(29, 99, 220, 0.08);
            border: 1px solid #e2e8f0;
        }

        .apply-cta-card h2 {
            font-size: 2.2rem;
            font-weight: 800;
            color: var(--text-color);
            margin-bottom: 1rem;
        }

        .apply-cta-card p {
            color: var(--text-light);
            font-size: 1.1rem;
            margin-bottom: 2.5rem;
            line-height: 1.6;
        }

        .btn-apply-now {
            padding: 1.5rem 3.5rem;
            background: var(--primary-color);
            color: #fff;
            border-radius: 18px;
            font-size: 1.2rem;
            font-weight: 800;
            display: inline-flex;
            align-items: center;
            gap: 12px;
            box-shadow: 0 15px 30px rgba(29, 99, 220, 0.25);
            transition: all 0.3s ease;
        }

        .btn-apply-now:hover {
            background: var(--primary-dark);
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(29, 99, 220, 0.35);
        }

        .btn-apply-now i {
            font-size: 1.1rem;
            transition: transform 0.3s ease;
        }

        .btn-apply-now:hover i {
            transform: translateX(5px);
        }

        /* Responsive Breakpoints */
        @media (max-width: 1024px) {
            .pathways-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 2rem;
            }
        }

        @media (max-width: 768px) {
            .training-page {
                padding: 7rem 0 0;
            }

            .training-hero {
                margin-bottom: 3.5rem;
                padding: 0 1rem;
            }

            .training-hero h1 {
                font-size: 2.2rem;
            }

            .training-hero p {
                font-size: 1rem;
            }

            .pathways-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
                padding: 0;
            }

            .pathway-card {
                border-radius: 30px;
            }

            .pathway-content {
                padding: 2rem;
            }

            .apply-cta-card {
                padding: 3rem 1.5rem;
                border-radius: 30px;
                margin: 0;
            }

            .apply-cta-card h2 {
                font-size: 1.8rem;
            }

            .apply-cta-card p {
                font-size: 1rem;
            }

            .btn-apply-now {
                width: 100%;
                justify-content: center;
                padding: 1.25rem 2rem;
                font-size: 1.1rem;
            }

            .apply-cta-section {
                padding: 3rem 0 1rem;
            }
        }

        @media (max-width: 480px) {
            .training-hero h1 {
                font-size: 1.8rem;
            }

            .pathway-img-wrap {
                height: 180px;
            }

            .pathway-content {
                padding: 1.5rem;
            }

            .pathway-title {
                font-size: 1.4rem;
            }

            .pathway-meta {
                padding: 1.2rem;
                border-radius: 15px;
            }
        }
    </style>
</head>

<body>
    @include('partials.header')

    <main class="training-page">
        <div class="container">
            <!-- Hero Section -->
            <div class="training-hero reveal">
                <h1>Professional Development Pathways</h1>
                <p>Equipping educators, school leaders, and operational staff with state-of-the-art strategies, credentials, and hands-on guidance to build premium learning systems.</p>
            </div>

            <!-- Pathways Grid -->
            <div class="pathways-grid">
                <!-- Pathway 1 -->
                <div class="pathway-card reveal">
                    <div class="pathway-img-wrap">
                        <div class="pathway-img" style="background-image: url('{{ secure_asset_v('assets/teaching_excellence_pathway_1778411860463.png') }}');"></div>
                    </div>
                    <div class="pathway-content">
                        <span class="pathway-badge">Pathway One</span>
                        <h3 class="pathway-title">Teaching Excellence</h3>
                        <p class="pathway-desc">A comprehensive 3-level certification program designed for classroom practitioners to enhance pedagogy, lesson planning, active learning methods, and AI integration.</p>
                        <div class="pathway-meta">
                            <div class="pathway-meta-item">
                                <i class="fas fa-layer-group"></i>
                                <span>Structure:</span> 3 Progressive Levels
                            </div>
                            <div class="pathway-meta-item">
                                <i class="far fa-clock"></i>
                                <span>Duration:</span> Up to 120 Hours
                            </div>
                            <div class="pathway-meta-item">
                                <i class="fas fa-certificate"></i>
                                <span>Outcome:</span> Professional Diploma
                            </div>
                        </div>
                        <a href="{{ url('/course-teaching') }}" class="btn-view-details">VIEW FULL DETAILS</a>
                    </div>
                </div>

                <!-- Pathway 2 -->
                <div class="pathway-card reveal">
                    <div class="pathway-img-wrap">
                        <div class="pathway-img" style="background-image: url('{{ secure_asset_v('assets/educational_leadership_pathway_1778411874245.png') }}');"></div>
                    </div>
                    <div class="pathway-content">
                        <span class="pathway-badge">Pathway Two</span>
                        <h3 class="pathway-title">Educational Leadership</h3>
                        <p class="pathway-desc">Empowering current and future school leaders with modules in compassionate leadership, strategic data usage, leveraging AI for school performance, and change management.</p>
                        <div class="pathway-meta">
                            <div class="pathway-meta-item">
                                <i class="fas fa-chess"></i>
                                <span>Structure:</span> Executive Program
                            </div>
                            <div class="pathway-meta-item">
                                <i class="far fa-calendar-alt"></i>
                                <span>Duration:</span> 12–15 Months
                            </div>
                            <div class="pathway-meta-item">
                                <i class="fas fa-award"></i>
                                <span>Outcome:</span> Executive Diploma
                            </div>
                        </div>
                        <a href="{{ url('/course-leadership') }}" class="btn-view-details">VIEW FULL DETAILS</a>
                    </div>
                </div>

                <!-- Pathway 3 -->
                <div class="pathway-card reveal">
                    <div class="pathway-img-wrap">
                        <div class="pathway-img" style="background-image: url('{{ secure_asset_v('assets/school_operations_pathway_1778411887223.png') }}');"></div>
                    </div>
                    <div class="pathway-content">
                        <span class="pathway-badge">Pathway Three</span>
                        <h3 class="pathway-title">School Operations</h3>
                        <p class="pathway-desc">Targeted professional tracks for HR, Finance, Student Affairs, and Marketing. Designed specifically for operational staff looking to run highly efficient school systems.</p>
                        <div class="pathway-meta">
                            <div class="pathway-meta-item">
                                <i class="fas fa-sitemap"></i>
                                <span>Structure:</span> 4 Focused Tracks
                            </div>
                            <div class="pathway-meta-item">
                                <i class="fas fa-tools"></i>
                                <span>Method:</span> Project-Based
                            </div>
                            <div class="pathway-meta-item">
                                <i class="fas fa-users-cog"></i>
                                <span>Outcome:</span> Operational Certificate
                            </div>
                        </div>
                        <a href="{{ url('/course-operations') }}" class="btn-view-details">VIEW FULL DETAILS</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- MOOC Integration Model Section -->
        <section class="mooc-section training-mooc-section" id="mooc">
            <div class="container mooc-container">
                <div class="mooc-content reveal">
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

                <div class="mooc-visual reveal">
                    <img src="{{ secure_asset_v('assets/mooc_integration_visual_1778412150376.png') }}" alt="MOOC Integration">
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="apply-cta-section">
            <div class="container">
                <div class="apply-cta-card reveal">
                    <h2>Ready to Advance Your Career?</h2>
                    <p>Apply for individual admission or register your school for bulk organization enrollment today. Let's build better learning systems together.</p>
                    <a href="{{ url('/training/apply') }}" class="btn-apply-now">
                        <span>Get Certified Now</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </section>
    </main>

    @include('partials.footer')
    @include('partials.scripts')
</body>

</html>
