<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relasi: 1 User bisa punya banyak item di keranjang
    public function carts(): HasMany
    {
        return $this->hasMany(Cart::class);
    }

    // Relasi: 1 User bisa punya banyak riwayat pesanan
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    // Helper untuk mengecek apakah user adalah admin
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }
}