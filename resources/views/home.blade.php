@extends('layouts.app')

@section('title', 'NusaMart - Toko Online Terpercaya')

@section('content')
<main class="full-container">

    <!-- Hero Banner Promo -->
    <section class="hero-banner">
        <div class="banner-text">
            <span class="banner-tag">9.9 SUPER SHOPPING DAY</span>
            <h1 class="banner-title">Diskon Heboh sampai 90%</h1>
            <p class="banner-subtitle">Belanja produk favorit, nikmati gratis ongkir se-Indonesia.</p>
            <a href="#" class="btn-banner">Belanja Sekarang</a>
        </div>
        <div class="banner-image-mockup">
            <div class="banner-img-placeholder">🛍️</div>
            <div class="banner-img-placeholder" style="height: 280px;">🧍‍♂️</div>
        </div>
    </section>

    <!-- Navigasi Fitur / Kategori (5 Item) -->
    @include('components.category-menu')

    <!-- Section Flash Sale -->
    <section class="section-container">
        <div class="section-header">
            <div class="section-title">
                <h3>⚡ FLASH SALE</h3>
                <div class="countdown-box">
                    <span class="timer">01</span> :
                    <span class="timer">24</span> :
                    <span class="timer">50</span>
                </div>
            </div>
            <a href="{{ route('flash-sale') }}" class="see-all">Lihat Semua →</a>
        </div>

        <div class="product-grid">
            <!-- Dynamic Flash Sale Items (Looping Data dari Controller) -->
            @forelse($flashSaleProducts ?? [] as $product)
                <div class="product-card">
                    <span class="discount-badge">{{ $product->discount }}% OFF</span>
                    <div class="product-thumb">{{ $product->icon ?? '📦' }}</div>
                    <div class="product-info">
                        <div>
                            <div class="product-title">{{ $product->name }}</div>
                            <div class="original-price">Rp {{ number_format($product->original_price, 0, ',', '.') }}</div>
                            <div class="product-price">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                        </div>
                        <div class="product-meta">
                            <span>{{ $product->location ?? 'Indonesia' }}</span>
                            <span><span class="product-rating">★ {{ $product->rating ?? '4.8' }}</span> • {{ $product->sold ?? '0' }} terjual</span>
                        </div>
                    </div>
                </div>
            @empty
                <!-- Dummy Static Fallback Jika Belum Ada Data DB -->
                <div class="product-card">
                    <span class="discount-badge">50% OFF</span>
                    <div class="product-thumb">🎧</div>
                    <div class="product-info">
                        <div>
                            <div class="product-title">TWS Bluetooth 5.3 Noise Cancelling</div>
                            <div class="original-price">Rp 259.000</div>
                            <div class="product-price">Rp 129.000</div>
                        </div>
                        <div class="product-meta">
                            <span>Kab. Tangerang</span>
                            <span><span class="product-rating">★ 4.8</span> • 1.2rb+ terjual</span>
                        </div>
                    </div>
                </div>
                <!-- Menampilkan item static lainnya -->
                <div class="product-card">
                    <span class="discount-badge">30% OFF</span>
                    <div class="product-thumb">👟</div>
                    <div class="product-info">
                        <div>
                            <div class="product-title">Sepatu Running Pria Ultra Light</div>
                            <div class="original-price">Rp 270.000</div>
                            <div class="product-price">Rp 189.500</div>
                        </div>
                        <div class="product-meta">
                            <span>Kab. Tangerang</span>
                            <span><span class="product-rating">★ 4.8</span> • 1.2rb+ terjual</span>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </section>

    <!-- Section Rekomendasi Produk -->
    <section class="section-container">
        <div class="section-header">
            <div class="section-title">
                <h3 style="color: #0F172A;">Rekomendasi Produk</h3>
            </div>
            <a href="#" class="see-all">Lihat Semua →</a>
        </div>

        <!-- Filter Tabs -->
        <div class="filter-tabs">
            <div class="tab-item active">Untuk Kamu</div>
            <div class="tab-item">Terlaris</div>
            <div class="tab-item">Harga Terbaik</div>
            <div class="tab-item">Produk Lokal</div>
            <div class="tab-item">Elektronik</div>
        </div>

        <div class="product-grid recommendation-grid">
            <!-- Dynamic Recommendation Products -->
            @forelse($recommendations ?? [] as $product)
                <div class="product-card">
                    <div class="product-thumb">{{ $product->icon ?? '📱' }}</div>
                    <div class="product-info">
                        <div>
                            <div class="product-title">{{ $product->name }}</div>
                            <div class="product-price">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                        </div>
                        <div class="product-meta">
                            <span>{{ $product->location }}</span>
                            <span>★ {{ $product->rating }} • {{ $product->sold }} terjual</span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="product-card">
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
                <div class="product-card">
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
            @endforelse
        </div>
    </section>

</main>
@endsection
