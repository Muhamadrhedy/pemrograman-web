<?php
  // Menggunakan define()
  define("SITE_NAME", "Web Edukasi Kampus");
  define("VERSION", "2.1.0");

  // Menggunakan const
  const PI = 3.14159;

  echo "<h3>Selamat Datang di " . SITE_NAME . " (v" . VERSION . ")</h3>";
  
  // Contoh kalkulasi matematika dengan konstanta
  $jariJari = 7;
  $luas = PI * ($jariJari ** 2);
  echo "Luas Lingkaran: " . $luas;
?>