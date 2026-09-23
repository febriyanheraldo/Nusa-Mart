<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //menamapilkan daftar produk yang dimiliki seller
    public function index()
    {
        $store = auth()->user()->store;

        // 1. Ambil seluruh koleksi produk toko
        $allProducts = $store->products;

        // 2. Hitung Total Produk
        $activeCount = $allProducts->count();

        // 3. Hitung Stok Menipis (stok antara 1 sampai 4) menggunakan filter closure
        $lowStockCount = $allProducts->filter(function ($product) {
            return $product->stock > 0 && $product->stock < 5;
        })->count();

        // 4. Hitung Stok Habis (stok <= 0)
        $outOfStockCount = $allProducts->filter(function ($product) {
            return $product->stock <= 0;
        })->count();

        // 5. Data produk dengan paginasi untuk tabel
        $products = $store->products()->latest()->paginate(5);

        return view('seller.produk', compact(
            'products',
            'activeCount',
            'lowStockCount',
            'outOfStockCount'
        ));
    }

//menampilkan form untuk menambahkan produk baru
    public function create()
    {
        return view('seller.produk-create');
    }

    //menyimpan produk baru kedatabase
    public function store(Request $request)
    {
        $store = auth()->user()->store;

        $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|max:100|unique:products,sku',
            'category' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'description' => 'nullable|string',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        $status = $request->stock > 0 ? 'active' : 'out_of_stock';

        $store->products()->create([
            'name' => $request->name,
            'sku' => $request->sku,
            'category' => $request->category,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'image' => $imagePath,
            'status' => $status,
        ]);

//mengembalikan ke halaman daftar produk
        return redirect()->route('seller.produk')->with('success', 'Produk berhasil ditambahkan!');
    }

//menampilkan form untuk mengedit produk
public function edit(Product $product)
{
    if ($product->store_id !== auth()->user()->store->id) {
        abort(403);
    }

//mengembalikan kehalaman editproduk
    return view('seller.produk-edit', compact('product'));
}

//menyimpan perubahan produk ke database
public function update(Request $request, Product $product)
{
    if ($product->store_id !== auth()->user()->store->id) {
        abort(403);
    }

    $request->validate([
        'name' => 'required|string|max:255',
        'sku' => 'required|string|max:100|unique:products,sku,' . $product->id,
        'category' => 'required|string',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        'description' => 'nullable|string',
    ]);

    $imagePath = $product->image;
    if ($request->hasFile('image')) {
        // Hapus gambar lama jika ada
        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }
        $imagePath = $request->file('image')->store('products', 'public');
    }

    $status = $request->stock > 0 ? 'active' : 'out_of_stock';

    $product->update([
        'name' => $request->name,
        'sku' => $request->sku,
        'category' => $request->category,
        'price' => $request->price,
        'stock' => $request->stock,
        'description' => $request->description,
        'image' => $imagePath,
        'status' => $status,
    ]);

//mengembalikan ke halaman daftar produk
    return redirect()->route('seller.produk')->with('success', 'Produk berhasil diperbarui!');
}
//menghapus produk dari database
    public function destroy(Product $product)
    {
        if ($product->store_id !== auth()->user()->store->id) {
            abort(403);
        }

        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();
        return redirect()->route('seller.produk')->with('success', 'Produk berhasil dihapus.');
    }
}
