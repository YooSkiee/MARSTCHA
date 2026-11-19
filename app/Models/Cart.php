<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
    ];

    // Relasi: Keranjang ini milik siapa
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relasi: Produk apa yang ada di baris keranjang ini
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}