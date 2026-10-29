<?php
class NilaiContoh {
    private float $nilai;
    public function __construct(float $nilai) { $this->setNilai($nilai); }
    public function getNilai(): float { return $this->nilai; }
    public function setNilai(float $nilai): void {
        if (!is_finite($nilai) || $nilai < 0 || $nilai > 100) {
            throw new InvalidArgumentException('Nilai harus 0–100.</br>');
        }
        $this->nilai = $nilai;
    }
}
$n = new NilaiContoh(80);
try { $n->setNilai(120); }
catch (InvalidArgumentException $e) { echo $e->getMessage() . ' '; }
echo 'Nilai tetap: ' . $n->getNilai(); 