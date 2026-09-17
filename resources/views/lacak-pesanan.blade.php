@extends('layouts.app')

@section('title', 'Lacak Pesanan & Resi Pengiriman - NusaMart')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/lp.css') }}">
@endpush

@section('content')
<main class="full-container">

    <!-- Hero Banner Lacak Pesanan -->
    <section class="track-hero-banner">
        <div class="banner-text">
            <span class="track-badge"><i class="fa-solid fa-truck-ramp-box"></i> REAL-TIME LOGISTICS TRACKING</span>
            <h1 class="banner-title">Lacak Pengiriman Pesanan Anda</h1>
            <p class="banner-subtitle">Masukkan ID Order atau Nomor Resi pengiriman Anda untuk memantau keberadaan paket secara akurat.</p>

            <!-- Input Form Cek Resi / Order -->
            <div class="track-search-box">
                <i class="fa-solid fa-barcode track-input-icon"></i>
                <input type="text" id="trackInput" placeholder="Masukkan ID Order (cth: #ORD-9920) atau No. Resi...">
                <button class="btn-track-submit" onclick="searchTracking()">Lacak Paket</button>
            </div>
        </div>
        <div class="banner-image-mockup">
            <div class="banner-img-placeholder">🗺️</div>
            <div class="banner-img-placeholder" style="height: 250px;">📍</div>
        </div>
    </section>

    @include('components.category-menu')

    <!-- Hasil Tracking Detail Status Pengiriman -->
    <section class="section-container" id="trackingResult">
        <div class="section-header">
            <div class="section-title">
                <h3 style="color: #2563EB;"><i class="fa-solid fa-box-open"></i> Detail Pengiriman: #ORD-9920</h3>
            </div>
            <span class="badge-status-shipped"><i class="fa-solid fa-truck-fast"></i> Dalam Pengiriman</span>
        </div>

        <!-- Informasi Ringkas Pesanan -->
        <div class="tracking-info-grid">
            <div class="track-info-card">
                <span class="info-label">Ekspedisi Logistik</span>
                <strong class="info-value">J&T Express (JP98213821)</strong>
            </div>
            <div class="track-info-card">
                <span class="info-label">Penerima</span>
                <strong class="info-value">Siti Aminah</strong>
            </div>
            <div class="track-info-card">
                <span class="info-label">Alamat Tujuan</span>
                <strong class="info-value">Kec. Cilandak, Jakarta Selatan</strong>
            </div>
            <div class="track-info-card">
                <span class="info-label">Estimasi Tiba</span>
                <strong class="info-value" style="color: #059669;">15 Sep 2026 (Besok)</strong>
            </div>
        </div>

        <!-- Timeline Tracking Progress -->
        <div class="tracking-timeline">

            <div class="timeline-item active">
                <div class="timeline-icon"><i class="fa-solid fa-truck-arrow-right"></i></div>
                <div class="timeline-content">
                    <h4>Paket Sedang Dalam Perjalanan ke Hub Jakarta</h4>
                    <p>Paket telah keluar dari Drop Point Sidoarjo Utama dan dalam perjalanan transit via udara.</p>
                    <span class="timeline-time">14 Sep 2026 - 08:30 WIB</span>
                </div>
            </div>

            <div class="timeline-item completed">
                <div class="timeline-icon"><i class="fa-solid fa-warehouse"></i></div>
                <div class="timeline-content">
                    <h4>Paket Diterima di Pusat Sortir Sidoarjo</h4>
                    <p>Paket telah diproses dan disortir oleh tim kurir J&T Express.</p>
                    <span class="timeline-time">13 Sep 2026 - 21:15 WIB</span>
                </div>
            </div>

            <div class="timeline-item completed">
                <div class="timeline-icon"><i class="fa-solid fa-box"></i></div>
                <div class="timeline-content">
                    <h4>Penjual Telah Memproses & Mengirim Paket</h4>
                    <p>Paket diserahkan oleh Toko <strong>BajuKita Official</strong> ke kurir pengiriman.</p>
                    <span class="timeline-time">13 Sep 2026 - 14:00 WIB</span>
                </div>
            </div>

            <div class="timeline-item completed">
                <div class="timeline-icon"><i class="fa-solid fa-circle-check"></i></div>
                <div class="timeline-content">
                    <h4>Pembayaran Berhasil Diverifikasi</h4>
                    <p>Transaksi telah dikonfirmasi dan siap dikemas penjual.</p>
                    <span class="timeline-time">12 Sep 2026 - 10:20 WIB</span>
                </div>
            </div>

        </div>
    </section>

</main>
@endsection

@push('scripts')
<script>
    function searchTracking() {
        const input = document.getElementById('trackInput').value;
        if (input.trim() === '') {
            alert('Silakan masukkan ID Order atau No. Resi terlebih dahulu!');
        } else {
            document.getElementById('trackingResult').scrollIntoView({ behavior: 'smooth' });
        }
    }
</script>
@endpush
