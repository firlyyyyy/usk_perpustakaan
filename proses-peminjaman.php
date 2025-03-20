<?php
require 'koneksi.php';
require 'cek_login.php';

$id_peminjam = $_SESSION['id']; // Ambil ID pengguna yang login
$id_buku = $_POST['id_buku'];
$tanggal_peminjaman = date('Y-m-d'); // Tanggal saat peminjaman
$tanggal_pengembalian = $_POST['tanggal_pengembalian']; // Tanggal pengembalian dari input

$sql = 'INSERT INTO peminjaman (id_peminjam, id_buku, tanggal_peminjaman, tanggal_pengembalian) VALUES (?, ?, ?, ?)';
$stmt = $koneksi->execute_query($sql, [$id_peminjam, $id_buku, $tanggal_peminjaman, $tanggal_pengembalian]);

if ($stmt) {
    header('location: index.php');
} else {
    echo "Peminjaman gagal.";
}
