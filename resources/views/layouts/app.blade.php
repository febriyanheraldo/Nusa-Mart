<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'NusaMart - Toko Online Terpercaya')</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/beranda.css') }}">
    @stack('styles')
</head>
<body>

    <header class="navbar">
        <div class="full-container nav-container">
            <a href="{{ route('home') }}" class="brand-logo">
                <div class="logo-badge">N</div>
                <span>NusaMart</span>
            </a>

            <div class="search-wrapper">
                <div class="search-box">
                    <input type="text" placeholder="Cari produk flash sale, barang promo...">
                    <button class="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
                <div class="search-keywords">
                    <span class="label">Pencarian populer:</span>
                    <a href="#">iPhone 15</a>
                    <a href="#">Kemeja Oversize</a>
                    <a href="#">Air Fryer</a>
                </div>
            </div>

            <div class="nav-right-group">
                <div class="nav-icons">
                    <div class="icon-btn">
                        <i class="fa-regular fa-bell"></i>
                    </div>
                    <div class="icon-btn">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span class="badge-count">0</span>
                    </div>
                </div>

                @auth
                    <div style="font-size: 13px; font-weight: 700;">
                        <a href="{{ route('dashboard') }}"><i class="fa-regular fa-user"></i> {{ auth()->user()->name }}</a>
                    </div>
                @else
                    <div class="auth-buttons">
                        <a href="{{ route('login') }}" class="btn-login">Masuk</a>
                        <a href="{{ route('register') }}" class="btn-register">Daftar</a>
                    </div>
                @endauth
            </div>
        </div>
    </header>

    @yield('content')

    @stack('scripts')
</body>
</html>
