@extends('layouts.seller')

@section('title', 'Tambah Produk Baru - Seller Dashboard NusaMart')

@section('content')
    <!-- Top Header -->
    <div class="top-header">
        <div class="page-title">
            <h2>Tambah Produk Baru</h2>
            <p>Isi rincian informasi barang dagangan baru untuk ditambahkan ke katalog toko Anda.</p>
        </div>
    </div>

    <!-- Container Form Tambah Produk -->
    <div class="form-container">
        <form action="{{ route('seller.produk.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-grid">
                <!-- Nama Produk -->
                <div class="form-group full-width">
                    <label for="name">Nama Produk <span style="color: #E11D48;">*</span></label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Contoh: Headphone Wireless Pro 2" required>
                    @error('name')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <!-- SKU Produk -->
                <div class="form-group">
                    <label for="sku">Kode SKU Produk <span style="color: #E11D48;">*</span></label>
                    <input type="text" id="sku" name="sku" value="{{ old('sku') }}" placeholder="Contoh: GG-HWP2-01" required>
                    @error('sku')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Kategori Produk -->
                <div class="form-group">
                    <label for="category">Kategori <span style="color: #E11D48;">*</span></label>
                    <select id="category" name="category" required>
                        <option value="" disabled selected>-- Pilih Kategori --</option>
                        <option value="Elektronik & Audio" {{ old('category') == 'Elektronik & Audio' ? 'selected' : '' }}>Elektronik & Audio</option>
                        <option value="Gadget & Wearable" {{ old('category') == 'Gadget & Wearable' ? 'selected' : '' }}>Gadget & Wearable</option>
                        <option value="Aksesoris Komputer" {{ old('category') == 'Aksesoris Komputer' ? 'selected' : '' }}>Aksesoris Komputer</option>
                        <option value="Pakaian & Fashion" {{ old('category') == 'Pakaian & Fashion' ? 'selected' : '' }}>Pakaian & Fashion</option>
                        <option value="Lainnya" {{ old('category') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                    @error('category')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Harga Jual -->
                <div class="form-group">
                    <label for="price">Harga Jual (Rp) <span style="color: #E11D48;">*</span></label>
                    <input type="number" id="price" name="price" value="{{ old('price') }}" placeholder="Contoh: 899000" min="0" required>
                    @error('price')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Stok Barang -->
                <div class="form-group">
                    <label for="stock">Jumlah Stok <span style="color: #E11D48;">*</span></label>
                    <input type="number" id="stock" name="stock" value="{{ old('stock', 10) }}" placeholder="Contoh: 18" min="0" required>
                    @error('stock')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group full-width">
                    <label for="image">Foto Produk (PNG, JPG, WEBP - Max 2MB)</label>
                    <input type="file" id="image" name="image" accept="image/*">
                    @error('image')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Deskripsi Produk -->
                <div class="form-group full-width">
                    <label for="description">Deskripsi Produk</label>
                    <textarea id="description" name="description" rows="4" placeholder="Jelaskan spesifikasi dan keunggulan produk Anda...">{{ old('description') }}</textarea>
                    @error('description')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Tombol Aksi Form -->
            <div class="form-actions">
                <a href="{{ route('seller.produk') }}" class="btn-cancel">Batal</a>
                <button type="submit" class="btn-submit">Simpan Produk Baru</button>
            </div>
        </form>
    </div>
@endsection
