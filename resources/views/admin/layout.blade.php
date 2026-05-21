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
            overflow-x: hidden;
            width: 100%;
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

        .td-content {
            display: contents;
        }

        /* Pagination Styling */
        .pagination-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 2.5rem;
            padding-top: 1.5rem;
            border-top: 1px dashed var(--border);
            width: 100%;
        }

        .pagination-info {
            font-size: 0.875rem;
            color: var(--text-muted);
            font-weight: 500;
        }

        .pagination-info span {
            font-weight: 700;
            color: var(--primary);
            background: rgba(29, 99, 220, 0.06);
            padding: 2px 8px;
            border-radius: 6px;
            font-size: 0.85rem;
            border: 1px solid rgba(29, 99, 220, 0.1);
            display: inline-block;
            margin: 0 4px;
            line-height: 1.4;
        }

        .pagination {
            display: flex;
            align-items: center;
            list-style: none;
            gap: 6px;
            padding: 0;
            margin: 0;
        }

        .pagination .page-item {
            display: inline-flex;
        }

        .pagination .page-link,
        .pagination .page-item span {
            display: flex;
            align-items: center;
            justify-content: center;
            min-width: 40px;
            height: 40px;
            padding: 0 14px;
            border-radius: 12px;
            border: 1px solid var(--border);
            background: var(--card-bg);
            color: var(--text-main);
            font-size: 0.9rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
        }

        .pagination .page-item.active .page-link,
        .pagination .page-item.active span {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%) !important;
            border-color: transparent !important;
            color: #ffffff !important;
            box-shadow: 0 4px 12px rgba(29, 99, 220, 0.25);
            transform: scale(1.05);
            z-index: 2;
        }

        .pagination .page-item:not(.active):not(.disabled) .page-link:hover {
            background: rgba(29, 99, 220, 0.04);
            border-color: rgba(29, 99, 220, 0.35);
            color: var(--primary);
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.03);
        }

        .pagination .page-item:not(.active):not(.disabled) .page-link:active {
            transform: translateY(0);
        }

        .pagination .page-item.disabled .page-link,
        .pagination .page-item.disabled span {
            opacity: 0.4;
            background: #f8fafc;
            border-color: var(--border);
            color: var(--text-muted);
            cursor: not-allowed;
            pointer-events: none;
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

        /* Mobile Header */
        .mobile-header {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 60px;
            background: var(--sidebar-bg);
            border-bottom: 1px solid var(--border);
            align-items: center;
            justify-content: space-between;
            padding: 0 1.5rem;
            z-index: 101;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .mobile-logo {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .mobile-logo img {
            height: 35px;
            width: auto;
        }

        .mobile-toggle {
            background: none;
            border: none;
            color: var(--text-main);
            font-size: 1.5rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 5px;
        }

        .mobile-spacer {
            width: 28px;
        }

        /* Sidebar Close Button */
        .sidebar-close {
            display: none;
            position: absolute;
            top: 1.5rem;
            right: 1.5rem;
            background: none;
            border: none;
            color: var(--sidebar-text);
            font-size: 1.5rem;
            cursor: pointer;
            z-index: 110;
        }

        .sidebar-close:hover {
            color: var(--primary);
        }

        /* Sidebar Overlay */
        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(15, 23, 42, 0.4);
            backdrop-filter: blur(4px);
            z-index: 99;
            opacity: 0;
            transition: opacity 0.3s ease;
            pointer-events: none;
        }

        .sidebar-overlay.active {
            opacity: 1;
            pointer-events: auto;
        }

        /* Responsive Media Queries */
        @media (max-width: 1024px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
                padding: 1.5rem 1rem;
                padding-top: calc(60px + 1.5rem);
            }

            .mobile-header {
                display: flex;
            }

            .sidebar-close {
                display: block;
            }

            .sidebar-overlay {
                display: block;
            }

            /* Prevent grid items from overflowing on small viewports */
            *[style*="display: grid"] > *,
            *[style*="display:grid"] > *,
            .stats-grid > *,
            .dashboard-grid > * {
                min-width: 0 !important;
            }

            /* Horizontal scrolling for tables */
            .table-container {
                width: 100%;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
                border: 1px solid var(--border);
                border-radius: 12px;
                background: var(--card-bg);
            }

            .table-container table {
                min-width: 650px !important;
            }
        }

        @media (max-width: 768px) {
            /* General inline grid layout stack override */
            *[style*="display: grid"],
            *[style*="display:grid"] {
                grid-template-columns: 1fr !important;
                gap: 1.5rem !important;
            }

            /* Handle inline repeat/fraction definitions */
            *[style*="grid-template-columns"] {
                grid-template-columns: 1fr !important;
            }

            /* Stacking column spans */
            *[style*="grid-column"] {
                grid-column: auto !important;
            }

            /* Specific override for stats grid */
            .stats-grid {
                grid-template-columns: 1fr !important;
            }

            /* Card-reflow table styles on mobile to show data without scrolling */
            .table-container {
                border: none !important;
                background: transparent !important;
                box-shadow: none !important;
                overflow: visible !important;
            }

            .table-container table,
            .table-container tbody,
            .table-container tr,
            .table-container td {
                display: block !important;
                width: 100% !important;
                min-width: 0 !important;
            }

            .table-container thead {
                display: none !important;
            }

            .table-container tr {
                background: var(--card-bg);
                border: 1px solid var(--border) !important;
                border-radius: 16px;
                padding: 1.25rem 1rem !important;
                margin-bottom: 1.25rem;
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            }

            .table-container td {
                display: flex !important;
                justify-content: space-between;
                align-items: center;
                padding: 0.75rem 0 !important;
                border-bottom: 1px dashed var(--border) !important;
                text-align: right !important;
            }

            .table-container td:last-child {
                border-bottom: none !important;
                padding-bottom: 0 !important;
            }

            .table-container td::before {
                content: attr(data-label);
                font-weight: 700;
                color: var(--text-muted);
                font-size: 0.8rem;
                text-transform: uppercase;
                text-align: left;
                margin-right: 1.5rem;
                flex-shrink: 0;
            }

            /* Adjust empty state and colspan cells */
            .table-container td[colspan] {
                justify-content: center !important;
                text-align: center !important;
                border-bottom: none !important;
                padding: 1.5rem 0 !important;
            }

            .table-container td[colspan]::before {
                display: none !important;
            }

            /* Align items inside td contents cleanly */
            .table-container td .td-content {
                display: flex !important;
                flex-direction: column !important;
                align-items: flex-end !important;
                justify-content: center !important;
                text-align: right !important;
                gap: 4px !important;
                width: auto !important;
                min-width: 0 !important;
                max-width: 70% !important;
                word-break: break-word !important;
                overflow-wrap: break-word !important;
            }

            .table-container td .td-content > * {
                max-width: 100% !important;
                word-break: break-word !important;
                overflow-wrap: break-word !important;
                white-space: normal !important;
                text-align: right !important;
            }

            /* Header stack */
            .header-top {
                flex-direction: column;
                align-items: flex-start !important;
                gap: 1rem;
                margin-bottom: 1.5rem;
            }

            .header-top > * {
                width: 100%;
            }

            /* Header actions alignment */
            .btn-primary-action,
            .header-top a,
            .header-top button {
                width: 100%;
                justify-content: center;
            }

            /* Detail view updates for actions section */
            div[style*="margin-top: 3rem"] {
                flex-direction: column;
                gap: 1.5rem;
                align-items: stretch !important;
                text-align: center;
            }

            div[style*="margin-top: 3rem"] a {
                width: 100%;
                text-align: center;
            }

            /* Forms filters in lists */
            form[style*="grid-template-columns"] {
                grid-template-columns: 1fr !important;
            }

            form[style*="grid-template-columns"] div {
                width: 100% !important;
            }

            form[style*="grid-template-columns"] button,
            form[style*="grid-template-columns"] a {
                width: 100% !important;
                justify-content: center;
            }

            /* Responsive Pagination Overrides */
            .pagination-wrapper {
                flex-direction: column !important;
                gap: 1rem !important;
                align-items: center !important;
                text-align: center !important;
            }
        }

        @media (max-width: 480px) {
            .page-title h2 {
                font-size: 1.5rem;
            }

            .card {
                padding: 1.25rem 1rem;
                border-radius: 16px;
            }

            .detail-group {
                padding: 0.8rem;
            }
        }

        @yield('styles')
    </style>
</head>

<body>
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <header class="mobile-header">
        <button class="mobile-toggle" id="mobileToggleBtn">
            <i class="fas fa-bars"></i>
        </button>
        <div class="mobile-logo">
            <img src="{{ secure_asset_v('identity/Logo/PNG/Blue.png') }}" alt="Maalem Logo">
        </div>
        <div class="mobile-spacer"></div>
    </header>

    <aside class="sidebar" id="sidebar" style="border-right: 1px solid var(--border);">
        <button class="sidebar-close" id="sidebarCloseBtn">
            <i class="fas fa-times"></i>
        </button>
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
            // Mobile Sidebar Toggle Control Logic
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            const toggleBtn = document.getElementById('mobileToggleBtn');
            const closeBtn = document.getElementById('sidebarCloseBtn');

            function toggleSidebar() {
                sidebar.classList.toggle('active');
                overlay.classList.toggle('active');
                document.body.style.overflow = sidebar.classList.contains('active') ? 'hidden' : '';
            }

            function closeSidebar() {
                sidebar.classList.remove('active');
                overlay.classList.remove('active');
                document.body.style.overflow = '';
            }

            if (toggleBtn) {
                toggleBtn.addEventListener('click', toggleSidebar);
            }
            if (closeBtn) {
                closeBtn.addEventListener('click', closeSidebar);
            }
            if (overlay) {
                overlay.addEventListener('click', closeSidebar);
            }

            // Auto-close sidebar on mobile if nav links are clicked
            const navItems = document.querySelectorAll('.nav-item');
            navItems.forEach(item => {
                item.addEventListener('click', function() {
                    if (window.innerWidth <= 1024) {
                        closeSidebar();
                    }
                });
            });

            // Auto-inject table header labels for mobile layout and wrap cell content for clean styling
            function initMobileTables() {
                const tables = document.querySelectorAll('.table-container table');
                tables.forEach(table => {
                    const headers = Array.from(table.querySelectorAll('thead th')).map(th => th.textContent.trim());
                    const rows = table.querySelectorAll('tbody tr');
                    rows.forEach(row => {
                        const cells = row.querySelectorAll('td');
                        cells.forEach((cell, index) => {
                            // Skip empty state and colspan cells
                            if (cell.hasAttribute('colspan')) {
                                return;
                            }
                            
                            // Wrap inner content if not already wrapped
                            if (!cell.querySelector('.td-content')) {
                                const wrapper = document.createElement('div');
                                wrapper.className = 'td-content';
                                while (cell.firstChild) {
                                    wrapper.appendChild(cell.firstChild);
                                }
                                cell.appendChild(wrapper);
                            }

                            if (headers[index]) {
                                cell.setAttribute('data-label', headers[index]);
                            }
                        });
                    });
                });
            }
            initMobileTables();

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