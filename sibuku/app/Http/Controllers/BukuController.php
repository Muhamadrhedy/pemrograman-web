<?php
namespace App\Http\Controllers;
use App\Models\Buku;

class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::orderBy('judul')->orderBy('id')->paginate(5);
        return view('buku.index', compact('buku'));
    }
}