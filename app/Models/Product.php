<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'store_id', 'name', 'sku', 'category',
        'price', 'stock', 'description', 'icon', 'image', 'status'
    ];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
