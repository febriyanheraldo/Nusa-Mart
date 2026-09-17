@extends('layouts.app')

@section('title', 'Semua Kategori Produk - NusaMart')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endpush

@section('content')
<main class="full-container">

    <!-- Hero Banner Kategori -->
    <section class="category-hero-banner">
        <div class="banner-text">
            <span class="category-badge"><i class="fa-solid fa-layer-group"></i> JELAJAHI KATALOG NUSAMART</span>
            <h1 class="banner-title">Temukan Produk Berdasarkan Kategori</h1>
            <p class="banner-subtitle">Pilih berbagai kategori favorit Anda mulai dari Elektronik, Fashion, Kecantikan, hingga Kebutuhan Rumah Tangga.</p>
        </div>
        <div class="banner-image-mockup">
            <div class="banner-img-placeholder">📦</div>
            <div class="banner-img-placeholder" style="height: 250px;">🛒</div>
        </div>
    </section>

    @include('components.category-menu')

    <!-- Grid Utama Kategori Produk -->
    <section class="section-container">
        <div class="section-header">
            <div class="section-title">
                <h3 style="color: #7C3AED;"><i class="fa-solid fa-grid-2"></i> Kategori Pilihan NusaMart</h3>
            </div>
        </div>

        <div class="category-grid">

            <!-- Kategori 1 -->
            <div class="category-card">
                <div class="category-card-header">
                    <div class="cat-card-icon" style="background-color: #EFF6FF; color: #3B82F6;">📱</div>
                    <div>
                        <h4>Elektronik & Gadget</h4>
                        <p>12.4rb+ Produk</p>
                    </div>
                </div>
                <ul class="subcat-list">
                    <li><a href="#">Handphone & Tablet</a></li>
                    <li><a href="#">Laptop & Komputer</a></li>
                    <li><a href="#">Audio & Headphone</a></li>
                    <li><a href="#">Aksesoris HP</a></li>
                </ul>
            </div>

            <!-- Kategori 2 -->
            <div class="category-card">
                <div class="category-card-header">
                    <div class="cat-card-icon" style="background-color: #FAF5FF; color: #9333EA;">👔</div>
                    <div>
                        <h4>Fashion Pria & Wanita</h4>
                        <p>28.5rb+ Produk</p>
                    </div>
                </div>
                <ul class="subcat-list">
                    <li><a href="#">Kemeja & Kaos</a></li>
                    <li><a href="#">Celana & Jeans</a></li>
                    <li><a href="#">Sepatu & Sneaker</a></li>
                    <li><a href="#">Tas & Dompet</a></li>
                </ul>
            </div>

            <!-- Kategori 3 -->
            <div class="category-card">
                <div class="category-card-header">
                    <div class="cat-card-icon" style="background-color: #FFF1F2; color: #E11D48;">🧴</div>
                    <div>
                        <h4>Kecantikan & Perawatan</h4>
                        <p>15.8rb+ Produk</p>
                    </div>
                </div>
                <ul class="subcat-list">
                    <li><a href="#">Skincare & Sunscreen</a></li>
                    <li><a href="#">Make Up & Cosmetik</a></li>
                    <li><a href="#">Perawatan Tubuh</a></li>
                    <li><a href="#">Parfumsi & Wewangian</a></li>
                </ul>
            </div>

            <!-- Kategori 4 -->
            <div class="category-card">
                <div class="category-card-header">
                    <div class="cat-card-icon" style="background-color: #FEF3C7; color: #D97706;">🫕</div>
                    <div>
                        <h4>Peralatan Rumah Tangga</h4>
                        <p>9.2rb+ Produk</p>
                    </div>
                </div>
                <ul class="subcat-list">
                    <li><a href="#">Dapur & Air Fryer</a></li>
                    <li><a href="#">Perlengkapan Kamar</a></li>
                    <li><a href="#">Rak & Dekorasi</a></li>
                    <li><a href="#">Kebersihan Rumah</a></li>
                </ul>
            </div>

            <!-- Kategori 5 -->
            <div class="category-card">
                <div class="category-card-header">
                    <div class="cat-card-icon" style="background-color: #ECFDF5; color: #10B981;">☕</div>
                    <div>
                        <h4>Makanan & Minuman</h4>
                        <p>18.1rb+ Produk</p>
                    </div>
                </div>
                <ul class="subcat-list">
                    <li><a href="#">Kopi & Teh Nusantara</a></li>
                    <li><a href="#">Camilan & Snack</a></li>
                    <li><a href="#">Bumbu Dapur & Sembako</a></li>
                    <li><a href="#">Makanan Instan</a></li>
                </ul>
            </div>

            <!-- Kategori 6 -->
            <div class="category-card">
                <div class="category-card-header">
                    <div class="cat-card-icon" style="background-color: #F0FDF4; color: #16A34A;">⚽</div>
                    <div>
                        <h4>Olahraga & Otomotif</h4>
                        <p>7.6rb+ Produk</p>
                    </div>
                </div>
                <ul class="subcat-list">
                    <li><a href="#">Perlengkapan Gym</a></li>
                    <li><a href="#">Pakaian Olahraga</a></li>
                    <li><a href="#">Aksesoris Motor</a></li>
                    <li><a href="#">Aksesoris Mobil</a></li>
                </ul>
            </div>

        </div>
    </section>

    <!-- Kategori Populer Terkait -->
    <section class="section-container">
        <div class="section-header">
            <div class="section-title">
                <h3 style="color: #0F172A;">Rekomendasi Produk Kategori Terpopuler</h3>
            </div>
            <a href="#" class="see-all">Lihat Semua →</a>
        </div>

        <div class="product-grid recommendation-grid">
            <!-- Item 1 -->
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

            <!-- Item 2 -->
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

            <!-- Item 3 -->
            <div class="product-card">
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

            <!-- Item 4 -->
            <div class="product-card">
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

            <!-- Item 5 -->
            <div class="product-card">
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

            <!-- Item 6 -->
            <div class="product-card">
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

            <!-- Item 7 -->
            <div class="product-card">
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

            <!-- Item 8 -->
            <div class="product-card">
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
