<?php
require 'cek_login.php';
?>

<!DOCTYPE html>
<html lang="en" style="font-family: Arial, Helvetica, sans-serif;">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>
    <h1>Dashboard</h1>

    <h2>Menu</h2>

    <nav>
        <ul>
            <?php if ($_SESSION['level'] != 'peminjam') : ?>
                <li><a href="buku.php">Data Buku</a></li>
            <?php endif ?>

            <?php if ($_SESSION['level'] == 'peminjam') : ?>
                <li><a href="katalog-buku.php">Katalog Buku</a></li>
            <?php endif ?>

            <li><a href="logout.php">Logout</a></li>

        </ul>
    </nav>
</body>

</html>