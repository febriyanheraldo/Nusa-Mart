@extends('layouts.seller')

@section('title', 'Edit Produk - Seller Dashboard NusaMart')

@section('content')
    <!-- Top Header -->
    <div class="top-header">
        <div class="page-title">
            <h2>Edit Produk</h2>
            <p>Ubah informasi, stok, atau harga barang dagangan toko Anda.</p>
        </div>
    </div>

    <!-- Container Form Edit Produk -->
    <div class="form-container">
        <form action="{{ route('seller.produk.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-grid">
                <!-- Nama Produk -->
                <div class="form-group full-width">
                    <label for="name">Nama Produk <span style="color: #E11D48;">*</span></label>
                    <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" placeholder="Contoh: Headphone Wireless Pro 2" required>
                    @error('name')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <!-- SKU Produk -->
                <div class="form-group">
                    <label for="sku">Kode SKU Produk <span style="color: #E11D48;">*</span></label>
                    <input type="text" id="sku" name="sku" value="{{ old('sku', $product->sku) }}" placeholder="Contoh: GG-HWP2-01" required>
                    @error('sku')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Kategori Produk -->
                <div class="form-group">
                    <label for="category">Kategori <span style="color: #E11D48;">*</span></label>
                    <select id="category" name="category" required>
                        <option value="" disabled>-- Pilih Kategori --</option>
                        <option value="Elektronik & Audio" {{ old('category', $product->category) == 'Elektronik & Audio' ? 'selected' : '' }}>Elektronik & Audio</option>
                        <option value="Gadget & Wearable" {{ old('category', $product->category) == 'Gadget & Wearable' ? 'selected' : '' }}>Gadget & Wearable</option>
                        <option value="Aksesoris Komputer" {{ old('category', $product->category) == 'Aksesoris Komputer' ? 'selected' : '' }}>Aksesoris Komputer</option>
                        <option value="Pakaian & Fashion" {{ old('category', $product->category) == 'Pakaian & Fashion' ? 'selected' : '' }}>Pakaian & Fashion</option>
                        <option value="Lainnya" {{ old('category', $product->category) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                    @error('category')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Harga Jual -->
                <div class="form-group">
                    <label for="price">Harga Jual (Rp) <span style="color: #E11D48;">*</span></label>
                    <input type="number" id="price" name="price" value="{{ old('price', (int)$product->price) }}" placeholder="Contoh: 899000" min="0" required>
                    @error('price')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Stok Barang -->
                <div class="form-group">
                    <label for="stock">Jumlah Stok <span style="color: #E11D48;">*</span></label>
                    <input type="number" id="stock" name="stock" value="{{ old('stock', $product->stock) }}" placeholder="Contoh: 18" min="0" required>
                    @error('stock')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group full-width">
                    <label for="image">Foto Produk</label>
                    @if($product->image)
                        <div style="margin-bottom: 8px;">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="Foto Produk" style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px; border: 1px solid #E2E8F0;">
                        </div>
                    @endif
                    <input type="file" id="image" name="image" accept="image/*">
                    <small style="color: #64748B; font-size: 11px;">Abaikan jika tidak ingin mengubah foto produk.</small>
                    @error('image')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Deskripsi Produk -->
                <div class="form-group full-width">
                    <label for="description">Deskripsi Produk</label>
                    <textarea id="description" name="description" rows="4" placeholder="Jelaskan spesifikasi dan keunggulan produk Anda...">{{ old('description', $product->description) }}</textarea>
                    @error('description')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Tombol Aksi Form -->
            <div class="form-actions">
                <a href="{{ route('seller.produk') }}" class="btn-cancel">Batal</a>
                <button type="submit" class="btn-submit">Simpan Perubahan</button>
            </div>
        </form>
    </div>
@endsection
