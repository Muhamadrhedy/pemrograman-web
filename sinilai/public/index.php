<?php
declare(strict_types=1);
require_once __DIR__ . '/../helpers.php';
require_once __DIR__ . '/../src/Mahasiswa.php';
$data = ['nim'=>'','nama'=>'','tugas'=>'','uts'=>'','uas'=>'','skema'=>'reguler'];
$error = ''; $hasil = null;
if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    try {
        foreach (array_keys($data) as $key) $data[$key] = teks($_POST, $key, $data[$key]);
        $m = Mahasiswa::dariArray($data);
        $hasil = ['nama'=>$m->getNama(), 'akhir'=>$m->nilaiAkhir()];
    } catch (InvalidArgumentException $ex) {
        $error = $ex->getMessage();
    }
}
require __DIR__ . '/../views/kalkulator.php';