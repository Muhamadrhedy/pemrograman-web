<?php
namespace App\Http\Controllers;

class BukuController extends Controller
{
    public function index()
    {
        // Menyiapkan data tiruan (sebagai pengganti database untuk sementara)
        $buku = [
            ['kode' => 'BK001', 'judul' => 'Dasar PHP OOP', 'stok' => 3],
            ['kode' => 'BK002', 'judul' => 'Pengantar MySQL', 'stok' => 2],
        ];

        // Mengirim data $buku ke file view 'buku.index'
        return view('buku.index', compact('buku'));
    }
}