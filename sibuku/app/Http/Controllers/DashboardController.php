<?php
namespace App\Http\Controllers;
use App\Models\Buku;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('dashboard', [
            'total' => Buku::count(),
            'stok' => (int) Buku::sum('stok'),
            'habis' => Buku::where('stok', 0)->count(),
        ]);
    }
}