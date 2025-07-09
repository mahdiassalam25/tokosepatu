<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Kategori;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'nama' => 'Administrator',
            'email' => 'admin@admin.com',
            'role' => '1',
            'status' => 1,
            'hp' => '0812345678901',
            'password' => bcrypt('P@55word'),
        ]);
        User::create([
            'nama' => 'Sopian Aji',
            'email' => 'sopianaji@admin.com',
            'role' => '0',
            'status' => 1,
            'hp' => '0812345678902',
            'password' => bcrypt('P@55word'),
        ]);

        // data merk hp
        Kategori::create([
            'nama_kategori' => 'Samsung',
        ]);
        Kategori::create([
            'nama_kategori' => 'Iphone',
        ]);
        Kategori::create([
            'nama_kategori' => 'Xiaomi',
        ]);
        Kategori::create([
            'nama_kategori' => 'Oppo',
        ]);
        Kategori::create([
            'nama_kategori' => 'Vivo',
        ]);
        Kategori::create([
            'nama_kategori' => 'Realme',
        ]);
        Kategori::create([
            'nama_kategori' => 'Huawei',
        ]);
        Kategori::create([
            'nama_kategori' => 'Asus',
        ]);
    }
}
