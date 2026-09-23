<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StoreController extends Controller
{
    /**
     * Tampilkan Pengaturan Profil Toko menggunakan SQL Query Builder
     */
    public function edit()
    {
        $userId = auth()->id();

        // SQL Query Builder: Mengambil data toko berdasarkan user_id
        $store = DB::table('stores')
            ->where('user_id', $userId)
            ->first();

        if (!$store) {
            abort(404, 'Toko Anda belum terdaftar.');
        }

        return view('seller.toko-edit', compact('store'));
    }

    /**
     * Update Profil Toko menggunakan SQL Query Builder
     */
    public function update(Request $request)
    {
        $userId = auth()->id();

        // Ambil ID toko
        $store = DB::table('stores')->where('user_id', $userId)->first();

        if (!$store) {
            abort(404);
        }

        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $slug = Str::slug($request->name) . '-' . Str::random(4);

        // SQL Query Builder: Update record tabel 'stores'
        DB::table('stores')
            ->where('id', $store->id)
            ->update([
                'name'        => $request->name,
                'slug'        => $slug,
                'description' => $request->description,
                'updated_at'  => now(), // Wajib diisi manual pada Query Builder
            ]);

        return redirect()->back()->with('success', 'Profil toko berhasil diperbarui!');
    }
}
