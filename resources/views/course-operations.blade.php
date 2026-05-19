<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Operations & Administration - Maalem Education</title>
    <link rel="stylesheet" href="{{ secure_asset_v('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .course-detail-page {
            padding: 10rem 0 6rem;
            background-color: #f8fafc;
        }

        .detail-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .course-layout {
            display: grid;
            grid-template-columns: 1fr 380px;
            gap: 2.5rem;
            align-items: start;
        }

        .main-card {
            background: #fff;
            border-radius: 40px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.05);
            margin-bottom: 2rem;
            padding: 2.5rem;
        }

        .main-img {
            width: 100%;
            height: 450px;
            border-radius: 30px;
            object-fit: cover;
            margin-bottom: 2rem;
        }

        .course-header-content h1 {
            font-size: 2.8rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            line-height: 1.2;
            color: var(--text-color);
        }

        .course-meta-bar {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
            padding: 2rem;
            background: #f8fafc;
            border-radius: 25px;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .meta-item i {
            font-size: 1.5rem;
            color: var(--primary-color);
        }

        .meta-text span {
            display: block;
            font-size: 0.8rem;
            color: var(--text-light);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .meta-text strong {
            font-size: 1rem;
            color: var(--text-color);
        }

        .course-tabs {
            background: #fff;
            border-radius: 30px;
            padding: 2.5rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.03);
        }

        .tabs-nav {
            display: flex;
            gap: 3rem;
            border-bottom: 2px solid #f1f5f9;
            margin-bottom: 2rem;
        }

        .tab-btn {
            padding: 1rem 0;
            font-weight: 700;
            color: var(--text-light);
            cursor: pointer;
            position: relative;
            transition: all 0.3s ease;
        }

        .tab-btn.active {
            color: var(--primary-color);
        }

        .tab-btn.active::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 100%;
            height: 3px;
            background: var(--primary-color);
        }

        .summary-card {
            background: #fff;
            border-radius: 30px;
            padding: 2rem;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 120px;
            border: 1px solid #f1f5f9;
        }

        .summary-title {
            font-size: 1.5rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            color: var(--text-color);
        }

        .summary-list {
            list-style: none;
            padding: 0;
            margin-bottom: 2rem;
        }

        .summary-list li {
            display: flex;
            justify-content: space-between;
            padding: 1rem 0;
            border-bottom: 1px solid #f1f5f9;
            font-size: 0.95rem;
        }

        .summary-list li span {
            color: var(--text-light);
        }

        .summary-list li strong {
            color: var(--text-color);
        }

        .btn-enroll {
            display: block;
            text-align: center;
            width: 100%;
            padding: 1.2rem;
            background: var(--primary-color);
            color: #fff;
            border-radius: 15px;
            font-weight: 800;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-enroll:hover {
            background: #154ea3;
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(29, 99, 220, 0.2);
        }

        .curriculum-list {
            list-style: none;
            padding: 0;
        }

        .curriculum-section {
            margin-bottom: 2rem;
        }

        .curriculum-section h3 {
            font-size: 1.4rem;
            font-weight: 800;
            margin-bottom: 1.2rem;
            color: var(--text-color);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .curriculum-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 1.2rem;
            background: #f8fafc;
            border-radius: 15px;
            margin-bottom: 0.8rem;
            transition: all 0.3s ease;
        }

        .curriculum-item:hover {
            background: #eff6ff;
            transform: translateX(10px);
        }

        .curriculum-item i {
            color: var(--primary-color);
            font-size: 1.1rem;
        }

        @media (max-width: 992px) {
            .course-layout {
                grid-template-columns: 1fr;
            }

            .course-sidebar {
                position: static;
            }

            .summary-card {
                position: static;
                margin-top: 2rem;
            }

            .course-meta-bar {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    @include('partials.header')

    <main class="course-detail-page">
        <div class="container detail-container">
            <div class="course-layout">
                <div class="course-main">
                    <div class="main-secure_asset_v(
                        <img src=" {{ secure_asset_v('assets/school_operations_pathway_1778411887223.png') }}"
                        alt="School Operations" class="main-img">
                        <div class="course-header-content">
                            <h1>Pathway Three: School Operations & Administration</h1>
                            <div class="course-meta-bar">
                                <div class="meta-item">
                                    <i class="fas fa-users-cog"></i>
                                    <div class="meta-text">
                                        <span>Role Focus</span>
                                        <strong>Operational Managers</strong>
                                    </div>
                                </div>
                                <div class="meta-item">
                                    <i class="fas fa-sitemap"></i>
                                    <div class="meta-text">
                                        <span>Tracks</span>
                                        <strong>4 Core Tracks</strong>
                                    </div>
                                </div>
                                <div class="meta-item">
                                    <i class="fas fa-project-diagram"></i>
                                    <div class="meta-text">
                                        <span>Learning</span>
                                        <strong>Project-Based</strong>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="course-curriculum"
                            style="margin-top: 3rem; border-top: 1px solid #f1f5f9; padding-top: 3rem;">
                            <div class="curriculum-section">
                                <h3>Human Resources for Schools</h3>
                                <div class="curriculum-list">
                                    <div class="curriculum-item"><i class="fas fa-check-circle"></i> Recruitment &
                                        Evaluation Systems</div>
                                    <div class="curriculum-item"><i class="fas fa-check-circle"></i> Performance
                                        Management</div>
                                    <div class="curriculum-item"><i class="fas fa-check-circle"></i> Workforce Planning
                                        & Compliance</div>
                                </div>
                            </div>

                            <div class="curriculum-section">
                                <h3>School Finance & Budgeting</h3>
                                <div class="curriculum-list">
                                    <div class="curriculum-item"><i class="fas fa-check-circle"></i> Budget Planning
                                    </div>
                                    <div class="curriculum-item"><i class="fas fa-check-circle"></i> Revenue Modeling &
                                        Cost Optimization</div>
                                    <div class="curriculum-item"><i class="fas fa-check-circle"></i> Financial Reporting
                                        & Audit Preparation</div>
                                </div>
                            </div>

                            <div class="curriculum-section">
                                <h3>Student Affairs & School Culture</h3>
                                <div class="curriculum-list">
                                    <div class="curriculum-item"><i class="fas fa-check-circle"></i> Discipline Systems
                                        & Safeguarding</div>
                                    <div class="curriculum-item"><i class="fas fa-check-circle"></i> Parent
                                        Communication Frameworks</div>
                                    <div class="curriculum-item"><i class="fas fa-check-circle"></i> Crisis Management
                                    </div>
                                </div>
                            </div>

                            <div class="curriculum-section">
                                <h3>Marketing & Admissions</h3>
                                <div class="curriculum-list">
                                    <div class="curriculum-item"><i class="fas fa-check-circle"></i> Enrollment Strategy
                                    </div>
                                    <div class="curriculum-item"><i class="fas fa-check-circle"></i> Branding &
                                        Positioning</div>
                                    <div class="curriculum-item"><i class="fas fa-check-circle"></i> Parent Experience &
                                        Retention</div>
                                </div>
                            </div>

                            <div class="curriculum-section" style="margin-top: 2rem;">
                                <h3>Final Capstone</h3>
                                <div class="curriculum-item"
                                    style="background: #eff6ff; border: 1px dashed var(--primary-color);"><i
                                        class="fas fa-trophy"></i> Operational Improvement Project</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="course-sidebar">
                    <div class="summary-card">
                        <h3 class="summary-title">Pathway Summary</h3>
                        <ul class="summary-list">
                            <li><span>Specializations</span> <strong>4 Tracks</strong></li>
                            <li><span>Format</span> <strong>Workshop Series</strong></li>
                            <li><span>Outcome</span> <strong>Applied Project</strong></li>
                            <li><span>Access</span> <strong>Professional Network</strong></li>
                        </ul>
                        <a href="{{ url('/training') }}" class="btn-enroll">ENROLL IN TRACK</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    @include('partials.footer')
    @include('partials.scripts')
</body>

</html>