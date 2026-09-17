<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/flash-sale', function () { return view('flash-sale'); })->name('flash-sale');
Route::get('/gratis-ongkir', function () { return view('gratis-ongkir'); })->name('gratis-ongkir');
Route::get('/lacak-pesanan', function () { return view('lacak-pesanan'); })->name('lacak-pesanan');
Route::get('/kategori', function () { return view('kategori'); })->name('kategori');

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredController::class, 'create'])->name('register');
    Route::post('register', [RegisteredController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    Route::get('/dashboard', function () {
        $role = auth()->user()->role;

        return match ($role) {
            'admin' => redirect()->route('admin.dashboard'),
            'seller' => redirect()->route('seller.dashboard'),
            default => redirect()->route('customer.dashboard'),
        };
    })->name('dashboard');

    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', function () {
            return 'Selamat Datang Admin NusaMart';
        })->name('dashboard');
    });

    Route::middleware('role:seller')->prefix('seller')->name('seller.')->group(function () {
        Route::get('/dashboard', function () {
            return 'Selamat Datang Seller NusaMart';
        })->name('dashboard');
    });

    Route::middleware('role:customer')->prefix('customer')->name('customer.')->group(function () {
        Route::get('/dashboard', function () {
            return 'Selamat Datang Customer NusaMart';
        })->name('dashboard');
    });
});
