@extends('layouts.app')
@section('title', 'Data Buku')
@section('content')
<section class="card"><h2>Data Buku dari MySQL</h2>
<table><thead><tr><th>Kode</th><th>Judul</th><th>Penulis</th><th>Kategori</th><th>Tahun</th><th>Stok</th></tr></thead><tbody>
@forelse ($buku as $item)
<tr><td>{{ $item->kode }}</td><td>{{ $item->judul }}</td><td>{{ $item->penulis }}</td><td>{{ $item->kategori }}</td><td>{{ $item->tahun }}</td><td>{{ $item->stok }}</td></tr>
@empty
<tr><td colspan="6">Belum ada buku.</td></tr>
@endforelse
</tbody></table>
<nav class="pagination">
@if ($buku->previousPageUrl())<a href="{{ $buku->previousPageUrl() }}">Sebelumnya</a>@endif
<span>Halaman {{ $buku->currentPage() }} dari {{ $buku->lastPage() }}</span>
@if ($buku->nextPageUrl())<a href="{{ $buku->nextPageUrl() }}">Berikutnya</a>@endif
</nav></section>
@endsection