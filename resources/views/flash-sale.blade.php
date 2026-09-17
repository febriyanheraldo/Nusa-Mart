@extends('layouts.app')

@section('title', 'Flash Sale Diskon Heboh - NusaMart')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/fs.css') }}">
@endpush

@section('content')
<main class="full-container">

    <!-- Hero Banner Flash Sale -->
    <section class="flash-hero-banner">
        <div class="banner-text">
            <div class="flash-badge-title">
                <i class="fa-solid fa-bolt"></i> FLASH SALE SPESIAL
            </div>
            <h1 class="banner-title">Diskon Kilat Hingga 90%</h1>
            <p class="banner-subtitle">Promo terbatas setiap hari! Dapatkan barang impian Anda sebelum kehabisan stok.</p>

            <!-- Timer Countdown Besar -->
            <div class="flash-countdown-container">
                <span>Berakhir dalam:</span>
                <div class="countdown-timer-large">
                    <div class="time-block"><strong id="hours">01</strong><small>JAM</small></div> :
                    <div class="time-block"><strong id="minutes">24</strong><small>MENIT</small></div> :
                    <div class="time-block"><strong id="seconds">50</strong><small>DETIK</small></div>
                </div>
            </div>
        </div>
        <div class="banner-image-mockup">
            <div class="banner-img-placeholder">⚡</div>
            <div class="banner-img-placeholder" style="height: 250px;">🔥</div>
        </div>
    </section>

    @include('components.category-menu')

    <!-- Slot Sesi Flash Sale -->
    <section class="flash-schedule-bar">
        <div class="schedule-item active">
            <span class="time">00:00 - 12:00</span>
            <span class="status">Sedang Berlangsung</span>
        </div>
        <div class="schedule-item">
            <span class="time">12:00 - 18:00</span>
            <span class="status">Akan Datang</span>
        </div>
        <div class="schedule-item">
            <span class="time">18:00 - 24:00</span>
            <span class="status">Akan Datang</span>
        </div>
    </section>

    <!-- Katalog Produk Flash Sale -->
    <section class="section-container">
        <div class="section-header">
            <div class="section-title">
                <h3 style="color: #EA580C;"><i class="fa-solid fa-fire"></i> Produk Flash Sale Hari Ini</h3>
            </div>
        </div>

        <!-- Filter Kategori Flash Sale -->
        <div class="filter-tabs">
            <div class="tab-item active">Semua Promo</div>
            <div class="tab-item">Elektronik & Gadget</div>
            <div class="tab-item">Fashion & Aksesoris</div>
            <div class="tab-item">Kebutuhan Rumah</div>
            <div class="tab-item">Kecantikan</div>
        </div>

        <div class="product-grid recommendation-grid">

            <!-- Product Card 1 -->
            <div class="product-card">
                <span class="discount-badge">50% OFF</span>
                <div class="product-thumb">🎧</div>
                <div class="product-info">
                    <div>
                        <div class="product-title">TWS Bluetooth 5.3 Noise Cancelling</div>
                        <div class="original-price">Rp 259.000</div>
                        <div class="product-price">Rp 129.000</div>
                    </div>
                    <div class="stock-progress-container">
                        <div class="stock-progress-bar" style="width: 85%;"></div>
                        <span class="stock-text">Terjual 85%</span>
                    </div>
                </div>
            </div>

            <!-- Product Card 2 -->
            <div class="product-card">
                <span class="discount-badge">30% OFF</span>
                <div class="product-thumb">👟</div>
                <div class="product-info">
                    <div>
                        <div class="product-title">Sepatu Running Pria Ultra Light</div>
                        <div class="original-price">Rp 270.000</div>
                        <div class="product-price">Rp 189.500</div>
                    </div>
                    <div class="stock-progress-container">
                        <div class="stock-progress-bar" style="width: 60%;"></div>
                        <span class="stock-text">Terjual 60%</span>
                    </div>
                </div>
            </div>

            <!-- Product Card 3 -->
            <div class="product-card">
                <span class="discount-badge">40% OFF</span>
                <div class="product-thumb">🫕</div>
                <div class="product-info">
                    <div>
                        <div class="product-title">Air Fryer Digital 4.5L Low Watt</div>
                        <div class="original-price">Rp 915.000</div>
                        <div class="product-price">Rp 549.000</div>
                    </div>
                    <div class="stock-progress-container">
                        <div class="stock-progress-bar" style="width: 92%;"></div>
                        <span class="stock-text">Hampir Habis!</span>
                    </div>
                </div>
            </div>

            <!-- Product Card 4 -->
            <div class="product-card">
                <span class="discount-badge">50% OFF</span>
                <div class="product-thumb">🧴</div>
                <div class="product-info">
                    <div>
                        <div class="product-title">Serum Brightening Niacinamide 20ml</div>
                        <div class="original-price">Rp 99.800</div>
                        <div class="product-price">Rp 49.900</div>
                    </div>
                    <div class="stock-progress-container">
                        <div class="stock-progress-bar" style="width: 45%;"></div>
                        <span class="stock-text">Terjual 45%</span>
                    </div>
                </div>
            </div>

            <!-- Product Card 5 -->
            <div class="product-card">
                <span class="discount-badge">50% OFF</span>
                <div class="product-thumb">⌚</div>
                <div class="product-info">
                    <div>
                        <div class="product-title">Smartwatch AMOLED Sport Edition</div>
                        <div class="original-price">Rp 798.000</div>
                        <div class="product-price">Rp 399.000</div>
                    </div>
                    <div class="stock-progress-container">
                        <div class="stock-progress-bar" style="width: 78%;"></div>
                        <span class="stock-text">Terjual 78%</span>
                    </div>
                </div>
            </div>

            <!-- Product Card 6 -->
            <div class="product-card">
                <span class="discount-badge">40% OFF</span>
                <div class="product-thumb">⌨️</div>
                <div class="product-info">
                    <div>
                        <div class="product-title">Mechanical Keyboard RGB Wireless</div>
                        <div class="original-price">Rp 765.000</div>
                        <div class="product-price">Rp 459.000</div>
                    </div>
                    <div class="stock-progress-container">
                        <div class="stock-progress-bar" style="width: 30%;"></div>
                        <span class="stock-text">Terjual 30%</span>
                    </div>
                </div>
            </div>

            <!-- Product Card 7 -->
            <div class="product-card">
                <span class="discount-badge">60% OFF</span>
                <div class="product-thumb">🎒</div>
                <div class="product-info">
                    <div>
                        <div class="product-title">Tas Ransel Laptop Anti Air Unisex</div>
                        <div class="original-price">Rp 350.000</div>
                        <div class="product-price">Rp 139.000</div>
                    </div>
                    <div class="stock-progress-container">
                        <div class="stock-progress-bar" style="width: 88%;"></div>
                        <span class="stock-text">Terjual 88%</span>
                    </div>
                </div>
            </div>

            <!-- Product Card 8 -->
            <div class="product-card">
                <span class="discount-badge">70% OFF</span>
                <div class="product-thumb">🕶️</div>
                <div class="product-info">
                    <div>
                        <div class="product-title">Kacamata Polarized UV400 Sport</div>
                        <div class="original-price">Rp 200.000</div>
                        <div class="product-price">Rp 59.000</div>
                    </div>
                    <div class="stock-progress-container">
                        <div class="stock-progress-bar" style="width: 95%;"></div>
                        <span class="stock-text">Hampir Habis!</span>
                    </div>
                </div>
            </div>

        </div>
    </section>

</main>
@endsection

@push('scripts')
<script>
    // Simple Interactive Countdown Timer Functionality
    let hours = 1;
    let minutes = 24;
    let seconds = 50;

    const hoursEl = document.getElementById('hours');
    const minutesEl = document.getElementById('minutes');
    const secondsEl = document.getElementById('seconds');

    setInterval(() => {
        if (seconds > 0) {
            seconds--;
        } else {
            if (minutes > 0) {
                minutes--;
                seconds = 59;
            } else {
                if (hours > 0) {
                    hours--;
                    minutes = 59;
                    seconds = 59;
                }
            }
        }

        if (hoursEl) hoursEl.textContent = String(hours).padStart(2, '0');
        if (minutesEl) minutesEl.textContent = String(minutes).padStart(2, '0');
        if (secondsEl) secondsEl.textContent = String(seconds).padStart(2, '0');
    }, 1000);
</script>
@endpush
