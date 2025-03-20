<?php
require 'cek_login.php';
require 'koneksi.php';

// Ambil ID buku dari parameter URL
$id_buku = $_GET['id'] ?? null;

// Ambil data buku berdasarkan ID
if ($id_buku) {
    $sql = 'SELECT * FROM buku WHERE id_buku = ?';
    $book = $koneksi->execute_query($sql, [$id_buku])->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peminjaman Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        p {
            font-size: 18px;
            color: #555;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #0056b3;
        }

        .back-link {
            display: block;
            margin-top: 20px;
            text-align: center;
            font-size: 16px;
            color: #007bff;
            text-decoration: none;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Peminjaman Buku</h1>

        <?php if ($book): ?>
            <p><strong>Judul:</strong> <?= htmlspecialchars($book['judul']) ?></p>
            <p><strong>Pengarang:</strong> <?= htmlspecialchars($book['pengarang']) ?></p>

            <form action="proses-peminjaman.php" method="post">
                <input type="hidden" name="id_pengguna" value="<?= htmlspecialchars($_SESSION['id']) ?>">
                <input type="hidden" name="id_buku" value="<?= htmlspecialchars($book['id_buku']) ?>">
                <button type="submit" class="button">Pinjam</button>
            </form>
        <?php else: ?>
            <p>Buku tidak ditemukan.</p>
        <?php endif; ?>

        <a href="katalog-buku.php" class="back-link">Kembali</a>
    </div>
</body>

</html>