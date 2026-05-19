<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Individual Application - Maalem Education</title>
    <link rel="stylesheet" href="{{ secure_asset_v('css/style.css') }}">
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
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.05);
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
        input[type="url"],
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

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: var(--primary-color);
            background: #fff;
            box-shadow: 0 0 0 4px rgba(29, 99, 220, 0.1);
        }

        .checkbox-group,
        .radio-group {
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

        .participants-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            border: 2px solid #f1f5f9;
            border-radius: 12px;
            overflow: hidden;
            margin-top: 1rem;
        }

        .participants-table th,
        .participants-table td {
            padding: 1rem 1.2rem;
            text-align: left;
        }

        .participants-table th {
            background: #f8fafc;
            font-weight: 700;
            color: var(--text-color);
            border-bottom: 2px solid #f1f5f9;
        }

        .participants-table td {
            border-bottom: 1px solid #f1f5f9;
            background: #fff;
        }

        .participants-table tr:last-child td {
            border-bottom: none;
        }

        .participants-table input[type="number"] {
            padding: 0.6rem 0.8rem;
            border-radius: 8px;
            border: 2px solid #f1f5f9;
            width: 100%;
            max-width: 150px;
        }

        @media (max-width: 768px) {
            .grid-inputs {
                grid-template-columns: 1fr;
            }

            .form-group.full {
                grid-column: auto;
            }

            .form-container {
                padding: 2rem;
            }
        }

        @media (max-width: 600px) {
            .form-tabs {
                flex-direction: column;
                border-radius: 20px;
                padding: 10px;
            }

            .form-tabs .tab-btn {
                padding: 0.8rem !important;
                font-size: 0.9rem;
            }

            .participants-table,
            .participants-table thead,
            .participants-table tbody,
            .participants-table tr,
            .participants-table td {
                display: block;
                width: 100%;
            }

            .participants-table thead {
                display: none;
            }

            .participants-table tr {
                border-bottom: 2px solid #f1f5f9;
                padding: 1.25rem 1rem;
                background: #fff;
            }

            .participants-table tr:last-child {
                border-bottom: none;
            }

            .participants-table td:first-child {
                font-weight: 700;
                font-size: 1.05rem;
                color: var(--text-color);
                padding: 0 0 0.5rem 0;
                border: none;
            }

            .participants-table td:last-child {
                padding: 0;
                border: none;
            }

            .participants-table input[type="number"] {
                max-width: 100%;
                width: 100%;
                padding: 0.8rem 1rem;
            }
        }

        /* Validation style rules */
        .form-group.has-error input[type="text"],
        .form-group.has-error input[type="email"],
        .form-group.has-error input[type="number"],
        .form-group.has-error input[type="date"],
        .form-group.has-error select,
        .form-group.has-error textarea {
            border-color: #ef4444 !important;
            background-color: #fef2f2 !important;
        }

        .form-group.has-error .check-item {
            border-color: #ef4444 !important;
        }

        .error-message {
            color: #ef4444;
            font-size: 0.85rem;
            font-weight: 600;
            margin-top: 0.5rem;
            display: block;
        }
    </style>
</head>

