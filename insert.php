
<?php
require 'auth.php';
require 'koneksi.php';

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
    <title>Tambah Data Mahasiswa</title>

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
            text-align: center;
            color: #087f5b;
        }

        label {
            display: block;
            font-weight: bold;
            margin: 15px 0 7px;
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
    <h2>FORM TAMBAH DATA MAHASISWA</h2>

    <a href="index.php">&laquo; Kembali ke Daftar Data</a>

    <form action="proses.php?aksi=tambah" method="POST">
        <label for="nim">NIM</label>
        <input type="text" id="nim" name="nim"
               maxlength="20" required>

        <label for="nama">Nama Lengkap</label>
        <input type="text" id="nama" name="nama"
               maxlength="100" required>

        <label for="jurusan">Program Studi</label>
        <select id="jurusan" name="jurusan" required>
            <option value="">-- Pilih Program Studi --</option>

            <?php while ($j = mysqli_fetch_assoc($query_jurusan)) { ?>
                <option value="<?= htmlspecialchars($j['nama_jurusan']); ?>">
                    <?= htmlspecialchars($j['nama_jurusan']); ?>
                </option>
            <?php } ?>
        </select>

        <label for="alamat">Alamat</label>
        <textarea id="alamat" name="alamat"
                  rows="4" required></textarea>

        <button type="submit">Simpan Data</button>
    </form>
</div>

</body>
</html>
