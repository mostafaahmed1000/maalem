<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Running & Operating Schools - Maalem Education</title>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .partnerships-page {
            padding: 10rem 0 6rem;
            background-color: #f8fafc;
            color: var(--text-color);
            position: relative;
            overflow: hidden;
        }
        .section-header {
            text-align: center;
            max-width: 850px;
            margin: 0 auto 5rem;
            padding: 0 1rem;
        }
        .section-header p {
            color: var(--primary-color);
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 1rem;
        }
        .section-header h1 {
            font-size: clamp(2.2rem, 5vw, 3.5rem);
            font-weight: 800;
            line-height: 1.15;
            margin-bottom: 1.5rem;
        }
        .section-header .subtitle {
            font-size: clamp(1.1rem, 2vw, 1.3rem);
            color: var(--text-light);
            line-height: 1.6;
            text-shadow: none;
        }
        .info-grid {
            display: flex;
            flex-direction: column;
            gap: 4rem;
        }
        .info-card {
            background: #fff;
            border-radius: 30px;
            padding: 3.5rem;
            box-shadow: var(--shadow);
            border: 1px solid #f1f5f9;
            position: relative;
            z-index: 2;
        }
        .card-title {
            font-size: clamp(1.6rem, 3vw, 2.2rem);
            font-weight: 800;
            margin-bottom: 2.5rem;
            color: var(--primary-color);
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .card-title i {
            background: rgba(29, 99, 220, 0.08);
            padding: 15px;
            border-radius: 20px;
            font-size: 1.5rem;
        }
        /* Pillars Grid */
        .pillars-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            margin-bottom: 3.5rem;
        }
        .pillar-card {
            background: #f8fafc;
            border-radius: 20px;
            padding: 2.2rem;
            border-left: 5px solid var(--primary-color);
            transition: var(--transition);
        }
        [dir="rtl"] .pillar-card {
            border-left: none;
            border-right: 5px solid var(--primary-color);
        }
        .pillar-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.03);
            background: #fff;
            border-left-color: var(--primary-light);
        }
        [dir="rtl"] .pillar-card:hover {
            border-right-color: var(--primary-light);
        }
        .pillar-card h3 {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 0.8rem;
        }
        .pillar-card p {
            color: var(--text-light);
            font-size: 0.95rem;
            line-height: 1.6;
            margin: 0;
        }
        /* Quote Box */
        .quote-box {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            border-radius: 25px;
            padding: 3rem;
            color: #fff;
            position: relative;
            overflow: hidden;
            box-shadow: 0 15px 30px rgba(29, 99, 220, 0.15);
        }
        .quote-box::after {
            content: '\f10d';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            position: absolute;
            bottom: -20px;
            right: 20px;
            font-size: 10rem;
            opacity: 0.08;
        }
        [dir="rtl"] .quote-box::after {
            right: auto;
            left: 20px;
            content: '\f10e';
        }
        .quote-box p {
            font-size: clamp(1.1rem, 2vw, 1.4rem);
            line-height: 1.8;
            font-weight: 500;
            margin: 0;
            position: relative;
            z-index: 2;
        }
        /* Curriculum Grid */
        .curriculum-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 2rem;
        }
        .curr-card {
            background: #f8fafc;
            border-radius: 20px;
            padding: 2.5rem;
            transition: var(--transition);
            border: 1px solid transparent;
            display: flex;
            flex-direction: column;
        }
        .curr-card:hover {
            transform: translateY(-5px);
            background: #fff;
            border-color: #e2e8f0;
            box-shadow: 0 15px 30px rgba(0,0,0,0.02);
        }
        .curr-icon {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 1.5rem;
        }
        .curr-card h3 {
            font-size: 1.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
        }
        .curr-card p {
            color: var(--text-light);
            line-height: 1.7;
            font-size: 0.95rem;
            margin-bottom: 1.5rem;
            flex-grow: 1;
        }
        .curr-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .curr-list li {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 0.8rem;
            font-size: 0.95rem;
            color: var(--text-color);
        }
        .curr-list li i {
            color: #22c55e;
        }
        /* Two Column Grid */
        .two-col-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 2.5rem;
        }
        .bullet-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .bullet-list li {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            padding: 1.2rem;
            background: #f8fafc;
            border-radius: 15px;
            margin-bottom: 1rem;
            transition: var(--transition);
        }
        .bullet-list li:hover {
            background: #eff6ff;
            transform: translateX(10px);
        }
        [dir="rtl"] .bullet-list li:hover {
            transform: translateX(-10px);
        }
        .bullet-list li i {
            color: var(--primary-color);
            margin-top: 4px;
            font-size: 1.1rem;
        }
        .bullet-list li div h4 {
            font-size: 1.15rem;
            font-weight: 700;
            margin: 0 0 0.3rem;
        }
        .bullet-list li div p {
            font-size: 0.9rem;
            color: var(--text-light);
            margin: 0;
            line-height: 1.5;
        }
        /* CTA Section */
        .cta-section {
            background: linear-gradient(135deg, #0f172a, #1e1b4b);
            border-radius: 40px;
            padding: 5rem 2rem;
            text-align: center;
            color: #fff;
            margin-top: 5rem;
            position: relative;
            overflow: hidden;
            box-shadow: 0 30px 60px rgba(15, 23, 42, 0.2);
            z-index: 2;
        }
        .cta-section h2 {
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 800;
            margin-bottom: 1.5rem;
        }
        .cta-section p {
            font-size: clamp(1.05rem, 2vw, 1.25rem);
            color: rgba(255,255,255,0.7);
            max-width: 650px;
            margin: 0 auto 3rem;
            line-height: 1.6;
        }
        .btn-cta {
            display: inline-block;
            background: var(--primary-color);
            color: #fff;
            padding: 1.2rem 3.5rem;
            border-radius: 50px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: 0 10px 20px rgba(29, 99, 220, 0.3);
            transition: var(--transition);
            text-decoration: none;
        }
        .btn-cta:hover {
            background: var(--primary-light);
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(29, 99, 220, 0.4);
            color: #fff;
        }

        /* Responsive adjustments */
        @media (max-width: 992px) {
            .partnerships-page {
                padding: 8rem 0 4rem;
            }
            .section-header {
                margin-bottom: 3.5rem;
            }
            .info-grid {
                gap: 2.5rem;
            }
            .info-card {
                padding: 2.5rem;
                border-radius: 24px;
            }
            .pillars-grid {
                margin-bottom: 2.5rem;
                gap: 1.5rem;
            }
            .curriculum-grid {
                gap: 1.5rem;
            }
            .cta-section {
                padding: 4rem 2rem;
                margin-top: 3.5rem;
                border-radius: 30px;
            }
        }

        @media (max-width: 768px) {
            .two-col-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
            .curriculum-grid {
                grid-template-columns: 1fr;
            }
            .info-card {
                padding: 2rem;
            }
            .quote-box {
                padding: 2rem;
            }
            .curr-card {
                padding: 2rem;
            }
        }

        @media (max-width: 576px) {
            .partnerships-page {
                padding: 7rem 0 3rem;
            }
            .section-header {
                margin-bottom: 2.5rem;
            }
            .section-header h1 {
                margin-bottom: 1rem;
            }
            .info-card {
                padding: 1.5rem;
                border-radius: 20px;
            }
            .card-title {
                margin-bottom: 1.5rem;
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
            .card-title i {
                padding: 12px;
                font-size: 1.25rem;
                border-radius: 12px;
            }
            .pillars-grid {
                grid-template-columns: 1fr;
                gap: 1rem;
                margin-bottom: 2rem;
            }
            .pillar-card {
                padding: 1.5rem;
            }
            .curriculum-grid {
                grid-template-columns: 1fr;
                gap: 1rem;
            }
            .curr-card {
                padding: 1.5rem;
                border-radius: 15px;
            }
            .quote-box {
                padding: 1.5rem;
                border-radius: 15px;
            }
            .bullet-list li {
                padding: 1rem;
                gap: 10px;
            }
            .cta-section {
                padding: 3rem 1.5rem;
                border-radius: 20px;
                margin-top: 2.5rem;
            }
            .cta-section h2 {
                margin-bottom: 1rem;
            }
            .cta-section p {
                margin-bottom: 2rem;
            }
            .btn-cta {
                padding: 1rem 2rem;
                width: 100%;
                box-sizing: border-box;
            }
        }
    </style>
</head>
<body>
    <!-- Floating Decor Shapes -->
    <div class="floating-decor shape-1"><svg viewBox="0 0 100 100" fill="currentColor"><circle cx="50" cy="50" r="40"/></svg></div>
    <div class="floating-decor shape-2"><svg viewBox="0 0 100 100" fill="currentColor"><rect x="20" y="20" width="60" height="60" rx="10"/></svg></div>
    <div class="floating-decor shape-3"><svg viewBox="0 0 100 100" fill="currentColor"><path d="M50 10 L90 90 L10 90 Z"/></svg></div>
    <div class="floating-decor shape-4"><svg viewBox="0 0 100 100" fill="currentColor"><path d="M30 50 L70 50 M50 30 L50 70" stroke="currentColor" stroke-width="15" stroke-linecap="round"/></svg></div>
    <div class="floating-decor shape-5"><svg viewBox="0 0 100 100" fill="currentColor"><circle cx="50" cy="50" r="30" stroke="currentColor" stroke-width="8" fill="none"/></svg></div>
    <div class="floating-decor shape-6"><svg viewBox="0 0 100 100" fill="currentColor"><rect x="30" y="30" width="40" height="40" rotate="45" fill="currentColor" opacity="0.5"/></svg></div>

    @include('partials.header')

    <main class="partnerships-page">
        <div class="container">
            <!-- Page Header -->
            <div class="section-header reveal reveal-top">
                <p data-i18n="partnerships_subtitle">Curriculum, Operations & Strategic Governance</p>
                <h1 data-i18n="partnerships_title">Running & Operating Schools</h1>
                <div class="subtitle" data-i18n="partnerships_desc">Setting the standard for school management, academic pathways, and operational excellence through a complete educational ecosystem.</div>
            </div>

            <!-- Content Grid -->
            <div class="info-grid">
                <!-- Section 1: Educational Philosophy -->
                <div class="info-card reveal">
                    <div class="card-title">
                        <i class="fas fa-brain"></i>
                        <span data-i18n="edu_philosophy_h">Educational Philosophy</span>
                    </div>
                    
                    <div class="pillars-grid">
                        <div class="pillar-card" style="display: flex; flex-direction: column; align-items: center; text-align: center; justify-content: center; min-height: 150px; padding: 2rem 1.5rem;">
                            <i class="fas fa-user-graduate" style="font-size: 2.2rem; color: var(--primary-color); margin-bottom: 1.2rem; display: block;"></i>
                            <h3 data-i18n="edu_philosophy_p1_h" style="margin: 0; font-size: 1.15rem; font-weight: 700; line-height: 1.4;">Student-Centered Inquiry</h3>
                        </div>
                        <div class="pillar-card" style="display: flex; flex-direction: column; align-items: center; text-align: center; justify-content: center; min-height: 150px; padding: 2rem 1.5rem;">
                            <i class="fas fa-heartbeat" style="font-size: 2.2rem; color: var(--primary-color); margin-bottom: 1.2rem; display: block;"></i>
                            <h3 data-i18n="edu_philosophy_p2_h" style="margin: 0; font-size: 1.15rem; font-weight: 700; line-height: 1.4;">Academics & Well-Being</h3>
                        </div>
                        <div class="pillar-card" style="display: flex; flex-direction: column; align-items: center; text-align: center; justify-content: center; min-height: 150px; padding: 2rem 1.5rem;">
                            <i class="fas fa-cubes" style="font-size: 2.2rem; color: var(--primary-color); margin-bottom: 1.2rem; display: block;"></i>
                            <h3 data-i18n="edu_philosophy_p3_h" style="margin: 0; font-size: 1.15rem; font-weight: 700; line-height: 1.4;">Experiential Learning</h3>
                        </div>
                    </div>

                    <div class="quote-box">
                        <p data-i18n="edu_philosophy_quote">“We embrace Education 5.0 by fostering holistic student development that integrates academic excellence, innovation, character, and real-world skills.”</p>
                    </div>
                </div>

                <!-- Section 2: Academic Pathways & Programs -->
                <div class="info-card reveal">
                    <div class="card-title">
                        <i class="fas fa-road"></i>
                        <span data-i18n="pathways_h">Academic Pathways & Programs</span>
                    </div>
                    
                    <div class="curriculum-grid">
                        <!-- British Curriculum -->
                        <div class="curr-card">
                            <div class="curr-icon"><i class="fas fa-graduation-cap"></i></div>
                            <h3 data-i18n="british_curr_h">British Curriculum</h3>
                            <p data-i18n="british_curr_p">Maalem IG Schools deliver a rigorous British-based education that emphasizes deep subject mastery, academic discipline, and international benchmarking in the Cambridge, Oxford & Edexcel boards.</p>
                            <ul class="curr-list">
                                <li><i class="fas fa-check-circle"></i> <span data-i18n="british_curr_f1">British / IG pathways</span></li>
                                <li><i class="fas fa-check-circle"></i> <span data-i18n="british_curr_f2">International benchmarking</span></li>
                            </ul>
                        </div>

                        <!-- American Curriculum (Academic Portfolio) -->
                        <div class="curr-card">
                            <div class="curr-icon"><i class="fas fa-flag-usa"></i></div>
                            <h3 data-i18n="american_curr_h">American Curriculum</h3>
                            <p data-i18n="american_curr_p">Maalem American Schools provide a rigorous American curriculum enriched with activity-based learning, literacy excellence, and character development, preparing students for local and global success.</p>
                            <ul class="curr-list">
                                <li><i class="fas fa-check-circle"></i> <span data-i18n="american_curr_f1">American Curriculum</span></li>
                                <li><i class="fas fa-check-circle"></i> <span data-i18n="american_curr_f2">Literacy & Activity-based</span></li>
                            </ul>
                        </div>

                        <!-- IB Curriculum -->
                        <div class="curr-card">
                            <div class="curr-icon"><i class="fas fa-globe"></i></div>
                            <h3 data-i18n="ib_curr_h">IB Curriculum</h3>
                            <p data-i18n="ib_curr_p">An IB-aligned framework promoting intercultural understanding, critical thinking, and student agency to foster globally competent citizens.</p>
                            <ul class="curr-list">
                                <li><i class="fas fa-check-circle"></i> <span data-i18n="ib_curr_f1">Strong leadership committed to IB philosophy and pedagogy</span></li>
                                <li><i class="fas fa-check-circle"></i> <span data-i18n="ib_curr_f2">Comprehensive professional development for all staff</span></li>
                                <li><i class="fas fa-check-circle"></i> <span data-i18n="ib_curr_f3">Robust assessment and data systems</span></li>
                                <li><i class="fas fa-check-circle"></i> <span data-i18n="ib_curr_f4">Financial resources and sustainable funding model</span></li>
                            </ul>
                        </div>

                        <!-- National Compliance -->
                        <div class="curr-card">
                            <div class="curr-icon"><i class="fas fa-balance-scale"></i></div>
                            <h3 data-i18n="national_curr_h">National Compliance</h3>
                            <p data-i18n="national_curr_p">Fully aligned with local education ministry regulations, national standards, and compliance frameworks to ensure seamless certification and integration.</p>
                            <ul class="curr-list">
                                <li><i class="fas fa-check-circle"></i> <span data-i18n="national_curr_f1">National compliance</span></li>
                                <li><i class="fas fa-check-circle"></i> <span data-i18n="national_curr_f2">Ministry alignment</span></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Section 3: Two Column Detail Section -->
                <div class="two-col-grid reveal">
                    <!-- Column 1: Teaching & Learning Excellence -->
                    <div class="info-card">
                        <div class="card-title" style="margin-bottom: 1.5rem;">
                            <i class="fas fa-chalkboard-teacher"></i>
                            <span data-i18n="teaching_excellence_h">Teaching & Learning Excellence</span>
                        </div>
                        <ul class="bullet-list">
                            <li>
                                <i class="fas fa-check"></i>
                                <div>
                                    <h4 data-i18n="teaching_f1_h">Activity-Based Learning</h4>
                                    <p data-i18n="teaching_f1_p">Practical learning experiences aligned with rigorous international curriculum standards.</p>
                                </div>
                            </li>
                            <li>
                                <i class="fas fa-check"></i>
                                <div>
                                    <h4 data-i18n="teaching_f2_h">STEM-Focused Instruction</h4>
                                    <p data-i18n="teaching_f2_p">Integrating science, technology, engineering, and mathematics into a cohesive learning model.</p>
                                </div>
                            </li>
                            <li>
                                <i class="fas fa-check"></i>
                                <div>
                                    <h4 data-i18n="teaching_f3_h">Strong ELA Foundation</h4>
                                    <p data-i18n="teaching_f3_p">Comprehensive English Language Arts development from early years to advanced levels.</p>
                                </div>
                            </li>
                            <li>
                                <i class="fas fa-check"></i>
                                <div>
                                    <h4 data-i18n="teaching_f4_h">Data-Driven Teaching</h4>
                                    <p data-i18n="teaching_f4_p">Empowering educators with real-time student insights to tailor teaching methodologies.</p>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <!-- Column 2: Assessment & Data Culture -->
                    <div class="info-card">
                        <div class="card-title" style="margin-bottom: 1.5rem;">
                            <i class="fas fa-chart-line"></i>
                            <span data-i18n="assessment_culture_h">Assessment & Data Culture</span>
                        </div>
                        <ul class="bullet-list">
                            <li>
                                <i class="fas fa-check"></i>
                                <div>
                                    <h4 data-i18n="assessment_f1_h">Formative & Summative</h4>
                                    <p data-i18n="assessment_f1_p">Continuous progress tracking combined with thorough final performance reviews.</p>
                                </div>
                            </li>
                            <li>
                                <i class="fas fa-check"></i>
                                <div>
                                    <h4 data-i18n="assessment_f2_h">Standardized Benchmarking</h4>
                                    <p data-i18n="assessment_f2_p">Aligning school progress against leading international academic frameworks.</p>
                                </div>
                            </li>
                            <li>
                                <i class="fas fa-check"></i>
                                <div>
                                    <h4 data-i18n="assessment_f3_h">Intervention Planning</h4>
                                    <p data-i18n="assessment_f3_p">Targeted strategic support pathways for student segments requiring additional focus.</p>
                                </div>
                            </li>
                            <li>
                                <i class="fas fa-check"></i>
                                <div>
                                    <h4 data-i18n="assessment_f4_h">Continuous Improvement</h4>
                                    <p data-i18n="assessment_f4_p">Self-assessing cycles ensuring consistent enhancement of school operational quality.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Section 4: Core Challenges -->
                <section class="challenges-section reveal reveal-left" id="challenges" style="background: transparent; padding: 4rem 0 2rem;">
                    <div class="challenges-header reveal">
                        <div class="challenges-subtitle" style="justify-content: center;"><i class="fas fa-exclamation-circle"></i><span data-i18n="challenges_subtitle">The Reality</span></div>
                        <h2 data-i18n="challenges_title" style="text-align: center;">Core Problem in Many Schools</h2>
                    </div>
                    <div class="challenges-grid reveal">
                        <div class="challenge-card">
                            <div class="challenge-icon"><i class="fas fa-money-bill-wave"></i></div>
                            <h3 data-i18n="prob1_h">High cost vs Limited quality</h3>
                            <p data-i18n="prob1_p">High expenses without the expected return.</p>
                        </div>
                        <div class="challenge-card">
                            <div class="challenge-icon"><i class="fas fa-project-diagram"></i></div>
                            <h3 data-i18n="prob2_h">No system dependency</h3>
                            <p data-i18n="prob2_p">Over-reliance on specific individuals.</p>
                        </div>
                        <div class="challenge-card">
                            <div class="challenge-icon"><i class="fas fa-users-cog"></i></div>
                            <h3 data-i18n="prob3_h">Owner involvement</h3>
                            <p data-i18n="prob3_p">Micromanagement distracts from strategy.</p>
                        </div>
                        <div class="challenge-card">
                            <div class="challenge-icon"><i class="fas fa-user-clock"></i></div>
                            <h3 data-i18n="prob4_h">High teacher turnover</h3>
                            <p data-i18n="prob4_p">Frequent staff changes disrupt learning.</p>
                        </div>
                    </div>
                </section>

                <!-- CTA Section -->
                <div class="cta-section reveal">
                    <h2 data-i18n="cta_partnerships_h">Interested in Partnering With Us?</h2>
                    <p data-i18n="cta_partnerships_p">Build a sustainable model of academic excellence and operational efficiency. Submit your details to begin the partnership inquiry.</p>
                    <a href="{{ url('/partnerships/form') }}" class="btn-cta" data-i18n="btn_partnerships_cta">Submit Partnership Interest</a>
                </div>
            </div>
        </div>
    </main>

    @include('partials.footer')
    @include('partials.scripts')
</body>
</html>
