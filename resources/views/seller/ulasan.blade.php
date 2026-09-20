@extends('layouts.seller')

@section('title', 'Ulasan Pembeli - Seller Dashboard NusaMart')

@section('content')
    <!-- Top Header -->
    <div class="top-header">
        <div class="page-title">
            <h2>Ulasan Pembeli</h2>
            <p>Pantau umpan balik pelanggan, nilai performa produk, dan berikan tanggapan ulasan.</p>
        </div>
    </div>

    <!-- Metrik Ulasan (KPI) -->
    <div class="kpi-grid">
        <div class="kpi-card">
            <p>Rating Rata-Rata Toko</p>
            <h3 style="color: #F59E0B;">★ 4.9 <small style="font-size: 13px; color: #64748B; font-weight: normal;">/ 5.0</small></h3>
        </div>
        <div class="kpi-card">
            <p>Total Ulasan Masuk</p>
            <h3>128 Ulasan</h3>
        </div>
        <div class="kpi-card">
            <p>Belum Dibalas</p>
            <h3 style="color: #D97706;">2 Ulasan</h3>
        </div>
        <div class="kpi-card">
            <p>Kepuasan Pelanggan</p>
            <h3 style="color: #059669;">98.4%</h3>
        </div>
    </div>

    <!-- Tabel Daftar Ulasan Pembeli -->
    <div class="table-container">
        <div class="table-header">
            <h3>Daftar Ulasan & Penilaian Produk</h3>
            <input type="text" class="search-reviews" placeholder="Cari ulasan / nama pembeli...">
        </div>
        <table>
            <thead>
                <tr>
                    <th>Pembeli</th>
                    <th>Produk Dipesan</th>
                    <th>Rating & Ulasan</th>
                    <th>Tanggal</th>
                    <th>Respon Penjual</th>
                </tr>
            </thead>
            <tbody>
                <!-- Ulasan 1: Sudah Dibalas -->
                <tr>
                    <td>
                        <div class="reviewer-cell">
                            <div class="reviewer-avatar">RP</div>
                            <div><strong>Rian Pratama</strong></div>
                        </div>
                    </td>
                    <td>Mouse Wireless Ergonomis</td>
                    <td>
                        <div class="stars">★★★★★</div>
                        <div class="review-comment">"Pengiriman sangat cepat, respon seller ramah, produk berfungsi normal tanpa kendala!"</div>
                    </td>
                    <td><small style="color: #64748B;">07 Sep 2026</small></td>
                    <td>
                        <div class="seller-reply-box">
                            <strong>Balasan Anda:</strong> Terima kasih telah berbelanja di Gudang Gadget ID! Semoga awet produknya.
                        </div>
                    </td>
                </tr>

                <!-- Ulasan 2: Perlu Dibalas -->
                <tr>
                    <td>
                        <div class="reviewer-cell">
                            <div class="reviewer-avatar" style="background-color: #E0E7FF; color: #4338CA;">SA</div>
                            <div><strong>Siti Aminah</strong></div>
                        </div>
                    </td>
                    <td>Smartwatch Series 8</td>
                    <td>
                        <div class="stars">★★★★★</div>
                        <div class="review-comment">"Barang original 100%, packing bubble wrap tebal banget, sangat aman."</div>
                    </td>
                    <td><small style="color: #64748B;">06 Sep 2026</small></td>
                    <td>
                        <form action="#" method="POST" class="action-group">
                            @csrf
                            <input type="text" name="reply" class="input-reply" placeholder="Tulis balasan..." required>
                            <button type="submit" class="btn-submit-reply">Kirim</button>
                        </form>
                    </td>
                </tr>

                <!-- Ulasan 3: Perlu Dibalas -->
                <tr>
                    <td>
                        <div class="reviewer-cell">
                            <div class="reviewer-avatar" style="background-color: #FEF3C7; color: #B45309;">BS</div>
                            <div><strong>Budi Santoso</strong></div>
                        </div>
                    </td>
                    <td>Headphone Wireless Pro 2</td>
                    <td>
                        <div class="stars">★★★★☆</div>
                        <div class="review-comment">"Suaranya jernih, bass mantap. Cuma kurirnya agak lama sampai, tapi barang oke."</div>
                    </td>
                    <td><small style="color: #64748B;">05 Sep 2026</small></td>
                    <td>
                        <form action="#" method="POST" class="action-group">
                            @csrf
                            <input type="text" name="reply" class="input-reply" placeholder="Tulis balasan..." required>
                            <button type="submit" class="btn-submit-reply">Kirim</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
