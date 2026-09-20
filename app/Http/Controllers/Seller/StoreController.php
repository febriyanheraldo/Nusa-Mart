<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StoreController extends Controller
{
    public function create()
    {
        if (auth()->user()->store) {
            return redirect()->route('seller.dashboard');
        }

        return view('seller.store.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:stores,name',
            'description' => 'nullable|string|max:1000',
        ]);

        Store::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'status' => 'active',
        ]);

        return redirect()->route('seller.dashboard')->with('success', 'Selamat! Toko Anda berhasil dibuat.');
    }
}
