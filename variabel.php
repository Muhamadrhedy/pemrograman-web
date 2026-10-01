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

<?php
  $teks = "Halo PHP";
  $angka = 100;
  $desimal = 99.9;
  $status = false;
  $kosong = NULL;
  $listWarna = ["Merah", "Hijau", "Biru"];

  echo "<pre>";
  var_dump($teks);
  var_dump($angka);
  var_dump($desimal);
  var_dump($status);
  var_dump($kosong);
  var_dump($listWarna);
  echo "</pre>";
?>

<?php
  // Type Juggling (Otomatis oleh PHP)
  $strAngka = "10"; // String
  $total = $strAngka + 5; // Otomatis dikonversi menjadi Integer 15
  echo "Hasil Juggling: " . $total . "<br>";

  // Type Casting (Manual)
  $nilaiFloat = 87.65;
  $nilaiInt = (int) $nilaiFloat; // Mengubah Float menjadi Integer (Desimal dibuang)
  
  $strTeks = "123.45ABC";
  $angkaCasted = (float) $strTeks; // Mengambil komponen angka awal saja

  echo "Float ke Int: " . $nilaiInt . "<br>"; // Output: 87
  echo "String ke Float: " . $angkaCasted . "<br>"; // Output: 123.45
?>