```php
<?php
session_start();
include 'koneksi.php';

// Cek apakah sudah login
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

$query = mysqli_query($koneksi, "SELECT * FROM mahasiswa ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>
</head>
<body>

    <h2>DAFTAR DATA MAHASISWA</h2>

    <a href="insert.php">Tambah Data Baru (Insert)</a>
    |
    <a href="logout.php">Logout</a>

    <br><br>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;

        while ($data = mysqli_fetch_assoc($query)) {
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= htmlspecialchars($data['nim']); ?></td>
            <td><?= htmlspecialchars($data['nama']); ?></td>
            <td><?= htmlspecialchars($data['jurusan']); ?></td>
            <td><?= htmlspecialchars($data['alamat']); ?></td>
            <td>
                <a href="edit.php?id=<?= $data['id']; ?>">Edit</a>

                <form action="hapus.php" method="POST"
                      style="display:inline;"
                      onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                    <input type="hidden" name="id"
                           value="<?= $data['id']; ?>">
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        <?php } ?>

    </table>

</body>
</html>
```