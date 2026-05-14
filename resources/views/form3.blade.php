<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Individual Application - Maalem Education</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .form-page {
            padding: 10rem 0 6rem;
            background-color: #f8fafc;
        }
        .form-container {
            max-width: 900px;
            margin: 0 auto;
            background: #fff;
            padding: 4rem;
            border-radius: 40px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.05);
        }
        .form-header {
            text-align: center;
            margin-bottom: 4rem;
        }
        .form-header h1 {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--text-color);
            margin-bottom: 1rem;
        }
        .form-header p {
            color: var(--primary-color);
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
        .form-section {
            margin-bottom: 3.5rem;
            padding-bottom: 2rem;
            border-bottom: 1px solid #f1f5f9;
        }
        .form-section:last-child {
            border-bottom: none;
        }
        .form-section h2 {
            font-size: 1.5rem;
            font-weight: 800;
            margin-bottom: 2rem;
            color: var(--primary-color);
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .grid-inputs {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .form-group.full {
            grid-column: span 2;
        }
        label {
            display: block;
            font-weight: 700;
            margin-bottom: 0.6rem;
            color: var(--text-color);
            font-size: 0.95rem;
        }
        input[type="text"],
        input[type="email"],
        input[type="number"],
        input[type="date"],
        select,
        textarea {
            width: 100%;
            padding: 1rem 1.2rem;
            border: 2px solid #f1f5f9;
            border-radius: 12px;
            font-family: inherit;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #f8fafc;
        }
        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: var(--primary-color);
            background: #fff;
            box-shadow: 0 0 0 4px rgba(29, 99, 220, 0.1);
        }
        .checkbox-group, .radio-group {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 1rem;
        }
        .check-item {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            padding: 0.8rem 1rem;
            border: 1px solid #f1f5f9;
            border-radius: 10px;
            transition: all 0.2s ease;
            font-size: 0.9rem;
        }
        .check-item:hover {
            background: #eff6ff;
            border-color: var(--primary-color);
        }
        .check-item input {
            width: 18px;
            height: 18px;
            accent-color: var(--primary-color);
        }
        .btn-submit {
            width: 100%;
            padding: 1.5rem;
            background: var(--primary-color);
            color: #fff;
            border: none;
            border-radius: 15px;
            font-size: 1.1rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 2rem;
        }
        .btn-submit:hover {
            background: #154ea3;
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(29, 99, 220, 0.3);
        }
        @media (max-width: 768px) {
            .grid-inputs { grid-template-columns: 1fr; }
            .form-group.full { grid-column: auto; }
            .form-container { padding: 2rem; }
        }
    </style>
</head>
<body>
    @include('partials.header')

    <main class="form-page">
        <div class="container">
            <div class="form-container">
                <img src="{{ asset('assets/services/form_header_training.png') }}" alt="Teacher Training" class="form-visual-header">
                
                <!-- Application Tabs -->
                <div class="form-tabs" style="display: flex; gap: 10px; margin-bottom: 2rem; background: #f1f5f9; padding: 5px; border-radius: 15px;">
                    <button type="button" class="tab-btn active" data-type="individual" style="flex: 1; padding: 1rem; border: none; border-radius: 12px; font-weight: 700; cursor: pointer; transition: all 0.3s;">Individual Application</button>
                    <button type="button" class="tab-btn" data-type="bulk" style="flex: 1; padding: 1rem; border: none; border-radius: 12px; font-weight: 700; cursor: pointer; transition: all 0.3s; background: transparent; color: var(--text-muted);">Bulk / Organization Application</button>
                </div>

                <div class="form-header">
                    <p>MAALEM Integrated Educational Development Diploma</p>
                    <h1 id="formTitle">Individual Participant Application</h1>
                </div>

                <form id="applicationForm" action="{{ route('training.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="application_type" id="applicationType" value="individual">
                    <!-- Personal Information -->
                    <div class="form-section">
                        <h2><i class="fas fa-user"></i> Personal Information</h2>
                        <div class="grid-inputs">
                            <div class="form-group full">
                                <label for="fullName">Full Name</label>
                                <input type="text" id="fullName" name="fullName" required>
                            </div>
                            <div class="form-group individual-only">
                                <label for="dob">Date of Birth</label>
                                <input type="date" id="dob" name="dob">
                            </div>
                            <div class="form-group individual-only">
                                <label for="nationality">Nationality</label>
                                <input type="text" id="nationality" name="nationality">
                            </div>
                            <div class="form-group bulk-only" style="display: none;">
                                <label for="participantCount">Expected Number of Participants</label>
                                <input type="number" id="participantCount" name="participant_count" min="1">
                            </div>
                            <div class="form-group">
                                <label for="mobile">Mobile Number</label>
                                <input type="text" id="mobile" name="mobile" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" id="email" name="email" required>
                            </div>
                            <div class="form-group full">
                                <label for="cityCountry">Current City / Country</label>
                                <input type="text" id="cityCountry" name="cityCountry" required>
                            </div>
                        </div>
                    </div>

                    <!-- Professional Information -->
                    <div class="form-section">
                        <h2><i class="fas fa-briefcase"></i> Professional Information</h2>
                        <div class="grid-inputs">
                            <div class="form-group full">
                                <label>Current Position</label>
                                <div class="checkbox-group">
                                    <label class="check-item"><input type="radio" name="position" value="Teacher"> Teacher</label>
                                    <label class="check-item"><input type="radio" name="position" value="Coordinator"> Coordinator</label>
                                    <label class="check-item"><input type="radio" name="position" value="HOD"> Head of Department</label>
                                    <label class="check-item"><input type="radio" name="position" value="Leader"> School Leader</label>
                                    <label class="check-item"><input type="radio" name="position" value="Staff"> HR/Operations Staff</label>
                                </div>
                                <input type="text" name="positionOther" style="margin-top: 10px;" placeholder="Other position...">
                            </div>
                            <div class="form-group full">
                                <label for="orgName">School / Organization Name</label>
                                <input type="text" id="orgName" name="orgName" required>
                            </div>
                            <div class="form-group full individual-only">
                                <label>Years of Experience</label>
                                <div class="radio-group">
                                    <label class="check-item"><input type="radio" name="experience" value="0-2"> 0–2 Years</label>
                                    <label class="check-item"><input type="radio" name="experience" value="3-5"> 3–5 Years</label>
                                    <label class="check-item"><input type="radio" name="experience" value="6-10"> 6–10 Years</label>
                                    <label class="check-item"><input type="radio" name="experience" value="10+"> 10+ Years</label>
                                </div>
                            </div>
                            <div class="form-group individual-only">
                                <label for="qualification">Educational Qualification</label>
                                <input type="text" id="qualification" name="qualification">
                            </div>
                            <div class="form-group individual-only">
                                <label for="specialization">Subject / Specialization</label>
                                <input type="text" id="specialization" name="specialization">
                            </div>
                        </div>
                    </div>

                    <!-- Program Selection -->
                    <div class="form-section">
                        <h2><i class="fas fa-graduation-cap"></i> Program Selection</h2>
                        <div class="form-group">
                            <label>Preferred Pathway</label>
                            <div class="checkbox-group" style="grid-template-columns: 1fr;">
                                <label class="check-item"><input type="radio" name="pathway" value="Teaching"> Teaching Excellence Pathway</label>
                                <label class="check-item"><input type="radio" name="pathway" value="Leadership"> Educational Leadership Pathway</label>
                                <label class="check-item"><input type="radio" name="pathway" value="Operations"> School Operations & Administration Pathway</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Preferred Level / Track</label>
                            <div style="margin-bottom: 1.5rem;">
                                <p style="font-weight: 700; font-size: 0.9rem; margin-bottom: 0.5rem; color: var(--text-light);">Teaching Pathway</p>
                                <div class="checkbox-group">
                                    <label class="check-item"><input type="checkbox" name="levels[]" value="T1"> Level 1 – Certified Practitioner</label>
                                    <label class="check-item"><input type="checkbox" name="levels[]" value="T2"> Level 2 – Advanced Practitioner</label>
                                    <label class="check-item"><input type="checkbox" name="levels[]" value="T3"> Level 3 – Instructional Leader</label>
                                </div>
                            </div>
                            <div style="margin-bottom: 1.5rem;">
                                <p style="font-weight: 700; font-size: 0.9rem; margin-bottom: 0.5rem; color: var(--text-light);">Leadership Pathway</p>
                                <div class="checkbox-group">
                                    <label class="check-item"><input type="checkbox" name="levels[]" value="LD"> Educational Leadership Diploma</label>
                                </div>
                            </div>
                            <div>
                                <p style="font-weight: 700; font-size: 0.9rem; margin-bottom: 0.5rem; color: var(--text-light);">School Operations Pathway</p>
                                <div class="checkbox-group">
                                    <label class="check-item"><input type="checkbox" name="levels[]" value="HR"> HR for Schools</label>
                                    <label class="check-item"><input type="checkbox" name="levels[]" value="FIN"> Finance & Budgeting</label>
                                    <label class="check-item"><input type="checkbox" name="levels[]" value="SA"> Student Affairs & Culture</label>
                                    <label class="check-item"><input type="checkbox" name="levels[]" value="MKT"> Marketing & Admissions</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Learning Preferences -->
                    <div class="form-section">
                        <h2><i class="fas fa-clock"></i> Learning Preferences</h2>
                        <div class="grid-inputs">
                            <div class="form-group">
                                <label>Preferred Learning Mode</label>
                                <select name="mode">
                                    <option value="Hybrid">Hybrid</option>
                                    <option value="Online">Online</option>
                                    <option value="Face-to-Face">Face-to-Face</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Preferred Schedule</label>
                                <select name="schedule">
                                    <option value="Weekdays">Weekdays</option>
                                    <option value="Weekends">Weekends</option>
                                    <option value="Evening">Evening Sessions</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Motivation -->
                    <div class="form-section individual-only">
                        <h2><i class="fas fa-pencil-alt"></i> Professional Motivation</h2>
                        <div class="form-group">
                            <label>Why are you interested in joining this diploma program?</label>
                            <textarea name="motivation" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <label>What professional goals do you hope to achieve?</label>
                            <textarea name="goals" rows="4"></textarea>
                        </div>
                    </div>

                    <!-- Technology & AI -->
                    <div class="form-section individual-only">
                        <h2><i class="fas fa-microchip"></i> Technology & AI Readiness</h2>
                        <div class="form-group">
                            <label>Have you previously used educational technology or AI tools?</label>
                            <div class="radio-group" style="width: 200px;">
                                <label class="check-item"><input type="radio" name="ai" value="Yes"> Yes</label>
                                <label class="check-item"><input type="radio" name="ai" value="No"> No</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>If yes, please specify:</label>
                            <input type="text" name="aiDetails" placeholder="e.g. ChatGPT, Canvas, Google Classroom...">
                        </div>
                    </div>

                    <!-- Declaration -->
                    <div class="form-section">
                        <h2><i class="fas fa-file-contract"></i> Declaration</h2>
                        <p style="margin-bottom: 1.5rem; font-size: 0.95rem; color: var(--text-light);">I confirm that all information provided is accurate and complete.</p>
                        <div class="grid-inputs">
                            <div class="form-group">
                                <label id="signatureLabel">Applicant Signature (Type Full Name)</label>
                                <input type="text" name="signature" required>
                            </div>
                            <div class="form-group">
                                <label>Date</label>
                                <input type="date" name="date" required>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn-submit">Submit Application</button>
                </form>
            </div>
        </div>
    </main>

    @include('partials.footer')
    @include('partials.scripts')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabBtns = document.querySelectorAll('.tab-btn');
            const applicationType = document.getElementById('applicationType');
            const formTitle = document.getElementById('formTitle');
            const signatureLabel = document.getElementById('signatureLabel');
            const individualOnly = document.querySelectorAll('.individual-only');
            const bulkOnly = document.querySelectorAll('.bulk-only');

            tabBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    // Update tabs UI
                    tabBtns.forEach(b => {
                        b.classList.remove('active');
                        b.style.background = 'transparent';
                        b.style.color = 'var(--text-muted)';
                    });
                    btn.classList.add('active');
                    btn.style.background = '#fff';
                    btn.style.color = 'var(--primary-color)';
                    btn.style.boxShadow = '0 4px 12px rgba(0,0,0,0.05)';

                    const type = btn.getAttribute('data-type');
                    applicationType.value = type;

                    if (type === 'bulk') {
                        formTitle.innerText = 'Bulk / Organization Application';
                        signatureLabel.innerText = 'Representative Signature (Type Full Name)';
                        individualOnly.forEach(el => el.style.display = 'none');
                        bulkOnly.forEach(el => el.style.display = 'block');
                        
                        // Remove required from hidden fields
                        document.getElementById('dob').required = false;
                        document.getElementById('nationality').required = false;
                    } else {
                        formTitle.innerText = 'Individual Participant Application';
                        signatureLabel.innerText = 'Applicant Signature (Type Full Name)';
                        individualOnly.forEach(el => el.style.display = 'block');
                        bulkOnly.forEach(el => el.style.display = 'none');
                        
                        // Restore required
                        document.getElementById('dob').required = true;
                        document.getElementById('nationality').required = true;
                    }
                });
            });

            // Handle form submission
            const form = document.getElementById('applicationForm');
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const formData = new FormData(form);
                
                // Show loading
                Swal.fire({
                    title: 'Submitting...',
                    text: 'Please wait while we process your application',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                fetch("{{ route('training.store') }}", {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            title: 'Success!',
                            text: 'Your application has been submitted successfully.',
                            icon: 'success',
                            confirmButtonColor: '#1d63dc'
                        }).then(() => {
                            window.location.href = "{{ url('/') }}";
                        });
                    } else {
                        Swal.fire({
                            title: 'Error',
                            text: data.message || 'Something went wrong. Please try again.',
                            icon: 'error'
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire({
                        title: 'Error',
                        text: 'A server error occurred. Please try again later.',
                        icon: 'error'
                    });
                });
            });
        });
    </script>
</body>
</html>



