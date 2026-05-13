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
            --sidebar-bg: #0f172a;
            --sidebar-text: #94a3b8;
            --sidebar-active: #fff;
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
            color: #475569;
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
            background: rgba(255, 255, 255, 0.05);
            color: #fff;
        }

        .nav-item.active {
            background: var(--primary);
            color: #fff;
            box-shadow: 0 10px 20px rgba(29, 99, 220, 0.2);
        }

        .sidebar-footer {
            padding: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
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
            color: #fff;
        }

        .user-details p {
            font-size: 0.75rem;
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

        @yield('styles')
    </style>
</head>
<body>
    <aside class="sidebar">
        <div class="sidebar-header">
            <img src="{{ asset('identity/Logo/PNG/White.png') }}" alt="Maalem Logo" style="height: 100px; width: auto; margin: 0 auto;">
        </div>

        <nav class="sidebar-nav">
            <a href="{{ route('admin.dashboard') }}" class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-chart-line"></i> Dashboard
            </a>

            <div class="nav-label">Service Submissions</div>
            <a href="{{ route('admin.partnerships') }}" class="nav-item {{ request()->routeIs('admin.partnerships') ? 'active' : '' }}">
                <i class="fas fa-handshake"></i> Partnerships
            </a>
            <a href="{{ route('admin.consultations') }}" class="nav-item {{ request()->routeIs('admin.consultations') ? 'active' : '' }}">
                <i class="fas fa-comments"></i> Consultations
            </a>
            <a href="{{ route('admin.training_applications') }}" class="nav-item {{ request()->routeIs('admin.training_applications') ? 'active' : '' }}">
                <i class="fas fa-graduation-cap"></i> Training Apps
            </a>

            <div class="nav-label">Human Resources</div>
            <a href="{{ route('admin.jobs.index') }}" class="nav-item {{ request()->routeIs('admin.jobs.*') ? 'active' : '' }}">
                <i class="fas fa-briefcase"></i> Job Listings
            </a>
            <a href="{{ route('admin.job_applications.index') }}" class="nav-item {{ request()->routeIs('admin.job_applications.*') ? 'active' : '' }}">
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
        <div class="header-top">
            <div class="page-title">
                <h2>@yield('page_title', 'Dashboard')</h2>
                <p>@yield('page_subtitle', 'Welcome back to Maalem Admin')</p>
            </div>
            @yield('header_actions')
        </div>

        @yield('content')
    </main>

    @yield('scripts')
</body>
</html>
