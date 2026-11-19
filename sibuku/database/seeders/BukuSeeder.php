<?php
namespace Database\Seeders;
use App\Models\Buku;
use Illuminate\Database\Seeder;

class BukuSeeder extends Seeder
{
    public function run(): void
    {
        Buku::firstOrCreate(['kode' => 'BK001'], [
            'judul' => 'Dasar PHP OOP', 'penulis' => 'Tim Praktikum',
            'kategori' => 'Pemrograman', 'tahun' => 2025, 'stok' => 3,
        ]);
        Buku::firstOrCreate(['kode' => 'BK002'], [
            'judul' => 'Pengantar MySQL', 'penulis' => 'Tim Laboratorium',
            'kategori' => 'Basis Data', 'tahun' => 2025, 'stok' => 2,
        ]);
    }
}