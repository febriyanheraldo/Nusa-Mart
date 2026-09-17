@extends('layouts.app')

@section('title', 'Gratis Ongkir Se-Indonesia - NusaMart')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/go.css') }}">
@endpush

@section('content')
<main class="full-container">

    <!-- Hero Banner Gratis Ongkir -->
    <section class="ongkir-hero-banner">
        <div class="banner-text">
            <span class="ongkir-badge"><i class="fa-solid fa-truck-fast"></i> GRATIS ONGKIR SE-INDONESIA</span>
            <h1 class="banner-title">Belanja Hemat Bebas Ongkos Kirim</h1>
            <p class="banner-subtitle">Klaim voucher gratis ongkir setiap hari tanpa minimum belanja untuk seluruh ekspedisi pengiriman.</p>
        </div>
        <div class="banner-image-mockup">
            <div class="banner-img-placeholder">🚚</div>
            <div class="banner-img-placeholder" style="height: 250px;">📦</div>
        </div>
    </section>

    @include('components.category-menu')

    <!-- Section Klaim Voucher -->
    <section class="section-container">
        <div class="section-header">
            <div class="section-title">
                <h3 style="color: #059669;"><i class="fa-solid fa-ticket"></i> Klaim Voucher Gratis Ongkir Anda</h3>
            </div>
        </div>

        <div class="voucher-grid">
            <!-- Voucher 1 -->
            <div class="voucher-card">
                <div class="voucher-left">
                    <i class="fa-solid fa-truck-fast"></i>
                    <span>GRATIS ONGKIR</span>
                </div>
                <div class="voucher-right">
                    <h4>s/d Rp 20.000</h4>
                    <p>Min. Belanja Rp 0 • Semua Ekspedisi</p>
                    <button class="btn-claim-voucher" onclick="claimVoucher(this)">Klaim</button>
                </div>
            </div>

            <!-- Voucher 2 -->
            <div class="voucher-card">
                <div class="voucher-left">
                    <i class="fa-solid fa-truck-fast"></i>
                    <span>GRATIS ONGKIR</span>
                </div>
                <div class="voucher-right">
                    <h4>s/d Rp 50.000</h4>
                    <p>Min. Belanja Rp 100rb • Luar Jawa</p>
                    <button class="btn-claim-voucher" onclick="claimVoucher(this)">Klaim</button>
                </div>
            </div>

            <!-- Voucher 3 -->
            <div class="voucher-card">
                <div class="voucher-left">
                    <i class="fa-solid fa-bolt"></i>
                    <span>EXTRA ONGKIR</span>
                </div>
                <div class="voucher-right">
                    <h4>s/d Rp 100.000</h4>
                    <p>Min. Belanja Rp 250rb • Cargo / Instant</p>
                    <button class="btn-claim-voucher" onclick="claimVoucher(this)">Klaim</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Katalog Produk Didukung Gratis Ongkir -->
    <section class="section-container">
        <div class="section-header">
            <div class="section-title">
                <h3 style="color: #0F172A;">Produk Bebas Ongkir Pilihan</h3>
            </div>
            <a href="#" class="see-all">Lihat Semua →</a>
        </div>

        <!-- Filter Tabs -->
        <div class="filter-tabs">
            <div class="tab-item active">Semua Produk</div>
            <div class="tab-item">Min. Belanja Rp 0</div>
            <div class="tab-item">Pengiriman Instant</div>
            <div class="tab-item">Luar Pulau Jawa</div>
        </div>

        <div class="product-grid recommendation-grid">

            <!-- Product Card 1 -->
            <div class="product-card">
                <span class="ongkir-tag-badge"><i class="fa-solid fa-truck-fast"></i> Gratis Ongkir</span>
                <div class="product-thumb">📱</div>
                <div class="product-info">
                    <div>
                        <div class="product-title">Apple iPhone 15 128GB Garansi Resmi</div>
                        <div class="product-price">Rp 12.999.000</div>
                    </div>
                    <div class="product-meta">
                        <span>Jakarta Pusat</span>
                        <span>★ 4.9 • 4.8rb+ terjual</span>
                    </div>
                </div>
            </div>

            <!-- Product Card 2 -->
            <div class="product-card">
                <span class="ongkir-tag-badge"><i class="fa-solid fa-truck-fast"></i> Gratis Ongkir</span>
                <div class="product-thumb">👔</div>
                <div class="product-info">
                    <div>
                        <div class="product-title">Kemeja Oversize Unisex Cotton</div>
                        <div class="product-price">Rp 89.900</div>
                    </div>
                    <div class="product-meta">
                        <span>Kota Bandung</span>
                        <span>★ 4.8 • 222 terjual</span>
                    </div>
                </div>
            </div>

            <!-- Product Card 3 -->
            <div class="product-card">
                <span class="ongkir-tag-badge"><i class="fa-solid fa-truck-fast"></i> Gratis Ongkir</span>
                <div class="product-thumb">💻</div>
                <div class="product-info">
                    <div>
                        <div class="product-title">Laptop Ultrabook 14 Inch Slim</div>
                        <div class="product-price">Rp 8.749.000</div>
                    </div>
                    <div class="product-meta">
                        <span>Kab. Tangerang</span>
                        <span>★ 4.8 • 1.2rb+ terjual</span>
                    </div>
                </div>
            </div>

            <!-- Product Card 4 -->
            <div class="product-card">
                <span class="ongkir-tag-badge"><i class="fa-solid fa-truck-fast"></i> Gratis Ongkir</span>
                <div class="product-thumb">👜</div>
                <div class="product-info">
                    <div>
                        <div class="product-title">Tas Selempang Wanita Premium</div>
                        <div class="product-price">Rp 79.500</div>
                    </div>
                    <div class="product-meta">
                        <span>Jakarta Barat</span>
                        <span>★ 4.8 • 1.2rb+ terjual</span>
                    </div>
                </div>
            </div>

            <!-- Product Card 5 -->
            <div class="product-card">
                <span class="ongkir-tag-badge"><i class="fa-solid fa-truck-fast"></i> Gratis Ongkir</span>
                <div class="product-thumb">☕</div>
                <div class="product-info">
                    <div>
                        <div class="product-title">Kopi Arabica Gayo 500gr Biji/Bubuk</div>
                        <div class="product-price">Rp 98.000</div>
                    </div>
                    <div class="product-meta">
                        <span>Kab. Aceh Tengah</span>
                        <span>★ 4.8 • 1.2rb+ terjual</span>
                    </div>
                </div>
            </div>

            <!-- Product Card 6 -->
            <div class="product-card">
                <span class="ongkir-tag-badge"><i class="fa-solid fa-truck-fast"></i> Gratis Ongkir</span>
                <div class="product-thumb">🎧</div>
                <div class="product-info">
                    <div>
                        <div class="product-title">Headphone Wireless ANC Premium</div>
                        <div class="product-price">Rp 679.000</div>
                    </div>
                    <div class="product-meta">
                        <span>Kab. Tangerang</span>
                        <span>★ 4.8 • 1.2rb+ terjual</span>
                    </div>
                </div>
            </div>

            <!-- Product Card 7 -->
            <div class="product-card">
                <span class="ongkir-tag-badge"><i class="fa-solid fa-truck-fast"></i> Gratis Ongkir</span>
                <div class="product-thumb">🪴</div>
                <div class="product-info">
                    <div>
                        <div class="product-title">Rak Serbaguna Minimalis Kayu</div>
                        <div class="product-price">Rp 159.000</div>
                    </div>
                    <div class="product-meta">
                        <span>Kab. Tangerang</span>
                        <span>★ 4.8 • 1.2rb+ terjual</span>
                    </div>
                </div>
            </div>

            <!-- Product Card 8 -->
            <div class="product-card">
                <span class="ongkir-tag-badge"><i class="fa-solid fa-truck-fast"></i> Gratis Ongkir</span>
                <div class="product-thumb">🧴</div>
                <div class="product-info">
                    <div>
                        <div class="product-title">Sunscreen SPF 50 PA++++ Light</div>
                        <div class="product-price">Rp 67.500</div>
                    </div>
                    <div class="product-meta">
                        <span>Kab. Tangerang</span>
                        <span>★ 4.8 • 1.2rb+ terjual</span>
                    </div>
                </div>
            </div>

        </div>
    </section>

</main>
@endsection

@push('scripts')
<script>
    // Script sederhana interaktif untuk klaim voucher
    function claimVoucher(button) {
        button.innerText = "Terklaim ✓";
        button.disabled = true;
        button.classList.add("claimed");
    }
</script>
@endpush