<body>
    @include('partials.header')

    <main class="form-page">
        <div class="container">
            <div class="form-container">
                <img src="{{ secure_asset_v('assets/services/form_header_training.png') }}" alt="Teacher Training"
                    class="form-visual-header">

                <!-- Application Tabs -->
                <div class="form-tabs"
                    style="display: flex; gap: 10px; margin-bottom: 2rem; background: #f1f5f9; padding: 5px; border-radius: 15px;">
                    <button type="button" class="tab-btn active" data-type="individual"
                        style="flex: 1; padding: 1rem; border: none; border-radius: 12px; font-weight: 700; cursor: pointer; transition: all 0.3s;">Individual
                        Application</button>
                    <button type="button" class="tab-btn" data-type="bulk"
                        style="flex: 1; padding: 1rem; border: none; border-radius: 12px; font-weight: 700; cursor: pointer; transition: all 0.3s; background: transparent; color: var(--text-muted);">Bulk
                        / Organization Application</button>
                </div>

                <div class="form-header">
                    <p>MAALEM Integrated Educational Development Diploma</p>
                    <h1 id="formTitle">Individual Participant Application</h1>
                </div>

                <form id="applicationForm" action="{{ route('training.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="application_type" id="applicationType" value="individual">

                    <!-- INDIVIDUAL FORM FIELDS -->
                    <div class="individual-only">
                        <!-- Personal Information -->
                        <div class="form-section">
                            <h2><i class="fas fa-user"></i> Personal Information</h2>
                            <div class="grid-inputs">
                                <div class="form-group full">
                                    <label for="fullName">Full Name</label>
                                    <input type="text" id="fullName" name="fullName" data-required>
                                </div>
                                <div class="form-group">
                                    <label for="dob">Date of Birth</label>
                                    <input type="date" id="dob" name="dob" data-required>
                                </div>
                                <div class="form-group">
                                    <label for="nationality">Nationality</label>
                                    <input type="text" id="nationality" name="nationality" data-required>
                                </div>
                                <div class="form-group">
                                    <label for="mobile">Mobile Number</label>
                                    <input type="text" id="mobile" name="mobile" data-required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="email" id="email" name="email" data-required>
                                </div>
                                <div class="form-group full">
                                    <label for="cityCountry">Current City / Country</label>
                                    <input type="text" id="cityCountry" name="cityCountry" data-required>
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
                                        <label class="check-item"><input type="radio" name="position" value="Teacher">
                                            Teacher</label>
                                        <label class="check-item"><input type="radio" name="position"
                                                value="Coordinator"> Coordinator</label>
                                        <label class="check-item"><input type="radio" name="position" value="HOD"> Head
                                            of Department</label>
                                        <label class="check-item"><input type="radio" name="position" value="Leader">
                                            School Leader</label>
                                        <label class="check-item"><input type="radio" name="position" value="Staff">
                                            HR/Operations Staff</label>
                                    </div>
                                    <input type="text" name="positionOther" style="margin-top: 10px;"
                                        placeholder="Other position...">
                                </div>
                                <div class="form-group full">
                                    <label for="orgName">School / Organization Name</label>
                                    <input type="text" id="orgName" name="orgName" data-required>
                                </div>
                                <div class="form-group full">
                                    <label>Years of Experience</label>
                                    <div class="radio-group">
                                        <label class="check-item"><input type="radio" name="experience" value="0-2"> 0–2
                                            Years</label>
                                        <label class="check-item"><input type="radio" name="experience" value="3-5"> 3–5
                                            Years</label>
                                        <label class="check-item"><input type="radio" name="experience" value="6-10">
                                            6–10 Years</label>
                                        <label class="check-item"><input type="radio" name="experience" value="10+"> 10+
                                            Years</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="qualification">Educational Qualification</label>
                                    <input type="text" id="qualification" name="qualification">
                                </div>
                                <div class="form-group">
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
                                    <label class="check-item"><input type="radio" name="pathway" value="Teaching">
                                        Teaching Excellence Pathway</label>
                                    <label class="check-item"><input type="radio" name="pathway" value="Leadership">
                                        Educational Leadership Pathway</label>
                                    <label class="check-item"><input type="radio" name="pathway" value="Operations">
                                        School Operations & Administration Pathway</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label id="levelLabel">Preferred Level / Track</label>
                                <div id="track-Teaching" style="margin-bottom: 1.5rem;">
                                    <p
                                        style="font-weight: 700; font-size: 0.9rem; margin-bottom: 0.5rem; color: var(--text-light);">
                                        Teaching Pathway</p>
                                    <div class="checkbox-group">
                                        <label class="check-item"><input type="checkbox" name="levels[]" value="T1">
                                            Level 1 – Certified Practitioner</label>
                                        <label class="check-item"><input type="checkbox" name="levels[]" value="T2">
                                            Level 2 – Advanced Practitioner</label>
                                        <label class="check-item"><input type="checkbox" name="levels[]" value="T3">
                                            Level 3 – Instructional Leader</label>
                                    </div>
                                </div>
                                <div id="track-Leadership" style="margin-bottom: 1.5rem;">
                                    <p
                                        style="font-weight: 700; font-size: 0.9rem; margin-bottom: 0.5rem; color: var(--text-light);">
                                        Leadership Pathway</p>
                                    <div class="checkbox-group">
                                        <label class="check-item"><input type="checkbox" name="levels[]" value="LD">
                                            Educational Leadership Diploma</label>
                                    </div>
                                </div>
                                <div id="track-Operations">
                                    <p
                                        style="font-weight: 700; font-size: 0.9rem; margin-bottom: 0.5rem; color: var(--text-light);">
                                        School Operations Pathway</p>
                                    <div class="checkbox-group">
                                        <label class="check-item"><input type="checkbox" name="levels[]" value="HR"> HR
                                            for Schools</label>
                                        <label class="check-item"><input type="checkbox" name="levels[]" value="FIN">
                                            Finance & Budgeting</label>
                                        <label class="check-item"><input type="checkbox" name="levels[]" value="SA">
                                            Student Affairs & Culture</label>
                                        <label class="check-item"><input type="checkbox" name="levels[]" value="MKT">
                                            Marketing & Admissions</label>
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
                        <div class="form-section">
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
                        <div class="form-section">
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
                                <input type="text" name="aiDetails"
                                    placeholder="e.g. ChatGPT, Canvas, Google Classroom...">
                            </div>
                        </div>
                    </div>

                    <!-- BULK FORM FIELDS -->
                    <div class="bulk-only" style="display: none;">
                        <!-- School Information -->
                        <div class="form-section">
                            <h2><i class="fas fa-school"></i> School Information</h2>
                            <div class="grid-inputs">
                                <div class="form-group full">
                                    <label for="bulkSchoolName">School Name</label>
                                    <input type="text" id="bulkSchoolName" name="schoolName"
                                        placeholder="Enter school name" data-required>
                                </div>
                                <div class="form-group full">
                                    <label>School Type</label>
                                    <div class="checkbox-group">
                                        <label class="check-item"><input type="checkbox" name="schoolType[]"
                                                value="National"> National</label>
                                        <label class="check-item"><input type="checkbox" name="schoolType[]"
                                                value="International"> International</label>
                                        <label class="check-item"><input type="checkbox" name="schoolType[]"
                                                value="Language"> Language School</label>
                                        <label class="check-item"><input type="checkbox" name="schoolType[]"
                                                value="Private"> Private</label>
                                    </div>
                                    <input type="text" name="schoolTypeOther" style="margin-top: 10px;"
                                        placeholder="Other type...">
                                </div>

                                <div class="form-group full">
                                    <label for="bulkSchoolAddress">School Address</label>
                                    <input type="text" id="bulkSchoolAddress" name="schoolAddress"
                                        placeholder="Street address" data-required>
                                </div>
                                <div class="form-group">
                                    <label for="bulkCityCountry">City / Country</label>
                                    <input type="text" id="bulkCityCountry" name="cityCountry"
                                        placeholder="e.g. Cairo, Egypt" data-required>
                                </div>
                                <div class="form-group">
                                    <label for="bulkWebsite">Website / Social Media</label>
                                    <input type="url" id="bulkWebsite" name="website" placeholder="https://...">
                                </div>
                            </div>
                        </div>

                        <!-- Primary Contact -->
                        <div class="form-section">
                            <h2><i class="fas fa-user-tie"></i> Primary Contact Person</h2>
                            <div class="grid-inputs">
                                <div class="form-group">
                                    <label for="bulkFullName">Full Name</label>
                                    <input type="text" id="bulkFullName" name="fullName" data-required>
                                </div>
                                <div class="form-group">
                                    <label for="bulkPosition">Position</label>
                                    <input type="text" id="bulkPosition" name="position" data-required>
                                </div>
                                <div class="form-group">
                                    <label for="bulkMobile">Mobile Number</label>
                                    <input type="text" id="bulkMobile" name="mobile" data-required>
                                </div>
                                <div class="form-group">
                                    <label for="bulkEmail">Email Address</label>
                                    <input type="email" id="bulkEmail" name="email" data-required>
                                </div>
                            </div>
                        </div>

                        <!-- School Profile -->
                        <div class="form-section">
                            <h2><i class="fas fa-chart-pie"></i> School Profile</h2>
                            <div class="grid-inputs">
                                <div class="form-group">
                                    <label for="bulkTotalStaff">Total Number of Staff</label>
                                    <input type="number" id="bulkTotalStaff" name="totalStaff">
                                </div>
                                <div class="form-group">
                                    <label for="bulkTotalTeachers">Total Number of Teachers</label>
                                    <input type="number" id="bulkTotalTeachers" name="totalTeachers">
                                </div>
                                <div class="form-group full">
                                    <label>Current Educational Curriculum</label>
                                    <div class="checkbox-group">
                                        <label class="check-item"><input type="checkbox" name="curriculum[]"
                                                value="National"> National</label>
                                        <label class="check-item"><input type="checkbox" name="curriculum[]"
                                                value="British"> British</label>
                                        <label class="check-item"><input type="checkbox" name="curriculum[]"
                                                value="American"> American</label>
                                        <label class="check-item"><input type="checkbox" name="curriculum[]" value="IB">
                                            IB</label>
                                    </div>
                                    <input type="text" name="curriculumOther" style="margin-top: 10px;"
                                        placeholder="Other curriculum...">
                                </div>
                            </div>
                        </div>

                        <!-- Partnership Interest -->
                        <div class="form-section">
                            <h2><i class="fas fa-handshake"></i> Partnership Interest</h2>
                            <div class="form-group">
                                <label>Requested Pathways</label>
                                <div class="checkbox-group" style="grid-template-columns: 1fr;">
                                    <label class="check-item"><input type="checkbox" name="pathways[]" value="Teaching">
                                        Teaching Excellence Pathway</label>
                                    <label class="check-item"><input type="checkbox" name="pathways[]"
                                            value="Leadership"> Educational Leadership Pathway</label>
                                    <label class="check-item"><input type="checkbox" name="pathways[]"
                                            value="Operations"> School Operations & Administration Pathway</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Estimated Number of Participants</label>
                                <table class="participants-table">
                                    <thead>
                                        <tr>
                                            <th>Program</th>
                                            <th>Number of Participants</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td data-label="Program">Teaching Pathway</td>
                                            <td data-label="Number of Participants"><input type="number"
                                                    name="participants[Teaching]" min="0"></td>
                                        </tr>
                                        <tr>
                                            <td data-label="Program">Leadership Pathway</td>
                                            <td data-label="Number of Participants"><input type="number"
                                                    name="participants[Leadership]" min="0"></td>
                                        </tr>
                                        <tr>
                                            <td data-label="Program">Operations Pathway</td>
                                            <td data-label="Number of Participants"><input type="number"
                                                    name="participants[Operations]" min="0"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Target Departments -->
                        <div class="form-section">
                            <h2><i class="fas fa-sitemap"></i> Target Departments</h2>
                            <div class="checkbox-group">
                                <label class="check-item"><input type="checkbox" name="departments[]" value="Teachers">
                                    Teachers</label>
                                <label class="check-item"><input type="checkbox" name="departments[]"
                                        value="Coordinators"> Coordinators</label>
                                <label class="check-item"><input type="checkbox" name="departments[]"
                                        value="Middle Leadership"> Middle Leadership</label>
                                <label class="check-item"><input type="checkbox" name="departments[]"
                                        value="Senior Leadership"> Senior Leadership</label>
                                <label class="check-item"><input type="checkbox" name="departments[]" value="HR"> HR
                                    Department</label>
                                <label class="check-item"><input type="checkbox" name="departments[]" value="Finance">
                                    Finance Department</label>
                                <label class="check-item"><input type="checkbox" name="departments[]"
                                        value="Admissions"> Admissions & Marketing</label>
                                <label class="check-item"><input type="checkbox" name="departments[]"
                                        value="Student Affairs"> Student Affairs</label>
                            </div>
                        </div>

                        <!-- Preferred Delivery Model -->
                        <div class="form-section">
                            <h2><i class="fas fa-truck-fast"></i> Preferred Delivery Model</h2>
                            <div class="radio-group">
                                <label class="check-item"><input type="radio" name="delivery" value="On-Site"> On-Site
                                    Training at School</label>
                                <label class="check-item"><input type="radio" name="delivery" value="Online"> Online
                                    Training</label>
                                <label class="check-item"><input type="radio" name="delivery" value="Hybrid"> Hybrid
                                    Model</label>
                            </div>
                        </div>

                        <!-- Preferred Timeline -->
                        <div class="form-section">
                            <h2><i class="fas fa-calendar-alt"></i> Preferred Timeline</h2>
                            <div class="grid-inputs">
                                <div class="form-group">
                                    <label for="bulkStartDate">Preferred Start Date</label>
                                    <input type="date" id="bulkStartDate" name="startDate">
                                </div>
                                <div class="form-group full">
                                    <label>Preferred Training Period</label>
                                    <div class="checkbox-group">
                                        <label class="check-item"><input type="checkbox" name="period[]" value="Summer">
                                            Summer</label>
                                        <label class="check-item"><input type="checkbox" name="period[]"
                                                value="Academic Year"> Academic Year</label>
                                        <label class="check-item"><input type="checkbox" name="period[]"
                                                value="Mid-Year"> Mid-Year</label>
                                        <label class="check-item"><input type="checkbox" name="period[]"
                                                value="Flexible"> Flexible</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Priorities -->
                        <div class="form-section">
                            <h2><i class="fas fa-star"></i> School Development Priorities</h2>
                            <div class="checkbox-group">
                                <label class="check-item"><input type="checkbox" name="priorities[]" value="Teaching">
                                    Teaching & Learning Quality</label>
                                <label class="check-item"><input type="checkbox" name="priorities[]" value="Leadership">
                                    Leadership Development</label>
                                <label class="check-item"><input type="checkbox" name="priorities[]" value="AI"> AI
                                    Integration</label>
                                <label class="check-item"><input type="checkbox" name="priorities[]" value="HR">
                                    Recruitment & HR Systems</label>
                                <label class="check-item"><input type="checkbox" name="priorities[]" value="Operations">
                                    School Operations</label>
                                <label class="check-item"><input type="checkbox" name="priorities[]" value="Finance">
                                    Financial Planning</label>
                                <label class="check-item"><input type="checkbox" name="priorities[]" value="Parent">
                                    Parent Experience</label>
                                <label class="check-item"><input type="checkbox" name="priorities[]" value="Student">
                                    Student Culture & Safeguarding</label>
                                <label class="check-item"><input type="checkbox" name="priorities[]" value="Curriculum">
                                    Curriculum Leadership</label>
                                <label class="check-item"><input type="checkbox" name="priorities[]"
                                        value="Accreditation"> Accreditation Readiness</label>
                            </div>
                        </div>

                        <!-- Notes -->
                        <div class="form-section">
                            <h2><i class="fas fa-comment-alt"></i> Additional Notes</h2>
                            <textarea name="notes" rows="4"
                                placeholder="Any custom requests or additional information..."></textarea>
                        </div>

                    </div>

                    <!-- Declaration (Common/Dynamic Signature) -->
                    <div class="form-section">
                        <h2><i class="fas fa-file-contract"></i> Declaration</h2>
                        <p id="declarationText"
                            style="margin-bottom: 1.5rem; font-size: 0.95rem; color: var(--text-light);">I confirm that
                            all information provided is accurate and complete.</p>
                        <div class="grid-inputs">
                            <div class="form-group bulk-only" style="display: none;">
                                <label>Authorized Representative Name</label>
                                <input type="text" id="bulkRepName" name="repName" data-required>
                            </div>
                            <div class="form-group bulk-only" style="display: none;">
                                <label>Position</label>
                                <input type="text" id="bulkRepPosition" name="repPosition" data-required>
                            </div>
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
        document.addEventListener('DOMContentLoaded', function () {
            const tabBtns = document.querySelectorAll('.tab-btn');
            const applicationType = document.getElementById('applicationType');
            const formTitle = document.getElementById('formTitle');
            const signatureLabel = document.getElementById('signatureLabel');
            const individualOnly = document.querySelectorAll('.individual-only');
            const bulkOnly = document.querySelectorAll('.bulk-only');

            // Dynamic required validation toggle function
            const toggleRequiredFields = (activeType) => {
                if (activeType === 'bulk') {
                    // Disable all individual fields so they are excluded from submission
                    document.querySelectorAll('.individual-only input, .individual-only select, .individual-only textarea').forEach(el => {
                        el.disabled = true;
                        el.removeAttribute('required');
                    });
                    // Enable all bulk fields
                    document.querySelectorAll('.bulk-only input, .bulk-only select, .bulk-only textarea').forEach(el => {
                        el.disabled = false;
                        if (el.hasAttribute('data-required')) {
                            el.setAttribute('required', 'required');
                        }
                    });
                } else {
                    // Disable all bulk fields so they are excluded from submission
                    document.querySelectorAll('.bulk-only input, .bulk-only select, .bulk-only textarea').forEach(el => {
                        el.disabled = true;
                        el.removeAttribute('required');
                    });
                    // Enable all individual fields
                    document.querySelectorAll('.individual-only input, .individual-only select, .individual-only textarea').forEach(el => {
                        el.disabled = false;
                        if (el.hasAttribute('data-required')) {
                            el.setAttribute('required', 'required');
                        }
                    });
                }
            };

            // Set initial validation state
            toggleRequiredFields('individual');

            // Pathway selection toggle logic for levels
            const pathwayRadios = document.querySelectorAll('input[name="pathway"]');
            const trackTeaching = document.getElementById('track-Teaching');
            const trackLeadership = document.getElementById('track-Leadership');
            const trackOperations = document.getElementById('track-Operations');
            const levelLabel = document.getElementById('levelLabel');

            function updateLevelsVisibility() {
                let selectedValue = '';
                pathwayRadios.forEach(radio => {
                    if (radio.checked) {
                        selectedValue = radio.value;
                    }
                });

                // Hide all initially
                if (trackTeaching) trackTeaching.style.display = 'none';
                if (trackLeadership) trackLeadership.style.display = 'none';
                if (trackOperations) trackOperations.style.display = 'none';
                if (levelLabel) levelLabel.style.display = 'none';

                // Show selected track and the main label
                if (selectedValue === 'Teaching') {
                    if (trackTeaching) trackTeaching.style.display = 'block';
                    if (levelLabel) levelLabel.style.display = 'block';
                } else if (selectedValue === 'Leadership') {
                    if (trackLeadership) trackLeadership.style.display = 'block';
                    if (levelLabel) levelLabel.style.display = 'block';
                } else if (selectedValue === 'Operations') {
                    if (trackOperations) trackOperations.style.display = 'block';
                    if (levelLabel) levelLabel.style.display = 'block';
                }

                // Uncheck checkboxes in hidden tracks
                const tracks = {
                    'Teaching': trackTeaching,
                    'Leadership': trackLeadership,
                    'Operations': trackOperations
                };
                Object.keys(tracks).forEach(key => {
                    if (key !== selectedValue && tracks[key]) {
                        tracks[key].querySelectorAll('input[type="checkbox"]').forEach(cb => {
                            cb.checked = false;
                        });
                    }
                });
            }

            pathwayRadios.forEach(radio => {
                radio.addEventListener('change', updateLevelsVisibility);
            });

            // Initialize on load
            updateLevelsVisibility();

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

                    toggleRequiredFields(type);

                    const decText = document.getElementById('declarationText');
                    if (type === 'bulk') {
                        formTitle.innerText = 'Bulk / Organization Application';
                        signatureLabel.innerText = 'Representative Signature (Type Full Name)';
                        if (decText) decText.innerText = 'We confirm our interest in participating in the MAALEM Integrated Educational Development Diploma programs and confirm that all information provided is accurate and complete.';
                        individualOnly.forEach(el => el.style.display = 'none');
                        bulkOnly.forEach(el => el.style.display = 'block');
                    } else {
                        formTitle.innerText = 'Individual Participant Application';
                        signatureLabel.innerText = 'Applicant Signature (Type Full Name)';
                        if (decText) decText.innerText = 'I confirm that all information provided is accurate and complete.';
                        individualOnly.forEach(el => el.style.display = 'block');
                        bulkOnly.forEach(el => el.style.display = 'none');
                    }
                });
            });

            // Handle form submission
            const form = document.getElementById('applicationForm');
            form.addEventListener('submit', function (e) {
                e.preventDefault();

                const submitBtn = form.querySelector('button[type="submit"]');
                const originalBtnText = submitBtn ? submitBtn.innerHTML : 'Submit Application';

                if (submitBtn) {
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Submitting...';
                }

                const restoreSubmitBtn = () => {
                    if (submitBtn) {
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = originalBtnText;
                    }
                };

                // Clear previous errors
                form.querySelectorAll('.form-group').forEach(group => {
                    group.classList.remove('has-error');
                    const errEl = group.querySelector('.error-message');
                    if (errEl) errEl.remove();
                });

                // Collect and serialize form data, including tables
                const formData = new FormData(form);
                const data = {};

                formData.forEach((value, key) => {
                    const cleanKey = key.endsWith('[]') ? key.slice(0, -2) : key;
                    if (data[cleanKey]) {
                        if (!Array.isArray(data[cleanKey])) {
                            data[cleanKey] = [data[cleanKey]];
                        }
                        data[cleanKey].push(value);
                    } else {
                        data[cleanKey] = key.endsWith('[]') ? [value] : value;
                    }
                });

                // Special handling for participant count table in bulk training
                if (applicationType.value === 'bulk') {
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
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify(data)
                })
                    .then(response => response.json())
                    .then(result => {
                        restoreSubmitBtn();
                        if (result.success) {
                            Swal.fire({
                                title: 'Success!',
                                text: 'Your application has been submitted successfully.',
                                icon: 'success',
                                confirmButtonColor: '#1d63dc'
                            }).then(() => {
                                window.location.href = "{{ url('/') }}";
                            });
                        } else {
                            // Clear previous errors just in case
                            form.querySelectorAll('.form-group').forEach(group => {
                                group.classList.remove('has-error');
                                const errEl = group.querySelector('.error-message');
                                if (errEl) errEl.remove();
                            });

                            if (result.errors) {
                                Object.keys(result.errors).forEach(key => {
                                    const input = form.querySelector(`[name="${key}"], [name="${key}[]"]`);
                                    if (input) {
                                        const formGroup = input.closest('.form-group');
                                        if (formGroup) {
                                            formGroup.classList.add('has-error');
                                            let errorSpan = formGroup.querySelector('.error-message');
                                            if (!errorSpan) {
                                                errorSpan = document.createElement('span');
                                                errorSpan.className = 'error-message';
                                                formGroup.appendChild(errorSpan);
                                            }
                                            errorSpan.innerHTML = result.errors[key].join('<br>');
                                        }
                                    }
                                });

                                // Scroll to first error
                                const firstError = form.querySelector('.has-error');
                                if (firstError) {
                                    firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                                }

                                Swal.fire({
                                    title: 'Validation Error',
                                    text: 'Please correct the highlighted fields in the form.',
                                    icon: 'error',
                                    confirmButtonColor: '#1d63dc'
                                });
                            } else {
                                Swal.fire({
                                    title: 'Error',
                                    text: result.message || 'Something went wrong. Please try again.',
                                    icon: 'error',
                                    confirmButtonColor: '#1d63dc'
                                });
                            }
                        }
                    })
                    .catch(error => {
                        restoreSubmitBtn();
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