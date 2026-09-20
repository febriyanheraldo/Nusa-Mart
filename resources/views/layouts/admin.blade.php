<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel Dashboard - NusaMart')</title>
    <!-- Google Fonts & Font Awesome Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    @stack('styles')
</head>
<body class="admin-body">

    <!-- Sidebar Navigasi Admin -->
    <aside class="admin-sidebar">
        <div>
            <div class="brand">DASHBOARD<span> ADMIN</span></div>
            <ul class="nav-menu">
                <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}">📊 Dashboard Overview</a>
                </li>
                <li class="nav-item {{ request()->routeIs('admin.val') ? 'active' : '' }}">
                    <a href="{{ route('admin.val') }}">💳 Validasi Pembayaran</a>
                </li>
                <li class="nav-item {{ request()->routeIs('admin.resi') ? 'active' : '' }}">
                    <a href="{{ route('admin.resi') }}">🚚 Pengiriman & Resi</a>
                </li>
                <li class="nav-item {{ request()->routeIs('admin.toko') ? 'active' : '' }}">
                    <a href="{{ route('admin.toko') }}">👥 Data User & Toko</a>
                </li>
            </ul>
        </div>

        <div class="admin-profile">
            <div class="avatar">{{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}</div>
            <div class="profile-info">
                <h4>{{ auth()->user()->name ?? 'Admin System' }}</h4>
                <p>Super Administrator</p>
            </div>
        </div>
    </aside>

    <!-- Main Content Area -->
    <main class="admin-main">
        @yield('content')
    </main>

    @stack('scripts')
</body>
</html>
