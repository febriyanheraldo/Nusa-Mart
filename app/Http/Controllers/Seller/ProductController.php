<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $store = auth()->user()->store;
        $products = $store->products()->latest()->get();

        $activeCount = $products->where('status', 'active')->count();
        $lowStockCount = $products->where('stock', '>', 0)->where('stock', '<', 5)->count();
        $outOfStockCount = $products->where('stock', 0)->count();

        return view('seller.produk', compact('products', 'activeCount', 'lowStockCount', 'outOfStockCount'));
    }

    public function create()
    {
        return view('seller.produk-create');
    }

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

        return redirect()->route('seller.produk')->with('success', 'Produk berhasil ditambahkan!');
    }

public function edit(Product $product)
{
    if ($product->store_id !== auth()->user()->store->id) {
        abort(403);
    }

    return view('seller.produk-edit', compact('product'));
}

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

    return redirect()->route('seller.produk')->with('success', 'Produk berhasil diperbarui!');
}

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
