<?php
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = 'SELECT * FROM pengguna WHERE username = ? AND password = ?';
    $row = $koneksi->execute_query($sql, [$username, $password])->fetch_assoc();

    if ($row) {
        session_start();
        $_SESSION['id'] = $row['id_pengguna'];
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['level'] = $row['level'];
        header('location: index.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>
        button {
            padding: 12px;
            border-radius: 15px;
            border-style: none;
            background-color: #A5B68D;
            color: white;
            font-weight: bold;
            font-size: large;
        }

        .container {
            display: block;
            background-color: #C1CFA1;
            padding: 20px;
            max-width: 600px;
            margin: 180px auto 0;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            color: white;
            font-family: Arial, sans-serif;
        }
    </style>
</head>

<body>

    <h1 style="font-family: Arial, Helvetica, sans-serif;">Perpustakaan</h1>

    <div class="container">
        <form action="" method="post" style="place-items: center; padding-top: 20px;">
            <h1 style="font-family: Arial, Helvetica, sans-serif;">Login</h1>

            <div class="form-item" style="margin-bottom: 10px;">
                <input type="text" id="username" name="username" placeholder="Username" style="padding: 12px; font-size: large; border-radius: 15px; border-style: none ;" required>
            </div>

            <div class="form-item" style="margin-bottom: 10px;">
                <input type="text" id="password" name="password" placeholder="Password" style="padding: 12px; font-size: large; border-radius: 15px; border-style: none;" required>
            </div>

            <button type="submit">Login</button>
        </form>
    </div>


</body>

</html>