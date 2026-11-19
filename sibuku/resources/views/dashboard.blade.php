@extends('layouts.app')

@section('title', 'Dashboard SiBuku')

@section('content')
<h2>Dashboard Katalog Buku</h2>
<div class="grid">
    <section class="card"><h3>Jenis/Judul Buku</h3><p>{{ $total }}</p></section>
    <section class="card"><h3>Total Eksemplar</h3><p>{{ $stok }}</p></section>
    <section class="card"><h3>Judul dengan Stok Nol</h3><p>{{ $habis }}</p></section>
</div>
<p>Gunakan menu Data Buku di atas untuk mengelola katalog perpustakaan.</p>
@endsection