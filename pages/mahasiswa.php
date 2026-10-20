<?php
require_once("../koneksi.php");
// Mengambil data secara langsung dari tabel database menggunakan MySQLi
$query = "SELECT * FROM biodata_mhs ORDER BY id DESC";
$result = mysqli_query($conn, $query);

$listMhs = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $listMhs[] = $row;
    }
} else {
    echo "<p style='color:red;'>Gagal memuat data dari database: " . mysqli_error($conn) . "</p>";
}
?>

<h2 style="color:#2c3e50; margin-top:0;">Daftar Mahasiswa Aktif (Dari Database MySQL)</h2>
<p>Data di bawah ini diambil secara dinamis melalui query SQL menggunakan fungsi koneksi MySQLi.</p>

<table>
  <tr>
    <th>No</th>
    <th>NIM</th>
    <th>Nama Lengkap</th>
    <th>Program Studi</th>
    <th>IPK</th>
  </tr>
  <?php if (!empty($listMhs)): ?>
    <?php $no = 1; foreach ($listMhs as $m): ?>
      <tr>
        <td><?php echo $no++; ?></td>
        <td><strong><?php echo htmlspecialchars($m['nim']); ?></strong></td>
        <td><?php echo htmlspecialchars($m['nama']); ?></td>
        <td><?php echo htmlspecialchars($m['prodi']); ?></td>
        <td><?php echo $m['ipk']; ?></td>
      </tr>
    <?php endforeach; ?>
  <?php else: ?>
    <tr>
      <td colspan="5" style="text-align:center; color:red;">Belum ada rekaman data mahasiswa di database.</td>
    </tr>
  <?php endif; ?>
</table>