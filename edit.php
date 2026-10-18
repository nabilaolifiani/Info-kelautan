
<?php
require 'auth.php';
require 'koneksi.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id || $id < 1) {
    header("Location: index.php");
    exit();
}

$stmt = mysqli_prepare(
    $koneksi,
    "SELECT * FROM mahasiswa WHERE id = ?"
);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    header("Location: index.php");
    exit();
}

$query_jurusan = mysqli_query(
    $koneksi,
    "SELECT * FROM jurusan ORDER BY nama_jurusan ASC"
);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f5f4;
            margin: 0;
            padding: 25px;
        }

        .container {
            max-width: 550px;
            margin: 30px auto;
            padding: 30px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 3px 12px rgba(0,0,0,0.1);
        }

        h2 {
            color: #087f5b;
            text-align: center;
        }

        label {
            display: block;
            margin: 15px 0 7px;
            font-weight: bold;
        }

        input, select, textarea {
            width: 100%;
            padding: 11px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }

        button {
            margin-top: 20px;
            padding: 11px 18px;
            background: #087f5b;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        a {
            color: #087f5b;
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>EDIT DATA MAHASISWA</h2>

    <a href="index.php">&laquo; Kembali ke Daftar Data</a>

    <form action="proses.php?aksi=update" method="POST">
        <input type="hidden" name="id"
               value="<?= (int)$data['id']; ?>">

        <label for="nim">NIM</label>
        <input type="text" id="nim" name="nim"
               maxlength="20" required
               value="<?= htmlspecialchars($data['nim']); ?>">

        <label for="nama">Nama Lengkap</label>
        <input type="text" id="nama" name="nama"
               maxlength="100" required
               value="<?= htmlspecialchars($data['nama']); ?>">

        <label for="jurusan">Program Studi</label>
        <select id="jurusan" name="jurusan" required>
            <option value="">-- Pilih Program Studi --</option>

            <?php while ($j = mysqli_fetch_assoc($query_jurusan)) { ?>
                <option
                    value="<?= htmlspecialchars($j['nama_jurusan']); ?>"
                    <?= $data['jurusan'] === $j['nama_jurusan']
                        ? 'selected' : ''; ?>>
                    <?= htmlspecialchars($j['nama_jurusan']); ?>
                </option>
            <?php } ?>
        </select>

        <label for="alamat">Alamat</label>
        <textarea id="alamat" name="alamat"
                  rows="4" required><?= htmlspecialchars($data['alamat']); ?></textarea>

        <button type="submit">Simpan Perubahan</button>
    </form>
</div>

</body>
</html>
