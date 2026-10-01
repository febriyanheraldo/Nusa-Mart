<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //menampilkan daftar produk yang dimiliki seller (+ fitur pencarian)
    public function index(Request $request)
    {
        $store = auth()->user()->store;

        // Eloquent ORM + Relasi
        // (KPI dihitung dari SEMUA produk toko, tidak terpengaruh pencarian)
        $allProducts = Product::with('store')
            ->where('store_id', $store->id)
            ->get();

        // Hitung Total Produk
        $activeCount = $allProducts->count();

        // Hitung Stok Menipis
        $lowStockCount = $allProducts->filter(function ($product) {
            return $product->stock > 0 && $product->stock < 5;
        })->count();

        // Hitung Stok Habis
        $outOfStockCount = $allProducts->filter(function ($product) {
            return $product->stock <= 0;
        })->count();

        // Kata kunci pencarian (dari ?search=...)
        $search = trim((string) $request->input('search'));

        // Data produk dengan pencarian + paginasi
        $products = Product::with('store')
            ->where('store_id', $store->id)
            ->when($search !== '', function ($query) use ($search) {
                // Dibungkus closure agar orWhere TIDAK melewati filter store_id
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhere('sku', 'like', "%{$search}%")
                      ->orWhere('category', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(5)
            ->withQueryString(); // agar kata kunci tetap terbawa saat pindah halaman

        return view('seller.produk', compact(
            'products',
            'activeCount',
            'lowStockCount',
            'outOfStockCount',
            'search'
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

    //menampilkan detail satu produk
    public function show(Product $product)
    {
        // Pastikan seller hanya bisa melihat produk miliknya sendiri
        if ($product->store_id !== auth()->user()->store->id) {
            abort(403);
        }

        return view('seller.produk-show', compact('product'));
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
