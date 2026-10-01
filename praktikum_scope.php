<?php
  $hargaGlobal = 50000;

  function hitungTotal() {
      // Mengakses variabel dari luar fungsi menggunakan kata kunci global
      global $hargaGlobal;
      $jumlah = 2; // Variabel Local
      echo "Total Harga: Rp " . ($hargaGlobal * $jumlah) . "<br>";
  }

  function penghitungVisitor() {
      // Variabel static nilainya terus dipertahankan antar pemanggilan
      static $counter = 1;
      echo "Pengunjung ke: " . $counter . "<br>";
      $counter++;
  }

  hitungTotal();
  penghitungVisitor(); // Output: Pengunjung ke: 1
  penghitungVisitor(); // Output: Pengunjung ke: 2
  penghitungVisitor(); // Output: Pengunjung ke: 3
?>

