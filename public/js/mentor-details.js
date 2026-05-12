document.addEventListener('DOMContentLoaded', () => {
    // Get mentor ID from URL parameters
    const urlParams = new URLSearchParams(window.location.search);
    const mentorId = urlParams.get('id');

    const layout = document.getElementById('mentorLayout');
    const errorState = document.getElementById('errorState');

    if (!mentorId) {
        layout.style.display = 'none';
        errorState.style.display = 'block';
        return;
    }

    // Find mentor in data array (loaded from bios.js)
    const mentor = mentorsData.find(m => m.id === mentorId);

    if (!mentor) {
        layout.style.display = 'none';
        errorState.style.display = 'block';
        return;
    }

    // Populate the DOM
    const safeSetText = (id, text) => {
        const el = document.getElementById(id);
        if (el) el.textContent = text;
    };

    const safeSetHtml = (id, html) => {
        const el = document.getElementById(id);
        if (el) el.innerHTML = html;
    };

    if (document.getElementById('mentorImage')) {
        document.getElementById('mentorImage').src = mentor.image;
    }

    document.title = `${mentor.name} - Maalem Education`;
    
    safeSetText('mentorName', mentor.name);
    safeSetText('mentorRole', mentor.role);
    safeSetHtml('mentorBio', mentor.bio);
    
    // Stats
    safeSetText('statCourses', mentor.stats.courses);
    safeSetText('statReviews', mentor.stats.reviews);
    safeSetText('statExperience', mentor.stats.experience);
    safeSetText('statSubject', mentor.stats.subject);

    // Contact Info
    safeSetText('contactAddress', mentor.contact.address);
    safeSetText('contactEmail', mentor.contact.email);
    safeSetText('contactPhone', mentor.contact.phone);
});
