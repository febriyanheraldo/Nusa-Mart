<?php

namespace Database\Factories;

use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        // Daftar nama produk yang realistis beserta kategorinya
        $sampleProducts = [
            ['name' => 'Headphone Wireless Pro 2', 'category' => 'Elektronik & Audio', 'price' => 899000],
            ['name' => 'Smartwatch Series 8 Sport', 'category' => 'Gadget & Wearable', 'price' => 1250000],
            ['name' => 'Mouse Wireless Ergonomis Silent', 'category' => 'Aksesoris Komputer', 'price' => 199000],
            ['name' => 'Kemeja Batik Premium Slimfit', 'category' => 'Pakaian & Fashion', 'price' => 249000],
            ['name' => 'Keyboard Mechanical RGB 60%', 'category' => 'Aksesoris Komputer', 'price' => 450000],
            ['name' => 'Tas Ransel Laptop Waterproof', 'category' => 'Lainnya', 'price' => 320000],
            ['name' => 'Earphones TWS Bass Boost', 'category' => 'Elektronik & Audio', 'price' => 299000],
            ['name' => 'Sepatu Sneaker Casual Pria', 'category' => 'Pakaian & Fashion', 'price' => 389000],
            ['name' => 'Charger GaN Fast Charging 65W', 'category' => 'Gadget & Wearable', 'price' => 210000],
            ['name' => 'Kacamata Anti Radiasi Bluelight', 'category' => 'Lainnya', 'price' => 120000],
        ];

        // Ambil satu sampel produk secara acak
        $product = fake()->randomElement($sampleProducts);

        // Buat variasi kode unik di akhir nama agar tidak duplikat sempurna
        $variant = fake()->randomElement(['v1', 'v2', 'Pro', 'Max', 'Edition', 'Ultra']);
        $finalName = $product['name'] . ' ' . $variant;

        return [
            'store_id'    => Store::inRandomOrder()->first()?->id ?? Store::factory()->create()->id,
            'name'        => $finalName,
            'sku'         => 'SKU-' . strtoupper(Str::random(8)),
            'category'    => $product['category'],
            'price'       => $product['price'] + fake()->numberBetween(-20000, 50000), // Sedikit variasi harga
            'stock'       => fake()->numberBetween(0, 45), // Kombinasi stok ada dan habis
            'description' => 'Produk berkualitas tinggi dari toko terpercaya dengan garansi resmi.',
            'image'       => null,
            'status'      => 'active',
        ];
    }
}
