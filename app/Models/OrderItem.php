<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
    ];

    // Relasi: Item ini bagian dari Order nomor berapa
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    // Relasi: Item ini merujuk ke Produk yang mana
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}