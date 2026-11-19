<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat Akun Admin (Untuk kamu & partnermu mengelola toko)
        User::create([
            'name' => 'Admin Marstcha',
            'email' => 'admin@marstcha.com',
            'password' => Hash::make('password123'),
            'phone' => '081234567890',
            'address' => 'Jl. Setia Budi No. 10, Medan',
            'role' => 'admin',
        ]);

        // 2. Buat Akun Customer Dummy (Untuk simulasi belanja pembeli)
        User::create([
            'name' => 'Mario Customer',
            'email' => 'customer@marstcha.com',
            'password' => Hash::make('password123'),
            'phone' => '089876543210',
            'address' => 'Jl. Dr. Mansyur No. 25, Medan',
            'role' => 'customer',
        ]);

        // 3. Buat Data Kategori Produk
        $categories = [
            ['name' => 'Minuman Matcha', 'icon' => 'cup-straw'],
            ['name' => 'Bubuk Matcha Murni', 'icon' => 'box-seam'],
            ['name' => 'Dessert & Pastry', 'icon' => 'cake2'],
            ['name' => 'Alat Seduh & Aksesoris', 'icon' => 'tools'],
        ];

        $categoryModels = [];
        foreach ($categories as $cat) {
            $categoryModels[$cat['name']] = Category::create([
                'name' => $cat['name'],
                'slug' => Str::slug($cat['name']),
                'icon' => $cat['icon'],
            ]);
        }

        // 4. Buat Data Produk Contoh
        $products = [
            [
                'category_id' => $categoryModels['Minuman Matcha']->id,
                'name' => 'Signature Uji Matcha Latte',
                'description' => 'Perpaduan ceremonial grade Uji Matcha dengan susu segar creamy yang pas di lidah.',
                'price' => 28000,
                'stock' => 50,
                'image' => 'products/matcha-latte.jpg',
            ],
            [
                'category_id' => $categoryModels['Minuman Matcha']->id,
                'name' => 'Strawberry Matcha Cloud',
                'description' => 'Lapisan selai stroberi segar di bawah, susu dingin di tengah, dan foam matcha pekat di atas.',
                'price' => 32000,
                'stock' => 35,
                'image' => 'products/strawberry-matcha.jpg',
            ],
            [
                'category_id' => $categoryModels['Bubuk Matcha Murni']->id,
                'name' => 'Ceremonial Grade Matcha Powder 50g',
                'description' => '100% bubuk teh hijau pilihan tanpa gula tambahan, warna hijau cerah dan aroma umami kuat.',
                'price' => 115000,
                'stock' => 20,
                'image' => 'products/matcha-powder.jpg',
            ],
            [
                'category_id' => $categoryModels['Dessert & Pastry']->id,
                'name' => 'Matcha Burnt Cheesecake',
                'description' => 'Cheesecake panggang lembut dengan bagian tengah lumer dan rasa pahit-manis matcha yang seimbang.',
                'price' => 38000,
                'stock' => 15,
                'image' => 'products/matcha-cheesecake.jpg',
            ],
            [
                'category_id' => $categoryModels['Alat Seduh & Aksesoris']->id,
                'name' => 'Bamboo Chasen (Pengocok Matcha)',
                'description' => 'Pengocok bambu tradisional 80 prongs untuk menghasilkan micro-foam matcha yang halus.',
                'price' => 65000,
                'stock' => 25,
                'image' => 'products/chasen.jpg',
            ],
        ];

        foreach ($products as $prod) {
            Product::create([
                'category_id' => $prod['category_id'],
                'name' => $prod['name'],
                'slug' => Str::slug($prod['name']),
                'description' => $prod['description'],
                'price' => $prod['price'],
                'stock' => $prod['stock'],
                'image' => $prod['image'],
                'is_active' => true,
            ]);
        }
    }
}