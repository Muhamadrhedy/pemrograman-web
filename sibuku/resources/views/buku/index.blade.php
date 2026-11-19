@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
<section class="card">
    <h2>Daftar Buku Sementara</h2>
    <table>
        <thead>
            <tr><th>Kode</th><th>Judul</th><th>Stok</th></tr>
        </thead>
        <tbody>
            @forelse ($buku as $item)
                <tr>
                    <td>{{ $item['kode'] }}</td>
                    <td>{{ $item['judul'] }}</td>
                    <td>{{ $item['stok'] }}</td>
                </tr>
            @empty
                <tr><td colspan="3">Belum ada data buku.</td></tr>
            @endforelse
        </tbody>
    </table>
    <p><small>Data tahap ini masih berasal dari array controller.</small></p>
</section>
@endsection