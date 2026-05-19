<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply for @if($job) {{ $job->title }} @else Career @endif - Maalem Education</title>
    <link rel="stylesheet" href="{{ secure_asset_v('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .apply-page {
            padding: 10rem 0 6rem;
            background-color: #f8fafc;
        }

        .apply-container {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            padding: 4rem;
            border-radius: 40px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.05);
        }

        .apply-header {
            text-align: center;
            margin-bottom: 4rem;
        }

        .apply-header h1 {
            font-size: 2.5rem;
            font-weight: 800;
            color: #1e293b;
            margin-bottom: 1rem;
        }

        .apply-header p {
            color: #1d63dc;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .form-section {
            margin-bottom: 2.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            font-weight: 700;
            margin-bottom: 0.6rem;
            color: #1e293b;
            font-size: 0.95rem;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 1rem 1.2rem;
            border: 2px solid #f1f5f9;
            border-radius: 12px;
            font-size: 1rem;
            background: #f8fafc;
            transition: all 0.3s;
        }

        input:focus,
        textarea:focus {
            outline: none;
            border-color: #1d63dc;
            background: #fff;
        }

        .btn-submit {
            width: 100%;
            padding: 1.5rem;
            background: #1d63dc;
            color: #fff;
            border: none;
            border-radius: 15px;
            font-size: 1.1rem;
            font-weight: 800;
            text-transform: uppercase;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-submit:hover {
            background: #154ea3;
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(29, 99, 220, 0.3);
        }

        .success-msg {
            background: #dcfce7;
            color: #166534;
            padding: 2rem;
            border-radius: 20px;
            text-align: center;
            margin-bottom: 2rem;
        }

        .grid-inputs {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
        }

        @media (max-width: 768px) {
            .grid-inputs {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            .apply-container {
                padding: 1.25rem;
                border-radius: 24px;
            }

            .apply-page {
                padding: 6rem 0 3rem;
            }

            .apply-header h1 {
                font-size: 1.8rem;
            }

            .btn-submit {
                padding: 1rem;
                font-size: 1rem;
                border-radius: 12px;
            }
        }
    </style>
</head>

<body>
    @include('partials.header')

    <main class="apply-page">
        <div class="container">
            <div class="apply-container">
                <div class="apply-header">
                    <p>Careers at Maalem</p>
                    <h1>@if($job) Apply for {{ $job->title }} @else Submit Your Resume @endif</h1>
                </div>

                <form action="{{ route('careers.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if($job)
                        <input type="hidden" name="job_id" value="{{ $job->id }}">
                    @endif

                    <div class="form-section">
                        <div class="form-group">
                            <label>Position / Job Title</label>
                            <input type="text" name="job_title" list="job_titles" required
                                placeholder="Choose or type your desired position"
                                value="{{ $job ? $job->title : old('job_title') }}">
                            <datalist id="job_titles">
                                @foreach($jobTitles as $title)
                                    <option value="{{ $title }}">
                                @endforeach
                            </datalist>
                        </div>
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" name="full_name" required placeholder="Your full name">
                        </div>
                        <div class="grid-inputs">
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="email" name="email" required placeholder="email@example.com">
                            </div>
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" name="phone" required placeholder="+123 456 7890">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Portfolio / LinkedIn URL (Optional)</label>
                            <input type="url" name="portfolio_url" placeholder="https://...">
                        </div>
                        <div class="form-group">
                            <label>Resume (PDF/DOC, Max 5MB)</label>
                            <input type="file" name="resume" required accept=".pdf,.doc,.docx">
                        </div>
                        <div class="form-group">
                            <label>Cover Letter / Additional Information</label>
                            <textarea name="cover_letter" rows="5"
                                placeholder="Tell us why you are a great fit..."></textarea>
                        </div>
                    </div>

                    <button type="submit" class="btn-submit">Submit Application</button>
                </form>
            </div>
        </div>
    </main>

    @include('partials.footer')
    @include('partials.scripts')

    @if(session('success'))
        <script>
            Swal.fire({
                title: 'Success!',
                text: "{{ session('success') }}",
                icon: 'success',
                confirmButtonColor: '#1d63dc',
                borderRadius: '20px'
            });
        </script>
    @endif
</body>

</html>