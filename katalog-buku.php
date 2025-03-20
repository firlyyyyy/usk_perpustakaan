<?php
require 'cek_login.php';
require 'koneksi.php';

$sql = 'SELECT * FROM buku';
$rows = $koneksi->execute_query($sql);
?>

<!DOCTYPE html>
<html lang="en" style="font-family: Arial, Helvetica, sans-serif;">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
</head>

<body>
    <h1>Data Buku</h1>

    <a href="index.php">kembali</a>

    <div style="margin-top: 10px;">
        <table border="1" style="text-align: center;">
            <thead>
                <th style="padding: 10px;">No</th>
                <th style="padding: 10px;">Judul</th>
                <th style="padding: 10px;">Pengarang</th>
                <th style="padding: 10px;">Aksi</th>
            </thead>
            <tbody>
                <?php $no = 0;
                foreach ($rows as $row) : ?>
                    <tr>
                        <td style="padding: 10px;"><?= ++$no ?></td>
                        <td style="padding: 10px;"><?= $row['judul'] ?></td>
                        <td style="padding: 10px;"><?= $row['pengarang'] ?></td>
                        <td style="padding: 10px;">
                            <a href="peminjaman.php?id=<?= $row['id_buku'] ?>">Pinjam</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</body>

</html>