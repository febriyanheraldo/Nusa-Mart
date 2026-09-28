@extends('layouts.app')

@section('title', 'Buka Toko Seller - NusaMart')

@section('content')
<main class="full-container" style="max-width: 600px; margin: 40px auto;">
    <div style="background: #FFFFFF; border: 1px solid #E2E8F0; border-radius: 16px; padding: 32px;">
        <h2 style="font-size: 22px; font-weight: 800; color: #0F172A; margin-bottom: 8px;">🏬 Buka Toko NusaMart Anda</h2>
        <p style="font-size: 14px; color: #64748B; margin-bottom: 24px;">Lengkapi informasi nama dan deskripsi toko untuk mulai berjualan.</p>

        <form action="{{ route('seller.store.store') }}" method="POST">
            @csrf
            <div style="margin-bottom: 20px;">
                <label style="display: block; font-size: 13px; font-weight: 700; margin-bottom: 6px;">Nama Toko</label>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="Contoh: Toko Elektronik Jaya" required
                    style="width: 100%; padding: 10px 14px; border: 1.5px solid #CBD5E1; border-radius: 8px; font-size: 14px;">
                @error('name') <small style="color: #E11D48;">{{ $message }}</small> @enderror
            </div>

            <div style="margin-bottom: 24px;">
                <label style="display: block; font-size: 13px; font-weight: 700; margin-bottom: 6px;">Deskripsi Singkat Toko</label>
                <textarea name="description" rows="3" placeholder="Jelaskan produk apa yang Anda jual..."
                    style="width: 100%; padding: 10px 14px; border: 1.5px solid #CBD5E1; border-radius: 8px; font-size: 14px;">{{ old('description') }}</textarea>
            </div>

            <button type="submit" style="width: 100%; background: #10B981; color: #FFF; border: none; padding: 12px; border-radius: 8px; font-weight: 700; cursor: pointer;">
                Buka Toko Sekarang
            </button>
        </form>
    </div>
</main>
@endsection
