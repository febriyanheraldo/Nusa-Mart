@extends('layouts.auth')

@section('title', 'Masuk Akun - NusaMart')

@section('header_link')
    Belum punya akun? <a href="{{ route('register') }}" style="color: #F97316; font-weight: 700;">Daftar Sekarang</a>
@endsection

@section('content')
    <div class="auth-banner">
        <div class="auth-banner-shape shape-1"></div>
        <div class="auth-banner-shape shape-2"></div>

        <div class="auth-banner-content">
            <span class="auth-badge">
                <i class="fa-solid fa-shield-halved"></i> Marketplace Terpercaya
            </span>
            <h2>Belanja Mudah & Aman dalam Satu Genggaman</h2>
            <p>Nikmati diskon heboh hingga 90%, gratis ongkir se-Indonesia, serta jaminan perlindungan transaksi escrow.</p>
        </div>

        <div class="auth-illustration-container">
            <div class="auth-illustration">🛍️</div>
        </div>
    </div>

    <div class="auth-form-container">
        <div class="auth-header">
            <h3>Selamat Datang Kembali!</h3>
            <p>Silakan masuk ke akun NusaMart Anda</p>
        </div>

        @if (session('status'))
            <div style="color: #16A34A; font-size: 13px; margin-bottom: 12px;">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="auth-form">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <div class="input-icon-wrapper">
                    <i class="fa-regular fa-envelope input-icon"></i>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="contoh: user@nusamart.id" required autofocus autocomplete="username">
                </div>
                @error('email')
                    <span style="color: #EF4444; font-size: 12px; margin-top: 4px;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <div class="label-row">
                    <label for="password">Kata Sandi</label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="forgot-link">Lupa Password?</a>
                    @endif
                </div>
                <div class="input-icon-wrapper">
                    <i class="fa-solid fa-lock input-icon"></i>
                    <input type="password" id="password" name="password" placeholder="Masukkan kata sandi Anda" required autocomplete="current-password">
                    <i class="fa-regular fa-eye toggle-password" id="togglePassword"></i>
                </div>
                @error('password')
                    <span style="color: #EF4444; font-size: 12px; margin-top: 4px;">{{ $message }}</span>
                @enderror
            </div>

            <div style="display: flex; align-items: center; gap: 8px; margin-top: -8px;">
                <input type="checkbox" id="remember_me" name="remember" style="accent-color: #F97316;">
                <label for="remember_me" style="font-size: 12px; color: #64748B;">Ingat Saya</label>
            </div>

            <button type="submit" class="btn-auth-primary">
                <span>Masuk ke Akun</span>
                <i class="fa-solid fa-arrow-right"></i>
            </button>
        </form>

        <div class="auth-divider">
            <span>atau masuk dengan</span>
        </div>

        <div class="social-auth-group">
            <button type="button" class="btn-social">
                <i class="fa-brands fa-google" style="color: #EA4335;"></i> Google
            </button>
            <button type="button" class="btn-social">
                <i class="fa-brands fa-facebook" style="color: #1877F2;"></i> Facebook
            </button>
        </div>

        <div class="auth-footer">
            Dengan masuk, Anda menyetujui <a href="#">Syarat & Ketentuan</a> serta <a href="#">Kebijakan Privasi</a> NusaMart.
        </div>
    </div>
@endsection

@push('scripts')
<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    if (togglePassword) {
        togglePassword.addEventListener('click', function () {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.classList.toggle('fa-eye-slash');
        });
    }
</script>
@endpush
