<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'NusaMart')</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>

    <header class="navbar">
        <div class="full-container nav-container" style="justify-content: space-between;">
            <a href="{{ url('/') }}" class="brand-logo">
                <div class="logo-badge">N</div>
                <span>NusaMart</span>
            </a>
            <div style="font-size: 13px; color: #64748B;">
                @yield('header_link')
            </div>
        </div>
    </header>

    <main class="auth-wrapper">
        <div class="auth-card">
            @yield('content')
        </div>
    </main>

    @stack('scripts')
</body>
</html>
