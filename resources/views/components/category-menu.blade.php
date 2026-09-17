<section class="category-menu">
    <a href="{{ route('home') }}" class="cat-item {{ request()->routeIs('home') ? 'active' : '' }}">
        <div class="cat-icon"><i class="fa-solid fa-store"></i></div>
        <span class="cat-label">Official Store</span>
    </a>
    <a href="{{ route('flash-sale') }}" class="cat-item {{ request()->routeIs('flash-sale') ? 'active' : '' }}">
        <div class="cat-icon"><i class="fa-solid fa-bolt"></i></div>
        <span class="cat-label">Flash Sale</span>
    </a>
    <a href="{{ route('gratis-ongkir') }}" class="cat-item {{ request()->routeIs('gratis-ongkir') ? 'active' : '' }}">
        <div class="cat-icon"><i class="fa-solid fa-truck-fast"></i></div>
        <span class="cat-label">Gratis Ongkir</span>
    </a>
    <a href="{{ route('lacak-pesanan') }}" class="cat-item {{ request()->routeIs('lacak-pesanan') ? 'active' : '' }}">
        <div class="cat-icon"><i class="fa-solid fa-clipboard-list"></i></div>
        <span class="cat-label">Lacak Pesanan</span>
    </a>
    <a href="{{ route('kategori') }}" class="cat-item {{ request()->routeIs('kategori') ? 'active' : '' }}">
        <div class="cat-icon"><i class="fa-solid fa-border-all"></i></div>
        <span class="cat-label">Kategori Produk</span>
    </a>
</section>
