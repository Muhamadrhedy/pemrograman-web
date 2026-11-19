<?php
use App\Http\Controllers\BukuController;
use Illuminate\Support\Facades\Route;

// Rute halaman utama langsung mengarah ke view dashboard dengan membawa data dummy
Route::view('/', 'dashboard', ['total' => 2, 'stok' => 5, 'habis' => 0])->name('dashboard');

// Rute daftar buku
Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');