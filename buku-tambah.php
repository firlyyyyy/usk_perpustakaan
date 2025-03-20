<?php
require 'cek_login.php';
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $stok = $_POST['stok'];

    $sql = 'INSERT INTO buku (judul, pengarang, penerbit, tahun_terbit, stok) VALUES (?, ?, ?, ?, ?)';
    $row = $koneksi->execute_query($sql, [$judul, $pengarang, $penerbit, $tahun_terbit, $stok]);

    if ($row) {
        header('location: buku.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en" style="font-family: Arial, Helvetica, sans-serif;">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
</head>

<body>

    <form action="" method="post" style="place-items: center; padding: 100px;">
        <h1>Tambah Buku</h1>
        <div class="form-item" style="padding-bottom: 10px;">
            <input type="text" id="judul" name="judul" placeholder="Judul" style="padding: 13px; font-size: large; border-radius: 8px; border-style: solid;">
        </div>

        <div class="form-item" style="padding-bottom: 10px;">
            <input type="text" id="pengarang" name="pengarang" placeholder="Pengarang" style="padding: 13px; font-size: large; border-radius: 8px; border-style: solid;">
        </div>

        <div class="form-item" style="padding-bottom: 10px;">
            <input type="text" id="penerbit" name="penerbit" placeholder="Penerbit" style="padding: 13px; font-size: large; border-radius: 8px; border-style: solid;">
        </div>

        <div class="form-item" style="padding-bottom: 10px;">
            <input type="number" id="tahun_terbit" placeholder="Tahun Terbit" name="tahun_terbit" style="padding: 13px; font-size: large; border-radius: 8px; border-style: solid;">
        </div>

        <div class="form-item" style="padding-bottom: 10px;">
            <input type="number" min="1" id="stok" name="stok" placeholder="Stok" style="padding: 13px; font-size: large; border-radius: 8px; border-style: solid;">
        </div>

        <button type="submit" style="padding: 15px; margin-top: 10px; border-radius: 8px; background-color: #8AB2A6; border-style: none; color: white; font-weight: bold; font-size: large;">Tambah</button>
        <div style="margin-top: 10px; font-weight: bold; font-size: large;">
            <a href="buku.php">Batal</a>
        </div>
    </form>

</body>

</html>