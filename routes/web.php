<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Seller\StoreController;
use App\Http\Controllers\Seller\ProductController as SellerProductController;

// ==========================================
// 1. PUBLIC / FRONTEND ROUTES
// ==========================================
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/flash-sale', function () { return view('flash-sale'); })->name('flash-sale');
Route::get('/gratis-ongkir', function () { return view('gratis-ongkir'); })->name('gratis-ongkir');
Route::get('/lacak-pesanan', function () { return view('lacak-pesanan'); })->name('lacak-pesanan');
Route::get('/kategori', function () { return view('kategori'); })->name('kategori');

// ==========================================
// 2. GUEST ROUTES (LOGIN & REGISTER)
// ==========================================
Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredController::class, 'create'])->name('register');
    Route::post('register', [RegisteredController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

// ==========================================
// 3. AUTHENTICATED ROUTES
// ==========================================
Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    Route::get('/profil', function () {
        return view('profil');
    })->name('profil');

    // Central Redirect berdasarkan Role
    Route::get('/dashboard', function () {
        $role = auth()->user()->role;

        return match ($role) {
            'admin'  => redirect()->route('admin.dashboard'),
            'seller' => redirect()->route('seller.dashboard'),
            default  => redirect()->route('home'),
        };
    })->name('dashboard');

    // ==========================================
    // RUTE ADMIN DASHBOARD
    // ==========================================
    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::get('/toko', [AdminDashboardController::class, 'toko'])->name('toko');
        Route::get('/resi', [AdminDashboardController::class, 'resi'])->name('resi');
        Route::get('/val', [AdminDashboardController::class, 'val'])->name('val');
    });

    // ==========================================
    // RUTE SELLER DASHBOARD & LOGIKA TOKO
    // ==========================================
    Route::middleware('role:seller')->prefix('seller')->name('seller.')->group(function () {

        // 1. Pendaftaran Toko (Bisa diakses jika seller belum punya toko)
        Route::get('/store/create', [StoreController::class, 'create'])->name('store.create');
        Route::post('/store', [StoreController::class, 'store'])->name('store.store');

        Route::get('/toko/edit', [StoreController::class, 'edit'])->name('toko.edit');
        Route::put('/toko/update', [StoreController::class, 'update'])->name('toko.update');

        // 2. Dashboard Seller (Pengecekan toko dilakukan langsung di dalam rute)
        Route::get('/dashboard', function () {
            if (!auth()->user()->store) {
                return redirect()->route('seller.store.create')
                    ->with('warning', 'Anda harus membuat toko terlebih dahulu!');
            }
            return view('seller.index');
        })->name('dashboard');

        // 3. CRUD Katalog Produk Seller
        Route::get('/produk', [SellerProductController::class, 'index'])->name('produk');
        Route::get('/produk/create', [SellerProductController::class, 'create'])->name('produk.create');
        Route::post('/produk', [SellerProductController::class, 'store'])->name('produk.store');
        Route::get('/produk/{product}/edit', [SellerProductController::class, 'edit'])->name('produk.edit');
        Route::put('/produk/{product}', [SellerProductController::class, 'update'])->name('produk.update');
        Route::delete('/produk/{product}', [SellerProductController::class, 'destroy'])->name('produk.destroy');

        // 4. Fitur Tambahan Seller
        Route::get('/dompet', function () { return view('seller.dompet'); })->name('dompet');
        Route::get('/ulasan', function () { return view('seller.ulasan'); })->name('ulasan');
    });
});
