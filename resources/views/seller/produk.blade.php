@extends('layouts.seller')

@section('title', 'Katalog Produk - Seller Dashboard NusaMart')

@section('content')
    <!-- Top Header -->
    <div class="top-header">
        <div class="page-title">
            <h2>Katalog Produk</h2>
            <p>Kelola daftar barang dagangan, stok produk, harga, dan variasi toko Anda.</p>
        </div>
        <a href="{{ route('seller.produk.create') }}" class="btn-add-product">➕ Tambah Produk Baru</a>
    </div>

    <!-- Alert Notifikasi Sukses -->
    @if(session('success'))
        <div style="background-color: #ECFDF5; border: 1px solid #A7F3D0; color: #065F46; padding: 12px 16px; border-radius: 10px; margin-bottom: 24px; font-size: 14px; font-weight: 600;">
            <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
        </div>
    @endif

    <!-- Metrik Ringkasan Katalog (KPI) -->
    <div class="kpi-grid">
        <div class="kpi-card">
            <div class="kpi-info">
                <p>Total Produk Aktif</p>
                <h3 class="text-green">{{ $activeCount ?? 0 }} Item</h3>
            </div>
            <div class="kpi-icon bg-green">
                <i class="fa-solid fa-box-archive"></i>
            </div>
        </div>

        <div class="kpi-card">
            <div class="kpi-info">
                <p>Stok Produk Menipis (&lt; 5)</p>
                <h3 class="text-amber">{{ $lowStockCount ?? 0 }} Item</h3>
            </div>
            <div class="kpi-icon bg-amber">
                <i class="fa-solid fa-triangle-exclamation"></i>
            </div>
        </div>

        <div class="kpi-card">
            <div class="kpi-info">
                <p>Stok Habis</p>
                <h3 class="text-rose">{{ $outOfStockCount ?? 0 }} Item</h3>
            </div>
            <div class="kpi-icon bg-rose">
                <i class="fa-solid fa-circle-xmark"></i>
            </div>
        </div>

        <div class="kpi-card">
            <div class="kpi-info">
                <p>Total Produk Terjual</p>
                <h3 class="text-blue">0 Pcs</h3>
            </div>
            <div class="kpi-icon bg-blue">
                <i class="fa-solid fa-chart-line"></i>
            </div>
        </div>
    </div>

    <!-- Tabel Daftar Produk Toko (Dynamic Data) -->
    <div class="table-container">
        <div class="table-header">
            <h3>Daftar Produk Toko</h3>
            <input type="text" class="search-product" placeholder="Cari nama produk / SKU...">
        </div>
        <table>
            <thead>
                <tr>
                    <th>Info Produk</th>
                    <th>Kategori</th>
                    <th>Harga Jual</th>
                    <th>Stok Barang</th>
                    <th>Status Produk</th>
                    <th>Aksi Penjual</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                    <tr>
                        <td>
                            <div class="product-cell">
                                <div class="product-img">
                                    @if($product->image)
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="width: 100%; height: 100%; object-fit: cover; border-radius: 8px;">
                                    @else
                                        📦
                                    @endif
                                </div>
                                <div class="product-info">
                                    <h5>{{ $product->name }}</h5>
                                    <p>SKU: {{ $product->sku }}</p>
                                </div>
                            </div>
                        </td>
                        <td>{{ $product->category }}</td>
                        <td><strong>Rp {{ number_format($product->price, 0, ',', '.') }}</strong></td>
                        <td>
                            @if($product->stock > 0 && $product->stock < 5)
                                <span style="color: #D97706; font-weight: 700;">{{ $product->stock }} Pcs</span>
                            @else
                                {{ $product->stock }} Pcs
                            @endif
                        </td>
                        <td>
                            @if($product->stock > 0)
                                <span class="badge badge-green">Aktif</span>
                            @else
                                <span class="badge badge-rose">Stok Habis</span>
                            @endif
                        </td>
                        <td>
                            <div class="action-group">
                                <a href="{{ route('seller.produk.edit', $product->id) }}" class="btn-action-edit">
                                    {{ $product->stock == 0 ? 'Restok' : 'Edit' }}
                                </a>

                                <form action="{{ route('seller.produk.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-action-delete">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align: center; color: #64748B; padding: 32px 16px;">
                            <div style="font-size: 32px; margin-bottom: 8px;">📦</div>
                            <p style="font-weight: 600; font-size: 14px;">Belum Ada Produk di Toko Anda</p>
                            <p style="font-size: 12px; opacity: 0.8; margin-top: 4px;">Klik tombol "Tambah Produk Baru" di kanan atas untuk mulai mengunggah dagangan.</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
