<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - Portfolio</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    @stack('styles')
</head>
<body>
    <div class="admin-wrapper">
        <!-- Sidebar -->
        <aside class="admin-sidebar">
            <div class="sidebar-header">
                <div class="admin-logo">
                    <div class="logo-icon">
                        <i class="fas fa-cube"></i>
                    </div>
                    <div class="logo-text">
                        <span class="logo-title">Admin Panel</span>
                        <span class="logo-subtitle">Portfolio Manager</span>
                    </div>
                </div>
            </div>

            <nav class="sidebar-nav">
                <a href="{{ route('admin.dashboard') }}" class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-th-large"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('admin.projects.index') }}" class="nav-item {{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">
                    <i class="fas fa-folder"></i>
                    <span>Kelola Proyek</span>
                </a>
                <a href="{{ route('admin.experiences.index') }}" class="nav-item {{ request()->routeIs('admin.experiences.*') ? 'active' : '' }}">
                    <i class="fas fa-briefcase"></i>
                    <span>Pengalaman</span>
                </a>
                <a href="{{ route('admin.education.index') }}" class="nav-item {{ request()->routeIs('admin.education.*') ? 'active' : '' }}">
                    <i class="fas fa-graduation-cap"></i>
                    <span>Education</span>
                </a>
                <a href="{{ route('admin.technologies.index') }}" class="nav-item {{ request()->routeIs('admin.technologies.*') ? 'active' : '' }}">
                    <i class="fas fa-code"></i>
                    <span>Tech Stack</span>
                </a>
                <a href="{{ route('admin.settings') }}" class="nav-item {{ request()->routeIs('admin.settings') ? 'active' : '' }}">
                    <i class="fas fa-cog"></i>
                    <span>Pengaturan</span>
                </a>
                <a href="{{ route('admin.visitors.index') }}" class="nav-item {{ request()->routeIs('admin.visitors.index') ? 'active' : '' }}">
                    <i class="fas fa-users"></i>
                    <span>Visitor Logs</span>
                </a>
            </nav>

            <div class="sidebar-footer">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Log Out</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="admin-main">
            <!-- Top Bar -->
            <header class="admin-topbar">
                <div class="topbar-search">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Cari proyek...">
                </div>
                <div class="topbar-actions">
                    <div class="topbar-user">
                        <div class="user-avatar">A</div>
                        <span>Admin</span>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <div class="admin-content">
                @if(session('success'))
                    <div class="alert alert-success">
                        <i class="fas fa-check-circle"></i>
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-error">
                        <i class="fas fa-exclamation-circle"></i>
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>

    @stack('scripts')
</body>
</html>
