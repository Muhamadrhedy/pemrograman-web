<!DOCTYPE html><html lang="id"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Form Nilai SiNilai</title><link rel="stylesheet" href="assets/style.css"></head>
<body><header><h1>SiNilai</h1><nav><a href="index.php">Form Nilai</a></nav></header>
<main class="card"><h2>Form Nilai Mahasiswa</h2>
<?php if ($error !== ''): ?><p class="error" role="alert"><?= e($error) ?></p><?php endif; ?>
<form method="post">
<label for="nim">NIM (7–15 digit)</label><input class="field" id="nim" name="nim" inputmode="numeric" pattern="[0-9]{7,15}" required value="<?= e($data['nim']) ?>">
<label for="nama">Nama</label><input class="field" id="nama" name="nama" required value="<?= e($data['nama']) ?>">
<?php foreach (['tugas'=>'Tugas','uts'=>'UTS','uas'=>'UAS'] as $key=>$label): ?>
<label for="<?= e($key) ?>"><?= e($label) ?></label><input class="field" id="<?= e($key) ?>" name="<?= e($key) ?>" type="number" min="0" max="100" step="0.01" required value="<?= e($data[$key]) ?>">
<?php endforeach; ?>
<label for="skema">Skema penilaian</label><select class="field" id="skema" name="skema">
<?php foreach (['reguler'=>'Reguler (40/30/30)', 'praktikum'=>'Praktikum (60/20/20)'] as $key=>$label): ?>
<option value="<?= e($key) ?>" <?= $data['skema'] === $key ? 'selected' : '' ?>><?= e($label) ?></option>
<?php endforeach; ?></select>
<p><button type="submit">Hitung Nilai</button></p></form>
<?php if ($hasil !== null): ?>
<section><h2>Hasil Perhitungan</h2><p><?= e($hasil['nama']) ?>: <?= number_format($hasil['akhir'], 2, ',', '.') ?></p>
<p>Grade: <?= e($hasil['grade']) ?> — <?= e($hasil['status']) ?></p>
</section>
<?php endif; ?>
<p>Hasil pada tahap ini belum disimpan. CRUD dan database ditambahkan pada tahap 8.</p>
</main></body></html>