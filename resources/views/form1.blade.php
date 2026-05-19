<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Partnership Form - Maalem Education</title>
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
        .form-section h2 i {
            font-size: 1.2rem;
            opacity: 0.8;
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
        .participants-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }
        .participants-table th, .participants-table td {
            padding: 1rem;
            border: 1px solid #f1f5f9;
            text-align: left;
        }
        .participants-table th {
            background: #f8fafc;
            font-weight: 700;
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
                <img src="{{ secure_asset_v('assets/services/form_header_operation.png') }}" alt="School Partnership" class="form-visual-header">
                <div class="form-header">
                    <p>MAALEM Integrated Educational Development Diploma</p>
                    <h1>School Partnership Form</h1>
                </div>

                <form id="partnershipForm">
                    <!-- School Information -->
                    <div class="form-section">
                        <h2><i class="fas fa-school"></i> School Information</h2>
                        <div class="grid-inputs">
                            <div class="form-group full">
                                <label for="schoolName">School Name</label>
                                <input type="text" id="schoolName" name="schoolName" required placeholder="Enter school name">
                            </div>
                            <div class="form-group full">
                                <label>School Type</label>
                                <div class="checkbox-group">
                                    <label class="check-item"><input type="checkbox" name="schoolType[]" value="National"> National</label>
                                    <label class="check-item"><input type="checkbox" name="schoolType[]" value="International"> International</label>
                                    <label class="check-item"><input type="checkbox" name="schoolType[]" value="Language"> Language School</label>
                                    <label class="check-item"><input type="checkbox" name="schoolType[]" value="Private"> Private</label>
                                </div>
                                <input type="text" name="schoolTypeOther" style="margin-top: 10px;" placeholder="Other type...">
                            </div>
                            <div class="form-group full">
                                <label>School Status</label>
                                <div class="radio-group">
                                    <label class="check-item"><input type="radio" name="schoolStatus" value="New" required> New School</label>
                                    <label class="check-item"><input type="radio" name="schoolStatus" value="Contracted" required> Contracted School</label>
                                </div>
                            </div>
                            <div class="form-group full">
                                <label for="schoolAddress">School Address</label>
                                <input type="text" id="schoolAddress" name="schoolAddress" required placeholder="Street address">
                            </div>
                            <div class="form-group">
                                <label for="cityCountry">City / Country</label>
                                <input type="text" id="cityCountry" name="cityCountry" required placeholder="e.g. Cairo, Egypt">
                            </div>
                            <div class="form-group">
                                <label for="website">Website / Social Media</label>
                                <input type="url" id="website" name="website" placeholder="https://...">
                            </div>
                        </div>
                    </div>

                    <!-- Primary Contact -->
                    <div class="form-section">
                        <h2><i class="fas fa-user-tie"></i> Primary Contact Person</h2>
                        <div class="grid-inputs">
                            <div class="form-group">
                                <label for="fullName">Full Name</label>
                                <input type="text" id="fullName" name="fullName" required>
                            </div>
                            <div class="form-group">
                                <label for="position">Position</label>
                                <input type="text" id="position" name="position" required>
                            </div>
                            <div class="form-group">
                                <label for="mobile">Mobile Number</label>
                                <input type="text" id="mobile" name="mobile" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" id="email" name="email" required>
                            </div>
                        </div>
                    </div>

                    <!-- School Profile -->
                    <div class="form-section">
                        <h2><i class="fas fa-chart-pie"></i> School Profile</h2>
                        <div class="grid-inputs">
                            <div class="form-group">
                                <label for="totalStaff">Total Number of Staff</label>
                                <input type="number" id="totalStaff" name="totalStaff">
                            </div>
                            <div class="form-group">
                                <label for="totalTeachers">Total Number of Teachers</label>
                                <input type="number" id="totalTeachers" name="totalTeachers">
                            </div>
                            <div class="form-group full">
                                <label>Current Educational Curriculum</label>
                                <div class="checkbox-group">
                                    <label class="check-item"><input type="checkbox" name="curriculum[]" value="National"> National</label>
                                    <label class="check-item"><input type="checkbox" name="curriculum[]" value="British"> British</label>
                                    <label class="check-item"><input type="checkbox" name="curriculum[]" value="American"> American</label>
                                    <label class="check-item"><input type="checkbox" name="curriculum[]" value="IB"> IB</label>
                                </div>
                                <input type="text" name="curriculumOther" style="margin-top: 10px;" placeholder="Other curriculum...">
                            </div>
                        </div>
                    </div>

                    <!-- Partnership Interest -->
                    <div class="form-section">
                        <h2><i class="fas fa-handshake"></i> Partnership Interest</h2>
                        <div class="form-group">
                            <label>Requested Pathways</label>
                            <div class="checkbox-group" style="grid-template-columns: 1fr;">
                                <label class="check-item"><input type="checkbox" name="pathways[]" value="Teaching"> Teaching Excellence Pathway</label>
                                <label class="check-item"><input type="checkbox" name="pathways[]" value="Leadership"> Educational Leadership Pathway</label>
                                <label class="check-item"><input type="checkbox" name="pathways[]" value="Operations"> School Operations & Administration Pathway</label>
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
                                        <td>Teaching Pathway</td>
                                        <td><input type="number" name="participants[Teaching]" min="0"></td>
                                    </tr>
                                    <tr>
                                        <td>Leadership Pathway</td>
                                        <td><input type="number" name="participants[Leadership]" min="0"></td>
                                    </tr>
                                    <tr>
                                        <td>Operations Pathway</td>
                                        <td><input type="number" name="participants[Operations]" min="0"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Target Departments -->
                    <div class="form-section">
                        <h2><i class="fas fa-sitemap"></i> Target Departments</h2>
                        <div class="checkbox-group">
                            <label class="check-item"><input type="checkbox" name="departments[]" value="Teachers"> Teachers</label>
                            <label class="check-item"><input type="checkbox" name="departments[]" value="Coordinators"> Coordinators</label>
                            <label class="check-item"><input type="checkbox" name="departments[]" value="Middle Leadership"> Middle Leadership</label>
                            <label class="check-item"><input type="checkbox" name="departments[]" value="Senior Leadership"> Senior Leadership</label>
                            <label class="check-item"><input type="checkbox" name="departments[]" value="HR"> HR Department</label>
                            <label class="check-item"><input type="checkbox" name="departments[]" value="Finance"> Finance Department</label>
                            <label class="check-item"><input type="checkbox" name="departments[]" value="Admissions"> Admissions & Marketing</label>
                            <label class="check-item"><input type="checkbox" name="departments[]" value="Student Affairs"> Student Affairs</label>
                        </div>
                    </div>

                    <!-- Delivery Model -->
                    <div class="form-section">
                        <h2><i class="fas fa-truck-fast"></i> Preferred Delivery Model</h2>
                        <div class="radio-group">
                            <label class="check-item"><input type="radio" name="delivery" value="On-Site"> On-Site Training</label>
                            <label class="check-item"><input type="radio" name="delivery" value="Online"> Online Training</label>
                            <label class="check-item"><input type="radio" name="delivery" value="Hybrid"> Hybrid Model</label>
                        </div>
                    </div>

                    <!-- Timeline -->
                    <div class="form-section">
                        <h2><i class="fas fa-calendar-alt"></i> Preferred Timeline</h2>
                        <div class="grid-inputs">
                            <div class="form-group">
                                <label for="startDate">Preferred Start Date</label>
                                <input type="date" id="startDate" name="startDate">
                            </div>
                            <div class="form-group">
                                <label>Preferred Training Period</label>
                                <select name="period">
                                    <option value="Summer">Summer</option>
                                    <option value="Academic Year">Academic Year</option>
                                    <option value="Mid-Year">Mid-Year</option>
                                    <option value="Flexible">Flexible</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Priorities -->
                    <div class="form-section">
                        <h2><i class="fas fa-star"></i> School Development Priorities</h2>
                        <div class="checkbox-group">
                            <label class="check-item"><input type="checkbox" name="priorities[]" value="Teaching"> Teaching & Learning</label>
                            <label class="check-item"><input type="checkbox" name="priorities[]" value="Leadership"> Leadership</label>
                            <label class="check-item"><input type="checkbox" name="priorities[]" value="AI"> AI Integration</label>
                            <label class="check-item"><input type="checkbox" name="priorities[]" value="HR"> Recruitment & HR</label>
                            <label class="check-item"><input type="checkbox" name="priorities[]" value="Operations"> School Operations</label>
                            <label class="check-item"><input type="checkbox" name="priorities[]" value="Finance"> Financial Planning</label>
                            <label class="check-item"><input type="checkbox" name="priorities[]" value="Parent"> Parent Experience</label>
                            <label class="check-item"><input type="checkbox" name="priorities[]" value="Student"> Student Culture</label>
                            <label class="check-item"><input type="checkbox" name="priorities[]" value="Accreditation"> Accreditation</label>
                        </div>
                    </div>

                    <!-- Notes -->
                    <div class="form-section">
                        <h2><i class="fas fa-comment-alt"></i> Additional Notes</h2>
                        <textarea name="notes" rows="4" placeholder="Any custom requests or additional information..."></textarea>
                    </div>

                    <!-- Declaration -->
                    <div class="form-section">
                        <h2><i class="fas fa-file-contract"></i> Declaration</h2>
                        <p style="margin-bottom: 1.5rem; font-size: 0.95rem; color: var(--text-light);">We confirm our interest in participating in the MAALEM Integrated Educational Development Diploma programs.</p>
                        <div class="grid-inputs">
                            <div class="form-group">
                                <label>Authorized Representative Name</label>
                                <input type="text" name="repName" required>
                            </div>
                            <div class="form-group">
                                <label>Position</label>
                                <input type="text" name="repPosition" required>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn-submit">Submit Partnership Interest</button>
                </form>
            </div>
        </div>
    </main>

    @include('partials.footer')
    @include('partials.scripts')
</body>
</html>




