<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'SiBuku')</title>
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; font-family: Arial, sans-serif; color: #243447; background: #eef2f5; }
        header, main { max-width: 1100px; margin: auto; padding: 20px; }
        nav { display: flex; gap: 18px; flex-wrap: wrap; }
        a { color: #075ca3; } .card { padding: 20px; background: white; margin: 16px 0; border-radius: 8px; }
        .grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 15px; }
        label { display: block; margin-top: 12px; }
        input, select, button { padding: 9px; font: inherit; max-width: 100%; }
        .field { width: 100%; } .error { color: #a00000; } .success { color: #17602b; }
        .table-wrap { overflow-x: auto; } table { width: 100%; border-collapse: collapse; }
        th, td { text-align: left; padding: 10px; border-bottom: 1px solid #ddd; }
        .inline { display: inline; } .pagination { display: flex; gap: 15px; margin: 15px 0; }
    </style>
</head>
<body>
<header><h1>SiBuku</h1><nav>
    <a href="{{ route('dashboard') }}">Dashboard</a>
    <a href="{{ route('buku.index') }}">Data Buku</a>
    @if (Route::has('buku.create'))
        <a href="{{ route('buku.create') }}">Tambah Buku</a>
    @endif
</nav></header>
<main>
    @if (session('success'))
        <p class="success" role="status">{{ session('success') }}</p>
    @endif
    @if ($errors->any())
        <div class="error" role="alert"><strong>Periksa kembali input:</strong><ul>
            @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
        </ul></div>
    @endif
    @yield('content')
</main>
</body>
</html>