<?php
declare(strict_types=1);
interface Penilaian {
    public function hitung(float $tugas, float $uts, float $uas): float;
}