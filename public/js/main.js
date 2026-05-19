document.addEventListener('DOMContentLoaded', () => {

    // ── Mobile Hamburger Menu ────────────────────────────────
    const hamburgerBtn = document.getElementById('hamburgerBtn');
    const navLinks = document.getElementById('navLinks');

    if (hamburgerBtn && navLinks) {
        // Create overlay element
        const overlay = document.createElement('div');
        overlay.className = 'nav-overlay';
        document.body.appendChild(overlay);

        const toggleMenu = () => {
            hamburgerBtn.classList.toggle('active');
            navLinks.classList.toggle('open');
            overlay.classList.toggle('active');
        };

        hamburgerBtn.addEventListener('click', toggleMenu);
        overlay.addEventListener('click', toggleMenu);

        // Close menu when a link is clicked
        navLinks.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                if (navLinks.classList.contains('open')) {
                    toggleMenu();
                }
            });
        });
    }

    // Header Glassmorphism and Show/Hide on Scroll
    const header = document.querySelector('header');
    let lastScrollY = window.scrollY;

    // Header – in 3D scroll mode window.scrollY is always 0,
    // so only run hide/show logic when normal scrolling is active
    window.addEventListener('scroll', () => {
        const is3D = document.body.style.overflow === 'hidden';
        if (is3D) {
            header.style.background = 'rgba(255, 255, 255, 0.85)';
            header.style.boxShadow  = '0 4px 20px rgba(0, 0, 0, 0.03)';
            header.style.transform  = 'translateY(0)';
            return;
        }

        if (window.scrollY > 50) {
            header.style.background = 'rgba(255, 255, 255, 0.9)';
            header.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.05)';
        } else {
            header.style.background = 'rgba(255, 255, 255, 0.85)';
            header.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.03)';
        }

        if (window.scrollY > lastScrollY && window.scrollY > 150) {
            header.style.transform = 'translateY(-100%)';
        } else {
            header.style.transform = 'translateY(0)';
        }
        lastScrollY = window.scrollY;
    });


    // ── Video Preloader ──────────────────────────────────────
    const preloader      = document.getElementById('preloader');
    const preloaderVideo = document.getElementById('preloaderVideo');
    const preloaderBar   = document.getElementById('preloaderBar');

    if (preloader && preloaderVideo) {
        // Skip preloader AND all entrance animations if navigating to a section via navbar
        if (window.location.hash && window.location.hash !== '#home') {
            preloader.style.display = 'none';

            // Show hero logo instantly without animation
            const heroLogo = document.querySelector('.hero-logo-container');
            if (heroLogo) {
                heroLogo.style.opacity = '1';
                heroLogo.style.visibility = 'visible';
                heroLogo.style.transition = 'none';
                heroLogo.style.animation = 'none';
            }

            // Instantly reveal all scroll-reveal elements (no slide-in animation)
            document.querySelectorAll('.reveal').forEach(el => {
                el.style.transition = 'none';
                el.classList.add('active');
            });

            // Mark body so scroll3d.js knows to skip its entrance animation
            document.body.setAttribute('data-skip-animations', 'true');
        } else {
            let dismissed = false;

            // Hide Hero Logo initially (only if preloader exists)
            const heroLogo = document.querySelector('.hero-logo-container');
            if (heroLogo) {
                heroLogo.style.opacity = '0';
                heroLogo.style.visibility = 'hidden';
            }

        const dismiss = () => {
            if (dismissed) return;
            dismissed = true;
            if (preloaderBar) preloaderBar.style.width = '100%';
            
            // Trigger Hero Logo Entrance
            const heroLogo = document.querySelector('.hero-logo-container');
            if (heroLogo) heroLogo.classList.add('animate-entrance');

            setTimeout(() => {
                preloader.classList.add('hidden');
                setTimeout(() => { preloader.style.display = 'none'; }, 650);
            }, 200); // brief pause at 100% before fading
        };

        const startVideo = () => {
            if (dismissed) return;
            preloaderVideo.currentTime = 0;
            preloaderVideo.play().catch(err => {
                console.warn('[Preloader] Autoplay blocked or failed:', err.message);
                // If autoplay is blocked, we still want to dismiss after a bit or allow user to skip
                // but for a preloader, we usually just dismiss if it fails.
                dismiss();
            });
        };

        // Drive the progress bar from actual video time
        preloaderVideo.addEventListener('timeupdate', () => {
            if (!preloaderBar || !preloaderVideo.duration) return;
            const pct = (preloaderVideo.currentTime / preloaderVideo.duration) * 100;
            preloaderBar.style.width = pct + '%';
        });

        // Dismiss when video finishes naturally
        preloaderVideo.addEventListener('ended', dismiss);

        // Dismiss if video fails to load
        preloaderVideo.addEventListener('error', () => {
            console.error('[Preloader] Video load error:', preloaderVideo.currentSrc);
            dismiss();
        });

        // Use a more robust check for video readiness
        if (preloaderVideo.readyState >= 3) {
            startVideo();
        } else {
            preloaderVideo.addEventListener('canplaythrough', startVideo, { once: true });
            // Fallback for canplaythrough if it takes too long
            preloaderVideo.addEventListener('canplay', startVideo, { once: true });
        }

        // Hard fallback: ensure the site is accessible even if the video hangs
        setTimeout(dismiss, 6000);
        }
    }
    // ────────────────────────────────────────────────────────



    const langToggle = document.getElementById('langToggle');
    const htmlTag = document.documentElement;
    let currentLang = 'en';

    // Language Toggle Function
    const updateLanguage = (lang) => {
        currentLang = lang;
        htmlTag.setAttribute('lang', lang);
        htmlTag.setAttribute('dir', lang === 'ar' ? 'rtl' : 'ltr');
        // Icon remains a globe, no text change needed.

        // Update all elements with data-i18n attribute
        document.querySelectorAll('[data-i18n]').forEach(el => {
            const key = el.getAttribute('data-i18n');
            if (translations[lang][key]) {
                el.innerHTML = translations[lang][key];
            }
        });

        // Store preference
        localStorage.setItem('preferredLang', lang);
    };

    if (langToggle) {
        langToggle.addEventListener('click', () => {
            updateLanguage(currentLang === 'en' ? 'ar' : 'en');
        });
    }

    // Load preferred language
    const savedLang = localStorage.getItem('preferredLang');
    if (savedLang) {
        updateLanguage(savedLang);
    }

    // Hero Slide Fading
    const heroSlides = document.querySelectorAll('.hero-slide');
    let currentSlideIndex = 0;

    if (heroSlides.length > 0) {
        const fadeSlides = () => {
            heroSlides[currentSlideIndex].classList.remove('active');
            currentSlideIndex = (currentSlideIndex + 1) % heroSlides.length;
            heroSlides[currentSlideIndex].classList.add('active');
        };

        setInterval(fadeSlides, 5000); // Change slide every 5 seconds
    }

    // Scroll Animations for Side Icons
    const sideIconLeft = document.getElementById('sideIconLeft');
    const sideIconRight = document.getElementById('sideIconRight');
    
    if (sideIconLeft || sideIconRight) {
        window.addEventListener('scroll', () => {
            const scrollPosition = window.scrollY;
            if (sideIconLeft) {
                sideIconLeft.style.transform = `translateY(-50%) rotate(${scrollPosition * 0.15}deg)`;
            }
            if (sideIconRight) {
                sideIconRight.style.transform = `rotate(-${scrollPosition * 0.15}deg)`;
            }
        });
    }

    // Category Carousel Scrolling
    const catCarousel = document.getElementById('catCarousel');
    const catPrev = document.getElementById('catPrev');
    const catNext = document.getElementById('catNext');

    if (catCarousel && catPrev && catNext) {
        const scrollAmount = 300;
        
        catPrev.addEventListener('click', () => {
            catCarousel.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
        });

        catNext.addEventListener('click', () => {
            catCarousel.scrollBy({ left: scrollAmount, behavior: 'smooth' });
        });
    }

    // Course Carousel Scrolling
    const courseCarousel = document.getElementById('courseCarousel');
    const coursePrev = document.getElementById('coursePrev');
    const courseNext = document.getElementById('courseNext');

    if (courseCarousel && coursePrev && courseNext) {
        const scrollAmount = courseCarousel.offsetWidth;
        
        coursePrev.addEventListener('click', () => {
            courseCarousel.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
        });

        courseNext.addEventListener('click', () => {
            courseCarousel.scrollBy({ left: scrollAmount, behavior: 'smooth' });
        });
    }

    // Rotating Circle on Scroll
    const rotatingCircles = document.querySelectorAll('.rotating-circle');
    if (rotatingCircles.length > 0) {
        // Generate concentric dotted circle SVG
        let svgContent = '<svg viewBox="0 0 200 200" width="100%" height="100%"><g fill="var(--secondary-color)">';
        svgContent += '<circle cx="100" cy="100" r="4" />';
        for (let r = 25; r <= 85; r += 20) {
            let dots = r === 25 ? 8 : (r === 45 ? 16 : (r === 65 ? 24 : 32));
            for (let i = 0; i < dots; i++) {
                let angle = (i * 2 * Math.PI) / dots;
                let cx = 100 + r * Math.cos(angle);
                let cy = 100 + r * Math.sin(angle);
                svgContent += `<circle cx="${cx}" cy="${cy}" r="3" />`;
            }
        }
        svgContent += '</g></svg>';
        
        rotatingCircles.forEach(circle => {
            circle.innerHTML = svgContent;
        });

        // Rotation logic
        window.addEventListener('scroll', () => {
            const scrollPosition = window.scrollY;
            const rotation = scrollPosition * 0.5; // Adjust speed as needed
            rotatingCircles.forEach(circle => {
                circle.style.transform = `rotate(${rotation}deg)`;
            });
        });
    }

    // Scroll Reveal Animation
    // Note: in 3D scroll mode, sections are position:fixed so scrollY is always 0.
    // scroll3d.js calls triggerReveals() itself; this handles the fallback (mobile/normal scroll).
    const revealElements = document.querySelectorAll('.reveal');
    const revealOnScroll = () => {
        if (document.body.style.overflow === 'hidden') return; // 3D mode active
        const windowHeight = window.innerHeight;
        revealElements.forEach(el => {
            const elTop = el.getBoundingClientRect().top;
            const revealPoint = 150;
            if (elTop < windowHeight - revealPoint) {
                el.classList.add('active');
            }
        });
    };

    window.addEventListener('scroll', revealOnScroll);
    revealOnScroll(); // Trigger once on load


    // Parallax effect for floating decor
    document.addEventListener('mousemove', (e) => {
        const mouseX = e.clientX;
        const mouseY = e.clientY;
        const shapes = document.querySelectorAll('.floating-decor');
        
        shapes.forEach((shape, index) => {
            const speed = (index + 1) * 2;
            const x = (window.innerWidth / 2 - mouseX) * speed / 100;
            const y = (window.innerHeight / 2 - mouseY) * speed / 100;
            shape.style.transform = `translate(${x}px, ${y}px)`;
        });
    });
    // ── Form Submissions ──────────────────────────────────────
    const handleFormSubmission = (formId, endpoint) => {
        const form = document.getElementById(formId);
        if (!form) return;

        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalBtnText = submitBtn.innerHTML;
            
            // Show loading state
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Submitting...';

            const formData = new FormData(form);
            const data = {};

            // Basic field capture
            formData.forEach((value, key) => {
                // Normalize keys ending with [] (strip the brackets)
                const cleanKey = key.endsWith('[]') ? key.slice(0, -2) : key;
                
                // Handle multiple checkboxes with same name (or explicit arrays)
                if (data[cleanKey]) {
                    if (!Array.isArray(data[cleanKey])) {
                        data[cleanKey] = [data[cleanKey]];
                    }
                    data[cleanKey].push(value);
                } else {
                    // If it was explicitly named as an array, make it one even if single value
                    data[cleanKey] = key.endsWith('[]') ? [value] : value;
                }
            });

            // Special handling for Participant Table in form1
            if (formId === 'partnershipForm') {
                const participants = [];
                form.querySelectorAll('.participants-table tbody tr').forEach(row => {
                    const program = row.cells[0].innerText;
                    const count = row.querySelector('input').value;
                    if (count > 0) {
                        participants.push({ program, count });
                    }
                });
                data.participants = participants;
            }

            // Get CSRF Token
            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

            const apiBase = window.apiBaseUrl || 'https://cloud-pyramakerz.com/maalem/public/api';

            try {
                const response = await fetch(`${apiBase}${endpoint}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(data)
                });

                const result = await response.json();

                if (response.ok) {
                    Swal.fire({
                        title: 'Success!',
                        text: result.message || 'Submitted successfully!',
                        icon: 'success',
                        confirmButtonColor: '#1d63dc',
                        borderRadius: '20px'
                    });
                    form.reset();
                } else {
                    console.error('Validation Errors:', result.errors);
                    let errorMessage = result.message || 'Submission failed.';
                    if (result.errors) {
                        errorMessage = Object.values(result.errors).flat().join('<br>');
                    }
                    Swal.fire({
                        title: 'Oops...',
                        html: errorMessage,
                        icon: 'error',
                        confirmButtonColor: '#1d63dc'
                    });
                }
            } catch (error) {
                console.error('Fetch Error:', error);
                Swal.fire({
                    title: 'Error',
                    text: 'An error occurred. Please try again later.',
                    icon: 'error',
                    confirmButtonColor: '#1d63dc'
                });
            } finally {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalBtnText;
            }
        });
    };

    handleFormSubmission('partnershipForm', '/partnership');
    handleFormSubmission('consultingForm', '/consultation');
});
    // FAQ Accordion
    const faqItems = document.querySelectorAll('.faq-item');
    faqItems.forEach(item => {
        const header = item.querySelector('.faq-header');
        header.addEventListener('click', () => {
            const isActive = item.classList.contains('active');
            
            // Close all items
            faqItems.forEach(i => i.classList.remove('active'));
            
            // Toggle clicked item
            if (!isActive) {
                item.classList.add('active');
            }
        });
    });
