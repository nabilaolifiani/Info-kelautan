
<?php
require 'auth.php';
require 'koneksi.php';

$aksi = $_GET['aksi'] ?? '';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: index.php");
    exit();
}

if ($aksi !== 'tambah' && $aksi !== 'update') {
    header("Location: index.php");
    exit();
}

$nim = trim($_POST['nim'] ?? '');
$nama = trim($_POST['nama'] ?? '');
$jurusan = trim($_POST['jurusan'] ?? '');
$alamat = trim($_POST['alamat'] ?? '');

if (
    $nim === '' || $nama === '' ||
    $jurusan === '' || $alamat === ''
) {
    exit("Semua kolom wajib diisi.");
}

if (
    strlen($nim) > 20 ||
    strlen($nama) > 100 ||
    strlen($jurusan) > 100
) {
    exit("Panjang data melebihi batas.");
}

// Periksa jurusan di database
$cek = mysqli_prepare(
    $koneksi,
    "SELECT nama_jurusan FROM jurusan WHERE nama_jurusan = ?"
);

mysqli_stmt_bind_param($cek, "s", $jurusan);
mysqli_stmt_execute($cek);
$hasil = mysqli_stmt_get_result($cek);

if (mysqli_num_rows($hasil) === 0) {
    exit("Jurusan tidak ditemukan.");
}

if ($aksi === 'tambah') {
    $stmt = mysqli_prepare(
        $koneksi,
        "INSERT INTO mahasiswa (nim, nama, jurusan, alamat)
         VALUES (?, ?, ?, ?)"
    );

    mysqli_stmt_bind_param(
        $stmt, "ssss",
        $nim, $nama, $jurusan, $alamat
    );
} else {
    $id = filter_input(
        INPUT_POST, 'id', FILTER_VALIDATE_INT
    );

    if (!$id || $id < 1) {
        exit("ID mahasiswa tidak valid.");
    }

    $stmt = mysqli_prepare(
        $koneksi,
        "UPDATE mahasiswa
         SET nim = ?, nama = ?, jurusan = ?, alamat = ?
         WHERE id = ?"
    );

    mysqli_stmt_bind_param(
        $stmt, "ssssi",
        $nim, $nama, $jurusan, $alamat, $id
    );
}

if (mysqli_stmt_execute($stmt)) {
    header("Location: index.php");
    exit();
}

exit("Gagal menyimpan data: " . mysqli_stmt_error($stmt));
?>
