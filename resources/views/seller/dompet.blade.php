@extends('layouts.seller')

@section('title', 'Dompet Toko - Seller Dashboard NusaMart')

@section('content')
    <!-- Top Header -->
    <div class="top-header">
        <div class="page-title">
            <h2>Dompet Toko</h2>
            <p>Pantau saldo hasil penjualan, pencairan dana escrow, dan riwayat penarikan ke rekening.</p>
        </div>
    </div>

    <!-- Dompet Toko & Metrik Ringkas -->
    <div class="dashboard-cards">
        <div class="card wallet-card">
            <div>
                <p>Saldo Siap Ditarik</p>
                <h3>Rp 8.450.000</h3>
            </div>
            <button type="button" class="btn-withdraw">Tarik Dana Ke Rekening</button>
        </div>

        <div class="card kpi-card">
            <p>Dana Tertahan (Escrow)</p>
            <h3 style="color: #D97706;">Rp 1.499.000</h3>
        </div>

        <div class="card kpi-card">
            <p>Total Ditarik (Bulan Ini)</p>
            <h3>Rp 12.500.000</h3>
        </div>

        <div class="card kpi-card">
            <p>Total Pendapatan Toko</p>
            <h3 style="color: #059669;">Rp 22.449.000</h3>
        </div>
    </div>

    <!-- Tabel Riwayat Transaksi Dompet (Mutasi Saldo) -->
    <div class="table-container">
        <div class="table-header">
            <h3>Riwayat Mutasi Saldo & Penarikan</h3>
            <div class="bank-info-box">
                🏦 Rekening Tujuan: <strong>BCA •••• 8821 (a.n. Budi Santoso)</strong>
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Tanggal & Waktu</th>
                    <th>ID Transaksi / Ref</th>
                    <th>Tipe Transaksi</th>
                    <th>Nominal</th>
                    <th>Status</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>08 Sep 2026, 11:30</td>
                    <td><strong>#TRX-88210</strong></td>
                    <td>Penarikan Dana</td>
                    <td><span class="amount-out">- Rp 2.500.000</span></td>
                    <td><span class="badge badge-green">Berhasil</span></td>
                    <td>Transfer ke BCA (•••• 8821)</td>
                </tr>
                <tr>
                    <td>07 Sep 2026, 15:45</td>
                    <td><strong>#ORD-9915</strong></td>
                    <td>Pencairan Escrow</td>
                    <td><span class="amount-in">+ Rp 398.000</span></td>
                    <td><span class="badge badge-green">Selesai</span></td>
                    <td>Pesanan #ORD-9915 Selesai</td>
                </tr>
                <tr>
                    <td>06 Sep 2026, 09:12</td>
                    <td><strong>#ORD-9910</strong></td>
                    <td>Pencairan Escrow</td>
                    <td><span class="amount-in">+ Rp 1.250.000</span></td>
                    <td><span class="badge badge-green">Selesai</span></td>
                    <td>Pesanan #ORD-9910 Selesai</td>
                </tr>
                <tr>
                    <td>08 Sep 2026, 12:00</td>
                    <td><strong>#ORD-9921</strong></td>
                    <td>Pencairan Escrow</td>
                    <td><span style="color: #D97706; font-weight: 700;">+ Rp 1.499.000</span></td>
                    <td><span class="badge badge-amber">Tertahan (Escrow)</span></td>
                    <td>Menunggu Pesanan Diterima Pembeli</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
