<?php
require 'koneksi.php';
require 'cek_login.php';

$id_peminjam = $_SESSION['id']; // Ambil ID pengguna yang login
$id_buku = $_POST['id_buku'];
$tanggal_peminjaman = date('Y-m-d'); // Gunakan nama variabel yang benar

$sql = 'INSERT INTO peminjaman (id_peminjam, id_buku, tanggal_peminjaman) VALUES (?, ?, ?)';
$stmt = $koneksi->execute_query($sql, [$id_peminjam, $id_buku, $tanggal_peminjaman]);

if ($stmt) {
    header('location: index.php');
} else {
    echo "Peminjaman gagal.";
}
