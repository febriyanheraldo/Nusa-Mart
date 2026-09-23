<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Seller Dashboard - NusaMart')</title>
    <!-- Google Fonts & Font Awesome -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/seller.css') }}">
    @stack('styles')
</head>
<body class="seller-body">

    <!-- Sidebar Navigasi Seller -->
    <aside class="seller-sidebar">
        <div>
            <div class="brand">DASHBOARD<span> SELLER</span></div>

            <!-- Profil Toko/Seller (Bisa diklik menuju Edit Toko) -->
            <a href="{{ route('seller.toko.edit') }}" class="store-badge" style="text-decoration: none; transition: background-color 0.2s;" onmouseover="this.style.backgroundColor='#E2E8F0';" onmouseout="this.style.backgroundColor='#F1F5F9';">
                <div class="store-avatar">
                    {{ strtoupper(substr(auth()->user()->store->name ?? auth()->user()->name ?? 'S', 0, 1)) }}
                </div>
                <div class="store-info">
                    <h4>{{ auth()->user()->store->name ?? 'Toko Saya' }} <i class="fa-solid fa-pen-to-square" style="font-size: 10px; color: #10B981; margin-left: 4px;"></i></h4>
                    <p>Official Merchant</p>
                </div>
            </a>

            <ul class="nav-menu">
                <li class="nav-item {{ request()->routeIs('seller.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('seller.dashboard') }}">📦 Pesanan Masuk</a>
                </li>
                <li class="nav-item {{ request()->routeIs('seller.produk*') ? 'active' : '' }}">
                    <a href="{{ route('seller.produk') }}">🛍️ Katalog Produk</a>
                </li>
                <li class="nav-item {{ request()->routeIs('seller.toko*') ? 'active' : '' }}">
                    <a href="{{ route('seller.toko.edit') }}">⚙️ Pengaturan Toko</a>
                </li>
                <li class="nav-item {{ request()->routeIs('seller.dompet') ? 'active' : '' }}">
                    <a href="{{ route('seller.dompet') }}">💰 Dompet Toko</a>
                </li>
                <li class="nav-item {{ request()->routeIs('seller.ulasan') ? 'active' : '' }}">
                    <a href="{{ route('seller.ulasan') }}">⭐ Ulasan Pembeli</a>
                </li>
            </ul>
        </div>

        <div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-btn">
                    <div class="nav-item" style="padding: 0;">
                        <a style="color: #E11D48;"><i class="fa-solid fa-right-from-bracket"></i> Keluar</a>
                    </div>
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content Area -->
    <main class="seller-main">
        @yield('content')
    </main>

    @stack('scripts')
</body>
</html>
