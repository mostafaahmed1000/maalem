<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mentor Details - Maalem Education</title>
    <link rel="stylesheet" href="{{ secure_asset_v('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .mentor-details-page {
            padding: 10rem 0 6rem;
            background-color: #f8fafc;
        }

        .mentor-layout {
            display: grid;
            grid-template-columns: 1fr 420px;
            gap: 3rem;
            align-items: start;
        }

        .mentor-main {
            background: #fff;
            border-radius: 40px;
            padding: 4rem;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.05);
        }

        .mentor-name {
            font-size: 3rem;
            font-weight: 900;
            margin-bottom: 0.5rem;
            color: var(--text-color);
        }

        .mentor-role-tag {
            display: inline-block;
            padding: 0.5rem 1.5rem;
            background: #eff6ff;
            color: var(--primary-color);
            border-radius: 50px;
            font-weight: 700;
            margin-bottom: 2.5rem;
        }

        .mentor-bio {
            font-size: 1.15rem;
            line-height: 1.8;
            color: var(--text-color);
        }

        .mentor-sidebar {
            position: sticky;
            top: 120px;
        }

        .mentor-card {
            background: #fff;
            border-radius: 40px;
            padding: 8rem 2.5rem 2.5rem;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
            text-align: center;
            position: relative;
            margin-top: 100px;
        }

        .mentor-img-wrapper {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            overflow: hidden;
            margin: 0 auto 2rem;
            background: #f1f5f9;
            position: absolute;
            top: -100px;
            left: 50%;
            transform: translateX(-50%);
            border: 8px solid #fff;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .mentor-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .mentor-img-wrapper img.logo-placeholder {
            object-fit: contain;
            padding: 2.5rem;
            background: #fff;
        }

        .mentor-stats {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1.5rem;
            margin: 2rem 0;
            padding: 1.5rem 0;
            border-top: 1px solid rgba(0, 0, 0, 0.05);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .stat-box {
            text-align: left;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .stat-box .label {
            font-size: 0.85rem;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            font-weight: 700;
            margin-bottom: 0;
        }

        .stat-box .value {
            display: block;
            font-size: 1.15rem;
            font-weight: 800;
            color: var(--primary-color);
            line-height: 1.3;
            word-break: keep-all;
        }

        .mentor-contact-info {
            text-align: left;
            margin-bottom: 2rem;
        }

        .contact-row {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 1.2rem;
            font-size: 1rem;
            line-height: 1.4;
        }

        .contact-row span {
            word-break: break-word;
        }

        .contact-row i {
            color: var(--primary-color);
            width: 20px;
        }

        .social-row {
            display: flex;
            justify-content: center;
            gap: 1rem;
        }

        .social-btn {
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f8fafc;
            border-radius: 12px;
            color: var(--text-color);
            transition: all 0.3s ease;
        }

        .social-btn:hover {
            background: var(--primary-color);
            color: #fff;
            transform: translateY(-3px);
        }

        @media (max-width: 1200px) {
            .mentor-layout {
                grid-template-columns: 1fr 360px;
                gap: 2rem;
            }

            .mentor-main {
                padding: 3rem 2.5rem;
            }

            .mentor-name {
                font-size: 2.5rem;
            }
        }

        @media (max-width: 992px) {
            .mentor-layout {
                grid-template-columns: 1fr;
                gap: 3rem;
            }

            .mentor-sidebar {
                position: static;
            }

            .mentor-main {
                padding: 3rem;
            }

            .mentor-card {
                margin-top: 80px;
            }
        }

        @media (max-width: 576px) {
            .mentor-details-page {
                padding: 8rem 0 4rem;
            }

            .mentor-main {
                padding: 2rem 1.5rem;
                border-radius: 25px;
            }

            .mentor-name {
                font-size: 2rem;
                word-wrap: break-word;
            }

            .mentor-role-tag {
                margin-bottom: 1.5rem;
                font-size: 0.9rem;
                padding: 0.4rem 1.2rem;
            }

            .mentor-bio {
                font-size: 1rem;
                line-height: 1.7;
            }

            .mentor-card {
                padding: 6rem 1.5rem 1.5rem;
                border-radius: 25px;
                margin-top: 60px;
            }

            .mentor-img-wrapper {
                width: 140px;
                height: 140px;
                top: -70px;
                border-width: 6px;
            }

            .stat-box .value {
                font-size: 1rem;
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

    @php
        $mentors = [
            'dina' => [
                'name' => 'Dr. Dina El Odessy',
                'role' => 'Educational Director',
                'image' => 'identity/Logo/SVG/Blue.svg',
                'stats' => [
                    'courses' => 5,
                    'reviews' => '150 (4.9)',
                    'experience' => '10+ Years',
                    'subject' => 'Education & Psychology'
                ],
                'contact' => [
                    'address' => 'Alexandria, Egypt',
                    'email' => 'dina.elodessy@maalem.edu',
                    'phone' => '+20 123 456 7890'
                ],
                'bio' => 'Dina El Odessy holds a doctorate in education from the University of Oxford. Her PhD research focused on the relationship between pedagogic practices, cultural values and educational principles espoused and enacted in community schools in Egypt. It primarily explored the potential of critical pedagogy in empowering school stakeholders by attempting to discover their potential to become sites of praxis.
                                                <br><br>
                                                Dina holds an MA in Education from University College London (UCL) and a Bachelor of Arts in English from Alexandria University. She believes in the interconnected and multi-disciplinary nature of knowledge, and accordingly has been pursuing different learning opportunities in positive psychology, brain-based learning, postcolonialism, educational leadership, history and cultural studies.
                                                <br><br>
                                                She also currently works as Educational Director of Alexandria Language Schools in Egypt, a freelance writer, and an encouragement consultant. She also works as a holistic coach to become a happiness activist, aiming at bringing about small ripples of change through intermittently running lectures and workshops on well-being, the science of happiness and holistic development. Her research interests center around: equity and empowerment, Islamic education, alternative education, decolonizing pedagogy, social and emotional learning, community schools, critical pedagogy, and holistic education.'
            ],
            'omar' => [
                'name' => 'Eng. Omar El Odessy',
                'role' => 'Chairman of the Board of Directors',
                'image' => 'identity/Logo/SVG/Blue.svg',
                'stats' => [
                    'courses' => 3,
                    'reviews' => '95 (4.8)',
                    'experience' => '15+ Years',
                    'subject' => 'Educational Leadership & Engineering'
                ],
                'contact' => [
                    'address' => 'Alexandria, Egypt',
                    'email' => 'omar.elodessy@maalem.edu',
                    'phone' => '+20 123 456 7891'
                ],
                'bio' => 'Eng. Omar El Odessy is a determined leader within the educational sector in Egypt. He currently holds the position of Chairman of the Board of Directors at Alexandria Educational Services (LP), which is responsible for the operation and strategic direction of Alexandria Language and International Schools, institutions distinguished for their unwavering commitment to academic excellence and comprehensive student development.
                                                <br><br>
                                                He obtained his Bachelor\'s degree in Engineering from the Faculty of Engineering at Pharos University, where he cultivated a robust foundation in problem-solving, systems thinking, and innovation. Motivated by a keen interest in organizational development and strategic management, he subsequently pursued a Master of Business Administration (MBA) at ESLSCA University. Presently, he is engaged in doctoral studies, working towards a Doctorate in Business Administration (DBA) at the same institution. His doctoral research investigates the influence of organizational culture on the performance of educational institutions, underscoring his dedication to advancing the educational sector through evidence-based leadership and strategic governance.
                                                <br><br>
                                                Eng. Omar\'s expertise in education encompasses strategic school management, governance and policy formulation, as well as the transformation of institutional culture. He actively contributes to the development of educational strategy, the assurance of quality standards, and the promotion of innovation across the schools under his purview. His initiatives include the establishment of performance measurement frameworks, leadership development programs, and the implementation of academic and operational standards benchmarked against international practices.
                                                <br><br>
                                                In addition to his contributions to education, Eng. Omar is a visionary entrepreneur in the industrial sector. His passion for technology and engineering led him to co-found an innovative industrial enterprise dedicated to the design and production of customized machinery and compact production lines. This initiative seeks to support Egypt\'s industrial renaissance by developing high-quality, locally manufactured equipment positioned to compete in global markets. Through his extensive experience in engineering, business, and educational leadership, Eng. Omar El Odessy continues to drive transformative change and sustainable growth in both fields.'
            ],
            'karim' => [
                'name' => 'Mr. Karim El Sarnagawi',
                'role' => 'CEO of Pyramakerz',
                'image' => 'identity/Logo/SVG/Blue.svg',
                'stats' => [
                    'courses' => 8,
                    'reviews' => '320 (4.9)',
                    'experience' => '21 Years',
                    'subject' => 'EdTech & STEAM'
                ],
                'contact' => [
                    'address' => 'Cairo, Egypt',
                    'email' => 'karim.elsarnagawi@maalem.edu',
                    'phone' => '+20 123 456 7892'
                ],
                'bio' => 'Karim El Sarnagawi is an Egyptian EdTech entrepreneur, educator, and business leader, with 21 years of experience. He is best known as the CEO of Pyramakerz. He is an expert in EdTech, educational content development, and educational management, specializing in building scalable STEAM education ecosystems that enhance hands-on learning to prepare the next generation for future careers.
                                                <br><br>
                                                With a strong focus on impact-driven education, Karim has led the development of innovative products, curricula, and training programs serving schools, students, and educators across Egypt, with expansion into Saudi Arabia and the GCC. His work bridges the gap between education and industry by integrating real-world skills such as programming, engineering design, and problem-solving into K-12 learning experiences.
                                                <br><br>
                                                As a strategic leader, he has designed and executed large-scale initiatives including scholarship programs, national competitions, and full school transformation and management models. He also drives high-impact partnerships with regional and international organizations to scale educational innovation.
                                                <br><br>
                                                Karim is particularly interested in leveraging artificial intelligence to enhance learning outcomes, optimize educational operations, and scale access to quality education. He is recognized for combining visionary thinking with strong execution building not just educational programs, but sustainable, high-growth models that deliver measurable impact in the education sector.'
            ],
            'nourhan' => [
                'name' => 'Mrs. Nourhan Soudan',
                'role' => 'CEO of LOIS Company',
                'image' => 'identity/Logo/SVG/Blue.svg',
                'stats' => [
                    'courses' => 4,
                    'reviews' => '110 (4.8)',
                    'experience' => '15+ Years',
                    'subject' => 'Educational Leadership'
                ],
                'contact' => [
                    'address' => 'Riyadh, Saudi Arabia',
                    'email' => 'nourhan.soudan@maalem.edu',
                    'phone' => '+966 123 456 789'
                ],
                'bio' => 'Nourhan Soudan is an accomplished educational leader with extensive experience in managing and leading international schools. As the CEO of LOIS Company since 2018, she oversees the operations of many schools offering national, British, American, and IB curricula in Riyadh, Saudi Arabia. Her tenure at Learning Oasis International School as CEO and General Directress from 2009 to 2018 highlights her strategic vision and leadership capabilities.
                                                <br><br>
                                                Nourhan holds a Diploma in Educational Leadership and Management from Notting Hill College and a Diploma in Finnish Educational Training from the Innovative Education Center of Finland. She also earned a B.A. in English and Literature from the University of Alexandria. Her professional journey spans roles from English teacher to CEO. Achieving high standards of educational quality, she has successfully led six accreditation processes, including Cognia and Cambridge.
                                                <br><br>
                                                Nourhan\'s expertise includes succession planning, crisis management, talent development, operational excellence, and digital transformation. Enhancing the skills of educators and administrative staff, she has delivered numerous professional development programs. She has a proven record in curriculum development, performance management, and fostering stakeholder relationships, making her a dynamic and influential figure in the education sector.'
            ],
            'magie' => [
                'name' => 'Eng. Magie S. Ginidy',
                'role' => 'Operations Director',
                'image' => 'identity/Logo/SVG/Blue.svg',
                'stats' => [
                    'courses' => 6,
                    'reviews' => '185 (4.9)',
                    'experience' => '17+ Years',
                    'subject' => 'Educational Leadership & Data Analytics'
                ],
                'contact' => [
                    'address' => 'Alexandria, Egypt',
                    'email' => 'magie.ginidy@maalem.edu',
                    'phone' => '+20 123 456 7893'
                ],
                'bio' => 'Eng. Magie S. Ginidy is an experienced educational leader and administrator with over 17 years of expertise spanning teaching, school leadership, data analytics, educational technology, and strategic educational development. With a Bachelor’s degree in Computer Engineering and eight years of professional experience in networking and computer maintenance—including positions within multinational companies—she brings a strong technical foundation that has significantly enhanced her capabilities in data-driven decision-making and educational innovation.
                                                <br><br>
                                                In 2017, she was promoted to Assistant Superintendent at a leading school in Alexandria offering both American and British curricula. In this role, she led the Data Analysis Committee, successfully transforming the school into a data-driven institution. To further strengthen her expertise, she earned a Professional Diploma in Data Analysis. She also served as the Standardized Testing Coordinator, contributed to three successful reaccreditation cycles, and played an active role on the school’s steering committee. Additionally, she is a British Council IT-certified examiner, reflecting her commitment to high standards in assessment and quality assurance.
                                                <br><br>
                                                Since 2015, Magie has been an active member of Cognia (formerly AdvancED), participating in both national and international accreditation review visits, including assignments in the UAE and Jordan. She completed the Cognia STEM Lead Evaluator Course and has taken part in multiple STEM accreditation reviews. Her expertise in STEM education is further reinforced by her certification as a STEM Master Trainer from STEM.org, along with additional technology credentials, including an Internet of Things (IoT) certification from Coursera.
                                                <br><br>
                                                Her leadership journey also includes serving as Chief Academic Officer at Pyramakerz Technologies, an EdTech company specializing in STEAM solutions, where she was later promoted to Chief Strategic Partnerships Officer. She currently serves as Operations Director at Maalem Educational Services, leading strategic, academic, and operational initiatives aimed at driving excellence across diverse educational platforms and partnerships.
                                                <br><br>
                                                Magie’s career is distinguished by continuous professional growth, cross-sector expertise, and a strong commitment to advancing educational practices locally, regionally, and internationally.'
            ]
        ];

        $mentorId = request('id');
        $mentor = $mentors[$mentorId] ?? null;
    @endphp

    <main class="mentor-details-page">
        <div class="container">
            @if($mentor)
                <div class="mentor-layout" id="mentorLayout">
                    <!-- Main Content Left -->
                    <div class="mentor-main reveal reveal-left active" style="opacity: 1; transform: translateX(0);">
                        <h1 class="mentor-name">{{ $mentor['name'] }}</h1>
                        <span class="mentor-role-tag">{{ $mentor['role'] }}</span>

                        <div class="mentor-bio">
                            {!! $mentor['bio'] !!}
                        </div>
                    </div>

                    <!-- Sidebar Right -->
                    <div class="mentor-sidebar reveal reveal-right active" style="opacity: 1; transform: translateX(0);">
                        <div class="mentor-card">
                            <div class="mentor-img-wrapper">
                                <img src="{{ secure_asset_v($mentor['image']) }}" alt="{{ $mentor['name'] }}"
                                    class="logo-placeholder">
                            </div>

                            <div class="mentor-stats">
                                <div class="stat-box">
                                    <span class="label">Experience</span>
                                    <span class="value">{{ $mentor['stats']['experience'] }}</span>
                                </div>
                                <div class="stat-box">
                                    <span class="label">Specialty</span>
                                    <span class="value">{{ $mentor['stats']['subject'] }}</span>
                                </div>
                            </div>

                            <div class="mentor-contact-info">
                                <div class="contact-row">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>{{ $mentor['contact']['address'] }}</span>
                                </div>
                                <div class="contact-row">
                                    <i class="fas fa-envelope"></i>
                                    <span>{{ $mentor['contact']['email'] }}</span>
                                </div>
                                <div class="contact-row">
                                    <i class="fas fa-phone"></i>
                                    <span>{{ $mentor['contact']['phone'] }}</span>
                                </div>
                            </div>

                            <div class="social-row">
                                <a href="#" class="social-btn"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#" class="social-btn"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="social-btn"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div id="errorState" style="text-align: center; padding: 10rem 0;">
                    <h1 style="font-size: 3rem; margin-bottom: 1rem;">Mentor Not Found</h1>
                    <p style="margin-bottom: 2rem; color: var(--text-light);">We couldn't find the mentor profile you're
                        looking for.</p>
                    <a href="{{ url('/') }}" class="btn btn-primary"
                        style="padding: 1rem 3rem; border-radius: 15px; font-weight: 800;">Return to Homepage</a>
                </div>
            @endif
        </div>
    </main>

    @include('partials.footer')
    @include('partials.scripts')
</body>

</html>