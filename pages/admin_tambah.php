
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

$pesan = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $nama = trim($_POST['nama_lengkap'] ?? '');

    if ($username === '' || $password === '' || $nama === '') {
        $pesan = 'Semua field wajib diisi.';
    } else {
        $stmt = mysqli_prepare(
            $conn,
            "INSERT INTO admin_users
             (username, password, nama_lengkap)
             VALUES (?, ?, ?)"
        );

        mysqli_stmt_bind_param(
            $stmt, 'sss', $username, $password, $nama
        );

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);

            echo "<script>
                alert('Admin berhasil ditambahkan!');
                window.location='index.php?modul=admin';
            </script>";
            exit;
        }

        $pesan = mysqli_stmt_errno($stmt) === 1062
            ? 'Username sudah digunakan!'
            : 'Gagal menambahkan admin.';

        mysqli_stmt_close($stmt);
    }
}
?>

<h2 style="color:#2c3e50;">Tambah Admin Baru</h2>

<?php if ($pesan !== ''): ?>
    <p style="color:#e74c3c;">
        <?= htmlspecialchars($pesan) ?>
    </p>
<?php endif; ?>

<form action="index.php?modul=admin_tambah" method="POST">

    <div style="margin-bottom:15px;">
        <label style="display:block;font-weight:bold;margin-bottom:7px;">
            Username:
        </label>
        <input type="text" name="username"
               maxlength="50" required
               style="width:100%;padding:12px;box-sizing:border-box;">
    </div>

    <div style="margin-bottom:15px;">
        <label style="display:block;font-weight:bold;margin-bottom:7px;">
            Password:
        </label>
        <input type="password" name="password"
               required
               style="width:100%;padding:12px;box-sizing:border-box;">
    </div>

    <div style="margin-bottom:20px;">
        <label style="display:block;font-weight:bold;margin-bottom:7px;">
            Nama Lengkap:
        </label>
        <input type="text" name="nama_lengkap"
               maxlength="100" required
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
        Simpan Data
    </button>

    <a href="index.php?modul=admin"
       style="
           margin-left:12px;
           color:#7f8c8d;
           text-decoration:none;
       ">
        Batal
    </a>
</form>
