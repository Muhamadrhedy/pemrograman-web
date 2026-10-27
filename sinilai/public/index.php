<?php
require_once __DIR__ . '/../helpers.php';
require_once __DIR__ . '/../src/Mahasiswa.php';
$budi = new Mahasiswa();
$budi->nim = '2026002'; $budi->nama = 'Budi';
$budi->tugas = 80; $budi->uts = 70; $budi->uas = 90;
$siti = new Mahasiswa();
$siti->nim = '2026003'; $siti->nama = 'Siti';
$siti->tugas = 60; $siti->uts = 50; $siti->uas = 70;
$andi = new Mahasiswa();
$andi->nim = '2026001'; $andi->nama = 'Andi';
$andi->tugas = 100; $andi->uts = 100; $andi->uas = 100;
$daftar = [$andi, $budi, $siti];
?>
<!DOCTYPE html><html lang="id"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Daftar Nilai</title><link rel="stylesheet" href="assets/style.css"></head>
<body><header><h1>SiNilai</h1><nav><a href="index.php">Daftar Nilai</a></nav></header>
<main class="card"><h2>Daftar Nilai Mahasiswa</h2><div class="table-wrap"><table>
<thead><tr><th>NIM</th><th>Nama</th><th>Nilai Akhir</th></tr></thead><tbody>
<?php foreach ($daftar as $m): ?>
<tr><td><?= e($m->nim) ?></td><td><?= e($m->nama) ?></td><td><?= number_format($m->nilaiAkhir(), 2, ',', '.') ?></td></tr>
<?php endforeach; ?>
</tbody></table></div></main></body></html>

