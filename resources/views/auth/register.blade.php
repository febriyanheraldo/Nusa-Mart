@extends('layouts.auth')

@section('title', 'Daftar Akun Baru - NusaMart')

@section('header_link')
    Sudah punya akun? <a href="{{ route('login') }}" style="color: #F97316; font-weight: 700;">Masuk Akun</a>
@endsection

@section('content')
    <div class="auth-banner">
        <div class="auth-banner-shape shape-1"></div>
        <div class="auth-banner-shape shape-2"></div>
        <div class="auth-banner-content">
            <span class="auth-badge">Gabung Komunitas NusaMart</span>
            <h2>Dapatkan Promo Pengguna Baru Hingga 100%</h2>
            <p>Daftarkan diri Anda hari ini dan klaim voucher gratis ongkir tanpa minimum belanja untuk transaksi pertama Anda.</p>
        </div>
        <div class="auth-illustration-container">
            <div class="auth-illustration">🎁</div>
        </div>
    </div>

    <div class="auth-form-container">
        <div class="auth-header">
            <h3>Buat Akun NusaMart</h3>
            <p>Lengkapi data di bawah ini untuk mendaftar</p>
        </div>

        <form action="{{ route('register') }}" method="POST" class="auth-form">
            @csrf

            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <div class="input-icon-wrapper">
                    <i class="fa-regular fa-user input-icon"></i>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Masukkan nama lengkap Anda" required autofocus>
                </div>
                @error('name')
                    <span style="color: #EF4444; font-size: 12px; margin-top: 4px;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <div class="input-icon-wrapper">
                    <i class="fa-regular fa-envelope input-icon"></i>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="contoh: nama@email.com" required>
                </div>
                @error('email')
                    <span style="color: #EF4444; font-size: 12px; margin-top: 4px;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="role">Daftar Sebagai</label>
                <div class="input-icon-wrapper">
                    <i class="fa-solid fa-users input-icon"></i>
                    <select id="role" name="role" required style="width: 100%; padding: 14px 44px; border: 1.5px solid #E2E8F0; border-radius: 12px; font-size: 14px; outline: none; background-color: #F8FAFC; color: #0F172A; appearance: none;">
                        <option value="customer" {{ old('role') == 'customer' ? 'selected' : '' }}>Customer (Pembeli)</option>
                        <option value="seller" {{ old('role') == 'seller' ? 'selected' : '' }}>Seller (Penjual)</option>
                    </select>
                </div>
                @error('role')
                    <span style="color: #EF4444; font-size: 12px; margin-top: 4px;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Kata Sandi</label>
                <div class="input-icon-wrapper">
                    <i class="fa-solid fa-lock input-icon"></i>
                    <input type="password" id="password" name="password" placeholder="Minimal 8 karakter" required>
                </div>
                @error('password')
                    <span style="color: #EF4444; font-size: 12px; margin-top: 4px;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Konfirmasi Kata Sandi</label>
                <div class="input-icon-wrapper">
                    <i class="fa-solid fa-lock input-icon"></i>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Ulangi kata sandi" required>
                </div>
            </div>

            <button type="submit" class="btn-auth-primary">Daftar Sekarang</button>
        </form>

        <div class="auth-divider">
            <span>atau daftar dengan</span>
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
            Dengan mendaftar, Anda menyetujui <a href="#">Syarat & Ketentuan</a> serta <a href="#">Kebijakan Privasi</a> NusaMart.
        </div>
    </div>
@endsection
