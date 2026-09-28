<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $sampleProducts = [
            [
                'name' => 'Headphone Wireless Pro 2',
                'category' => 'Elektronik & Audio',
                'price' => 899000
            ],
            [
                'name' => 'Smartwatch Series 8 Sport',
                'category' => 'Gadget & Wearable',
                'price' => 1250000
            ],
            [
                'name' => 'Mouse Wireless Ergonomis Silent',
                'category' => 'Aksesoris Komputer',
                'price' => 199000
            ],
            [
                'name' => 'Kemeja Batik Premium Slimfit',
                'category' => 'Pakaian & Fashion',
                'price' => 249000
            ],
            [
                'name' => 'Keyboard Mechanical RGB 60%',
                'category' => 'Aksesoris Komputer',
                'price' => 450000
            ],
            [
                'name' => 'Tas Ransel Laptop Waterproof',
                'category' => 'Lainnya',
                'price' => 320000
            ],
            [
                'name' => 'Earphones TWS Bass Boost',
                'category' => 'Elektronik & Audio',
                'price' => 299000
            ],
            [
                'name' => 'Sepatu Sneaker Casual Pria',
                'category' => 'Pakaian & Fashion',
                'price' => 389000
            ],
            [
                'name' => 'Charger GaN Fast Charging 65W',
                'category' => 'Gadget & Wearable',
                'price' => 210000
            ],
            [
                'name' => 'Kacamata Anti Radiasi Bluelight',
                'category' => 'Lainnya',
                'price' => 120000
            ],
        ];

        $stores = Store::all();

        if ($stores->isEmpty()) {
            $this->command->error('Data store belum tersedia.');
            return;
        }

        for ($i = 0; $i < 20; $i++) {

            $product = $sampleProducts[array_rand($sampleProducts)];

            $variant = [
                'v1',
                'v2',
                'Pro',
                'Max',
                'Edition',
                'Ultra'
            ][array_rand([
                'v1',
                'v2',
                'Pro',
                'Max',
                'Edition',
                'Ultra'
            ])];

            Product::create([
                'store_id' => $stores->random()->id,
                'name' => $product['name'] . ' ' . $variant,
                'sku' => 'SKU-' . strtoupper(Str::random(8)),
                'category' => $product['category'],
                'price' => $product['price'] + rand(-20000, 50000),
                'stock' => rand(0, 45),
                'description' => 'Produk berkualitas tinggi dari toko terpercaya dengan garansi resmi.',
                'image' => null,
                'status' => 'active',
            ]);
        }
    }
}
