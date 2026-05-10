document.addEventListener('DOMContentLoaded', () => {
    // Header Glassmorphism and Show/Hide on Scroll
    const header = document.querySelector('header');
    let lastScrollY = window.scrollY;

    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            header.style.background = 'rgba(255, 255, 255, 0.9)';
            header.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.05)';
        } else {
            header.style.background = 'rgba(255, 255, 255, 0.85)';
            header.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.03)';
        }

        // Hide on scroll down, show on scroll up
        if (window.scrollY > lastScrollY && window.scrollY > 150) {
            header.style.transform = 'translateY(-100%)';
        } else {
            header.style.transform = 'translateY(0)';
        }
        lastScrollY = window.scrollY;
    });

    // Preloader Logic
    const preloader = document.getElementById('preloader');
    const preloaderVideo = document.getElementById('preloaderVideo');
    if (preloader && preloaderVideo) {
        preloaderVideo.addEventListener('ended', () => {
            preloader.classList.add('hidden');
            setTimeout(() => {
                preloader.style.display = 'none';
            }, 500); // wait for fade out transition
        });
        
        // Fallback just in case video fails to play/end
        setTimeout(() => {
            if (!preloader.classList.contains('hidden')) {
                preloader.classList.add('hidden');
                setTimeout(() => preloader.style.display = 'none', 500);
            }
        }, 5000);
    }

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
    const rotatingCircle = document.getElementById('rotatingCircle');
    if (rotatingCircle) {
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
        rotatingCircle.innerHTML = svgContent;

        // Rotation logic
        window.addEventListener('scroll', () => {
            const scrollPosition = window.scrollY;
            const rotation = scrollPosition * 0.5; // Adjust speed as needed
            rotatingCircle.style.transform = `rotate(${rotation}deg)`;
        });
    }

    // Scroll Reveal Animation
    const revealElements = document.querySelectorAll('.reveal');
    const revealOnScroll = () => {
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
