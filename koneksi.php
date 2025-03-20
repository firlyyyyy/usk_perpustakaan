<?php
$hostname = 'localhost';
$username = 'firly';
$password = 'firly';
$database = 'usk_perpustakaan';

$koneksi = new mysqli($hostname, $username, $password, $database);

// if ($koneksi->connect_error) {
//     die('koneksi gagal');
// } else {
//     echo ('koneksi berhasil');
// }
