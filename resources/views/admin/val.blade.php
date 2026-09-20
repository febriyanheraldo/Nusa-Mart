@extends('layouts.admin')

@section('title', 'Validasi Pembayaran - Admin Panel NusaMart')

@section('content')
    <!-- Top Header -->
    <div class="top-header">
        <div class="page-title">
            <h2>Validasi Pembayaran</h2>
            <p>Verifikasi bukti transfer transaksi pembeli dan konfirmasi status pembayaran.</p>
        </div>
        <input type="text" class="search-admin" placeholder="Cari ID Order, Resi, atau Toko...">
    </div>

    <!-- Metrik Validasi (KPI) -->
    <div class="kpi-grid">
        <div class="kpi-card">
            <p>Perlu Validasi</p>
            <h3 class="text-amber">18 Order</h3>
        </div>
        <div class="kpi-card">
            <p>Disetujui Hari Ini</p>
            <h3>24 Order</h3>
        </div>
        <div class="kpi-card">
            <p>Total Nominal Divalidasi</p>
            <h3>Rp 32.450.000</h3>
        </div>
        <div class="kpi-card">
            <p>Ditolak / Bermasalah</p>
            <h3 class="text-rose">2 Order</h3>
        </div>
    </div>

    <!-- Tabel Khusus Validasi Pembayaran -->
    <div class="table-container">
        <div class="table-header">
            <h3>Antrean Pembayaran Perlu Diverifikasi</h3>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID Order</th>
                    <th>Pelanggan</th>
                    <th>Penjual / Toko</th>
                    <th>Total Bayar</th>
                    <th>Metode</th>
                    <th>Bukti Bayar</th>
                    <th>Status</th>
                    <th>Aksi Admin</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>#ORD-9921</strong></td>
                    <td>Budi Santoso</td>
                    <td>Gudang Gadget ID</td>
                    <td><strong>Rp 1.499.000</strong></td>
                    <td>Bank BCA</td>
                    <td><a href="#" class="link-proof">📄 Lihat Bukti</a></td>
                    <td><span class="badge badge-amber">Menunggu Validasi</span></td>
                    <td>
                        <div class="action-group">
                            <button type="button" class="btn-action">Setujui Bayar</button>
                            <button type="button" class="btn-action-reject">Tolak</button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><strong>#ORD-9925</strong></td>
                    <td>Dewi Sartika</td>
                    <td>Kamera Utama Shop</td>
                    <td><strong>Rp 4.250.000</strong></td>
                    <td>Bank Mandiri</td>
                    <td><a href="#" class="link-proof">📄 Lihat Bukti</a></td>
                    <td><span class="badge badge-amber">Menunggu Validasi</span></td>
                    <td>
                        <div class="action-group">
                            <button type="button" class="btn-action">Setujui Bayar</button>
                            <button type="button" class="btn-action-reject">Tolak</button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><strong>#ORD-9918</strong></td>
                    <td>Andi Wijaya</td>
                    <td>Fashion Mania</td>
                    <td><strong>Rp 275.000</strong></td>
                    <td>QRIS / GoPay</td>
                    <td><a href="#" class="link-proof">📄 Lihat Bukti</a></td>
                    <td><span class="badge badge-amber">Menunggu Validasi</span></td>
                    <td>
                        <div class="action-group">
                            <button type="button" class="btn-action">Setujui Bayar</button>
                            <button type="button" class="btn-action-reject">Tolak</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
