<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulting Inquiry - Maalem Education</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .form-page {
            padding: 10rem 0 6rem;
            background-color: #f8fafc;
            min-height: 100vh;
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
        input[type="url"],
        select {
            width: 100%;
            padding: 1rem 1.2rem;
            border: 2px solid #f1f5f9;
            border-radius: 12px;
            font-family: inherit;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #f8fafc;
        }
        input:focus {
            outline: none;
            border-color: var(--primary-color);
            background: #fff;
            box-shadow: 0 0 0 4px rgba(29, 99, 220, 0.1);
        }
        .checkbox-group {
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
                <div class="form-header">
                    <p>Educational Consulting Services</p>
                    <h1>Consulting Inquiry Form</h1>
                </div>

                <form id="consultingForm">
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
                                    <label class="check-item"><input type="checkbox" name="schoolType" value="National"> National</label>
                                    <label class="check-item"><input type="checkbox" name="schoolType" value="International"> International</label>
                                    <label class="check-item"><input type="checkbox" name="schoolType" value="Language"> Language School</label>
                                    <label class="check-item"><input type="checkbox" name="schoolType" value="Private"> Private</label>
                                </div>
                                <input type="text" name="schoolTypeOther" style="margin-top: 10px;" placeholder="Other type...">
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

                    <button type="submit" class="btn-submit">Submit Inquiry</button>
                </form>
            </div>
        </div>
    </main>

    @include('partials.footer')
    @include('partials.scripts')
</body>
</html>



