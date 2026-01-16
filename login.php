<?php
session_start();
include 'koneksi.php';

// Logika Masuk sebagai Guest
if (isset($_POST['login_guest'])) {
    $user = trim($_POST['username']);
    if($user == "") $user = "Guest_" . rand(100, 999);
    $_SESSION['username'] = $user;
    $_SESSION['login_type'] = "Guest";
    header("Location: index.php");
    exit;
}

// Simulasi Google Login (Untuk integrasi asli, perlu Google API Library)
if (isset($_GET['google_login'])) {
    $_SESSION['username'] = "User_Google_" . rand(100, 999);
    $_SESSION['login_type'] = "Google";
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - MADE BY AZAM</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #262522;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-card {
            background: #312e2b;
            padding: 40px;
            border-radius: 8px;
            width: 350px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
        }
        .brand { color: #81b64c; font-size: 28px; font-weight: bold; margin-bottom: 30px; }
        
        /* Tombol Google */
        .btn-google {
            display: flex;
            align-items: center;
            justify-content: center;
            background: white;
            color: #444;
            padding: 12px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            margin-bottom: 20px;
            transition: 0.3s;
        }
        .btn-google:hover { background: #eee; }
        .btn-google img { width: 20px; margin-right: 10px; }

        .divider { margin: 20px 0; color: #888; font-size: 12px; text-transform: uppercase; }

        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            background: #262522;
            border: 1px solid #444;
            border-radius: 5px;
            color: white;
            box-sizing: border-box;
        }

        .btn-guest {
            width: 100%;
            padding: 12px;
            background: #81b64c;
            border: none;
            color: white;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .btn-guest:hover { background: #a3d160; }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="brand">MADE BY AZAM</div>
        
        <a href="?google_login=1" class="btn-google">
            <img src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg" alt="G">
            Masuk dengan Google
        </a>

        <div class="divider">Atau Masuk Guest</div>

        <form method="POST">
            <input type="text" name="username" placeholder="Nama Guest Anda" required>
            <button type="submit" name="login_guest" class="btn-guest">Main Sekarang</button>
        </form>
    </div>
</body>
</html>