<?php
  // Type Juggling (Otomatis oleh PHP)
  $strAngka = "10"; // String
  $total = $strAngka + 5; // Otomatis dikonversi menjadi Integer 15
  echo "Hasil Juggling: " . $total . "<br>";

  // Type Casting (Manual)
  $nilaiFloat = 87.65;
  $nilaiInt = (int) $nilaiFloat; // Mengubah Float menjadi Integer (Desimal dibuang)
  
  $strTeks = "123.A451233ABC";
  $angkaCasted = (float) $strTeks; // Mengambil komponen angka awal saja

  echo "Float ke Int: " . $nilaiInt . "<br>"; // Output: 87
  echo "String ke Float: " . $angkaCasted . "<br>"; // Output: 123.45
?>