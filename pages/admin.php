
<?php
// Proteksi halaman
if (
    !isset($_SESSION['login_status']) ||
    $_SESSION['login_status'] !== true
) {
    echo "<script>
        alert('Silakan login terlebih dahulu!');
        window.location='index.php?modul=login';
    </script>";
    exit;
}

$query = mysqli_query(
    $conn,
    "SELECT id, username, nama_lengkap
     FROM admin_users
     ORDER BY id ASC"
);
?>

<h2 style="color:#2c3e50;">Daftar Admin Aktif (CRUD)</h2>

<p>
    Berikut adalah data administrator yang dapat dikelola
    melalui operasi database MySQLi.
</p>

<a href="index.php?modul=admin_tambah"
   style="
       display:inline-block;
       background:#27ae60;
       color:white;
       padding:10px 15px;
       border-radius:5px;
       text-decoration:none;
       font-weight:bold;
       margin-bottom:20px;
   ">
    + Tambah Admin Baru
</a>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Nama Lengkap</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        <?php if (mysqli_num_rows($query) > 0): ?>
            <?php $no = 1; ?>

            <?php while ($admin = mysqli_fetch_assoc($query)): ?>
                <tr>
                    <td><?= $no++ ?></td>

                    <td>
                        <?= htmlspecialchars($admin['username']) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($admin['nama_lengkap']) ?>
                    </td>

                    <td style="white-space:nowrap;">
                        <a href="index.php?modul=admin_edit&id=<?= (int) $admin['id'] ?>"
                           style="
                               color:#2980b9;
                               font-weight:bold;
                               text-decoration:none;
                               margin-right:10px;
                           ">
                            Edit
                        </a>

                        <?php if (
                            $admin['username'] !== $_SESSION['username']
                        ): ?>
                            <a href="index.php?modul=admin_hapus&id=<?= (int) $admin['id'] ?>"
                               onclick="return confirm('Yakin ingin menghapus admin ini?');"
                               style="
                                   color:#e74c3c;
                                   font-weight:bold;
                                   text-decoration:none;
                               ">
                                Hapus
                            </a>
                        <?php else: ?>
                            <span style="color:#777;">
                                Akun aktif
                            </span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endwhile; ?>

        <?php else: ?>
            <tr>
                <td colspan="4" style="text-align:center;">
                    Belum ada data admin.
                </td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
