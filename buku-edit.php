<?php
require 'cek_login.php';
require 'koneksi.php';

$book = null; // Inisialisasi agar tidak undefined

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id_buku = $_GET['id'];

    // Pastikan ID hanya angka untuk mencegah SQL Injection
    if (!ctype_digit($id_buku)) {
        die("ID buku tidak valid!");
    }

    // Jalankan query untuk mengambil data buku
    $sql = "SELECT * FROM buku WHERE id_buku = '$id_buku'";
    $result = $koneksi->query($sql);

    if ($result && $result->num_rows > 0) {
        $book = $result->fetch_assoc();
    } else {
        die("Data buku tidak ditemukan!");
    }
}

// Proses update data buku
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['id'])) {
    $judul = $koneksi->real_escape_string($_POST['judul']);
    $pengarang = $koneksi->real_escape_string($_POST['pengarang']);
    $stok = (int) $_POST['stok']; // Pastikan stok angka
    $id_buku = $_GET['id'];

    $sql = "UPDATE buku SET judul = '$judul', pengarang = '$pengarang', stok = $stok WHERE id_buku = '$id_buku'";
    $rows = $koneksi->query($sql);

    if ($rows) {
        header('Location: buku.php');
        exit();
    } else {
        echo "Gagal mengupdate data!";
    }
}
?>

<!DOCTYPE html>
<html lang="en" style="font-family: Arial, Helvetica, sans-serif;">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
</head>

<body>
    <?php if ($book): ?>
        <form action="" method="post" style="place-items: center; padding: 100px;">
            <h1>Edit Buku</h1>

            <div class="form-item" style="padding-bottom: 10px;">
                <label for="judul" style="display: block; font-weight: bold; margin-bottom: 5px;">Judul</label>
                <input type="text" id="judul" name="judul" value="<?= htmlspecialchars($book['judul']) ?>" placeholder="Masukkan Judul Buku" style="padding: 13px; font-size: large; border-radius: 8px; border-style: solid; width: 100%;" required>
            </div>

            <div class="form-item" style="padding-bottom: 10px;">
                <label for="pengarang" style="display: block; font-weight: bold; margin-bottom: 5px;">Pengarang</label>
                <input type="text" id="pengarang" name="pengarang" value="<?= htmlspecialchars($book['pengarang']) ?>" placeholder="Masukkan Nama Pengarang" style="padding: 13px; font-size: large; border-radius: 8px; border-style: solid; width: 100%;" required>
            </div>

            <div class="form-item" style="padding-bottom: 10px;">
                <label for="stok" style="display: block; font-weight: bold; margin-bottom: 5px;">Stok</label>
                <input type="number" min="1" id="stok" name="stok" value="<?= htmlspecialchars($book['stok']) ?>" placeholder="Masukkan Jumlah Stok" style="padding: 13px; font-size: large; border-radius: 8px; border-style: solid; width: 100%;" required>
            </div>

            <button type="submit" style="padding: 15px; margin-top: 10px; border-radius: 8px; background-color: #8AB2A6; border-style: none; color: white; font-weight: bold; font-size: large;">Edit</button>
            <div style="margin-top: 10px; font-weight: bold; font-size: large;">
                <a href="buku.php">Batal</a>
            </div>
        </form>
    <?php else: ?>
        <p style="color: red; text-align: center;">Data buku tidak ditemukan.</p>
    <?php endif; ?>
</body>

</html>