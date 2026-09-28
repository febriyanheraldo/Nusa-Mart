<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StoreController extends Controller
{
    /**
     * Menampilkan halaman pembuatan toko
     */
    public function create()
    {
        $userId = auth()->id();

        $store = DB::table('stores')
            ->where('user_id', $userId)
            ->first();

        // Jika sudah memiliki toko, langsung ke halaman edit
        if ($store) {
            return redirect()->route('seller.toko.edit');
        }

        return view('seller.toko.create');
    }

    /**
     * Menyimpan toko baru
     */
    public function store(Request $request)
    {
        $userId = auth()->id();

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $slug = Str::slug($request->name) . '-' . Str::random(4);

        DB::table('stores')->insert([
            'user_id' => $userId,
            'name' => $request->name,
            'slug' => $slug,
            'description' => $request->description,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()
            ->route('seller.dashboard')
            ->with('success', 'Toko Anda berhasil dibuat!');
    }

    /**
     * Menampilkan pengaturan profil toko
     */
    public function edit()
    {
        $userId = auth()->id();

        $store = DB::table('stores')
            ->where('user_id', $userId)
            ->first();

        if (!$store) {
            abort(404, 'Toko Anda belum terdaftar.');
        }

        return view('seller.toko.edit', compact('store'));
    }

    /**
     * Memperbarui profil toko
     */
    public function update(Request $request)
    {
        $userId = auth()->id();

        $store = DB::table('stores')
            ->where('user_id', $userId)
            ->first();

        if (!$store) {
            abort(404, 'Toko Anda belum terdaftar.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $slug = Str::slug($request->name) . '-' . Str::random(4);

        DB::table('stores')
            ->where('id', $store->id)
            ->update([
                'name' => $request->name,
                'slug' => $slug,
                'description' => $request->description,
                'updated_at' => now(),
            ]);

        return redirect()
            ->route('seller.dashboard')
            ->with('success', 'Profil toko berhasil diperbarui!');
    }
}
