<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'price',
        'stock',
        'image',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Relasi: 1 Produk dimiliki oleh 1 Kategori
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // Relasi: 1 Produk bisa masuk ke banyak keranjang user
    public function carts(): HasMany
    {
        return $this->hasMany(Cart::class);
    }

    // Relasi: 1 Produk bisa tercatat di banyak detail pesanan
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}