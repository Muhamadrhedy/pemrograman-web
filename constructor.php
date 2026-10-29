<?php
class NamaMahasiswaContoh {
    private string $nama;
    public function __construct(string $nama) {
        $nama = trim($nama);
        if ($nama === '') throw new InvalidArgumentException('Nama wajib diisi.');
        $this->nama = $nama;
    }
    public function getNama(): string { return $this->nama; }
}
try{
    $m = new NamaMahasiswaContoh;
    echo $m->nama;
}catch(InvalidArgumentException $e){
    $e->getMessage();
}