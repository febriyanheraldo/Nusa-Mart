@extends('layouts.admin')

@section('title', 'Data User & Toko - Admin Panel NusaMart')

@section('content')
    <!-- Top Header -->
    <div class="top-header">
        <div class="page-title">
            <h2>Data User & Toko</h2>
            <p>Kelola akun pengguna, verifikasi data toko/seller, dan pantau status keaktifan.</p>
        </div>
        <input type="text" class="search-admin" placeholder="Cari Nama, Email, atau Toko...">
    </div>

    <!-- Metrik User & Toko (KPI) -->
    <div class="kpi-grid">
        <div class="kpi-card">
            <p>Total Pengguna</p>
            <h3 class="text-emerald">1,248 User</h3>
        </div>
        <div class="kpi-card">
            <p>Toko Terverifikasi</p>
            <h3 class="text-purple">186 Toko</h3>
        </div>
        <div class="kpi-card">
            <p>Pendaftaran Toko Baru</p>
            <h3>5 Permohonan</h3>
        </div>
        <div class="kpi-card">
            <p>Akun Ditangguhkan</p>
            <h3 style="color: #E11D48;">3 Akun</h3>
        </div>
    </div>

    <!-- Tabel Data User & Toko -->
    <div class="table-container">
        <div class="table-header">
            <h3>Daftar Pengguna & Toko Terdaftar</h3>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Pengguna</th>
                    <th>Tipe Akun</th>
                    <th>Nama Toko / Bisnis</th>
                    <th>Total Transaksi</th>
                    <th>Tanggal Bergabung</th>
                    <th>Status</th>
                    <th>Aksi Admin</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="user-cell">
                            <div class="user-avatar-sm">BS</div>
                            <div>
                                <div class="user-name">Budi Santoso</div>
                                <div class="user-email">budi.santoso@email.com</div>
                            </div>
                        </div>
                    </td>
                    <td><span class="badge badge-role-seller">Penjual & Pembeli</span></td>
                    <td><strong>Gudang Gadget ID</strong></td>
                    <td>142 Order</td>
                    <td>12 Jan 2024</td>
                    <td><span class="badge badge-active">Aktif</span></td>
                    <td>
                        <div class="action-group">
                            <button type="button" class="btn-action-outline">Detail Akun</button>
                            <button type="button" class="btn-action-danger">Bekukan</button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="user-cell">
                            <div class="user-avatar-sm" style="background-color: #E0E7FF; color: #4338CA;">SA</div>
                            <div>
                                <div class="user-name">Siti Aminah</div>
                                <div class="user-email">siti.aminah@email.com</div>
                            </div>
                        </div>
                    </td>
                    <td><span class="badge badge-role-buyer">Pembeli</span></td>
                    <td><span style="color: #94A3B8; font-style: italic;">-</span></td>
                    <td>18 Order</td>
                    <td>05 Mar 2024</td>
                    <td><span class="badge badge-active">Aktif</span></td>
                    <td>
                        <div class="action-group">
                            <button type="button" class="btn-action-outline">Detail Akun</button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="user-cell">
                            <div class="user-avatar-sm" style="background-color: #FEF3C7; color: #B45309;">RP</div>
                            <div>
                                <div class="user-name">Rian Pratama</div>
                                <div class="user-email">rian.p@techstudio.com</div>
                            </div>
                        </div>
                    </td>
                    <td><span class="badge badge-role-seller">Penjual & Pembeli</span></td>
                    <td><strong>TechStudio Bandung</strong></td>
                    <td>89 Order</td>
                    <td>20 Nov 2023</td>
                    <td><span class="badge badge-active">Aktif</span></td>
                    <td>
                        <div class="action-group">
                            <button type="button" class="btn-action-outline">Detail Akun</button>
                            <button type="button" class="btn-action-danger">Bekukan</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
