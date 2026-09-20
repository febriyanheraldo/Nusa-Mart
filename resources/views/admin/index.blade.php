@extends('layouts.admin')

@section('title', 'Dashboard Overview - Admin NusaMart')

@section('content')
    <!-- Top Header -->
    <div class="top-header">
        <div class="page-title">
            <h2>Dashboard Overview</h2>
            <p>Pantau arus transaksi, status pengiriman, dan pencairan dana escrow.</p>
        </div>
        <input type="text" class="search-admin" placeholder="Cari ID Order, Resi, atau Toko...">
    </div>

    <!-- Metrik Alur Transaksi (KPI) -->
    <div class="kpi-grid">
        <div class="kpi-card">
            <p>Perlu Validasi</p>
            <h3>18 Order</h3>
        </div>
        <div class="kpi-card">
            <p>Dana Escrow (Tertahan)</p>
            <h3>Rp 45.200.000</h3>
        </div>
        <div class="kpi-card">
            <p>Dalam Pengiriman</p>
            <h3>32 Order</h3>
        </div>
        <div class="kpi-card">
            <p>Siap Dicairkan ke Seller</p>
            <h3>14 Order</h3>
        </div>
    </div>

    <!-- Tabel Kelola Transaksi (Sesuai Flowchart) -->
    <div class="table-container">
        <div class="table-header">
            <h3>Kelola Transaksi Terintegrasi</h3>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID Order</th>
                    <th>Pelanggan</th>
                    <th>Penjual / Toko</th>
                    <th>Total Bayar</th>
                    <th>Status Order</th>
                    <th>No. Resi</th>
                    <th>Aksi Admin</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>#ORD-9921</strong></td>
                    <td>Budi Santoso</td>
                    <td>Gudang Gadget ID</td>
                    <td>Rp 1.499.000</td>
                    <td><span class="badge badge-amber">Menunggu Validasi</span></td>
                    <td>-</td>
                    <td><a href="{{ route('admin.val') }}" class="btn-action">Validasi Bayar</a></td>
                </tr>
                <tr>
                    <td><strong>#ORD-9920</strong></td>
                    <td>Siti Aminah</td>
                    <td>BajuKita Official</td>
                    <td>Rp 350.000</td>
                    <td><span class="badge badge-blue">Shipped (Dikirim)</span></td>
                    <td>JP98213821</td>
                    <td><a href="{{ route('admin.resi') }}" class="btn-action-outline">Pantau Resi</a></td>
                </tr>
                <tr>
                    <td><strong>#ORD-9919</strong></td>
                    <td>Rian Pratama</td>
                    <td>TechStudio Bandung</td>
                    <td>Rp 850.000</td>
                    <td><span class="badge badge-green">Completed (Escrow)</span></td>
                    <td>JNE-00129312</td>
                    <td><button type="button" class="btn-action">Cairkan Dana</button></td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
