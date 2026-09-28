<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * 1. Menampilkan Katalog Produk dari Seller
     */
    public function index()
    {
        // Eloquent ORM: Ambil produk aktif yang stoknya > 0 beserta data tokonya
        $products = Product::with('store')
            ->where('status', 'active')
            ->where('stock', '>', 0)
            ->latest()
            ->paginate(12);

        return view('customer.index', compact('products'));
    }

    /**
     * 2. Menampilkan Detail Produk & Ulasan Pembeli
     */
    public function show(Product $product)
    {
        // SQL Query Builder: Ambil ulasan produk dari pembeli
        $reviews = DB::table('reviews')
            ->join('users', 'reviews.user_id', '=', 'users.id')
            ->select('reviews.*', 'users.name as buyer_name')
            ->where('reviews.product_id', $product->id)
            ->orderBy('reviews.created_at', 'desc')
            ->get();

        return view('customer.show', compact('product', 'reviews'));
    }

    /**
     * 3. Proses Memesan / Membeli Produk (Checkout)
     */
    public function storeOrder(Request $request, Product$product)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $product->stock,
            'address'  => 'required|string|max:500',
        ], [
            'quantity.required' => 'Masukkan jumlah barang yang dibeli.',
            'quantity.max'      => 'Jumlah pesanan melebihi stok yang tersedia.',
            'address.required'  => 'Alamat pengiriman wajib diisi.',
        ]);

        $totalPrice = $product->price * $request->quantity;

        // DB Transaction untuk menjamin keutuhan data pesanan & pengurangan stok
        DB::transaction(function () use ($product, $request,$totalPrice) {
            // A. Simpan Transaksi Order via Query Builder
            $orderId = DB::table('orders')->insertGetId([
                'user_id'          => auth()->id(),
                'store_id'         => $product->store_id,
                'order_number'     => 'ORD-' . strtoupper(uniqid()),
                'total_price'      => $totalPrice,
                'shipping_address' => $request->address,
                'status'           => 'pending',
                'created_at'       => now(),
                'updated_at'       => now(),
            ]);

            // B. Simpan Item Pesanan
            DB::table('order_items')->insert([
                'order_id'   => $orderId,
                'product_id' => $product->id,
                'quantity'   => $request->quantity,
                'price'      => $product->price,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // C. Kurangi Stok Produk Seller via Eloquent ORM
            $product->decrement('stock',$request->quantity);

            if ($product->stock <= 0) {$product->update(['status' => 'out_of_stock']);
            }
        });

        return redirect()->route('customer.orders')->with('success', 'Pesanan Anda berhasil dibuat!');
    }

    /**
     * 4. Riwayat Pesanan Saya
     */
    public function myOrders()
    {
        $orders = DB::table('orders')
            ->join('stores', 'orders.store_id', '=', 'stores.id')
            ->select('orders.*', 'stores.name as store_name')
            ->where('orders.user_id', auth()->id())
            ->orderBy('orders.created_at', 'desc')
            ->get();

        return view('customer.orders', compact('orders'));
    }

    /**
     * 5. Memberikan Ulasan & Rating Produk
     */
    public function storeReview(Request $request,$productId)
    {
        $request->validate([
            'rating'  => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:500',
        ], [
            'rating.required'  => 'Pilih bintang ulasan (1-5).',
            'comment.required' => 'Tuliskan ulasan Anda tentang produk ini.',
        ]);

        // Simpan Ulasan via SQL Query Builder
        DB::table('reviews')->insert([
            'user_id'    => auth()->id(),
            'product_id' => $productId,
            'rating'     => $request->rating,
            'comment'    => $request->comment,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Terima kasih atas ulasan dan rating yang Anda berikan!');
    }
}
