
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

$pesan = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $nama = trim($_POST['nama_lengkap'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username === '' || $nama === '') {
        $pesan = 'Username dan nama lengkap wajib diisi.';
    } else {
        if ($password !== '') {
            $stmt = mysqli_prepare(
                $conn,
                "UPDATE admin_users
                 SET username = ?, password = ?, nama_lengkap = ?
                 WHERE id = ?"
            );

            mysqli_stmt_bind_param(
                $stmt, 'sssi', $username, $password, $nama, $id
            );
        } else {
            $stmt = mysqli_prepare(
                $conn,
                "UPDATE admin_users
                 SET username = ?, nama_lengkap = ?
                 WHERE id = ?"
            );

            mysqli_stmt_bind_param(
                $stmt, 'ssi', $username, $nama, $id
            );
        }

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);

            // Perbarui session jika username atau nama akun aktif berubah.
            if ((int) $id === (int) ($_SESSION['admin_id'] ?? 0)) {
                $_SESSION['username'] = $username;
                $_SESSION['nama_lengkap'] = $nama;
            }

            echo "<script>
                alert('Data admin berhasil diperbarui!');
                window.location='index.php?modul=admin';
            </script>";
            exit;
        }

        $pesan = mysqli_stmt_errno($stmt) === 1062
            ? 'Username sudah digunakan!'
            : 'Gagal memperbarui data admin.';

        mysqli_stmt_close($stmt);
    }
}
?>

<h2 style="color:#2c3e50;">Edit Data Admin</h2>

<?php if ($pesan !== ''): ?>
    <p style="color:#e74c3c;">
        <?= htmlspecialchars($pesan) ?>
    </p>
<?php endif; ?>

<form action="index.php?modul=admin_edit&id=<?= (int) $id ?>"
      method="POST">

    <div style="margin-bottom:15px;">
        <label style="display:block;font-weight:bold;margin-bottom:7px;">
            Username:
        </label>
        <input type="text" name="username"
               maxlength="50" required
               value="<?= htmlspecialchars($admin['username']) ?>"
               style="width:100%;padding:12px;box-sizing:border-box;">
    </div>

    <div style="margin-bottom:15px;">
        <label style="display:block;font-weight:bold;margin-bottom:7px;">
            Nama Lengkap:
        </label>
        <input type="text" name="nama_lengkap"
               maxlength="100" required
               value="<?= htmlspecialchars($admin['nama_lengkap']) ?>"
               style="width:100%;padding:12px;box-sizing:border-box;">
    </div>

    <div style="margin-bottom:20px;">
        <label style="display:block;font-weight:bold;margin-bottom:7px;">
            Password Baru:
        </label>
        <input type="password" name="password"
               placeholder="Kosongkan jika tidak diubah"
               style="width:100%;padding:12px;box-sizing:border-box;">
    </div>

    <button type="submit"
            style="
                background:#2980b9;
                color:white;
                padding:12px 20px;
                border:none;
                border-radius:5px;
                font-weight:bold;
                cursor:pointer;
            ">
        Simpan Perubahan
    </button>

    <a href="index.php?modul=admin"
       style="margin-left:12px;color:#7f8c8d;text-decoration:none;">
        Batal
    </a>
</form>
