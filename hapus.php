
<?php
require 'auth.php';
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: index.php");
    exit();
}

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

if (!$id || $id < 1) {
    header("Location: index.php");
    exit();
}

$stmt = mysqli_prepare(
    $koneksi,
    "DELETE FROM mahasiswa WHERE id = ?"
);

mysqli_stmt_bind_param($stmt, "i", $id);

if (mysqli_stmt_execute($stmt)) {
    header("Location: index.php");
    exit();
}

exit("Gagal menghapus data.");
?>
