<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class store extends Model
{
    protected $fillable = ['user_id', 'name', 'slug', 'description', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
