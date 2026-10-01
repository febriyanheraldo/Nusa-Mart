@extends('layouts.seller')

@section('title', 'Detail Produk - Seller Dashboard NusaMart')

@section('content')
    <!-- Top Header -->
    <div class="top-header">
        <div class="page-title">
            <h2>Detail Produk</h2>
            <p>Informasi lengkap produk yang ada di toko Anda.</p>
        </div>
        <a href="{{ route('seller.produk') }}" class="btn-add-product">← Kembali ke Katalog</a>
    </div>

    <div class="detail-card">
        <!-- Kolom Gambar -->
        <div class="detail-image">
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
            @else
                <span class="detail-image-placeholder">{{ strtoupper(substr($product->name, 0, 1)) }}</span>
            @endif
        </div>

        <!-- Kolom Informasi -->
        <div class="detail-info">
            <div class="detail-title-row">
                <h3>{{ $product->name }}</h3>
                @if($product->stock > 0)
                    <span class="badge badge-green">Aktif</span>
                @else
                    <span class="badge badge-rose">Stok Habis</span>
                @endif
            </div>

            <p class="detail-price">Rp {{ number_format($product->price, 0, ',', '.') }}</p>

            <table class="detail-table">
                <tr>
                    <th>SKU</th>
                    <td>{{ $product->sku }}</td>
                </tr>
                <tr>
                    <th>Kategori</th>
                    <td>{{ $product->category }}</td>
                </tr>
                <tr>
                    <th>Stok</th>
                    <td>
                        @if($product->stock > 0 && $product->stock < 5)
                            <span style="color: #D97706; font-weight: 700;">{{ $product->stock }} Pcs (Menipis)</span>
                        @else
                            {{ $product->stock }} Pcs
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Toko</th>
                    <td>{{ $product->store->name ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Ditambahkan</th>
                    <td>{{ $product->created_at->format('d M Y, H:i') }}</td>
                </tr>
                <tr>
                    <th>Terakhir Diperbarui</th>
                    <td>{{ $product->updated_at->format('d M Y, H:i') }}</td>
                </tr>
            </table>

            <div class="detail-desc">
                <h4>Deskripsi Produk</h4>
                @if($product->description)
                    <p>{!! nl2br(e($product->description)) !!}</p>
                @else
                    <p style="color: #94A3B8;">Belum ada deskripsi untuk produk ini.</p>
                @endif
            </div>

            <div class="action-group" style="margin-top: 24px;">
                <a href="{{ route('seller.produk.edit', $product->id) }}" class="btn-action-edit">
                    {{ $product->stock == 0 ? 'Restok' : 'Edit Produk' }}
                </a>

                <form action="{{ route('seller.produk.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-action-delete">Hapus</button>
                </form>
            </div>
        </div>
    </div>
@endsection
