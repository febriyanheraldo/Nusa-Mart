@extends('layouts.app')

@section('title', 'Profil Saya - NusaMart')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endpush

@section('content')
<main class="full-container">

    <!-- Container Utama Layout Profil 2 Kolom -->
    <div class="profile-wrapper">

        <!-- Sidebar Kiri: Ringkasan Pengguna & Menu Navigasi Akun -->
        <aside class="profile-sidebar">
            <div class="user-card-header">
                <div class="user-avatar-lg">
                    {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
                </div>
                <div class="user-info-text">
                    <h3 class="user-name">{{ auth()->user()->name ?? 'User NusaMart' }}</h3>
                    <p class="user-email">{{ auth()->user()->email ?? 'user@nusamart.id' }}</p>
                    <span class="user-role-badge">
                        <i class="fa-solid fa-shield-halved"></i> {{ ucfirst(auth()->user()->role ?? 'Customer') }}
                    </span>
                </div>
            </div>

            <nav class="profile-nav-menu">
                <a href="#biodata" class="nav-item active">
                    <i class="fa-regular fa-user"></i> <span>Biodata Diri</span>
                </a>
                <a href="#alamat" class="nav-item">
                    <i class="fa-solid fa-map-location-dot"></i> <span>Daftar Alamat</span>
                </a>
                <a href="#pesanan" class="nav-item">
                    <i class="fa-solid fa-box-archive"></i> <span>Riwayat Pesanan</span>
                </a>
                <a href="#keamanan" class="nav-item">
                    <i class="fa-solid fa-lock"></i> <span>Keamanan & Password</span>
                </a>
                <form action="{{ route('logout') }}" method="POST" class="logout-form">
                    @csrf
                    <button type="submit" class="nav-item logout-btn">
                        <i class="fa-solid fa-right-from-bracket"></i> <span>Keluar Akun</span>
                    </button>
                </form>
            </nav>
        </aside>

        <!-- Konten Utama Kanan: Form Edit Profil & Info Detail -->
        <section class="profile-content-body">

            <!-- Alert Session (Notifikasi Sukses/Gagal) -->
            @if(session('success'))
                <div class="alert-success">
                    <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
                </div>
            @endif

            <div class="profile-card">
                <div class="card-title-header">
                    <h3><i class="fa-solid fa-user-pen"></i> Ubah Biodata Diri</h3>
                    <p>Kelola informasi profil Anda untuk mengontrol, melindungi, dan mengamankan akun.</p>
                </div>

                <form action="#" method="POST" class="profile-form">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" id="name" name="name" value="{{ old('name', auth()->user()->name ?? '') }}" required placeholder="Masukkan nama lengkap">
                    </div>

                    <div class="form-group">
                        <label for="email">Alamat Email</label>
                        <input type="email" id="email" value="{{ auth()->user()->email ?? '' }}" disabled class="input-disabled">
                        <small class="help-text">Email tidak dapat diubah demi keamanan akun.</small>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="phone">Nomor HP / WhatsApp</label>
                            <input type="text" id="phone" name="phone" value="{{ old('phone', '081234567890') }}" placeholder="Contoh: 08123456789">
                        </div>

                        <div class="form-group">
                            <label for="gender">Jenis Kelamin</label>
                            <select id="gender" name="gender">
                                <option value="male" selected>Laki-Laki</option>
                                <option value="female">Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="address">Alamat Pengiriman Utama</label>
                        <textarea id="address" name="address" rows="3" placeholder="Masukkan alamat lengkap pengiriman">{{ old('address', 'Jl. Jendral Sudirman No. 12, Jakarta Selatan') }}</textarea>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn-save-profile">Simpan Perubahan</button>
                    </div>
                </form>
            </div>

            <!-- Card Ringkasan Aktivitas Akun -->
            <div class="activity-summary-grid">
                <div class="summary-box">
                    <div class="summary-icon"><i class="fa-solid fa-bag-shopping"></i></div>
                    <div>
                        <h4>0 Pesanan</h4>
                        <p>Total Transaksi</p>
                    </div>
                </div>
                <div class="summary-box">
                    <div class="summary-icon" style="background-color: #FEF3C7; color: #D97706;"><i class="fa-solid fa-truck-fast"></i></div>
                    <div>
                        <h4>0 Pesanan</h4>
                        <p>Dalam Pengiriman</p>
                    </div>
                </div>
                <div class="summary-box">
                    <div class="summary-icon" style="background-color: #ECFDF5; color: #10B981;"><i class="fa-solid fa-heart"></i></div>
                    <div>
                        <h4>0 Produk</h4>
                        <p>Wishlist Favorit</p>
                    </div>
                </div>
            </div>

        </section>

    </div>

</main>
@endsection
