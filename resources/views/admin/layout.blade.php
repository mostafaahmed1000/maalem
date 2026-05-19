<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Maalem Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #1d63dc;
            --primary-dark: #154ea3;
            --secondary: #0f172a;
            --accent: #38bdf8;
            --bg: #f8fafc;
            --sidebar-bg: #ffffff;
            --sidebar-text: #64748b;
            --sidebar-active: #1d63dc;
            --card-bg: #ffffff;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --border: #e2e8f0;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Outfit', sans-serif;
        }

        body {
            background-color: var(--bg);
            color: var(--text-main);
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 280px;
            background: var(--sidebar-bg);
            color: var(--sidebar-text);
            display: flex;
            flex-direction: column;
            position: fixed;
            height: 100vh;
            left: 0;
            top: 0;
            z-index: 100;
            transition: all 0.3s;
        }

        .sidebar-header {
            padding: 2.5rem 2rem;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .sidebar-header h1 {
            color: #fff;
            font-size: 1.5rem;
            font-weight: 800;
            letter-spacing: -0.5px;
        }

        .sidebar-nav {
            flex: 1;
            padding: 0 1rem;
        }

        .nav-label {
            padding: 1.5rem 1rem 0.5rem;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #94a3b8;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0.8rem 1rem;
            color: var(--sidebar-text);
            text-decoration: none;
            border-radius: 12px;
            margin-bottom: 4px;
            font-weight: 600;
            transition: all 0.2s;
        }

        .nav-item i {
            width: 20px;
            text-align: center;
            font-size: 1.1rem;
        }

        .nav-item:hover {
            background: #f1f5f9;
            color: var(--primary);
        }

        .nav-item.active {
            background: rgba(29, 99, 220, 0.08);
            color: var(--primary);
            box-shadow: none;
        }

        .sidebar-footer {
            padding: 2rem;
            border-top: 1px solid var(--border);
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 1.5rem;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            background: var(--primary);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 800;
        }

        .user-details h4 {
            font-size: 0.9rem;
            color: var(--text-main);
        }

        .user-details p {
            font-size: 0.75rem;
            color: var(--text-muted);
        }

        .btn-logout {
            width: 100%;
            padding: 0.7rem;
            background: rgba(239, 68, 68, 0.1);
            color: #f87171;
            border: none;
            border-radius: 10px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-logout:hover {
            background: #ef4444;
            color: #fff;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: 280px;
            padding: 2rem 3rem;
            min-width: 0;
        }

        .content-container {
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
        }

        .header-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2.5rem;
        }

        .page-title h2 {
            font-size: 1.8rem;
            font-weight: 800;
        }

        .page-title p {
            color: var(--text-muted);
            font-size: 0.95rem;
        }

        /* Components */
        .card {
            background: var(--card-bg);
            border-radius: 20px;
            padding: 1.5rem;
            border: 1px solid var(--border);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }

        .badge {
            padding: 0.4rem 0.8rem;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
        }

        .badge-new {
            background: rgba(16, 185, 129, 0.1);
            color: #10b981;
        }

        .badge-established {
            background: rgba(29, 99, 220, 0.1);
            color: #1d63dc;
        }

        .badge-default {
            background: rgba(148, 163, 184, 0.1);
            color: #64748b;
        }

        @yield('styles')
    </style>
</head>

<body>
    <aside class="sidebar" style="border-right: 1px solid var(--border);">
        <div class="sidebar-header">
            <img src="{{ secure_asset_v('identity/Logo/PNG/Blue.png') }}" alt="Maalem Logo"
                style="height: 100px; width: auto; margin: 0 auto;">
        </div>

        <nav class="sidebar-nav">
            <a href="{{ route('admin.dashboard') }}"
                class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-chart-line"></i> Dashboard
            </a>

            <div class="nav-label">Service Submissions</div>
            <a href="{{ route('admin.partnerships') }}"
                class="nav-item {{ request()->routeIs('admin.partnerships') ? 'active' : '' }}">
                <i class="fas fa-handshake"></i> Partnerships
            </a>
            <a href="{{ route('admin.consultations') }}"
                class="nav-item {{ request()->routeIs('admin.consultations') ? 'active' : '' }}">
                <i class="fas fa-comments"></i> Consultations
            </a>
            <a href="{{ route('admin.training_applications') }}"
                class="nav-item {{ request()->routeIs('admin.training_applications') ? 'active' : '' }}">
                <i class="fas fa-graduation-cap"></i> Training Apps
            </a>
            <a href="{{ route('admin.instructors.index') }}"
                class="nav-item {{ request()->routeIs('admin.instructors.*') ? 'active' : '' }}">
                <i class="fas fa-chalkboard-teacher"></i> Instructors
            </a>

            <div class="nav-label">Human Resources</div>
            <a href="{{ route('admin.jobs.index') }}"
                class="nav-item {{ request()->routeIs('admin.jobs.*') ? 'active' : '' }}">
                <i class="fas fa-briefcase"></i> Job Listings
            </a>
            <a href="{{ route('admin.job_applications.index') }}"
                class="nav-item {{ request()->routeIs('admin.job_applications.*') ? 'active' : '' }}">
                <i class="fas fa-file-invoice"></i> Job Applications
            </a>
        </nav>

        <div class="sidebar-footer">
            <div class="user-info">
                <div class="user-details">
                    <h4>{{ Auth::user()->name }}</h4>
                    <p>Administrator</p>
                </div>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn-logout">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </div>
    </aside>

    <main class="main-content">
        <div class="content-container">
            <div class="header-top">
                <div class="page-title">
                    <h2>@yield('page_title', 'Dashboard')</h2>
                    <p>@yield('page_subtitle', 'Welcome back to Maalem Admin')</p>
                </div>
                @yield('header_actions')
            </div>

            @yield('content')
        </div>
    </main>

    @yield('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if(session('success'))
                Swal.fire({
                    title: 'Success!',
                    text: "{{ session('success') }}",
                    icon: 'success',
                    confirmButtonColor: '#1d63dc'
                });
            @endif

            @if(session('error'))
                Swal.fire({
                    title: 'Error!',
                    text: "{{ session('error') }}",
                    icon: 'error',
                    confirmButtonColor: '#1d63dc'
                });
            @endif
        });
    </script>
</body>

</html>