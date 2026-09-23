@extends('layouts.seller')

@section('title', 'Pengaturan Toko - Seller Dashboard NusaMart')

@section('content')
    <!-- Top Header -->
    <div class="top-header">
        <div class="page-title">
            <h2>Pengaturan Profil Toko</h2>
            <p>Kelola identitas, deskripsi, dan informasi publik toko Anda di NusaMart.</p>
        </div>
    </div>

    <!-- Alert Notifikasi Sukses -->
    @if(session('success'))
        <div style="background-color: #ECFDF5; border: 1px solid #A7F3D0; color: #065F46; padding: 12px 16px; border-radius: 10px; margin-bottom: 24px; font-size: 14px; font-weight: 600;">
            <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
        </div>
    @endif

    <!-- Container Form Edit Toko -->
    <div class="form-container">
        <form action="{{ route('seller.toko.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-grid">
                <!-- Nama Toko -->
                <div class="form-group full-width">
                    <label for="name">Nama Toko / Official Store *</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $store->name ?? '') }}" placeholder="Masukkan nama toko Anda..." required>
                    @error('name')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Slug / Link URL Toko (Read-Only) -->
                <div class="form-group full-width">
                    <label for="slug">URL Toko (Otomatis Terbentuk)</label>
                    <input type="text" id="slug" value="{{ $store->slug ?? '-' }}" disabled style="background-color: #F8FAFC; color: #64748B; cursor: not-allowed;">
                    <small style="color: #64748B; font-size: 11px; margin-top: 4px;">URL toko dibuat otomatis berdasarkan nama toko Anda.</small>
                </div>

                <!-- Status Toko -->
                <div class="form-group full-width">
                    <label>Status Toko Saat Ini</label>
                    <div>
                        @if(($store->status ?? '') === 'active')
                            <span class="badge badge-green">Toko Aktif</span>
                        @else
                            <span class="badge badge-rose">Toko Nonaktif / Banned</span>
                        @endif
                    </div>
                </div>

                <!-- Deskripsi Toko -->
                <div class="form-group full-width">
                    <label for="description">Deskripsi Toko</label>
                    <textarea id="description" name="description" rows="5" placeholder="Tuliskan deskripsi singkat mengenai toko, produk unggulan, atau jam operasional Anda...">{{ old('description', $store->description ?? '') }}</textarea>
                    @error('description')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Tombol Aksi -->
            <div class="form-actions">
                <a href="{{ route('seller.dashboard') }}" class="btn-cancel">Batal</a>
                <button type="submit" class="btn-submit">Simpan Perubahan Toko</button>
            </div>
        </form>
    </div>
@endsection
