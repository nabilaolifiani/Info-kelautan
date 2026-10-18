
<?php
session_start();

if (isset($_SESSION['login'])) {
    header("Location: index.php");
    exit();
}

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Akun untuk latihan lokal
    if ($username === 'admin' && $password === 'admin123') {
        session_regenerate_id(true);
        $_SESSION['login'] = true;
        $_SESSION['username'] = 'admin';

        header("Location: index.php");
        exit();
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f5f4;
            padding: 30px;
        }

        .container {
            max-width: 350px;
            margin: 70px auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
        }

        h2 {
            text-align: center;
            color: #087f5b;
        }

        label {
            display: block;
            margin-top: 15px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 7px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            margin-top: 20px;
            padding: 11px;
            background: #087f5b;
            color: white;
            border: none;
            cursor: pointer;
        }

        .error {
            color: red;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>LOGIN ADMIN</h2>
    <p style="text-align:center">Sistem Data Mahasiswa</p>

    <?php if ($error !== '') { ?>
        <p class="error">
            <?= htmlspecialchars($error); ?>
        </p>
    <?php } ?>

    <form method="POST">
        <label>Username</label>
        <input type="text" name="username" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <button type="submit">Login</button>
    </form>
</div>

</body>
</html>
