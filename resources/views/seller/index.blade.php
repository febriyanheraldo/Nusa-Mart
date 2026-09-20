@extends('layouts.seller')

@section('title', 'Dashboard Seller - NusaMart')

@section('content')
    <!-- Top Header -->
    <div class="top-header">
        <div class="page-title">
            <h2>Dashboard Seller</h2>
            <p>Kelola pesanan masuk, kemas barang, dan input resi untuk pengiriman.</p>
        </div>
    </div>

    <!-- Dompet Toko & Metrik Ringkas -->
    <div class="dashboard-cards">
        <div class="card wallet-card">
            <div>
                <p>Saldo Toko (Siap Ditarik)</p>
                <h3>Rp 8.450.000</h3>
            </div>
            <button type="button" class="btn-withdraw">Tarik Dana Ke Rekening</button>
        </div>

        <div class="card kpi-card">
            <p>Pesanan Perlu Dikirim</p>
            <h3>3 Order</h3>
        </div>

        <div class="card kpi-card">
            <p>Sedang Dalam Pengiriman</p>
            <h3>12 Order</h3>
        </div>

        <div class="card kpi-card">
            <p>Total Produk Aktif</p>
            <h3>24 Item</h3>
        </div>
    </div>

    <!-- Tabel Kelola Pesanan & Input Resi -->
    <div class="table-container">
        <div class="table-header">
            <h3>Daftar Pesanan Masuk</h3>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID Order</th>
                    <th>Produk Dipesan</th>
                    <th>Pembeli</th>
                    <th>Total Harga</th>
                    <th>Status Pembayaran</th>
                    <th>Aksi Penjual (Input Resi)</th>
                </tr>
            </thead>
            <tbody>
                <!-- Kondisi 1: Pesanan baru, perlu input resi -->
                <tr>
                    <td><strong>#ORD-9922</strong></td>
                    <td>Headphone Wireless Pro 2 (x1)</td>
                    <td>Budi Santoso</td>
                    <td>Rp 899.000</td>
                    <td><span class="badge badge-amber">Paid (Perlu Dikirim)</span></td>
                    <td>
                        <form action="#" method="POST" style="display: flex; align-items: center;">
                            @csrf
                            <input type="text" name="tracking_number" class="input-resi" placeholder="Masukkan No. Resi..." required>
                            <button type="submit" class="btn-submit-resi">Kirim</button>
                        </form>
                    </td>
                </tr>
                <!-- Kondisi 2: Resi sudah diinput, barang dalam pengiriman -->
                <tr>
                    <td><strong>#ORD-9920</strong></td>
                    <td>Smartwatch Series 8 (x1)</td>
                    <td>Siti Aminah</td>
                    <td>Rp 1.250.000</td>
                    <td><span class="badge badge-blue">Shipped (Dikirim)</span></td>
                    <td><small>Resi: <strong>JP98213821</strong></small></td>
                </tr>
                <!-- Kondisi 3: Pesanan selesai -->
                <tr>
                    <td><strong>#ORD-9915</strong></td>
                    <td>Mouse Wireless Ergonomis (x2)</td>
                    <td>Rian Pratama</td>
                    <td>Rp 398.000</td>
                    <td><span class="badge badge-green">Completed</span></td>
                    <td><small style="color: #059669;">Dana Dicairkan</small></td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
