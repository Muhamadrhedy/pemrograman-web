<?php
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', DashboardController::class)->name('dashboard');
Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');