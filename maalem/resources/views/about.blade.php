<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Maalem Education</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .section {
            padding: 10rem 0 6rem;
        }
        .bg-alt {
            background-color: #f8fafc;
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

    <main>
        <!-- About Hero -->
        <section class="section bg-alt" style="padding: 12rem 0 6rem; position: relative; overflow: hidden;">
            <div class="container">
                <div style="display: flex; align-items: center; gap: 4rem; flex-wrap: wrap;">
                    <div style="flex: 1; min-width: 300px;" class="reveal reveal-left">
                        <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 1rem;">
                            <i class="fas fa-info-circle" style="color: var(--primary-color); font-size: 1.2rem;"></i>
                            <span data-i18n="about_subtitle" style="font-weight: 700; color: var(--primary-color); text-transform: uppercase; letter-spacing: 1px;">Who we are</span>
                        </div>
                        <h1 data-i18n="about_title" style="font-size: 3.5rem; font-weight: 800; line-height: 1.1; margin-bottom: 2rem;">Transforming Education Through <span style="color: var(--primary-color);">Expertise</span></h1>
                        <p data-i18n="about_p1" style="font-size: 1.1rem; color: var(--text-light); line-height: 1.7; margin-bottom: 0;">Maalem Educational Services is guided by a distinguished board of educational leaders whose individual experience ranges from over 20 to more than 35 years in the field of education.</p>
                    </div>
                    <div style="flex: 1; min-width: 300px;" class="reveal reveal-right">
                        <div class="faq-img-card" style="width: 100%; height: 400px;">
                            <img src="{{ asset('assets/Mision-1.jpeg') }}" alt="Board Meeting" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- About Content Section -->
        <section class="section">
            <div class="container">
                <div style="max-width: 1000px; margin: 0 auto;">
                    <div class="reveal" style="margin-bottom: 4rem;">
                        <p data-i18n="about_p2" style="font-size: 1.2rem; line-height: 1.8; color: var(--text-color); margin-bottom: 2rem;">
                            This depth of expertise reflects decades of hands-on leadership across teaching, school management, governance, and strategic educational development.
                        </p>
                        <p data-i18n="about_p3" style="font-size: 1.2rem; line-height: 1.8; color: var(--text-color); margin-bottom: 2rem;">
                            Our board members have successfully established, led, and operated schools across Alexandria, Cairo, and the Kingdom of Saudi Arabia, working with diverse educational systems and international curricula.
                        </p>
                        <p data-i18n="about_p4" style="font-size: 1.2rem; line-height: 1.8; color: var(--text-color); margin-bottom: 2rem;">
                            Their collective experience spans the full educational journey—from classroom instruction to executive leadership—bringing a well-rounded and practical understanding of how schools grow, evolve, and sustain excellence.
                        </p>
                    </div>

                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 3rem;" class="reveal">
                        <div style="background: #f8fafc; padding: 2.5rem; border-radius: 20px; border-left: 5px solid var(--primary-color);">
                            <h3 data-i18n="about_card1_h" style="font-size: 1.5rem; font-weight: 700; margin-bottom: 1rem;">Institutional Transformation</h3>
                            <p data-i18n="about_card1_p" style="color: var(--text-light); line-height: 1.7;">Rooted in strong academic and professional backgrounds, the team brings expertise in educational leadership, research-based pedagogy, organizational culture, data-driven decision-making, and institutional transformation. Their work has consistently focused on improving learning outcomes while building strong, values-driven school communities.</p>
                        </div>
                        <div style="background: #f8fafc; padding: 2.5rem; border-radius: 20px; border-left: 5px solid var(--primary-color);">
                            <h3 data-i18n="about_card2_h" style="font-size: 1.5rem; font-weight: 700; margin-bottom: 1rem;">Broad Impact</h3>
                            <p data-i18n="about_card2_p" style="color: var(--text-light); line-height: 1.7;">Beyond individual institutions, Maalem plays an active role in the broader education landscape, contributing to the development and enhancement of over 160 schools across Egypt and Saudi Arabia. This work reflects a commitment not only to school improvement, but to elevating education systems at scale.</p>
                        </div>
                    </div>

                    <div class="reveal" style="margin-top: 4rem; padding: 4rem; background: var(--primary-color); border-radius: 30px; color: #fff;">
                        <h2 data-i18n="about_vision_h" style="font-size: 2.2rem; font-weight: 800; margin-bottom: 1.5rem;">One Cohesive Vision</h2>
                        <p data-i18n="about_vision_p" style="font-size: 1.2rem; line-height: 1.8; opacity: 0.9;">
                            At Maalem, we believe education is not a set of isolated functions, but an integrated ecosystem. Our approach centers on the development of the whole student—academically, socially, and emotionally—by aligning leadership, teaching practices, operational systems, and community engagement into one cohesive vision. We work with schools to create environments where students thrive, educators grow, and institutions achieve lasting impact.
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



