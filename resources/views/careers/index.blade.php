<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Careers - Maalem Education</title>
    <link rel="stylesheet" href="{{ secure_asset_v('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .careers-hero {
            padding: 8rem 0 1rem;
            background: #fff;
            text-align: center;
            min-height: auto !important;
            /* Override global 100vh */
        }

        .careers-hero h2 {
            color: #1d63dc;
            /* Branded Blue */
            font-size: 1.5rem;
            font-style: italic;
            margin-bottom: 1rem;
        }

        .careers-hero p {
            color: #7c7c7c;
            font-size: 1.1rem;
            max-width: 800px;
            margin: 0 auto;
        }

        .careers-search-section {
            padding-bottom: 6rem;
            background: #fff;
            margin-top: -1rem;
            /* Pull search section up */
            min-height: auto !important;
            /* Override global 100vh */
        }

        .search-container {
            max-width: 1100px;
            margin: 0 auto;
        }

        .search-bar-wrap {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .search-bar-wrap i {
            position: absolute;
            left: 1.2rem;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
        }

        .search-bar-wrap input {
            width: 100%;
            padding: 1.2rem 1.2rem 1.2rem 3rem;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            font-size: 1rem;
        }

        .filters-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 1rem;
            margin-bottom: 3rem;
        }

        .filter-select {
            padding: 1rem;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            background: #fff;
            color: #64748b;
            font-size: 0.95rem;
            cursor: pointer;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%2394a3b8'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 1.2rem;
        }

        .job-list {
            margin-top: 2rem;
        }

        .job-item {
            padding: 2.5rem 0;
            border-top: 1px solid #f1f5f9;
            display: grid;
            grid-template-columns: 2fr 1fr 1.5fr 1.5fr 1fr 1fr;
            align-items: center;
            gap: 2rem;
            transition: all 0.3s;
        }

        .job-item:hover {
            background: #fafafa;
        }

        .job-title-wrap h3 {
            color: #0c4a6e;
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .job-title-wrap .posted-date {
            color: #94a3b8;
            font-size: 0.9rem;
        }

        .job-meta {
            color: #0c4a6e;
            font-weight: 600;
            font-size: 1rem;
        }

        .job-location-details {
            color: #64748b;
            font-size: 0.95rem;
        }

        .job-org {
            color: #64748b;
            font-size: 0.95rem;
        }

        .job-type {
            color: #64748b;
            font-size: 0.95rem;
            text-align: right;
        }

        .show-more-wrap {
            text-align: center;
            padding: 4rem 0;
        }

        .btn-show-more {
            padding: 1rem 3rem;
            background: #075985;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-weight: 700;
            cursor: pointer;
        }

        .resume-banner {
            max-width: 1100px;
            margin: 4rem auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 3rem 0;
            border-top: 1px solid #f1f5f9;
        }

        .resume-text {
            flex: 1;
            padding-right: 4rem;
            font-size: 1.2rem;
            color: #0c4a6e;
            font-weight: 700;
            line-height: 1.6;
        }

        .btn-email-resume {
            padding: 1.2rem 2.5rem;
            background: #075985;
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 700;
            white-space: nowrap;
        }

        @media (max-width: 992px) {
            .filters-grid {
                grid-template-columns: 1fr 1fr;
            }

            .job-item {
                grid-template-columns: 1fr;
                gap: 0.5rem;
            }

            .job-type {
                text-align: left;
            }

            .resume-banner {
                flex-direction: column;
                text-align: center;
            }

            .resume-text {
                padding-right: 0;
                margin-bottom: 2rem;
            }
        }
    </style>
</head>

<body>
    @include('partials.header')

    <main>
        <section class="careers-hero">
            <div class="container">
                <h2 data-i18n="careers_hero_title">Explore our current openings below!</h2>
                <p data-i18n="careers_hero_desc">We welcome educators, administrators, and professionals across all
                    departments to join the Maalem community!</p>
            </div>
        </section>

        <section class="careers-search-section">
            <div class="container">
                <div class="search-container">
                    <form action="{{ route('careers.index') }}" method="GET">
                        <div class="search-bar-wrap">
                            <i class="fas fa-search"></i>
                            <input type="text" name="search" placeholder="Search jobs..."
                                value="{{ request('search') }}">
                        </div>
                        <div class="filters-grid">
                            <select name="workplace_type" class="filter-select" onchange="this.form.submit()">
                                <option value="">Workplace type</option>
                                <option value="On-site" {{ request('workplace_type') == 'On-site' ? 'selected' : '' }}>
                                    On-site</option>
                                <option value="Remote" {{ request('workplace_type') == 'Remote' ? 'selected' : '' }}>
                                    Remote</option>
                                <option value="Hybrid" {{ request('workplace_type') == 'Hybrid' ? 'selected' : '' }}>
                                    Hybrid</option>
                            </select>
                            <select name="location" class="filter-select" onchange="this.form.submit()">
                                <option value="">Location</option>
                                @foreach($locations as $loc)
                                    <option value="{{ $loc->name }}" {{ request('location') == $loc->name ? 'selected' : '' }}>{{ $loc->name }}</option>
                                @endforeach
                            </select>
                            <select name="school" class="filter-select" onchange="this.form.submit()">
                                <option value="">School</option>
                                @foreach($schools as $sch)
                                    <option value="{{ $sch->name }}" {{ request('school') == $sch->name ? 'selected' : '' }}>
                                        {{ $sch->name }}
                                    </option>
                                @endforeach
                            </select>
                            <select name="department" class="filter-select" onchange="this.form.submit()">
                                <option value="">Department</option>
                                <option value="Teaching" {{ request('department') == 'Teaching' ? 'selected' : '' }}>
                                    Teaching</option>
                                <option value="Operations" {{ request('department') == 'Operations' ? 'selected' : '' }}>
                                    Operations</option>
                                <option value="Administration" {{ request('department') == 'Administration' ? 'selected' : '' }}>Administration</option>
                            </select>
                            <select name="work_type" class="filter-select" onchange="this.form.submit()">
                                <option value="">Work type</option>
                                <option value="Full-time" {{ request('work_type') == 'Full-time' ? 'selected' : '' }}>
                                    Full-time</option>
                                <option value="Part-time" {{ request('work_type') == 'Part-time' ? 'selected' : '' }}>
                                    Part-time</option>
                            </select>
                        </div>
                    </form>

                    <div class="job-list">
                        @forelse($jobs as $job)
                            <div class="job-item">
                                <div class="job-title-wrap">
                                    <a href="{{ route('careers.apply', $job->id) }}" style="text-decoration: none;">
                                        <h3>{{ $job->title }}</h3>
                                    </a>
                                    <span class="posted-date">Posted {{ $job->created_at->diffForHumans() }}</span>
                                </div>
                                <div class="job-meta">{{ $job->workplace_type }}</div>
                                <div class="job-location-details">{{ $job->location }}</div>
                                <div class="job-location-details">{{ $job->school }}</div>
                                <div class="job-org">{{ $job->department }}</div>
                                <div class="job-type">{{ $job->work_type }}</div>
                            </div>
                        @empty
                            <div style="text-align: center; padding: 4rem 0; color: #64748b;">
                                <i class="fas fa-search"
                                    style="font-size: 3rem; margin-bottom: 1rem; display: block; opacity: 0.2;"></i>
                                <p>No open positions found matching your search.</p>
                            </div>
                        @endforelse
                    </div>

                    @if($jobs->count() > 5)
                        <div class="show-more-wrap">
                            <button class="btn-show-more">Show more</button>
                        </div>
                    @endif

                    <div class="resume-banner">
                        <div class="resume-text">
                            “If you don't find a role that matches your profile, you can still send us your CV. We'll
                            contact you when a suitable opportunity becomes available.”
                        </div>
                        <a href="{{ route('careers.apply') }}" class="btn-email-resume">Email my resume</a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    @include('partials.footer')
    @include('partials.scripts')
</body>

</html>