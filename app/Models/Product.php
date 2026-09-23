<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_id',
        'name',
        'sku',
        'category',
        'price',
        'stock',
        'description',
        'image',
        'status'
    ];

    /**
     * Relasi Eloquent: Product belongs to Store
     */
    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    /**
     * Local Scope Eloquent: Hanya produk berstatus Aktif
     * Penggunaan: Product::active()->get();
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Local Scope Eloquent: Filter produk dengan stok menipis (< 5)
     * Penggunaan: Product::lowStock()->get();
     */
    public function scopeLowStock($query)
    {
        return $query->where('stock', '>', 0)->where('stock', '<', 5);
    }

    /**
     * Local Scope Eloquent: Filter pencarian nama atau SKU
     * Penggunaan: Product::search('headphone')->get();
     */
    public function scopeSearch($query, $keyword)
    {
        if ($keyword) {
            return $query->where(function($q) use ($keyword) {
                $q->where('name', 'LIKE', "%{$keyword}%")
                  ->orWhere('sku', 'LIKE', "%{$keyword}%");
            });
        }
        return $query;
    }
}
