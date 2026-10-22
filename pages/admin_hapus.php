
<?php
if (
    !isset($_SESSION['login_status']) ||
    $_SESSION['login_status'] !== true
) {
    echo "<script>
        window.location='index.php?modul=login';
    </script>";
    exit;
}

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id || $id < 1) {
    echo "<script>
        alert('ID admin tidak valid!');
        window.location='index.php?modul=admin';
    </script>";
    exit;
}

// Ambil data admin yang akan dihapus.
$stmt = mysqli_prepare(
    $conn,
    "SELECT id, username, nama_lengkap
     FROM admin_users WHERE id = ?"
);

mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$admin = mysqli_fetch_assoc($result);

mysqli_stmt_close($stmt);

if (!$admin) {
    echo "<script>
        alert('Data admin tidak ditemukan!');
        window.location='index.php?modul=admin';
    </script>";
    exit;
}

// Jangan izinkan akun yang sedang digunakan menghapus dirinya sendiri.
if (
    (int) $id === (int) ($_SESSION['admin_id'] ?? 0) ||
    $admin['username'] === $_SESSION['username']
) {
    echo "<script>
        alert('Akun yang sedang digunakan tidak dapat dihapus!');
        window.location='index.php?modul=admin';
    </script>";
    exit;
}

// Proses penghapusan setelah konfirmasi.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = mysqli_prepare(
        $conn,
        "DELETE FROM admin_users WHERE id = ?"
    );

    mysqli_stmt_bind_param($stmt, 'i', $id);

    if (mysqli_stmt_execute($stmt)) {
        $berhasil = mysqli_stmt_affected_rows($stmt) === 1;
        mysqli_stmt_close($stmt);

        if ($berhasil) {
            echo "<script>
                alert('Admin berhasil dihapus!');
                window.location='index.php?modul=admin';
            </script>";
        } else {
            echo "<script>
                alert('Data admin gagal dihapus!');
                window.location='index.php?modul=admin';
            </script>";
        }

        exit;
    }

    mysqli_stmt_close($stmt);
    $pesan = 'Terjadi kesalahan saat menghapus data.';
}
?>

<h2 style="color:#c0392b;">Hapus Data Admin</h2>

<p>Apakah lu yakin ingin menghapus akun berikut?</p>

<table>
    <tr>
        <th>ID</th>
        <td><?= (int) $admin['id'] ?></td>
    </tr>
    <tr>
        <th>Username</th>
        <td><?= htmlspecialchars($admin['username']) ?></td>
    </tr>
    <tr>
        <th>Nama Lengkap</th>
        <td><?= htmlspecialchars($admin['nama_lengkap']) ?></td>
    </tr>
</table>

<?php if (!empty($pesan)): ?>
    <p style="color:#c0392b;">
        <?= htmlspecialchars($pesan) ?>
    </p>
<?php endif; ?>

<form method="POST"
      action="index.php?modul=admin_hapus&id=<?= (int) $id ?>"
      style="margin-top:20px;">

    <button type="submit"
            style="
                background:#e74c3c;
                color:white;
                padding:12px 20px;
                border:none;
                border-radius:5px;
                font-weight:bold;
                cursor:pointer;
            ">
        Ya, Hapus Data
    </button>

    <a href="index.php?modul=admin"
       style="margin-left:12px;color:#7f8c8d;text-decoration:none;">
        Batal
    </a>
</form>
