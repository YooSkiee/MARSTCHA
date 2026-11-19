<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'invoice_number',
        'total_price',
        'shipping_address',
        'payment_method',
        'payment_proof',
        'status',
    ];

    // Relasi: Pesanan ini milik pembeli siapa
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relasi: 1 Pesanan terdiri dari banyak rincian barang (OrderItem)
    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}