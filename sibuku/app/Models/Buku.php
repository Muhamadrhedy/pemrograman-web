<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'buku';
    public const KATEGORI = ['Pemrograman', 'Basis Data', 'Umum'];
    protected $fillable = ['kode', 'judul', 'penulis', 'kategori', 'tahun', 'stok'];
    protected function casts(): array
    {
        return ['tahun' => 'integer', 'stok' => 'integer'];
    }
}