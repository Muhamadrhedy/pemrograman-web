<?php
declare(strict_types=1);
class Mahasiswa {
    public string $nim = '';
    public string $nama = '';
    public float $tugas = 0;
    public float $uts = 0;
    public float $uas = 0;
    public function nilaiAkhir(): float {
        return $this->tugas * 0.4 + $this->uts * 0.3 + $this->uas * 0.3;
    }
}