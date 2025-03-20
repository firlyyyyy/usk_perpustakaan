<?php
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id_buku = $_GET['id'];

    $sql = 'DELETE FROM buku WHERE id_buku = ?';
    $row = $koneksi->execute_query($sql, [$id_buku]);

    if ($row) {
        header('location: buku.php');
    }
}
?>


--KATALOG-BUKU--
<?php
require 'koneksi.php';

$sql = 'SELECT * FROM buku';
$rows = $koneksi->execute_query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
</head>

<body>
    <h1>Data Buku</h1>

    <a href="index.php">kembali</a>

    <table>
        <thead>
            <th>No</th>
            <th>Judul</th>
            <th>Pengarang</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            <?php $no = 0;
            foreach ($rows as $row) : ?>
                <tr>
                    <td><?= ++$no ?></td>
                    <td><?= $row['judul'] ?></td>
                    <td><?= $row['pengarang'] ?></td>
                    <td>
                        <a href="peminjaman.php?id=<?= $row['id_buku'] ?>">Pinjam</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>

</html>
