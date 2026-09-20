@extends('layouts.admin')

@section('title', 'Pengiriman & Resi - Admin Panel NusaMart')

@section('content')
    <!-- Top Header -->
    <div class="top-header">
        <div class="page-title">
            <h2>Pengiriman & Resi</h2>
            <p>Pantau proses pengiriman logistik, lacak nomor resi, dan verifikasi barang sampai.</p>
        </div>
        <input type="text" class="search-admin" placeholder="Cari ID Order, Resi, atau Toko...">
    </div>

    <!-- Metrik Pengiriman (KPI) -->
    <div class="kpi-grid">
        <div class="kpi-card">
            <p>Perlu Input Resi (Seller)</p>
            <h3 class="text-amber">8 Order</h3>
        </div>
        <div class="kpi-card">
            <p>Dalam Pengiriman (Transit)</p>
            <h3 class="text-blue">32 Order</h3>
        </div>
        <div class="kpi-card">
            <p>Sampai di Tujuan Hari Ini</p>
            <h3>15 Order</h3>
        </div>
        <div class="kpi-card">
            <p>Kendala / Retur Kurir</p>
            <h3 style="color: #E11D48;">1 Order</h3>
        </div>
    </div>

    <!-- Tabel Pengiriman & Logistik -->
    <div class="table-container">
        <div class="table-header">
            <h3>Lacak & Kelola Pengiriman Transaksi</h3>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID Order</th>
                    <th>Penjual / Toko</th>
                    <th>Penerima & Alamat</th>
                    <th>Ekspedisi</th>
                    <th>No. Resi</th>
                    <th>Status Pengiriman</th>
                    <th>Aksi Admin</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>#ORD-9920</strong></td>
                    <td>BajuKita Official</td>
                    <td>Siti Aminah<br><small style="color: #64748B;">Jakarta Selatan</small></td>
                    <td><span class="courier-tag">J&T</span> Express</td>
                    <td><span class="resi-text">JP98213821</span></td>
                    <td><span class="badge badge-blue">Shipped (Dikirim)</span></td>
                    <td>
                        <div class="action-group">
                            <button type="button" class="btn-action-primary">Lacak Resi</button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><strong>#ORD-9919</strong></td>
                    <td>TechStudio Bandung</td>
                    <td>Rian Pratama<br><small style="color: #64748B;">Surabaya</small></td>
                    <td><span class="courier-tag">JNE</span> REG</td>
                    <td><span class="resi-text">JNE-00129312</span></td>
                    <td><span class="badge badge-green">Delivered (Tiba)</span></td>
                    <td>
                        <div class="action-group">
                            <button type="button" class="btn-action-outline">Detail Logistik</button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><strong>#ORD-9924</strong></td>
                    <td>Gudang Gadget ID</td>
                    <td>Bambang S.<br><small style="color: #64748B;">Medan</small></td>
                    <td><span class="courier-tag">SiCepat</span> REG</td>
                    <td><span style="color: #94A3B8; font-style: italic;">Belum Diinput</span></td>
                    <td><span class="badge badge-amber">Menunggu Resi</span></td>
                    <td>
                        <div class="action-group">
                            <button type="button" class="btn-action-outline">Ingatkan Seller</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
