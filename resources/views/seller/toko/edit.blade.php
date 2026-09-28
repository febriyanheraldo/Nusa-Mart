@extends('layouts.app')

@section('title', 'Edit Toko Seller - NusaMart')

@section('content')
<main class="full-container" style="max-width: 600px; margin: 40px auto;">
    <div style="background: #FFFFFF; border: 1px solid #E2E8F0; border-radius: 16px; padding: 32px;">

        <h2 style="font-size: 22px; font-weight: 800; color: #0F172A; margin-bottom: 8px;">
            🏬 Pengaturan Toko NusaMart
        </h2>

        <p style="font-size: 14px; color: #64748B; margin-bottom: 24px;">
            Perbarui informasi toko Anda agar pelanggan mendapatkan informasi yang sesuai.
        </p>

        @if(session('success'))
            <div style="background: #DCFCE7; color: #166534; border: 1px solid #86EFAC; padding: 12px 14px; border-radius: 8px; margin-bottom: 20px; font-size: 14px;">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div style="background: #FEE2E2; color: #991B1B; border: 1px solid #FCA5A5; padding: 12px 14px; border-radius: 8px; margin-bottom: 20px; font-size: 14px;">
                <strong>Terdapat kesalahan:</strong>

                <ul style="margin: 8px 0 0 18px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('seller.toko.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div style="margin-bottom: 20px;">
                <label style="display: block; font-size: 13px; font-weight: 700; margin-bottom: 6px;">
                    Nama Toko
                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name', $store->name) }}"
                    placeholder="Contoh: Toko Elektronik Jaya"
                    required
                    style="width: 100%; padding: 10px 14px; border: 1.5px solid #CBD5E1; border-radius: 8px; font-size: 14px;"
                >

                @error('name')
                    <small style="color: #E11D48;">{{ $message }}</small>
                @enderror
            </div>

            <div style="margin-bottom: 24px;">
                <label style="display: block; font-size: 13px; font-weight: 700; margin-bottom: 6px;">
                    Deskripsi Singkat Toko
                </label>

                <textarea
                    name="description"
                    rows="4"
                    placeholder="Jelaskan produk apa yang Anda jual..."
                    style="width: 100%; padding: 10px 14px; border: 1.5px solid #CBD5E1; border-radius: 8px; font-size: 14px; resize: vertical;"
                >{{ old('description', $store->description) }}</textarea>

                @error('description')
                    <small style="color: #E11D48;">{{ $message }}</small>
                @enderror
            </div>

            <button
                type="submit"
                style="width: 100%; background: #10B981; color: #FFF; border: none; padding: 12px; border-radius: 8px; font-weight: 700; cursor: pointer;"
            >
                Simpan Perubahan
            </button>
        </form>

    </div>
</main>
@endsection
